<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Package;
use App\Models\SubscriptionPlan;
use App\Models\Service;
use App\Models\Setting;

class PaymentController extends Controller
{
    /**
     * Show the checkout page for a given item.
     */
    public function checkout(string $type, string $slug)
    {
        [$item_title, $amount] = $this->resolveItem($type, $slug);

        // Check if Razorpay is properly configured before showing checkout
        $keyId     = Setting::get('razorpay_key', config('services.razorpay.key', ''));
        $keySecret = Setting::get('razorpay_secret', config('services.razorpay.secret', ''));

        $gatewayConfigured = $this->isValidRazorpayKey($keyId) && strlen($keySecret) > 10;

        return view('pages.checkout', [
            'item_type'          => $type,
            'item_id'            => $slug,
            'item_title'         => $item_title,
            'amount'             => $amount,
            'gateway_configured' => $gatewayConfigured,
        ]);
    }

    /**
     * Create a Razorpay order and launch the payment modal.
     * POST /payment/create-order
     */
    public function createOrder(Request $request)
    {
        $data = $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:15',
            'item_type'      => 'required|string|in:package,subscription,service',
            'item_id'        => 'required|string',
        ]);

        [$item_title, $amount] = $this->resolveItem($data['item_type'], $data['item_id']);

        $keyId     = Setting::get('razorpay_key', config('services.razorpay.key', ''));
        $keySecret = Setting::get('razorpay_secret', config('services.razorpay.secret', ''));

        // Validate keys before calling Razorpay API
        if (! $this->isValidRazorpayKey($keyId) || strlen($keySecret) < 10) {
            return back()->withErrors([
                'gateway' => 'Payment gateway is not configured yet. Please contact the site administrator.'
            ])->withInput();
        }

        try {
            $api = new \Razorpay\Api\Api($keyId, $keySecret);

            $rzpOrder = $api->order->create([
                'receipt'         => Payment::generateOrderNumber(),
                'amount'          => (int) ($amount * 100), // paise
                'currency'        => 'INR',
                'payment_capture' => 1,
            ]);

        } catch (\Razorpay\Api\Errors\BadRequestError $e) {
            // Authentication failure — bad credentials
            return back()->withErrors([
                'gateway' => 'Payment gateway authentication failed. Please check your Razorpay API keys in Admin → Settings → Payment Gateways.'
            ])->withInput();

        } catch (\Exception $e) {
            return back()->withErrors([
                'gateway' => 'Could not connect to payment gateway. Please try again later.'
            ])->withInput();
        }

        // Persist pending payment record
        $payment = Payment::create([
            'order_number'      => $rzpOrder->receipt,
            'customer_name'     => $data['customer_name'],
            'customer_email'    => $data['customer_email'],
            'customer_phone'    => $data['customer_phone'],
            'amount'            => $amount,
            'currency'          => 'INR',
            'item_type'         => $data['item_type'],
            'item_title'        => $item_title,
            'razorpay_order_id' => $rzpOrder->id,
            'status'            => 'pending',
        ]);

        return view('pages.razorpay_checkout', [
            'payment'      => $payment,
            'rzp_key'      => $keyId,
            'rzp_order_id' => $rzpOrder->id,
            'amount_paise' => (int) ($amount * 100),
        ]);
    }

    /**
     * Verify and capture the payment after Razorpay callback.
     * POST /payment/verify
     */
    public function verify(Request $request)
    {
        $data = $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id'   => 'required|string',
            'razorpay_signature'  => 'required|string',
        ]);

        $payment = Payment::where('razorpay_order_id', $data['razorpay_order_id'])->firstOrFail();

        $keyId     = Setting::get('razorpay_key', config('services.razorpay.key', ''));
        $keySecret = Setting::get('razorpay_secret', config('services.razorpay.secret', ''));

        try {
            $api = new \Razorpay\Api\Api($keyId, $keySecret);

            $api->utility->verifyPaymentSignature([
                'razorpay_order_id'   => $data['razorpay_order_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature'  => $data['razorpay_signature'],
            ]);

            // Signature valid — mark payment as paid
            $payment->update([
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature'  => $data['razorpay_signature'],
                'status'              => 'paid',
                'payment_response'    => $request->all(),
            ]);

            return redirect()->route('payment.success', $payment->order_number);

        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            $payment->update(['status' => 'failed']);
            return redirect()->route('payment.failed')->with([
                'message'   => 'Payment verification failed. Please contact support.',
                'retry_url' => url("/checkout/{$payment->item_type}/{$payment->item_id}"),
            ]);
        } catch (\Exception $e) {
            $payment->update(['status' => 'failed']);
            return redirect()->route('payment.failed')->with([
                'message' => 'An unexpected error occurred. Your payment has not been charged.',
            ]);
        }
    }

    /**
     * Show the payment success page.
     */
    public function success(string $orderNumber)
    {
        $payment = Payment::where('order_number', $orderNumber)
                          ->where('status', 'paid')
                          ->firstOrFail();

        return view('pages.payment_success', compact('payment'));
    }

    /**
     * Show the payment failure page.
     */
    public function failed()
    {
        return view('pages.payment_failed', [
            'message'   => session('message'),
            'retry_url' => session('retry_url'),
        ]);
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────────

    /**
     * Check if a Razorpay key ID has a valid format.
     */
    private function isValidRazorpayKey(string $key): bool
    {
        // Must start with rzp_test_ or rzp_live_ and be at least 20 chars
        return preg_match('/^rzp_(test|live)_[A-Za-z0-9]{10,}$/', $key) === 1;
    }

    private function resolveItem(string $type, string $slug): array
    {
        return match ($type) {
            'package' => (function () use ($slug) {
                $pkg = Package::where('slug', $slug)->where('is_active', true)->firstOrFail();
                return [$pkg->name_en . ' — ' . $pkg->name_hi, $pkg->price];
            })(),
            'subscription' => (function () use ($slug) {
                $plan = SubscriptionPlan::where('slug', $slug)->where('is_active', true)->firstOrFail();
                return [$plan->name . ' Subscription', $plan->price];
            })(),
            'service' => (function () use ($slug) {
                $svc = Service::where('slug', $slug)->firstOrFail();
                return [$svc->name_en . ' / ' . $svc->name_hi, $svc->price ?? 0];
            })(),
            default => abort(404),
        };
    }
}

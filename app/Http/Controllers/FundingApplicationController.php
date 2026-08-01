<?php

namespace App\Http\Controllers;

use App\Models\FundingApplication;
use App\Models\FundingApplicationLog;
use App\Models\FundingProgram;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FundingApplicationController extends Controller
{
    // Submit Assisted Application Form & Create Application
    public function submitAssisted(Request $request)
    {
        $allowedPackages = \App\Models\Package::where('type', 'funding')->pluck('name_en')->toArray();
        if (empty($allowedPackages)) {
            $allowedPackages = ['Basic', 'Professional', 'Premium', 'Enterprise'];
        }

        $request->validate([
            'funding_program_id' => 'required|exists:funding_programs,id',
            'founder_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'startup_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'startup_stage' => 'required|string|max:255',
            'funding_required' => 'required|string|max:255',
            'startup_description' => 'required|string',
            'website' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'package_name' => 'required|in:' . implode(',', $allowedPackages),
            'pitch_deck' => 'nullable|file|mimes:pdf,ppt,pptx|max:10240', // 10MB Max
            'business_plan' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'financial_projection' => 'nullable|file|mimes:pdf,xls,xlsx|max:10240',
            'additional_notes' => 'nullable|string',
        ]);

        $packageName = $request->package_name;
        $pkg = \App\Models\Package::where('type', 'funding')
            ->where('name_en', $packageName)
            ->first();
        
        $packagePrice = $pkg ? $pkg->price : 499.00;

        // Uploads
        $pitchDeckPath = null;
        if ($request->hasFile('pitch_deck')) {
            $pitchDeckPath = $request->file('pitch_deck')->store('funding-docs/pitch-decks', 'public');
        }

        $businessPlanPath = null;
        if ($request->hasFile('business_plan')) {
            $businessPlanPath = $request->file('business_plan')->store('funding-docs/business-plans', 'public');
        }

        $financialProjectionPath = null;
        if ($request->hasFile('financial_projection')) {
            $financialProjectionPath = $request->file('financial_projection')->store('funding-docs/financials', 'public');
        }

        $application = FundingApplication::create([
            'application_number' => FundingApplication::generateApplicationNumber(),
            'funding_program_id' => $request->funding_program_id,
            'user_id' => Auth::id(),
            'founder_name' => $request->founder_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'startup_name' => $request->startup_name,
            'industry' => $request->industry,
            'startup_stage' => $request->startup_stage,
            'funding_required' => $request->funding_required,
            'startup_description' => $request->startup_description,
            'website' => $request->website,
            'linkedin' => $request->linkedin,
            'pitch_deck_path' => $pitchDeckPath,
            'business_plan_path' => $businessPlanPath,
            'financial_projection_path' => $financialProjectionPath,
            'additional_notes' => $request->additional_notes,
            'package_name' => $packageName,
            'package_price' => $packagePrice,
            'payment_status' => 'unpaid',
            'status' => 'Pending Documents',
        ]);

        defer(function () use ($application) {
            try {
                $adminEmail = env('ADMIN_EMAIL', config('mail.from.address'));
                if ($adminEmail) {
                    \Illuminate\Support\Facades\Mail::to($adminEmail)->send(
                        new \App\Mail\AdminNotificationMail('Assisted Funding Application', $application->toArray())
                    );
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to send admin notification email: ' . $e->getMessage());
            }
        });

        // Create log entry
        FundingApplicationLog::create([
            'funding_application_id' => $application->id,
            'type' => 'status_change',
            'sender' => 'system',
            'message' => "Application submitted under {$packageName} package (₹{$packagePrice}). Awaiting payment confirmation.",
        ]);

        // Redirect to checkout or create payment order
        return redirect()->route('funding.checkout', $application->id);
    }

    // Show Checkout page for Funding Application
    public function checkout($id)
    {
        $application = FundingApplication::with('program')->findOrFail($id);
        
        // If user logged in, check permissions
        if (Auth::check() && $application->user_id && $application->user_id != Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('pages.funding.checkout', compact('application'));
    }

    // Process Application Payment Callback
    public function processPayment(Request $request, $id)
    {
        $application = FundingApplication::with('program')->findOrFail($id);

        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'nullable|string',
        ]);

        $application->payment_status = 'paid';
        $application->payment_id = $request->razorpay_payment_id;
        $application->razorpay_order_id = $request->razorpay_order_id;
        $application->status = 'Under Review';
        $application->save();

        // Also record in main Payments table for existing accounting logic
        Payment::create([
            'order_number' => $application->application_number,
            'user_id' => $application->user_id ?: (Auth::check() ? Auth::id() : null),
            'customer_name' => $application->founder_name,
            'customer_email' => $application->email,
            'customer_phone' => $application->mobile,
            'amount' => $application->package_price,
            'currency' => 'INR',
            'item_type' => 'Funding Application Assistance',
            'item_title' => "Assisted Funding: {$application->program->name} ({$application->package_name} Package)",
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'status' => 'paid',
        ]);

        // Log entry
        FundingApplicationLog::create([
            'funding_application_id' => $application->id,
            'type' => 'status_change',
            'sender' => 'system',
            'message' => "Payment of ₹{$application->package_price} confirmed. Status updated to Under Review.",
        ]);

        return redirect()->route('dashboard.funding-applications')->with('success', 'Payment successful! Your application is now under review by Foundida experts.');
    }

    // Customer Dashboard Applications List
    public function userApplications()
    {
        $user = Auth::user();

        $applications = FundingApplication::with(['program', 'logs'])
            ->where(function($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.funding-applications', compact('applications'));
    }

    // Download Invoice for Application
    public function invoice($id)
    {
        $application = FundingApplication::with('program')->findOrFail($id);

        if (Auth::check() && $application->user_id && $application->user_id != Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('pages.funding.invoice', compact('application'));
    }
}

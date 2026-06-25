<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Show the public funding and mentorship page with active subscription plans.
     */
    public function showFundingPage()
    {
        $plans = SubscriptionPlan::where('is_active', true)->orderBy('price', 'asc')->get();
        return view('pages.funding', compact('plans'));
    }

    /**
     * Store a new subscription request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'required|email|max:255',
            'startup_name' => 'nullable|string|max:255',
            'plan' => 'required|string|exists:subscription_plans,slug',
        ], [
            'name.required' => 'Please enter your full name.',
            'name.max' => 'The name is too long.',
            'phone.required' => 'Please enter your mobile number.',
            'phone.regex' => 'Please enter a valid 10-digit mobile number.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'plan.required' => 'Please select a plan.',
            'plan.exists' => 'Invalid plan selected.',
        ]);

        Subscription::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'startup_name' => $validated['startup_name'],
            'plan' => $validated['plan'],
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('subscription_success', 'Thank you! Your subscription request has been received. Our team will contact you to complete the setup.');
    }

    /**
     * Display a listing of subscriptions in the admin panel.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        
        $query = Subscription::query();
        
        if ($status && in_array($status, ['pending', 'active', 'completed', 'cancelled'])) {
            $query->where('status', $status);
        }
        
        $subscriptions = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.funding', compact('subscriptions'));
    }

    /**
     * Update the status of a specific subscription.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,active,completed,cancelled',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Subscription status updated successfully.');
    }

    /**
     * Delete a subscription.
     */
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->back()->with('success', 'Subscription request deleted successfully.');
    }
}

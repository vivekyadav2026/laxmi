<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubscriptionPlan;

class AdminSubscriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = SubscriptionPlan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.subscription_plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subscription_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:subscription_plans,slug',
            'price' => 'required|integer|min:0',
            'billing_period' => 'required|string|in:month,year',
            'description' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'features' => 'required|string',
            'is_popular' => 'nullable',
            'is_active' => 'nullable',
        ]);

        // Parse features line by line
        $features = array_filter(array_map('trim', explode("\n", $request->input('features'))));

        SubscriptionPlan::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'price' => $validated['price'],
            'billing_period' => $validated['billing_period'],
            'description' => $validated['description'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'features' => array_values($features),
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.subscription_plans.index')
            ->with('success', 'Subscription plan created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = SubscriptionPlan::findOrFail($id);
        return view('admin.subscription_plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plan = SubscriptionPlan::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:subscription_plans,slug,' . $plan->id,
            'price' => 'required|integer|min:0',
            'billing_period' => 'required|string|in:month,year',
            'description' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'features' => 'required|string',
            'is_popular' => 'nullable',
            'is_active' => 'nullable',
        ]);

        // Parse features line by line
        $features = array_filter(array_map('trim', explode("\n", $request->input('features'))));

        $plan->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'price' => $validated['price'],
            'billing_period' => $validated['billing_period'],
            'description' => $validated['description'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'features' => array_values($features),
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.subscription_plans.index')
            ->with('success', 'Subscription plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = SubscriptionPlan::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.subscription_plans.index')
            ->with('success', 'Subscription plan deleted successfully.');
    }
}

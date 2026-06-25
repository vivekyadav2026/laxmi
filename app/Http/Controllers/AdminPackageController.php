<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_hi' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:packages,slug',
            'type' => 'required|string|in:legal,tech',
            'price' => 'required|integer|min:0',
            'old_price' => 'nullable|integer|min:0',
            'description_hi' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'badge_hi' => 'nullable|string|max:255',
            'badge_en' => 'nullable|string|max:255',
            'features' => 'required|string',
            'sort_order' => 'required|integer|min:0',
            'is_popular' => 'nullable',
            'is_active' => 'nullable',
        ]);

        // Parse features line by line
        $features = array_filter(array_map('trim', explode("\n", $request->input('features'))));

        // Build comparison features if type is legal
        $comparisonFeatures = null;
        if ($request->input('type') === 'legal') {
            $comparisonFeatures = [
                'Company Registration' => $request->input('comp_company_reg') ?? '✗',
                'GST Registration' => $request->input('comp_gst_reg') ?? '✗',
                'Trademark' => $request->input('comp_trademark') ?? '✗',
                'Website' => $request->input('comp_website') ?? '✗',
                'Mobile App' => $request->input('comp_mobile_app') ?? '✗',
                'E-commerce' => $request->input('comp_ecommerce') ?? '✗',
                'Support' => $request->input('comp_support') ?? '✗',
            ];
        }

        Package::create([
            'name_hi' => $validated['name_hi'],
            'name_en' => $validated['name_en'],
            'slug' => $validated['slug'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'old_price' => $validated['old_price'] ?? null,
            'description_hi' => $validated['description_hi'] ?? null,
            'description_en' => $validated['description_en'] ?? null,
            'badge_hi' => $validated['badge_hi'] ?? null,
            'badge_en' => $validated['badge_en'] ?? null,
            'features' => array_values($features),
            'comparison_features' => $comparisonFeatures,
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
            'sort_order' => $validated['sort_order'],
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'name_hi' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:packages,slug,' . $package->id,
            'type' => 'required|string|in:legal,tech',
            'price' => 'required|integer|min:0',
            'old_price' => 'nullable|integer|min:0',
            'description_hi' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'badge_hi' => 'nullable|string|max:255',
            'badge_en' => 'nullable|string|max:255',
            'features' => 'required|string',
            'sort_order' => 'required|integer|min:0',
            'is_popular' => 'nullable',
            'is_active' => 'nullable',
        ]);

        // Parse features line by line
        $features = array_filter(array_map('trim', explode("\n", $request->input('features'))));

        // Build comparison features if type is legal
        $comparisonFeatures = null;
        if ($request->input('type') === 'legal') {
            $comparisonFeatures = [
                'Company Registration' => $request->input('comp_company_reg') ?? '✗',
                'GST Registration' => $request->input('comp_gst_reg') ?? '✗',
                'Trademark' => $request->input('comp_trademark') ?? '✗',
                'Website' => $request->input('comp_website') ?? '✗',
                'Mobile App' => $request->input('comp_mobile_app') ?? '✗',
                'E-commerce' => $request->input('comp_ecommerce') ?? '✗',
                'Support' => $request->input('comp_support') ?? '✗',
            ];
        }

        $package->update([
            'name_hi' => $validated['name_hi'],
            'name_en' => $validated['name_en'],
            'slug' => $validated['slug'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'old_price' => $validated['old_price'] ?? null,
            'description_hi' => $validated['description_hi'] ?? null,
            'description_en' => $validated['description_en'] ?? null,
            'badge_hi' => $validated['badge_hi'] ?? null,
            'badge_en' => $validated['badge_en'] ?? null,
            'features' => array_values($features),
            'comparison_features' => $comparisonFeatures,
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
            'sort_order' => $validated['sort_order'],
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    public function index()
    {
        // Load services grouped by category or paginated. 
        // We'll load categories with their services for the datatable.
        $categories = ServiceCategory::with('services')->get();
        return view('admin.services.index', compact('categories'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name_en' => 'required|string|max:255',
            'name_hi' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'time' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name_en']);
            // Ensure unique
            $count = Service::where('slug', 'LIKE', "{$validated['slug']}%")->count();
            if ($count > 0) {
                $validated['slug'] .= '-' . ($count + 1);
            }
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name_en' => 'required|string|max:255',
            'name_hi' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'time' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
        ]);

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}

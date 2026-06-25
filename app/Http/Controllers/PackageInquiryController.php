<?php

namespace App\Http\Controllers;

use App\Models\PackageInquiry;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageInquiryController extends Controller
{
    /**
     * Store a new package inquiry request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'required|email|max:255',
            'package_slug' => 'required|string|exists:packages,slug',
            'notes' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Please enter your full name.',
            'name.max' => 'The name is too long.',
            'phone.required' => 'Please enter your mobile number.',
            'phone.regex' => 'Please enter a valid 10-digit mobile number.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'package_slug.required' => 'Package selection is required.',
            'package_slug.exists' => 'Selected package does not exist.',
        ]);

        PackageInquiry::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'package_slug' => $validated['package_slug'],
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->back()
            ->with('package_inquiry_success', 'Thank you! Your inquiry has been received. Our team will contact you shortly regarding the package.');
    }

    /**
     * Display a listing of the package inquiries in the admin panel.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        
        $query = PackageInquiry::with('packageDetails');
        
        if ($status && in_array($status, ['pending', 'contacted', 'completed', 'cancelled'])) {
            $query->where('status', $status);
        }
        
        $inquiries = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.package_inquiries.index', compact('inquiries'));
    }

    /**
     * Update the status and notes of a specific package inquiry.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,contacted,completed,cancelled',
            'notes' => 'nullable|string|max:1000',
        ]);

        $inquiry = PackageInquiry::findOrFail($id);
        $inquiry->update([
            'status' => $request->status,
            'notes' => $request->notes ?? $inquiry->notes,
        ]);

        return redirect()->back()->with('success', 'Package inquiry status updated successfully.');
    }

    /**
     * Delete a package inquiry.
     */
    public function destroy($id)
    {
        $inquiry = PackageInquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->back()->with('success', 'Package inquiry deleted successfully.');
    }
}

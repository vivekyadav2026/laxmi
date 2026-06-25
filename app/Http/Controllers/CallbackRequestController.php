<?php

namespace App\Http\Controllers;

use App\Models\CallbackRequest;
use Illuminate\Http\Request;

class CallbackRequestController extends Controller
{
    /**
     * Store a new callback request from the landing page.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'service' => 'required|string',
        ], [
            'name.required' => 'Please enter your full name.',
            'name.max' => 'The name is too long.',
            'phone.required' => 'Please enter your mobile number.',
            'phone.regex' => 'Please enter a valid 10-digit mobile number (e.g. 9876543210).',
            'service.required' => 'Please select a service.',
        ]);

        $notes = null;
        if ($request->filled('city') || $request->filled('message')) {
            $notesArr = [];
            if ($request->filled('city')) {
                $notesArr[] = "City: " . $request->input('city');
            }
            if ($request->filled('message')) {
                $notesArr[] = "Message: " . $request->input('message');
            }
            $notes = implode(" | ", $notesArr);
        }

        CallbackRequest::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'service' => $validated['service'],
            'status' => 'pending',
            'notes' => $notes,
        ]);

        return redirect()->back()
            ->withInput()
            ->with('callback_success', 'Thank you! Your request has been received. Our experts will contact you within 2 hours.');
    }

    /**
     * Display a listing of the callback requests in the admin panel.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        
        $query = CallbackRequest::query();
        
        if ($status && in_array($status, ['pending', 'contacted', 'canceled'])) {
            $query->where('status', $status);
        }
        
        $callbacks = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.callbacks.index', compact('callbacks'));
    }

    /**
     * Update the status of a specific callback request.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,contacted,canceled',
            'notes' => 'nullable|string|max:1000',
        ]);

        $callback = CallbackRequest::findOrFail($id);
        $callback->update([
            'status' => $request->status,
            'notes' => $request->notes ?? $callback->notes,
        ]);

        return redirect()->back()->with('success', 'Callback status updated successfully.');
    }

    /**
     * Delete a callback request.
     */
    public function destroy($id)
    {
        $callback = CallbackRequest::findOrFail($id);
        $callback->delete();

        return redirect()->back()->with('success', 'Callback request deleted successfully.');
    }
}

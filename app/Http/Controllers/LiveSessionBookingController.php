<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LiveSessionBooking;

class LiveSessionBookingController extends Controller
{
    /**
     * Store a new live session booking request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'nullable|email|max:255',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required|string|max:255',
        ], [
            'name.required' => 'Please enter your name.',
            'phone.required' => 'Please enter your mobile number.',
            'phone.regex' => 'Please enter a valid 10-digit mobile number.',
            'preferred_date.required' => 'Please select a preferred date.',
            'preferred_date.after_or_equal' => 'The date must be today or a future date.',
            'preferred_time.required' => 'Please select a preferred time slot.',
        ]);

        LiveSessionBooking::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'preferred_date' => $validated['preferred_date'],
            'preferred_time' => $validated['preferred_time'],
            'status' => 'pending',
            'notes' => $request->input('notes'),
        ]);

        return redirect()->back()->with('booking_success', 'आपके लाइव सेशन की बुकिंग का अनुरोध प्राप्त हुआ है! / Your live session booking request has been received!');
    }

    /**
     * Display a listing of bookings in admin panel.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        
        $query = LiveSessionBooking::query();
        
        if ($status && in_array($status, ['pending', 'contacted', 'completed', 'canceled'])) {
            $query->where('status', $status);
        }
        
        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.live_sessions.index', compact('bookings'));
    }

    /**
     * Update status of booking.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,contacted,completed,canceled',
            'notes' => 'nullable|string|max:1000',
        ]);

        $booking = LiveSessionBooking::findOrFail($id);
        $booking->update([
            'status' => $request->status,
            'notes' => $request->notes ?? $booking->notes,
        ]);

        return redirect()->back()->with('success', 'Live session status updated successfully.');
    }

    /**
     * Delete a booking.
     */
    public function destroy($id)
    {
        $booking = LiveSessionBooking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }
}

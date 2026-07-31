<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Show the user dashboard
    public function dashboard()
    {
        $user = Auth::user();
        
        // 1. Fetch successful payments (Active Cases/Orders)
        $orders = \App\Models\Payment::where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhere('customer_email', $user->email);
            })
            ->where('status', 'paid')
            ->orderBy('created_at', 'desc')
            ->get();

        $activeCasesCount = $orders->count();

        // 2. Fetch live session bookings (Upcoming Calls)
        $consultations = \DB::table('live_session_bookings')
            ->where('email', $user->email)
            ->orderBy('preferred_date', 'desc')
            ->get();

        $upcomingCallsCount = $consultations->where('preferred_date', '>=', now()->toDateString())->count();

        // 3. Documents (Mock some documents based on orders or standard templates)
        $documents = [];
        foreach ($orders as $order) {
            $documents[] = [
                'name_en' => $order->item_title . ' - Acknowledgment Receipt',
                'date' => $order->created_at->format('d M Y'),
                'type' => 'Receipt'
            ];
        }
        
        // Add default DIY template resources
        $documents[] = [
            'name_en' => 'Standard Non-Disclosure Agreement (NDA)',
            'date' => 'Available',
            'type' => 'Template'
        ];
        $documents[] = [
            'name_en' => 'Partnership Deed Template',
            'date' => 'Available',
            'type' => 'Template'
        ];

        $documentsCount = count($documents);

        // 4. Calculate savings (₹2,500 saved per order)
        $amountSaved = $orders->count() * 2500;

        $stats = [
            ['title_en' => 'Active Orders', 'value' => $activeCasesCount, 'icon' => 'briefcase'],
            ['title_en' => 'Documents & Templates', 'value' => $documentsCount, 'icon' => 'document-text'],
            ['title_en' => 'Scheduled Calls', 'value' => $upcomingCallsCount, 'icon' => 'phone'],
            ['title_en' => 'Estimated Savings', 'value' => '₹' . number_format($amountSaved), 'icon' => 'currency-rupee'],
        ];

        // 5. Generate recent activities dynamically
        $activities = [];
        $activities[] = [
            'title_en' => 'Account profile created successfully.',
            'date' => $user->created_at ? $user->created_at->format('d M Y, h:i A') : 'Today',
            'color' => 'gold'
        ];

        foreach ($orders as $order) {
            $activities[] = [
                'title_en' => 'Purchased: ' . $order->item_title,
                'date' => $order->created_at->format('d M Y, h:i A'),
                'color' => 'green'
            ];
        }

        foreach ($consultations as $call) {
            $activities[] = [
                'title_en' => 'Scheduled session on ' . date('d M Y', strtotime($call->preferred_date)) . ' at ' . $call->preferred_time,
                'date' => date('d M Y, h:i A', strtotime($call->created_at ?? $call->preferred_date)),
                'color' => 'blue'
            ];
        }

        // Sort activities by date desc
        usort($activities, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        // Limit to 5
        $activities = array_slice($activities, 0, 5);

        return view('dashboard.user', compact('user', 'stats', 'orders', 'consultations', 'documents', 'activities'));
    }

    // Show the edit profile page
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    // Handle profile updates
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB Max
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        // Handle Profile Photo Upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists and is not a google URL
            if ($user->profile_photo_path && !str_starts_with($user->profile_photo_path, 'http')) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        // Update details
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;

        // Handle password change
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

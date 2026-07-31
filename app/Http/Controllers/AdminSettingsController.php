<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\Setting;

class AdminSettingsController extends Controller
{
    /**
     * Show the admin settings page with all settings values.
     */
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    /**
     * Update General preferences.
     */
    public function updateGeneral(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:255',
            'office_address' => 'nullable|string|max:500',
            'working_hours' => 'nullable|string|max:255',
            'currency_symbol' => 'required|string|max:10',
            'meta_description' => 'nullable|string|max:500',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
        ]);

        foreach ($validated as $key => $val) {
            Setting::set($key, $val);
        }

        Setting::set('maintenance_mode', $request->has('maintenance_mode') ? '1' : '0');

        return redirect()->route('admin.settings', ['tab' => 'general'])->with('status', 'general-updated');
    }

    /**
     * Update the administrator's profile (name, email).
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->user()->id],
        ]);

        $request->user()->update($validated);

        return redirect()->route('admin.settings', ['tab' => 'profile'])->with('status', 'profile-updated');
    }

    /**
     * Update the administrator's password and security preferences.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        if ($request->has('session_timeout')) {
            Setting::set('session_timeout', $request->input('session_timeout'));
        }
        Setting::set('enable_2fa', $request->has('enable_2fa') ? '1' : '0');

        return redirect()->route('admin.settings', ['tab' => 'security'])->with('status', 'password-updated');
    }

    /**
     * Update Payment Gateways configuration.
     */
    public function updateGateways(Request $request)
    {
        $validated = $request->validate([
            'gateway_mode' => 'required|string|in:test,live',
            'razorpay_key' => 'nullable|string|max:255',
            'razorpay_secret' => 'nullable|string|max:255',
            'cashfree_app_id' => 'nullable|string|max:255',
            'cashfree_secret' => 'nullable|string|max:255',
            'phonepe_merchant_id' => 'nullable|string|max:255',
            'phonepe_salt_key' => 'nullable|string|max:255',
        ]);

        foreach ($validated as $key => $val) {
            Setting::set($key, $val);
        }

        Setting::set('razorpay_enabled', $request->has('razorpay_enabled') ? '1' : '0');
        Setting::set('cashfree_enabled', $request->has('cashfree_enabled') ? '1' : '0');
        Setting::set('phonepe_enabled', $request->has('phonepe_enabled') ? '1' : '0');

        return redirect()->route('admin.settings', ['tab' => 'gateways'])->with('status', 'gateways-updated');
    }

    /**
     * Update Email & SMTP Configuration.
     */
    public function updateEmails(Request $request)
    {
        $validated = $request->validate([
            'mail_mailer' => 'required|string|max:50',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|integer',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:10',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
            'lead_notification_email' => 'nullable|email|max:255',
            'welcome_email_subject' => 'nullable|string|max:255',
            'welcome_email_body' => 'nullable|string|max:2000',
        ]);

        foreach ($validated as $key => $val) {
            Setting::set($key, $val);
        }

        return redirect()->route('admin.settings', ['tab' => 'emails'])->with('status', 'emails-updated');
    }
}

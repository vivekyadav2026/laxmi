<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Handle standard login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect based on role
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/dashboard/user');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Send OTP for registration
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $otp = sprintf("%06d", mt_rand(100000, 999999));

        EmailOtp::updateOrCreate(
            ['email' => $request->email],
            [
                'otp' => Hash::make($otp),
                'expires_at' => now()->addMinutes(10),
            ]
        );

        // Send Email
        Mail::raw("Your Foundida verification code is: {$otp}. It is valid for 10 minutes.", function ($message) use ($request) {
            $message->to($request->email)->subject('Your Registration OTP');
        });

        return response()->json(['success' => true, 'message' => 'OTP sent successfully']);
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create user directly
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Log the user in
        Auth::login($user);

        return redirect('/dashboard/user');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Redirect to Google OAuth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google OAuth callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['email' => 'Failed to login with Google. Please try again.']);
        }

        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            // Update google_id if missing
            if (!$user->google_id) {
                $user->update(['google_id' => $googleUser->id]);
            }
            Auth::login($user, true);
        } else {
            // Create new user
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make(Str::random(16)), // Random secure password
                'profile_photo_path' => $googleUser->avatar,
                'role' => 'user',
            ]);
            Auth::login($user, true);
        }

        return redirect('/dashboard/user');
    }

    // Show forgot password form
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Send reset link email
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($token),
                'created_at' => now()
            ]
        );

        // Send Link in email
        $link = route('password.reset', ['token' => $token, 'email' => $request->email]);
        Mail::raw("Reset your Foundida password using this link: {$link}. It is valid for 60 minutes.", function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Password Notification');
        });

        return back()->with('status', 'We have emailed your password reset link!');
    }

    // Show reset password form
    public function showResetPasswordForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Reset the password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $tokenRecord = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$tokenRecord || !Hash::check($request->token, $tokenRecord->token)) {
            return back()->withErrors(['email' => 'This password reset token is invalid.']);
        }

        // Check if expired (e.g. 60 mins)
        if (now()->subMinutes(60)->greaterThan($tokenRecord->created_at)) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'This password reset link has expired.']);
        }

        // Update user password
        $user = User::where('email', $request->email)->first();
        $user->forceFill([
            'password' => Hash::make($request->password)
        ])->save();

        // Delete token record
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Your password has been reset! You can now login.');
    }
}

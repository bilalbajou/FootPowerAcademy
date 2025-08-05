<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\RateLimiter;

use Inertia\Inertia;


class OtpVerificationController extends Controller
{
    public function show($userId)
    {
        return Inertia::render('Auth/VerifyOtp', [
            'userId' => $userId,
        ]);
    }

    public function verify(Request $request, $userId)
    {
        // Rate limit: max 5 attempts per 10 minutes per user + IP
        $key = 'otp-attempts:' . $userId . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors(['otp' => 'Too many attempts. Please try again in ' . ceil($seconds / 60) . ' minutes.']);
        }
        RateLimiter::hit($key, 600); // 600 seconds = 10 minutes

        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $otpRecord = EmailOtp::where('user_id', $userId)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otpRecord) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        $user = User::findOrFail($userId);
        $user->email_verified_at = now();
        $user->save();

        // Clean up OTPs
        EmailOtp::where('user_id', $userId)->delete();

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}

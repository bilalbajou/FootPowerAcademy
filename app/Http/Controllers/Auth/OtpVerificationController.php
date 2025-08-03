<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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

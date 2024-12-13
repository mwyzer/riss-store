<?php

namespace App\Http\Controllers\Auth;

use App\Models\Otp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function generate(Request $request)
    {
        $token = rand(100000, 999999);
        
        Otp::create([
            'identifier' => $request->identifier,
            'token' => $token,
            'valid_until' => Carbon::now()->addMinutes(5)
        ]);

        // Send OTP via email/SMS
        // Implement your notification logic here

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function verify(Request $request)
    {
        $otp = Otp::where('identifier', $request->identifier)
            ->where('token', $request->token)
            ->where('is_used', false)
            ->where('valid_until', '>', Carbon::now())
            ->first();

        if (!$otp) {
            return response()->json(['message' => 'Invalid OTP'], 422);
        }

        $otp->update(['is_used' => true]);

        return response()->json(['message' => 'OTP verified successfully']);
    }
}

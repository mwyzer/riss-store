<?php

namespace App\Http\Controllers;

use App\Services\OTPService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Otp;
use Carbon\Carbon;

class OTPController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['phone_number' => 'required|numeric']);

        $token = rand(100000, 999999); // Generate a 6-digit OTP

        // Store OTP in database
        Otp::create([
            'identifier' => $request->phone_number,
            'token' => $token,
            'valid_until' => Carbon::now()->addMinutes(5)
        ]);

        // Send OTP via WhatsApp
        $this->otpService->sendOtp($request->phone_number, $token);

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
            'token' => 'required|numeric',
        ]);

        $otp = Otp::where('identifier', $request->phone_number)
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

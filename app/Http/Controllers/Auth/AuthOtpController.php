<?php

namespace App\Http\Controllers;

use App\Services\OTPService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Otp;
use Carbon\Carbon;

class AuthOtpController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Send OTP to the provided phone number.
     */
    public function sendOtp(Request $request)
    {
        $request->validate(
            ['phone_number' => 'required|numeric|digits_between:10,15'],
            [
                'phone_number.required' => 'Phone number is required.',
                'phone_number.numeric' => 'Phone number must be numeric.',
                'phone_number.digits_between' => 'Phone number must be between 10 and 15 digits.',
            ]
        );

        try {
            $token = rand(100000, 999999); // Generate a 6-digit OTP

            // Check if an OTP already exists and update or create a new one
            Otp::updateOrCreate(
                ['identifier' => $request->phone_number, 'is_used' => false],
                [
                    'token' => $token,
                    'valid_until' => Carbon::now()->addMinutes(5),
                    'is_used' => false,
                ]
            );

            // Send OTP via the configured service (e.g., WhatsApp)
            $this->otpService->sendOtp($request->phone_number, $token);

            // Log the event
            Log::info("OTP sent to {$request->phone_number}");

            return response()->json(['message' => 'OTP sent successfully'], 200);
        } catch (\Exception $e) {
            Log::error("Failed to send OTP: {$e->getMessage()}");

            return response()->json(['message' => 'Failed to send OTP'], 500);
        }
    }

    /**
     * Verify the OTP for the provided phone number.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate(
            [
                'phone_number' => 'required|numeric|digits_between:10,15',
                'token' => 'required|numeric|digits:6',
            ],
            [
                'phone_number.required' => 'Phone number is required.',
                'phone_number.numeric' => 'Phone number must be numeric.',
                'phone_number.digits_between' => 'Phone number must be between 10 and 15 digits.',
                'token.required' => 'OTP token is required.',
                'token.numeric' => 'OTP token must be numeric.',
                'token.digits' => 'OTP token must be exactly 6 digits.',
            ]
        );

        try {
            $otp = Otp::where('identifier', $request->phone_number)
                ->where('token', $request->token)
                ->where('is_used', false)
                ->where('valid_until', '>', Carbon::now())
                ->first();

            if (!$otp) {
                return response()->json(['message' => 'Invalid or expired OTP'], 422);
            }

            // Mark OTP as used
            $otp->update(['is_used' => true]);

            // Log the event
            Log::info("OTP verified for {$request->phone_number}");

            return response()->json(['message' => 'OTP verified successfully'], 200);
        } catch (\Exception $e) {
            Log::error("Failed to verify OTP: {$e->getMessage()}");

            return response()->json(['message' => 'Failed to verify OTP'], 500);
        }
    }
}

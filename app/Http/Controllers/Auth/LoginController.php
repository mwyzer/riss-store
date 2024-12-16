<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\OTPService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Otp;
use Carbon\Carbon;

class LoginController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function index()
    {
        return inertia('Auth/Login');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email'     => 'required|email',
    //         'password'  => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
            
    //         // Generate and send OTP
    //         $token = rand(1000, 9999);
            
    //         Otp::create([
    //             'identifier' => $user->phone_number,
    //             'token' => $token,
    //             'valid_until' => Carbon::now()->addMinutes(5)
    //         ]);

    //         $this->otpService->sendOtp($user->phone_number, $token);

    //         return response()->json([
    //             'message' => 'OTP sent successfully',
    //             'requires_otp' => true
    //         ]);
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function store(Request $request)
{
    $request->validate([
        'email'     => 'required|email',
        'password'  => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Skip OTP process and regenerate session directly
        $request->session()->regenerate();

        return $this->authenticated($request, $user);
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    // public function verifyLoginOtp(Request $request)
    // {
    //     $request->validate([
    //         'token' => 'required|numeric',
    //     ]);

    //     $user = Auth::user();

    //     $otp = Otp::where('identifier', $user->phone_number)
    //         ->where('token', $request->token)
    //         ->where('is_used', false)
    //         ->where('valid_until', '>', Carbon::now())
    //         ->first();

    //     if (!$otp) {
    //         return response()->json(['message' => 'Invalid OTP'], 422);
    //     }

    //     $otp->update(['is_used' => true]);
    //     $request->session()->regenerate();

    //     return $this->authenticated($request, $user);
    // }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('Admin')) {
            return redirect()->route('account.dashboard');
        }
        return redirect()->route('web.home.index');
    }
}

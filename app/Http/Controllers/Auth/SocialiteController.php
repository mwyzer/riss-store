<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();

            // Check if the user already exists
            $registeredUser = User::where('google_id', $socialUser->id)->orWhere('email', $socialUser->email)->first();

            // If the user doesn't exist, create a new one
            if (!$registeredUser) {
                $registeredUser = User::create([
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'google_id' => $socialUser->id,
                    'password' => Hash::make('123'),  // Temporary password
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                ]);
            } else {
                // If user exists, update the Google token and refresh token
                $registeredUser->update([
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                ]);
            }

            // Log in the user
            Auth::login($registeredUser);

            // Redirect to the dashboard route
            return redirect()->route('account.dashboard');
        } catch (\Exception $e) {
            // Redirect back to login with an error message if there's an issue
            return redirect('/login')->withErrors(['error' => 'Failed to authenticate with Google.']);
        }
    }
}

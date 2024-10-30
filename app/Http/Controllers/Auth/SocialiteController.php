<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $socialUser = Socialite::driver('google')->user();
        
        $user = User::updateOrCreate([
            'google_id' => $socialUser->email,
        ], [
            'name' => $socialUser->name,
            'google_token' => $socialUser->token,
            'google_refresh_token' => $socialUser->refreshToken,

        ]);

        Auth::login($user);

        return redirect('/dashboard');

    }
}

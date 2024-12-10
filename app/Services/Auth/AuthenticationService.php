<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationService
{
    /**
     * Attempt to authenticate a user.
     *
     * @param array $credentials
     * @return User
     * @throws ValidationException
     */
    public function attemptLogin(array $credentials): User
    {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        return Auth::user();
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request): void
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
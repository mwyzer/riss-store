<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Return inertia
        return inertia('Auth/Login');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Use Auth facade instead of auth() helper
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user());
        }

        // Return back with error if authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Where to redirect users after login.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check if the authenticated user has the 'Admin' role
        if ($user->hasRole('Admin')) {
            return redirect()->route('account.dashboard');
        }

        // For other roles or users, redirect to the homepage
        return redirect()->route('web.home.index');
    }
}

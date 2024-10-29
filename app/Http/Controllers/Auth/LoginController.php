<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //return inertia
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
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Use Auth facade instead of auth() helper
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('account.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
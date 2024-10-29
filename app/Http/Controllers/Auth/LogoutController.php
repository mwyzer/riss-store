<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Use Auth facade instead of auth() helper
        Auth::logout();
        
        // Invalidate session
        $request->session()->invalidate();
        
        // Regenerate session token
        $request->session()->regenerateToken();
        
        // Redirect to login page
        return redirect('/login');
    }
}

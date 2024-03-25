<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function __construct(){

    }

    public function store(Request $request){
        $credentials = $request->validate([
            "username"=> ["required","string"],
            "password"=> ["required","string"],
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'credentials' => __('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        // for default redirect to /
        return redirect()->intended();
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'you logged out!');
    }

}

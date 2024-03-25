<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            "name" => ["required", "string", 'max:20'],
            "username" => ["required", "string", 'max:50', 'unique:users'],
            "email" => ["required", "string", "email", 'max:50', 'unique:users'],
            "password" => ["required", "confirmed", Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password), //?with bcrypt
            // 'password' => Hash::make($credentials->password), //? with facade hash
        ]);

        //? Auto login with facade Auth
        Auth::login($user);
        return redirect()->intended();

        //? manual login redirect to login
        // return to_route('login')->with('status','account create successful');

        // return $credentials;
    }
}

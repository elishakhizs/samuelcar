<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\entries;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Entry;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('auth-page')
            ->with('success', 'You have logged in successfully!');// change where you want
        }
        return redirect()->route('auth-page')
        ->with('error', 'The email or password you entered is incorrect.');

        return back()->withErrors(['email' => 'Invalid credentials']);
        return back()->withErrors(['password' => 'Invalid Password']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('auth-page')
        ->with('success', 'You have registered successfully!');
    }

    
}
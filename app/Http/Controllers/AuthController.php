<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }
    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function accountRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:25|alpha_dash:ascii',
            'password' => 'required|min:5',
        ]);
        
        User::create($validated);
        
        
        return to_route('login.show')->with('succsess', 'Your account has been created! Please Login!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return to_route('home');
    }
}

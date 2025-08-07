<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required|max:50|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:50',
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        Auth::login($user);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:50',
        ]);
        if (Auth::attempt($incomingFields)) {
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user
        $request->session()->invalidate(); // Clears session data
        $request->session()->regenerateToken(); // Generates a fresh CSRF token
        return view('logout');
    }
}

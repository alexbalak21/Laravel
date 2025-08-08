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
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:6|max:50',
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $loginType => $request->login,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user
        $request->session()->invalidate(); // Clears session data
        $request->session()->regenerateToken(); // Generates a fresh CSRF token
        return view('logout');
    }
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        if ($user == null) return redirect('/login');
        $request->validate([
            'name' => 'required|max:50|unique:users,name,' . Auth::user()->id,
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/profile')->with('success', 'Profile updated successfully');
    }
}

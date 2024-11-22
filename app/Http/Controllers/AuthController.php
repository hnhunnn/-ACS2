<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //Hiển thị form đăng nhập
    public function showLoginForm()
{
    return view('auth.login'); // Tạo file giao diện auth/login.blade.php
}
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->route('dashboard')->with('success', 'Login successful');
    }

    return back()->withErrors(['username' => 'Invalid credentials.']);
}
    //Hiển thị form đăng ký
    public function showRegisterForm()
{
    return view('auth.register'); // Tạo file giao diện auth/register.blade.php
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'phone' => 'required|string|max:15',
    ]);

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'role' => 'customer',
    ]);

    return redirect()->route('login')->with('success', 'Registration successful. Please login.');
}
    // Đăng xuất
    public function logout()
{
    Auth::logout();
    return redirect()->route('login')->with('success', 'Logged out successfully.');
}
}

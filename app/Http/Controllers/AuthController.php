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
    return view('users.loginU'); 
}
public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string|min:6',
    ]);



    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->route('home');
    }

 
    return redirect()->back()->withErrors(['login' => 'Invalid username or password.']);
}

    //Hiển thị form đăng ký
    public function showRegisterForm()
{
    return view('users.loginU'); 
   }

public function register(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'email' => 'required|string|email',
        'password' => 'required|string|min:6',

    ]);

    User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'customer',
    ]);

    return redirect()->route('loginU');
}
    // Đăng xuất
    public function logout()
{
    Auth::logout();
    return redirect()->route('login')->with('success', 'Logged out successfully.');
}
}

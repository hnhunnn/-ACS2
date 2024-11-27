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
           'username' => 'required|string|max:255', // Kiểm tra username là chuỗi, không dài hơn 255 ký tự
           'name' => 'required|string|max:255', // Kiểm tra name là chuỗi và tối đa 255 ký tự
           'password' => 'required|string|min:6', // Kiểm tra password tối thiểu 6 ký tự
       ]);
   
    User::create([
        'username' => $request->username,
        'name' => $request->name,
        'password' => Hash::make($request->password),
        'role' => 'customer',
    ]);

    return redirect()->route('loginU');
}
    // Đăng xuất
    public function logout()
{
    Auth::logout();
    return redirect()->back()->with('success', 'Logged out successfully.');
}
}

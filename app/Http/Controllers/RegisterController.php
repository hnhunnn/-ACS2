<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');    
    }
     // Xử lý logic đăng ký
    public function register( Request $request)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:15',
        ]);

        // Lưu thông tin người dùng
        $user = User::create([
            'name' => $request->name,
            'password' => $request->password, // Sẽ được mã hóa nhờ setPasswordAttribute
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'user', // Mặc định là 'user'
        ]);

        // Trả về thông báo thành công
        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }

}

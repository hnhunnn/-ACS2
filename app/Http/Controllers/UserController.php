<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showProfile()
    {
        $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập

        return view('users.profile', ['user' => $user]); // Truyền dữ liệu qua view
    }

    // sửa và lưu thông tin người dùng
    public function update(Request $request)
{
    // Lấy người dùng hiện tại
    $user = Auth::user();

    // Cập nhật thông tin người dùng
    $user->username = $request->input('username');
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password')); // Mã hóa mật khẩu
    }
    $user->name = $request->input('fullname');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');

    // Lưu vào cơ sở dữ liệu
    $user->save();

    // Trả về thông báo flash
    return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công!');
}

}

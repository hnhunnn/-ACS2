<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{

    // Xử lý gửi email reset
    public function sendResetLink(Request $request)
    {
    $request->validate([
        'email' => 'required|email|exists:user,email', // Kiểm tra email có trong cơ sở dữ liệu không
    ], [
        'email.exists' => 'Email không tồn tại trong hệ thống.',
    ]);

    // Gửi email reset mật khẩu
    $status = Password::sendResetLink(
        $request->only('email')
    );
    // Nếu link reset được gửi thành công, thông báo cho người dùng
    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', 'Link đặt lại mật khẩu đã được gửi đến email của bạn.')
        : back()->withErrors(['email' => 'Không thể gửi link đặt lại mật khẩu. Vui lòng thử lại sau.']);
    }


    // 
    public function reset(Request $request)
    {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:user,email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password),
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('loginU')->with('status', 'Mật khẩu đã được đặt lại thành công.')
        : back()->withErrors(['email' => 'Không thể đặt lại mật khẩu.']);
    }

}

@extends('layouts.app')

@section('content')
<br> <br>
<div class="container">
    <form method="POST" action="{{ route('resetPass') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu mới:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn-submit">Đặt lại mật khẩu</button>
    </form>
</div> 
<br> <br>
<style>
    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #2c3e50;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    form label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: #ecf0f1;
        font-weight: bold;
    }

    form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        font-size: 14px;
        border: 1px solid #bdc3c7;
        border-radius: 5px;
        background-color: #fdfdfd;
        color: #000000;
    }

    form input[type="password"]:focus {
        border-color: #f39c12;
        outline: none;
        background-color: #ffffff;
    }

    form .error {
        color: #e74c3c;
        font-size: 12px;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    form button {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        background-color: #f39c12;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #e67e22;
    }
</style>

@endsection

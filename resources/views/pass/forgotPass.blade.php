@extends('layouts.app')

@section('content')
<div class="container" >
    <h2>Quên mật khẩu</h2>
    <form method="POST" action="{{ route('forgot') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
            <br><button type="submit">Đặt lại mật khẩu</button>
    </form>
            @if(session('status'))
                <p style="color: green;">{{ session('status') }}</p>
            @endif     
</div>

 <style>
    .container{
        padding: 20px;
        color:#fcfcfc;
        text-align: center;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #fcfcfc;
    }
    span {
        color: red;
        font-size: 12px;
    }
    input[type="email"] {
        padding: 10px;
        width: 100%;
        max-width: 300px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 10px;
        border: none;
        border-radius: 5px;
        font-size: 13px;
        
}
 </style>
@endsection

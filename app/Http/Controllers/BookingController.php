<?php

namespace App\Http\Controllers;

use App\Models\Movie; 
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show($id)
    {
        // Lấy thông tin phim từ cơ sở dữ liệu
        $movie = Movie::findOrFail($id);

        // Trả về view đặt vé với thông tin phim
        return view('users.booking', compact('movie'));
    }
}

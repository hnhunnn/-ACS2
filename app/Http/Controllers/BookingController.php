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

        // Lấy thông tin movie và liên kết với schedule
    $movie = Movie::with('schedule.branch')->findOrFail($id);
     // Truy vấn thêm nếu cần
    // $schedule = $movie->schedule;
    // $branch = $schedule ? $schedule->branch : null;

        // Trả về view đặt vé với thông tin phim
        return view('users.booking', compact('movie'));
    }
}

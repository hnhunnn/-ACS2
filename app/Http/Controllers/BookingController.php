<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;



class BookingController extends Controller
{
    public function show($id)
    {
        // Lấy thông tin phim và liên kết với schedule và branch
        $movie = Movie::with('schedule.branch')->findOrFail($id);

        // Kiểm tra xem có lịch chiếu nào không
        if ($movie->schedule->isEmpty()) {
            return redirect()->back()->with('error', 'Không có lịch chiếu cho bộ phim này.');
        }

        // Chuyển danh sách lịch chiếu
        $schedule = $movie->schedule->first(); // Lấy lịch chiếu đầu tiên
        $branch = $schedule ? $schedule->branch : null;

        // Trả danh sách giờ chiếu nếu tồn tại
        $showtimes = $schedule && is_array($schedule->showtime) ? $schedule->showtime : [];

        // Trả về view với thông tin cần thiết
        return view('users.booking', compact('movie', 'branch', 'schedule', 'showtimes'));
    }

    // ĐẶT VÉ 

}

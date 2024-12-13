<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

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

    // Chuyển mảng showtime thành chuỗi (nếu cần)
    $schedule = $movie->schedule->map(function($schedule) {
        // Giả sử showtime là mảng và bạn muốn nối các phần tử thành chuỗi
        if (is_array($schedule->showtime)) {
            $schedule->showtime = implode(', ', $schedule->showtime);  // Nối các phần tử mảng thành chuỗi
        }
        return $schedule;
    });

    // Lấy lịch chiếu đầu tiên nếu có
    $schedule = $schedule->first();
    $branch = $schedule ? $schedule->branch : null;

    // Trả về view với thông tin cần thiết
    return view('users.booking', compact('movie', 'branch', 'schedule'));
}



}

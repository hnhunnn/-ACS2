<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Booking;
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
// XỬ LÝ ĐẶT VÉ
public function process(Request $request, $movieId)
{
    $seats = $request->input('seats'); // Ghế được chọn
    if (empty($seats)) {
        return response()->json(['success' => false, 'message' => 'Chưa chọn ghế.']);
    }

    foreach ($seats as $seatId) {
        // Kiểm tra ghế đã được đặt chưa
        if (Booking::where('movie_id', $movieId)->where('seat_id', $seatId)->exists()) {
            return response()->json(['success' => false, 'message' => "Ghế $seatId đã được đặt."]);
        }

        // Tạo bản ghi mới
        Booking::create([
            'movie_id' => $movieId,
            'seat_id' => $seatId,
            'booking_time' => now()->toTimeString(),
            'booking_date' => now()->toDateString(),
        ]);
    }

    return response()->json(['success' => true, 'message' => 'Đặt vé thành công!']);
}





}

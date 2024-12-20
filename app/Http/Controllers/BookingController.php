<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class BookingController extends Controller
{
    // public function show($id)
    // {
    //     // Lấy thông tin phim và liên kết với schedule và branch
    //     $movie = Movie::with('schedule.branch')->findOrFail($id);

    //     // Kiểm tra xem có lịch chiếu nào không
    //     if ($movie->schedule->isEmpty()) {
    //         return redirect()->back()->with('error', 'Không có lịch chiếu cho bộ phim này.');
    //     }

    //     // Chuyển danh sách lịch chiếu
    //     $schedule = $movie->schedule->first(); // Lấy lịch chiếu đầu tiên
    //     $branch = $schedule ? $schedule->branch : null;

    //     // Trả danh sách giờ chiếu nếu tồn tại
    //     $showtimes = $schedule && is_array($schedule->showtime) ? $schedule->showtime : [];

    //     $seats = DB::table('seat')
    //         ->where('movie_id', $id)
    //         ->get();

    //     // Trả về view với thông tin cần thiết
    //     return view('users.booking', compact('movie', 'branch', 'schedule', 'showtimes', 'seats'));
    // }

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

        // Lấy thông tin ghế từ bảng seat
        $seats = DB::table('seat')
            ->where('movie_id', $id)
            ->get();

        // Lấy danh sách ghế đã được đặt (trong bảng booking)
        $bookedSeats = DB::table('booking')
            ->where('movie_id', $id)
            ->pluck('seat_id');  // Lấy danh sách ID ghế đã đặt

        // Trả về view với thông tin cần thiết
        return view('users.booking', compact('movie', 'branch', 'schedule', 'showtimes', 'seats', 'bookedSeats'));
    }


    // ĐẶT VÉ 
    // public function getSeats($movieId)
    // {
    //     $seats = DB::table('seat')
    //         ->where('movie_id', $movieId)
    //         ->get();

    //     return view('users.booking', compact('seats'));
    // }

    // public function bookSeats(Request $request, $movieId)
    // {
    //     $userId = Auth::user();  // Lấy ID người dùng đã đăng nhập
    //     $seatIds = $request->input('seats'); // Danh sách ID ghế được chọn

    //     try {
    //         DB::beginTransaction();

    //         foreach ($seatIds as $seatId) {
    //             // Kiểm tra ghế có khả dụng không
    //             $seat = DB::table('seat')->where('id', $seatId)->where('is_available', true)->first();
    //             if (!$seat) {
    //                 return response()->json(['success' => false, 'message' => 'Ghế đã được đặt!']);
    //             }

    //             // Lưu thông tin đặt vé
    //             DB::table('booking')->insert([
    //                 'user_id' => $userId,
    //                 'movie_id' => $movieId,
    //                 'seat_id' => $seatId,
    //                 'booking_time' => now(),
    //                 'booking_date' => now()->toDateString(),
    //             ]);

    //             // Cập nhật trạng thái ghế
    //             DB::table('seat')->where('id', $seatId)->update(['is_available' => false]);
    //         }

    //         DB::commit();

    //         return response()->json(['success' => true, 'message' => 'Đặt vé thành công!']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra khi đặt vé.']);
    //     }
    // }


    // Lấy danh sách ghế
    public function getSeats($movieId)
    {
        // Lấy tất cả ghế của bộ phim này
        $seats = DB::table('seat')
            ->where('movie_id', $movieId)
            ->get();

        // Lấy tất cả ghế đã được đặt cho bộ phim này
        $bookedSeats = DB::table('booking')
            ->where('movie_id', $movieId)
            ->pluck('seat_id');  // Lấy danh sách ID ghế đã đặt

        return view('users.booking', compact('seats', 'bookedSeats'));
    }


    // Đặt ghế
    public function bookSeats(Request $request, $movieId)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        $userId = Auth::user()->id;

        // Lấy danh sách ghế người dùng chọn
        $seatIds = $request->input('seats');

        // Bắt đầu giao dịch
        try {
            DB::beginTransaction();

            // Kiểm tra và cập nhật ghế
            foreach ($seatIds as $seatId) {
                // Kiểm tra ghế có còn trống không
                $seat = Seat::where('id', $seatId)->where('is_available', true)->first();
                if (!$seat) {
                    return response()->json(['success' => false, 'message' => 'Ghế đã được đặt!']);
                }

                // Lưu thông tin đặt vé vào bảng booking
                Booking::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'seat_id' => $seatId,
                    'booking_time' => now()->format('H:i:s'),
                    'booking_date' => now()->toDateString(),
                ]);

                // Cập nhật trạng thái ghế thành không còn trống
                $seat->update(['is_available' => false]);
            }

            // Xác nhận giao dịch
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Đặt vé thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra khi đặt vé.']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    // public function index()
    // {
    //     // Lấy danh sách phim: phim đang chiếu và phim sắp chiếu
    //     $dangChieu = movie::where('showing', 1)->get(); // Phim đang chiếu
    //     $sapChieu = movie::where('showing', 0)->get(); // Phim sắp chiếu

    //     // Truyền dữ liệu vào view
    //     return view('users.home', compact('dangChieu', 'sapChieu'));
    // }

    /**
     * Display the specified movie details.
     */
    public function show($id)
    {
        // Tìm phim theo ID
        $movie = Movie::findOrFail($id);

        // Trả về view hiển thị chi tiết phim
        return view('users.detail', compact('movie'));
    }
    public function showMovieDetail(Request $request)
    {
        $id = $request->query('id');
        $movieDetail = movie::findOrFail($id);
        return view('users.detail', compact("movieDetail"));
    }
}

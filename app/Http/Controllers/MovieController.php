<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
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
// HIỂN THỊ LIST PHIM
//     public function index()
// {
//     // Lấy tất cả các phim từ cơ sở dữ liệu
//     $movies = Movie::all(); 

//     // Truyền dữ liệu vào view
//     return view('admin.listMovie', compact('movies')); // Sử dụng compact để truyền biến
// }

}

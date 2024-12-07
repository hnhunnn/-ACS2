<?php

namespace App\Http\Controllers;

use App\Models\cinema;
use App\Models\branch;
use App\Models\schedule;
use Illuminate\Http\Request;

class CinemaController extends Controller
{

    // LẤY TẤT CẢ CÁC RẠP 
    public function getCinemas(Request $request)
    {
        $cinemas = Cinema::all(); // Lấy toàn bộ danh sách rạp
        $branches = [];
        $schedules = [];
        $movies = \App\Models\Movie::all(); // Lấy tất cả các bộ phim

        if ($request->has('cinema_id')) {
            $cinemaId = $request->input('cinema_id');

            // Lấy danh sách chi nhánh theo rạp đã chọn
            $branches = Branch::where('cinema_id', $cinemaId)->get();
        } else {

            $branches = [];
        }
        if ($request->has('branch_id')) {
            $branchId = $request->input('branch_id');; // Lấy id của chi nhánh
            $schedules = json_decode(Schedule::where('branch_id', $branchId)->get()); // 
        } else {

            $schedules = [];
        }


        return view('users.home', compact('cinemas', 'branches', 'schedules', 'movies'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id) {}

    public function edit(cinema $cinema)
    {
        //
    }


    public function update(Request $request, cinema $cinema)
    {
        //
    }

    public function destroy(cinema $cinema)
    {
        //
    }
}

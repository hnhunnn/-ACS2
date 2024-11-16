<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\schedule;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function getSchedules($id)
    {
       // Lấy lịch chiếu của chi nhánh cùng thông tin phim
        $schedules = schedule::where('branch_id', $id)->get();
        return response()->json($schedules);

        // $schedules = schedule::where('branch_id', $branchId)
        //     ->with('movie') 
        //     ->get();

        // return response()->json($schedules);
        
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(branch $branch)
    {
        //
    }
}

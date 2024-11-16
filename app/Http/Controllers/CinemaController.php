<?php

namespace App\Http\Controllers;

use App\Models\cinema;
use App\Models\branch;
use App\Models\schedule;
use Illuminate\Http\Request;

class CinemaController extends Controller
{

    public function getBranches($id)
    {
        $branches = branch::where('cinema_id', $id)->get();
    
        return response()->json($branches);
    }
    
    

    public function index()
    {
       
    }

    
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }


    public function show( $id)
    {
      
    }

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

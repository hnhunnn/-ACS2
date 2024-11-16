<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    //
    use HasFactory;
    protected $table = 'schedule'; 
    protected $fillable = ['branch_id', 'movie_id', 'showtime'];
    protected $casts = [
        'showtime' => 'array', // Định nghĩa kiểu dữ liệu 
    ];
    
    
    // Một lịch chiếu thuộc về một chi nhánh
    public function branch()
    {
        return $this->belongsTo(branch::class);
    }
    public function movie()
    {
        return $this->belongsTo(movie::class); // Một lịch chiếu thuộc về một phim
    }
}

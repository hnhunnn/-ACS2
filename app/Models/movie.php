<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    //
    use HasFactory;
    protected $table = 'movie';

    protected $fillable = ['image_path', 'movieName', 'description', 'trailer_url', 'release_date', 'now_showing', 'coming_soon'];

    public function schedule()
    {
        return $this->hasMany(schedule::class); // Một phim có nhiều lịch chiếu
    }
}

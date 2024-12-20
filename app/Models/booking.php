<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    protected $fillable = ['user_id', 'movie_id', 'seat_id', 'booking_time', 'booking_date'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}

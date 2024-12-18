<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class seat extends Model
{
    use HasFactory;
    protected $table = 'seat';

    protected $fillable = ['cinema_id', 'number', 'type', 'is_available', 'movie_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function markAsUnavailable()
{
    $this->update(['is_available' => false]);
}

}

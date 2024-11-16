<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cinema extends Model
{
    //
    use HasFactory;
    protected $table = 'cinema';

    protected $fillable = ['cinemaName', 'logo'];

    public function branch()
    {
        return $this->hasMany(branch::class);
    }
}

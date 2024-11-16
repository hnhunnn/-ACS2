<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    //
    use HasFactory;
    protected $table = 'branch';

    protected $fillable = ['cinema_id', 'branchName', 'address'];

        // Một chi nhánh có nhiều lịch chiếu
    public function schedule()
    {
        return $this->hasMany(schedule::class);
    }

        // Một chi nhánh thuộc về một rạp
    public function cinema()
    {
        return $this->belongsTo(cinema ::class);
    }
}

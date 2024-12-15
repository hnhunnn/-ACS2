<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class user extends Authenticatable
{
    use Notifiable;
    use HasFactory;
   // Các cột trong bảng có thể được gán giá trị
   protected $table = 'user';
   protected $fillable = [
    'name',
    'username',
    'password',
    'email',
    'phone',
    'role',
    ];
    public $timestamps = false;
    

    // Ẩn các cột không muốn trả về trong API hoặc view
    protected $hidden = [
        'password',
    ];
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use Notifiable;
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
    //  // Tự động mã hóa mật khẩu khi lưu
    //  public function setPasswordAttribute($value)
    //  {
    //      $this->attributes['password'] = bcrypt($value);
    //  }


}

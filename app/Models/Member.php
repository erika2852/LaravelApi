<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $table = 'members'; // 테이블 이름 변경
    protected $primaryKey = 'customer_id'; // 기본 키 변경

    protected $fillable = ['name', 'email', 'password'];
}

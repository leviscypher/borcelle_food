<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_info';

    protected $fillable = [
        'fullname', 'nickname', 'phone', 'email', 'birthday', 'user_id', 'avatar', 'gender'
    ];
}

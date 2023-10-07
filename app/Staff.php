<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $table = 'staffs';

    protected $guard = 'staff';

    protected $fillable = [
        'name', 'branch', 'username', 'password', 'role', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
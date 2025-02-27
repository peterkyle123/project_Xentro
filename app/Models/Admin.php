<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin_login';

    protected $fillable = [
        'username',
        'password',
        'email', // Ensure email is in the fillable array
        'profile_pic',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $timestamps = false;
}
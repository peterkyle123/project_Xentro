<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Specify custom table name if it differs from the default 'admins'
    protected $table = 'admin_login';

    // Define fillable attributes if needed
    protected $fillable = ['username', 'password'];
}

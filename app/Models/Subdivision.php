<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    use HasFactory;

    protected $table = 'ngh'; // Explicitly set the table

    protected $fillable = [
        'sub_name', 'price', 'image',
        'block_number', 'block_area', 'house_number',
        'house_area', 'house_status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'price',
        'address',
        'city',
        'state',
        'zip',
        'bedrooms',
        'bathrooms',
        'area',
        'status',
    ];
}
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
        'category',
        'housing_type',
        'custom_housing_type', // Add this field
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
        'image',
    ];
}
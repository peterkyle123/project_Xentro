<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    use HasFactory;

    protected $table = 'ngh'; // Explicitly setting the table name

    protected $fillable = ['sub_name', 'image', 'block_number', 'house_number', 'house_area', 'house_status'];


    // Relationship: One Subdivision has Many Houses
    public function houses()
    {
        return $this->hasMany(House::class, 'subdivision_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'subdivision_id',
        'block_id',
        'house_number',
        'house_area',
        'house_price',
        'house_status',
        'assigned_house_number',
    ];

    public function subdivision()
    {
        return $this->belongsTo(Subdivision::class);
    }
}

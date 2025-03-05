<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'subdivision_id',
        'house_price',
        'house_area',
        'assigned_house_number',
    ];

    public function subdivision()
    {
        return $this->belongsTo(Subdivision::class);
    }
}

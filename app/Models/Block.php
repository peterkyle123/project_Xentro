<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'subdivision_id', // ✅ Add this
        'block_area'
    ];

    public function subdivision()
    {
        return $this->belongsTo(Subdivision::class);
    }
    public function houses()
{
    return $this->hasMany(House::class);
}
}


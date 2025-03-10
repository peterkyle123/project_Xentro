<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model {
    protected $fillable = ['subdivision_id', 'name'];

    public function subdivision() {
        return $this->belongsTo(Subdivision::class);
    }
    public function subdivisions()
{
    return $this->belongsToMany(Subdivision::class, 'subdivision_amenity');
}
}


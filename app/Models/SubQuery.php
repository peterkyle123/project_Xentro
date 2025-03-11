<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubQuery extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'sub_query';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'purpose',
        'lot',
        'address',
        'block',
        'subdivision_id'

    ];
    public function subdivision()
{
    return $this->belongsTo(Subdivision::class, 'subdivision_id');
}

}

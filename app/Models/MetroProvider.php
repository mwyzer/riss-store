<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetroProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'provider_name',
        'location_id', // Foreign key to the locations table
        'position',
        'holder',
        'status',
        'limit',
    ];

        /**
     * Relationship with Postpaid
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

}

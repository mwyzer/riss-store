<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocationService extends Model
{
    //
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'location_id',
        'service_period',
        'available',
    ];

    /**
     * Define the relationship to the Location model.
     * Assuming there is a Location model.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}

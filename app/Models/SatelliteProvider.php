<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SateliteProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'provider_name',
        'location_id',
        'position',
        'holder',
        'status',
    ];

    /**
     * Relationship with Location
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPaid extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'provider_id', // Foreign key for PostpaidProvider
        'location_id',
        'position',
        'holder',
        'status',
        'limit',
    ];

    /**
     * Relationship with PostpaidProvider
     */
    public function provider()
    {
        return $this->belongsTo(PostpaidProvider::class);
    }

    /**
     * Relationship with Location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}

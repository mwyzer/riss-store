<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrepaidProvider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number',
        'provider_name',
        'location_id',
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

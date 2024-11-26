<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    // Table associated with the model (if it differs from the class name)
    protected $table = 'stocks';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'location_id',
        'stock_name',
    ];

    /**
     * Relationship with the Location model.
     * Assuming a `Location` model exists.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Relationship with the VoucherProfile model.
     */
    public function voucherProfile()
    {
        return $this->belongsTo(VoucherProfile::class);
    }
}

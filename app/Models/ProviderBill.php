<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'provider_type',
        'provider_name',
        'location',
        'holder_name',
        'status',
        'daily_bill',
        'monthly_bill',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'daily_bill' => 'decimal:2',
        'monthly_bill' => 'decimal:2',
    ];
}

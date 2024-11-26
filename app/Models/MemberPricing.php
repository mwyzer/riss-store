<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_profile_id',
        'member_level',
        'price',
        'discount_percentage',
        'final_price',
    ];

    /**
     * Relationship with VoucherProfile
     */
    public function voucherProfile()
    {
        return $this->belongsTo(VoucherProfile::class);
    }
}

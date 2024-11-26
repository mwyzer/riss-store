<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_profile_id',
        'partner_type', // Type of partner: "seller" or "partner"
        'price',
        'discount_percentage',
        'final_price',
        'partner_profit',
    ];

    /**
     * Relationship with VoucherProfile
     */
    public function voucherProfile()
    {
        return $this->belongsTo(VoucherProfile::class);
    }
}

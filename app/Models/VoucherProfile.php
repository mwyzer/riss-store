<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quota',
        'validity_days',
        'warning_stock_low',
        'warning_stock_critical',
        'is_published',
        'show_stock',
        'max_vouchers_per_transaction',
    ];
  /**
     * Relationship with MemberPricing
     */
    public function memberPricings()
    {
        return $this->hasMany(MemberPricing::class);
    }

    /**
     * Relationship with FlashSale
     */
    public function flashSales()
    {
        return $this->hasMany(FlashsaleProfile::class);
    }

    /**
     * Get the active flash sale, if any.
     */
    public function activeFlashSale()
    {
        return $this->flashSales()->where('start_time', '<=', now())->where('end_time', '>=', now())->first();
    }
}

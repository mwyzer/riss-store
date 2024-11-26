<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashsaleProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_profile_id',   // Foreign key to the voucher profile
        'flash_sale_price',     // Discounted price during the flash sale
        'start_time',           // Flash sale start time
        'end_time',             // Flash sale end time
        'stock',                // Total stock allocated for the flash sale
        'sold',                 // Vouchers sold during the flash sale
    ];

    /**
     * Relationship with VoucherProfile
     */
    public function voucherProfile()
    {
        return $this->belongsTo(VoucherProfile::class);
    }

    /**
     * Check if the flash sale is currently active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        $now = now();
        return $this->start_time <= $now && $this->end_time >= $now;
    }

    /**
     * Get remaining stock for the flash sale.
     *
     * @return int
     */
    public function remainingStock(): int
    {
        return max($this->stock - $this->sold, 0);
    }
}

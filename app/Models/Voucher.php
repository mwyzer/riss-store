<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_type_id',
        'profile_name',
    ];

    /**
     * Relationship with VoucherType
     */
    public function voucherType()
    {
        return $this->belongsTo(VoucherType::class);
    }

    /**
     * Relationship with VoucherTransactions
     */
    public function transactions()
    {
        return $this->hasMany(VoucherTransaction::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relationship with Vouchers
     */
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}

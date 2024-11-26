<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherTransaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'voucher_id',
        'code',
        'comment',
        'status',
        'import_date',
        'sold_date',
    ];

    /**
     * Relationship with Voucher
     */
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}

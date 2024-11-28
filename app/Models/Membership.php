<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'customer_id',
        'location',
        'status_level',
        'membership_level',
        'balance',
        'total_transactions',
    ];

    /**
     * Get the WhatsApp link for the member.
     */
    public function getWhatsAppLinkAttribute()
    {
        return 'https://wa.me/' . $this->customer_id;
    }
}
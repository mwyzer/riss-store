<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'customerTitle',
        'customerName',
        'customerWhatsAppNumber',
        'customerLocation',
        'customerOccupation',
        'customerPosition',
        'customerPhotoself',
        'customerPhotoid',
        'membershipLevelId',
    ];

    // Relationship with the Payment model
    public function payments()
    {
        return $this->hasMany(Payment::class, 'customerId');
    }

    // Relationship with the Invoice model
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customerId');
    }
}

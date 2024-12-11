<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customerTitle',                // Customer title (e.g., Mr., Mrs.)
        'customerName',                 // Customer name
        'customerUniqueid',            // Unique identifier (e.g., KTP/Passport number)
        'customerType',                 // Customer type (KTP/Passport)
        'customerWhatsappnumber',      // WhatsApp contact number
        'location_id',          // Foreign key for location
        'location',             // Free-text location
        'customerOccupation',           // Customer occupation
        'customerPosition',             // Customer position
        'partner_debt',         // Partner debt
        'registered_referrals', // Number of referrals registered
        'customerPhotoself',           // URL/path to customer photo
        'self_photo_with_id',   // URL/path to selfie with ID
        'membership_level_id',  // Foreign key for membership level
        'customerStatus',               // Customer status (e.g., Registered)
        'is_active',            // Whether the customer is active
        'is_mandatory',         // Whether specific attributes are mandatory
    ];

    /**
     * Relationship with the Payment model
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'customerId');
    }

    /**
     * Relationship with the Invoice model
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customerId');
    }
}

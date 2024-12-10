<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    // Table name (optional if it doesn't match Laravel's conventions)
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_title',              // Customer title (e.g., Mr., Mrs.)
        'customer_name',               // Customer name
        'customer_unique_id',          // Unique identifier (e.g., KTP/Passport number)
        'customer_type',               // Customer type (KTP/Passport)
        'customer_whatsapp_number',    // WhatsApp contact number
        'location_id',                 // Foreign key for location
        'location',                    // Free-text location
        'customer_occupation',         // Customer occupation
        'customer_position',           // Customer position
        'partner_debt',                // Partner debt
        'registered_referrals',        // Number of referrals registered
        'customer_photo_self',         // URL/path to customer photo
        'self_photo_with_id',          // URL/path to selfie with ID
        'membership_level_id',         // Foreign key for membership level
        'customer_status',             // Customer status (e.g., Registered)
        'is_active',                   // Whether the customer is active
        'is_mandatory',                // Whether specific attributes are mandatory
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_mandatory' => 'boolean',
        'partner_debt' => 'decimal:2',
    ];

    /**
     * Relationship with the Payment model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'customer_id');
    }

    /**
     * Relationship with the Invoice model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customer_id');
    }

    /**
     * Relationship with the MembershipLevel model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function membershipLevel()
    {
        return $this->belongsTo(MembershipLevel::class, 'membership_level_id');
    }

    /**
     * Relationship with the Location model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * Relationship with the CustomerStatusHistory model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statusHistory()
    {
        return $this->hasMany(CustomerStatusHistory::class, 'customer_id');
    }

    /**
     * Relationship with the Referral model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(Referral::class, 'customer_id');
    }

    /**
     * Relationship with the Sale model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }
}

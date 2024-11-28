<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KtpDataAccessPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_type_id',       // Foreign key to PartnerType
        'ktp_data_category_id',  // Foreign key to KtpDataCategory
        'access_level_id',       // Foreign key to AccessLevel
    ];

    /**
     * Relationship with PartnerType
     */
    public function partnerType()
    {
        return $this->belongsTo(PartnerType::class, 'partner_type_id');
    }

    /**
     * Relationship with KtpDataCategory
     */
    public function ktpDataCategory()
    {
        return $this->belongsTo(KtpDataCategory::class, 'ktp_data_category_id');
    }

    /**
     * Relationship with AccessLevel
     */
    public function accessLevel()
    {
        return $this->belongsTo(AccessLevel::class, 'access_level_id');
    }
}

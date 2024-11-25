<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusSettings extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'partner_type_id',
        'bonus_type',
        'enabled',
        'points',
        'nominal_required',
        'applies_every',
    ];

    // Relationship with PartnerType
    public function partnerType()
    {
        return $this->belongsTo(PartnerType::class);
    }
}

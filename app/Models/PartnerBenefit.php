<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerBenefit extends Model
{
    //
    use HasFactory;

    protected $fillable = ['benefit_id', 'partner_type_id', 'enabled'];

    // Relationship with Benefit
    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }

    // Relationship with PartnerType
    public function partnerType()
    {
        return $this->belongsTo(PartnerType::class);
    }
}

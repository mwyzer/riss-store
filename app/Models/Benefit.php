<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    //
    use HasFactory;

    protected $fillable = ['description'];

    // Relationship with PartnerBenefit
    public function partnerBenefits()
    {
        return $this->hasMany(PartnerBenefit::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sellerPrices()
    {
        return $this->hasMany(PartnerPricing::class)->where('partner_type', 'seller');
    }

    public function partnerPrices()
    {
        return $this->hasMany(PartnerPricing::class)->where('partner_type', 'partner');
    }

    public function voucherPartnerPrices()
    {
        return $this->hasMany(VoucherPartnerPrice::class);
    }

    public function locationPartners()
    {
        return $this->hasMany(LocationPartner::class);
    }

    public function customerDataAccessPermissions()
    {
        return $this->hasMany(CustomerDataAccessPermission::class);
    }

    public function ktpDataAccessPermissions()
    {
        return $this->hasMany(KtpDataAccessPermission::class);
    }

    public function pasporDataAccessPermissions()
    {
        return $this->hasMany(PasporDataAccessPermission::class);
    }

    public function changeHistoryDataAccessPermissions()
    {
        return $this->hasMany(ChangeHistoryDataAccessPermission::class);
    }

    public function dataAccessPermissions()
    {
        return $this->hasMany(DataAccessPermission::class);
    }

    public function bonusSettings()
    {
        return $this->hasMany(BonusSettings::class);
    }

    public function partnerBenefits()
    {
        return $this->hasMany(PartnerBenefit::class);
    }
}

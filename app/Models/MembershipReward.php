<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MembershipReward extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'membershipLevelId',
        'rewardTypeId',
        'isEnabled',
        'bonusPoints',
        'nominalThreshold',
        'multiplierType',
        'extraConfig',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membershipLevelId');
    }

    public function rewardType()
    {
        return $this->belongsTo(RewardType::class, 'rewardTypeId');
    }
    
}

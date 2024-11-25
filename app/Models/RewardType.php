<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RewardType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rewardTypeName',
    ];

    public function membershipRewards()
    {
        return $this->hasMany(MembershipReward::class, 'rewardTypeId');
    }
}

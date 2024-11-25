<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipLevel extends Model
{
    use SoftDeletes;

    protected $fillable = ['levelName', 'description', 'minSpending'];

    public function rewards()
    {
        return $this->hasMany(MembershipReward::class, 'membershipLevelId');
    }

    public function requirements()
    {
        return $this->hasMany(MembershipRequirement::class, 'membershipLevelId');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupBonus extends Model
{
    //
    protected $fillable = ['levelId', 'bonusEnabled', 'bonusPoints', 'nominalTopup', 'berlakuTiap'];

    public function membershipLevel()
    {
        return $this->belongsTo(MembershipLevel::class, 'levelId');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipRequirement extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['membershipLevelId', 'requirementType'];

    public function membershipLevel()
    {
        return $this->belongsTo(MembershipLevel::class, 'membershipLevelId');
    }
}

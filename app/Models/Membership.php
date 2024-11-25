<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'levelName',
        'description',
        'isActive',
        'rewards',
    ];

    public function referralLevels()
    {
        return $this->hasMany(ReferralLevel::class, 'membershipId');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipLevel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_name', // Changed to snake_case for consistency
        'description',
        'min_spending', // Changed to snake_case for consistency
    ];

    /**
     * Relationship with MembershipReward.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rewards()
    {
        return $this->hasMany(MembershipReward::class, 'membership_level_id'); // Updated to use consistent naming
    }

    /**
     * Relationship with MembershipRequirement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirements()
    {
        return $this->hasMany(MembershipRequirement::class, 'membership_level_id'); // Updated to use consistent naming
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralLevel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_name',
        'membership_id',
    ];

    /**
     * Relationship with Membership.
     */
    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_id');
    }
}

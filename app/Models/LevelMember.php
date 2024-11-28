<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'point_multiplier',
        'bonus_points',
        'minimum_spending',
        'maximum_spending',
        'requirements',
    ];

    /**
     * Decode requirements from JSON format.
     *
     * @return array
     */
    public function getRequirementsAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Encode requirements to JSON format.
     *
     * @param array $value
     */
    public function setRequirementsAttribute($value)
    {
        $this->attributes['requirements'] = json_encode($value);
    }
}

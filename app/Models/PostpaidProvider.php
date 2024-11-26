<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostpaidProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relationship with Postpaid
     */
    public function postpaids()
    {
        return $this->hasMany(PostPaid::class, 'provider_id');
    }
}

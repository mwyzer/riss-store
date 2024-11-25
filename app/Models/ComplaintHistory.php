<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintHistory extends Model
{
    //
    use HasFactory;

    protected $fillable = ['location_id', 'user_id'];

    // Relationship with Location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

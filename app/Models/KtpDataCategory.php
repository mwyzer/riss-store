<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KtpDataCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Name of the category (e.g., ID Number, Name, Address)
        'description', // Description of the category
        'is_active', // Whether the category is active
    ];

    /**
     * Relationship to KtpDataAccessPermission
     */
    public function permissions()
    {
        return $this->hasMany(KtpDataAccessPermission::class, 'ktp_data_category_id');
    }
}

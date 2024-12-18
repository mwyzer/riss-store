<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ServiceType extends Model
{
    use HasFactory, HasUuids;

    // Define the table name if it is not the default
    protected $table = 'service_types';

    // Fillable attributes for mass assignment
    protected $fillable = ['name', 'code', 'availability'];

    // Disable auto-incrementing for the primary key
    public $incrementing = false;

    // Set the primary key type to string (UUID)
    protected $keyType = 'string';
}

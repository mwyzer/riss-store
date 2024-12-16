<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceType extends Model
{
    //
    use HasFactory;

    // Define the table name if it is not the default
    protected $table = 'service_types';

    // Fillable attributes for mass assignment
    protected $fillable = ['name', 'code', 'availability'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', // Add 'id' for UUID mass assignment
        'name',
        'email',
        'password',
        'google_id',
        'google_token',
        'google_refresh_token',
        'google_expires_in',
        'google_token_created_at',
        'google_token_expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'google_token_created_at' => 'datetime',
        'google_token_expires_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Boot function to automatically generate UUID for new models.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid(); // Automatically generate UUID for the user ID
            }
        });
    }

    /**
     * Get an array of permissions assigned to the user.
     *
     * @return array<string, bool>
     */
    public function getPermissionArray(): array
    {
        return $this->getAllPermissions()
            ->mapWithKeys(fn($permission) => [$permission->name => true])
            ->toArray();
    }
}

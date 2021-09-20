<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'unique_id',
        'device_id',
        'device_name',
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'address',
        'state',
        'pincode',
        'country',
        'picture',
        'role_id',
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role_id == 1 ? true : false;
    }

    public function isUser()
    {
        return $this->role_id == 0 ? true : false;
    }

    public function isInactive()
    {
        return $this->role_id == -1 ? true : false;
    }
}

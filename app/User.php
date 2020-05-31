<?php

namespace App;

use App\Models\Agency;
use App\Traits\HasUUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasUUID;


    const CEO = 'ceo';
    const FEELANCER = 'freelancer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isCeo()
    {
        return $this->role === self::CEO;
    }

    public function agency()
    {
        return $this->hasOne(Agency::class);
    }

    public function hasRegisterAgency()
    {
        return !empty($this->agency->name);
    }
}

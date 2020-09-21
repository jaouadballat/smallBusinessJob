<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agency extends Model
{
    use HasUUID, Notifiable;

    protected $guarded = [];
    const TABLE = 'agencies';

    protected $table = self::TABLE;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function ceo()
    {
        return $this->belongsTo(User::class, 'user_id')->whereRole('ceo');
    }

}

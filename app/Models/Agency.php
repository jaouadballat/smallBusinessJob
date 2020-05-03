<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasUUID;

    protected $guarded = [];
    const TABLE = 'agencies';

    protected $table = self::TABLE;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}

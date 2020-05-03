<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasUUID;

    const CREATED_AT = 'postedDate';
    const TABLE = 'jobs';

    protected $guarded = [];
    protected $table = self::TABLE;

    protected function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}


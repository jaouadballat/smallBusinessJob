<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasUUID;

    protected $guarded = [];
    const TABLE = 'messages';

    protected $table = self::TABLE;

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}

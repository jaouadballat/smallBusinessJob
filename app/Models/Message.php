<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasUUID;

    const TABLE = 'messages';

    protected $guarded = [];
    protected $table = self::TABLE;
}

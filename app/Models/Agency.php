<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasUUID;

    protected $guarded = [];
}

<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasUUID;

    const CREATED_AT = 'postedDate';

    protected $fillable = [
        'title',
        'location',
        'salary'
    ];
}


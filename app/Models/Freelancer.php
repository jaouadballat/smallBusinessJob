<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasUUID;

    protected $guarded = [];
    const TABLE = 'freelancers';

    protected $table = self::TABLE;

    public function messages()
    {
        return $this->hasMany(Message::class,  'message_id');
    }
}

<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasUUID;

    protected $table = self::TABLE;

    protected $guarded = [];
    const TABLE = 'freelancers';


    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}

<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasUUID;

    protected $table = self::TABLE;

    protected $guarded = [];
    protected $with = ['messages'];
    const TABLE = 'freelancers';


    public function messages()
    {
        return $this->morphToMany(Message::class, 'messageable');
    }
}

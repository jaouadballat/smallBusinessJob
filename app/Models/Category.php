<?php

namespace App\models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasUUID;

    const TABLE = 'categories';

    protected $guarded = [];
    protected $table = self::TABLE;


    public function jobs()
    {
        return $this->belongsToMany(
            Job::class,
            'category_job',
            'category_id',
            'job_id'
        );
    }


}

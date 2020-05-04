<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasUUID;

    const CREATED_AT = 'postedDate';
    const CURRENCY = '$';
    const TABLE = 'jobs';

    protected $guarded = [];
    protected $table = self::TABLE;

    protected function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_job',
            'job_id',
            'category_id'
        );
    }

    public function salary()
    {
        return round($this->salary) . $this->currency();
    }

    public function currency()
    {
        return self::CURRENCY;
    }

    public function posted_date()
    {
        return $this->postedDate->diffForHumans();
    }
}


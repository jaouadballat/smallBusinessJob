<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasUUID;

    protected $table = self::TABLE;

    protected $guarded = [];
    const TABLE = 'freelancers';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'freelancer_job');
    }

    public function messages()
    {
     return $this->hasMany(Message::class);
    }

    public function alreadyAppliedForThisJob($jobId)
    {
            return !empty($this->jobs()->whereId($jobId)->first());
     }
    public function isFreelancerRegistred()
    {
        return !empty($this->firstName) && !empty($this->lastName) && !empty($this->email);
    }
}

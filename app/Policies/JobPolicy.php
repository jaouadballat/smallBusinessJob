<?php

namespace App\Policies;

use App\Models\Job;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Job $job)
    {
        return $user->agency->jobs->contains($job->id);
    }

}

<?php

namespace App\Policies;

use App\Models\Freelancer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FreelancerPolicy
{
    use HandlesAuthorization;


    public function edit(User $user, Freelancer $freelancer)
    {
        return $user->freelancer->id === $freelancer->id;
    }

    public function update(User $user, Freelancer $freelancer)
    {
        return $user->freelancer->id === $freelancer->id;
    }
}

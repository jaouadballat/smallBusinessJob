<?php


namespace App\Repositories\JobRepository;


use App\Models\Job;
use App\Repositories\BaseRepository;

class JobRepository extends BaseRepository
{
    public function __construct(Job $model)
    {
        $this->model = $model;
    }

}

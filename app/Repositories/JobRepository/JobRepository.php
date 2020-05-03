<?php


namespace App\Repositories\JobRepository;


use App\Models\Job;
use App\Repositories\BaseRepository;

class JobRepository extends BaseRepository implements JobRepositoryInterface
{
    public function __construct(Job $model)
    {
        $this->model = $model;
    }

}

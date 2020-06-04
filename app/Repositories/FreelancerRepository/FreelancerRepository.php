<?php


namespace App\Repositories\FreelancerRepository;


use App\Models\Freelancer;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class FreelancerRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function __construct(Freelancer $model)
    {
        $this->model = $model;
    }
}

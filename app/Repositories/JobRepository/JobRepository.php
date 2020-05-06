<?php


namespace App\Repositories\JobRepository;


use App\Http\Resources\Job as JobResource;
use App\Models\Job;
use App\Repositories\BaseRepository;

class JobRepository extends BaseRepository implements JobRepositoryInterface
{
    public function __construct(Job $model)
    {
        $this->model = $model;
    }


    public function collectionsWithPaginate(int $page)
    {
        return JobResource::collection(
            $this->model->paginate($page)
        );
    }

}

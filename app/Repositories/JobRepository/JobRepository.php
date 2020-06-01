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

    public function create($data)
    {
        ['categories' => $categories] = $data;
        unset($data['categories']);
        $job = auth()->user()->agency->jobs()->create($data);
        return $job->categories()->attach($categories);
    }

}

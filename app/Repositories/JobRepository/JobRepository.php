<?php


namespace App\Repositories\JobRepository;


use App\Http\Resources\Job as JobResource;
use App\Models\Job;
use App\Repositories\BaseRepository;

class JobRepository extends BaseRepository implements JobRepositoryInterface
{
    /**
     * JobRepository constructor.
     * @param Job $model
     */
    public function __construct(Job $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $page
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function collectionsWithPaginate(int $page)
    {
        return JobResource::collection(
            $this->model->paginate($page)
        );
    }

    /**
     * create new job
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        ['categories' => $categories] = $data;
        unset($data['categories']);
        $job = auth()->user()->agency->jobs()->create($data);
        return $job->categories()->attach($categories);
    }

    /**
     * update job
     * @param array $data
     * @param string $id
     * @return bool|mixed
     */
    public function update($data, $id)
    {
        ['categories' => $categories] = $data;
        unset($data['categories']);
        $job = $this->model->findOrFail($id);
        return $job->categories()->sync($categories);
    }

}

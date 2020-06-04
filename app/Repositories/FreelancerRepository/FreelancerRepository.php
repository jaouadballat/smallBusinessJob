<?php


namespace App\Repositories\FreelancerRepository;


use App\Models\Freelancer;
use App\Repositories\BaseRepository;

class FreelancerRepository extends BaseRepository implements FreelancerRepositoryInterface
{
    public function __construct(Freelancer $model)
    {
        $this->model = $model;
    }

    public function create($data, $jobId)
    {

        $freelancer = auth()->user()->freelancer()->create([
            'resume' => $data['resume']
        ]);

       unset($data['resume']);

        $data['job_id'] = $jobId;

        $freelancer->messages()->create($data);
    }
}

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

    public function allPostedJob()
    {
        $freelancer = auth()->user()->freelancer()->first();
        $messages = $freelancer->messages()->get();
        return $messages->map(function($message) {
            return $message->job()->first();
        });
    }
}

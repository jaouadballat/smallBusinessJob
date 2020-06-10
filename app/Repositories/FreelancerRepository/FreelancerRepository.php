<?php


namespace App\Repositories\FreelancerRepository;


use App\Events\JobEvent;
use App\Models\Freelancer;
use App\Models\Job;
use App\Repositories\BaseRepository;

class FreelancerRepository extends BaseRepository implements FreelancerRepositoryInterface
{
    /**
     * @var Freelancer
     */
    private $freelancerModel;
    /**
     * @var Job
     */
    private $jobModel;

    public function __construct(Freelancer $freelancerModel, Job $jobModel)
    {
        $this->freelancerModel = $freelancerModel;
        $this->jobModel = $jobModel;
    }

    public function create($data, $jobId)
    {
        $user = auth()->user();
        $this->jobModel->findOrFail($jobId);

        $user->freelancer()->updateOrCreate([
            'resume' => $data['resume']
        ]);


        event(new JobEvent($user, $data['body']));
    }

}

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

        $freelancer = $user->freelancer()->updateOrCreate([
            'resume' => $data['resume']
        ]);

        $freelancer->jobs()->attach([
            'job_id' => $jobId
        ]);

        $freelancer->messages()->create([
            'message' => $data['body'],
            'job_id' => $jobId,
            'from' => auth()->user()->id
        ]);

        event(new JobEvent($user, $data['body']));
    }

    public function getJobs()
    {
        $freelancer = auth()->user()->freelancer()->first();
        return $freelancer->jobs()->get();
    }

}

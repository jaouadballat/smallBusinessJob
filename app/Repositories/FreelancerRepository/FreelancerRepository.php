<?php


namespace App\Repositories\FreelancerRepository;


use App\Events\ApplyToJobEvent;
use App\Models\Freelancer;
use App\Models\Job;
use App\Repositories\BaseRepository;

class FreelancerRepository extends BaseRepository implements FreelancerRepositoryInterface
{
    /**
     * @var Freelancer
     */
    protected $model;
    /**
     * @var Job
     */
    private $jobModel;

    public function __construct(Freelancer $freelancerModel, Job $jobModel)
    {
        $this->model = $freelancerModel;
        $this->jobModel = $jobModel;
    }

    public function apply($data, $jobId)
    {
        $user = auth()->user();

        $freelancer = $user->freelancer()->first();
        $job = $this->jobModel->findOrFail($jobId)->first();
        $agency = $job->agency()->first();

        $freelancer->jobs()->attach([
            'job_id' => $jobId
        ]);

        $freelancer->messages()->create([
            'message' => $data['body'],
            'job_id' => $jobId,
            'from' => auth()->user()->id
        ]);

        $content = [
            'freelancer' => $freelancer,
            'agency' => $agency,
            'job' => $job,
            'message' => $data['body'],
        ];

        event(new ApplyToJobEvent($content));
    }

    public function getJobs()
    {
        $freelancer = auth()->user()->freelancer()->first();
        return $freelancer->jobs()->get();
    }

}

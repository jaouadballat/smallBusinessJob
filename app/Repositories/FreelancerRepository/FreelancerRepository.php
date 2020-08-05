<?php


namespace App\Repositories\FreelancerRepository;


use App\Events\JobEvent;
use App\Models\Freelancer;
use App\Repositories\BaseRepository;

class FreelancerRepository extends BaseRepository implements FreelancerRepositoryInterface
{
    /**
     * @var Freelancer
     */
    private $freelancerModel;

    public function __construct(Freelancer $freelancerModel)
    {
        $this->model = $freelancerModel;
    }

    public function apply($data, $jobId)
    {
        $user = auth()->user();

        $freelancer = $user->freelancer()->first();

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

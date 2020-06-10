<?php


namespace App\Repositories\FreelancerRepository;


use App\Events\JobEvent;
use App\Models\Freelancer;
use App\Models\Job;
use App\Models\Message;
use App\Repositories\BaseRepository;
use Illuminate\Support\Arr;

class FreelancerRepository extends BaseRepository implements FreelancerRepositoryInterface
{
    /**
     * @var Freelancer
     */
    private $freelancerModel;
    /**
     * @var Message
     */
    private $messageModel;
    /**
     * @var Job
     */
    private $jobModel;

    public function __construct(Freelancer $freelancerModel, Message $messageModel, Job $jobModel)
    {
        $this->freelancerModel = $freelancerModel;
        $this->messageModel = $messageModel;
        $this->jobModel = $jobModel;
    }

    public function create($data, $jobId)
    {
        $user = auth()->user();
        $this->jobModel->findOrFail($jobId);

        $user->freelancer()->updateOrCreate([
            'resume' => $data['resume']
        ]);

        unset($data['resume']);

        $this->messageModel->body = $data['body'];

        event(new JobEvent($user, $this->messageModel));
    }

}

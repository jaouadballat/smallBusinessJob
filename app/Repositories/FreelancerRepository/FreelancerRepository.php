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
       // $job = $this->jobModel->findOrFail($jobId);
        $user = auth()->user();

        $user->freelancer()->updateOrCreate([
            'resume' => $data['resume']
        ]);


        unset($data['resume']);

        $this->messageModel->body = $data['body'];

        $user->messages()->create([
            'job_id' => $jobId,
            'body' => $data['body']
        ]);

        event(new JobEvent($user, $this->messageModel));
    }

    public function allPostedJob()
    {
        $messages = auth()->user()->messages()->get()->groupBy('job_id');
        $jobIds = [];
        foreach ($messages as $jobId => $messages) {
            $jobIds[] = $jobId;
        }
        return $this->jobModel->findMany($jobIds);

    }
}

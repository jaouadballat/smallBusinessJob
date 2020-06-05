<?php


namespace App\Repositories\FreelancerRepository;


use App\Models\Freelancer;
use App\Models\Job;
use App\Models\Message;
use App\Repositories\BaseRepository;

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
        $job = $this->jobModel->findOrFail($jobId);
        $user = auth()->user();

        $freelancer = $user->freelancer()->create([
            'resume' => $data['resume']
        ]);

        unset($data['resume']);

        $this->messageModel->body = $data['body'];

        $freelancer->messages()->save($this->messageModel);
        $job->messages()->save($this->messageModel);

        $user->notify(new \App\Notifications\Job($this->messageModel));
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

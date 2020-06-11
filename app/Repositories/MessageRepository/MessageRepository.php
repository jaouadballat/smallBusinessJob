<?php


namespace App\Repositories\MessageRepository;


use App\Models\Job;
use App\Models\Message;
use App\Repositories\BaseRepository;

class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{
    /**
     * @var Message
     */
    private $messageModel;
    /**
     * @var Job
     */
    private $jobModel;

    /**
     * MessageRepository constructor.
     * @param Message $messageModel
     * @param Job $jobModel
     */
    public function __construct(Message $messageModel, Job $jobModel)
    {
        $this->messageModel = $messageModel;
        $this->jobModel = $jobModel;
    }

    public function allMessages($job)
    {

        $job = $this->jobModel->findOrFail($job);
        $agency = $job->agency;
        return $this->model
            ->where('freelancer_id', auth()->id())
            ->where('job_id', $job)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function create($data)
    {
        auth()->user()->messages()->create($data);
    }
}

<?php


namespace App\Repositories\MessageRepository;


use App\Models\Message;
use App\Repositories\BaseRepository;

class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{

    /**
     * MessageRepository constructor.
     * @param Message $model
     */
    public function __construct(Message $model)
    {
        $this->model = $model;
    }

    public function allMessages($jobId)
    {
        return $this->model
            ->where('user_id', auth()->id())
            ->where('job_id', $jobId)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function create($data)
    {
        auth()->user()->messages()->create($data);
    }
}

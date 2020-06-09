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

    public function allMessages($job, $user)
    {
        return $this->model
            ->where(function($query) use ($user) {
                $query->where('user_id', $user)
                    ->orWhere('user_id', auth()->user()->id);
            })->where('job_id', $job)->orderBy('created_at', 'asc')->get();
    }

    public function create($data)
    {
        auth()->user()->messages()->create($data);
    }
}

<?php


namespace App\Repositories\AgencyRepository;


use App\Models\Agency;
use App\Models\Message;
use App\Repositories\BaseRepository;

class AgencyRepository extends BaseRepository implements AgencyRepositoryInterface
{
    /**
     * @var Agency
     */
    private $agencyModel;
    /**
     * @var Message
     */
    private $messageModel;

    public function __construct(Agency $agencyModel, Message $messageModel)
    {
        $this->agencyModel = $agencyModel;
        $this->messageModel = $messageModel;
    }

    public function jobs()
    {
        return auth()->user()->jobs()->get();
    }

    public function allMessages()
    {
        //$messages = auth()->user()->messages()->get()->groupBy('user_id');
        $jobs = auth()->user()->jobs()->get();
        $jobIds = [];
        foreach ($jobs as $job) {
            $jobIds[] = $job->id;
        }
        $messages = $this->messageModel->whereIn('job_id', $jobIds)->get()->groupBy('user_id');
        dd($messages);


    }

}

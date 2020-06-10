<?php


namespace App\Repositories\AgencyRepository;


use App\Models\Agency;
use App\Models\Message;
use App\Repositories\BaseRepository;
use App\User;

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

    public function __construct(
        Agency $agencyModel,
        Message $messageModel
    )
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
        $agency = auth()->user()->agency;
        $messages = $agency->messages()->get()->groupBy('freelancer_id');

        return $messages;

    }

    public function getMessagesForThisUserWithThisJob($user, $job)
    {
        $agency = auth()->user()->agency;

         return $this->messageModel
                ->where('agency_id', $agency->id)
                ->orWhere('freelancer_id', $user)
                ->where('job_id', $job)->orderBy('created_at', 'asc')->get();
    }

    public function findById($id)
    {
        return $this->agencyModel->findOrFail($id);
    }

}

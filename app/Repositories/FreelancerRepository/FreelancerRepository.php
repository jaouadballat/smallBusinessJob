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
        $job = $this->jobModel->findOrFail($jobId);

        $freelancer = $user->freelancer()->updateOrCreate([
            'resume' => $data['resume']
        ]);

        unset($data['resume']);

        $this->messageModel->body = $data['body'];

        $freelancer->messages()->create([
            'job_id' => $jobId,
            'agency_id' => $job->agency->id,
            'from_id' => $user->id,
            'body' => $data['body']
        ]);

        event(new JobEvent($user, $this->messageModel));
    }

    public function allPostedJob()
    {
        $jobIds = [];

        $freelancer = auth()->user()->freelancer()->first();
        $messages = $freelancer->messages()->get()->groupBy('job_id');

        foreach ($messages as $jobId => $messages) {
            $jobIds[] = $jobId;
        }
        return $this->jobModel->findMany($jobIds);

    }

    public function messages($jobId)
    {
        $job = $this->jobModel->findOrFail($jobId);
        $freelancer = auth()->user()->freelancer()->first();
        $agency = $job->agency;

        return $freelancer->messages()->where('job_id', $jobId)->where('agency_id', $agency->id)->get();
    }
}

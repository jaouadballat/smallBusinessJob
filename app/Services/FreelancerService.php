<?php


namespace App\Services;

use App\Repositories\FreelancerRepository\FreelancerRepositoryInterface;

class FreelancerService extends Service
{
    /**
     * @var FreelancerRepositoryInterface
     */
    private $repository;

    public function __construct(FreelancerRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    /**
     * find record by id
     * @param $id
     * @return mixed
     */
    public function findOne($id)
    {
        return $this->repository->findOrFail($id);
    }

    public function applyForJob($data, $jobId)
    {
        return $this->repository->create($data, $jobId);
    }

    public function listOfAppliedJobs()
    {
        return $this->repository->getJobs();
    }

    public function getAllMessagesForThisJob($id)
    {
        $freelancer = auth()->user()->freelancer;
        return $freelancer->messages()->where('job_id', $id)->get();
    }

    public function sendMessageToThisJob($id)
    {
        $user = auth()->user();
        $freelancer = $user->freelancer;

        $freelancer->messages()->create([
            'from' => $user->id,
            'job_id' => $id,
            'message' => request('body')
        ]);
    }
}

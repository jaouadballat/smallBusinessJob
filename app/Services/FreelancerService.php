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

    public function applyForJob($data, $jobId)
    {
        return $this->repository->create($data, $jobId);
    }

    public function myJobs()
    {
        return $this->repository->allPostedJob();
    }
}

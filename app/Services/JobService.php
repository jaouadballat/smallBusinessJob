<?php


namespace App\Services;


use App\Repositories\JobRepository\JobRepositoryInterface;

class JobService
{
    public function __construct(JobRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllJobs()
    {
        return $this->repository->all();
    }
}

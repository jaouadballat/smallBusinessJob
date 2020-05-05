<?php


namespace App\Services;


use App\Repositories\JobRepository\JobRepositoryInterface;

class JobService
{

    const PER_PAGE = 5;

    public function __construct(JobRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function featuredJobs()
    {
        return $this->repository
                    ->with('agency')
                    ->limit(4)
                    ->orderBy('postedDate', 'desc')
                    ->get();
    }

    public function withPagination()
    {
        return $this->repository->paginate(self::PER_PAGE);
    }
}

<?php


namespace App\Services;


use App\Http\Resources\Job as JobResource;
use App\Repositories\JobRepository\JobRepositoryInterface;

class JobService extends Service
{

    public function __construct(JobRepositoryInterface $repository)
    {
        parent::__construct($repository);

        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function featuredJobs()
    {
        return $this->repository
                    ->limit(4)
                    ->orderBy('postedDate', 'desc')
                    ->get();
    }

    public function withPagination(int $page)
    {
        return $this->repository->collectionsWithPaginate($page);
    }
}

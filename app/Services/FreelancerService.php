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
}
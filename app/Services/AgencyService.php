<?php


namespace App\Services;


use App\Repositories\AgencyRepository\AgencyRepositoryInterface;

class AgencyService extends Service
{
    /**
     * @var AgencyRepositoryInterface
     */
    private $repository;

    public function __construct(AgencyRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

}

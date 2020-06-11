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

    public function findOne($id)
    {
        return $this->repository->getById($id);
    }

    public function jobs()
    {
        return $this->repository->jobs();
    }

}

<?php


namespace App\Repositories\AgencyRepository;


use App\Models\Agency;
use App\Repositories\BaseRepository;

class AgencyRepository extends BaseRepository implements AgencyRepositoryInterface
{
    /**
     * @var Agency
     */
    private $repository;

    public function __construct(Agency $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $this->repository->create($data);
    }
}

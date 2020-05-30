<?php


namespace App\Services;


use App\Repositories\BaseRepositoryInterface;

abstract class Service
{

    protected $service;

    public function __construct(BaseRepositoryInterface $service)
    {
        $this->service = $service;
    }

    public function newQuery()
    {
        return $this->service->newQuery();
    }

    public function whereHas($relation, $closure)
    {
        $this->service->whereHas($relation, $closure);
    }

    public function save($data)
    {
        $this->service->save($data);
    }


}

<?php


namespace App\Repositories\JobRepository;


use App\Repositories\BaseRepositoryInterface;

interface JobRepositoryInterface extends BaseRepositoryInterface
{
    public function create($data);
}

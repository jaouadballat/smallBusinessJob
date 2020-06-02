<?php


namespace App\Repositories\JobRepository;


use App\Repositories\BaseRepositoryInterface;

interface JobRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);
}

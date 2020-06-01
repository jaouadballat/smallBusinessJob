<?php


namespace App\Repositories\AgencyRepository;


use App\Models\Agency;
use App\Repositories\BaseRepository;

class AgencyRepository extends BaseRepository implements AgencyRepositoryInterface
{
    public function __construct(Agency $model)
    {
        $this->model = $model;
    }

    public function jobs()
    {
        return auth()->user()->jobs()->get();
    }

}

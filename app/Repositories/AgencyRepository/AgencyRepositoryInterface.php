<?php

namespace App\Repositories\AgencyRepository;

use App\Repositories\BaseRepositoryInterface;

interface AgencyRepositoryInterface extends BaseRepositoryInterface {

    public function jobs();

    public function getById($id);
}

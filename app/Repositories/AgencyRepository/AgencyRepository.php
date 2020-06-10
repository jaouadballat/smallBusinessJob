<?php


namespace App\Repositories\AgencyRepository;


use App\Models\Agency;
use App\Repositories\BaseRepository;

class AgencyRepository extends BaseRepository implements AgencyRepositoryInterface
{
    /**
     * @var Agency
     */
    private $agencyModel;


    public function __construct(
        Agency $agencyModel
    )
    {
        $this->agencyModel = $agencyModel;
    }

    public function jobs()
    {
        return auth()->user()->jobs()->get();
    }

}

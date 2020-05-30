<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgencyRequest;
use App\Services\AgencyService;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * @var AgencyService
     */
    private $service;

    public function __construct(AgencyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('ceo');
    }

    public function list()
    {
        return view('Agency.lists');
    }

    public function create(AgencyRequest $request)
    {
        $this->service->save($request->storeAgency());
        return redirect()->route('agency.jobs');
    }
}

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
        if(auth()->user()->hasRegisterAgency()) {
            return redirect()->back();
        }
        return view('Agency.ceo');
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

    public function edit($id)
    {
        $agency = $this->service->findOne($id);
        return view('Agency.edit-dashboard', compact('agency'));
    }

    public function update(AgencyRequest $request, $id)
    {
        $this->service->update($request->except('company_logo'), $id);
        return redirect()->route('agency.jobs');
    }
}

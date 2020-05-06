<?php

namespace App\Http\Controllers;

use App\Http\Resources\Job as JobResource;
use App\Services\JobService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class JobController extends Controller
{

    const PER_PAGE = 5;

    public function __construct(JobService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->all();
    }

    public function list(Request $request)
    {

        if($request->ajax()) {
            return $this->service->withPagination(static::PER_PAGE);
        }

        return view('job-list');
    }
}

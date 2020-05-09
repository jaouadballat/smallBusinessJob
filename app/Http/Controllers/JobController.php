<?php

namespace App\Http\Controllers;

use App\Helper\JobFilter;
use App\Http\Resources\Job as JobResource;
use App\Repositories\JobRepository\JobRepositoryInterface;
use App\Services\JobService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
            return JobFilter::apply($request, $this->service);
            return $this->service->whereHas('categories', function(Builder $query) use ($request){
                $query->where('name', 'like', 'Design%');
            })->get();
        }

        return view('job-list');
    }
}

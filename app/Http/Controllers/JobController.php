<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepository\JobRepository;
use App\Repositories\JobRepository\JobRepositoryInterface;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct(JobRepositoryInterface $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }
}

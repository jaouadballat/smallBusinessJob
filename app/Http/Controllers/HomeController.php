<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\JobService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $jobService;
    private $categoryService;

    public function __construct(
        JobService $jobService,
        CategoryService $categoryService
    )
    {
        $this->jobService = $jobService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $jobs = $this->jobService->featuredJobs();
        $categories = $this->categoryService->all();
        return view('home', compact('jobs', 'categories'));
    }
}

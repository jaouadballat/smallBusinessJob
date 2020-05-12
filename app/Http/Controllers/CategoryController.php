<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(Request $resquest)
    {
        if($resquest->ajax()) {
            return $this->service->all();
        }
    }
}

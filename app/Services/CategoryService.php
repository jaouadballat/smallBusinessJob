<?php


namespace App\Services;


use App\Repositories\CategoryRepository\CategoryRepositoryInterface;

class CategoryService
{

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->with('jobs')->all();
    }
}

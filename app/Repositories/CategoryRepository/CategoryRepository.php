<?php


namespace App\Repositories\CategoryRepository;


use App\Http\Resources\Category as CategoryResource;
use App\models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return CategoryResource::collection(
            $this->model->all()
        );
    }
}

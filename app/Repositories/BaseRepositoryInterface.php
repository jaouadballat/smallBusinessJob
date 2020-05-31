<?php


namespace App\Repositories;


interface BaseRepositoryInterface
{
    public function all();

    public function count();

    public function deleteById($id);

    public function first();

    public function get();

    public function getById($id);

    public function getByColumn($item, $column, array $columns = ['*']);

    public function limit($limit);

    public function orderBy($column, $value);

    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null);

    public function where($column, $value, $operator = '=');

    public function whereIn($column, $value);

    public function with($relations);

    public function whereHas($relation, $closure);

    public function whereBetween($column, array $value);

    public function newQuery();

    public function save(array $data);

    public function update(array $data, $id);
}

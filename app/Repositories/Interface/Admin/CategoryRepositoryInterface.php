<?php

namespace App\Repositories\Interface\Admin;

interface CategoryRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function find($id);

    public function update(array $data, $id);

    public function delete($id);
}

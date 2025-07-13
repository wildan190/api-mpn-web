<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\Interface\Admin\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        return $this->categoryRepo->all();
    }

    public function store(CategoryRequest $request)
    {
        return $this->categoryRepo->create($request->validated());
    }

    public function show($id)
    {
        return $this->categoryRepo->find($id);
    }

    public function update(CategoryRequest $request, $id)
    {
        return $this->categoryRepo->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->categoryRepo->delete($id);
    }
}

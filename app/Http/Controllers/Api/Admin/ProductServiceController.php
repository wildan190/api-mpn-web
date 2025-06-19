<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductServiceRequest;
use App\Repositories\Interface\Admin\ProductServiceRepositoryInterface;

class ProductServiceController extends Controller
{
    protected $repository;

    public function __construct(ProductServiceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(ProductServiceRequest $request)
    {
        return $this->repository->create($request->validated());
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function update(ProductServiceRequest $request, $id)
    {
        return $this->repository->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}

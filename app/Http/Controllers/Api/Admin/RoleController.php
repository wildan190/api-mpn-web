<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\RoleRequest;
use App\Repositories\Interface\Admin\RoleRepositoryInterface;

class RoleController extends Controller
{
    public function __construct(private RoleRepositoryInterface $repo) {}

    public function index()
    {
        return $this->repo->all();
    }

    public function store(RoleRequest $req)
    {
        return $this->repo->create($req->validated());
    }

    public function show($id)
    {
        return $this->repo->find($id);
    }

    public function update(RoleRequest $req, $id)
    {
        return $this->repo->update($req->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}

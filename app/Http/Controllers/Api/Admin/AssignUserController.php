<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssignUserRequest;
use App\Repositories\Interface\Admin\AssignUserInterRepositoryInterface;

class AssignUserController extends Controller
{
    protected AssignUserInterRepositoryInterface $repo;

    public function __construct(AssignUserInterRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function assign(AssignUserRequest $request)
    {
        return $this->repo->assignRolesAndPermissions($request->validated());
    }
}

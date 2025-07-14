<?php

namespace App\Repositories\Interface\Admin;

interface AssignUserInterRepositoryInterface
{
    public function assignRolesAndPermissions(array $data);
}

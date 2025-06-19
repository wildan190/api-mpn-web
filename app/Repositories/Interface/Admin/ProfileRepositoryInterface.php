<?php

namespace App\Repositories\Interface\Admin;

interface ProfileRepositoryInterface
{
    public function update($user, array $data);
}

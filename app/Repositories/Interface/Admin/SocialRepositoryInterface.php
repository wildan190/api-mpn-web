<?php

namespace App\Repositories\Interface\Admin;

interface SocialRepositoryInterface
{
    public function get();

    public function update(array $data);
}

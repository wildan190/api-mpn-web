<?php

namespace App\Repositories\Interface\Admin;

interface WebSettingsRepositoryInterface
{
    public function get();

    public function update(array $data);
}

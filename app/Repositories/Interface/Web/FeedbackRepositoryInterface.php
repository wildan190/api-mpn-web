<?php

namespace App\Repositories\Interface\Web;

interface FeedbackRepositoryInterface
{
    public function create(array $data);

    public function all();
}

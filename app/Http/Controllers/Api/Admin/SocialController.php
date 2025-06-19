<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialRequest;
use App\Repositories\Interface\Admin\SocialRepositoryInterface;

class SocialController extends Controller
{
    protected $socialRepository;

    public function __construct(SocialRepositoryInterface $socialRepository)
    {
        $this->socialRepository = $socialRepository;
    }

    public function show()
    {
        return $this->socialRepository->get();
    }

    public function update(SocialRequest $request)
    {
        return $this->socialRepository->update($request->validated());
    }
}

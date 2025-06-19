<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Repositories\Interface\Admin\ProfileRepositoryInterface;

class ProfileController extends Controller
{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function update(ProfileRequest $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        return $this->profileRepository->update($user, $request->validated());
    }
}

<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebSettingsRequest;
use App\Repositories\Interface\Admin\WebSettingsRepositoryInterface;

class WebSettingsController extends Controller
{
    protected $webSettingsRepository;

    public function __construct(WebSettingsRepositoryInterface $webSettingsRepository)
    {
        $this->webSettingsRepository = $webSettingsRepository;
    }

    public function show()
    {
        return $this->webSettingsRepository->get();
    }

    public function update(WebSettingsRequest $request)
    {
        return $this->webSettingsRepository->update($request->validated());
    }
}

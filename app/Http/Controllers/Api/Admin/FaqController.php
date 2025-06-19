<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Repositories\Interface\Admin\FaqRepositoryInterface;

class FaqController extends Controller
{
    protected $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function index()
    {
        return $this->faqRepository->all();
    }

    public function store(FaqRequest $request)
    {
        return $this->faqRepository->create($request->validated());
    }

    public function show($id)
    {
        return $this->faqRepository->find($id);
    }

    public function update(FaqRequest $request, $id)
    {
        return $this->faqRepository->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->faqRepository->delete($id);
    }
}

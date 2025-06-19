<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MitraRequest;
use App\Repositories\Interface\Admin\MitraRepositoryInterface;

class MitraController extends Controller
{
    protected $mitraRepository;

    public function __construct(MitraRepositoryInterface $mitraRepository)
    {
        $this->mitraRepository = $mitraRepository;
    }

    public function index()
    {
        return $this->mitraRepository->all();
    }

    public function store(MitraRequest $request)
    {
        return $this->mitraRepository->create($request->validated());
    }

    public function show($id)
    {
        return $this->mitraRepository->find($id);
    }

    public function update(MitraRequest $request, $id)
    {
        return $this->mitraRepository->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->mitraRepository->delete($id);
    }
}

<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Repositories\Interface\Admin\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        return $this->articleRepository->all();
    }

    public function store(ArticleRequest $request)
    {
        return $this->articleRepository->create($request->validated());
    }

    public function show($id)
    {
        return $this->articleRepository->find($id);
    }

    public function update(ArticleRequest $request, $id)
    {
        return $this->articleRepository->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->articleRepository->delete($id);
    }
}

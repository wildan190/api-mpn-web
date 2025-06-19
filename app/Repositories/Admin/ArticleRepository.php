<?php

namespace App\Repositories\Admin;

use App\Models\Article;
use App\Repositories\Interface\Admin\ArticleRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all()
    {
        return response()->json(Article::latest()->get());
    }

    public function create(array $data)
    {
        $data['header_image'] = request()->file('header_image')?->store('articles/header', 'public');
        $data['article_body_image'] = request()->file('article_body_image')?->store('articles/body', 'public');

        $article = Article::create($data);

        return response()->json([
            'message' => 'Artikel berhasil ditambahkan.',
            'data' => $article,
        ]);
    }

    public function find($id)
    {
        return response()->json(Article::findOrFail($id));
    }

    public function update(array $data, $id)
    {
        $article = Article::findOrFail($id);

        if (request()->hasFile('header_image')) {
            if ($article->header_image && Storage::exists('public/'.$article->header_image)) {
                Storage::delete('public/'.$article->header_image);
            }
            $data['header_image'] = request()->file('header_image')->store('articles/header', 'public');
        }

        if (request()->hasFile('article_body_image')) {
            if ($article->article_body_image && Storage::exists('public/'.$article->article_body_image)) {
                Storage::delete('public/'.$article->article_body_image);
            }
            $data['article_body_image'] = request()->file('article_body_image')->store('articles/body', 'public');
        }

        $article->update($data);

        return response()->json([
            'message' => 'Artikel berhasil diperbarui.',
            'data' => $article,
        ]);
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);

        if ($article->header_image) {
            Storage::delete('public/'.$article->header_image);
        }

        if ($article->article_body_image) {
            Storage::delete('public/'.$article->article_body_image);
        }

        $article->delete();

        return response()->json([
            'message' => 'Artikel berhasil dihapus.',
        ]);
    }
}

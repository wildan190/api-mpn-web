<?php

namespace App\Repositories\Admin;

use App\Models\Article;
use App\Repositories\Interface\Admin\ArticleRepositoryInterface;
use Illuminate\Http\Response;
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
        // Pastikan ID valid sebelum mencari artikel
        if (empty($id) || ! is_numeric($id)) {
            return response()->json(['error' => 'ID tidak valid'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(Article::findOrFail($id));
    }

    public function update(array $data, $id)
    {
        // Pastikan ID valid sebelum melanjutkan
        if (empty($id) || ! is_numeric($id)) {
            return response()->json(['error' => 'ID tidak valid'], Response::HTTP_BAD_REQUEST);
        }

        $article = Article::findOrFail($id);

        // Handle file updates (header_image dan article_body_image)
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
        // Pastikan ID valid sebelum menghapus artikel
        if (empty($id) || ! is_numeric($id)) {
            return response()->json(['error' => 'ID tidak valid'], Response::HTTP_BAD_REQUEST);
        }

        $article = Article::findOrFail($id);

        // Hapus file terkait
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

    // Fungsi untuk menghitung artikel berdasarkan slug dan id
    public function countArticlesBySlug($slug, $id = null)
    {
        // Pastikan $id valid
        if (empty($id) || ! is_numeric($id)) {
            return response()->json(['error' => 'ID tidak valid'], Response::HTTP_BAD_REQUEST);
        }

        // Query hanya akan dijalankan jika $id valid
        return response()->json(Article::where('slug', $slug)->where('id', '<>', $id)->count());
    }
}

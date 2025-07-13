<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class WebArticleController extends Controller
{
    public function index(Request $request)
    {
        // Lacak kunjungan ke halaman daftar artikel
        visits('article-list')->increment();

        $query = Article::where('status', 'publish');

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $articles = $query->latest()->paginate(6);

        return response()->json([
            'visits'   => visits('article-list')->count(), // opsional
            'data'     => $articles,
        ]);
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        // Lacak kunjungan ke artikel tertentu
        visits($article)->increment();

        return response()->json([
            'article'          => $article,
            'total_visits'     => visits($article)->count(),      // total sejak awal
            'today_visits'     => visits($article)->period('day')->count(),   // hari ini (opsional)
        ]);
    }
}

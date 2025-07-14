<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class WebArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('category') // Eager load category
            ->where('status', 'publish');

        if ($search = $request->input('search')) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if ($categoryId = $request->input('category_id')) {
            $query->where('category_id', $categoryId);
        }

        $articles = $query->latest()->paginate(6);

        return response()->json($articles);
    }

    public function show($slug)
    {
        $article = Article::with('category') // Eager load category
            ->where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        // Ambil IP pengunjung
        $ip = FacadesRequest::ip();

        // Cek apakah sudah pernah mengunjungi dalam 1 jam terakhir
        $alreadyVisited = $article->visits()
            ->where('ip_address', $ip)
            ->where('created_at', '>=', now()->subHour())
            ->exists();

        if (! $alreadyVisited) {
            $article->visits()->create([
                'ip_address' => $ip,
            ]);
        }

        return response()->json([
            'article' => $article,
            'visits' => $article->visits()->count(),
        ]);
    }
}

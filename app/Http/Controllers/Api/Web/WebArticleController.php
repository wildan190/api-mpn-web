<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class WebArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'publish');

        if ($search = $request->input('search')) {
            $query->where('title', 'like', '%'.$search.'%');
        }

        $articles = $query->latest()->paginate(6);

        return response()->json($articles);
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return response()->json($article);
    }
}

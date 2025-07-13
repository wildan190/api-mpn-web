<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\Mitra;
use App\Models\ProductService;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();
        $mitraCount = Mitra::count();
        $productCount = ProductService::count();
        $faqCount = Faq::count();
        $feedbackCount = Feedback::count();
        $averageRating = Feedback::avg('rate');

        // Total visit ke halaman homepage
        $homeVisits = Visit::where('visitable_type', 'home')->count();

        // Kunjungan tiap artikel per slug
        $articleVisits = Visit::select('visitable_id', DB::raw('count(*) as total'))
            ->where('visitable_type', Article::class)
            ->groupBy('visitable_id')
            ->get()
            ->keyBy('visitable_id');

        // Ambil slug berdasarkan ID
        $articles = Article::select('id', 'slug')->get();
        $visitsBySlug = [];

        foreach ($articles as $article) {
            $visitsBySlug[$article->slug] = $articleVisits[$article->id]->total ?? 0;
        }

        return response()->json([
            'total_articles' => $articleCount,
            'total_mitras' => $mitraCount,
            'total_products' => $productCount,
            'total_faqs' => $faqCount,
            'total_feedbacks' => $feedbackCount,
            'average_feedback_rate' => round($averageRating, 2),
            'home_visits' => $homeVisits,
            'article_visits_by_slug' => $visitsBySlug,
        ]);
    }
}

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
        $averageRating = Feedback::avg('rate') ?? 0;

        // Jumlah kunjungan ke homepage (disarankan simpan sebagai visitable_type = null & visitable_id = null)
        $homeVisits = Visit::whereNull('visitable_type')
                           ->whereNull('visitable_id')
                           ->count();

        // Ambil kunjungan artikel
        $articleVisits = Visit::select('visitable_id', DB::raw('count(*) as total'))
            ->where('visitable_type', Article::class)
            ->groupBy('visitable_id')
            ->get()
            ->keyBy('visitable_id');

        // Ambil slug semua artikel
        $articles = Article::select('id', 'slug')->get();
        $visitsBySlug = [];

        foreach ($articles as $article) {
            $visitsBySlug[$article->slug] = $articleVisits[$article->id]->total ?? 0;
        }

        return response()->json([
            'total_articles'        => $articleCount,
            'total_mitras'          => $mitraCount,
            'total_products'        => $productCount,
            'total_faqs'            => $faqCount,
            'total_feedbacks'       => $feedbackCount,
            'average_feedback_rate' => round($averageRating, 2),
            'home_visits'           => $homeVisits,
            'article_visits_by_slug'=> $visitsBySlug,
        ]);
    }
}

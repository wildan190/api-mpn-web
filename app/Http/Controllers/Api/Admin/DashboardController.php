<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Mitra;
use App\Models\ProductService;
use App\Models\Faq;
use App\Models\Feedback;

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

        return response()->json([
            'total_articles'      => $articleCount,
            'total_mitras'        => $mitraCount,
            'total_products'      => $productCount,
            'total_faqs'          => $faqCount,
            'total_feedbacks'     => $feedbackCount,
            'average_feedback_rate' => round($averageRating, 2),
        ]);
    }
}

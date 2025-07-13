<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Mitra;
use App\Models\ProductService;
use App\Models\Social;
use App\Models\WebSettings;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Tambah kunjungan ke homepage
        visits('homepage')->increment();

        return response()->json([
            'web_settings' => WebSettings::first(),
            'social_links' => Social::first(),
            'mitra' => Mitra::latest()->get(),
            'latest_articles' => Article::where('status', 'publish')->latest()->take(3)->get(),
            'products' => ProductService::where('status', 'released')->latest()->get(),
            'faqs' => Faq::all(),
            'visits' => visits('homepage')->count(), // opsional: kirim data kunjungan ke frontend
        ]);
    }
}

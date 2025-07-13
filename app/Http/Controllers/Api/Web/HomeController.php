<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Mitra;
use App\Models\Page;
use App\Models\ProductService;
use App\Models\Social;
use App\Models\WebSettings;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil entri halaman homepage (buat jika belum ada)
        $page = Page::firstOrCreate(['slug' => 'homepage']);

        // Ambil IP
        $ip = Request::ip();

        // Cek apakah sudah pernah mengunjungi dalam 1 jam terakhir
        $alreadyVisited = $page->visits()
            ->where('ip_address', $ip)
            ->where('created_at', '>=', now()->subHour())
            ->exists();

        if (! $alreadyVisited) {
            $page->visits()->create([
                'ip_address' => $ip,
            ]);
        }

        return response()->json([
            'web_settings' => WebSettings::first(),
            'social_links' => Social::first(),
            'mitra' => Mitra::latest()->get(),
            'latest_articles' => Article::where('status', 'publish')->latest()->take(3)->get(),
            'products' => ProductService::where('status', 'released')->latest()->get(),
            'faqs' => Faq::all(),
            'homepage_visits' => $page->visits()->count(),
        ]);
    }
}

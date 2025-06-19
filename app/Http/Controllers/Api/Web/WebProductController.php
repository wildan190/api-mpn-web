<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use Illuminate\Http\Request;

class WebProductController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductService::query();

        // Filter by status (optional, default: released)
        $status = $request->input('status', 'released');
        $query->where('status', $status);

        $products = $query->latest()->paginate(6);

        return response()->json($products);
    }

    public function show($id)
    {
        $product = ProductService::findOrFail($id);

        return response()->json($product);
    }
}

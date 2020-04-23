<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function index()
    {
        // $query = request()->input('q');
        // ... find($query);
        $query = request()->input('q');
        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->paginate(6)
            ->appends(request()->query());

        return view('frontend/search', [
            'query' => $query,
            'products' => $products
        ]);
    }
}

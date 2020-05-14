<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function index()
    {
        $query = request()->input('q');
        $orderBy = request()->input('orderBy');
        if (!in_array($orderBy, ['name', 'id', 'created_at', 'price'])) {
            $orderBy = 'id';
        }
        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->orderBy($orderBy)
            ->paginate(8)
            ->appends(request()->query());

        return view('frontend/search', [
            'query' => $query,
            'products' => $products,
            'orderBy' => $orderBy
        ]);
    }
}

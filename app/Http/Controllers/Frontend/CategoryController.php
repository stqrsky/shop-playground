<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $products = \App\Product::all();

        return view('frontend/categories/show', [
            'category' => $category,
            'products' => $products
        ]);
    }
}

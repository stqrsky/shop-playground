<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/products/index', [
            'products' => Product::all()->sortByDesc("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($this->validateData());

        return redirect()->route('admin.products.index')->with('info', 'Good Boy, You added a product!');

        //LONGER VERSION
        // $validatedData = $request->validate([
        //     'name' => 'required|min:3',
        //     'price' => 'required|numeric|between:0,9999.99',
        //     'description' => 'required|min:3',
        //     'msrp' => 'numeric|between:0,9999.99',
        //     'stock' => 'integer'
        // ]);
        // Product::create($validatedData);
        // return redirect()->route('products.index');

        // $product = new Product();
        // $product->name = $request->input('name');
        // $product->name = $request->input('description');
        // $product->name = $request->input('price');
        // $product->name = $request->input('msrp');
        // $product->name = $request->input('stock');
        // $product->save();

        // return redirect()->route('products.index')->with('info', 'Good Boy, You added a product!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend/products/edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validation function at the bottom
        $product->update($this->validateData());
        return redirect()->route('admin.products.index');

        //LONGER SOLUTION
        // $validateDate = $request->validate([
        //     'name' => 'required|min:3',
        //     'price' => 'required|numeric|between:0,9999,99',
        //     'description' => 'required|min:3',
        //     'msrp' => 'numeric|between:0,9999,99',
        //     'stock' => 'integer'
        // ]);
        // $product->update($validateData);
        // return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|between:0,9999.99',
            'description' => 'required|min:3',
            'msrp' => 'numeric|between:0,9999.99',
            'stock' => 'integer'
        ]);
    }
}

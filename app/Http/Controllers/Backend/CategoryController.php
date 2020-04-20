<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::all();
        // return view('backend/categories/index', ['categories' => $categories]);

        return view('backend/categories/index', [
            // 'categories' => Category::all()->sortByDesc("id")
            'categories' => Category::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'backend/categories/create',
            ['allProducts' => Product::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData();
        $category = Category::create([
            'name' => $request->input('name')
        ]);
        $category->products()->sync($request->input('products'));

        return redirect()->route('admin.categories.index');

        // $data = $this->validateData();
        // Category::create($data);
        // return redirect()->route('admin/categories/index');

        ////LONGER WAY
        // $validateData = $request->validate([
        //     'name' => 'required|min:3',
        // ]);
        // $category->create($validateData);
        // return redirect()->route('admin/categories/index');

        // // LONGER WAY
        // $category = new Category();
        // $category->name = $request->name;
        // $category->save();
        // return redirect()->route('admin/categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return redirect()->route('admin.categories.edit', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend/categories/edit', [
            'category' => $category,
            'allProducts' => Product::all(),
            'selectedProducts' => $category->products
        ]);
        // return view('backend/categories/edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validateData();
        $category->update([
            'name' => $request->input('name')
        ]);
        $category->products()->sync($request->input('products'));

        return redirect()->route('admin.categories.index');

        // $category->name = 'New Category Name';
        // $category->save();
        // return redirect('admin/categories');

        ////LONGER WAY
        // $validateData = request()->validate([
        //     'name' => 'required|min:3',
        // ]);
        // $category->update($validateData);
        // return redirect()->route('admin.categories.index');

        // $category->name = 'New Category Name';
        // $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }


    public function validateData()
    {
        return request()->validate([
            'name' => ['required', 'min:3'],
            'products' => 'exists:products,id'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GoodsCreateRequest;
use App\Http\Requests\GoodsUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('admin.goods', compact(['categories', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.addprod', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GoodsCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsCreateRequest $request)
    {
        $image = $request->file('image');
        $path = $image->storeAs('products', $image->getClientOriginalName(), 'public');
        Storage::url($path);

        $fields = $request->except(['_token', 'image']);
        $fields['image'] = $path;

        Product::create($fields);

        return redirect()->route('admin.products.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->setAttribute('catName', Category::categoryById($product->category_id)->first()->name);

        return view('admin.prodshow', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.editprod', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GoodsUpdateRequest $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsUpdateRequest $request, Product $product)
    {
        $fields = $request->except(['_token', '_method', 'id', 'image']);
        $image = $request->file('image');
        if($image != null) {
            $product->removeImage();
            $path = $image->storeAs('products', $image->getClientOriginalName(), 'public');
            Storage::url($path);
            $fields['image'] = $path;
        }

        $product->update($fields);
        return redirect()->route('admin.products.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.list');
    }
}

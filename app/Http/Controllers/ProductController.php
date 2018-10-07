<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Auth;

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
        $categories = Category::all()->pluck('code', 'id');

        return view('goods', compact(['products', 'categories']));
    }

    public function showByCategory($code)
    {
        $category = Category::categoryByCode($code)->first();
        $_products = $category->products();
        $category->setAttribute('capacity', $_products->count());
        $products = $_products->get();
        return view('prodbycats', compact(['category', 'products']));
    }

    public function showProductDetails($category_code, $product_code)
    {
        $category = Category::categoryByCode($category_code)->first();
        $product = Product::productByCode($product_code)->first();
        $product->setAttribute('catName', $category->name);

        return view('goodetails', compact('product'));
    }
}

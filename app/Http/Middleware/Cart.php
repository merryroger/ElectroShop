<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Closure;

class Cart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $products = Product::all();

        return (isset($user) || $products->count()) ? $next($request) : redirect()->route('products');
    }
}

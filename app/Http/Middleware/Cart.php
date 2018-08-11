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
        $isAdmin = (isset($user) && !strcmp($user->role, 'admin'));
        $products = Product::all();
        return ($isAdmin || $products->count()) ? $next($request) : redirect()->route('products');
    }
}

<span>
    @if(Route::currentRouteName() == 'products')
        {{ @trans('shop.goods') }}
    @else
        <a href="/">{{ @trans('shop.goods') }}</a>
    @endif
</span>
<span>
    @if(Route::currentRouteName() == 'categories')
        {{ @trans('shop.good_cats') }}
    @else
        <a href="/categories">{{ @trans('shop.good_cats') }}</a>
    @endif
</span>
<span>
    @if(Route::currentRouteName() == 'cart')
        {{ @trans('shop.cart') }}
    @else
        <a href="/cart">{{ @trans('shop.cart') }}</a>
    @endif
</span>
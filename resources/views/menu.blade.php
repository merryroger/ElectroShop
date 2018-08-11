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
        @auth {{ @trans('shop.orders') }} @else {{ @trans('shop.cart') }} @endauth
    @else
        <a href="/cart">@auth {{ @trans('shop.orders') }} @else {{ @trans('shop.cart') }} @endauth</a>
    @endif
</span>
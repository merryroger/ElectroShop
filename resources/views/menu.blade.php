<span>
    @if(Route::currentRouteName() == 'products')
        {{ @trans('shop.goods') }}
    @else
        <a href="{{ route('products') }}">{{ @trans('shop.goods') }}</a>
    @endif
</span>
<span>
    @if(Route::currentRouteName() == 'categories')
        {{ @trans('shop.good_cats') }}
    @else
        <a href="{{ route('categories') }}">{{ @trans('shop.good_cats') }}</a>
    @endif
</span>
<span>
    @if(Route::currentRouteName() == 'cart')
        @auth{{ @trans('shop.orders') }}@else{{ @trans('shop.cart') }}@endauth
    @else
        <a href="{{ route('cart') }}">@auth{{ @trans('shop.orders') }}@else{{ @trans('shop.cart') }}@endauth</a>
    @endif
</span>
@auth
    @if(!strcmp(Auth::user()->role, 'admin'))
        <span>
            <a href="{{ route('admin.orders.list') }}">{{ @trans('shop.admin_panel') }}</a>
        </span>
    @endif
@endauth
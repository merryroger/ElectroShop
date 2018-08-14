<span>
    @if(Route::currentRouteName() == 'admin.products.list')
        {{ @trans('shop.goods') }}
        @if($categories->count())
            <span class="add"><a href="{{ route('admin.products.get_form') }}"
                                 title="{{ @trans('shop.add_product') }}">+</a></span>
        @endif
    @else
        <a href="{{ route('admin.products.list') }}">{{ @trans('shop.goods') }}</a>
    @endif
</span>
<span>
    @if(Route::currentRouteName() == 'admin.categories.list')
        {{ @trans('shop.good_cats') }}<span class="add"><a href="{{ route('admin.categories.get_form') }}"
                                                           title="{{ @trans('shop.add_category') }}">+</a></span>
    @elseif(preg_match("%^admin\.categories\.\w+$%", Route::currentRouteName()))
        {{ @trans('shop.good_cats') }}
    @else
        <a href="{{ route('admin.categories.list') }}">{{ @trans('shop.good_cats') }}</a>
    @endif
</span>
<span>
    @if(Route::currentRouteName() == 'admin.orders.list')
        {{ @trans('shop.orders') }}
    @else
        <a href="{{ route('admin.orders.list') }}">{{ @trans('shop.orders') }}</a>
    @endif
</span>

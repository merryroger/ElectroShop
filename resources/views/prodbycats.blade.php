@extends('layouts.shop')

@section('contents')
    @if($category->capacity > 0)
        <div class="pt">
            <div class="ptc hc vt et">
                <div class="cat_header">
                    <h1>{{ $category->name }}</h1>
                    <p>{{ $category->description }}</p>
                </div>
                @foreach($products as $product)
                    <div class="prod_card" style="background-image: url('{{ Storage::url($product->image) }}')">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ sprintf('%01.2f', $product->price) }}&nbsp;{{ @trans('shop.rur') }}</p>
                        <div class="prod_ctrls">
                            <a href="{{ route('products.show_details', [$category->code, $product->code]) }}"
                               class="prod_details">{{ @trans('shop.detailed') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="pt">
            <div class="ptc hc vc">
                <p class="info">{{ @trans('shop.no_goods') }}</p>
            </div>
        </div>
    @endif
@endsection


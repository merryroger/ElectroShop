@extends('layouts.shop')

@section('contents')
    @if($products->count())
        <div class="pt">
            <div class="ptc hc vt et">
                @foreach($products as $product)
                    <div class="prod_card" style="background-image: url('{{ Storage::url($product->image) }}')">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ sprintf('%01.2f', $product->price) }}&nbsp;{{ @trans('shop.rur') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        @include('no_goods')
    @endif
@endsection

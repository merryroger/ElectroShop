@extends('layouts.shop')

@section('contents')
    @if($product !== null)
        <div class="pt">
            <div class="ptc hc vt et">
                <div class="detailed_prod_card" style="background-image: url('{{ Storage::url($product->image) }}')">
                    <h5>{{ $product->catName }}</h5>
                    <h2>{{ $product->name }}</h2>
                    <p><span>{{ @trans('shop.price') }}:</span>&nbsp;{{ sprintf('%01.2f', $product->price) }}
                        &nbsp;{{ @trans('shop.rur') }}</p>
                    <h6>{{ $product->description }}</h6>
                    <div class="prod_ctrls">
                    <!--<a href=""
                           class="prod_details">{{ @trans('shop.detailed') }}</a>//-->
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('no_goods')
    @endif
@endsection

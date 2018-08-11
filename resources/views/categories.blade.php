@extends('layouts.shop')

@section('contents')
    @if($products->count())
    @else
        @include('no_goods')
    @endif
@endsection

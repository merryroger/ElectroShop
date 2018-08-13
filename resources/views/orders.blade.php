@extends('layouts.shop')

@section('contents')
    @if(session()->has('no_orders'))
        @include('no_orders')
    @else
    @endif
@endsection

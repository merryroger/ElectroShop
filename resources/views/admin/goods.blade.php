@extends('layouts.admin')

@section('contents')
    @if($categories->count())
    @else
        @include('admin.no_categories')
    @endif
@endsection
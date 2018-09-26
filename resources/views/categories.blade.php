@extends('layouts.shop')

@section('contents')
    @if($categories->count())
        <div class="pt">
            <div class="ptc hc vt et">
                @foreach($categories as $category)
                    <div class="cat_card" style="background-image: url('{{ Storage::url($category->image) }}')">
                        <h1>{{ $category->name }} <span>({{ $category->capacity }})</span></h1>
                        <p>{{ $category->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        @include('no_goods')
    @endif
@endsection

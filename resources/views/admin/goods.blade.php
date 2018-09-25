@extends('layouts.admin')

@section('contents')
    @if($categories->count())
        <div class="pt">
            <div class="ptc hc vt et">
                <table class="admlist" style="min-width: 720px">
                    <caption>{{ @trans('shop.products') }}</caption>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th class="la" style="width: 20%;">{{ @trans('shop.code') }}</th>
                        <th class="la" style="width: 20%;">{{ @trans('shop.call_name') }}</th>
                        <th class="la" style="width: 30%;">{{ @trans('shop.category') }}</th>
                        <th style="width: 10%;">{{ @trans('shop.price') }}</th>
                        <th style="width: 15%;">{{ @trans('shop.actions') }}</th>
                    </tr>
                    <tbody class="adb">
                    @foreach($products as $product)
                        <tr>
                            <td class="ca"
                                onclick="return requestEntity('{{ route('admin.products.show', [$product->id]) }}')">{{ $product->id }}</td>
                            <td onclick="return requestEntity('{{ route('admin.products.show', [$product->id]) }}')">{{ $product->code }}</td>
                            <td onclick="return requestEntity('{{ route('admin.products.show', [$product->id]) }}')">{{ $product->name }}</td>
                            <td onclick="return requestEntity('{{ route('admin.products.show', [$product->id]) }}')">{{ $categories->find($product->category_id)->name }}</td>
                            <td class="ca"
                                onclick="return requestEntity('{{ route('admin.products.show', [$product->id]) }}')">{{ sprintf('%01.2f', $product->price) }}</td>
                            <td class="ca">
                            <span class="edit" title="{{ @trans('shop.edit') }}">
                                <img src="/images/blank.gif" class="tctr"
                                     onclick="return requestEntity('{{ route('admin.products.edit', [$product->id]) }}')"/></span>
                                <span class="delete" title="{{ @trans('shop.delete') }}">
                                <img src="/images/blank.gif" class="tctr"
                                     onclick="return removeEntity('{{ route('admin.products.remove', [$product->id]) }}', '{{ @trans('shop.do_rem_cat') }}')"/>
                            </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <form id="rm_form" method="post" class="h">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    @else
        @include('admin.no_categories')
    @endif
@endsection
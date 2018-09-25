@extends('layouts.admin')

@section('contents')
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist" style="max-width: 512px;">
                <caption>{{ @trans('shop.show_product') }}</caption>
                <tr>
                    <td>
                        <form class="adm_form">
                            <div class="admfmctrls">
                                <div class="show_item_name">
                                    <div class="item_picture"
                                         style="background-image: url('{{ Storage::url($product->image) }}'); background-size: 50px;"></div>
                                    <h1>{{ $product->name }}</h1>
                                    <br clear="all"/>
                                </div>
                                <div class="view_form_row">
                                    <label>{{ @trans('shop.code') }}:</label>
                                    <label>{{ $product->code }}</label>
                                </div>
                                <div class="view_form_row">
                                    <label>{{ @trans('shop.category') }}:</label>
                                    <label>{{ $product->catName }}</label>
                                </div>
                                <div class="view_form_row">
                                    <label>{{ @trans('shop.price') }}:</label>
                                    <label>{{ sprintf('%01.2f', $product->price) }}</label>
                                </div>
                                <div class="view_form_row">
                                    <label>{{ @trans('shop.description') }}:</label>
                                    <label>{{ $product->description }}</label>
                                </div>
                                <div class="admfmctrls">
                                    <button type="button" tabindex="1"
                                            onclick="document.location.href='{{ route('admin.products.list') }}'">
                                        {{ @trans('shop.close') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection

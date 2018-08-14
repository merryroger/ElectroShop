@extends('layouts.admin')

@section('contents')
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist" style="max-width: 512px;">
                <caption>{{ @trans('shop.show_category') }}</caption>
                <tr>
                    <td>
                        <form class="adm_form">
                            <div class="admfmctrls">
                                <div class="show_item_name">
                                    <div class="item_picture"
                                         style="background-image: url('{{ Storage::url($category->image) }}');"></div>
                                    <h1>{{ $category->name }}</h1>
                                    <br clear="all"/>
                                </div>
                                <div class="view_form_row">
                                    <label>{{ @trans('shop.code') }}:</label>
                                    <label>{{ $category->code }}</label>
                                </div>
                                <div class="view_form_row">
                                    <label>{{ @trans('shop.description') }}:</label>
                                    <label>{{ $category->description }}</label>
                                </div>
                                <div class="view_form_row">
                                    <label>{{ @trans('shop.prod_quantity') }}:</label>
                                    <label>{{ $category->products()->count() }}</label>
                                </div>
                                <div class="admfmctrls">
                                    <button type="button" tabindex="1"
                                            onclick="document.location.href='{{ route('admin.categories.list') }}'">
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

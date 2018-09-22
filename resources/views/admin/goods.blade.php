@extends('layouts.admin')

@section('contents')
    @if($categories->count())
        <div class="pt">
            <div class="ptc hc vt et">
                <table class="admlist" style="min-width: 800px">
                    <caption>{{ @trans('shop.products') }}</caption>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th class="la" style="width: 20%;">{{ @trans('shop.code') }}</th>
                        <th class="la" style="width: 30%;">{{ @trans('shop.call_name') }}</th>
                        <th class="la" style="width: 20%;">{{ @trans('shop.category') }}</th>
                        <th style="width: 10%;">{{ @trans('shop.price') }}</th>
                        <th style="width: 15%;">{{ @trans('shop.actions') }}</th>
                    </tr>
                    <tbody class="adb">
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
@extends('layouts.admin')

@section('contents')
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist">
                <caption>{{ @trans('shop.categories') }}</caption>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th class="la" style="width: 15%;">{{ @trans('shop.code') }}</th>
                    <th class="la" style="width: 20%;">{{ @trans('shop.call_name') }}</th>
                    <th class="la" style="width: 50%;">{{ @trans('shop.description') }}</th>
                    <th style="width: 10%;">&nbsp;</th>
                </tr>
                <tbody class="adb">
                    @foreach($categories as $category)
                        <tr>
                            <td class="ca">{{ $category->id }}</td>
                            <td>{{ $category->code }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>&nbsp;</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
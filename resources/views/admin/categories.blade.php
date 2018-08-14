@extends('layouts.admin')

@section('contents')
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist">
                <caption>{{ @trans('shop.categories') }}</caption>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th class="la" style="width: 25%;">{{ @trans('shop.code') }}</th>
                    <th class="la" style="width: 55%;">{{ @trans('shop.call_name') }}</th>
                    <th style="width: 15%;">{{ @trans('shop.actions') }}</th>
                </tr>
                <tbody class="adb">
                    @foreach($categories as $category)
                        <tr onclick="document.location.href='{{ route('admin.categories.show', [$category->id]) }}'; return false;">
                            <td class="ca">{{ $category->id }}</td>
                            <td>{{ $category->code }}</td>
                            <td>{{ $category->name }}</td>
                            <td>&nbsp;</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
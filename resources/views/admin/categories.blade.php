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
                    <tr>
                        <td class="ca" onclick="document.location.href = '{{ route('admin.categories.show', [$category->id]) }}'; return false;">{{ $category->id }}</td>
                        <td onclick="document.location.href = '{{ route('admin.categories.show', [$category->id]) }}'; return false;">{{ $category->code }}</td>
                        <td onclick="document.location.href = '{{ route('admin.categories.show', [$category->id]) }}'; return false;">{{ $category->name }}</td>
                        <td class="ca">
                            <span class="edit" title="{{ @trans('shop.edit') }}">
                                <img src="/images/blank.gif" class="tctr"
                                     onclick="document.location.href='{{ route('admin.categories.edit', [$category->id]) }}'; return false;"/></span>
                            <span class="delete" title="{{ @trans('shop.delete') }}">
                                <img src="/images/blank.gif" class="tctr"/>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
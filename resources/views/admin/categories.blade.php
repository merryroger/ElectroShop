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
                        <td class="ca"
                            onclick="return requestEntity('{{ route('admin.categories.show', [$category->id]) }}')">{{ $category->id }}</td>
                        <td onclick="return requestEntity('{{ route('admin.categories.show', [$category->id]) }}')">{{ $category->code }}</td>
                        <td onclick="return requestEntity('{{ route('admin.categories.show', [$category->id]) }}')">{{ $category->name }}</td>
                        <td class="ca">
                            <span class="edit" title="{{ @trans('shop.edit') }}">
                                <img src="/images/blank.gif" class="tctr"
                                     onclick="return requestEntity('{{ route('admin.categories.edit', [$category->id]) }}')"/></span>
                            <span class="delete" title="{{ @trans('shop.delete') }}">
                                <img src="/images/blank.gif" class="tctr"
                                     onclick="return removeEntity('{{ route('admin.categories.remove', [$category->id]) }}', '{{ @trans('shop.do_rem_cat') }}')"/>
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
@endsection
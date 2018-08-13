@extends('layouts.admin')

@section('contents')
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist">
                <caption>{{ @trans('shop.add_category') }}</caption>
                <tr>
                    <td>
                        <form action="{{ route('admin.categories.add') }}" method="post" enctype="multipart/form-data"
                              class="adm_form">
                            @csrf
                            <div class="adm_form_row">
                                <label for="name">{{ @trans('shop.call_name') }}</label>
                                <input type="text" name="name" value="{{ old('name') }}" tabindex="1" required
                                       autofocus/>
                            </div>
                            <div class="adm_form_row">
                                <label for="code">{{ @trans('shop.code') }}</label>
                                <input type="text" name="code" value="{{ old('code') }}" tabindex="2" required/>
                            </div>
                            <div class="adm_form_row">
                                <label for="description"
                                       style="vertical-align: top;">{{ @trans('shop.description') }}</label>
                                <textarea name="description" rows="4" tabindex="3"
                                          required>{{ old('description') }}</textarea>
                            </div>
                            <div class="adm_form_row">
                                <label for="image">{{ @trans('shop.image') }}</label>
                                <input type="file" name="image" tabindex="4" required/>
                            </div>
                            <div class="admfmctrls">
                                <button type="button" class="cancel" tabindex="5"
                                        onclick="document.location.href='{{ route('admin.categories.list') }}'">{{ @trans('shop.cancel') }}</button>
                                <button type="submit" class="do" tabindex="6">{{ @trans('shop.send') }}</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
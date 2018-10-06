@extends('layouts.admin')

@section('contents')
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist">
                <caption>{{ @trans('shop.edit_product') }}</caption>
                <tr>
                    <td>
                        <form action="{{ route('admin.products.update', [$product->id]) }}" method="post" enctype="multipart/form-data"
                              class="adm_form">
                            <input type="hidden" name="id" value="{{ $product->id }}" />
                            @csrf
                            @method('PATCH')
                            <div class="adm_form_row">
                                <label for="name">{{ @trans('shop.call_name') }}</label>
                                <input type="text" name="name" value="{{ $product->name }}" tabindex="1" required
                                       autofocus/>
                            </div>
                            <div class="adm_form_row">
                                <label for="code">{{ @trans('shop.code') }}</label>
                                <input type="text" name="code" value="{{ $product->code }}" tabindex="2" required/>
                            </div>
                            <div class="adm_form_row">
                                <label for="category_id">{{ @trans('shop.category') }}</label>
                                <select name="category_id" size="1" tabindex="3">
                                    @foreach($categories as $id => $name)
                                        @if($id == $product->category_id)
                                            <option value="{{ $id }}" selected>{{ $name }}</option>
                                        @else
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="adm_form_row">
                                <label for="price">{{ @trans('shop.price') }}</label>
                                <input type="text" name="price" value="{{  sprintf('%01.2f', $product->price) }}" tabindex="4" required/>
                            </div>
                            <div class="adm_form_row">
                                <label for="description"
                                       style="vertical-align: top;">{{ @trans('shop.description') }}</label>
                                <textarea name="description" rows="4" tabindex="5"
                                          required>{{ $product->description }}</textarea>
                            </div>
                            <div class="adm_form_row">
                                <label for="image">{{ @trans('shop.image') }}</label>
                                <input type="file" name="image" tabindex="6" />
                            </div>
                            <div class="admfmctrls">
                                <button type="button" class="cancel" tabindex="7"
                                        onclick="document.location.href='{{ route('admin.products.list') }}'">{{ @trans('shop.cancel') }}</button>
                                <button type="submit" class="do" tabindex="8">{{ @trans('shop.send') }}</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
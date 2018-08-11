@extends('layouts.shop')

@section('contents')
    <div class="pt">
        <div class="ptc hc vc">
            <div class="login_form">
                <div class="form_caption">{{ @trans('shop.signing_in') }}</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form_row">
                        <label for="name">{{ @trans('shop.login') }}</label>
                        <input id="name" type="text" class="form_item" name="name" value="{{ old('name') }}"
                               tabindex="1" required autofocus>
                    </div><br clear="all" />
                    <div class="form_row">
                        <label for="password">{{ @trans('shop.password') }}</label>
                        <input id="password" type="password" class="form_item" name="password" tabindex="2" required>
                    </div><br clear="all" />
                    <div class="fmctrls">
                        <button type="submit" class="do" tabindex="3">{{ @trans('shop.sign_in') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

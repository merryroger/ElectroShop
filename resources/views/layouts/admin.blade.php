<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ @trans('shop.title') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Raleway:100,600|Fira+Sans+Extra+Condensed"
          rel="stylesheet" type="text/css">

    <!-- Styles -->
    @dump(session()->all());
    @if(strcmp(session()->get('user'), 'admin'))
        <link rel="stylesheet" href="css/shop.css" type="text/css">
    @else
        <link rel="stylesheet" href="css/admin.css" type="text/css">
    @endif
</head>
<body>
<div class="header">
<!--
    <header>
        @if(Route::currentRouteName() == 'products')
    <div class="title">{{ @trans('shop.name') }}</div>
        @else
    <div class="title"><a href="/">{{ @trans('shop.name') }}</a></div>
        @endif
        <nav class="menu">
            @include('menu')
        </nav>
        <nav class="ctrls">
        <span>
            @if(Route::currentRouteName() == 'login')
    {{ @trans('shop.sign_in') }}
@else
    <a href="{{ route('login') }}">{{ @trans('shop.sign_in') }}</a>
            @endif
        </span>
            <span>
            <a href="{{ route('register') }}">{{ @trans('shop.sign_up') }}</a>
        </span>
        </nav>
        <br clear="all"/>
    </header>
    @if ($errors->has('name'))
    <div class="invalid-feedback"><span>{{ $errors->first('name') }}</span></div>
    @endif
@if ($errors->has('password'))
    <div class="invalid-feedback"><span>{{ $errors->first('password') }}</span></div>
    @endif
        //-->
</div>
@yield('contents')
</body>
</html>

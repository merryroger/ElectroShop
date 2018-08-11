<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ @trans('shop.title') }}</title>

    <!-- Scripts -->
    <script src="/js/admcontrols.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Raleway:100,600|Fira+Sans+Extra+Condensed"
          rel="stylesheet" type="text/css">

    <!-- Styles -->
    @if(strcmp(Auth::user()->role, 'admin'))
        <link rel="stylesheet" href="css/shop.css" type="text/css">
    @else
        <link rel="stylesheet" href="css/admin.css" type="text/css">
    @endif
</head>
<body>
<div class="header">
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
            <span onmouseover="showDDMenu(this)" onmouseout="closeDDMenu()" onclick="return false;">
                <a href="#">{{ Auth::user()->name }}</a>
            </span>
            <div id="dd_menu" class="h">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ @trans('shop.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
        <br clear="all"/>
    </header>
</div>
@yield('contents')
</body>
</html>

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
    <link rel="stylesheet" href="/css/shop.css" type="text/css">
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
</head>
<body>
<div class="header">
    <header>
        <div class="title"><a href="/">{{ @trans('shop.To') }} {{ @trans('shop.name') }}</a></div>
        <nav class="menu">
            @include('admenu')
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
    @if ($errors->any())
        <div class="invalid-feedback">
                <span>
                @foreach($errors->all() as $error)
                        {{ $error }}.
                    @endforeach
                </span>
        </div>
    @endif
</div>
@yield('contents')
</body>
</html>

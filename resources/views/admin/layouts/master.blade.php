<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Food Order</title>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/source/backend/admin/crown/css/main.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/source/backend/admin/css/css.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/source/backend/admin/css/error.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/source/backend/admin/css/jquery-confirm.min.css') }}" />
    </head>
<body>
    @include('admin.layouts.sidebar')
    <div id="rightSide">
    <div class="topNav">
        @include('admin.layouts.header')
    </div>
    
    <div class="line"></div>
        @yield('content')
    <div class="clear mt30"></div>
        @include('admin.layouts.footer')
    </div>
    <div class="clear"></div>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
    <head>
        @include('layout.head')
        @include('layout.css')
    </head>
    <body class=" {{$com}} {{@$com != "trang-chu" && @$com != "intro" ? 'trangtrong' : '' }} ">

        @if($com == 'intro')
            @yield('contentintro')
        @else
            @yield('contentmaster')
        @endif
        @include('layout.js')
        @include('layout.strucdata')
    </body>
</html>
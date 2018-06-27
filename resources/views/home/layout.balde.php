<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')楚楼网--找写字楼上楚楼网十分钟轻松搞定@show</title>
    <script src="/js/home_manifest.js"></script>
    <script src="/js/home_vendor.js"></script>
    @yield('header')
</head>
<body>
    <div>
        @include('home.head')
    </div>
    <div>
        @yield('body')
    </div>
    <div>
        @include('home.footer')
    </div>
</body>
</html>
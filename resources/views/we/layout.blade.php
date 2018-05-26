<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/css/mui/mui.css">
    <title>@section('title')楚楼网--找写字楼上楚楼网十分钟轻松搞定@show</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    @yield('header')
</head>
<body>
@yield('body')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <link rel="shortcut icon" href="{{res('/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{res('/css/mui/mui.css')}}">
    <title>@section('title')楚楼网--找写字楼上楚楼网十分钟轻松搞定@show</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?a8bb44e51deceeae65bac46930eab06e";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script src="{{res('/js/manifest.js')}}"></script> 
    <script src="{{res('/js/vendor.js')}}"></script>
    @yield('header')
</head>
<body>
<div style="max-width: 768px;margin: 0 auto">
    @yield('body')
</div>
</body>
</html>
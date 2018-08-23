<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <link rel="shortcut icon" href="{{res('/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- <base target="_blank"> -->
    <title>@section('title')楚楼网--找写字楼上楚楼网十分钟轻松搞定@show</title>
    @yield('header')
</head>
<body>
@yield('body')
<script src="{{homeRes('/js/home_manifest.js')}}"></script>
<script src="{{homeRes('/js/home_vendor.js')}}"></script>
@yield('script')
<script>
    (function(b,a,e,h,f,c,g,s){b[h]=b[h]||function(){(b[h].c=b[h].c||[]).push(arguments)};
    b[h].s=!!c;g=a.getElementsByTagName(e)[0];s=a.createElement(e);
    s.src="//s.union.360.cn/"+f+".js";s.defer=!0;s.async=!0;g.parentNode.insertBefore(s,g)
    })(window,document,"script","_qha",274244,false);
    </script>
</body>
</html>
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
    {{--<script>--}}
        {{--// 百度统计 商桥客服--}}
        {{----}}
    {{--</script>--}}

    @yield('header')
</head>
<body>
@yield('body')
<script src="{{shopRes('/js/shop_manifest.js')}}"></script>
<script src="{{shopRes('/js/shop_vendor.js')}}"></script>
@yield('script')
</body>
</html>
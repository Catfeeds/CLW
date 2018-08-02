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
</body>
</html>
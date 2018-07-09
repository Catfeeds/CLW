<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="safeString" content="{{ $safeString }}">
    <link rel="stylesheet" href="{{res('/css/home_mapLookForHouse.css')}}">
    <title>地图demo</title>
</head>
<body>
<div id="app">
     {{--<map-look-for></map-look-for>--}}
    <self-div a1='ss1' a2='ss2' a3='ss3'> </self-div>
</div>
<script src="{{res('/js/home_manifest.js')}}"></script>
<script src="{{res('/js/home_vendor.js')}}"></script>
<script src="{{res('/js/home_mapLookForHouse.js')}}"></script>
</body>
</html>
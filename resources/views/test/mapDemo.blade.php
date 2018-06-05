<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{res('/css/home_mapLookForHouse.css')}}">
    <title>地图demo</title>
</head>
<body>
<div id="app">
    <baidu-map class="map" style="display: flex;flex:1;flex-direction: column" center="北京">
        <bm-view style="width: 100%; flex: 1"></bm-view>
    </baidu-map>
    <script src="{{res('/js/home_manifest.js')}}"></script>
    <script src="{{res('/js/home_vendor.js')}}"></script>
    <script src="{{res('/js/home_mapLookForHouse.js')}}"></script>
</div>
</body>
</html>
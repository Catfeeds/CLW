<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
  <link rel="shortcut icon" href="{{res('/favicon.ico')}}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>楚楼网APP下载</title>
  <link rel="stylesheet" href="{{res('/css/we_appDownload.css')}}">
</head>
<body>
  <div class="content-box">
    <img src="{{res('/we_img/downAPP_bg.jpg')}}" alt="app 下载背景">
    <div class="download-btn-box">
      <a href="{{$res[1]}}" class="download-btn js_down-btn">
        <img src="{{res('/we_img/ios_download.png')}}" alt="ios下载">
      </a>
      <a href="{{$res[2]}}" class="download-btn js_down-btn">
        <img src="{{res('/we_img/Android_download.png')}}" alt="android下载">
      </a>
    </div>
  </div>
<div id="weixinTip" style="height: 931px;"><p><img style="width:100%;" src="{{res('/we_img/live_weixin.png')}}" alt="微信打开"></p></div>
  <script src="{{res('/js/we_manifest.js')}}"></script>
  <script src="{{res('/js/we_vendor.js')}}"></script>
  <script src="{{res('/js/we_appDownload.js')}}"></script>
</body>
</html>
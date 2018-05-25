@extends('we.layout')
@section('title', $res->name)
@section('header')
    <link rel="stylesheet" href="/css/we_serve_detail.css">
@endsection
@section('body')
    <div>
        <footer id="footer" class="mui-row">
            <div class="collect mui-col-xs-6">
                <img src="https://upload.chulouwang.com/Fskst8Zv9Hp78Z0loIoFj8-RF0QA">
<<<<<<< HEAD
                <span style="font-size: 18px;">4000-580-888</span>
            </div>
            <div class="mui-col-xs-6" id="free" style="text-align: center; margin-left: 10px">
                <a href="tel:4000-580-888">
                    <button id="btn_reservation" type="button" class="mui-btn mui-btn-primary" style="width: 180px; height: 48px; font-size:18px ">立即预约</button>
                </a>
=======
                <span>4000-580-888</span>
>>>>>>> origin/jacklin
            </div>
            <a href="tel:4000-580-888" class="mui-col-xs-6">
                <div id="free" style="text-align: center; margin-left: 10px">
                    <button id="btn_reservation" type="button" class="mui-btn mui-btn-primary" style="width: 100%; height: 100%; font-size:18px ">立即预约</button>
                </div>
            </a>
        </footer>
        <div style="margin-bottom: 64px;">
            @foreach($res->detail_url as $img)
                <span style="display: flex; flex-direction: column;"><img style="width: 100%;" src="{{$img}}"></span>
            @endforeach
        </div>
    </div>
@endsection
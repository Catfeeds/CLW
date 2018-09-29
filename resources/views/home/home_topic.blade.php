@extends('home.layouts.layout')
@section('title', '精选专题')
@section('header')
    <link rel="stylesheet" href="{{homeRes('/css/home_topic.css')}}">
@endsection
@section('body')
    @include('home.nav')
    <div class="container">
        <!-- 头部展示图  -->
        <div class="header" style="background:url({{$pcRecommend->big_details_pic_cn}}) no-repeat center;">
        </div>
        <!-- 内容展示区 -->
        <div class="content">
            <!-- 内容简介区块 -->
            <div class="content_title clearfix">
                <div class="title f_l">
                    <div class="name">{{$pcRecommend->title}}</div>
                    <div class="describe">{{$pcRecommend->introduce}}</div>
                </div>
                <img src="{{$pcRecommend->small_details_pic_cn}}" alt="" class="f_r">
            </div>
            <!-- 相关楼盘 -->
            <div class="other_build">
                <div class="title">相关楼盘</div>
                <div class="enjoyList">
                    @foreach($res as  $index => $data)
                        <a href="{{url('/buildings/'.$data['guid'])}}">
                            <div class="enjoyDetail">
                                <div class="enjoyPic">
                                    <img src="{{$data['img_cn']}}" alt="">
                                </div>
                                <div class='enjoyInfor'>
                                    <div class="enjoyTitle">{{$data['name']}}</div>
                                    <div class="enjoyIntro">
                                        <div class="enjoyAddress"><img src="{{homeRes('/home_img/house_detail_map1.png')}}">{{$data['address_cn']}}</div>
                                        <div class="enjoyPrice"><span>{{$data['avg_price']}}</span> 元/m²月</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @include('home.footer')
@endsection
@section('script')
@endsection
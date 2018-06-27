@extends('home.layouts.layout')
@section('title', '咨询列表')
@section('header')
    <link rel="stylesheet" href="{{res('/css/home_information.css')}}">

@endsection
@section('body')
    <div class="container">
        <!--  -->
        <div class="nav"><span>首页</span><span>>咨询</span><span>>全部咨询</span></div>
        <div class="main">
            <div class="left">
                <ul>
                    <li>
                        <div class="common">
                            <!-- 轮播图 -->
                            <div class="swiper">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">Slide 1</div>
                                        <div class="swiper-slide">Slide 2</div>
                                        <div class="swiper-slide">Slide 3</div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <!-- 标题 -->
                            <div class="left-title">佛山8.9亿挂牌禅城、三水两宗商住地</div>
                            <!-- 简介 -->
                            <div class="left-content">啊实打实大师的大师大师大师大师大师大圣诞节快乐就是大了</div>
                        </div>
                    </li>
                    <!--咨询-->
                    <li class="list">
                        <div class="list-time"><span>2018 05/22</span></div>
                        <div class="list-body">
                            <!--图片-->
                            <div class="list-body-left"><img></div>
                            <div class="list-body-right">
                                <!--标题-->
                                <div>成都一写字楼空调噪音扰民？官放：协商蒋多举措施降噪音</div>
                                <!--时间-->
                                <div class="list-body-time">2018/06/07 10:12:15</div>
                                <!--简介-->
                                <div class="list-body-content">
                                    成都天府进程绿道首期即将开放成都天府进程绿道首期即将开放成都天府进程绿道首期即将开放成都天府进程绿道首期即将开放成都天府进程绿道首期即将开放成都天府进程绿道首期即将开放
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="right">
                <div class="right-title"><span>热门咨询</span></div>
                <div>
                    <ul>
                        <li><span>行业新闻</span>|<span>成都天府进程绿道首期即将开放</span></li>
                        <li><span>行业新闻</span>|<span>成都天府进程绿道首期即将开放</span></li>
                        <li><span>行业新闻</span>|<span>成都天府进程绿道首期即将开放</span></li>
                        <li><span>行业新闻</span>|<span>成都天府进程绿道首期即将开放</span></li>
                        <li><span>行业新闻</span>|<span>成都天府进程绿道首期即将开放</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{res('/js/home_information.js')}}"></script>
@endsection

@extends('home.layouts.layout')
@section('title', '咨询列表')
@section('header')
    <link rel="stylesheet" href="{{res('/css/home_information.css')}}">
    <link rel="stylesheet" href="{{res('/css/home_paging.css')}}">
@endsection
@section('body')

    <div class="continue">
        <!--  -->
        <div class="nav"><span>首页 </span><span>> 资讯 </span><span>> 全部资讯</span></div>
        <div class="main">
            <div class="left">
                <ul>
                    <li>
                        <div class="common">
                            <!-- 轮播图 -->
                            <div class="swiper">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($tops as $top)
                                            <div class="swiper-slide"><img src="{{$top->banner_cn}}"></div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <div class="swiper-container1">
                                <div class="swiper-wrapper swiper-no-swiping">
                                @foreach($tops as $top)
                                    <div class="swiper-slide">
                                        <!-- 标题 -->
                                        <div class="left-title">{{$top->title}}</div>
                                        <div class="line"></div>
                                        <!-- 简介 -->
                                        <div class="left-content">{{$top->brief}}</div>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                        </div>
                    </li>
                    <!--咨询-->
                    @foreach($contents as $key => $content)
                        <?php $time = explode('-', $key)?>
                        <li class="list">
                            <div class="list-time"><span class="year">{{$time[0]}} </span><span
                                        class="md">{{$time[1].'/'.$time[2]}}</span></div>
                            @foreach($content as $cont)
                                <div class="list-body">
                                    <!--图片-->
                                    <div class="list-body-left"><img src="{{$cont->banner_cn}}"></div>
                                    <div class="list-body-right">                                       
                                        <div class="class"><span class="icon"></span><span>行业新闻</span></div>
                                        <!--标题-->
                                        <div class="title">{{$cont->title}}</div>
                                        <!--时间-->
                                        <div class="list-body-time">{{$cont->created_at}}</div>
                                        <!--简介-->
                                        <div class="list-body-content">
                                            {{$cont->brief}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
                
            </div>
            <div class="right">
                <div class="img">
                    <img src="/home_img/infomation_right.jpg" alt="">
                </div>
                <div class="zixun">
                    <div class="right-title"><span>热门资讯</span></div>
                    <div>
                        <ul>
                            @foreach($hots as $hot)
                                <li><span>{{$hot->title}}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-left:500px; background-color: #fff">
        {{ $contents->links() }}
    </div>
@endsection
@section('script')
    <script src="{{res('/js/home_information.js')}}"></script>
@endsection

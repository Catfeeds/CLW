@extends('home.layouts.layout')
@section('title', '资讯中心')
@section('header')
    <link rel="stylesheet" href="{{homeRes('/css/home_information.css')}}">
@endsection
@section('body')
    @include('home.nav')
    <div class="continue">
        <!--  -->
        <div class="nav"><a href="{{url('/')}}"><span>首页 </span></a><span>> 资讯中心</span></div>
        <div class="main">
            <div class="left">
                <ul>
                    <li style="overflow:hidden">
                        <div class="common">
                            <!-- 轮播图 -->
                            <div class="swiper">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($tops as $top)
                                            <div class="swiper-slide"><a href="{{url('/information').'/'.$top->id}}"><img src="{{$top->banner_cn}}"></a></div>
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
                                        <a href="{{url('/information').'/'.$top->id}}">
                                            <div class="left-title">
                                                {{$top->title}}
                                            </div>
                                        </a>
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
                                <a href="{{url('/information').'/'.$cont->id}}">
                                    <div class="list-body">
                                        <!--图片-->
                                        <div class="list-body-left"><img src="{{$cont->banner_cn}}-web_infomation_list"></div>
                                        <div class="list-body-right">
                                            <div class="class"><span class="icon" style="background: url({{homeRes('/home_img/hangye_logo.png')}}) no-repeat;"></span><span>行业新闻</span></div>
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
                                </a>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
                <div class="pagination">
                    {{ $contents->links() }}
                </div>
            </div>
            <div class="right">
                <div class="img">
                    <a href="{{url('/about/we')}}">
                        <img src="{{homeRes('/home_img/infomation_right.jpg')}}" alt="">
                    </a>
                </div>
                <div class="zixun">
                    <div class="right-title"><span>热门资讯</span></div>
                    <div>
                        <ul>
                            @foreach($hots as $hot)
                                <li><span class="el-icon-caret-right"></span><a href="{{url('/information').'/'.$hot->id}}"><span>{{$hot->title}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.footer')
@endsection
@section('script')
    <script src="{{homeRes('/js/home_information.js')}}"></script>
@endsection

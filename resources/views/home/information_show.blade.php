@extends('home.layouts.layout')
@section('title', '资讯详情')
@section('header')
    <link rel="stylesheet" href="{{homeRes('/css/home_information_show.css')}}">
@endsection
@section('body')
    @include('home.nav')
    <div class="continue">
        <!--  -->
        <div class="nav">
            <a href="{{url('/')}}">
                <span>首页 </span>
            </a>
            <span>> </span>
            <a href="{{url('/information')}}">
                <span>资讯中心</span>
            </a> 
            <span>> </span>
            <span>资讯详情</span>
        </div>
        <div class="main">
            <div class="left">
                <div class="title">{{$information->title}}</div>
                <div class="explain">
                    <span>发布时间:{{$information->created_at}}</span>
                    <span class="source">来源: {{$information->source}}</span>
                </div>
                <div class="info-body">
                    {!! $information->content !!}
                </div>
                <div class="info-bottom">
                    <div class="pub-number"><img src="{{homeRes('/home_img/qr_code.jpg')}}" /></div>
                    <div class="pub-number"><span>关注楚楼网公众号，更多资讯等你看</span></div>
                    <div class="up-down">
                        <a href="{{url('/information/'.$previous->id)}}"><div>上一篇: {{$previous->title}}</div></a>
                        <a href="{{url('/information/'.$next->id)}}"><div>下一篇: {{$next->title}}</div></a>
                    </div>

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

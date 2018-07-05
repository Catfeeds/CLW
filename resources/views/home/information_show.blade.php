@extends('home.layouts.layout')
@section('title', '咨询列表')
@section('header')
    <link rel="stylesheet" href="{{res('/css/home_information_show.css')}}">
@endsection
@section('body')
    <div class="continue">
        <!--  -->
        <div class="nav"><span>首页 </span><span>> 资讯 </span><span>> 全部资讯</span></div>
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
                    <div class="pub-number"><img /></div>
                    <div class="pub-number"><span>关注楚楼网公众号，更多资讯等你看</span></div>
                    <div class="up-down">
                        <div><a>上一篇: 行业资讯 | 市场预测 成都写字楼将新增供应70万平方米</a></div>
                        <div><a>下一篇: 行业资讯 | 市场预测 成都写字楼将新增供应70万平方米</a></div>
                    </div>

                </div>
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

    {{--<div style="padding-left:500px; background-color: #fff">--}}
        {{--{{ $contents->links() }}--}}
    {{--</div>--}}
@endsection
@section('script')
    <script src="{{res('/js/home_information.js')}}"></script>
@endsection

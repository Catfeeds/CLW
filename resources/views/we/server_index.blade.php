@extends('we.layout')
@section('title', '服务列表')
@section('header')
    <link rel="stylesheet" href="/css/we_serve_index.css">
@endsection
@section('body')
    <div class="mui-content">
        <div class="banner" id='VueServerList'>
            <img style="width: 100%;" src="https://upload.chulouwang.com/Fk7wZGD2B7xeQwLdoI4LrGNYen20">
        </div>
        <div id="serveListlVue" class="essential">
            @foreach($res as $items)
                <div class="title">
                    <div class="border"></div>
                    <div class="nav">{{ $items->name }}</div>
                </div>
                <div class="list">
                    <div class="first mui-row">
                        @foreach($items->service as $ite)
                            <div class="mui-col-xs-3" style="margin-bottom: 18px">
                                <a href="{{url('/servers').'/'.$ite->id}}"> <img src="{{$ite->list_icon_url}}"><h5>{{$ite->name}}</h5></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if(!$loop->last)
                    <div class="finance"></div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
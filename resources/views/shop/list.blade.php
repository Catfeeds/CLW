@extends('shop.layout.layout')
@section('title', '商城列表页')
@section('header')
    <link rel="stylesheet" href="/css/shop_list_worktool.css">
@endsection
@section('body')
    @include('shop.header')
    <!-- 列表页盒子 -->
    <div class="list_container">
    @include('shop.layout.common_area')
    <!-- 商品展示区 -->
        <div class="list_details">
            <ul class="show_details">
                @foreach($datas as $data)
                    <li class="show_detail">
                        <a href="{{$data->details_url}}" class="detail_pic">
                            <img style="width:100%; height: 100%" src="{{$data->img_cn}}" alt="">
                        </a>
                        <div class="product_name">{{$data->name}}</div>
                        <div class="product_price"><span>{{$data->price}}</span>{{$data->unit}}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @include('home.footer')
@endsection
@section('script')
@endsection
@extends('shop.layout.layout')
@if(request()->getPathInfo() == '/furniture')
@section('title', '办公家具列表页')
@elseif(request()->getPathInfo() == '/computers')
@section('title', '办公设备列表页')
@endif
@section('header')
    <link rel="stylesheet" href="{{shopRes('/css/shop_list_worktool1.css')}}">
@endsection
@section('body')
    @include('shop.header')
    <!-- 列表页盒子 -->
    <div class="list_container">
    @include('shop.layout.common_area')
    <!-- 商品展示区 -->
        <div class="list_details">
            <ul class="show_details">
            @if(!empty($datas->count()))
            @foreach($datas as $data)
            <a href="{{$data->details_url}}">
                <li class="show_detail"> 
                    <div  class="detail_pic">
                    <img src="{{$data->img_cn}}" alt="">
                    </div>
                    <div class="product_name">{{$data->name}}</div>
                    <div class="product_price"><span>{{$data->price}}</span> {{$data->price_unit}}</div>
                </li>
            </a>
            @endforeach
            @else
            <li class="list_nothing">
                <img src="{{shopRes('/shop_img/coming_soon.jpg')}}" alt="">
            </li>
             @endif
            </ul>
        </div>
    </div>
    @include('shop.footer')
@endsection
@section('script')
@endsection
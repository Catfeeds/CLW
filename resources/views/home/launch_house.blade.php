@extends('home.layouts.layout')
@section('title', '投放房源')
@section('header')
  <link rel="stylesheet" href="{{homeRes('/css/home_launchouse.css')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
@endsection
@section('body')
  @include('home.nav')
  <div class="box" style="background-image:url('/home_img/sellhouse_back.jpg');">
    <div class="container">
      <div class="title">楚楼网帮您出租!</div>
      <div class="min_title">海量客源,快速成交</div>
      <div class="form_container" style="margin-bottom:63px;">
        <form id="commentForm">
          <div class="connect">
            <span>*</span>联系人
          </div>
          <div class="content">
            <input name="name" type="text" placeholder="联系人姓名"/>
            <div class="errorTitle js_appellation" data-container="body" data-toggle="popover" data-placement="right" data-content="请输入联系人"></div>
            <div class="errorTitle appellation_length" data-container="body" data-toggle="popover" data-placement="right" data-content="联系人最长不能超过32"></div>
          </div>
          <div class="phone">
            <span>*</span>联系电话
          </div>
          <div class="content">
            <input name="tel" type="text" placeholder="联系人手机号">
            <div class="errorTitle js_tel" data-container="body" data-toggle="popover" data-placement="right" data-content="请输入电话"></div>
            <div class="errorTitle tel_length" data-container="body" data-toggle="popover" data-placement="right" data-content="电话长度格式错误"></div>
          </div>
          <div class="connect">
            <span></span>投放写字楼
          </div>
          <div class="content" id="areaVue">
            <input name="area_name" type="hidden" v-model='area_name'>
            <div class="area">
              <select name="area_guid" v-model='area_id'>
                <option :value="null">选择投放区域</option>
                @foreach ($area as $area_item)
                  <option id="area_id{{$area_item['area_guid']}}" value="{{$area_item['area_guid']}}">{{$area_item['area_name']}}</option>
                @endforeach
              </select>
              <select id="block_select" name='block_guid' v-model='block_id'>
                  <option :value="null">选择商圈</option>
                  <option v-if='area_id' v-for='(item, index) in blockOption["area_"+area_id]' :value="item.id">
                    @{{item['name']}}
                  </option>
              </select>
            </div>
            <div>
              <input name="building_name" type="text" placeholder="写字楼名称">
            </div>
          </div>
          <button type="submit">提交房源</button>
        </form>
      </div>
      <div class="detail">
        <ul>
          <li>
            <img src="{{homeRes('/home_img/sellhouse_submit.png')}}" />
            <div>提交委托</div>
            <img src="{{homeRes('/home_img/sell_arrow.png')}}" alt="" class="arrow">
          </li>
          <li>
            <img src="{{homeRes('/home_img/collect_info.png')}}" style="padding-top:6px"/>
            <div>采集房源信息</div><img src="{{homeRes('/home_img/sell_arrow.png')}}" alt="" class="arrow">
          </li>
          <li>
            <img src="{{homeRes('/home_img/vistor_home.png')}}" style="padding-top:1px"/>
            <div>上门实勘</div>
            <img src="{{homeRes('/home_img/sell_arrow.png')}}" alt="" class="arrow">
          </li>
          <li><img src="{{homeRes('/home_img/spread.png')}}" /><div>线上推广</div></li>
        </ul>
      </div>
    </div>
    <input type="hidden" id="blockData" value="{{json_encode($block)}}">
  </div>
@endsection
@section('script')
  <script src="{{homeRes('/js/home_launchouse.js')}}"></script>
@endsection
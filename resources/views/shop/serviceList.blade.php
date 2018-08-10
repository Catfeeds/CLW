@extends('shop.layout.layout')
@section('title', '商城列表页')
@section('header')
    <link rel="stylesheet" href="/css/shop_serviceList.css">
@endsection
@section('body')
@include('shop.header')
    <!-- 列表页盒子 -->
    <div class="main">
      <div class="list_container">
        <div class="graybox top_link">
          <a href="{{url('/')}}" class="home_page">首页</a>
          <span class="top_arrow">></span>
          @if(request()->getPathInfo() == '/cleanup')
          <span class="current_page">入驻服务</span>
          @elseif(request()->getPathInfo() == '/companyDecorat')
          <span class="current_page">企业装修</span>
          @elseif(request()->getPathInfo() == '/business_taxes')
          <span class="current_page">工商财税</span>
          @endif
        </div> 
        <div class="select_area">
          @if(request()->getPathInfo() == '/cleanup')
          <div class="select_option serve_select clearfix">
            <div class="select_title f_l">全部分类</div>
            <ul class="select_details clearfix f_l">
              <li class="f_l select_detail"><a class="@if($serveid=='1')current @endif" href="javascript:void(0)">日常保洁</a></li>
              <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($serveid=='2')current @endif">开荒保洁</a></li>
              <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($serveid=='3')current @endif">搬家服务</a></li>
              <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($serveid=='4')current @endif">室内环保</a></li>
              <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($serveid=='5')current @endif">桶装水</a></li>
            </ul>
          </div>
          @endif
          @if(request()->getPathInfo() == '/companyDecorat')
          <div class="select_option serve_select clearfix">
          <div class="select_title f_l">全部分类</div>
            <ul class="select_details clearfix f_l">
              <li class="f_l select_detail"><a class="@if($id=='1') current @endif" href="javascript:void(0)">室内装修</a></li>
              <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($id=='2') current @endif">综合布线</a></li>
            </ul>
          </div>
          @endif
          @if(request()->getPathInfo() == '/business_taxes')
          <div class="select_option serve_select clearfix">
            <div class="select_title f_l">代理记账：</div>
            <ul class="select_details clearfix f_l">
              <li class="f_l select_detail select_taxes"><a  href="javascript:void(0)" class="@if($finance=='1') current @endif" href="javascript:void(0)">小规模记账</a></li>
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='2') current @endif" href="javascript:void(0)">一般纳税人代理记账</a></li>
            </ul>
          </div>
          <div class="select_option serve_select clearfix">
            <div class="select_title f_l">工商代办：</div>
            <ul class="select_details clearfix f_l">
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='3') current @endif" href="javascript:void(0)">有限责任公司注册</a></li>
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='4') current @endif" href="javascript:void(0)">外商独资公司注册</a></li>
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='5') current @endif" href="javascript:void(0)">合伙企业注册</a></li>
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='6') current @endif" href="javascript:void(0)">个人独资企业注册</a></li>
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='7') current @endif" href="javascript:void(0)">公司注册地址</a></li>
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='8') current @endif" href="javascript:void(0)">分公司注册</a></li>
              <li class="f_l select_detail select_taxes"><a href="javascript:void(0)" class="@if($finance=='9') current @endif" href="javascript:void(0)">一般人注册地址</a></li>
            </ul>
          </div>
          @endif
        </div>
      </div>
      @if(request()->getPathInfo() == '/cleanup')
      <div class="serviceDetail">
        <div class="js_dailyClean" style="@if($serveid=='1') display:block @else()display:none @endif">
          @include('shop.layout.list_clean_common')
        </div>
        <div class="js_cleanse" style="@if($serveid=='2') display:block @else()display:none @endif">
          @include('shop.layout.list_clean_common')
        </div>
        <div class="js_move" style="@if($serveid=='3') display:block @else()display:none @endif">
          @include('shop.layout.move')
        </div>
        <div class="js_protection" style="@if($serveid=='4') display:block @else()display:none @endif">
          @include('shop.layout.indoor_protection')
        </div>
        <div class="js_water" style="@if($serveid=='5') display:block @else()display:none @endif">
          @include('shop.layout.mineral_water')
        </div>
      </div>
      @endif
      @if(request()->getPathInfo() == '/companyDecorat')
      <div class="serviceDetail">
        <div class="js_decoration" style="@if($id=='1') display:block @else()display:none @endif">
          @include('shop.layout.interior_decoration')
        </div>
        <div class="js_colligate" style="@if($id=='2') display:block @else()display:none @endif">
          @include('shop.layout.colligate')
        </div>
      </div>
      @endif
      @if(request()->getPathInfo() == '/business_taxes')
      <div class="serviceDetail">
        <div class="js_charge" style="@if($finance=='1') display:block @else()display:none @endif">
          @include('shop.layout.charge')
        </div>
        <div class="js_register" style="@if($finance=='3') display:block @else()display:none @endif">
        @include('shop.layout.register')
        </div>
      </div>
      @endif
    </div>
    @include('home.footer')
@endsection
@section('script')
<script src='/js/shop_serveList.js'></script>
@endsection
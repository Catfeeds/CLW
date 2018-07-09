@extends('home.layouts.layout')
@section('title', '精选专题')
@section('header')
  <link rel="stylesheet" href="/css/home_topic.css">
@endsection
@section('body')
  @include('home.nav')
  <div class="container">
    <!-- 头部展示图  -->
    <div class="header">
    </div>
    <!-- 内容展示区 -->
    <div class="content">
      <!-- 内容简介区块 -->
      <div class="content_title clearfix">
        <div class="title f_l">
          <div class="name">中南路 || 武汉保利广场</div>
          <div class="describe">武汉保利文化广场，地处武昌区中南路与民主路交汇处，北临洪山广场，与洪山体育馆隔街相望。该写字楼总投资逾11亿元，是综合性商业广场，总建筑面积为13.1万平方米。建筑40层主楼与19层配楼空中连体，构成正对洪山广场的门户，打造出高43.8米、建筑面积1084平米的开放式公共空间。</div>
        </div>
        <img src="/home_img/topic_test.png" alt="" class="f_r">
      </div>
      <!-- 相关楼盘 -->
      <div class="other_build">
        <div class="title">相关楼盘</div>
        <div class="enjoyList">
            <a href="#">
              <div class="enjoyDetail">
                <div class="enjoyPic"><img src="https://upload.chulouwang.com/Fjsddr6EErO8kpu80drru6Y5Quq7" alt=""></div>
                <div class='enjoyInfor'>
                  <div class="enjoyTitle">光谷世界城</div>
                    <div class="enjoyIntro">
                      <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 武汉市洪山区</div>
                      <div class="enjoyPrice"><span>95</span> 元/m²月</div>
                  </div>
                </div>
              </div>
            </a>
            <a href="#">
              <div class="enjoyDetail">
                <div class="enjoyPic"><img src="https://upload.chulouwang.com/Fjsddr6EErO8kpu80drru6Y5Quq7" alt=""></div>
                <div class='enjoyInfor'>
                  <div class="enjoyTitle">光谷世界城</div>
                    <div class="enjoyIntro">
                      <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 武汉市洪山区</div>
                      <div class="enjoyPrice"><span>95</span> 元/m²月</div>
                  </div>
                </div>
              </div>
            </a>
            <a href="#">
              <div class="enjoyDetail">
                <div class="enjoyPic"><img src="https://upload.chulouwang.com/Fjsddr6EErO8kpu80drru6Y5Quq7" alt=""></div>
                <div class='enjoyInfor'>
                  <div class="enjoyTitle">光谷世界城</div>
                    <div class="enjoyIntro">
                      <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 武汉市洪山区</div>
                      <div class="enjoyPrice"><span>95</span> 元/m²月</div>
                  </div>
                </div>
              </div>
            </a>
            <a href="#">
              <div class="enjoyDetail">
                <div class="enjoyPic"><img src="https://upload.chulouwang.com/Fjsddr6EErO8kpu80drru6Y5Quq7" alt=""></div>
                <div class='enjoyInfor'>
                  <div class="enjoyTitle">光谷世界城</div>
                    <div class="enjoyIntro">
                      <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 武汉市洪山区</div>
                      <div class="enjoyPrice"><span>95</span> 元/m²月</div>
                  </div>
                </div>
              </div>
            </a>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection
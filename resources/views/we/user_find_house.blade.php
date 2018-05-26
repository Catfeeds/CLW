@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_user_find_house.css')}}">
@endsection
@section('body')
    <div class="mui-content">
      <!-- 称谓 -->
      <div class="first">
          <div class="input">
              <input id="appellation" type="text" placeholder="称谓">  
          </div>
          <!-- 电话 -->
          <div class="input">
              <input id="tel" type="tel" placeholder="电话">
          </div>
      </div>
      <div class="second">
        <textarea name="requirement" id="requirement" cols="30" rows="5" placeholder="您的需求,如:光谷现代世贸中心,300平米写字楼,精装修,租金120元/m²/月左右,附近有地铁。"></textarea>
      </div>
      <div class="loginOut">
          <button type="button">提交</button>
      </div>
    </div>
    <script src="{{res('/js/we_user_find_house.js')}}"></script>
@endsection
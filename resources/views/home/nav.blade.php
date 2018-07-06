<nav class="@if(empty($fixed)) active  @endif js_navChange">
  <div class="nav-content">
    <a href="{{url('/')}}" class="logo-box">
      <img class="fade" src="/home_img/nav_logo_white.png" alt="">
      <img class="active" src="/home_img/nav_logo.png" alt="">
    </a>
    <ul class="nav-list">
      <li class="nav-item">
        <a href="{{url('/')}}">首页</a>
      </li>
      <li class="nav-item">
        <a href="{{url('/building_list')}}">写字楼出租</a>
      </li>
      <li class="nav-item">
        <a href="javascript:void(0)">企业服务</a>
      </li>
      <li class="nav-item">
      <a href="{{url('/information')}}">资讯中心</a>
      </li>
      <li class="nav-item">
        <a href="javascript:void(0)">楚楼云管家</a>
      </li>
    </ul>
    <div class="login-box">
      <div class="tel-box">
          <img class="fade" src="/home_img/nav_tel_white.png" alt="">
          <img class="active" src="/home_img/nav_tel.png" alt="">
          <span>4000-580-888</span>
      </div>
      <div class="user-login-box">
      {{-- <a href="{{url('/registers')}}" class="register-a"><img class="active" src="/home_img/login_user.png" alt="" />注册</a>
        <div class="active-line"></div> --}}
      {{-- @if (empty(session('user'))) --}}
      <a href="javascript:;" class="login-a js_login"><img class="active" src="/home_img/login_user.png" alt="" />登录</a>
      </div>
    </div>
    <div class="clearfloat"></div>
  </div>
</nav>
<div id="login"></div>
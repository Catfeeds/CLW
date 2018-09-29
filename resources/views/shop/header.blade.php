<div class="header">
  <div class="navUp">
    <div class="navBox">
      <div class="nav_left">楚楼网，全方位企业服务平台</div>
      <div class="nav_right">
        <a href="https://www.chulouwang.com" target="_blank"><div>首页</div></a>|
        <a href="http://www.chulouwang.com/throw_ins" target="_blank"><div>投放房源</div></a>|
        <a href="http://www.chulouwang.com/bespeaks" target="_blank"><div>委托找房</div></a>
      </div>
    </div>
  </div>
  <div class="search">
    <div class="searchLogo">
      <a href="{{url('/')}}"><div class="logo"><img src="{{shopRes('/shop_img/logo.png')}}" alt=""></div></a>
      <ul class="select_nav">
        <a href="{{url('/')}}"><li class="@if(request()->getPathInfo() == '/') active @endif">首页</li></a>
        <a href="https://www.chulouwang.com/building_list" target="_blank"><li>企业选址</li></a>
        <a href="{{url('/furniture')}}"><li class="hot_sale @if(request()->getPathInfo() == '/furniture') active @endif">办公家具<div><img src="{{shopRes('/shop_img/hot.png')}}" alt=""></div></li></a>
        <a href="{{url('/plants')}}"><li class="hot_sale @if(request()->getPathInfo() == '/plants') active @endif">绿植租摆<div><img src="{{shopRes('/shop_img/hot.png')}}" alt=""></div></li></a>
        <a href="{{url('/companyDecorat/1')}}"><li class="@if(request()->getPathInfo() == '/companyDecorat/1') active @endif">企业装修</li></a>
        <a href="{{url('/computers')}}"><li class="@if(request()->getPathInfo() == '/computers') active @endif">办公设备</li></a>
      </ul>
    </div>
    <!-- <div class="searchInput">
      <div class="input">
        <div class="inputPic"><img src="/shop_img/index_search.png" alt=""></div>
        <input id="searchInput" type="text" placeholder="请输入搜索关键字">
      </div>
      <button class="js_search">搜索</button>
    </div> -->
    <div class="tel"><div><img src="{{shopRes('/shop_img/index_tel.png')}}" alt=""></div><div class="telNum">4000-580-888</div></div>
  </div>
  <!-- <div class="select">
    <div class="selectBox">
      <div class="select_all">
        <div><img src="/shop_img/index_classify.png" alt=""></div>
        <div>全部服务类型</div>
      </div>
      
    </div>
  </div> -->
</div>
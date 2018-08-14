<div class="content">
  <div class="navDetail">
    <a href="{{url('/')}}"><div class="index">首页</div></a>&nbsp; > &nbsp;
    @if(request()->getPathInfo() == '/luxuryCar')
    <div>豪车租赁</div>
    @elseif(request()->getPathInfo() == '/finance')
    <div>金融支持</div>
    @elseif(request()->getPathInfo() == '/plants/1')
    <a href="{{url('/plants')}}"><div class="index">绿植单品</div></a>&nbsp; > &nbsp;
    <div>金钱树</div>
    @elseif(request()->getPathInfo() == '/plants/2')
    <a href="{{url('/plants')}}"><div class="index">绿植单品</div></a>&nbsp; > &nbsp;
    <div>红掌</div>
    @elseif(request()->getPathInfo() == '/plants/3')
    <a href="{{url('/plants')}}"><div class="index">绿植单品</div></a>&nbsp; > &nbsp;
    <div>发财树</div>
    @elseif(request()->getPathInfo() == '/plants/4')
    <a href="{{url('/plants')}}"><div class="index">绿植单品</div></a>&nbsp; > &nbsp;
    <div>幸福树</div>
    @elseif(request()->getPathInfo() == '/plants/5')
    <a href="{{url('/plants')}}"><div class="index">绿植单品</div></a>&nbsp; > &nbsp;
    <div>也铁门</div>
    @elseif(request()->getPathInfo() == '/computers/1')
    <a href="{{url('/computers')}}"><div class="index">办公设备</div></a>&nbsp; > &nbsp;
    <div>一体机</div>
    @elseif(request()->getPathInfo() == '/computers/2')
    <a href="{{url('/computers')}}"><div class="index">办公设备</div></a>&nbsp; > &nbsp;
    <div>Thinkpad</div>
    @elseif(request()->getPathInfo() == '/furniture/1')
    <a href="{{url('/computers')}}"><div class="index">办公家具</div></a>&nbsp; > &nbsp;
    <div>班台</div>
    @elseif(request()->getPathInfo() == '/furniture/2')
    <a href="{{url('/computers')}}"><div class="index">办公家具</div></a>&nbsp; > &nbsp;
    <div>前台</div>
    @elseif(request()->getPathInfo() == '/furniture/3')
    <a href="{{url('/computers')}}"><div class="index">办公家具</div></a>&nbsp; > &nbsp;
    <div>会议桌</div>
    @elseif(request()->getPathInfo() == '/furniture/4')
    <a href="{{url('/computers')}}"><div class="index">办公家具</div></a>&nbsp; > &nbsp;
    <div>办公桌</div>
    @endif
  </div>
</div>
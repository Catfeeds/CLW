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
    @endif
  </div>
</div>
<!-- 头部面包屑导航 -->
<div class="graybox top_link">
      <a href="{{url('/')}}" class="home_page">首页</a>
      <span class="top_arrow">></span>
      <span class="current_page">{{$labelData['name']}}</span>
    </div>
    <!-- 筛选区域 -->
    <div class="select_area">
    @foreach($labelData['children'] as $labels)
      <!-- 类型筛选 -->
      @if($labels['show'] === 1)
          <div class="select_option serve_select clearfix">
            <div class="select_title f_l">{{$labels['name']}}</div>
            <ul class="select_details clearfix f_l">
              @foreach($labels['children'] as $label)
                <li class="f_l select_detail"><a class=" @if($label['status'])current @endif " href="{{$label['url']}}">{{$label['name']}}</a></li>
              @endforeach
            </ul>
          </div>
      @else
          <div class="select_option brand_select clearfix" style="height:auto">
              <div class="select_title f_l" style="margin-top: 14px;">{{$labels['name']}}</div>
              <ul class="brands f_l">
                  @foreach($labels['children'] as $label)
                  @if($loop->first)
                  <li class="f_l" style="margin-right:34px;"><a class=" @if($label['status'])current @endif " href="{{$label['url']}}" style="font-size:12px;">{{$label['name']}}</a></li>
                  @else
                      <li class="brand @if($label['status'])active @endif"><a href="{{$label['url']}}"><img style="width: 100%; height: 100%;" src="{{$label['img']}}" alt="{{$label['name']}}"></a></li>
                  @endif
                  @endforeach
              </ul>
          </div>
      @endif
    @endforeach
    </div>
    <!-- 排序方式 -->
    <div class="graybox sort clearfix">
      <div class="@if(empty($request['price'])) sort_current @endif sort_details f_l default_sort">
        <a href="{{$sort}}">默认排序</a>
      </div>
      <div class="@if(!empty($request['price'])) sort_current @endif sort_details f_l price_sort">
        <a href="{{$sort.$symbol.$price}}">
        @if(empty($request['price']))价格由高到低 
        @elseif($request['price']=='desc')价格由高到低
        @else 价格由低到高
        @endif
        </a>
      </div>
    </div>
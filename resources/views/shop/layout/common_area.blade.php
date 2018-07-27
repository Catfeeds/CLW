<!-- 头部面包屑导航 -->
<div class="graybox top_link">
      <a href="{{url()->current()}}" class="home_page">首页</a>
      <span class="top_arrow">></span>
      <span class="current_page">{{$labelData['name']}}</span>
    </div>
    <!-- 筛选区域 -->
    <div class="select_area">
    @foreach($labelData['children'] as $labels)
      <!-- 类型筛选 -->
      <div class="select_option serve_select clearfix">
        <div class="select_title f_l">{{$labels['name']}}:</div>
        <ul class="select_details clearfix f_l">
          @foreach($labels['children'] as $label)
            <li class="f_l select_detail"><a class=" @if($label['status'])current @endif " href="{{$label['url']}}">{{$label['name']}}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="select_option brand_select clearfix">
        <div class="select_title f_l">商品品牌:</div>
        <ul class="brands f_l">
          @foreach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19] as $a)
            <li class="brand"><a href="javascript:void(0)"></a></li>
          @endforeach
        </ul>
      </div>
    @endforeach
    </div>
    <!-- 排序方式 -->
    <div class="graybox sort clearfix">
      <div class="sort_details f_l default_sort sort_current">
        <a href="{{$sort}}">默认排序</a>
      </div>
      <div class="sort_details f_l price_sort">
        <a href="{{$sort.$symbol}}price=desc">价格由高到低</a>
      </div>
      <div class="sort_details f_l sell_sort">
        <a href="{{$sort.$symbol}}price=asc">销量由底到高</a>
      </div>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="/css/home_pagination.css">
  <link rel="stylesheet" href="/css/home_house_list.css">
</head>
<body>
  <div class="house_list_container">
    <div class="house_list_title">
      <div class="title_content clearfix">
        <div class="link f_l">
          <a href="javscript:void(0)" class="homepage">首页 </a>＞
          <a href="javscript:void(0)">写字楼出租</a>
        </div>
        <div class="serch_area f_r ">
          <input type="text" class="serch_inp" placeholder="搜索关键词">
          <button class="serch_btn"></button>
          <button class="serch_map"></button>
        </div>
      </div>
    </div>
    <div class="house_list_content">
      <div class="select_area">
        <div class="area">
          <ul class="list clearfix js_area">
            <li class="item">区域</li>
            <li class="item"><a href="javscript:void(0)" class="all js_addCurrent current">全部</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">洪山</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">江汉</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">江夏</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">江岸</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">汉阳</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">东西湖</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">沌口</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">硚口</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">青山</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">蔡甸</a></li>
          </ul>
          <ul class="area_detail clearfix js_hongshanList">
            <li><a href="javascript:void(0); current all">全部</a></li>
            <li><a href="javascript:void(0);">光谷</a></li>
            <li><a href="javascript:void(0);">街道口</a></li>
            <li><a href="javascript:void(0);">广埠屯</a></li>
            <li><a href="javascript:void(0);">卓刀泉</a></li>
            <li><a href="javascript:void(0);">虎泉</a></li>
            <li><a href="javascript:void(0);">鲁磨路</a></li>
            <li><a href="javascript:void(0);">关山</a></li>
            <li><a href="javascript:void(0);">南湖</a></li>
            <li><a href="javascript:void(0);">光谷东</a></li>
          </ul>
        </div>
        <div class="subway">
          <ul class="list clearfix">
            <li class="item">地铁</li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">1号线</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">2号线</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">3号线</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">4号线</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">5号线</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">6号线</a></li>
          </ul>
        </div>
        <div class="type">
          <ul class="list clearfix">
            <li class="item">类型</li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">普通办公</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">创意花园</a></li>
          </ul>
        </div>
        <div class="acverge">
          <ul class="list clearfix">
            <li class="item">面积</li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">0-100m²</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">100-300m²</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">300-500m²</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">500-1000m²</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">1000m²以上</a></li>
          </ul>
        </div>
        <div class="price">
          <ul class="list clearfix">
            <li class="item">价格</li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">40-60元/m²·月</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">60-80元/m²·月</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">80-120元/m²·月</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">120-140元/m²·月</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">140元/m²·月以上</a></li>
          </ul>
        </div>
        <div class="decoration">
          <ul class="list clearfix">
            <li class="item">装修</li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">豪华装修</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">精装修</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">中装修</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">简装修</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">毛坯</a></li>
          </ul>
        </div>
        <div class="special">
          <ul class="list clearfix">
            <li class="item">特色</li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">核心商圈</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">创意园区</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">地标建筑</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">知名物业</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">地铁10分钟</a></li>
            <li class="item"><a href="javscript:void(0)" class="js_addCurrent">新风系统</a></li>
          </ul>
        </div>
        <div class="result js_result clearfix" style="display:none">
          <div class="title f_l">已选</div>
          <div class="selected_box f_l clearfix"></div>
          <div class="order_selected f_l"><a href="javascript:void(0)" class="js_order_selected">订阅该筛选条件</a></div>
          <div class="cleaning f_l"><a href="javascript:void(0)" class="js_cleaning">清空</a></div>
        </div>
      </div>
      <div class="house_list">
        <div class="house_show">
          <div class="house_show_title">
            <div class="house_num">
              出租写字楼共<span>127</span>套
            </div>
            <div class="title_right">
              <div class="sort_default"><a href="javascript:void(0);">默认</a></div>
              <div class="sort_price"><a href="javascript:void(0);" class="js_order_price order_price js_set">价格排序<span class="up js_up">▲</span><span class="down js_down">▼</span></a></div>
            </div>
          </div>
          
          <div class="js_content"></div>
          <div class="pagination">
            <ul id="page" class="page clearfix"></ul>
          </div>
        </div>
        <div class="rent_house">
          <div class="title">
            <div>免费委托找房</div>
            <div>一键委托,一分钟回复</div>
          </div>
          <div class="phone">
            <input type="text" placeholder="请输入手机号">
            <div><a href="javascript:void(0);">立即委托</a></div>
          </div>
        </div>
      </div> 
    </div>
  </div>
  <script src="/js/home_manifest.js"></script>
  <script src="/js/home_vendor.js"></script>
  <script src="/js/home_house_list.js"></script>
</body>
</html>
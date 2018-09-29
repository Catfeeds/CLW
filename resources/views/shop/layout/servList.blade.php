<div class="list_container">
  <div class="graybox top_link">
    <a href="{{url('/')}}" class="home_page">首页</a>
    <span class="top_arrow">></span>
    <span class="current_page current_title">{{$titleName}}</span>
  </div> 
  <div class="select_area">
    @if($titleName == '入驻服务')
    <div class="select_option serve_select clearfix">
      <div class="select_title f_l">全部分类</div>
      <ul class="select_details clearfix f_l">
        <li class="f_l select_detail"><a class="@if($serveid=='1')current @endif" href="{{url('/cleanup/1')}}">日常保洁</a></li>
        <li class="f_l select_detail"><a href="{{url('/cleanup/2')}}" class="@if($serveid=='2')current @endif">开荒保洁</a></li>
        <li class="f_l select_detail"><a href="{{url('/cleanup/3')}}" class="@if($serveid=='3')current @endif">搬家服务</a></li>
        <li class="f_l select_detail"><a href="{{url('/cleanup/4')}}" class="@if($serveid=='4')current @endif">室内环保</a></li>
        <li class="f_l select_detail"><a href="{{url('/cleanup/5')}}" class="@if($serveid=='5')current @endif">桶装水</a></li>
      </ul>
    </div>
    @endif
    @if($titleName == '企业装修')
    <div class="select_option serve_select clearfix">
    <div class="select_title f_l">全部分类</div>
      <ul class="select_details clearfix f_l">
        <li class="f_l select_detail"><a class="@if($id=='1') current @endif" href="{{url('/companyDecorat/1')}}">室内装修</a></li>
        <li class="f_l select_detail"><a href="{{url('/companyDecorat/2')}}" class="@if($id=='2') current @endif">综合布线</a></li>
      </ul>
    </div>
    @endif
    @if($titleName == '工商财税')
    <div class="select_option serve_select clearfix">
      <div class="select_title f_l">代理记账：</div>
      <ul class="select_details clearfix f_l">
        <li class="f_l select_detail"><a  href="{{url('/business_taxes/1')}}" class="@if($finance=='1') current @endif">小规模记账</a></li>
        <li class="f_l select_detail"><a href="{{url('/business_taxes/2')}}" class="@if($finance=='2') current @endif">一般纳税人代理记账</a></li>
      </ul>
    </div>
    <div class="select_option serve_select clearfix">
      <div class="select_title f_l">税务代办：</div>
      <ul class="select_details clearfix f_l">
        <li class="f_l select_detail"><a  href="{{url('/business_taxes/4')}}" class="@if($finance=='4') current @endif">税收筹划</a></li>
      </ul>
    </div>
    <div class="select_option serve_select clearfix">
      <div class="select_title f_l">工商代办：</div>
      <ul class="select_details clearfix f_l">
        <li class="f_l select_detail"><a href="{{url('/business_taxes/3')}}" class="@if($finance=='3') current @endif">有限责任公司注册</a></li>
        <!-- <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($finance=='4') current @endif" href="javascript:void(0)">外商独资公司注册</a></li> -->
        <!-- <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($finance=='5') current @endif" href="javascript:void(0)">合伙企业注册</a></li>
        <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($finance=='6') current @endif" href="javascript:void(0)">个人独资企业注册</a></li>
        <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($finance=='7') current @endif" href="javascript:void(0)">公司注册地址</a></li>
        <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($finance=='8') current @endif" href="javascript:void(0)">分公司注册</a></li>
        <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($finance=='9') current @endif" href="javascript:void(0)">一般人注册地址</a></li> -->
      </ul>
    </div>
    @endif
    @if($titleName == '图文广告')
    <div class="select_option serve_select clearfix">
      <div class="select_title f_l">全部分类</div>
      <ul class="select_details clearfix f_l">
        <li class="f_l select_detail"><a class="@if($adsId=='1') current @endif" href="javascript:void(0)">图文快印</a></li>
        <!-- <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($adsId=='2') current @endif">商务印品</a></li>
        <li class="f_l select_detail"><a href="javascript:void(0)" class="@if($adsId=='2') current @endif">企业广告</a></li> -->
      </ul>
    </div>
    @endif
  </div>
</div>
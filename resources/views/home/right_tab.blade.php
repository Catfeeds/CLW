<div id="rightTab" class="@if(empty($fixed)) active  @endif right_tab js_rightTab">
  <div class="tab-content">
    <div class="customer-service" v-popover:customer>
      <img src="{{homeRes('/home_img/nav_tel_white.png')}}" alt="">
      <div class="text-box">客服</div>
      <div class="text-box">热线</div>
    </div>
    <el-tooltip effect="dark" content="免费委托 专业服务" placement="left">
      <a class="lookForHouse-box" href="{{url('/bespeaks').'?sourcePage='.sourcePage(Request::segment(1))}}" target="_blank">
        <div class="text-box">委托</div>
        <div class="text-box">找房</div>
      </a>
    </el-tooltip>
    <div class="launchHose-box">
      <el-tooltip effect="dark" content="免费投放 专业服务" placement="left">
        <a href="{{url('/throw_ins').'?sourcePage='.sourcePage(Request::segment(1))}}" target="_blank">
          <img src="{{homeRes('/home_img/right_launch.png')}}" alt="投放房源">
        </a>
      </el-tooltip>
    </div>
    <div class="dimentional-box">
      <el-tooltip effect="dark" content="在线客服" placement="left">
        <a href="javascript:void(0)">
          <img src="{{homeRes('/home_img/right_Advisory.png')}}" alt="联系客服" class="js_clickCustomerService">
        </a>
      </el-tooltip>
    </div>
    <div class="dimentional-box">
      <a href="javascript:void(0)" v-popover:dimentional>
        <img src="{{homeRes('/home_img/right_dimentionalCode.png')}}" alt="扫码关注">
      </a>
    </div>
  </div>
  <el-tooltip effect="dark" content="点击放回顶部" placement="left">
  <div class="bank-top js_bankTop">
    <div class="text-box">
        TOP
    </div>
  </div>
  </el-tooltip>
  <div id="popoper" style="display:none">
      <el-popover
      ref="customer"
      placement="left-start"
      width="184"
      trigger="hover" popper-class="customer-popover">
        <div class="text-box">免费客服：</div>
        <h3 class="title-box">4000-580-888</h3>
        <div class="brife-box">周一至周日 8:00-20:00</div>
      </el-popover>
      <el-popover
    ref="dimentional"
    placement="left"
    popper-class="dimentionalCode-popover"
    trigger="hover">
    <div style="text-align:center;position:relative;top:5px;">
    <img src="{{homeRes('/home_img/right_wechat_code.png')}}" alt="楚楼网微信公众号">
    </div>
    <div style="text-align:center;position:relative;top:0px;font-size:12px">楚楼网微信公众号</div>
    </el-popover>
  </div>
  <img src="{{homeRes('/home_img/right_onlineAdvisory.png')}}" alt="在线咨询" class="js_clickCustomerService onlineAdvisory">
</div>
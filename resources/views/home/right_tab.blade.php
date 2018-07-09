<div id="rightTab" class="@if(empty($fixed)) active  @endif right_tab js_rightTab">
  <div class="tab-content">
    <div class="customer-service" v-popover:customer>
      <img src="/home_img/nav_tel_white.png" alt="">
      <div class="text-box">客服</div>
      <div class="text-box">热线</div>
    </div>
    <el-tooltip effect="dark" content="免费委托 专业服务" placement="left">
      <a class="lookForHouse-box" href="{{url('/sellhouse')}}" target="_blank">
        <div class="text-box">委托</div>
        <div class="text-box">找房</div>
      </a>
    </el-tooltip>
    <div class="launchHose-box">
      <el-tooltip effect="dark" content="免费投放 专业服务" placement="left">
        <a href="{{url('/launchouse')}}" target="_blank">
          <img src="/home_img/right_launch.png" alt="投放房源">
        </a>
      </el-tooltip>
    </div>
    <div class="dimentional-box">
      <a href="javascript:void(0)" v-popover:dimentional>
        <img src="/home_img/right_dimentionalCode.png" alt="扫码关注">
      </a>
    </div>
  </div>
  <el-popover
  ref="customer"
  placement="left-start"
  width="184"
  trigger="hover" popper-class="customer-popover">
    <div class="text-box">免费客服：</div>
    <h3 class="title-box">400-580-888</h3>
    <div class="brife-box">周一至周日 8:00-20:00</div>
  </el-popover>
  <el-popover
ref="dimentional"
placement="left"
trigger="hover">
<div style="text-align:center">
    <img src="/home_img/footer_code.png" alt="楚楼网微信公众号">
</div>
</el-popover>
</div>
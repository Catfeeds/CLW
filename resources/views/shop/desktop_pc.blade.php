@extends('shop.layout.layout')
@section('title', '电脑租赁详情')
@section('header')
    <link rel="stylesheet" href="{{shopRes('/css/shop_desktop_pc.css')}}">
@endsection
@section('body')
  @include('shop.header')
  @include('shop.layout.nav')
  <div class="rent_conputer_container">
    <div id="appointment">
      <appoint></appoint>
    </div>
    <div class="banner" style="background: url('{{shopRes('/shop_img/desktop_pc_banner.jpg')}}') no-repeat center;"></div>
    <!-- 电脑性能 -->
    <div class="computer_propetry">
      <div class="title">性能卓越 价值非凡</div>
      <div class="title2" style="margin-bottom:86px">
        DELL国际认证大品牌。企业用机的首选，秉承DELL OPTIPLEX系列商用主机特点：坚如磐石，稳固耐用静音运行。<br>
        品牌原装拆机配件让主机运行更稳定；扩展丰富，满足全商务应用；大机箱高效散热，双风扇导热良好。
      </div>
      <div class="propetry">
        <div class="propetry_img">
          <img src="{{shopRes('/shop_img/desktop_pc_pic.jpg')}}" alt="">
        </div>
        <div class="propetry_des">
          <div class="des">
            <div class="des_name">便捷</div>
            <div class="des_info">
              企业级的控制与支持，<br>
              让您使用无忧
            </div>
          </div>
          <div class="des">
            <div class="des_name">轻松</div>
            <div class="des_info">
            上网冲浪，游戏办公一<br>
            步到位
            </div>
          </div>
          <div class="des">
            <div class="des_name">流畅</div>
            <div class="des_info">
            戴尔国际知名品牌，全<br>
            球300强的质量保证
            </div>
          </div>
          <div class="des">
            <div class="des_name">稳定</div>
            <div class="des_info">
            原装品牌硬件，拒绝打磨，<br>
            翻新
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- 台式机介绍 -->
    <div class="desktop_pc_des" style="background:url('{{shopRes('/shop_img/desktop_pc_des_back.jpg')}}')">
      <div class="title"><span>稳定高效 </span>商用典范</div>
      <div class="desktop_pc_des_img">
        <img src="{{shopRes('/shop_img/desktop_pc_des.png')}}" alt="">
      </div>
      <div class="desktop_pc_des_box" style="margin-top:-20px">
        <div class="desktop_pc_des_item">
          <img src="{{shopRes('/shop_img/desktop_pc_des_item1.png')}}" alt="">
          <div class="item_title">为数据保驾护航</div>
          <div class="item_title2">
          大容量硬盘，充足储存空间，<br>
          0.5秒内极速脱离，<br>
          更有效保护硬盘及数据
          </div>
        </div>
        <div class="desktop_pc_des_item">
          <img src="{{shopRes('/shop_img/desktop_pc_des_item2.png')}}" alt="">
          <div class="item_title">多接口 便链接</div>
          <div class="item_title2">
          10个USB接口，DP高清视频输出，针式<br>
          0.打印接口，双独立图形卡插槽两个<br>
          PCIe×16，扩展丰富满足应用
          </div>
        </div>
        <div class="desktop_pc_des_item">
          <img src="{{shopRes('/shop_img/desktop_pc_des_item3.png')}}" alt="">
          <div class="item_title">大机箱 易散热</div>
          <div class="item_title2">
          大机箱高效散热，双风扇导热良好，<br>
          0.以保证主机稳定运行
          </div>
        </div>
        <div class="desktop_pc_des_item">
          <img src="{{shopRes('/shop_img/desktop_pc_des_item4.png')}}" alt="">
          <div class="item_title">Windows7操作系统</div>
          <div class="item_title2">
          用更具人性化的Windows7 <br>
          操作系统，开机启动时间短，<br>
          用户界面简洁，实现了应用的<br>
          完美兼容
          </div>
        </div>
      </div>
    </div>
    <!-- 应用场景 -->
    <div class="scene">
      <div class="title" style="font-weight:300">提高工作<span style="font-size:40px;color:#333;font-weight:500">效率</span></div>
      <div class="title2">搭载酷睿第七代处理器，出色的性能表现和提升让数据处理更快，程序秒开，文件载入更快</div>
      <div class="scene_img">
        <img src="{{shopRes('/shop_img/desktop_pc_show1.jpg')}}" alt="">
        <img src="{{shopRes('/shop_img/desktop_pc_show2.jpg')}}" alt="">
        <img src="{{shopRes('/shop_img/desktop_pc_show3.jpg')}}" alt="">
      </div>
      <div class="desktop_pc_api">
        <div class="desktop_pc_api_title">详细<span>接口</span>介绍</div>
        <img src="{{shopRes('/shop_img/desktop_pc_api.jpg')}}" alt="">
      </div>
    </div>
    <!-- 电脑细节 -->
    
    <!-- 电脑集成计划 -->
    <div class="plants" style="background: url('{{shopRes('/shop_img/computer_plant.jpg')}}') no-repeat center;">
      <div class="title">内置无线、<span style="font-size:40px;color:#f6f6f6;font-weight:300">告别束缚</span></div>
      <div class="title2">你想要的，就是我们要做的。主机内置集成WIFI和蓝牙技术，稳定便捷，摆脱网线束缚</div>
      <div class="plant">
        <div class="wifi plant_info" style="margin-right:127px">
          <img src="{{shopRes('/shop_img/computer_wifi.png')}}" alt="">
          <div class="name">内置WIFI  无线上网</div>
        </div>
        <div class="sound plant_info">
          <img src="{{shopRes('/shop_img/computer_blue.png')}}" alt="">
          <div class="name" style="margin-top:34px">即插即用 免驱动安装 </div>
        </div>
      </div>
    </div>
    <!-- 服务保障 -->
    <div class="our_tellent">
      <div class="tellent_title">
        <div class="tellent_title">
          服务保障
        </div>
      </div>
      <div class="tellent_contents">
        <div class="content clearfix">
          <div class="img f_l">
            <img src="{{shopRes('/shop_img/computer_serve1.jpg')}}" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Free Delivery</div>
            <div class="chz">免费送货</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            顺丰快运将客户所订机器<br />
            快递上门
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="{{shopRes('/shop_img/computer_serve2.jpg')}}" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Full warranty</div>
            <div class="chz">全程保修</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            正常使用情况下出现故障，<br />
            免费提供维修服务
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="{{shopRes('/shop_img/computer_serve3.jpg')}}" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Follow the rent</div>
            <div class="chz">随租随还</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            租赁过程中，电脑设备的型号和<br />
            数量均可灵活进行调整
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="{{shopRes('/shop_img/computer_serve4.jpg')}}" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Deposit free lease</div>
            <div class="chz">免押金租赁</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            凡符合授信额度范围内的企业，<br />
            无需支付押金
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
    <img src="{{shopRes('/shop_img/index_better.jpg')}}" alt="">
  </div>
  @include('shop.footer')
@endsection
@section('script')
  <script src="{{shopRes('/js/shop_slideBar.js')}}"></script>
@endsection
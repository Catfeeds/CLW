@extends('shop.layout.layout')
<!-- @section('title', '工商财税') -->
@section('header')
    <link rel="stylesheet" href="{{shopRes('/css/shop_tex_plant.css')}}">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.servList')
    <div class="tex_plant">
    <!-- banner -->
      <div class="tex_plant_banner" style="background: url('/shop_img/tex_plant_banner.jpg') no-repeat center"></div>
    <!-- 税收计划 -->
      <div class="tex_plant_info" style="background: url('{{shopRes('/shop_img/company_back.jpg')}}') no-repeat center;">
        <div class="text_plant_info_title">税收筹划</div>
        <div class="blue_border" style="margin: -2px auto 95px"></div>
        <div class="tex_plant_info_des_box">
          <div class="tex_plant_info_des" style="margin-right: 74px">
            <div class="tex_plant_info_des_title">
              税收筹划是什么?
            </div>
            <div class="tex_plant_info_des_content">
              "税收筹划"又称"合理避税"。即在法律规 
              定许可的范围内，通过对经营、投资、理
              财活动的事先筹划和安排，尽可能取得节
              税的经济利益。
            </div>
          </div>
          <div class="tex_plant_info_des">
            <div class="tex_plant_info_des_title">
              为什么需要税收筹划？
            </div>
            <div class="tex_plant_info_des_content">
              筹划是为避税，但不是为了不缴和少缴税
              而是为了避免多缴早缴税，为企业合法合规
              节税。
            </div>
          </div>
        </div>
      </div>
      <!-- 办理步骤 -->
      <div class="tex_plant_step" style="background: url('{{shopRes('/shop_img/steps_back.jpg')}}') no-repeat center">
        <div class="tex_plant_step_title">5步快速办理&nbsp;<span>全程代办</span></div>
        <div class="tex_plant_step_des">创业楚楼网代办，省下时间办正事</div>
        <div class="tex_plantstep_img">
          <img src="{{shopRes('/shop_img/tex_plant_step.png')}}" alt="">
        </div>
      </div>
      <!-- 包含税种 -->
      <div class="tex_plant_type">
        <div class="tex_plant_type_title">
          税收筹划都包含<span>哪些税种</span>
        </div>
        <div class="gray_border"></div>
        <div class="blue_border" style="margin-top: -2px; margin-bottom: 70px"></div>
        <div class="tex_plant_type_img" style="text-align: center">
          <img src="{{shopRes('/shop_img/tex_plant_type.png')}}" alt="">
        </div>
      </div>
      <!-- 服务种类 -->
      <div class="tex_plant_server" style="background: url('{{shopRes('/shop_img/tex_plant_server.jpg')}}') no-repeat center;">
        <div class="tex_plant_server_title">
          税收筹划<span>服务内容包含</span>
        </div>
        <div class="white_border" style="margin-bottom: 80px"></div>
        <div class="tex_plant_server_box">
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>01</span></div>
            <div class="tex_plant_server_des f_l">税收筹划服务</div>
          </div>
          <div class="tex_plant_server_item clearfix">
            <div class="tex_plant_server_num f_l"><span>02</span></div>
            <div class="tex_plant_server_des f_l">政策奖励筹划</div>
          </div>
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>03</span></div>
            <div class="tex_plant_server_des f_l">工商服务</div>
          </div>
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>04</span></div>
            <div class="tex_plant_server_des f_l">政府奖励备案</div>
          </div>
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>05</span></div>
            <div class="tex_plant_server_des f_l">托管类服务</div>
          </div>
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>06</span></div>
            <div class="tex_plant_server_des f_l" style="margin-top: 0">政府奖励<br>退税办理</div>
          </div>
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>07</span></div>
            <div class="tex_plant_server_des f_l" style="margin-top: 0">政府奖励<br>退税办理</div>
          </div>
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>08</span></div>
            <div class="tex_plant_server_des f_l" style="margin-top: 0">个人所得税<br>返还办理</div>
          </div>
          <div class="tex_plant_server_item">
            <div class="tex_plant_server_num f_l"><span>09</span></div>
            <div class="tex_plant_server_des f_l">人员转出</div>
          </div>
        </div>
      </div>
    </div>
    <div id="appointment">
      <appoint></appoint>
    </div>
    @include('shop.layout.list_common')
    <div class="footer_banner" style="text-align:center">
      <img src="{{shopRes('/shop_img/index_better.jpg')}}" alt="">
    </div>
    @include('shop.footer')
@endsection
@section('script')
  <script src="{{shopRes('/js/shop_tex_plant.js')}}"></script>
@endsection
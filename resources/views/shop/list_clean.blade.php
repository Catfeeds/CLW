@extends('shop.layout.layout')
@section('header')
    <link rel="stylesheet" href="{{shopRes('/css/shop_list_clean_common.css')}}">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.servList')
    <div class="container">
  <!-- banner部分 -->
  <div class="clean_banner" style="background: url('{{shopRes('/shop_img/clean_banner.jpg')}}') no-repeat center;">
    <div class="banner_title">开荒保洁</div>
    <div class="banner_describe">为您扫除一切障碍 “助”您开业大吉</div>
  </div>
  <!-- 日常清洁优势 -->
  <div class="advantage" style="background: url('{{shopRes('/shop_img/clean_advantage.jpg')}}') no-repeat center;"></div>
  <!-- 岗前培训 -->
  <div class="clean_train">
    <div class="train_title">岗前培训</div>
    <div class="border"></div>
    <div class="train_describe">理论+实操+礼仪+不定期培训 提升阿姨服务水平</div>
    <div class="train_box">
      <div class="train_detail"><img src="{{shopRes('/shop_img/clean_train1.jpg')}}" alt=""></div>
      <div class="train_detail"><img src="{{shopRes('/shop_img/clean_train2.jpg')}}" alt=""></div>
    </div>
  </div>
  <!-- 专业清洁工具 -->
  <div class="profession" style="background: url('{{shopRes('/shop_img/profession_back.jpg')}}') no-repeat center;">
    <div class="title_back">PROFESSIONAL CLEANING TOOLS</div>
    <div class="profession_title">专业清洁工具</div>
    <div class="profession_describe">“工欲善其事必先利其器”我们不断研究改进，分析细菌的滋生习惯和污渍的抵抗能力，然后找到有效消灭他们的武器，我们选用环保无污染的清洁用品，为您营造更健康的办公环境。</div>
  </div>
  <!-- 设备及工具 -->
  <div class="clean_tool clearfix">
    <div class="clean_title f_l">
      <div class="tool_title">设备及工具:</div>
      <ol class="tools">
        <li>①吸尘器:为吸灰尘、污物之用,有吸地面灰尘、清洁家具污物等不同类型吸尘器</li>
        <li>②吸水机:用于地面磨光作用,对于吸取地毯水分、加快干燥也十分有效</li>
        <li>③地毯清洁剂:主要用于协助清洗地毯</li>
        <li>④抛光机:用于地面磨光作用,对于面积大的楼宇,尤为必要</li>
        <li>⑤常用工具:安全梯、刷子、扫把、拖把布、海绵、喷壶、胶手套、刀片、长柄手刷、手推车及工作标牌等</li>
      </ol>
    </div>
    <div class="img_box f_r">
      <img src="{{shopRes('/shop_img/clean_tool.png')}}" alt=""> 
    </div> 
  </div>
  <!-- 服务项目 -->
  <div class="clean_serve" style="background: url('{{shopRes('/shop_img/ressetClean_serve.jpg')}}') no-repeat center;"></div>
  <!-- 服务承诺 -->
  <div class="our_tellent">
    <div class="title">
      服务承诺
    </div>
    <div class="border_clean"></div>
    <div class="describe">专业+优质服务+保质保量 有效保障您的利益 </div>
    <div class="tellent_contents">
      <div class="content clearfix">
        <div class="img f_l">
          <img src="{{shopRes('/shop_img/clean_telent1.jpg')}}" alt="">
        </div>
        <div class="right_box f_l">
          <div class="eng">Professional training</div>
          <div class="chz">专业培训上岗</div>
          <div class="red"></div>
          <div class="black"></div>
          <div class="tellent_describe">
            我们的服务人员均经过标准<br />
            培训，证件齐全、着装统一
          </div>
        </div>
      </div>
      <div class="content clearfix">
        <div class="img f_l">
          <img src="{{shopRes('/shop_img/clean_telent2.jpg')}}" alt="">
        </div>
        <div class="right_box f_l">
          <div class="eng">Indemnity for damaged goods</div>
          <div class="chz">损害物品赔偿</div>
          <div class="red"></div>
          <div class="black"></div>
          <div class="tellent_describe">
            保护您的公司财产免受损失,<br />
            提供最优质服务
          </div>
        </div>
      </div>
      <div class="content clearfix">
        <div class="img f_l">
          <img src="{{shopRes('/shop_img/clean_telent3.jpg')}}" alt="">
        </div>
        <div class="right_box f_l">
          <div class="eng">Refusing the waste of resources</div>
          <div class="chz">拒绝资源浪费</div>
          <div class="red"></div>
          <div class="black"></div>
          <div class="tellent_describe">
            杜绝“磨洋工”现象，保质保量<br />
            完成任务
          </div>
        </div>
      </div>
      <div class="content clearfix">
        <div class="img f_l">
          <img src="{{shopRes('/shop_img/clean_telent4.jpg')}}" alt="">
        </div>
        <div class="right_box f_l">
          <div class="eng">Signing a guarantee contract</div>
          <div class="chz">签署保障合同</div>
          <div class="red"></div>
          <div class="black"></div>
          <div class="tellent_describe">
            针对服务内容，签署相应合同,<br />
            有效保障您的利益
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
      <img src="{{shopRes('/shop_img/index_better.jpg')}}" alt="">
    </div>
    <div id="appointment">
      <appoint></appoint>
    </div>
    @include('shop.footer')
@endsection
@section('script')
  <script src="{{shopRes('/js/shop_tex_plant.js')}}"></script>
@endsection
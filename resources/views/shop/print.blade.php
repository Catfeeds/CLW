@extends('shop.layout.layout')
@section('header')
    <link rel="stylesheet" href="{{shopRes('/css/shop_print.css')}}">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.servList')
    <div class="print_container">
  <div class="banner" style="background: url('{{shopRes('/shop_img/print_banner.jpg')}}') no-repeat center;"></div>
  <div class="print_trub" style="background: url('{{shopRes('/shop_img/print_trouble_back.jpg')}}') no-repeat center;">
    <div class="title">常规打印的<span>苦恼</span></div>
    <div class="troubles">
      <div class="trouble">
        <img src="{{shopRes('/shop_img/print_trounle2.jpg')}}" alt="">
        <div class="trouble_info">
          <div class="trouble_name">昂贵的打印费</div>
          <div class="trouble_des">
            每次打印你都忍受着昂贵的打印费普通小作坊，<br>
            1块钱1张，还不能包括色彩打印，小型机器，<br>
            打印慢，质量也不敢保证
          </div>
        </div>
      </div>
      <div class="trouble">
        <img src="{{shopRes('/shop_img/print_trounle1.jpg')}}" alt="">
        <div class="trouble_info">
          <div class="trouble_name">字迹模糊，深浅不均</div>
          <div class="trouble_des">
            我们拒绝不负责任的接单，只做高品质打印<br>
            和赏心悦目的文字流水线制作，专人专事<br>
            以相同的价格比速度，比质量
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="choose_us">
    <div class="title">
      <div class="cn_title">选择我们 <span>你们可以</span></div>
      <div class="eng_title">CHOOSE US YOU CAN</div>
      <div class="title_des">选择多种打印材质及装订工艺，自由选择皮纹纸封面颜色</div>
    </div>
    <div class="choose_details">
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose1.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name ">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">普通打印装订</div>
          </div>
          <div class="info_des">重型订书机，结实不散页，最厚能订300页</div>
        </div>
      </div>
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose2.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name ">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">皮纹纸封面胶装</div>
          </div>
          <div class="info_des">封面无线胶装，更加结实有效保护，封面颜色任选</div>
        </div>
      </div>
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose3.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name ">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">骑马订装订</div>
          </div>
          <div class="info_des">能平翻阅读方便美观</div>
        </div>
      </div>
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose4.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name ">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">书籍压痕</div>
          </div>
          <div class="info_des">书籍压痕，美观易翻阅</div>
        </div>
      </div>
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose5.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name ">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">铜版纸胶装</div>
          </div>
          <div class="info_des">铜版纸彩色精美封面</div>
        </div>
      </div>
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose6.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name ">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">硫酸纸隔页</div>
          </div>
          <div class="info_des">品质视觉效果佳</div>
        </div>
      </div>
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose7.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">办公室夹条</div>
          </div>
          <div class="info_des">美观易翻阅</div>
        </div>
      </div>
      <div class="detail">
        <img src="{{shopRes('/shop_img/print_choose8.jpg')}}" alt="">
        <div class="detail_info">
          <div class="info_name">
            <img src="{{shopRes('/shop_img/checked.png')}}" alt="">
            <div class="name">圈装</div>
          </div>
          <div class="info_des">能平展翻阅手感好</div>
        </div>
      </div>
    </div>
  </div>
  <div class="you_choose" style="background: url('{{shopRes('/shop_img/you_choose_back.jpg')}}') no-repeat center;">
    <div class="title">可<span>自由选择</span>皮纹纸封面的颜色</div>
    <div class="title2">赠送书面打印</div>
    <div class="colors">
      <div class="color_sel">
        <div class="color" style="background-color:#fff"></div>
        <div class="color_name">1 #白色</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#272c30"></div>
        <div class="color_name">2 #黑色</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#875f53"></div>
        <div class="color_name">3 #咖啡</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#dcd3ce"></div>
        <div class="color_name">4 #银灰</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#f9f7c6"></div>
        <div class="color_name">5 #米黄</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#e7c699"></div>
        <div class="color_name">6 #浅棕</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#eaad52"></div>
        <div class="color_name">7 #金黄</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#f57b2e"></div>
        <div class="color_name">8 #橘红</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#ebb5b3"></div>
        <div class="color_name">9 #粉红</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#c42344"></div>
        <div class="color_name">10 #大红</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#9acfd3"></div>
        <div class="color_name">11 #浅蓝</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#14abc6"></div>
        <div class="color_name">12 #湖蓝</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#4978a2"></div>
        <div class="color_name">13 #深蓝</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#d0e191"></div>
        <div class="color_name">14 #浅绿</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#6ab74f"></div>
        <div class="color_name">15 #草绿</div>
      </div>
      <div class="color_sel">
        <div class="color" style="background-color:#567331"></div>
        <div class="color_name">16 #深绿</div>
      </div>
    </div>
  </div>
  <div class="serve_detail">
    <div class="title">好的服务细节不怕放大与比较</div>
    <div class="img_box">
      <img src="{{shopRes('/shop_img/printing_bottom.jpg')}}" alt="">
    </div>
  </div>
  <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
    <img src="{{shopRes('/shop_img/index_better.jpg')}}" alt="">
  </div>
</div>
    <div id="appointment">
      <appoint></appoint>
    </div>
  </div>
    @include('shop.footer')
@endsection
@section('script')
  <script src="{{shopRes('/js/shop_tex_plant.js')}}"></script>
@endsection
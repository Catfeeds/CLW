require('./shop_common');
require('./shop_header');

import appoint from './components/shop/appoint.vue'
new Vue({
  el: '#appointment',
  components: {
    appoint
  }
})

var textVal = '日常保洁'
$('.js_cleanse .banner_title').html('开荒保洁')
$('.js_cleanse .clean_serve').css('background','url(/shop_img/ressetClean_serve.jpg)')
// $('.js_register1 .tax_title1').html('外商独资公司注册')
// $('.js_register2 .tax_title1').html('合伙企业注册')
// $('.js_register3 .tax_title1').html('个人独资企业注册')
// $('.js_register4 .tax_title1').html('公司注册地址')
// $('.js_register5 .tax_title1').html('分公司注册')
// $('.js_register6 .tax_title1').html('一般人注册地址')
$('.select_details .select_detail').click(function() {
  textVal = $(this).text()
  $(this).find('a').addClass('current').parent().siblings().find('a').removeClass('current')
  if($(this).parent().parent().length !== 0) {
    $(this).parent().parent().siblings().find('a').removeClass('current')
  }
  console.log(textVal)
  if(textVal == '日常保洁') {
    $('.js_dailyClean').css('display','block').siblings().css('display', 'none')
  } else if(textVal == '开荒保洁') {
    $('.js_cleanse').css('display','block').siblings().css('display', 'none')
  } else if(textVal == '搬家服务') {
    $('.js_move').css('display','block').siblings().css('display', 'none')
  } else if(textVal == '室内环保') {
    $('.js_protection').css('display','block').siblings().css('display', 'none')
  } else if(textVal == '桶装水') {
    $('.js_water').css('display','block').siblings().css('display', 'none')
  }
  if(textVal == '室内装修') {
    $('.js_decoration').css('display','block').siblings().css('display', 'none')
  } else if(textVal == '综合布线') {
    $('.js_colligate').css('display','block').siblings().css('display', 'none')
  }
  if(textVal == '小规模记账') {
    $('.js_charge').css('display','block').siblings().css('display', 'none')
  } else if(textVal == '一般纳税人代理记账') {
    $('.js_general').css('display','block').siblings().css('display', 'none')
  } else if(textVal == '有限责任公司注册') {
    $('.js_register').css('display','block').siblings().css('display', 'none')
    $('.info_2').html('前期信息确认<br>准备材料')
    $('.info_3').html('名称核检<br>现场面签提交')
    $('.info_4').html('领取营业执照<br>刻印章')
  }
  // } else if(textVal == '外商独资公司注册') {
  //   $('.js_register1').css('display','block').siblings().css('display', 'none')
  // } else if(textVal == '合伙企业注册') {
  //   $('.js_register2').css('display','block').siblings().css('display', 'none')
  // } else if(textVal == '个人独资企业注册') {
  //   $('.js_register3').css('display','block').siblings().css('display', 'none')
  // } else if(textVal == '公司注册地址') {
  //   $('.js_register4').css('display','block').siblings().css('display', 'none')
  // } else if(textVal == '分公司注册') {
  //   $('.js_register5').css('display','block').siblings().css('display', 'none')
  // } else if(textVal == '一般人注册地址') {
  //   $('.js_register6').css('display','block').siblings().css('display', 'none')
  // }
})


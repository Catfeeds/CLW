require('./shop_common');
require('./shop_header');
var textVal = '日常保洁'
$('.js_cleanse .banner_title').html('开荒保洁')
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
  }
})


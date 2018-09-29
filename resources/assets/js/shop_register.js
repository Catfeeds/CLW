require('./shop_common');
require('./shop_header');

import appoint from './components/shop/appoint.vue'
new Vue({
  el: '#appointment',
  components: {
    appoint
  }
})
$('.info_2').html('前期信息确认<br>准备材料')
$('.info_3').html('名称核检<br>现场面签提交')
$('.info_4').html('领取营业执照<br>刻印章')

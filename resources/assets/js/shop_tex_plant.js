require('./shop_common');
import appoint from './components/shop/appoint.vue'
new Vue({
  el: '#appointment',
  components: {
    appoint
  }
})
$('.info_1').html('预约前可<br>免费咨询')
$('.info_2').html('制定税收优惠<br>方案')
$('.info_3').html('确认优惠方案')
$('.info_4').html('签署合作协议')
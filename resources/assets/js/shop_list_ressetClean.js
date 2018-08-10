require('./shop_common');
import Vue from 'vue';
import appoint from './components/shop/appoint.vue'

new Vue({
  el: '#appoint',
  components: {
    appoint
  }
})
$('.banner_title').html('开荒保洁')
var startTop = $('.clean_banner').offset().top
$('#appoint').addClass('absolute')
$('#appoint').css('margin-top',startTop)
$(window).scroll(function(){
  var nowTop = $(window).scrollTop() + 123;
  console.log(nowTop)
  if(nowTop >= startTop){
    $('#appoint').removeClass('absolute')
    $('#appoint').css('margin-top','123px')
    $('#appoint').addClass('fixed')
  }
  if(nowTop <= startTop){
    $('#appoint').removeClass('fixed')
    $('#appoint').addClass('absolute')
    $('#appoint').css('margin-top',startTop)
  }
})
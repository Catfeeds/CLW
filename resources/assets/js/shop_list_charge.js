require('./shop_common');
import Vue from 'vue';
import appoint from './components/shop/appoint.vue'

new Vue({
  el: '#appoint',
  components: {
    appoint
  }
})
var startTop = $('.list_title').offset().top
$('#appoint').addClass('absolute')
$('#appoint').css('margin-top',startTop)
$(window).scroll(function(){
  var nowTop = $(window).scrollTop();
  console.log(nowTop)
  if(nowTop >= startTop){
    $('#appoint').removeClass('absolute')
    $('#appoint').css('margin-top',0)
    $('#appoint').addClass('fixed')
  }
  if(nowTop <= startTop){
    $('#appoint').removeClass('fixed')
    $('#appoint').addClass('absolute')
    $('#appoint').css('margin-top',startTop)
  }
})
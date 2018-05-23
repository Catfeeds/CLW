window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import { Toast } from 'mint-ui';
import 'mint-ui/lib/style.css'
const Swiper = require('swiper');
Vue.component('building-list', require('./components/buildingList.vue'));
var listAppData = JSON.parse($('#listAppData').val());
const app = new Vue({
  el: '#listApp',
  data: {
    list: listAppData.data
  }
});
// var swiperBanner =  new Swiper('#swiperBanner', {  // 实例化banner轮播
//   loop:true,
//   autoplay: 3000,
//   effect : 'slide',
//   pagination: '.swiper-pagination',
//   autoplayDisableOnInteraction:false,
//   paginationClickable:true
// });
var swiperBroadcast = new Swiper('#swiperBroadcast', { // 实例化系统公告轮播
  loop:true,
  autoplay: 3000,
  effect : 'slide',
  direction : 'vertical',
  autoplayDisableOnInteraction:false,
  paginationClickable:true
});
$(document).on('tap || touchend', '#addBook', function () {
  var tel = $('#telInput').val(),
      telReg=/^[1][0-9]{10}$/;
  if (!telReg.test(tel)) {
    Toast({
      message: '请输入11位手机号',
      position: 'top',
      duration: 3000
    });
    return false;
  }
  $('#backdrop').fadeIn(300)

});
$(document).on('touchend || tap', '#backdrop', function () {
  $('#backdrop').fadeOut(300)
});
$(document).on('touchend || tap', '#popover', function () {
  return false
});
// 预约
$(document).on('touchend || tap', '#lookForHouse', function () {
  $.ajax({
    url: '/bespeaks',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val()
    },
    success: function (data) {
      $('#backdrop').fadeOut(300);
      $('#telInput').val('');
      if(data.status) {
        Toast({
          message: data.message,
          position: 'top',
          duration: 3000
        });
      } else  {
        Toast({
          message: '预约失败',
          position: 'top',
          duration: 3000
        });
      }
    },
    error: function () {
      $('#backdrop').fadeOut(300);
      Toast({
        message: '服务器繁忙,请联系客服处理',
        position: 'top',
        duration: 3000
      });
    }
  })
});
// 委托找房
$(document).on('touchend || tap', '#peltHouse', function () {
  $.ajax({
    url: '/throw_ins',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val()
    },
    success: function (data) {
      $('#backdrop').fadeOut(300);
      $('#telInput').val('');
      if(data.status) {
        Toast({
          message: data.message,
          position: 'top',
          duration: 3000
        });
      } else  {
        Toast({
          message: '投放失败',
          position: 'top',
          duration: 3000
        });
      }
    },
    error: function () {
      $('#backdrop').fadeOut(300);
      Toast({
        message: '服务器繁忙,请联系客服处理',
        position: 'top',
        duration: 3000
      });
    }
  })
});

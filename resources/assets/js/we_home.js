require('./we_common')
import { Toast } from 'mint-ui';
import 'mint-ui/lib/style.css';
const Swiper = require('swiper');
Vue.component('building-list', require('./components/buildingList.vue'));
var listAppData = JSON.parse($('#listAppData').val());
const app = new Vue({
  el: '#listApp',
  data: {
    list: listAppData.data,
    page: 2,
    getData: true,
    status: true,
    prompt: false,
  },
  methods: {
    getMore: function () {
      var self = this
      self.getData = false
      $.ajax({
        url: '/buildings/create',
        type: 'GET',
        data: { page: self.page },
        success: function (data) {
          if (data.data.length === 0) {
            self.status = false
            self.prompt = true
            return
          }
          self.page++
          data.data.data.map(function (item) {
            self.list.push(item)
          });
          if (data.data.data.length >= data.data.per_page) {
            self.getData = true
          } else {
            self.prompt = true
            self.status = false
          }
        }
      })
    }
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
var bannerMedian = new Swiper('#banner-median', {
  loop:true,
  autoplay: 3000,
  effect : 'slide',
  autoplayDisableOnInteraction:false,
  paginationClickable:true
})
$(document).on('click', '#addBook', function () {
  var tel = $('#telInput').val(),
      telReg=/^[1][0-9]{10}$/;
      $('#telInput').blur()
  if (!telReg.test(tel)) {
    Toast({
      message: '请输入11位手机号',
      position: 'center',
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
  // var source = whatBrowser()
  $.ajax({
    url: '/entrust_throw_ins',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val(),
      page_source: '首页-委托找房',
      source: 7,
      demand: 2
    },
    success: function (data) {
      $('#backdrop').fadeOut(300);
      $('#telInput').val('');
      if(data.success) {
        Toast({
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else  {
        Toast({
          message: '预约失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function (error) {
      $('#backdrop').fadeOut(300);
      if (error.status < 500) {
        Toast({
          message: error.responseJSON.message,
          position: 'center',
          duration: 3000
        });
      } else {
        Toast({
          message: '服务器出错',
          position: 'center',
          duration: 3000
        });
      }
    }
  })
});
// 投放房源
$(document).on('touchend || tap', '#peltHouse', function () {
  // var source = whatBrowser()
  $.ajax({
    url: '/entrust_throw_ins',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val(),
      page_source: '首页-投放房源',
      source: 7,
      demand: 1
    },
    success: function (data) {
      $('#backdrop').fadeOut(300);
      $('#telInput').val('');
      if(data.success) {
        Toast({
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else  {
        Toast({
          message: '投放失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function (error) {
      $('#backdrop').fadeOut(300);
      if (error.status < 500) {
        Toast({
          message: error.responseJSON.message,
          position: 'center',
          duration: 3000
        });
      } else {
        Toast({
          message: '服务器出错',
          position: 'center',
          duration: 3000
        });
      }
      
    }
  })
});

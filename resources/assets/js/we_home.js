window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
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
// 点击事件
    var hrefs = window.location.href.split('/')[3]
    console.log(window.location.href.split('/')[3])
    switch (hrefs) {
        case 'buildings':
            $('.tabs>.tab').css('display', 'none')
            $('.tabactive').css('display', 'none')
            break;
        default: 
    }
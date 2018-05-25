window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
var detailBanner = require('./components/detailBanner.vue');
var houseDetailList = require('./components/houseDetailList.vue');
import BaiduMap from 'vue-baidu-map'
new Vue({
  el: '#swiperBanner',
  components: {detailBanner},
  data: {
    imgList: JSON.parse($('#imgList').val())
  }
});
Vue.use(BaiduMap, {
  ak: process.env.baiduAK
});
new Vue({
  el: '#VueBottomBox',
  components: { houseDetailList }
});
// // 显示或者隐藏栋座信息
// $('.top').touchend(function(){
//     $('#collapse').toggleClass("mui-active")
// })
// 显示预约弹框
$(document).on('touchend', '#order', function(){
    $('#backdrop').fadeIn(300)
});
// 阻止冒泡
$(document).on('touchend', '#popover', function(){
  return false
});
$('#popover').on('touchend', '.js_closes', function(){
  $('#backdrop').fadeOut(300)
});
// 关闭预约弹框
$(document).on('touchend', '.js_closes', function(){
  $('#backdrop').fadeOut(300)
});

// // 点击提交
// $('#upload').touchend(() => {
//     var name = $('#names').val(),
//         tel = $('#tel').val();
//     if (!name || name.trim() === '') {
//         alert('请输入称谓')
//       return false
//     }
//     if (!tel || tel.trim() === '') {
//         alert('请输入电话')
//       return false
//     }
//
// })
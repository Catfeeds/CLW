window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import { Toast } from 'mint-ui';
import 'mint-ui/lib/style.css';
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
$('.top').on('touchend', function(){
    $('#collapse').toggleClass("mui-active")
})
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
$('#upload').on('touchend', () => {
    var name = $('#names').val(),
        tel = $('#tel').val();
    if (!name || name.trim() === '') {
      Toast('请输入称谓')
      return false
    }
    if (!tel || tel.trim() === '') {
      Toast('请输入电话')
      return false
    }
    $('#backdrop').fadeOut(300)
    $.ajax({
      url: '/bespeaks',
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        appellation: name,
        tel: tel
      },
      success: function (data) {
        if (data.success) {
          $('#names').val('')
          $('#tel').val('')
          Toast('提交成功')
        } else {
          Toast(data.message)
        }
      },
      error: function (error) {
        if (error.status < 500) {
          Toast(error.responseJSON.message)
        } else {
          Toast('服务器出错')
        }
      }
    })
});
$(document).on('touchend', '.js_collect', function (e) {
  var isCollect = $(e.currentTarget).find('img#collect1').is(":hidden"); // 当前是否收藏 true： 收藏 false ：未收藏
  var house_id = $('input#house_id').val();
  if (isCollect) {
    // 取消收藏
    $.ajax({
      url: '/del/'+house_id,
      type: 'GET',
      success: function (data) {
        if (data.success) {
          Toast('已取消收藏')
          $('img#collect1').removeClass('mui-hidden')
          $('img#collect2').addClass('mui-hidden')
        } else {
          Toast(data.message)
        }
      },
      error: function (error) {
        if (error.status < 500) {
          Toast(error.responseJSON.message)
        } else {
          Toast('服务器出错')
        }
      }
    })
  } else {
    // 添加收藏
    $.ajax({
      url: '/collections',
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        house_id: house_id
      },
      success: function (data) {
        if (data.success) {
          Toast('收藏成功')
          $('img#collect1').addClass('mui-hidden')
          $('img#collect2').removeClass('mui-hidden')
        } else {
          Toast(data.message)
        }
      },
      error: function (error) {
        if (error.status < 500) {
          Toast(error.responseJSON.message)
        } else {
          Toast('服务器出错')
        }
      }
    })
  }
})
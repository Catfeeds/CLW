require('./we_common')
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
$('.js_showInfo').on('click', function(){
    $('#collapse').toggleClass("mui-active")
})
// 显示预约弹框
// $(document).on('click', '#order', function(){
//     $('#backdrop').fadeIn(300)
// });
// 阻止冒泡
// $(document).on('click', '#popover', function(){
//   return false
// });
$('#popover').on('touchend', '.js_closes', function(){
  $('#backdrop').fadeOut(300)
});
// 关闭预约弹框
// $(document).on('click', '.js_closes', function(){
//   $('#backdrop').fadeOut(300)
// });
// 弹窗隐藏
window.backdropHide =function () {
  $('#backdrop').fadeOut(300)
};
// 弹窗显示
window.backdropShow =function () {
  $('#backdrop').fadeIn(300)
};

// $('#popover').on('click || touchend', function () {
//   return false
// });
window.showInfo = function(){
  $('#collapse').toggleClass("mui-active")
}
// // 点击提交
$('#upload').on('click', () => {
    var name = $('#names').val(),
        tel = $('#tel').val(),
      telReg=/^[1][0-9]{10}$/;
    if (!name || name.trim() === '') {
      Toast('请输入称谓')
      return false
    }
    if (!telReg.test(tel)) {
      Toast('请输入11位手机号')
      return false
    }
    $('#backdrop').fadeOut(300)
    var source = whatBrowser()
    $.ajax({
      url: '/bespeaks',
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        appellation: name,
        tel: tel,
        page_source: source+'房源详情页',
        source: source.substring(0,s.length-1)
      },
      success: function (data) {
        if (data.success) {
          $('#names').val('')
          $('#tel').val('')
          Toast('信息提交成功，楚楼网30分钟内联系您')
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
$(document).on('click', '.js_collect', function (e) {
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
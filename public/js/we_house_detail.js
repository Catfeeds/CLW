webpackJsonp([19],{

/***/ 102:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(103);


/***/ }),

/***/ 103:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_vue_baidu_map__ = __webpack_require__(10);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_vue_baidu_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_vue_baidu_map__);
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);


var detailBanner = __webpack_require__(13);
var houseDetailList = __webpack_require__(11);

new Vue({
  el: '#swiperBanner',
  components: { detailBanner: detailBanner },
  data: {
    imgList: JSON.parse($('#imgList').val())
  }
});
Vue.use(__WEBPACK_IMPORTED_MODULE_2_vue_baidu_map___default.a, {
  ak: 'GNEfPXFcuuKglYSB8R45IzmhzfjKDclf'
});
new Vue({
  el: '#VueBottomBox',
  components: { houseDetailList: houseDetailList }
});
// // 显示或者隐藏栋座信息
$('.js_showInfo').on('click', function () {
  $('#collapse').toggleClass("mui-active");
});
// 显示预约弹框
// $(document).on('click', '#order', function(){
//     $('#backdrop').fadeIn(300)
// });
// 阻止冒泡
// $(document).on('click', '#popover', function(){
//   return false
// });
$('#popover').on('touchend', '.js_closes', function () {
  $('#backdrop').fadeOut(300);
});
// 关闭预约弹框
// $(document).on('click', '.js_closes', function(){
//   $('#backdrop').fadeOut(300)
// });
// 弹窗隐藏
window.backdropHide = function () {
  $('#backdrop').fadeOut(300);
};
// 弹窗显示
window.backdropShow = function () {
  $('#backdrop').fadeIn(300);
};
<<<<<<< HEAD

// $('#popover').on('click || touchend', function () {
//   return false
// });
=======
window.breakClick = function () {
  return false;
};
$('#popover').on('click || touchend', function () {
  return false;
});
>>>>>>> origin/wanghao
window.showInfo = function () {
  $('#collapse').toggleClass("mui-active");
};
// // 点击提交
$('#upload').on('click', function () {
  var name = $('#names').val(),
<<<<<<< HEAD
      tel = $('#tel').val(),
      telReg = /^[1][0-9]{10}$/;
=======
      tel = $('#tel').val();
>>>>>>> origin/wanghao
  if (!name || name.trim() === '') {
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('请输入称谓');
    return false;
  }
<<<<<<< HEAD
  if (!telReg.test(tel)) {
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('请输入11位手机号');
=======
  if (!tel || tel.trim() === '') {
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('请输入电话');
>>>>>>> origin/wanghao
    return false;
  }
  $('#backdrop').fadeOut(300);
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
    success: function success(data) {
      if (data.success) {
        $('#names').val('');
        $('#tel').val('');
<<<<<<< HEAD
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('信息提交成功，楚楼网30分钟内联系您');
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('提交成功');
>>>>>>> origin/wanghao
      } else {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])(data.message);
      }
    },
    error: function error(_error) {
      if (_error.status < 500) {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])(_error.responseJSON.message);
      } else {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('服务器出错');
      }
    }
  });
});
$(document).on('click', '.js_collect', function (e) {
  var isCollect = $(e.currentTarget).find('img#collect1').is(":hidden"); // 当前是否收藏 true： 收藏 false ：未收藏
  var house_id = $('input#house_id').val();
  if (isCollect) {
    // 取消收藏
    $.ajax({
      url: '/del/' + house_id,
      type: 'GET',
      success: function success(data) {
        if (data.success) {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('已取消收藏');
          $('img#collect1').removeClass('mui-hidden');
          $('img#collect2').addClass('mui-hidden');
        } else {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])(data.message);
        }
      },
      error: function error(_error2) {
        if (_error2.status < 500) {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])(_error2.responseJSON.message);
        } else {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('服务器出错');
        }
      }
    });
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
      success: function success(data) {
        if (data.success) {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('收藏成功');
          $('img#collect1').addClass('mui-hidden');
          $('img#collect2').removeClass('mui-hidden');
        } else {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])(data.message);
        }
      },
      error: function error(_error3) {
        if (_error3.status < 500) {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])(_error3.responseJSON.message);
        } else {
          Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('服务器出错');
        }
      }
    });
  }
});

/***/ })

},[102]);
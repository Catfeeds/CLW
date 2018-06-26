webpackJsonp([4],{

/***/ 53:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(54);
__webpack_require__(65);
__webpack_require__(66);
__webpack_require__(67);
__webpack_require__(68);
__webpack_require__(69);
__webpack_require__(70);
__webpack_require__(71);
__webpack_require__(72);
__webpack_require__(73);
__webpack_require__(74);
__webpack_require__(75);
__webpack_require__(76);
__webpack_require__(77);
__webpack_require__(78);
__webpack_require__(79);
__webpack_require__(80);
__webpack_require__(81);
__webpack_require__(82);
__webpack_require__(83);
__webpack_require__(84);
__webpack_require__(85);
<<<<<<< HEAD
__webpack_require__(86);
module.exports = __webpack_require__(87);
=======
module.exports = __webpack_require__(86);
>>>>>>> origin/wanghao


/***/ }),

/***/ 54:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(5);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


__webpack_require__(2);


var Swiper = __webpack_require__(45);
Vue.component('building-list', __webpack_require__(10));
var listAppData = JSON.parse($('#listAppData').val());
var app = new Vue({
  el: '#listApp',
  data: {
    list: listAppData.data,
    page: 2,
    getData: true,
    status: true,
    prompt: false
  },
  methods: {
    getMore: function getMore() {
      var self = this;
      self.getData = false;
      $.ajax({
        url: '/buildings/create',
        type: 'GET',
        data: { page: self.page },
        success: function success(data) {
          if (data.data.length === 0) {
            self.status = false;
            self.prompt = true;
            return;
          }
          self.page++;
          data.data.data.map(function (item) {
            self.list.push(item);
          });
          if (data.data.data.length >= data.data.per_page) {
            self.getData = true;
          } else {
            self.prompt = true;
            self.status = false;
          }
        }
      });
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
  loop: true,
  autoplay: 3000,
  effect: 'slide',
  direction: 'vertical',
  autoplayDisableOnInteraction: false,
  paginationClickable: true
});
$(document).on('click', '#addBook', function () {
  var tel = $('#telInput').val(),
      telReg = /^[1][0-9]{10}$/;
  $('#telInput').blur();
  if (!telReg.test(tel)) {
    __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
      message: '请输入11位手机号',
      position: 'center',
      duration: 3000
    });
    return false;
  }
  $('#backdrop').fadeIn(300);
});
$(document).on('touchend || tap', '#backdrop', function () {
  $('#backdrop').fadeOut(300);
});
$(document).on('touchend || tap', '#popover', function () {
  return false;
});
// 预约
$(document).on('touchend || tap', '#lookForHouse', function () {
  var source = whatBrowser();
  $.ajax({
    url: '/bespeaks',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val(),
      page_source: source + '首页',
      source: source.substring(0, source.length - 1)
    },
    success: function success(data) {
      $('#backdrop').fadeOut(300);
      $('#telInput').val('');
      if (data.success) {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
          message: '预约失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function error() {
      $('#backdrop').fadeOut(300);
      __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
        message: '服务器繁忙,请联系客服处理',
        position: 'center',
        duration: 3000
      });
    }
  });
});
// 投放房源
$(document).on('touchend || tap', '#peltHouse', function () {
  var source = whatBrowser();
  $.ajax({
    url: '/throw_ins',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val(),
      page_source: source + '首页',
      source: source.substring(0, source.length - 1)
    },
    success: function success(data) {
      $('#backdrop').fadeOut(300);
      $('#telInput').val('');
      if (data.success) {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
          message: '投放失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function error() {
      $('#backdrop').fadeOut(300);
      __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
        message: '服务器繁忙,请联系客服处理',
        position: 'center',
        duration: 3000
      });
    }
  });
});

/***/ }),

/***/ 65:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 66:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 67:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 68:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 69:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 70:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 71:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 72:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 73:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 74:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 75:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 76:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 77:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 78:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 79:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 80:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 81:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 82:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 83:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 84:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 85:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 86:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

<<<<<<< HEAD
/***/ }),

/***/ 87:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

=======
>>>>>>> origin/wanghao
/***/ })

},[53]);
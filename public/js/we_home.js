<<<<<<< HEAD
<<<<<<< HEAD
webpackJsonp([2],Array(28).concat([
/* 28 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(29);
=======
webpackJsonp([2],Array(24).concat([
/* 24 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(25);
__webpack_require__(39);
>>>>>>> origin/cyq
=======
webpackJsonp([2],Array(27).concat([
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(28);
__webpack_require__(39);
>>>>>>> origin/wanghao
__webpack_require__(40);
__webpack_require__(41);
__webpack_require__(42);
__webpack_require__(43);
__webpack_require__(44);
__webpack_require__(45);
__webpack_require__(46);
__webpack_require__(47);
__webpack_require__(48);
__webpack_require__(49);
__webpack_require__(50);
__webpack_require__(51);
__webpack_require__(52);
__webpack_require__(53);
__webpack_require__(54);
__webpack_require__(55);
__webpack_require__(56);
__webpack_require__(57);
__webpack_require__(58);
__webpack_require__(59);
module.exports = __webpack_require__(60);


/***/ }),
<<<<<<< HEAD
<<<<<<< HEAD
/* 29 */
=======
/* 25 */
>>>>>>> origin/cyq
=======
/* 28 */
>>>>>>> origin/wanghao
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
<<<<<<< HEAD
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


__webpack_require__(0);


var Swiper = __webpack_require__(19);
<<<<<<< HEAD
Vue.component('building-list', __webpack_require__(9));
=======
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
__webpack_require__(0);


var Swiper = __webpack_require__(17);
Vue.component('building-list', __webpack_require__(6));
>>>>>>> origin/cyq
=======
Vue.component('building-list', __webpack_require__(8));
>>>>>>> origin/wanghao
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
<<<<<<< HEAD
    __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
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
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
          message: '预约失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function error() {
      $('#backdrop').fadeOut(300);
<<<<<<< HEAD
      __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
      Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
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
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
          message: '投放失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function error() {
      $('#backdrop').fadeOut(300);
<<<<<<< HEAD
      __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
      Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
        message: '服务器繁忙,请联系客服处理',
        position: 'center',
        duration: 3000
      });
    }
  });
});

/***/ }),
<<<<<<< HEAD
<<<<<<< HEAD
=======
/* 26 */,
/* 27 */,
/* 28 */,
/* 29 */,
>>>>>>> origin/cyq
=======
/* 29 */,
>>>>>>> origin/wanghao
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */,
/* 36 */,
/* 37 */,
/* 38 */,
<<<<<<< HEAD
<<<<<<< HEAD
/* 39 */,
=======
=======
>>>>>>> origin/wanghao
/* 39 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
<<<<<<< HEAD
>>>>>>> origin/cyq
=======
>>>>>>> origin/wanghao
/* 40 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 41 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 42 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 43 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 44 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 45 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 46 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 47 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 48 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 49 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 50 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 51 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 52 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 53 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 54 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 55 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 56 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 57 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 58 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 59 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 60 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
<<<<<<< HEAD
<<<<<<< HEAD
]),[28]);
=======
]),[24]);
>>>>>>> origin/cyq
=======
]),[27]);
>>>>>>> origin/wanghao

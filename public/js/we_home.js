<<<<<<< HEAD
webpackJsonp([2],Array(41).concat([
/* 41 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(42);
__webpack_require__(53);
__webpack_require__(54);
__webpack_require__(55);
__webpack_require__(56);
__webpack_require__(57);
__webpack_require__(58);
__webpack_require__(59);
__webpack_require__(60);
__webpack_require__(61);
__webpack_require__(62);
__webpack_require__(63);
__webpack_require__(64);
__webpack_require__(65);
__webpack_require__(66);
__webpack_require__(67);
__webpack_require__(68);
__webpack_require__(69);
__webpack_require__(70);
__webpack_require__(71);
__webpack_require__(72);
__webpack_require__(73);
module.exports = __webpack_require__(74);


/***/ }),
/* 42 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


__webpack_require__(1);


var Swiper = __webpack_require__(33);
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
/* 43 */,
/* 44 */,
/* 45 */,
/* 46 */,
/* 47 */,
/* 48 */,
/* 49 */,
/* 50 */,
/* 51 */,
/* 52 */,
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

/***/ }),
/* 61 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 62 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 63 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 64 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 65 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 66 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 67 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 68 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 69 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 70 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 71 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 72 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 73 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 74 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
]),[41]);
=======
webpackJsonp([2],Array(41).concat([function(t,n,e){e(42),e(53),e(54),e(55),e(56),e(57),e(58),e(59),e(60),e(61),e(62),e(63),e(64),e(65),e(66),e(67),e(68),e(69),e(70),e(71),e(72),e(73),t.exports=e(74)},function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var a=e(1),o=(e.n(a),e(3)),u=e.n(o),c=e(4);e.n(c);e(0);var i=e(33);Vue.component("building-list",e(10));var r=JSON.parse($("#listAppData").val());new Vue({el:"#listApp",data:{list:r.data,page:2,getData:!0,status:!0,prompt:!1},methods:{getMore:function(){var t=this;t.getData=!1,$.ajax({url:"/buildings/create",type:"GET",data:{page:t.page},success:function(n){if(0===n.data.length)return t.status=!1,void(t.prompt=!0);t.page++,n.data.data.map(function(n){t.list.push(n)}),n.data.data.length>=n.data.per_page?t.getData=!0:(t.prompt=!0,t.status=!1)}})}}}),new i("#swiperBroadcast",{loop:!0,autoplay:3e3,effect:"slide",direction:"vertical",autoplayDisableOnInteraction:!1,paginationClickable:!0});$(document).on("click","#addBook",function(){var t=$("#telInput").val();if($("#telInput").blur(),!/^[1][0-9]{10}$/.test(t))return u()({message:"请输入11位手机号",position:"center",duration:3e3}),!1;$("#backdrop").fadeIn(300)}),$(document).on("touchend || tap","#backdrop",function(){$("#backdrop").fadeOut(300)}),$(document).on("touchend || tap","#popover",function(){return!1}),$(document).on("touchend || tap","#lookForHouse",function(){var t=whatBrowser();$.ajax({url:"/bespeaks",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{tel:$("#telInput").val(),page_source:t+"首页",source:t.substring(0,t.length-1)},success:function(t){$("#backdrop").fadeOut(300),$("#telInput").val(""),t.success?u()({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:3e3}):u()({message:"预约失败",position:"center",duration:3e3})},error:function(){$("#backdrop").fadeOut(300),u()({message:"服务器繁忙,请联系客服处理",position:"center",duration:3e3})}})}),$(document).on("touchend || tap","#peltHouse",function(){var t=whatBrowser();$.ajax({url:"/throw_ins",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{tel:$("#telInput").val(),page_source:t+"首页",source:t.substring(0,t.length-1)},success:function(t){$("#backdrop").fadeOut(300),$("#telInput").val(""),t.success?u()({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:3e3}):u()({message:"投放失败",position:"center",duration:3e3})},error:function(){$("#backdrop").fadeOut(300),u()({message:"服务器繁忙,请联系客服处理",position:"center",duration:3e3})}})})},,,,,,,,,,,function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){}]),[41]);
>>>>>>> origin/zxz

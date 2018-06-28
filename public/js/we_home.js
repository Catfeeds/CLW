<<<<<<< HEAD
webpackJsonp([4],{53:function(t,n,e){e(54),e(65),e(66),e(67),e(68),e(69),e(70),e(71),e(72),e(73),e(74),e(75),e(76),e(77),e(78),e(79),e(80),e(81),e(82),e(83),e(84),e(85),e(86),t.exports=e(87)},54:function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var o=e(3),a=(e.n(o),e(4)),u=e.n(a),c=e(5);e.n(c);e(2);var i=e(45);Vue.component("building-list",e(10));var s=JSON.parse($("#listAppData").val());new Vue({el:"#listApp",data:{list:s.data,page:2,getData:!0,status:!0,prompt:!1},methods:{getMore:function(){var t=this;t.getData=!1,$.ajax({url:"/buildings/create",type:"GET",data:{page:t.page},success:function(n){if(0===n.data.length)return t.status=!1,void(t.prompt=!0);t.page++,n.data.data.map(function(n){t.list.push(n)}),n.data.data.length>=n.data.per_page?t.getData=!0:(t.prompt=!0,t.status=!1)}})}}}),new i("#swiperBroadcast",{loop:!0,autoplay:3e3,effect:"slide",direction:"vertical",autoplayDisableOnInteraction:!1,paginationClickable:!0});$(document).on("click","#addBook",function(){var t=$("#telInput").val();if($("#telInput").blur(),!/^[1][0-9]{10}$/.test(t))return u()({message:"请输入11位手机号",position:"center",duration:3e3}),!1;$("#backdrop").fadeIn(300)}),$(document).on("touchend || tap","#backdrop",function(){$("#backdrop").fadeOut(300)}),$(document).on("touchend || tap","#popover",function(){return!1}),$(document).on("touchend || tap","#lookForHouse",function(){var t=whatBrowser();$.ajax({url:"/bespeaks",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{tel:$("#telInput").val(),page_source:t+"首页",source:t.substring(0,t.length-1)},success:function(t){$("#backdrop").fadeOut(300),$("#telInput").val(""),t.success?u()({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:3e3}):u()({message:"预约失败",position:"center",duration:3e3})},error:function(){$("#backdrop").fadeOut(300),u()({message:"服务器繁忙,请联系客服处理",position:"center",duration:3e3})}})}),$(document).on("touchend || tap","#peltHouse",function(){var t=whatBrowser();$.ajax({url:"/throw_ins",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{tel:$("#telInput").val(),page_source:t+"首页",source:t.substring(0,t.length-1)},success:function(t){$("#backdrop").fadeOut(300),$("#telInput").val(""),t.success?u()({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:3e3}):u()({message:"投放失败",position:"center",duration:3e3})},error:function(){$("#backdrop").fadeOut(300),u()({message:"服务器繁忙,请联系客服处理",position:"center",duration:3e3})}})})},65:function(t,n){},66:function(t,n){},67:function(t,n){},68:function(t,n){},69:function(t,n){},70:function(t,n){},71:function(t,n){},72:function(t,n){},73:function(t,n){},74:function(t,n){},75:function(t,n){},76:function(t,n){},77:function(t,n){},78:function(t,n){},79:function(t,n){},80:function(t,n){},81:function(t,n){},82:function(t,n){},83:function(t,n){},84:function(t,n){},85:function(t,n){},86:function(t,n){},87:function(t,n){}},[53]);
=======
webpackJsonp([2],Array(24).concat([
/* 24 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(25);
__webpack_require__(39);
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
__webpack_require__(60);
module.exports = __webpack_require__(61);


/***/ }),
/* 25 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
__webpack_require__(0);


var Swiper = __webpack_require__(17);
Vue.component('building-list', __webpack_require__(7));
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
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
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
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
          message: '预约失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function error() {
      $('#backdrop').fadeOut(300);
      Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
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
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
          message: '信息提交成功，楚楼网30分钟内联系您',
          position: 'center',
          duration: 3000
        });
      } else {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
          message: '投放失败',
          position: 'center',
          duration: 3000
        });
      }
    },
    error: function error() {
      $('#backdrop').fadeOut(300);
      Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
        message: '服务器繁忙,请联系客服处理',
        position: 'center',
        duration: 3000
      });
    }
  });
});

/***/ }),
/* 26 */,
/* 27 */,
/* 28 */,
/* 29 */,
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */,
/* 36 */,
/* 37 */,
/* 38 */,
/* 39 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
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

/***/ }),
/* 61 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
]),[24]);
>>>>>>> origin/master

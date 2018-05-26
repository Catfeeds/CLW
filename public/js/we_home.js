<<<<<<< HEAD
webpackJsonp([2],Array(27).concat([function(t,n,e){e(28),e(41),e(42),e(43),e(44),e(45),e(46),e(47),e(48),e(49),e(50),e(51),e(52),e(53),e(54),e(55),e(56),e(57),e(58),e(59),e(60),e(61),t.exports=e(62)},function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var o=e(1),a=(e.n(o),e(2));e.n(a);window.$=window.jQuery=e(0),window.Vue=e(4);var c=e(20);Vue.component("building-list",e(8));var u=JSON.parse($("#listAppData").val());new Vue({el:"#listApp",data:{list:u.data,page:2,getData:!0,status:!0},methods:{getMore:function(){var t=this;t.getData=!1,$.ajax({url:"/buildings/create",type:"GET",data:{page:t.page},success:function(n){if(0===n.data.length)return Object(o.Toast)({message:"已无更多数据",position:"center",duration:3e3}),void(t.status=!1);t.page++,n.data.data.map(function(n){t.list.push(n)}),n.data.data.length>=n.data.per_page?t.getData=!0:t.status=!1}})}}}),new c("#swiperBroadcast",{loop:!0,autoplay:3e3,effect:"slide",direction:"vertical",autoplayDisableOnInteraction:!1,paginationClickable:!0});$(document).on("tap || touchend","#addBook",function(){var t=$("#telInput").val();if($("#telInput").blur(),!/^[1][0-9]{10}$/.test(t))return Object(o.Toast)({message:"请输入11位手机号",position:"center",duration:3e3}),!1;$("#backdrop").fadeIn(300)}),$(document).on("touchend || tap","#backdrop",function(){$("#backdrop").fadeOut(300)}),$(document).on("touchend || tap","#popover",function(){return!1}),$(document).on("touchend || tap","#lookForHouse",function(){$.ajax({url:"/bespeaks",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{tel:$("#telInput").val()},success:function(t){$("#backdrop").fadeOut(300),$("#telInput").val(""),t.success?Object(o.Toast)({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:3e3}):Object(o.Toast)({message:"预约失败",position:"center",duration:3e3})},error:function(){$("#backdrop").fadeOut(300),Object(o.Toast)({message:"服务器繁忙,请联系客服处理",position:"center",duration:3e3})}})}),$(document).on("touchend || tap","#peltHouse",function(){$.ajax({url:"/throw_ins",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{tel:$("#telInput").val()},success:function(t){$("#backdrop").fadeOut(300),$("#telInput").val(""),t.success?Object(o.Toast)({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:3e3}):Object(o.Toast)({message:"投放失败",position:"center",duration:3e3})},error:function(){$("#backdrop").fadeOut(300),Object(o.Toast)({message:"服务器繁忙,请联系客服处理",position:"center",duration:3e3})}})})},,,,,,,,,,,,,function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){},function(t,n){}]),[27]);
=======
webpackJsonp([2],Array(27).concat([
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(28);
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
__webpack_require__(61);
module.exports = __webpack_require__(62);


/***/ }),
/* 28 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);


var Swiper = __webpack_require__(20);
Vue.component('building-list', __webpack_require__(8));
var listAppData = JSON.parse($('#listAppData').val());
var app = new Vue({
  el: '#listApp',
  data: {
    list: listAppData.data,
    page: 2,
    getData: true,
    status: true
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
            Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
              message: '已无更多数据',
              position: 'center',
              duration: 3000
            });
            self.status = false;
            return;
          }
          self.page++;
          data.data.data.map(function (item) {
            self.list.push(item);
          });
          if (data.data.data.length >= data.data.per_page) {
            self.getData = true;
          } else {
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
  $.ajax({
    url: '/bespeaks',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val()
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
  $.ajax({
    url: '/throw_ins',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      tel: $('#telInput').val()
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
/* 39 */,
/* 40 */,
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

/***/ }),
/* 62 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
]),[27]);
>>>>>>> origin/zxz

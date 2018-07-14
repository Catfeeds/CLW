<<<<<<< HEAD
webpackJsonp([21],{129:function(e,s,n){e.exports=n(130)},130:function(e,s,n){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var t=n(3),o=(n.n(t),n(4)),a=n.n(o),c=n(5),i=(n.n(c),n(12)),u=n.n(i);n(2);var r=n(17),l=n(16);new Vue({el:"#swiperBanner",components:{detailBanner:r},data:{imgList:JSON.parse($("#imgList").val())}}),Vue.use(u.a,{ak:"GNEfPXFcuuKglYSB8R45IzmhzfjKDclf"}),new Vue({el:"#VueBottomBox",components:{houseDetailList:l}}),$(".js_showInfo").on("click",function(){$("#collapse").toggleClass("mui-active")}),$("#popover").on("touchend",".js_closes",function(){$("#backdrop").fadeOut(300)}),window.backdropHide=function(){$("#backdrop").fadeOut(300)},window.backdropShow=function(){$("#backdrop").fadeIn(300)},window.showInfo=function(){$("#collapse").toggleClass("mui-active")},$("#upload").on("click",function(){var e=$("#names").val(),s=$("#tel").val();if(!e||""===e.trim())return a()("请输入称谓"),!1;if(!/^[1][0-9]{10}$/.test(s))return a()("请输入11位手机号"),!1;$("#backdrop").fadeOut(300);var n=whatBrowser();$.ajax({url:"/bespeaks",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{appellation:e,tel:s,page_source:n+"房源详情页",source:n.substring(0,n.length-1)},success:function(e){e.success?($("#names").val(""),$("#tel").val(""),a()("信息提交成功，楚楼网30分钟内联系您")):a()(e.message)},error:function(e){e.status<500?a()(e.responseJSON.message):a()("服务器出错")}})}),$(document).on("click",".js_collect",function(e){var s=$(e.currentTarget).find("img#collect1").is(":hidden"),n=$("input#house_id").val();s?$.ajax({url:"/del/"+n,type:"GET",success:function(e){e.success?(a()("已取消收藏"),$("img#collect1").removeClass("mui-hidden"),$("img#collect2").addClass("mui-hidden")):a()(e.message)},error:function(e){e.status<500?a()(e.responseJSON.message):a()("服务器出错")}}):$.ajax({url:"/collections",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{house_id:n},success:function(e){e.success?(a()("收藏成功"),$("img#collect1").addClass("mui-hidden"),$("img#collect2").removeClass("mui-hidden")):a()(e.message)},error:function(e){e.status<500?a()(e.responseJSON.message):a()("服务器出错")}})})}},[129]);
=======
webpackJsonp([21],{

/***/ 104:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(105);


/***/ }),

/***/ 105:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_vue_baidu_map__ = __webpack_require__(9);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_vue_baidu_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_vue_baidu_map__);
__webpack_require__(0);


var detailBanner = __webpack_require__(14);
var houseDetailList = __webpack_require__(13);

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

// $('#popover').on('click || touchend', function () {
//   return false
// });
window.showInfo = function () {
  $('#collapse').toggleClass("mui-active");
};
// // 点击提交
$('#upload').on('click', function () {
  var name = $('#names').val(),
      tel = $('#tel').val(),
      telReg = /^[1][0-9]{10}$/;
  if (!name || name.trim() === '') {
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('请输入称谓');
    return false;
  }
  if (!telReg.test(tel)) {
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('请输入11位手机号');
    return false;
  }
  $('#backdrop').fadeOut(300);
  var source = whatBrowser();
  $.ajax({
    url: '/bespeaks',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      appellation: name,
      tel: tel,
      page_source: source + '房源详情页',
      source: source.substring(0, source.length - 1)
    },
    success: function success(data) {
      if (data.success) {
        $('#names').val('');
        $('#tel').val('');
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('信息提交成功，楚楼网30分钟内联系您');
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

},[104]);
>>>>>>> zxz

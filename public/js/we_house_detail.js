<<<<<<< HEAD
webpackJsonp([19],{101:function(e,t,o){e.exports=o(102)},102:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=o(1),n=(o.n(s),o(2)),a=(o.n(n),o(10)),c=o.n(a);window.$=window.jQuery=o(0),window.Vue=o(4);var u=o(13),i=o(11);new Vue({el:"#swiperBanner",components:{detailBanner:u},data:{imgList:JSON.parse($("#imgList").val())}}),Vue.use(c.a,{ak:"GNEfPXFcuuKglYSB8R45IzmhzfjKDclf"}),new Vue({el:"#VueBottomBox",components:{houseDetailList:i}}),$(".top").on("touchend",function(){$("#collapse").toggleClass("mui-active")}),$(document).on("touchend","#order",function(){$("#backdrop").fadeIn(300)}),$(document).on("touchend","#popover",function(){return!1}),$("#popover").on("touchend",".js_closes",function(){$("#backdrop").fadeOut(300)}),$(document).on("touchend",".js_closes",function(){$("#backdrop").fadeOut(300)}),$("#upload").on("touchend",function(){var e=$("#names").val(),t=$("#tel").val();return e&&""!==e.trim()?t&&""!==t.trim()?($("#backdrop").fadeOut(300),void $.ajax({url:"/bespeaks",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{appellation:e,tel:t},success:function(e){e.success?($("#names").val(""),$("#tel").val(""),Object(s.Toast)("提交成功")):Object(s.Toast)(e.message)},error:function(e){e.status<500?Object(s.Toast)(e.responseJSON.message):Object(s.Toast)("服务器出错")}})):(Object(s.Toast)("请输入电话"),!1):(Object(s.Toast)("请输入称谓"),!1)}),$(document).on("touchend",".js_collect",function(e){var t=$(e.currentTarget).find("img#collect1").is(":hidden"),o=$("input#house_id").val();t?$.ajax({url:"/del/"+o,type:"GET",success:function(e){e.success?(Object(s.Toast)("已取消收藏"),$("img#collect1").removeClass("mui-hidden"),$("img#collect2").addClass("mui-hidden")):Object(s.Toast)(e.message)},error:function(e){e.status<500?Object(s.Toast)(e.responseJSON.message):Object(s.Toast)("服务器出错")}}):$.ajax({url:"/collections",type:"POST",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{house_id:o},success:function(e){e.success?(Object(s.Toast)("收藏成功"),$("img#collect1").addClass("mui-hidden"),$("img#collect2").removeClass("mui-hidden")):Object(s.Toast)(e.message)},error:function(e){e.status<500?Object(s.Toast)(e.responseJSON.message):Object(s.Toast)("服务器出错")}})})}},[101]);
=======
webpackJsonp([19],{

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
$('.top').on('touchend', function () {
  $('#collapse').toggleClass("mui-active");
});
// 显示预约弹框
$(document).on('touchend', '#order', function () {
  $('#backdrop').fadeIn(300);
});
// 阻止冒泡
$(document).on('touchend', '#popover', function () {
  return false;
});
$('#popover').on('touchend', '.js_closes', function () {
  $('#backdrop').fadeOut(300);
});
// 关闭预约弹框
$(document).on('touchend', '.js_closes', function () {
  $('#backdrop').fadeOut(300);
});

// // 点击提交
$('#upload').on('touchend', function () {
  var name = $('#names').val(),
      tel = $('#tel').val();
  if (!name || name.trim() === '') {
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('请输入称谓');
    return false;
  }
  if (!tel || tel.trim() === '') {
    Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('请输入电话');
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
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])('提交成功');
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
$(document).on('touchend', '.js_collect', function (e) {
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
          $('img#collect1').hide();
          $('img#collect2').show();
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
          $('img#collect1').show();
          $('img#collect2').hide();
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
>>>>>>> origin/wanghao

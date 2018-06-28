<<<<<<< HEAD
webpackJsonp([22],{171:function(n,e,i){n.exports=i(172)},172:function(n,e,i){i(2);var o=void 0!==window.innerHeight?window.innerHeight:document.documentElement.clientHeight;$("#weixinTip").css({height:o}),$("a.js_down-btn").on("click",function(){if("micromessenger"==navigator.userAgent.toLowerCase().match(/MicroMessenger/i))return $("#weixinTip").show(),!1})}},[171]);
=======
webpackJsonp([22],{

/***/ 140:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(141);


/***/ }),

/***/ 141:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
function is_weixin() {
  var ua = navigator.userAgent.toLowerCase();
  if (ua.match(/MicroMessenger/i) == "micromessenger") {
    return true;
  } else {
    return false;
  }
}

var winHeight = typeof window.innerHeight !== 'undefined' ? window.innerHeight : document.documentElement.clientHeight;
$("#weixinTip").css({
  "height": winHeight
});
// 下载按钮监听事件
$('a.js_down-btn').on('click', function () {
  if (is_weixin()) {
    $("#weixinTip").show();
    return false;
  }
});

/***/ })

},[140]);
>>>>>>> origin/master

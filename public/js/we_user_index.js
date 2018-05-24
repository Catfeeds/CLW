<<<<<<< HEAD
webpackJsonp([9],{

/***/ 121:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(122);
=======
webpackJsonp([8],{

/***/ 109:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(110);
>>>>>>> origin/cyq


/***/ }),

<<<<<<< HEAD
/***/ 122:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
=======
/***/ 110:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
// 获取电话号码并处理
var tel = $('#tel').html();
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
$('#tel').html(newTel);
>>>>>>> origin/cyq
// 跳转至委托找房页面
$(document).on('touchend || tap', '#entrust', function () {
    window.location.href = '/user_find_house';
});
// 跳转至投放房源页面
$(document).on('touchend || tap', '#launch', function () {
    window.location.href = '/user_house_resources';
});
// 跳转至关于我们页面
$(document).on('touchend || tap', '#aboutUs', function () {
    window.location.href = '/user_about_us';
});
// 跳转至个人设置页面
$(document).on('touchend || tap', '#setting', function () {
    window.location.href = '/user_setting';
});
<<<<<<< HEAD

/***/ })

},[121]);
=======
// 跳转至我的收藏
$(document).on('touchend || tap', '#collection', function () {
    window.location.href = '/collections';
});
// 跳转至浏览器记录
$(document).on('touchend || tap', '#browse', function () {
    window.location.href = '/browse_records';
});

/***/ })

},[109]);
>>>>>>> origin/cyq

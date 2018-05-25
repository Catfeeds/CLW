webpackJsonp([12],{

/***/ 126:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(127);


/***/ }),

/***/ 127:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
// 获取电话号码并处理
var tel = $('#tel').html();
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
$('#tel').html(newTel);
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
// 跳转至我的收藏
$(document).on('touchend || tap', '#collection', function () {
    window.location.href = '/collections';
});
// 跳转至浏览器记录
$(document).on('touchend || tap', '#browse', function () {
    window.location.href = '/browse_records';
});
// 电话咨询
$(document).on('touchend || tap', '#consult', function () {
    window.location.href = 'tel://4000-580-888';
});

/***/ })

},[126]);
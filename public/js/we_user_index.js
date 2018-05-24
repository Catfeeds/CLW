webpackJsonp([10],{

/***/ 118:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(119);


/***/ }),

/***/ 119:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
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

/***/ })

},[118]);
webpackJsonp([5],{

/***/ 124:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(125);


/***/ }),

/***/ 125:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
// 跳转至修改密码页面
$(document).on('touchend || tap', '#revisePwd', function () {
    window.location.href = '/revise_password';
});
// 跳转至修改手机页面
$(document).on('touchend || tap', '#reviseTel', function () {
    window.location.href = '/old_tel_validate_view';
});
// 退出登录
$(document).on('touchend || tap', '.loginOut', function () {
    console.log('退出成功');
});

/***/ })

},[124]);
webpackJsonp([9],{

/***/ 124:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(125);


/***/ }),

/***/ 125:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
// 获取电话号码并处理
var tel = $('#tel').html();
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
$('#tel').html(newTel);

/***/ })

},[124]);
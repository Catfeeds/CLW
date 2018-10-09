webpackJsonp([12],{

/***/ 137:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(138);


/***/ }),

/***/ 138:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
// 获取电话号码并处理
var tel = $('#tel').html();
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
$('#tel').html(newTel);

/***/ })

},[137]);
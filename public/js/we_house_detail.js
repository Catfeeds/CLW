<<<<<<< HEAD
webpackJsonp([17],{

/***/ 103:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(104);
=======
webpackJsonp([16],{

/***/ 93:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(94);
>>>>>>> origin/cyq


/***/ }),

<<<<<<< HEAD
/***/ 104:
=======
/***/ 94:
>>>>>>> origin/cyq
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
// 显示或者隐藏栋座信息
$('.top').click(function () {
    $('#collapse').toggleClass("mui-active");
});
// 显示或者隐藏预约弹框
$('#order').click(function () {
    $('#popover').toggleClass('mui-popover');
});
// 关闭预约弹框
$('.closes').click(function () {
    $('#popover').addClass('mui-popover');
});
// 点击提交
$('#upload').click(function () {
    var name = $('#names').val();
    var tel = $('#tel').val();
    if (!name || name.trim() == '') {
        alert('请输入称谓');
    } else if (!tel || tel.trim() == '') {
        alert('请输入电话');
    } else {
        console.log('ceshi');
    }
});

/***/ })

<<<<<<< HEAD
},[103]);
=======
},[93]);
>>>>>>> origin/cyq

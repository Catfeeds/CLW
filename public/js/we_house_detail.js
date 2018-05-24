<<<<<<< HEAD
webpackJsonp([17],{91:function(o,c,l){o.exports=l(92)},92:function(o,c,l){window.$=window.jQuery=l(0),$(".top").click(function(){$("#collapse").toggleClass("mui-active")}),$("#order").click(function(){$("#popover").toggleClass("mui-popover")}),$(".closes").click(function(){$("#popover").addClass("mui-popover")}),$("#upload").click(function(){var o=$("#names").val(),c=$("#tel").val();o&&""!=o.trim()?c&&""!=c.trim()?console.log("ceshi"):alert("请输入电话"):alert("请输入称谓")})}},[91]);
=======
webpackJsonp([18],{

/***/ 98:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(99);


/***/ }),

/***/ 99:
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

},[98]);
>>>>>>> origin/cyq

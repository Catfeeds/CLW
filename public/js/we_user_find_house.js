<<<<<<< HEAD
webpackJsonp([11],{110:function(e,t,o){e.exports=o(111)},111:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=o(4),a=(o.n(n),o(3));o.n(a);window.$=window.jQuery=o(0),$(document).on("touchend || tap",".loginOut",function(){var e=$("#appellation").val(),t=$("#tel").val(),o=$("#requirement").val();e&&""!=e.trim()?t&&""!=t.trim()?$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/bespeaks",type:"post",data:{tel:t,appellation:e,demand:o},success:function(e){var t=Object(a.Toast)({message:e.message,position:"top",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},2e3)},error:function(e){Object(a.Toast)({message:e.responseJSON.message,position:"top",duration:5e3})}}):Object(a.Toast)({message:"请输入手机号码",position:"top",duration:2e3}):Object(a.Toast)({message:"请输入称谓",position:"top",duration:2e3})})}},[110]);
=======
webpackJsonp([12],{

/***/ 114:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(115);


/***/ }),

/***/ 115:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
window.$ = window.jQuery = __webpack_require__(0);


// 提交
$(document).on('touchend || tap', '.loginOut', function () {
    var appellation = $('#appellation').val();
    var tel = $('#tel').val();
    var demand = $('#requirement').val();
    if (!appellation || appellation.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入称谓',
            position: 'top',
            duration: 2000
        });
    } else if (!tel || tel.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'top',
            duration: 2000
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/bespeaks",
            type: 'post',
            data: {
                tel: tel,
                appellation: appellation,
                demand: demand
            },
            success: function success(data) {
                var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: data.message,
                    position: 'top',
                    duration: 5000
                });
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
                }, 2000);
            },
            error: function error(data) {
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: data.responseJSON.message,
                    position: 'top',
                    duration: 5000
                });
            }
        });
    }
});

/***/ })

},[114]);
>>>>>>> origin/cyq

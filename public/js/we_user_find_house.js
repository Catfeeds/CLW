<<<<<<< HEAD
webpackJsonp([11],{
=======
webpackJsonp([10],{
>>>>>>> origin/cyq

/***/ 121:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(122);


/***/ }),

/***/ 122:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
<<<<<<< HEAD
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


=======
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
>>>>>>> origin/cyq
__webpack_require__(0);


// 提交
$(document).on('click', '.loginOut button', function () {
    var appellation = $('#appellation').val();
    var tel = $('#tel').val();
    var demand = $('#requirement').val();
    if (!appellation || appellation.trim() == '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入称谓',
            position: 'center',
            duration: 2000
        });
    } else if (!tel || tel.trim() == '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
    } else {
        var source = whatBrowser();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/bespeaks",
            type: 'post',
            data: {
                tel: tel,
                appellation: appellation,
                demand: demand,
                page_source: source + '个人中心',
                source: source.substring(0, source.length - 1)
            },
            success: function success(data) {
<<<<<<< HEAD
                var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                    message: '信息提交成功，楚楼网30分钟内联系您',
                    position: 'center',
                    duration: 5000
                });
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
                }, 1000);
            },
            error: function error(res) {
<<<<<<< HEAD
                __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                    message: res.responseJSON.message,
                    position: 'center',
                    duration: 5000
                });
            }
        });
    }
});

/***/ })

},[121]);
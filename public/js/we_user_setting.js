webpackJsonp([6],{

/***/ 132:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(133);


/***/ }),

/***/ 133:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
window.$ = window.jQuery = __webpack_require__(0);


// 获取电话号码并处理
var tel = $('#tel').html();
console.log('ceshi', tel);
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
$('#tel').html(newTel);
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
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/logout",
        type: 'get',
        success: function success(data) {
            console.log(11111111);
            var toast = Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
                message: data.message,
                position: 'center',
                duration: 5000
            });
            setTimeout(function () {
                toast.close();
                window.location.href = '/user';
            }, 2000);
        },
        error: function error(data) {
            Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
                message: data.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
});

/***/ })

<<<<<<< HEAD
},[126]);
=======
},[132]);
>>>>>>> origin/zxz

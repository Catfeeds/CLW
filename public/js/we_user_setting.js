webpackJsonp([5],{

/***/ 136:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(137);


/***/ }),

/***/ 137:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


__webpack_require__(0);


// 获取电话号码并处理
var tel = $('#tel').html();
console.log('ceshi', tel);
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
$('#tel').html(newTel);
// 跳转至修改密码页面
// $(document).on('touchend || tap', '#revisePwd', function(){
//     window.location.href = '/revise_password'
// })
// 跳转至修改手机页面
// $(document).on('touchend || tap', '#reviseTel', function(){
//     window.location.href = '/old_tel_validate_view'
// })
// 退出登录
$(document).on('touchend || tap', '.loginOut', function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/logout",
        type: 'get',
        success: function success(data) {
            var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                message: data.message,
                position: 'center',
                duration: 5000
            });
            setTimeout(function () {
                toast.close();
                window.location.href = '/user';
            }, 1000);
        },
        error: function error(res) {
            __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
});

/***/ })

},[136]);
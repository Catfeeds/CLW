<<<<<<< HEAD
<<<<<<< HEAD
webpackJsonp([9],{
=======
webpackJsonp([8],{
>>>>>>> origin/wanghao

/***/ 130:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(131);
=======
webpackJsonp([7],{

/***/ 127:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(128);
>>>>>>> origin/cyq


/***/ }),

<<<<<<< HEAD
/***/ 131:
=======
/***/ 128:
>>>>>>> origin/cyq
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
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
>>>>>>> origin/cyq
__webpack_require__(0);


$(document).on('click', '.loginOut button', function () {
    var old_pwd = $('#oldPwd').val();
    var new_pwd = $('#newPwd').val();
    var confirmPwd = $('#confirmPwd').val();
    if (!old_pwd || old_pwd.trim() == '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入旧密码',
            position: 'center',
            duration: 2000
        });
    } else if (!new_pwd || new_pwd.trim() == '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入新密码',
            position: 'center',
            duration: 2000
        });
    } else if (!confirmPwd || confirmPwd.trim() == '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '确认密码不能为空',
            position: 'center',
            duration: 2000
        });
    } else if (old_pwd.length < 6 || old_pwd.length > 18) {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
    } else if (new_pwd.length < 6 || new_pwd.length > 18) {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
    } else if (new_pwd !== confirmPwd) {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '确认密码与新密码必须一致',
            position: 'center',
            duration: 2000
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/reset_pwd",
            type: 'post',
            data: {
                old_pwd: old_pwd,
                new_pwd: new_pwd
            },
            success: function success(data) {
<<<<<<< HEAD
                var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                var toast = Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
>>>>>>> origin/cyq
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
<<<<<<< HEAD
                __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
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

<<<<<<< HEAD
},[130]);
=======
},[127]);
>>>>>>> origin/cyq

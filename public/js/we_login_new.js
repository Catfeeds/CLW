<<<<<<< HEAD
webpackJsonp([16],{

/***/ 107:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(108);
=======
webpackJsonp([15],{

/***/ 97:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(98);
>>>>>>> origin/cyq


/***/ }),

<<<<<<< HEAD
/***/ 108:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
$(document).on('touchend || tap', '.loginBtn button', function (e) {
    var tel = $('#tel').val(),
        password = $('#password').val();
    // 隐藏键盘
    $('#tel').blur();
    $('#password')[0].blur();
    // 判断数据是否存在
    if (!tel || tel.trim() === '') {
        alert('请输入手机号码');
    } else if (!password || password.trim() === '') {
        alert('请输入密码');
    } else if (password.length < 6) {
        alert('密码最小长度为6');
    } else if (password.length > 18) {
        alert('密码最大长度为18');
=======
/***/ 98:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
window.$ = window.jQuery = __webpack_require__(0);


$(document).on('touchend || tap', '.loginBtn button', function (e) {
    var tel = $('#tel').val(),
        password = $('#password').val();
    // 判断数据是否存在
    if (!tel || tel.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'top',
            duration: 2000
        });
    } else if (!password || password.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入密码',
            position: 'top',
            duration: 2000
        });
    } else if (password.length < 6 || password.length > 18) {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '密码长度必须在6-18位之间',
            position: 'top',
            duration: 2000
        });
>>>>>>> origin/cyq
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/logins",
            type: 'post',
            data: {
                tel: tel,
                password: password
            },
            success: function success(data) {
                if (data.status) {
<<<<<<< HEAD
                    alert(data.message);
=======
                    Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                        message: data.message,
                        position: 'top',
                        duration: 2000
                    });
>>>>>>> origin/cyq
                    window.location.href = '/user';
                }
            },
            error: function error(data) {
<<<<<<< HEAD
                alert(data.responseJSON.message);
=======
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: data.responseJSON.message,
                    position: 'top',
                    duration: 2000
                });
>>>>>>> origin/cyq
            }
        });
    }
});

/***/ })

<<<<<<< HEAD
},[107]);
=======
},[97]);
>>>>>>> origin/cyq

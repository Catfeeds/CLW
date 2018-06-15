<<<<<<< HEAD
<<<<<<< HEAD
webpackJsonp([14],{
=======
webpackJsonp([13],{
>>>>>>> origin/cyq
=======
webpackJsonp([13],{
>>>>>>> origin/wanghao

/***/ 113:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(114);


/***/ }),

/***/ 114:
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
/**
 * Created by zxz1992 on 2018/5/22.
 */
__webpack_require__(0);


var tel = $('#tel'),
    sms = $('#sms'),
    password = $('#password'),
    time = $('#time'),
    getSms = $('#getSms'),
    getSmsType = true;

$(document).on('click', '#submit', function (e) {
    var tel_num = tel.val(),
        sms_num = sms.val(),
        password_num = password.val();
    if (!tel_num || tel_num.trim() === '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!sms_num || sms_num.trim() === '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入短信验证码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!password_num || password_num.trim() === '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入密码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (password_num.length < 6 || password_num.length > 18) {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    var data = { tel: tel_num, smsCode: sms_num, password: password_num };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/registers',
        type: 'post',
        data: data,
        success: function success(res) {
            if (res.success) {
<<<<<<< HEAD
                var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                    message: data.message,
                    position: 'center',
                    duration: 2000
                });
                window.location.href = '/user';
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
                }, 1000);
            } else {
<<<<<<< HEAD
                __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                    message: res.message,
                    position: 'center',
                    duration: 2000
                });
            }
        },
        error: function error(res) {
<<<<<<< HEAD
            __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            });
        }
    });
});
$(document).on('click', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!getSmsType) {
        return false;
    } else {
        getSmsType = false;
    }
    var pathStr = tel.val() + '/' + 'register';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/sms/captcha/' + pathStr,
        type: 'get',
        success: function success(res) {
            if (res.success) {
                getSmsType = false;
                getSms.html(120 + 's');
                var time = setInterval(function () {
                    getSms.html(parseInt(getSms.html()) - 1 + 's');
                    if (!parseInt(getSms.html())) {
                        getSms.html('获取验证码');
                        window.clearInterval(time);
                        getSmsType = true;
                    }
                }, 1000);
<<<<<<< HEAD
                __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                    message: '短信发送成功',
                    position: 'center',
                    duration: 2000
                });
            }
        },
        error: function error(res) {
            getSmsType = true;
<<<<<<< HEAD
            __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            });
        }
    });
});

/***/ })

},[113]);
webpackJsonp([16],{

/***/ 104:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(105);


/***/ }),

/***/ 105:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
window.$ = window.jQuery = __webpack_require__(0);


var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms'),
    password = $('#password');

$(document).on('touchend || tap', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    var pathStr = tel.val() + '/' + 'login';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/sms/captcha/' + pathStr,
        type: 'get',
        success: function success(res) {
            if (res.success) {
                getSms.html(120 + 's');
                var time = setInterval(function () {
                    getSms.html(parseInt(getSms.html()) - 1 + 's');
                    if (!parseInt(getSms.html())) {
                        getSms.html('获取验证码');
                        window.clearInterval(time);
                    }
                }, 1000);
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: '短信发送成功',
                    position: 'center',
                    duration: 2000
                });
            }
        },
        error: function error(res) {
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: responseJSON.message,
                position: 'center',
                duration: 2000
            });
        }
    });
});
$(document).on('touchend || tap', '.loginBtn button', function (e) {
    var tel_num = tel.val(),
        smsCode_num = smsCode.val(),
        password_num = password.val();

    if (!tel_num || tel_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!smsCode_num || smsCode_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入验证码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!password_num || password_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入密码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (password_num.length < 6 || password_num.length > 18) {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/retrieve_pwd",
        type: 'post',
        data: {
            tel: tel_num,
            smsCode: smsCode_num,
            password: password_num
        },
        success: function success(data) {
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: data.message,
                position: 'center',
                duration: 2000
            });
            if (data.status) {
                window.location.href = '/user';
            }
        },
        error: function error(data) {
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: data.responseJSON.message,
                position: 'center',
                duration: 2000
            });
        }
    });
});

/***/ })

},[104]);
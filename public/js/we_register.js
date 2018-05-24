<<<<<<< HEAD
webpackJsonp([12],{

/***/ 113:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(114);
=======
webpackJsonp([11],{

/***/ 103:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(104);
>>>>>>> origin/cyq


/***/ }),

<<<<<<< HEAD
/***/ 114:
/***/ (function(module, exports, __webpack_require__) {

=======
/***/ 104:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
>>>>>>> origin/cyq
/**
 * Created by zxz1992 on 2018/5/22.
 */
window.$ = window.jQuery = __webpack_require__(0);
<<<<<<< HEAD
=======


>>>>>>> origin/cyq
var tel = $('#tel'),
    sms = $('#sms'),
    password = $('#password'),
    time = $('#time'),
    getSms = $('#getSms');

$(document).on('touchend || tap', '#submit', function (e) {
    var tel_num = tel.val(),
        sms_num = tel.val(),
        password_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
<<<<<<< HEAD
        alert('请输入手机号码');
        return false;
    }
    if (!sms_num || sms_num.trim() === '') {
        alert('请输入短信验证码');
        return false;
    }
    if (!password_num || password_num.trim() === '') {
        alert('请输入密码');
        return false;
    }
    if (password_num.length < 6) {
        alert('密码最小长度为6');
        return false;
    }
    if (password_num.length > 18) {
        alert('密码最大长度为18');
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'top',
            duration: 2000
        });
        return false;
    }
    if (!sms_num || sms_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入短信验证码',
            position: 'top',
            duration: 2000
        });
        return false;
    }
    if (!password_num || password_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入密码',
            position: 'top',
            duration: 2000
        });
        return false;
    }
    if (password_num.length < 6 || password_num.length > 18) {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '密码长度必须在6-18位之间',
            position: 'top',
            duration: 2000
        });
>>>>>>> origin/cyq
        return false;
    }
    var data = { tel: tel_num, smsCode: sms_num, password: password_num };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'registers',
        type: 'post',
        success: function success(res) {
            if (res.status) {
<<<<<<< HEAD
                alert('登录成功');
            } else {
                alert(res.data.message);
            }
        },
        error: function error(res) {
            alert(responseJSON.message);
        }
    });
    request({
        url: 'registers',
        type: 'post',
        data: data
    }).then(function (res) {
        if (res.status) {
            alert('登录成功');
        } else {
            alert('res.data.message');
=======
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: '登录成功',
                    position: 'top',
                    duration: 2000
                });
                window.location.href = '/user';
            } else {
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: res.data.message,
                    position: 'top',
                    duration: 2000
                });
            }
        },
        error: function error(res) {
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: responseJSON.message,
                position: 'top',
                duration: 2000
            });
>>>>>>> origin/cyq
        }
    });
});
$(document).on('touchend || tap', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
<<<<<<< HEAD
        alert('请输入手机号码');
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'top',
            duration: 2000
        });
>>>>>>> origin/cyq
        return false;
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
                getSms.html(120 + 's');
                var time = setInterval(function () {
                    getSms.html(parseInt(getSms.html()) - 1 + 's');
                    if (!parseInt(getSms.html())) {
                        getSms.html('获取验证码');
                        window.clearInterval(time);
                    }
                }, 1000);
<<<<<<< HEAD
                alert('短信发送成功');
            }
        },
        error: function error(res) {
            alert(responseJSON.message);
=======
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: '短信发送成功',
                    position: 'top',
                    duration: 2000
                });
            }
        },
        error: function error(res) {
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: responseJSON.message,
                position: 'top',
                duration: 2000
            });
>>>>>>> origin/cyq
        }
    });
});

/***/ })

<<<<<<< HEAD
},[113]);
=======
},[103]);
>>>>>>> origin/cyq

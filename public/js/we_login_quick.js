<<<<<<< HEAD
webpackJsonp([14],{

/***/ 111:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(112);
=======
webpackJsonp([13],{

/***/ 101:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(102);
>>>>>>> origin/cyq


/***/ }),

<<<<<<< HEAD
/***/ 112:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
=======
/***/ 102:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
window.$ = window.jQuery = __webpack_require__(0);


>>>>>>> origin/cyq
var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms');
$(document).on('touchend || tap', '.loginBtn button', function (e) {
    var tel_num = tel.val(),
        smsCode_num = smsCode.val();

    if (!tel_num || tel_num.trim() === '') {
<<<<<<< HEAD
        alert('请输入手机号码');
        return false;
    }
    if (!smsCode_num || smsCode_num.trim() === '') {
        alert('请输入验证码');
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'top',
            duration: 2000
        });
        return false;
    }
    if (!smsCode_num || smsCode_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入验证码',
            position: 'top',
            duration: 2000
        });
>>>>>>> origin/cyq
        return false;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/quick_login",
        type: 'post',
        data: {
            tel: tel_num,
            smsCode: smsCode_num
        },
        success: function success(data) {
<<<<<<< HEAD
            alert(data.message);
=======
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: data.message,
                position: 'top',
                duration: 2000
            });
>>>>>>> origin/cyq
            if (data.status) {
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
});

$(document).on('touchend || tap', '#getSms', function (e) {
    var tel_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
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
    var pathStr = tel_num + '/' + 'login';
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
},[111]);
=======
},[101]);
>>>>>>> origin/cyq

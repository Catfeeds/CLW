<<<<<<< HEAD
<<<<<<< HEAD
webpackJsonp([17],{
=======
webpackJsonp([16],{
>>>>>>> origin/cyq
=======
webpackJsonp([16],{
>>>>>>> origin/wanghao

/***/ 111:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(112);


/***/ }),

/***/ 112:
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


var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms'),
    getSmsType = true;
$(document).on('click', '.loginBtn button', function (e) {
    var tel_num = tel.val(),
        smsCode_num = smsCode.val();

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
    if (!smsCode_num || smsCode_num.trim() === '') {
<<<<<<< HEAD
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
            message: '请输入验证码',
            position: 'center',
            duration: 2000
        });
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
            if (data.success) {
<<<<<<< HEAD
                var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
                var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                    message: data.message,
                    position: 'center',
                    duration: 2000
                });
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
                }, 1000);
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
    console.log('censhiceshi ');
    var tel_num = tel.val();
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
    var pathStr = tel_num + '/' + 'login';
    if (!getSmsType) {
        return false;
    } else {
        getSmsType = false;
    }
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
                        getSmsType = true;
                        getSms.html('获取验证码');
                        window.clearInterval(time);
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
//处理安卓兼容性问题
var height = window.innerHeight; //获取当前浏览器窗口高度
console.log(height);
$(window).resize(function () {
    if (window.innerHeight < height) {
        $('#agree').removeClass('agree'); //也可以在scss文件中写个类名
        $('#agree').addClass('active');
    } else {
        $('#agree').removeClass('active');
        $('#agree').addClass('agree');
    }
});

/***/ })

},[111]);
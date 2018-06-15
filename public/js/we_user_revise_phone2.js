<<<<<<< HEAD
<<<<<<< HEAD
webpackJsonp([7],{
=======
webpackJsonp([6],{
>>>>>>> origin/wanghao

/***/ 134:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(135);
=======
webpackJsonp([5],{

/***/ 131:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(132);
>>>>>>> origin/cyq


/***/ }),

<<<<<<< HEAD
/***/ 135:
=======
/***/ 132:
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
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
>>>>>>> origin/cyq
__webpack_require__(0);


var getSmsType = true;
// 获取验证码
$(document).on('click', '#getSms', function () {
    if (!getSmsType) {
        return false;
    } else {
        getSmsType = false;
    }
    var pathStr = tel + '/reset_tel';
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
// 修改电话号码
$(document).on('click', '.loginOut button', function () {
    var tel = $('#tel').val();
    var smsCode = $('#sms').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/reset_tel",
        type: 'post',
        data: {
            tel: tel,
            smsCode: smsCode
        },
        success: function success(data) {
<<<<<<< HEAD
            var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
=======
            var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
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
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
>>>>>>> origin/cyq
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
});

/***/ })

<<<<<<< HEAD
},[134]);
=======
},[131]);
>>>>>>> origin/cyq

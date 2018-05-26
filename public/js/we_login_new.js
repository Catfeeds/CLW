webpackJsonp([18],{

/***/ 106:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(107);


/***/ }),

/***/ 107:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
window.$ = window.jQuery = __webpack_require__(0);


$(document).on('click', '.loginBtn button', function (e) {
    var tel = $('#tel').val(),
        password = $('#password').val();
    // 判断数据是否存在
    if (!tel || tel.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
    } else if (!password || password.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入密码',
            position: 'center',
            duration: 2000
        });
    } else if (password.length < 6 || password.length > 18) {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
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
                if (data.success) {
                    var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                        message: data.message,
                        position: 'center',
                        duration: 5000
                    });
                    setTimeout(function () {
                        toast.close();
                        window.location.href = '/user';
                    }, 1000);
                }
            },
            error: function error(res) {
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: res.responseJSON.message,
                    position: 'center',
                    duration: 2000
                });
            }
        });
    }
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

},[106]);
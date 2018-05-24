<<<<<<< HEAD
webpackJsonp([14],{100:function(t,e,n){window.$=window.jQuery=n(0);var a=$("#tel"),r=$("#sms"),s=$("#getSms");$(document).on("touchend || tap",".loginBtn button",function(t){var e=a.val(),n=r.val();return e&&""!==e.trim()?n&&""!==n.trim()?void $.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/quick_login",type:"post",data:{tel:e,smsCode:n},success:function(t){alert(t.message),t.status&&(window.location.href="/user")},error:function(t){alert(t.responseJSON.message)}}):(alert("请输入验证码"),!1):(alert("请输入手机号码"),!1)}),$(document).on("touchend || tap","#getSms",function(t){var e=a.val();if(!e||""===e.trim())return alert("请输入手机号码"),!1;var n=e+"/login";$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+n,type:"get",success:function(t){if(t.success){s.html("120s");var e=setInterval(function(){s.html(parseInt(s.html())-1+"s"),parseInt(s.html())||(s.html("获取验证码"),window.clearInterval(e))},1e3);alert("短信发送成功")}},error:function(t){alert(responseJSON.message)}})})},99:function(t,e,n){t.exports=n(100)}},[99]);
=======
webpackJsonp([15],{

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


var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms');
$(document).on('touchend || tap', '.loginBtn button', function (e) {
    var tel_num = tel.val(),
        smsCode_num = smsCode.val();

    if (!tel_num || tel_num.trim() === '') {
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
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: data.message,
                position: 'top',
                duration: 2000
            });
            if (data.status) {
                window.location.href = '/user';
            }
        },
        error: function error(data) {
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: data.responseJSON.message,
                position: 'top',
                duration: 2000
            });
        }
    });
});

$(document).on('touchend || tap', '#getSms', function (e) {
    var tel_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'top',
            duration: 2000
        });
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
        }
    });
});

/***/ })

},[106]);
>>>>>>> origin/cyq

<<<<<<< HEAD
webpackJsonp([15],{112:function(e,t,s){e.exports=s(113)},113:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=s(2),o=(s.n(n),s(1));s.n(o);window.$=window.jQuery=s(0);var a=$("#tel"),r=$("#sms"),i=$("#password"),c=($("#time"),$("#getSms"));$(document).on("touchend || tap","#submit",function(e){var t=a.val(),s=r.val(),n=i.val();if(!t||""===t.trim())return Object(o.Toast)({message:"请输入手机号码",position:"center",duration:2e3}),!1;if(!s||""===s.trim())return Object(o.Toast)({message:"请输入短信验证码",position:"center",duration:2e3}),!1;if(!n||""===n.trim())return Object(o.Toast)({message:"请输入密码",position:"center",duration:2e3}),!1;if(n.length<6||n.length>18)return Object(o.Toast)({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}),!1;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"registers",type:"post",success:function(e){e.success?(Object(o.Toast)({message:"登录成功",position:"center",duration:2e3}),window.location.href="/user"):Object(o.Toast)({message:e.data.message,position:"center",duration:2e3})},error:function(e){Object(o.Toast)({message:responseJSON.message,position:"center",duration:2e3})}})}),$(document).on("touchend || tap","#getSms",function(e){if(!a.val()||""===a.val().trim())return Object(o.Toast)({message:"请输入手机号码",position:"center",duration:2e3}),!1;var t=a.val()+"/register";$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+t,type:"get",success:function(e){if(e.success){c.html("120s");var t=setInterval(function(){c.html(parseInt(c.html())-1+"s"),parseInt(c.html())||(c.html("获取验证码"),window.clearInterval(t))},1e3);Object(o.Toast)({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){Object(o.Toast)({message:e.message,position:"center",duration:2e3})}})})}},[112]);
=======
webpackJsonp([15],{

/***/ 114:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(115);


/***/ }),

/***/ 115:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
/**
 * Created by zxz1992 on 2018/5/22.
 */
window.$ = window.jQuery = __webpack_require__(0);


var tel = $('#tel'),
    sms = $('#sms'),
    password = $('#password'),
    time = $('#time'),
    getSms = $('#getSms');

$(document).on('touchend || tap', '#submit', function (e) {
    var tel_num = tel.val(),
        sms_num = sms.val(),
        password_num = password.val();
    if (!tel_num || tel_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!sms_num || sms_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入短信验证码',
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
    var data = { tel: tel_num, smsCode: sms_num, password: password_num };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'registers',
        type: 'post',
        success: function success(res) {
            if (res.success) {
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: '登录成功',
                    position: 'center',
                    duration: 2000
                });
                window.location.href = '/user';
            } else {
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: res.message,
                    position: 'center',
                    duration: 2000
                });
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
});
$(document).on('touchend || tap', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
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
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: '短信发送成功',
                    position: 'center',
                    duration: 2000
                });
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
});

/***/ })

},[114]);
>>>>>>> origin/wanghao

<<<<<<< HEAD
webpackJsonp([12],{101:function(t,e,r){t.exports=r(102)},102:function(t,e,r){window.$=window.jQuery=r(0);var a=$("#tel"),s=($("#sms"),$("#password"),$("#time"),$("#getSms"));$(document).on("touchend || tap","#submit",function(t){var e=a.val(),r=a.val(),s=a.val();if(!e||""===e.trim())return alert("请输入手机号码"),!1;if(!r||""===r.trim())return alert("请输入短信验证码"),!1;if(!s||""===s.trim())return alert("请输入密码"),!1;if(s.length<6)return alert("密码最小长度为6"),!1;if(s.length>18)return alert("密码最大长度为18"),!1;var n={tel:e,smsCode:r,password:s};$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"registers",type:"post",success:function(t){t.status?alert("登录成功"):alert(t.data.message)},error:function(t){alert(responseJSON.message)}}),request({url:"registers",type:"post",data:n}).then(function(t){t.status?alert("登录成功"):alert("res.data.message")})}),$(document).on("touchend || tap","#getSms",function(t){if(!a.val()||""===a.val().trim())return alert("请输入手机号码"),!1;var e=a.val()+"/register";$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+e,type:"get",success:function(t){if(t.success){s.html("120s");var e=setInterval(function(){s.html(parseInt(s.html())-1+"s"),parseInt(s.html())||(s.html("获取验证码"),window.clearInterval(e))},1e3);alert("短信发送成功")}},error:function(t){alert(responseJSON.message)}})})}},[101]);
=======
webpackJsonp([13],{

/***/ 108:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(109);


/***/ }),

/***/ 109:
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
        sms_num = tel.val(),
        password_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
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
        }
    });
});
$(document).on('touchend || tap', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'top',
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

},[108]);
>>>>>>> origin/cyq

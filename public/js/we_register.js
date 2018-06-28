<<<<<<< HEAD
webpackJsonp([15],{139:function(e,t,s){e.exports=s(140)},140:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=s(3),r=(s.n(n),s(4)),o=s.n(r),i=s(5);s.n(i);s(2);var a=$("#tel"),c=$("#sms"),u=$("#password"),m=($("#time"),$("#getSms")),l=!0;$(document).on("click","#submit",function(e){var t=a.val(),s=c.val(),n=u.val();if(!t||""===t.trim())return o()({message:"请输入手机号码",position:"center",duration:2e3}),!1;if(!s||""===s.trim())return o()({message:"请输入短信验证码",position:"center",duration:2e3}),!1;if(!n||""===n.trim())return o()({message:"请输入密码",position:"center",duration:2e3}),!1;if(n.length<6||n.length>18)return o()({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}),!1;var r={tel:t,smsCode:s,password:n};$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/registers",type:"post",data:r,success:function(e){if(e.success){var t=o()({message:r.message,position:"center",duration:2e3});window.location.href="/user",setTimeout(function(){t.close(),window.location.href="/user"},1e3)}else o()({message:e.message,position:"center",duration:2e3})},error:function(e){o()({message:e.responseJSON.message,position:"center",duration:2e3})}})}),$(document).on("click","#getSms",function(e){if(!a.val()||""===a.val().trim())return o()({message:"请输入手机号码",position:"center",duration:2e3}),!1;if(!l)return!1;l=!1;var t=a.val()+"/register";$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+t,type:"get",success:function(e){if(e.success){l=!1,m.html("120s");var t=setInterval(function(){m.html(parseInt(m.html())-1+"s"),parseInt(m.html())||(m.html("获取验证码"),window.clearInterval(t),l=!0)},1e3);o()({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){l=!0,o()({message:e.responseJSON.message,position:"center",duration:2e3})}})})}},[139]);
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
        url: '/registers',
        type: 'post',
        data: data,
        success: function success(res) {
            if (res.success) {
                var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
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
$(document).on('click', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
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
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: '短信发送成功',
                    position: 'center',
                    duration: 2000
                });
            }
        },
        error: function error(res) {
            getSmsType = true;
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
>>>>>>> origin/master

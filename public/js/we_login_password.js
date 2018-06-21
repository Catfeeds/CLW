<<<<<<< HEAD
webpackJsonp([19],{122:function(e,t,n){e.exports=n(123)},123:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=n(1),r=(n.n(s),n(3)),o=n.n(r),a=n(4);n.n(a);n(0);var i=$("#tel"),c=$("#sms"),u=$("#getSms"),m=$("#password"),l=!0;$(document).on("click","#getSms",function(e){if(!i.val()||""===i.val().trim())return o()({message:"请输入手机号码",position:"center",duration:2e3}),!1;if(!l)return!1;l=!1;var t=i.val()+"/retrieve_password";$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+t,type:"get",success:function(e){if(e.success){u.html("120s");var t=setInterval(function(){u.html(parseInt(u.html())-1+"s"),parseInt(u.html())||(l=!0,u.html("获取验证码"),window.clearInterval(t))},1e3);o()({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){l=!0,o()({message:e.responseJSON.message,position:"center",duration:2e3})}})}),$(document).on("click",".loginBtn button",function(e){var t=i.val(),n=c.val(),s=m.val();return t&&""!==t.trim()?n&&""!==n.trim()?s&&""!==s.trim()?s.length<6||s.length>18?(o()({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}),!1):void $.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/retrieve_pwd",type:"post",data:{tel:t,smsCode:n,password:s},success:function(e){if(e.success){var t=o()({message:e.message,position:"center",duration:2e3});setTimeout(function(){t.close(),window.location.href="/user"},1e3)}},error:function(e){o()({message:e.responseJSON.message,position:"center",duration:2e3})}}):(o()({message:"请输入密码",position:"center",duration:2e3}),!1):(o()({message:"请输入验证码",position:"center",duration:2e3}),!1):(o()({message:"请输入手机号码",position:"center",duration:2e3}),!1)})}},[122]);
=======
webpackJsonp([19],{

/***/ 123:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(124);


/***/ }),

/***/ 124:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


__webpack_require__(0);


var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms'),
    password = $('#password'),
    getSmsType = true;

$(document).on('click', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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
    var pathStr = tel.val() + '/' + 'retrieve_password';
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
                __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                    message: '短信发送成功',
                    position: 'center',
                    duration: 2000
                });
            }
        },
        error: function error(res) {
            getSmsType = true;
            __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            });
        }
    });
});
$(document).on('click', '.loginBtn button', function (e) {
    var tel_num = tel.val(),
        smsCode_num = smsCode.val(),
        password_num = password.val();

    if (!tel_num || tel_num.trim() === '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!smsCode_num || smsCode_num.trim() === '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '请输入验证码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!password_num || password_num.trim() === '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '请输入密码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (password_num.length < 6 || password_num.length > 18) {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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
            if (data.success) {
                var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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
            __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            });
        }
    });
});

/***/ })

},[123]);
>>>>>>> origin/master

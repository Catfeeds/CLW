<<<<<<< HEAD
webpackJsonp([18],{

/***/ 125:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(126);


/***/ }),

/***/ 126:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


__webpack_require__(1);


var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms'),
    getSmsType = true;
$(document).on('click', '.loginBtn button', function (e) {
    var tel_num = tel.val(),
        smsCode_num = smsCode.val();

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

$(document).on('click', '#getSms', function (e) {
    console.log('censhiceshi ');
    var tel_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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

},[125]);
=======
webpackJsonp([18],{124:function(e,n,t){e.exports=t(125)},125:function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var s=t(1),o=(t.n(s),t(3)),r=t.n(o),a=t(4);t.n(a);t(0);var i=$("#tel"),c=$("#sms"),u=$("#getSms"),l=!0;$(document).on("click",".loginBtn button",function(e){var n=i.val(),t=c.val();return n&&""!==n.trim()?t&&""!==t.trim()?void $.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/quick_login",type:"post",data:{tel:n,smsCode:t},success:function(e){if(e.success){var n=r()({message:e.message,position:"center",duration:2e3});setTimeout(function(){n.close(),window.location.href="/user"},1e3)}},error:function(e){r()({message:e.responseJSON.message,position:"center",duration:2e3})}}):(r()({message:"请输入验证码",position:"center",duration:2e3}),!1):(r()({message:"请输入手机号码",position:"center",duration:2e3}),!1)}),$(document).on("click","#getSms",function(e){console.log("censhiceshi ");var n=i.val();if(!n||""===n.trim())return r()({message:"请输入手机号码",position:"center",duration:2e3}),!1;var t=n+"/login";if(!l)return!1;l=!1,$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+t,type:"get",success:function(e){if(e.success){u.html("120s");var n=setInterval(function(){u.html(parseInt(u.html())-1+"s"),parseInt(u.html())||(l=!0,u.html("获取验证码"),window.clearInterval(n))},1e3);r()({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){l=!0,r()({message:e.responseJSON.message,position:"center",duration:2e3})}})});var m=window.innerHeight;console.log(m),$(window).resize(function(){window.innerHeight<m?($("#agree").removeClass("agree"),$("#agree").addClass("active")):($("#agree").removeClass("active"),$("#agree").addClass("agree"))})}},[124]);
>>>>>>> origin/zxz

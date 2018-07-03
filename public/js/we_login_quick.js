<<<<<<< HEAD
webpackJsonp([18],{

<<<<<<< HEAD
/***/ 138:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(139);
=======
/***/ 112:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(113);
>>>>>>> origin/wanghao


/***/ }),

<<<<<<< HEAD
/***/ 139:
=======
/***/ 113:
>>>>>>> origin/wanghao
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
__webpack_require__(0);


var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms'),
    getSmsType = true;
$(document).on('click', '.loginBtn button', function (e) {
    var tel_num = tel.val(),
        smsCode_num = smsCode.val();

    if (!tel_num || tel_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
        return false;
    }
    if (!smsCode_num || smsCode_num.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
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
                var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
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
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
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
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
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

<<<<<<< HEAD
},[138]);
=======
},[112]);
>>>>>>> origin/wanghao
=======
webpackJsonp([18],{111:function(e,t,s){e.exports=s(112)},112:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=s(2),o=(s.n(n),s(1));s.n(o);s(0);var a=$("#tel"),r=$("#sms"),i=$("#getSms"),c=!0;$(document).on("click",".loginBtn button",function(e){var t=a.val(),s=r.val();return t&&""!==t.trim()?s&&""!==s.trim()?void $.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/quick_login",type:"post",data:{tel:t,smsCode:s},success:function(e){if(e.success){var t=Object(o.Toast)({message:e.message,position:"center",duration:2e3});setTimeout(function(){t.close(),window.location.href="/user"},1e3)}},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:2e3})}}):(Object(o.Toast)({message:"请输入验证码",position:"center",duration:2e3}),!1):(Object(o.Toast)({message:"请输入手机号码",position:"center",duration:2e3}),!1)}),$(document).on("click","#getSms",function(e){console.log("censhiceshi ");var t=a.val();if(!t||""===t.trim())return Object(o.Toast)({message:"请输入手机号码",position:"center",duration:2e3}),!1;var s=t+"/login";if(!c)return!1;c=!1,$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+s,type:"get",success:function(e){if(e.success){i.html("120s");var t=setInterval(function(){i.html(parseInt(i.html())-1+"s"),parseInt(i.html())||(c=!0,i.html("获取验证码"),window.clearInterval(t))},1e3);Object(o.Toast)({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){c=!0,Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:2e3})}})});var u=window.innerHeight;console.log(u),$(window).resize(function(){window.innerHeight<u?($("#agree").removeClass("agree"),$("#agree").addClass("active")):($("#agree").removeClass("active"),$("#agree").addClass("agree"))})}},[111]);
>>>>>>> origin/zxz

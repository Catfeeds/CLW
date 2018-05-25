<<<<<<< HEAD
webpackJsonp([9],{130:function(e,t,s){e.exports=s(131)},131:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=s(2),o=(s.n(n),s(1));s.n(o);window.$=window.jQuery=s(0),$(document).on("touchend || tap","#getSms",function(){var e=tel+"/reset_tel";$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+e,type:"get",success:function(e){if(e.success){getSms.html("120s");var t=setInterval(function(){getSms.html(parseInt(getSms.html())-1+"s"),parseInt(getSms.html())||(getSms.html("获取验证码"),window.clearInterval(t))},1e3);Object(o.Toast)({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:2e3})}})}),$(document).on("touchend || tap",".loginOut",function(){var e=$("#tel").val(),t=$("#sms").val();$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/reset_tel",type:"post",data:{tel:e,smsCode:t},success:function(e){var t=Object(o.Toast)({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},2e3)},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})})}},[130]);
=======
webpackJsonp([6],{

/***/ 132:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(133);


/***/ }),

/***/ 133:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
window.$ = window.jQuery = __webpack_require__(0);


// 获取验证码
$(document).on('touchend || tap', '#getSms', function () {
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
// 修改电话号码
$(document).on('touchend || tap', '.loginOut', function () {
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
            var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: data.message,
                position: 'center',
                duration: 5000
            });
            setTimeout(function () {
                toast.close();
                window.location.href = '/user';
            }, 2000);
        },
        error: function error(res) {
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
});

/***/ })

},[132]);
>>>>>>> origin/lkt

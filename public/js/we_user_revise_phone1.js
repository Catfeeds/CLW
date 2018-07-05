<<<<<<< HEAD
webpackJsonp([8],{129:function(e,t,s){e.exports=s(130)},130:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=s(2),o=(s.n(n),s(1));s.n(o);s(0);var a=$(".tel").html(),c=a.slice(0,3)+"****"+a.slice(7),r=!0;$(".tel").html(c),$(document).on("click","#getSms",function(){var e=a+"/reset_tel";if(!r)return!1;r=!1,$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+e,type:"get",success:function(e){if(e.success){getSms.html("120s");var t=setInterval(function(){getSms.html(parseInt(getSms.html())-1+"s"),parseInt(getSms.html())||(r=!0,getSms.html("获取验证码"),window.clearInterval(t))},1e3);Object(o.Toast)({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){r=!0,Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:2e3})}})}),$(document).on("click",".loginOut button",function(){var e=$("#setSms").val();$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/old_tel_validate",type:"post",data:{tel:a,smsCode:e},success:function(e){var t=Object(o.Toast)({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/reset_tel_view"},1e3)},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})})}},[129]);
=======
webpackJsonp([8],{

/***/ 130:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(131);


/***/ }),

/***/ 131:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
__webpack_require__(0);


// 获取电话号码并处理
var tel = $('.tel').html();
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
var getSmsType = true;
$('.tel').html(newTel);
// 获取验证码
$(document).on('click', '#getSms', function () {
    var pathStr = tel + '/reset_tel';
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
// 跳转至下一步
$(document).on('click', '.loginOut button', function () {
    var smsCode = $('#setSms').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/old_tel_validate",
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
                window.location.href = '/reset_tel_view';
            }, 1000);
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

},[130]);
>>>>>>> origin/wanghao

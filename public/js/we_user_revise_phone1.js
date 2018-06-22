<<<<<<< HEAD
webpackJsonp([9],{

/***/ 146:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(147);


/***/ }),

/***/ 147:
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
            var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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
            __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
});

/***/ })

},[146]);
=======
webpackJsonp([9],{145:function(e,t,s){e.exports=s(146)},146:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=s(1),o=(s.n(n),s(3)),a=s.n(o),r=s(4);s.n(r);s(0);var c=$(".tel").html(),i=c.slice(0,3)+"****"+c.slice(7),l=!0;$(".tel").html(i),$(document).on("click","#getSms",function(){var e=c+"/reset_tel";if(!l)return!1;l=!1,$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+e,type:"get",success:function(e){if(e.success){getSms.html("120s");var t=setInterval(function(){getSms.html(parseInt(getSms.html())-1+"s"),parseInt(getSms.html())||(l=!0,getSms.html("获取验证码"),window.clearInterval(t))},1e3);a()({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){l=!0,a()({message:e.responseJSON.message,position:"center",duration:2e3})}})}),$(document).on("click",".loginOut button",function(){var e=$("#setSms").val();$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/old_tel_validate",type:"post",data:{tel:c,smsCode:e},success:function(e){var t=a()({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/reset_tel_view"},1e3)},error:function(e){a()({message:e.responseJSON.message,position:"center",duration:5e3})}})})}},[145]);
>>>>>>> origin/zxz

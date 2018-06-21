<<<<<<< HEAD
webpackJsonp([10],{143:function(e,n,t){e.exports=t(144)},144:function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var o=t(1),s=(t.n(o),t(3)),i=t.n(s),r=t(4);t.n(r);t(0),$(document).on("click",".loginOut button",function(){var e=$("#oldPwd").val(),n=$("#newPwd").val(),t=$("#confirmPwd").val();e&&""!=e.trim()?n&&""!=n.trim()?t&&""!=t.trim()?e.length<6||e.length>18?i()({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):n.length<6||n.length>18?i()({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):n!==t?i()({message:"确认密码与新密码必须一致",position:"center",duration:2e3}):$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/reset_pwd",type:"post",data:{old_pwd:e,new_pwd:n},success:function(e){var n=i()({message:e.message,position:"center",duration:5e3});setTimeout(function(){n.close(),window.location.href="/user"},1e3)},error:function(e){i()({message:e.responseJSON.message,position:"center",duration:5e3})}}):i()({message:"确认密码不能为空",position:"center",duration:2e3}):i()({message:"请输入新密码",position:"center",duration:2e3}):i()({message:"请输入旧密码",position:"center",duration:2e3})})}},[143]);
=======
webpackJsonp([10],{

/***/ 144:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(145);


/***/ }),

/***/ 145:
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


$(document).on('click', '.loginOut button', function () {
    var old_pwd = $('#oldPwd').val();
    var new_pwd = $('#newPwd').val();
    var confirmPwd = $('#confirmPwd').val();
    if (!old_pwd || old_pwd.trim() == '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '请输入旧密码',
            position: 'center',
            duration: 2000
        });
    } else if (!new_pwd || new_pwd.trim() == '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '请输入新密码',
            position: 'center',
            duration: 2000
        });
    } else if (!confirmPwd || confirmPwd.trim() == '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '确认密码不能为空',
            position: 'center',
            duration: 2000
        });
    } else if (old_pwd.length < 6 || old_pwd.length > 18) {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
    } else if (new_pwd.length < 6 || new_pwd.length > 18) {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
    } else if (new_pwd !== confirmPwd) {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '确认密码与新密码必须一致',
            position: 'center',
            duration: 2000
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/reset_pwd",
            type: 'post',
            data: {
                old_pwd: old_pwd,
                new_pwd: new_pwd
            },
            success: function success(data) {
                var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                    message: data.message,
                    position: 'center',
                    duration: 5000
                });
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
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
    }
});

/***/ })

},[144]);
>>>>>>> origin/master

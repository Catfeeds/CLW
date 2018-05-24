<<<<<<< HEAD
webpackJsonp([8],{116:function(t,e,o){t.exports=o(117)},117:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=o(3),n=(o.n(s),o(4));o.n(n);window.$=window.jQuery=o(0),$(document).on("touchend || tap",".loginOut",function(){var t=$("#oldPwd").val(),e=$("#newPwd").val(),o=$("#confirmPwd").val();t&&""!=t.trim()?e&&""!=e.trim()?o&&""!=o.trim()?t.length<6||t.length>18?Object(s.Toast)({message:"密码长度必须在6-18位之间",position:"top",duration:2e3}):e.length<6||e.length>18?Object(s.Toast)({message:"密码长度必须在6-18位之间",position:"top",duration:2e3}):e!==o?Object(s.Toast)({message:"确认密码与新密码必须一致",position:"top",duration:2e3}):$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/reset_pwd",type:"post",data:{old_pwd:t,new_pwd:e},success:function(t){var e=Object(s.Toast)({message:t.message,position:"top",duration:5e3});setTimeout(function(){e.close()},2e3)},error:function(t){Object(s.Toast)({message:t.responseJSON.message,position:"top",duration:5e3})}}):Object(s.Toast)({message:"确认密码不能为空",position:"top",duration:2e3}):Object(s.Toast)({message:"请输入新密码",position:"top",duration:2e3}):Object(s.Toast)({message:"请输入旧密码",position:"top",duration:2e3})})}},[116]);
=======
webpackJsonp([9],{

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(121);


/***/ }),

/***/ 121:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
window.$ = window.jQuery = __webpack_require__(0);


$(document).on('touchend || tap', '.loginOut', function () {
    var old_pwd = $('#oldPwd').val();
    var new_pwd = $('#newPwd').val();
    var confirmPwd = $('#confirmPwd').val();
    if (!old_pwd || old_pwd.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入旧密码',
            position: 'top',
            duration: 2000
        });
    } else if (!new_pwd || new_pwd.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入新密码',
            position: 'top',
            duration: 2000
        });
    } else if (!confirmPwd || confirmPwd.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '确认密码不能为空',
            position: 'top',
            duration: 2000
        });
    } else if (old_pwd.length < 6 || old_pwd.length > 18) {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '密码长度必须在6-18位之间',
            position: 'top',
            duration: 2000
        });
    } else if (new_pwd.length < 6 || new_pwd.length > 18) {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '密码长度必须在6-18位之间',
            position: 'top',
            duration: 2000
        });
    } else if (new_pwd !== confirmPwd) {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '确认密码与新密码必须一致',
            position: 'top',
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
                var toast = Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
                    message: data.message,
                    position: 'top',
                    duration: 5000
                });
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
                }, 2000);
            },
            error: function error(data) {
                Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
                    message: data.responseJSON.message,
                    position: 'top',
                    duration: 5000
                });
            }
        });
    }
});

/***/ })

},[120]);
>>>>>>> origin/cyq

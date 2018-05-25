<<<<<<< HEAD
webpackJsonp([19],{106:function(e,t,o){e.exports=o(107)},107:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=o(2),s=(o.n(n),o(1));o.n(s);window.$=window.jQuery=o(0),$(document).on("touchend || tap",".loginBtn button",function(e){var t=$("#tel").val(),o=$("#password").val();t&&""!==t.trim()?o&&""!==o.trim()?o.length<6||o.length>18?Object(s.Toast)({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/logins",type:"post",data:{tel:t,password:o},success:function(e){if(e.success){var t=Object(s.Toast)({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},2e3)}},error:function(e){Object(s.Toast)({message:e.message,position:"center",duration:2e3})}}):Object(s.Toast)({message:"请输入密码",position:"center",duration:2e3}):Object(s.Toast)({message:"请输入手机号码",position:"center",duration:2e3})})}},[106]);
=======
webpackJsonp([19],{

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
window.$ = window.jQuery = __webpack_require__(0);


$(document).on('touchend || tap', '.loginBtn button', function (e) {
    var tel = $('#tel').val(),
        password = $('#password').val();
    // 判断数据是否存在
    if (!tel || tel.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
    } else if (!password || password.trim() === '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入密码',
            position: 'center',
            duration: 2000
        });
    } else if (password.length < 6 || password.length > 18) {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/logins",
            type: 'post',
            data: {
                tel: tel,
                password: password
            },
            success: function success(data) {
                if (data.success) {
                    var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                        message: data.message,
                        position: 'center',
                        duration: 5000
                    });
                    setTimeout(function () {
                        toast.close();
                        window.location.href = '/user';
                    }, 2000);
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
    }
});

/***/ })

},[108]);
>>>>>>> origin/wanghao

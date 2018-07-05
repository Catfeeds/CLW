<<<<<<< HEAD
webpackJsonp([20],{107:function(e,o,n){e.exports=n(108)},108:function(e,o,n){"use strict";Object.defineProperty(o,"__esModule",{value:!0});var s=n(2),t=(n.n(s),n(1));n.n(t);n(0),console.log(i("house_id")),$(document).on("click",".loginBtn button",function(e){var o=$("#tel").val(),n=$("#password").val();o&&""!==o.trim()?n&&""!==n.trim()?n.length<6||n.length>18?Object(t.Toast)({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/logins",type:"post",data:{tel:o,password:n},success:function(e){if(e.success){var o=Object(t.Toast)({message:e.message,position:"center",duration:5e3});console.log(window.location.search),setTimeout(function(){o.close(),null!==i("house_id")?window.location.href="/houses/"+i("house_id"):window.location.href="/user"},1e3)}},error:function(e){Object(t.Toast)({message:e.responseJSON.message,position:"center",duration:2e3})}}):Object(t.Toast)({message:"请输入密码",position:"center",duration:2e3}):Object(t.Toast)({message:"请输入手机号码",position:"center",duration:2e3})});var a=window.innerHeight;function i(e){var o=new RegExp("(^|&)"+e+"=([^&]*)(&|$)"),n=window.location.search.substr(1).match(o);return null!=n?unescape(n[2]):null}console.log(a),$(window).resize(function(){window.innerHeight<a?($("#agree").removeClass("agree"),$("#agree").addClass("active")):($("#agree").removeClass("active"),$("#agree").addClass("agree"))})}},[107]);
=======
webpackJsonp([20],{

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
__webpack_require__(0);


console.log(getValue('house_id'));
$(document).on('click', '.loginBtn button', function (e) {
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
                    console.log(window.location.search);
                    setTimeout(function () {
                        toast.close();
                        if (getValue('house_id') !== null) {
                            window.location.href = '/houses/' + getValue('house_id');
                        } else {
                            window.location.href = '/user';
                        }
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
    }
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

// 获取url指定参数值
function getValue(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);return null;
}

/***/ })

},[108]);
>>>>>>> origin/wanghao

webpackJsonp([20],{

<<<<<<< HEAD
/***/ 134:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(135);
=======
/***/ 133:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(134);
>>>>>>> origin/wanghao


/***/ }),

<<<<<<< HEAD
/***/ 135:
=======
/***/ 134:
>>>>>>> origin/wanghao
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__ = __webpack_require__(5);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui_lib_style_css__);


__webpack_require__(2);


console.log(getValue('house_id'));
$(document).on('click', '.loginBtn button', function (e) {
    var tel = $('#tel').val(),
        password = $('#password').val();
    // 判断数据是否存在
    if (!tel || tel.trim() === '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
    } else if (!password || password.trim() === '') {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
            message: '请输入密码',
            position: 'center',
            duration: 2000
        });
    } else if (password.length < 6 || password.length > 18) {
        __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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
                    var toast = __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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
                __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
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

<<<<<<< HEAD
},[134]);
=======
},[133]);
>>>>>>> origin/wanghao

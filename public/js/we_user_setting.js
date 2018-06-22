<<<<<<< HEAD
webpackJsonp([7],{

/***/ 150:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(151);


/***/ }),

/***/ 151:
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
var tel = $('#tel').html();
console.log('ceshi', tel);
var newTel = tel.slice(0, 3) + '****' + tel.slice(7);
$('#tel').html(newTel);
// 跳转至修改密码页面
// $(document).on('touchend || tap', '#revisePwd', function(){
//     window.location.href = '/revise_password'
// })
// 跳转至修改手机页面
// $(document).on('touchend || tap', '#reviseTel', function(){
//     window.location.href = '/old_tel_validate_view'
// })
// 退出登录
$(document).on('touchend || tap', '.loginOut', function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/logout",
        type: 'get',
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
});

/***/ })

},[150]);
=======
webpackJsonp([7],{149:function(e,t,n){e.exports=n(150)},150:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=n(1),s=(n.n(o),n(3)),c=n.n(s),r=n(4);n.n(r);n(0);var i=$("#tel").html();console.log("ceshi",i);var a=i.slice(0,3)+"****"+i.slice(7);$("#tel").html(a),$(document).on("touchend || tap",".loginOut",function(){$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/logout",type:"get",success:function(e){var t=c()({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},1e3)},error:function(e){c()({message:e.responseJSON.message,position:"center",duration:5e3})}})})}},[149]);
>>>>>>> origin/zxz

<<<<<<< HEAD
webpackJsonp([12],{147:function(e,t,n){e.exports=n(148)},148:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=n(3),s=(n.n(o),n(4)),a=n.n(s),r=n(5);n.n(r);n(2),$(document).on("click",".loginOut button",function(){var e=$("#appellation").val(),t=$("#tel").val(),n=$("#requirement").val();if(e&&""!=e.trim())if(t&&""!=t.trim()){var o=whatBrowser();$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/bespeaks",type:"post",data:{tel:t,appellation:e,demand:n,page_source:o+"个人中心",source:o.substring(0,o.length-1)},success:function(e){var t=a()({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},1e3)},error:function(e){a()({message:e.responseJSON.message,position:"center",duration:5e3})}})}else a()({message:"请输入手机号码",position:"center",duration:2e3});else a()({message:"请输入称谓",position:"center",duration:2e3})})}},[147]);
=======
webpackJsonp([12],{

/***/ 122:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(123);


/***/ }),

/***/ 123:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);
__webpack_require__(0);


// 提交
$(document).on('click', '.loginOut button', function () {
    var appellation = $('#appellation').val();
    var tel = $('#tel').val();
    var demand = $('#requirement').val();
    if (!appellation || appellation.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入称谓',
            position: 'center',
            duration: 2000
        });
    } else if (!tel || tel.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        });
    } else {
        var source = whatBrowser();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/bespeaks",
            type: 'post',
            data: {
                tel: tel,
                appellation: appellation,
                demand: demand,
                page_source: source + '个人中心',
                source: source.substring(0, source.length - 1)
            },
            success: function success(data) {
                var toast = Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: '信息提交成功，楚楼网30分钟内联系您',
                    position: 'center',
                    duration: 5000
                });
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
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
    }
});

/***/ })

},[122]);
>>>>>>> origin/master

<<<<<<< HEAD
webpackJsonp([10],{112:function(e,t,o){e.exports=o(113)},113:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=o(3),n=(o.n(a),o(4));o.n(n);window.$=window.jQuery=o(0),window.Vue=o(2),Vue.component(a.Picker.name,a.Picker);var i="",s=new Vue({el:"#picker",data:{value:"武昌区",slots:[{values:[]}],area_id:1},methods:{onValuesChange:function(e,t){this.value=t[0],""!==i&&(this.area_id=i[t[0]])}}});$.ajax({url:"/get_area",type:"get",success:function(e){s.slots[0].values=e.res,i=e.option},error:function(e){}}),$(document).on("touchend || tap","#down",function(){$("#picker").show()}),$(document).on("touchend || tap","#cancel",function(){$("#picker").hide()}),$(document).on("touchend || tap","#confirm",function(){$("#picker").hide(),$("#title").html(s.value)}),$(document).on("touchend || tap",".loginOut",function(){console.log(s.area_id);var e=$("#appellation").val(),t=$("#tel").val(),o=$("#acreage").val(),n=$("#buildingName").val();e&&""!=e.trim()?t&&""!=t.trim()?s.area_id?o&&""!=o.trim()?n&&""!=n.trim()?$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/throw_ins",type:"post",data:{tel:t,appellation:e,building_name:n,area_id:s.area_id,acreage:o},success:function(e){var t=Object(a.Toast)({message:e.message,position:"top",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},2e3)},error:function(e){Object(a.Toast)({message:e.responseJSON.message,position:"top",duration:5e3})}}):Object(a.Toast)({message:"请输入楼盘名称",position:"top",duration:2e3}):Object(a.Toast)({message:"请输入面积",position:"top",duration:2e3}):Object(a.Toast)({message:"请选择区域",position:"top",duration:2e3}):Object(a.Toast)({message:"请输入电话",position:"top",duration:2e3}):Object(a.Toast)({message:"请输入称谓",position:"top",duration:2e3})})}},[112]);
=======
webpackJsonp([11],{

/***/ 116:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(117);


/***/ }),

/***/ 117:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);


Vue.component(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Picker"].name, __WEBPACK_IMPORTED_MODULE_0_mint_ui__["Picker"]);
var option = '';
var app = new Vue({
    el: '#picker',
    data: {
        value: '武昌区',
        slots: [{ values: [] }],
        area_id: 1
    },
    methods: {
        onValuesChange: function onValuesChange(picker, values) {
            this.value = values[0];
            if (option !== '') {
                // console.log('aaaaaa', option[values[0]])
                this.area_id = option[values[0]];
            }
        }
    }
});
$.ajax({
    url: '/get_area',
    type: 'get',
    success: function success(res) {
        app.slots[0].values = res.res;
        option = res.option;
    },
    error: function error(res) {}
});
// 点击显示picker
$(document).on('touchend || tap', '#down', function () {
    $('#picker').show();
});
// 点击取消隐藏picker
$(document).on('touchend || tap', '#cancel', function () {
    $('#picker').hide();
});
// 点击确认
$(document).on('touchend || tap', '#confirm', function () {
    $('#picker').hide();
    $('#title').html(app.value);
});
// 确认
$(document).on('touchend || tap', '.loginOut', function () {
    console.log(app.area_id);
    var appellation = $('#appellation').val();
    var tel = $('#tel').val();
    var acreage = $('#acreage').val();
    var building_name = $('#buildingName').val();
    if (!appellation || appellation.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入称谓',
            position: 'top',
            duration: 2000
        });
    } else if (!tel || tel.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入电话',
            position: 'top',
            duration: 2000
        });
    } else if (!app.area_id) {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请选择区域',
            position: 'top',
            duration: 2000
        });
    } else if (!acreage || acreage.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入面积',
            position: 'top',
            duration: 2000
        });
    } else if (!building_name || building_name.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入楼盘名称',
            position: 'top',
            duration: 2000
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/throw_ins",
            type: 'post',
            data: {
                tel: tel,
                appellation: appellation,
                building_name: building_name,
                area_id: app.area_id,
                acreage: acreage
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

},[116]);
>>>>>>> origin/cyq

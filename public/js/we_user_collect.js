<<<<<<< HEAD
webpackJsonp([12],{117:function(e,t,o){e.exports=o(118)},118:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=o(12),n=o.n(a),s=o(2),i=(o.n(s),o(1));o.n(i);window.$=window.jQuery=o(0),window.Vue=o(4);var l=JSON.parse($("#pageOne").val()),r=new Vue({el:"#houseList",data:{list:[],page:2},components:{houseList:n.a}});if(1===Math.ceil(l.total/l.per_page)&&$(".more").hide(),l.data.length)for(var c in l.data)r.list.push(l.data[c].office_building_house);else console.log(2),$(".more").hide();$(document).on("touchstart",".more button",function(e){var t="/ajax_collections?page="+r.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:t,type:"get",success:function(e){for(var t in e.data)r.list.push(e.data[t].office_building_house);console.log(Math.ceil(e.total/e.per_page)),console.log(r.page),console.log(Math.ceil(e.total/e.per_page)===r.page),Math.ceil(e.total/e.per_page)===r.page&&$(".more").hide(),r.page=r.page+1},error:function(e){Object(i.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}),0!==r.list.length?$("#nothing").hide():0==r.list.length&&$("#nothing").show()}},[117]);
=======
webpackJsonp([12],{

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(121);


/***/ }),

/***/ 121:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui__);
/**
 * Created by wh on 2018/5/24.
 */
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);



var pageOne = JSON.parse($('#pageOne').val());
var app = new Vue({
    el: '#houseList',
    data: {
        list: [],
        page: 2
    },
    components: {
        houseList: __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default.a
    }
});
if (Math.ceil(pageOne.total / pageOne.per_page) === 1) $('.more').hide();
if (pageOne.data.length) {
    for (var key in pageOne.data) {
        app.list.push(pageOne.data[key].office_building_house);
    }
} else {
    console.log(2);
    $('.more').hide();
}
$(document).on('touchstart', '.more button', function (e) {
    var url = '/ajax_collections?page=' + app.page;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'get',
        success: function success(data) {
            for (var key in data.data) {
                app.list.push(data.data[key].office_building_house);
            }
            console.log(Math.ceil(data.total / data.per_page));
            console.log(app.page);
            console.log(Math.ceil(data.total / data.per_page) === app.page);
            if (Math.ceil(data.total / data.per_page) === app.page) {
                $('.more').hide();
            }
            app.page = app.page + 1;
        },
        error: function error(res) {
            Object(__WEBPACK_IMPORTED_MODULE_2_mint_ui__["Toast"])({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
});

/***/ })

},[120]);
>>>>>>> origin/wanghao

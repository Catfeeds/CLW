<<<<<<< HEAD
webpackJsonp([13],{145:function(t,e,a){t.exports=a(146)},146:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a(3),n=(a.n(s),a(4)),o=a.n(n),i=a(13),r=a.n(i),u=a(5);a.n(u);a(2);var g=JSON.parse($("#pageOne").val()),p=new Vue({el:"#houseList",data:{list:[],page:2,getData:!1,status:!1,prompt:!1},components:{houseList:r.a}});if(g.data.length){for(var c in g.data)p.list.push(g.data[c].office_building_house);1!==Math.ceil(g.total/g.per_page)&&(p.getData=!0,p.status=!0)}else p.getData=!1,p.status=!1;$(document).on("click",".more button",function(t){p.getData=!1;var e="/ajax_collections?page="+p.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:e,type:"get",success:function(t){if(p.status=!1,t.success){for(var e in t.data.data)p.list.push(t.data.data[e].office_building_house);Math.ceil(t.data.total/t.data.per_page)===p.page?(p.getData=!1,p.status=!1,p.prompt=!0):p.getData=!0}else o()({message:t.message,position:"center",duration:1e3});p.page=p.page+1},error:function(t){o()({message:t.responseJSON.message,position:"center",duration:5e3})}})}),0!==p.list.length?$("#nothing").hide():0==p.list.length&&$("#nothing").show()}},[145]);
=======
webpackJsonp([13],{

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(121);


/***/ }),

/***/ 121:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(10);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui__);
/**
 * Created by wh on 2018/5/24.
 */
__webpack_require__(0);



var pageOne = JSON.parse($('#pageOne').val());
var app = new Vue({
    el: '#houseList',
    data: {
        list: [],
        page: 2,
        getData: false,
        status: false,
        prompt: false
    },
    components: {
        houseList: __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default.a
    }
});
if (pageOne.data.length) {
    for (var key in pageOne.data) {
        app.list.push(pageOne.data[key].office_building_house);
    }
    if (Math.ceil(pageOne.total / pageOne.per_page) !== 1) {
        app.getData = true;
        app.status = true;
    }
} else {
    app.getData = false;
    app.status = false;
}
$(document).on('click', '.more button', function (e) {
    app.getData = false;
    var url = '/ajax_collections?page=' + app.page;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'get',
        success: function success(data) {
            app.status = false;
            if (data.success) {
                for (var key in data.data.data) {
                    app.list.push(data.data.data[key].office_building_house);
                }
                if (Math.ceil(data.data.total / data.data.per_page) === app.page) {
                    app.getData = false;
                    app.status = false;
                    app.prompt = true;
                } else {
                    app.getData = true;
                }
            } else {
                Object(__WEBPACK_IMPORTED_MODULE_2_mint_ui__["Toast"])({
                    message: data.message,
                    position: 'center',
                    duration: 1000
                });
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
// 无数据显示
if (app.list.length !== 0) {
    $('#nothing').hide();
} else if (app.list.length == 0) {
    $('#nothing').show();
}

/***/ })

},[120]);
>>>>>>> zxz

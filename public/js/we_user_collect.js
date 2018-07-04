<<<<<<< HEAD
webpackJsonp([13],{

<<<<<<< HEAD
/***/ 146:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(147);
=======
/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(121);
>>>>>>> origin/wanghao


/***/ }),

<<<<<<< HEAD
/***/ 147:
=======
/***/ 121:
>>>>>>> origin/wanghao
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

<<<<<<< HEAD
},[146]);
=======
},[120]);
>>>>>>> origin/wanghao
=======
webpackJsonp([13],{119:function(t,e,a){t.exports=a(120)},120:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a(10),n=a.n(s),o=a(2),i=(a.n(o),a(1));a.n(i);a(0);var r=JSON.parse($("#pageOne").val()),u=new Vue({el:"#houseList",data:{list:[],page:2,getData:!1,status:!1,prompt:!1},components:{houseList:n.a}});if(r.data.length){for(var c in r.data)u.list.push(r.data[c].office_building_house);1!==Math.ceil(r.total/r.per_page)&&(u.getData=!0,u.status=!0)}else u.getData=!1,u.status=!1;$(document).on("click",".more button",function(t){u.getData=!1;var e="/ajax_collections?page="+u.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:e,type:"get",success:function(t){if(u.status=!1,t.success){for(var e in t.data.data)u.list.push(t.data.data[e].office_building_house);Math.ceil(t.data.total/t.data.per_page)===u.page?(u.getData=!1,u.status=!1,u.prompt=!0):u.getData=!0}else Object(i.Toast)({message:t.message,position:"center",duration:1e3});u.page=u.page+1},error:function(t){Object(i.Toast)({message:t.responseJSON.message,position:"center",duration:5e3})}})}),0!==u.list.length?$("#nothing").hide():0==u.list.length&&$("#nothing").show()}},[119]);
>>>>>>> origin/zxz

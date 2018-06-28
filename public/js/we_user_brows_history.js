<<<<<<< HEAD
webpackJsonp([14],{143:function(e,t,a){e.exports=a(144)},144:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=a(3),n=(a.n(s),a(4)),o=a.n(n),i=a(13),r=a.n(i),u=a(5);a.n(u);a(2);var g=JSON.parse($("#pageOne").val()),p=new Vue({el:"#houseList",data:{list:[],page:2,getData:!1,status:!1,prompt:!1},components:{houseList:r.a}});if(g.data.length){for(var c in g.data)p.list.push(g.data[c].office_building_house);1!==Math.ceil(g.total/g.per_page)&&(p.getData=!0,p.status=!0)}else p.getData=!1,p.status=!1;$(document).on("click",".more button",function(e){p.getData=!1;var t="/ajax_browse_records?page="+p.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:t,type:"get",success:function(e){if(p.status=!1,e.success){for(var t in e.data.data)p.list.push(e.data.data[t].office_building_house);Math.ceil(e.data.total/e.data.per_page)===p.page?(p.getData=!1,p.status=!1,p.prompt=!0):p.getData=!0}else o()({message:e.message,position:"center",duration:1e3});p.page=p.page+1},error:function(e){o()({message:e.responseJSON.message,position:"center",duration:2e3})}})}),0!==p.list.length?$("#nothing").hide():0==p.list.length&&$("#nothing").show()}},[143]);
=======
webpackJsonp([14],{

/***/ 118:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(119);


/***/ }),

/***/ 119:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(10);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui__);
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
    var url = '/ajax_browse_records?page=' + app.page;
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
                duration: 2000
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

},[118]);
>>>>>>> origin/master

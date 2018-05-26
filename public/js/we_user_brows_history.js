webpackJsonp([13],{

/***/ 116:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(117);


/***/ }),

/***/ 117:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui__);
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);



var pageOne = JSON.parse($('#pageOne').val());
var app = new Vue({
    el: '#houseList',
    data: {
        list: [],
<<<<<<< HEAD
        page: 2
=======
        page: 2,
        getData: false,
        status: false,
        prompt: false
>>>>>>> origin/wanghao
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
<<<<<<< HEAD
} else {
    console.log(2);
    $('.more').hide();
}
$(document).on('touchstart', '.more button', function (e) {
=======
    app.getData = true;
    app.status = true;
} else {
    app.getData = false;
    app.status = false;
}
$(document).on('click', '.more button', function (e) {
    app.getData = false;
>>>>>>> origin/wanghao
    var url = '/ajax_browse_records?page=' + app.page;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'get',
        success: function success(data) {
<<<<<<< HEAD
            for (var key in data.data) {
                app.list.push(data.data[key].office_building_house);
            }
            console.log(Math.ceil(data.total / data.per_page));
            console.log(app.page);
            console.log(Math.ceil(data.total / data.per_page) === app.page);
            if (Math.ceil(data.total / data.per_page) === app.page) {
                $('.more').hide();
=======
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
>>>>>>> origin/wanghao
            }
            app.page = app.page + 1;
        },
        error: function error(res) {
            Object(__WEBPACK_IMPORTED_MODULE_2_mint_ui__["Toast"])({
                message: res.responseJSON.message,
                position: 'center',
<<<<<<< HEAD
                duration: 5000
=======
                duration: 2000
>>>>>>> origin/wanghao
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

},[116]);
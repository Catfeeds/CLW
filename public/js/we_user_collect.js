webpackJsonp([13],{

/***/ 146:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(147);


/***/ }),

/***/ 147:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui_lib_toast_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__components_houseList_vue__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__components_houseList_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_mint_ui_lib_style_css__ = __webpack_require__(5);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_mint_ui_lib_style_css__);


/**
 * Created by wh on 2018/5/24.
 */
__webpack_require__(2);



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
        houseList: __WEBPACK_IMPORTED_MODULE_2__components_houseList_vue___default.a
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
                __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_toast___default()({
                    message: data.message,
                    position: 'center',
                    duration: 1000
                });
            }
            app.page = app.page + 1;
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
// 无数据显示
if (app.list.length !== 0) {
    $('#nothing').hide();
} else if (app.list.length == 0) {
    $('#nothing').show();
}

/***/ })

},[146]);
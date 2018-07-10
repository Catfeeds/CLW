webpackJsonp([5],{

/***/ 138:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(139);


/***/ }),

/***/ 139:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue__ = __webpack_require__(6);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui__);



__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Actionsheet"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Actionsheet"]);
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Button"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Button"]);
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Cell"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Cell"]);
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["TabItem"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["TabItem"]);
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Loadmore"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Loadmore"]); // 下拉刷新
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.use(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["InfiniteScroll"]); // 上拉加载更多
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */
var FormData = {
    id: '',
    tel: $('meta[name="tel"]').attr('content')
};
var requestType = false;
var url = 'http://192.168.0.199/';
var app = new __WEBPACK_IMPORTED_MODULE_0_vue___default.a({
    el: '#app',
    data: {
        pulldown1: false,
        pulldown2: false,
        untopStatus: '',
        topStatus: '',
        page1: 1,
        page2: 1,
        salesman: [],
        unsalesman: [],
        selected: '1',
        sheetVisible: false,
        sheetClick: function sheetClick(e) {
            console.log('e', e);
        },
        actions: []
    },
    methods: {
        sheet: function sheet(id, index) {
            FormData.id = id;
            distribution(FormData, index);
        },

        // 上拉加载更多 !待确定!
        getUnList: function getUnList() {
            if (!pulldown1) {
                __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Indicator"].open({
                    text: '加载中...',
                    spinnerType: 'fading-circle'
                });
            } else {
                __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Indicator"].open({
                    text: '再无更多数据...',
                    spinnerType: 'fading-circle'
                });
            }
            if (this.pulldown1) return;
            getSaiesmanList(1, this.page1);
        },

        // 下拉刷新 !待确定!
        unloadTop: function unloadTop() {
            this.page1 = 1;
            // 获取未确定工单
            getSaiesmanList(1, this.page1, true);
        },
        unhandleTopChange: function unhandleTopChange(status) {
            this.topStatus = status;
        },

        // 上拉加载更多 !已确定!
        getList: function getList() {
            if (!pulldown2) {
                __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Indicator"].open({
                    text: '加载中...',
                    spinnerType: 'fading-circle'
                });
            } else {
                __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Indicator"].open({
                    text: '再无更多数据...',
                    spinnerType: 'fading-circle'
                });
            }
            if (this.pulldown2) return;
            getSaiesmanList(2, this.page2);
            console.log('上拉加载更多', this.page2);
        },

        // 下拉刷新 !已确定!
        loadTop: function loadTop() {
            this.page2 = 1;
            // 获取已确定工单
            getSaiesmanList(2, this.page2, true);
        },
        handleTopChange: function handleTopChange(status) {
            this.untopStatus = status;
        }
    },
    created: function created() {
        // 获取未确定工单
        getSaiesmanList(1, this.page1, true);
        requestType = false;
        // 获取已确定工单
        getSaiesmanList(2, this.page2, true);
        console.log('获取已确定工单', this.page2);
    }
});
// 获取 工单列表
function getSaiesmanList(status, page) {
    var type = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

    if (requestType) return;
    requestType = true;
    $.ajax({
        headers: {
            'safeString': $('meta[name="safeString"]').attr('content')
        },
        url: url + "/api/staff_list",
        type: 'get',
        data: {
            status: status,
            tel: $('meta[name="tel"]').attr('content'),
            page: page
        },
        success: function success(data) {
            if (status === 1) {
                // 判断是否为下拉加载
                if (type) {
                    app.pulldown1 = false;
                    app.unsalesman = data.data.data;
                    setTimeout(function () {
                        app.$refs.unloadmore.onTopLoaded();
                    }, 1000);
                } else {
                    app.unsalesman = app.unsalesman.concat(data.data.data);
                }
                if (data.data.last_page === app.page1) app.pulldown1 = true;
                app.page1++;
            } else if (status === 2) {
                if (type) {
                    app.pulldown2 = false;
                    app.salesman = data.data.data;
                    setTimeout(function () {
                        app.$refs.loadmore.onTopLoaded();
                    }, 1000);
                } else {
                    app.salesman = app.salesman.concat(data.data.data);
                }
                if (data.data.last_page === app.page2) app.pulldown2 = true;
                app.page2++;
            }
            requestType = false;
            __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Indicator"].close();
        },
        error: function error(res) {
            __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Indicator"].close();
            Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
}
// 业务员确认工单
function distribution(FormData, index) {
    $.ajax({
        headers: {
            'safeString': $('meta[name="safeString"]').attr('content')
        },
        url: url + "/api/determine",
        type: 'post',
        data: FormData,
        success: function success(data) {
            if (data.success) {
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: data.message,
                    position: 'center',
                    duration: 1000
                });
                app.unsalesman.splice(index, 1);
                getSaiesmanList(2, 1, true);
            }
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

/***/ })

},[138]);
webpackJsonp([4],{

/***/ 137:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(138);


/***/ }),

/***/ 138:
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
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Navbar"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Navbar"]);
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["TabItem"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["TabItem"]);
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Loadmore"].name, __WEBPACK_IMPORTED_MODULE_1_mint_ui__["Loadmore"]); // 下拉刷新
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.use(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["InfiniteScroll"]); // 上拉加载更多
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */
var FormData = {
    staff_guid: '', // 员工id
    guid: '', // 工单id
    openid: $('meta[name="openid"]').attr('content')
};
var sheetClick = function sheetClick(e) {
    FormData.staff_guid = e.id;
    distribution(FormData);
};
var url = 'http://192.168.0.199:3000' + '/api/admin';
var requestType = false;
var app = new __WEBPACK_IMPORTED_MODULE_0_vue___default.a({
    el: '#app',
    data: {
        index: null,
        pulldown1: false,
        pulldown2: false,
        untopStatus: '',
        topStatus: '',
        page1: 1,
        page2: 1,
        shopkowner: [],
        unshopkowner: [],
        selected: '1',
        sheetVisible: false,
        sheetClick: function sheetClick(e) {
            console.log('e', e);
        },
        actions: []
    },
    methods: {
        sheet: function sheet(guid, index) {
            this.index = index;
            FormData.guid = guid;
            this.sheetVisible = !this.sheetVisible;
        },

        // 上拉加载更多 !待处理!
        getUnList: function getUnList() {
            if (!this.pulldown1) {
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
            console.log(111);
            if (this.pulldown1) return;
            getShopkeeperList(1, this.page1);
        },

        // 下拉刷新 !待处理!
        unloadTop: function unloadTop() {
            this.page1 = 1;
            // 获取未处理工单
            getShopkeeperList(1, this.page1, true);
        },
        unhandleTopChange: function unhandleTopChange(status) {
            this.untopStatus = status;
        },

        // 上拉加载更多 !已处理!
        getList: function getList() {
            if (!this.pulldown2) {
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
            getShopkeeperList(2, this.page2);
            console.log('上拉加载更多', this.page2);
        },

        // 下拉刷新 !已处理!
        loadTop: function loadTop() {
            this.page2 = 1;
            // 获取已处理工单
            getShopkeeperList(2, this.page2, true);
        },
        handleTopChange: function handleTopChange(status) {
            this.topStatus = status;
        }
    },
    created: function created() {
        // 获取待处理处理工单
        getShopkeeperList(1, this.page1, true);
        requestType = false;
        // 获取已处理工单
        getShopkeeperList(2, this.page2, true);
        var that = this;
        $.ajax({
            headers: {
                'safeString': $('meta[name="safeString"]').attr('content')
            },
            url: url + "/get_staff",
            type: 'get',
            data: {
                status: 1,
                openid: $('meta[name="openid"]').attr('content')
            },
            success: function success(data) {
                if (data.success) {
                    var array = [];
                    for (var key in data.data) {
                        array.push({
                            id: data.data[key].value,
                            name: data.data[key].label,
                            method: sheetClick
                        });
                    }
                    that.actions = array;
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
});
// 获取 工单列表
// status为1 获取待处理处理工单 status为2 获取已处理工单
function getShopkeeperList(status, page) {
    var type = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

    if (requestType) return;
    requestType = true;
    $.ajax({
        headers: {
            'safeString': $('meta[name="safeString"]').attr('content')
        },
        url: url + "/shopkeeper_list",
        type: 'get',
        data: {
            status: status,
            openid: $('meta[name="openid"]').attr('content'),
            page: page
        },
        success: function success(data) {
            if (data.success) {
                // status为1 时 是
                if (status === 1) {
                    // type为true 是加载更多
                    if (type) {
                        app.pulldown1 = false;
                        app.unshopkowner = data.data.data;
                        setTimeout(function () {
                            app.$refs.unloadmore.onTopLoaded();
                        }, 1000);
                        // type为false 是下拉刷新 数据到第一页数据
                    } else {
                        app.unshopkowner = app.unshopkowner.concat(data.data.data);
                    }
                    if (data.data.last_page === app.page1) app.pulldown1 = true;
                    app.page1++;
                } else if (status === 2) {
                    // type为true 是加载更多
                    if (type) {
                        app.pulldown2 = false;
                        app.shopkowner = data.data.data;
                        setTimeout(function () {
                            app.$refs.loadmore.onTopLoaded();
                        }, 1000);
                        // type为false 是下拉刷新 数据到第一页数据
                    } else {
                        app.shopkowner = app.shopkowner.concat(data.data.data);
                    }
                    if (data.data.last_page === app.page2) app.pulldown2 = true;
                    app.page2++;
                }
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

// 店长分配工单
function distribution(FormData) {
    $.ajax({
        headers: {
            'safeString': $('meta[name="safeString"]').attr('content')
        },
        url: url + "/distribution",
        type: 'post',
        data: FormData,
        success: function success(data) {
            console.log(data);
            if (data.success) {
                Object(__WEBPACK_IMPORTED_MODULE_1_mint_ui__["Toast"])({
                    message: data.message,
                    position: 'center',
                    duration: 1000
                });
                // 删除当期 确定的那一条工单
                app.unshopkowner.splice(app.index, 1);
                // 添加完 要更新 已分配列表 下拉刷新  防止之前已加载到最后一页数据 看不到最新数据
                app.loadTop();
                app.pulldown2 = false;
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

},[137]);
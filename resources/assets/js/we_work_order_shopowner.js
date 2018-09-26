import Vue from 'vue'
import { Button, Cell, Navbar, TabItem, Actionsheet, InfiniteScroll, Loadmore, Indicator  } from 'mint-ui'
import { Toast } from 'mint-ui';
Vue.component(Actionsheet.name, Actionsheet);
Vue.component(Button.name, Button)
Vue.component(Cell.name, Cell)
Vue.component(Navbar.name, Navbar);
Vue.component(TabItem.name, TabItem);
Vue.component(Loadmore.name, Loadmore); // 下拉刷新
Vue.use(InfiniteScroll); // 上拉加载更多
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */
var FormData = {
    staff_guid: '', // 员工id
    id: '', // 工单id
    openid: $('meta[name="openid"]').attr('content')
}
var sheetClick = function(e) {
    FormData.staff_guid = e.id
    distribution(FormData)
}
const url = process.env.agencyHostURL + '/api/admin'
var requestType = false;
const app = new Vue({
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
        sheetClick: function(e) {
            console.log('e', e)
        },
        actions: []
    },
    methods: {
        sheet(id, index) {
            this.index = index
            FormData.id = id
            this.sheetVisible = !this.sheetVisible
        },
        // 上拉加载更多 !待处理!
        getUnList() {
            if(!this.pulldown1) {
                Indicator.open({
                    text: '加载中...',
                    spinnerType: 'fading-circle'
                });
            }else{
                Indicator.open({
                    text: '再无更多数据...',
                    spinnerType: 'fading-circle'
                });
            }
            console.log(111)
            if(this.pulldown1) return
            getShopkeeperList(1, this.page1)

        },
        // 下拉刷新 !待处理!
        unloadTop() {
            this.page1 = 1;
            // 获取未处理工单
            getShopkeeperList(1, this.page1, true);
        },
        unhandleTopChange(status){
            this.untopStatus = status;
        },
        // 上拉加载更多 !已处理!
        getList() {
            if(!this.pulldown2) {
                Indicator.open({
                    text: '加载中...',
                    spinnerType: 'fading-circle'
                });
            }else{
                Indicator.open({
                    text: '再无更多数据...',
                    spinnerType: 'fading-circle'
                });
            }
            if(this.pulldown2) return
            getShopkeeperList(2, this.page2)
            console.log('上拉加载更多', this.page2)
        },
        // 下拉刷新 !已处理!
        loadTop() {
            this.page2 = 1
            // 获取已处理工单
            getShopkeeperList(2, this.page2, true);
        },
        handleTopChange(status){
            this.topStatus = status;
        },
    },
    created() {
        // 获取待处理处理工单
        getShopkeeperList(1, this.page1, true);
        requestType = false
        // 获取已处理工单
        getShopkeeperList(2, this.page2, true);
        var that = this
        $.ajax({
            headers: {
                'safeString': $('meta[name="safeString"]').attr('content')
            },
            url: url + "/get_staff",
            type: 'get',
            data:{
                status: 1,
                openid: $('meta[name="openid"]').attr('content')
            },
            success: function(data){
                if(data.success) {
                    var array = []
                    for (var key in data.data) {
                        array.push({
                            id: data.data[key].value,
                            name: data.data[key].label,
                            method: sheetClick
                        })
                    }
                    that.actions = array
                }
            },
            error: function (res) {
                Toast({
                    message: res.responseJSON.message,
                    position: 'center',
                    duration: 5000
                })
            }
        });
    }
})
// 获取 工单列表
// status为1 获取待处理处理工单 status为2 获取已处理工单
function getShopkeeperList(status, page, type=false) {
    if(requestType) return;
    requestType = true;
    $.ajax({
        headers: {
            'safeString': $('meta[name="safeString"]').attr('content')
        },
        url: url + "/shopkeeper_list",
        type: 'get',
        data:{
            status: status,
            openid: $('meta[name="openid"]').attr('content'),
            page: page
        },
        success: function(data){
            if (data.success) {
                // status为1 时 是
                if(status===1) {
                    // type为true 是加载更多
                    if(type){
                        app.pulldown1 = false;
                        app.unshopkowner = data.data.data;
                        setTimeout(function () {
                            app.$refs.unloadmore.onTopLoaded();
                        },1000)
                        // type为false 是下拉刷新 数据到第一页数据
                    }else{
                        app.unshopkowner = app.unshopkowner.concat(data.data.data)
                    }
                    if(data.data.last_page === app.page1) app.pulldown1 = true;
                    app.page1++
                }else if(status===2) {
                    // type为true 是加载更多
                    if(type){
                        app.pulldown2 = false;
                        app.shopkowner = data.data.data;
                        setTimeout(function () {
                            app.$refs.loadmore.onTopLoaded();
                        },1000)
                        // type为false 是下拉刷新 数据到第一页数据
                    }else{
                        app.shopkowner = app.shopkowner.concat(data.data.data);
                    }
                    if(data.data.last_page === app.page2) app.pulldown2 = true;
                    app.page2++

                }
            }
            requestType = false
            Indicator.close();
        },
        error: function (res) {
            Indicator.close();
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            })
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
        success: function(data){
           console.log(data)
            if(data.success) {
                Toast({
                    message: data.message,
                    position: 'center',
                    duration: 1000
                })
                // 删除当期 确定的那一条工单
                app.unshopkowner.splice(app.index, 1);
                // 添加完 要更新 已分配列表 下拉刷新  防止之前已加载到最后一页数据 看不到最新数据
                app.loadTop()
                app.pulldown2 = false
            }
        },
        error: function (res) {
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            })
        }
    });
}
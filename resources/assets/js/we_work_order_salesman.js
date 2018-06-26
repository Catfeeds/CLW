import Vue from 'vue'
import { Button, Cell, TabItem, Actionsheet, InfiniteScroll, Loadmore, Indicator } from 'mint-ui'
import { Toast } from 'mint-ui';
Vue.component(Actionsheet.name, Actionsheet);
Vue.component(Button.name, Button)
Vue.component(Cell.name, Cell)
Vue.component(TabItem.name, TabItem);
Vue.component(Loadmore.name, Loadmore); // 下拉刷新
Vue.use(InfiniteScroll); // 上拉加载更多
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */
var FormData = {
    id: '',
    tel: $('meta[name="tel"]').attr('content')
}
var requestType = false;
const url = process.env.agencyHostURL
const app = new Vue({
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
        sheetClick: function(e) {
            console.log('e', e)
        },
        actions: []
    },
    methods: {
        sheet(id, index) {
            FormData.id = id
            distribution(FormData, index)
        },
        // 上拉加载更多 !待确定!
        getUnList() {
            Indicator.open({
                text: '加载中...',
                spinnerType: 'fading-circle'
            });
            if(this.pulldown1) return
            getSaiesmanList(1, this.page1)
        },
        // 下拉刷新 !待确定!
        unloadTop() {
            this.page1 = 1;
            // 获取未确定工单
            getSaiesmanList(1, this.page1, true);
        },
        unhandleTopChange(status){
            this.topStatus = status;
        },
        // 上拉加载更多 !已确定!
        getList() {
            Indicator.open({
                text: '加载中...',
                spinnerType: 'fading-circle'
            });
            if(this.pulldown2) return
            getSaiesmanList(2, this.page2)
            console.log('上拉加载更多', this.page2)
        },
        // 下拉刷新 !已确定!
        loadTop() {
            this.page2 = 1
            // 获取已确定工单
            getSaiesmanList(2, this.page2, true);
        },
        handleTopChange(status){
            this.untopStatus = status;
        }
    },
    created() {
        // 获取未确定工单
        getSaiesmanList(1, this.page1, true);
        requestType = false
        // 获取已确定工单
        getSaiesmanList(2, this.page2, true)
        console.log('获取已确定工单', this.page2)
    }
})
// 获取 工单列表
function getSaiesmanList(status, page, type=false) {
    if(requestType) return;
    requestType = true;
    $.ajax({
        url: url + "/api/staff_list",
        type: 'get',
        data:{
            status: status,
            tel: $('meta[name="tel"]').attr('content'),
            page: page
        },
        success: function(data){
            if(status===1) {
                // 判断是否为下拉加载
                if(type){
                    app.pulldown1 = false;
                    app.unsalesman = data.data.data;
                    setTimeout(function () {
                        app.$refs.unloadmore.onTopLoaded();
                    },1000)
                }else{
                    app.unsalesman = app.unsalesman.concat(data.data.data);

                }
                if(data.data.last_page === app.page1) app.pulldown1 = true;
                app.page1++
            }else if(status===2) {
                if(type){
                    app.pulldown2 = false;
                    app.salesman = data.data.data;
                    setTimeout(function () {
                        app.$refs.loadmore.onTopLoaded();
                    },1000)
                }else{
                    app.salesman = app.salesman.concat(data.data.data);

                }
                if(data.data.last_page === app.page2) app.pulldown2 = true;
                app.page2++
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
// 业务员确认工单
function distribution(FormData, index) {
    $.ajax({
        url: url + "/api/determine",
        type: 'post',
        data: FormData,
        success: function(data){
            if(data.success) {
                Toast({
                    message: data.message,
                    position: 'center',
                    duration: 1000
                });
                app.unsalesman.splice(index,1);
                getSaiesmanList(2)
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
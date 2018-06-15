import Vue from 'vue'
import { Button, Cell, TabItem, Actionsheet  } from 'mint-ui'
import { Toast } from 'mint-ui';
Vue.component(Actionsheet.name, Actionsheet);
Vue.component(Button.name, Button)
Vue.component(Cell.name, Cell)
Vue.component(TabItem.name, TabItem);
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */
var FormData = {
    id: ''
}
const app = new Vue({
    el: '#app',
    data: {
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
        sheet(id) {
            FormData.id = id
            distribution(FormData)
        }
    },
    created() {
        // 获取已确定工单
        getSaiesmanList(1)
        // 获取未确定工单
        getSaiesmanList(2)
    }
})
// 获取 工单列表
function getSaiesmanList(status) {
    $.ajax({
        url: "http://192.168.0.199/api/staff_list",
        type: 'get',
        data:{
            status: status
        },
        success: function(data){
            console.log('data', data)
            if (data.success) {
                if(status===1) {
                    app.salesman = data.data
                }else if(status===2) {
                    app.unsalesman = data.data
                }
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

// 业务员确认工单
function distribution(FormData) {
    $.ajax({
        url: "http://192.168.0.199/api/determine",
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
                getSaiesmanList(1)
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
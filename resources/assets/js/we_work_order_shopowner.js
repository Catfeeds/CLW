import Vue from 'vue'
import { Button, Cell, Navbar, TabItem, Actionsheet  } from 'mint-ui'
import { Toast } from 'mint-ui';
Vue.component(Actionsheet.name, Actionsheet);
Vue.component(Button.name, Button)
Vue.component(Cell.name, Cell)
Vue.component(Navbar.name, Navbar);
Vue.component(TabItem.name, TabItem);
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */
var FormData = {
    staff_id: '', // 员工id
    id: '', // 工单id
    tel: $('meta[name="tel"]').attr('content')
}
var sheetClick = function(e) {
    FormData.staff_id = e.id
    distribution(FormData)
}
const url = process.env.agencyHostURL;
const app = new Vue({
    el: '#app',
    data: {
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
        sheet(id) {
            FormData.id = id
            this.sheetVisible = !this.sheetVisible
        }
    },
    created() {
        // 获取已处理工单
        getShopkeeperList(1)
        // 获取未处理工单
        getShopkeeperList(2)
        var that = this
        $.ajax({
            url: url + "/api/get_staff",
            type: 'get',
            data:{
                status: 1,
                tel: $('meta[name="tel"]').attr('content')
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
function getShopkeeperList(status) {
    $.ajax({
        url: url + "/api/shopkeeper_list",
        type: 'get',
        data:{
            status: status,
            tel: $('meta[name="tel"]').attr('content')
        },
        success: function(data){
            console.log('data', data)
            if (data.success) {
                if(status===1) {
                    app.shopkowner = data.data
                }else if(status===2) {
                    app.unshopkowner = data.data
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

// 店长分配工单
function distribution(FormData) {
    $.ajax({
        url: url + "/api/distribution",
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
                getShopkeeperList(1)
                getShopkeeperList(2)
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
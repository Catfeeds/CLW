/**
 * Created by wh on 2018/5/24.
 */
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import houseList from './components/houseList.vue'
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
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
        houseList
    }
});
if(pageOne.data.length) {
    for(var key in pageOne.data){
        app.list.push(pageOne.data[key].office_building_house)
    }
    if(Math.ceil(pageOne.total/pageOne.per_page)!==1){
        app.getData = true;
        app.status = true;
    }
}else {
    app.getData = false;
    app.status = false;
}
$(document).on('click','.more button',(e)=> {
    app.getData = false;
    var url = '/ajax_collections?page=' + app.page;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'get',
        success: function (data) {
            app.status = false;
            if(data.success) {
                for(var key in data.data.data){
                    app.list.push(data.data.data[key].office_building_house)
                }
                if(Math.ceil(data.data.total/data.data.per_page) === app.page) {
                    app.getData = false;
                    app.status = false;
                    app.prompt = true
                }else {
                    app.getData = true;
                }
            } else{
                Toast({
                    message: data.message,
                    position: 'center',
                    duration: 1000
                })
            }
            app.page =  app.page + 1;
        },
        error: function (res) {
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            })
        }
    });
});
// 无数据显示
if(app.list.length !== 0){
    $('#nothing').hide();
} else if (app.list.length == 0) {
    $('#nothing').show();
}

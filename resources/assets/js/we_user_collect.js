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
        page: 2
    },
    components: {
        houseList
    }
});
if(Math.ceil(pageOne.total/pageOne.per_page)===1)$('.more').hide();
if(pageOne.data.length) {
    for(var key in pageOne.data){
        app.list.push(pageOne.data[key].office_building_house)
    }
}else {
    console.log(2)
    $('.more').hide()
}
$(document).on('touchstart','.more button',(e)=> {
    var url = '/ajax_collections?page=' + app.page;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'get',
        success: function (data) {
            for(var key in data.data){
                app.list.push(data.data[key].office_building_house)
            }
            console.log(Math.ceil(data.total/data.per_page));
            console.log(app.page);
            console.log(Math.ceil(data.total/data.per_page)===app.page);
            if(Math.ceil(data.total/data.per_page) === app.page) {
                $('.more').hide()
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

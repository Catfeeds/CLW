window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import houseList from './components/houseList.vue'
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

for(var key in pageOne.data){
    app.list.push(pageOne.data[key].office_building_house)
}
$(document).on('touchstart','.more button',(e)=> {
    var url = '/ajax_browse_records?page=' + app.page;
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
        error: function (data) {
            alert(data.responseJSON.message);
        }
    });
});

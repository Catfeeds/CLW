window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import BaiduMap from 'vue-baidu-map'
Vue.component('house-detail-list', require('./components/houseDetailList.vue'));
Vue.component('detail-banner', require('./components/detailBanner.vue'));
Vue.component('feature-banner', require('./components/featureBanner.vue'));
Vue.use(BaiduMap, {
    ak: process.env.baiduAK
});
var app =new Vue({
    el: '#Vuemap',
    data: {
        center: {lng: JSON.parse($('#build_id').val())[0], lat: JSON.parse($('#build_id').val())[1]},
        keyword: '地铁',
        location:'武汉',
        nearby: {
            center: {
                lng: JSON.parse($('#build_id').val())[0],
                lat: JSON.parse($('#build_id').val())[1]
            },
            radius: 1000
        }
    }
});
$(document).on('click','.map-btn-item',(e)=> {
    $('.map-btn-item').removeClass('active');
    var That = $(e.currentTarget);
    That.addClass('active')
    app.keyword = That.data('name')
});

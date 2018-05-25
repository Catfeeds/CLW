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
        center: {lng: 114.32267, lat: 30.559556},
        keyword: '地铁'
    }
});

$(document).on('touchend || tap','.map-btn-item',(e)=> {
    $('.map-btn-item').removeClass('active');
    var That = $(e.currentTarget);
    That.addClass('active')
    app.keyword = That.data('name')
});

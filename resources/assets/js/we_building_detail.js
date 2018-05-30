require('./we_common')
import BaiduMap from 'vue-baidu-map'
Vue.component('house-detail-list', require('./components/houseDetailList.vue'));
Vue.component('detail-banner', require('./components/detailBanner.vue'));
Vue.component('feature-banner', require('./components/featureBanner.vue'));
Vue.use(BaiduMap, {
  ak: process.env.baiduAK
});
new Vue({
  el: '#Vuebuilding',
  data: {
    imgList: JSON.parse($('#imgList').val()),
    features: JSON.parse($('#features').val()),
    center: JSON.parse($('#gps').val())
  }
});
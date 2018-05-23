window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
// Vue.component('house-detail-list', require('./components/houseDetailList.vue.vue'));
Vue.component('detail-banner', require('./components/detailBanner.vue'));
Vue.component('feature-banner', require('./components/featureBanner.vue'));
new Vue({
  el: '#Vuebuilding',
  data: {
    imgList: JSON.parse($('#imgList').val()),
    features: JSON.parse($('#features').val())
  }
});
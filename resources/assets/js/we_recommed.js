/**
 * Created by zxz1992 on 2018/5/23.
 */
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', require('./components/buildingList.vue'));
const app = new Vue({
  el: '#app',
  data: {
    list: listAppData
  }
});

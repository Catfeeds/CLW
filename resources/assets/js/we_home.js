window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
Vue.component('building-list', require('./components/buildingList.vue'));
var listAppData = JSON.parse($('#listAppData').val());
const app = new Vue({
  el: '#listApp',
  data: {
    list: listAppData.data
  }
});
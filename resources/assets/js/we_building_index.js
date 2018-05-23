/**
 * Created by zxz1992 on 2018/5/22.
 */
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import buildingSelect from './components/buildingSelect.vue'
import buildingList from './components/buildingList.vue'
var pageOne = JSON.parse($('#pageOne').val());
var app = new Vue({
  el: '#buildingList',
  data: {
    list: pageOne.data,
    search: {}
  },
  components: {
    buildingSelect,
    buildingList
  },
  methods: {
    changeData: function (data) {
      this.list = [];
      var params = {};
      if (data.area_id !== 'all') {
        params.area_id = data.area_id
      }
      if (data.block_id !== 'all') {
        params.block_id = data.block_id
      }
      if (data.renovation !== 'all') {
        params.renovation = data.renovation
      }
      if (data.features !== 'all') {
        params.features = data.features
      }
      if (data.total_price !== null) {
        params.total_price = data.total_price;
      }
      if (data.unit_price !== null) {
        params.unit_price = data.unit_price;
      }
      if (data.acreage !== null) {
        params.acreage = data.acreage;
      }

      var searchStr = JSON.stringify(params);
      window.location.search = '?condition='+searchStr
    }
  }
});
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
      var params = JSON.parse(JSON.stringify(data));
      console.log(params)
      // params.area_id = data.area_id === 'all'? null : data.area_id
      // params.block_id = data.block_id === 'all'? null : data.block_id
      // params.renovation = data.renovation === 'all'? null : data.renovation // 装修
      // params.features = data.features === 'all'? null : data.features // 决策偏好
      // this.search = params
    }
  }
});
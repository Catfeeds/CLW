window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import houseList from './components/houseList.vue'
var app = new Vue({
    el: '#buildingList',
    data: {
        list: [],
        search: {}
    },
    components: {
        houseList
    },
    methods: {
        changeData: function (data) {
            this.list = []
            var params = JSON.parse(JSON.stringify(data))
            params.area_id = data.area_id === 'all'? null : data.area_id
            params.block_id = data.block_id === 'all'? null : data.block_id
            params.renovation = data.renovation === 'all'? null : data.renovation // 装修
            params.features = data.features === 'all'? null : data.features // 决策偏好
            this.search = params
        }
    }
});

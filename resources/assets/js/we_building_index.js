/**
 * Created by zxz1992 on 2018/5/22.
 */
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import { Toast } from 'mint-ui';
import 'mint-ui/lib/style.css';
import buildingSelect from './components/buildingSelect.vue'
import buildingList from './components/buildingList.vue'
var pageOne = JSON.parse($('#pageOne').val());
var app = new Vue({
  el: '#buildingList',
  data: {
    list: pageOne.data,
    search: {},
    getData: pageOne.data.length === 6,
    status: pageOne.data.length === 6,
    page: 2,
    more: null,
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
    },
    getMore: function () {
      var condition = JSON.parse(GetQueryString('condition'))
      var self = this
      if (!condition) {
        condition = {}
      }
      condition.page = self.page
      self.getData = false
      $.ajax({
        url: '/buildings/create',
        type: 'GET',
        data: condition,
        success: function (data) { 
          if (data.data.data.length === 0) {
            Toast({
              message: '已无更多数据',
              position: 'center',
              duration: 3000
            });
            self.status = false
            return
          }
          self.page++
          data.data.data.map(function (item) {
            self.list.push(item)
          });
          if (data.data.data.length >= data.data.per_page) {
            self.getData = true
          } else {
            self.status = false
          }
        },
        error: function (error) {
          if (error.status < 500) {
            Toast(error.responseJSON.message)
          } else {
            Toast('服务器出错')
          }
        }
      })
    },
    // 委托找房
    findHouse() {
      var tel = $('#telInput').val()
      if (!tel || tel.trim() == '') {
        Toast({
          message: '请输入手机号',
          position: 'center',
          duration: 2000
        })
      } else {
        $.ajax({
          url: '/bespeaks',
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            tel: tel
          },
          success: function (data) {
            $('#backdrop').fadeOut(300);
            $('#telInput').val('');
            if(data.success) {
              Toast({
                message: data.message,
                position: 'center',
                duration: 3000
              });
            } else  {
              Toast({
                message: data.message,
                position: 'center',
                duration: 3000
              });
            }
          },
          error: function (error) {
            $('#backdrop').fadeOut(300);
            if (error.status < 500) {
              Toast(error.responseJSON.message)
            } else {
              Toast('服务器出错')
            }
          }
        })
      }
    }
  }
})
function GetQueryString(name)
{
  var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
  var r = window.location.search.substr(1).match(reg);
  if(r!=null)return  unescape(r[2]); return null;
}

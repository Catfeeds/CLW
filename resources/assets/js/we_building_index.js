/**
 * Created by zxz1992 on 2018/5/22.
 */
require('./we_common')
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
    getData: false,
    status: false,
    prompt: false,
    page: 2,
    more: null,
  },
  components: {
    buildingSelect,
    buildingList
  },
  created() {
      this.getData = pageOne.data.length === 10;
      this.status = pageOne.data.length === 10;
      $('.main-content').show()
  },
  methods: {
    changeData: function (data) {
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
          for (var key in data.data.data) {
            self.list.push(data.data.data[key])
          }
          if (data.data.data.length >= data.data.per_page) {
            self.getData = true
          } else {
            self.status = false
            self.prompt = true
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
      var tel = $('#telInput').val(),
        telReg=/^[1][0-9]{10}$/;
      if (!telReg.test(tel)) {
        Toast({
          message: '请输入11位手机号',
          position: 'center',
          duration: 3000
        })
      } else {
        var source = whatBrowser()
        $.ajax({
          url: '/bespeaks',
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            tel: tel,
            page_source: source +'楼盘首页',
            source: source.substring(0,source.length-1)
          },
          success: function (data) {
            $('#backdrop').fadeOut(300);
            $('#telInput').val('');
            if(data.success) {
              Toast({
                message: '信息提交成功，楚楼网30分钟内联系您',
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
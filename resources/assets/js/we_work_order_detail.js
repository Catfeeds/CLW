import Vue from 'vue'
import { Steps, Step, Icon } from 'element-ui';
import { Actionsheet, Toast, MessageBox } from 'mint-ui'
Vue.component(Steps.name, Steps)
Vue.component(Step.name, Step)
Vue.component(Icon.name, Icon)
Vue.component(Actionsheet.name, Actionsheet)
const user_guid = $('#userGuid')[0].innerHTML
const guid = $('#gdGuid')[0].innerHTML
const url = process.env.agencyHostURL + '/api/admin'
const appellation = $('#appellation')[0].innerHTML
console.log(appellation)
var handle_guid = ''
var sheetClick = function(e) {
  handle_guid = e.id
  $('.detail-choice-agent').find('span').html(e.name)
}
const app = new Vue({
  el: '#detail-body',
  data: {
    sheetVisible: false,
    actions: [],
  },
  created() {
    var that = this
    // 请求经纪人数据
    $.ajax({
      headers: {
        'safeString': $('meta[name="safeString"]').attr('content')
      },
      url: url + "/get_agent",
      type: 'get',
      data: { user_guid: user_guid},
      success: function(data){
        if(data.success) {
          var array = []
          for (var key in data.data) {
            array.push({
              id: data.data[key].value,
              name: data.data[key].label,
              method: sheetClick
            })
          }
          that.actions = array
        }
      },
      error: function (res) {
        Toast({
          message: res.responseJSON.message,
          position: 'center',
          duration: 5000
        })
      }
    })
  },
  methods: {
    isShow() {
      this.sheetVisible = true
    },
    // 确认分配
    confirm() {
      $.ajax({
        headers: {
          'safeString': $('meta[name="safeString"]').attr('content')
        },
        url: url + "/allocation",
        type: 'post',
        data: { handle_guid: handle_guid, guid: '3fca39cecb6011e8ad7c080027686836' },
        success: function(data){
          if(data.success) {
            $('.detail-choice-agent').find('span').html('选择经纪人')
            Toast({
              message: data.message,
              position: 'center',
              duration: 1000
            })
          }
        },
        error: function (res) {
          Toast({
            message: res.responseJSON.message,
            position: 'center',
            duration: 5000
          })
        }
      })
    },
    confirmGet() {
      MessageBox.confirm(appellation, '分配确认').then(action => {
        console.log('shism')
      })
    },
    operate() {
      this.sheetVisible = true
    }
  }
})

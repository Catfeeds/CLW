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
const url1 = process.env.chuLouSaasURL + '/api/company'
const appellation = $('#appellation')[0].innerHTML
const demand = $('#demand')[0].innerHTML
console.log(appellation)
var handle_guid = '' 
var sheetClick = function(e) {
  handle_guid = e.id
  $('.detail-choice-agent').find('span').html(e.name)
}
var getState = function(val) {
  console.log('val', val.id)
  if (val.id === 1) {
    MessageBox.prompt('有效', '', {inputPlaceholder: '请输入房源或客源编号',      inputType: 'textarea', 
    inputValidator: (val) => {
      if (val === null || val === '') {
        return true
      }
    }, inputErrorMessage: '输入框内容不能为空'
    } ).then(({ value, action }) => {
    status(1, 'identifier', value)
    })
  } else if (val.id === 2) {
    MessageBox.prompt('无效', '', {inputPlaceholder: '请输入无效原因', inputType: 'textarea', 
    inputValidator: (val) => {
      if (val === null || val === '') {
        return true
      }
    }, inputErrorMessage: '输入框内容不能为空'
    } ).then(({ value, action }) => {
    status(2, 'reason', value)
    })
  } else if (val.id === 3) {
    MessageBox.prompt('跟进', '', {inputPlaceholder: '请输入跟进内容',      inputType: 'textarea', 
    inputValidator: (val) => {
      if (val === null || val === '') {
        return true
      }
    }, inputErrorMessage: '输入框内容不能为空'
    } ).then(({ value, action }) => {
    status(3, 'track', value)
    })
  } else if (val.id === 4) {
    MessageBox.prompt('转发', '', {inputPlaceholder: '请输入转发原因',      inputType: 'textarea', 
    inputValidator: (val) => {
      if (val === null || val === '') {
        return false
      }
    }, inputErrorMessage: '输入框内容不能为空'
    } ).then(({ value, action }) => {
    status(4, 'reason', value)
    })
  }
}
const app = new Vue({
  el: '#detail-body',
  data: {
    sheetVisible: false,
    sheetVisible1: false,
    actions: [],
    allocationDisabled: true,
    confirmDisabled: true,
    statueDisabled: true,
    actions2: [
      {
        name: '有效',
        id: 1,
        method: getState
      },
      {
        name: '无效',
        id: 2,
        method: getState
      },
      {
        name: '跟进',
        id: 3,
        method: getState
      },
      {
        name: '转发',
        id: 4,
        method: getState
      },
    ]
  },
  created() {
    var that = this
    // 请求经纪人数据
    $.ajax({
      headers: {
        'safeString': $('meta[name="safeString"]').attr('content')
      },
      url: url1 + "/get_agent",
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
      var that = this
      if (handle_guid === '') {
        Toast({
          message: '请选择经纪人',
          position: 'center',
          duration: 1000
        })
      } else if(that.allocationDisabled) {
        that.allocationDisabled = false
        $.ajax({
          headers: {
            'safeString': $('meta[name="safeString"]').attr('content')
          },
          url: url + "/allocation",
          type: 'post',
          data: { handle_guid: handle_guid, guid: guid },
          success: function(data){
            if(data.success) {
              Toast({
                message: data.message,
                position: 'center',
                duration: 1000
              })
              window.location.reload()
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
      }
    },
    // 确认收到工单
    confirmGet() {
      var that = this
      MessageBox.confirm(appellation, '分配确认').then(action => {
        that.confirmDisabled = false
        $.ajax({
          headers: {
            'safeString': $('meta[name="safeString"]').attr('content')
          },
          url: url + "/confirm",
          type: 'post',
          data: { handle_guid: user_guid, guid: guid },
          success: function(data){
            if(data.success) {
              Toast({
                message: data.message,
                position: 'center',
                duration: 1000
              })
              setTimeout(()=> {
                window.location.href = '/work_orders/' + guid +'?user_guid='+ user_guid
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
      })
    },
    // 状态
    operate() {
      this.sheetVisible1 = true
    }
  }
})

function status(id, param, val) {
  var api = ''
  var formData = {}
  formData[param] = val
  formData.handle_guid = user_guid
  formData.guid = guid
  if (id === 1) {
    api = '/valid'
    formData.demand = demand
  } else if (id === 2) {
    api = '/invalid'
  } else if (id === 3) {
    api = '/track'
  } else if (id === 4) {
    api = '/rotate'
  }
  app.statueDisabled = false
  $.ajax({
    headers: {
      'safeString': $('meta[name="safeString"]').attr('content')
    },
    url: url + api,
    type: 'post',
    data: formData,
    success: function(data){
      if(data.success) {
        $('.detail-choice-agent').find('span').html('选择经纪人')
        Toast({
          message: data.message,
          position: 'center',
          duration: 1000
        })
        window.location.reload()
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
}

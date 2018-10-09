import Vue from 'vue'
import { Steps, Step, Icon } from 'element-ui';
import { Actionsheet } from 'mint-ui'
Vue.component(Steps.name, Steps)
Vue.component(Step.name, Step)
Vue.component(Icon.name, Icon)
Vue.component(Actionsheet.name, Actionsheet)
const user_guid = $('#userGuid')[0].innerHTML
const url = process.env.agencyHostURL + '/api/admin'
console.log('sssss', user_guid)
const app = new Vue({
  el: '#detail-body',
  data: {
    sheetVisible: false,
    actions: []
  },
  created() {
    getAgent()
  },
  methods: {
    isShow() {
      this.sheetVisible = true
    },
    confirm() {
      console.log('this is a test')
    },
    confirmGet() {
      console.log('ssdsfdsgdfg')
    },
    operate() {
      this.sheetVisible = true
    }
  }
})
function getAgent() {
  $.ajax({
    headers: {
      'safeString': $('meta[name="safeString"]').attr('content')
    },
    url: url + "/get_all_distribution/" + user_guid,
    type: 'get',
    success: function(data){
      console.log('不知道是不是', data)
      if(data.success) {
        Toast({
          message: data.message,
          position: 'center',
          duration: 1000
        });
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
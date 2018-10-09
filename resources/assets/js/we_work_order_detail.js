import Vue from 'vue'
import { Steps, Step, Icon } from 'element-ui';
import { Actionsheet } from 'mint-ui'
Vue.component(Steps.name, Steps)
Vue.component(Step.name, Step)
Vue.component(Icon.name, Icon)
Vue.component(Actionsheet.name, Actionsheet)
const app = new Vue({
  el: '#detail-body',
  data: {
    sheetVisible: false,
    actions: []
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
    url: url + "/get_all_distribution",
    type: 'get',
    data: FormData,
    success: function(data){
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
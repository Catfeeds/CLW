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
    }
  }
})
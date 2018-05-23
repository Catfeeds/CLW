window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import { Picker } from 'we-vue'
Vue.component(Picker.name, Picker)
const app = new Vue({
    el: '#down',
    data: {
        ticketPickerShow: true,
        ticketSlots: [
            {
              values: [
                '汽车票',
                '飞机票',
                '火车票',
                '轮船票',
                '其它'
              ],
              defaultIndex: 2
            }
        ],
    },
    methods: {
        onChange(picker, value) {
            this.$nextTick(() => {
                console.log(picker.getValues())
            })
        }
    }
  });
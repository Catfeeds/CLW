import Vue from 'vue'
import { Navbar, TabItem, TabContainer, TabContainerItem, Loadmore, InfiniteScroll, Indicator } from 'mint-ui'
import { Icon } from 'element-ui'
Vue.component(Navbar.name, Navbar)
Vue.component(TabItem.name, TabItem)
Vue.component(TabContainer.name, TabContainer)
Vue.component(TabContainerItem.name, TabContainerItem)
Vue.component(Loadmore.name, Loadmore)
Vue.component(Icon.name, Icon)
Vue.use(InfiniteScroll)
const list = new Vue({
  el: '.list-content',
  data: {
    isfixed: true,
    topState: '',
    selected: '1',
    pulldown1: true,
    pulldown2: true
  },
  methods: {
    handleTopChange(status) {
      console.log('sdfdgdfgdg', status)
      this.topState = status
    },
    unHandleTopChange(status) {
      console.log('222222', status)
      this.topState = status
    },
    loadTop() {
      console.log('我也不知道什么时候触发')
    },
    unLoadTop() {
      console.log('不知道什么意思')
    },
    // 上拉加载更多
    getDealList() {
     alert('有没有效果')
      if(!this.pulldown1) {
        Indicator.open({
          text: '加载中...',
          spinnerType: 'fading-circle'
        })
      }else{
        Indicator.open({
          text: '再无更多数据...',
          spinnerType: 'fading-circle'
        })
      }
    },
    getCloseList() {
      if(!this.pulldown1) {
        Indicator.open({
          text: '加载中...',
          spinnerType: 'fading-circle'
        })
      }else{
        Indicator.open({
          text: '再无更多数据...',
          spinnerType: 'fading-circle'
        })
      }
    }
  }
})
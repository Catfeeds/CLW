import Vue from 'vue'
import { Navbar, TabItem, TabContainer, TabContainerItem, Loadmore, InfiniteScroll, Indicator, Toast, Spinner } from 'mint-ui'
import { Icon } from 'element-ui'
Vue.component(Navbar.name, Navbar)
Vue.component(TabItem.name, TabItem)
Vue.component(TabContainer.name, TabContainer)
Vue.component(TabContainerItem.name, TabContainerItem)
Vue.component(Loadmore.name, Loadmore)
Vue.component(Icon.name, Icon)
Vue.component(Spinner.name, Spinner)
Vue.use(InfiniteScroll)
const url = process.env.agencyHostURL + '/api/admin'
const user_guid = $('#userGuid')[0].innerHTML
var requestType = false;
const list = new Vue({
  el: '.list-content',
  data: {
    userGuid: user_guid,
    isfixed: true,
    topState: '',
    untopStatus: '',
    selected: '1',
    pulldown1: false,
    pulldown2: false,
    page1: 1,
    page2: 1,
    unshopkowner: '',
    shopkowner: '',
    pullMore: false,
    unPullMore: false
  },
  created() {
    // 获取处理中的工单
    getShopkeeperList(1, this.page1, true)
    requestType = false
    // 获取已关闭的工单
    getShopkeeperList(2, this.page2, true)
  },
  methods: {
    handleTopChange(status) {
      this.topState = status
    },
    unHandleTopChange(status) {
      this.untopStatus = status
    },
    loadTop() {
      this.page1 = 1;
      // 获取处理中工单
      getShopkeeperList(1, this.page1, true);
      this.pullMore = false
    },
    unLoadTop() {
      this.page2 = 1
      // 获取已关闭工单
      getShopkeeperList(2, this.page2, true);
      this.unPullMore = false
    },
    // 上拉加载更多
    getDealList() {
      if(this.pulldown1) return
      getShopkeeperList(1, this.page1)
    },
    getCloseList() {
      if(this.pulldown2) return
      getShopkeeperList(2, this.page2)
    }
  }
})
function getShopkeeperList(status, page, type=false) {
  if(requestType) return;
  requestType = true;
  $.ajax({
      headers: {
          'safeString': $('meta[name="safeString"]').attr('content')
      },
      url: url + "/mobile_list",
      type: 'get',
      data:{
        user_guid: user_guid,
        type: status,
        openid: $('meta[name="openid"]').attr('content'),
        page: page
      },
      success: function(data){
        if (data.success) {
          // status为1 时 是
          if(status===1) {
            // type为true 是加载更多
            if(type){
              list.pulldown1 = false;
              list.unshopkowner = data.data.data;
                setTimeout(function () {
                  list.$refs.loadmore.onTopLoaded();
                },1000)
                // type为false 是下拉刷新 数据到第一页数据
            }else{
              list.unshopkowner = list.unshopkowner.concat(data.data.data)
            }
            if(data.data.last_page === list.page1) {
              list.pulldown1 = true
              list.pullMore = true
            }
            list.page1++
          }else if(status===2) {
            // type为true 是加载更多
            if(type){
              list.pulldown2 = false;
              list.shopkowner = data.data.data;
                setTimeout(function () {
                  list.$refs.unloadmore.onTopLoaded();
                },1000)
                // type为false 是下拉刷新 数据到第一页数据
            }else{
              list.shopkowner = list.shopkowner.concat(data.data.data);
            }
            if(data.data.last_page === list.page2) {
              list.pulldown2 = true;
              list.unPullMore = true
            }
            list.page2++ 
          }
        }
        requestType = false
        Indicator.close();
      },
      error: function (res) {
        Indicator.close();
        Toast({
          message: res.message,
          position: 'center',
          duration: 5000
        })
      }
  });
}
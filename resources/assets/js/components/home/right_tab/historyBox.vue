<template>
  <div class="histroy-content">
    <h3>我的浏览 <span class="close-history" @click="close()">X</span></h3>
    <!-- <div>123</div> -->
    <Tabs value="name1" style="flex:1;display: flex;flex-direction: column;" :animated="false">
      <TabPane label="楼盘" name="name1">
        <listData :list='buildList' :type="true"></listData>
      </TabPane>
      <TabPane label="房源" name="name2">
        <listData :list='houseList' :type="false"></listData>
      </TabPane>
    </Tabs>
  </div>
</template>
<script>
import { Tabs, TabPane } from 'iview'  // IView组件按需引入
import listData from './listData' // 自制组件
import Cookies from 'js-cookie'
import { getBuildBrowse, getHouseBrowse } from '../../../home_api'
export default {
  components: { Tabs, TabPane, listData },
  data() {
    return {
      buildList: [], // 楼盘浏览记录
      houseList: [] // 房源浏览记录
    }
  },
  methods: {
    close() {
      $('.js_rightTab').removeClass('click-history-active')
    }
  },
  created() {
    var buildingId = Cookies.get('building')
    var houseId = Cookies.get('house')
    console.log(houseId)
    if (buildingId) {
      getBuildBrowse({ id: buildingId }).then(res => {
        if (res.success) {
          this.buildList = res.data
        }
      })
    } 
    if (houseId) {
      getHouseBrowse({ id: houseId }).then(res => {
        this.houseList = res.data
      })
    }
  }
}
</script>
<style lang="less"> // IView组件样式按需引入
@import '~iview/src/styles/mixins/index';
@import '~iview/src/styles/custom.less';
@import '~iview/src/styles/components/tabs.less';
</style>

<style lang="scss">
.histroy-content{
  height: 100%;
  display: flex;
  flex-direction: column;
  h3{
    font-size:16px;
    padding:20px;
    .close-history{
      float: right;
      cursor: pointer;
      font-size: 20px;
    }
  }
  .ivu-tabs-bar{
    height: 36px;
  }
  .ivu-tabs-content{
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
  }
  .ivu-tabs-nav-container{
    height: 102%;
    .ivu-tabs-nav-scroll{
      text-align: center;
      .ivu-tabs-nav{
        float: none;
        display: inline-block;
      }
    }
  }
}
</style>

<template>
  <div class="histroy-content">
    <h3>我的浏览 <span class="close-history" @click="close()">X</span></h3>
   <Tabs value="name1" style="flex:1;display: flex;flex-direction: column;" :animated="false">
      <TabPane label="楼盘" name="name1">
        <listData :list='[1, 2, 3, 4, 2, 3, 4, 2, 3, 4, 4, 2, 3, 4]'></listData>
      </TabPane>
      <TabPane label="房源" name="name2">
        <listData :list='[1, 2, 3, 4, 2, 3, 4]'></listData>
      </TabPane>
    </Tabs>
  </div>
</template>
<script>
import { Tabs, TabPane } from 'iview'  // IView组件按需引入
import listData from './listData' // 自制组件
import Cookies from 'js-cookie'
export default {
  components: { Tabs, TabPane, listData },
  methods: {
    close() {
      $('.js_rightTab').removeClass('click-history-active')
    }
  },
  created() {
    console.log('sssss', Cookies.get('building'))
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
  .ivu-tabs-content{
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
  }
  .ivu-tabs-nav-container{
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

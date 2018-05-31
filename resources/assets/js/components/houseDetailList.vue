<template>
    <div class="rents">
        <div class="top">
            <h3 style="color:#333333">{{title}}</h3>
        </div>
        <house-list :list="list" goodImg='/we_img/house_detail_decoration.png'></house-list>
        <div class="more" v-if="getData">
            <button type="button" @click='getMore'>查看更多</button>
        </div>
        <div class="more" v-if="!getData && status">
            <div class="loading">
                <i class="mui-icon mui-icon-spinner-cycle mui-spin"></i> 正在加载 ...
            </div>
        </div>
        <div class="more" v-if="prompt">没有更多数据了</div>
    </div>
</template>
<script>

import houseList from './houseList'
import { Toast } from 'mint-ui';
import 'mint-ui/lib/style.css';
export default {
  components:{ houseList },
  props: ['api', 'title', 'building'],
  data() {
      return {
          list: [],
          getData: true,
          status: false,
          prompt: false,
          page: 1, // 当前请求页 
          typeClick: true // 数据是否请求完毕
      }
  },
  methods: {
      // 数据请求逻辑判断
      getMore: function() {
        var self = this
        self.getData= false // 关闭加载更多
        self.status = true // 打开加载提示
          // 请求楼盘下的数据
          if (this.api === 1) { // 请求楼盘下下的数据
            $.ajax({
              url: '/buildings_office/' + self.building,
              type: 'GET',
              data: { page: self.page },
              success: function (data) {
                self.status = false // 隐藏加载提示
                if (data.success) {
                  if (data.data.data.length === 0) { // 数据为空时
                    self.prompt = true // 打开暂无更多数据
                    return
                  }
                  self.getData = true // 打开加载更多
                  data.data.data.map(item => {
                    self.list.push(item)
                  })
                  self.page++
                  if (Math.ceil(data.data.total/data.data.per_page) < self.page) {
                    self.prompt = true // 打开暂无更多数据
                    self.getData = false
                    return
                  }
                } else {
                  self.status = false // 隐藏加载提示
                }
              },
              error: function (error) {
                self.status = false // 隐藏加载提示
                self.getData = true // 打开加载更多
                if (error.status < 500) {
                  Toast(error.responseJSON.message)
                } else {
                  Toast('服务器出错')
                }
              }
            })
          } else if(this.api === 2) { // 请求房源下的数据
            $.ajax({
              url: '/rim_houses/' + self.building,
              type: 'GET',
              data: { page: self.page },
              success: function (data) {
                self.status = false // 隐藏加载提示
                if (data.success) {
                  if (data.data.data.length === 0) { // 数据为空时
                    self.prompt = true // 打开暂无更多数据
                    return
                  }
                  self.getData = true // 打开加载更多
                  data.data.data.map(item => {
                    self.list.push(item)
                  })
                  self.page++
                  if (Math.ceil(data.data.total/data.data.per_page) < self.page) {
                    self.prompt = true // 打开暂无更多数据
                    self.getData = false
                    return
                  }
                } else {
                  self.status = false // 隐藏加载提示
                }
              },
              error: function (error) {
                self.status = false // 隐藏加载提示
                self.getData = true // 打开加载更多
                if (error.status < 500) {
                  Toast(error.responseJSON.message)
                } else {
                  Toast('服务器出错')
                }
              }
            })
          }
      }
  },
  created() {
    this.getMore();
  }
}
</script>
<style lang="scss">
    .rents{
		background:white;
        >.top{
            height:60px;
            line-height: 60px;
            >h3{
                font-size:19px;
                color:black;
                font-weight:500;
                padding:20px 0 20px 0;    
                text-align: center;   
            }
        }
        >.more{
            display: flex;
            justify-content: center;
            padding: 20px 0;
            >button{
                width: 78%;
                border: solid 1px #007eff;
                border-radius: 22px;
                height: 44px;
                color: #007eff;
                font-size: 17px;
            }
            >button:active{
                color: #007eff;
                background-color: #FFFFFF;
            }
            .loading{
              height: 44px;
              font-size: 16px;
              line-height: 44px;
              i{
                font-size: 16px;
                margin-right: 3px;
                color: #666;
              }
            }
        }
    }
</style>

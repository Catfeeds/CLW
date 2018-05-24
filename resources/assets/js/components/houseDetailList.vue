<template>
    <div class="rents">
        <div class="top">
            <h3 style="color:#333333">{{title}}写字楼出租</h3>
        </div>
        <house-list :list="list" goodImg='../images/house_detail_decoration.png'></house-list>
        <div class="more">
            <button type="button" @click='getData'>查看更多</button>
        </div>
    </div>
</template>
<script>

import houseList from './houseList'
export default {
  components:{ houseList },
  props: ['api', 'title', 'building'],
  data() {
      return {
          list: [],
          add: true,
          page: 1, // 当前请求页 
          status: true // 数据是否请求完毕
      }
  },
  methods: {
      // 数据请求逻辑判断
      getData: function() {
        var self = this
        if (!self.status) { // 防止多次点击
           return
        }
        self.status = false
          // 请求楼盘下的数据
          if (this.api === 1) { // 请求楼盘下下的数据
            $.ajax({
              url: '/buildings_office/' + self.building,
              type: 'GET',
              data: { page: self.page },
              success: function (data) {
                if (data.status) {
                  self.status = true
                  self.page++
                  data.data.data.map(item => {
                    self.list.push(item)
                  })
                }
              }
            })
          } else if(this.api === 2) { // 请求房源下的数据

          }
      }
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
                border-bottom:1px solid #f4f4f4;    
            }
        }
        >.more{
            display: flex;
            justify-content: center;
            margin: 20px 0;
            >button{
                width: 78%;
                border: solid 1px #007eff;
                border-radius: 22px;
                height: 44px;
                color: #007eff;
                font-size: 17px;
            }
        }
    }
</style>

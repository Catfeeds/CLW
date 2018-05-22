<template>
    <div class="rents">
        <div class="top">
            <h3 style="color:#333333">{{title}}写字楼出租</h3>
        </div>
        <house-list :list="list" goodImg='../images/house_detail_decoration.png'></house-list>
        <div class="more">
            <button type="button" v-if="status" @click='getMore'>查看更多</button>
        </div>
    </div>
</template>
<script>

import houseList from './houseList'
import { buildingOther, houseOther } from '../vendor/api'
export default {
  components:{ houseList },
  props: ['api', 'title'],
  data() {
      return {
          id: null,
          list: [],
          add: true,
          page: 1, // 当前请求页 
          status: true // 数据是否请求完毕
      }
  },
  updated() {
      this.$nextTick(function() {
          this.$emit('todetail')
      })
  },
  methods: {
      getMore: function() {
          if (!this.status) {
              return
          }
          this.status = false
          this.getData()
      },
      init: function(id) {
          this.list = [],
          this.page = 1, // 当前请求页 
          this.status = true // 数据是否请求完毕
          this.id = id 
          this.getData()
      },
      // 数据请求逻辑判断
      getData: function() {
          // 请求楼盘下的数据
          if (this.api === 1) {
              buildingOther(this.id, {page: this.page}).then(res => {
                  this.status = true
                if(res.data.data.length < res.data.per_page){
                    this.status = false
                }
                for(var item of res.data.data) {
                    this.list.push(item)
                }
                this.page = res.data.current_page + 1
              })
          } else if(this.api === 2) { // 请求房源下的数据
              houseOther(this.id, {page: this.page}).then(res => {
                if(res.data.data.length < res.data.per_page){
                    this.status = false
                } 
                for(var item of res.data.data) {
                    this.list.push(item)
                }
                this.page = res.data.current_page + 1
              })
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

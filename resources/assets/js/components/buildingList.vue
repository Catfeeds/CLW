<template>
  <div class="vueBuilding_list mui-table-view">
      <a class="building_item mui-table-view-cell" :href="'/buildings/'+itme.id" v-for="(itme, index) in list" :key="'buildingListVue' + index">
        <div class="img-box">
          <img :src="list[index].img_cn + cropStyle" :alt="list[index].name">
        </div>
        <div class="text-box" :class="{active: list[index].feature.length > 0}">
          <div class="title-box">{{list[index].name}}</div>
          <div class="num-box">
            <div class="allNum">{{list[index].house_count}}套</div>
            <div class="price">
              <span class="priceNum">{{list[index].avg_price}}</span>
              <span>元/㎡·月</span>
            </div>
          </div>
          <div class="position-box">
            <img class="position-img" :src="positionImg" alt="">
            <span>{{list[index].address_type}}</span>
          </div>
          <div class="speciality-box">
            <span v-for='(item, num) in list[index].feature' :key="'featunumre' + num" :class="labelClass[num]">{{item}}</span>
          </div>
        </div>
        <img v-if="list[index].label_cn" class="goodImg" :src="goodImg" alt="优">
      </a>
  </div>
</template>
<script>
export default {
   props: {
    positionImg: { // 定位图标
      type: String,
      default: ''
    },
    goodImg: { // 定位图标
      type: String,
      default: ''
    },
    list: {
      type: Array,
      default: []
    }
   },
  data() {
    return {
      labelClass: ['pink', 'green', 'blue'],
      cropStyle: process.env.config.cropStylist.newApp_list
    }
  },
  methods: {
    tobuildingDetail: function(item) {
      var webview_building = plus.webview.create( 'building_detail.html', 'building_detail.html', {}, {item: item} )
      setTimeout(function () {
        webview_building.show("slide-in-right", 300)
      }, 150)
      // const webView = plus.webview.getWebviewById('building_detail.html')
      // mui.fire(webView, 'get_building', {
      //   item: item,
      // })
      // setTimeout(function () {
      //   webView.show("slide-in-right", 300)
      // }, 150)
    }
  }
}
</script>
<style lang="scss" scoped>
.mui-table-view{
    &:before{height:0;background-color: #f4f4f4;}
    &:after{height:0}
  }
.vueBuilding_list{
  .mui-table-view-cell{
    &:before{height:0}
    &:after{height:0}
  }
  .building_item{
    padding: 15px;
    display: flex;
    position: relative;
    border-bottom: 1px solid rgb(244,244,244);
    &:last-child{
      border-bottom: none;
    }
    >img.goodImg{
      position: absolute;
      top: 0;
      right: 15px;
      width: 30px;
    }
    .img-box{
      width: 35%;
      // TODO: 图片具体设计比例尺寸应是多少
      img{
        width: 100%;
        height: 100%;
        border-radius: 3px;
      }
    }
    .text-box{
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: {
        left: 15px;
      }
      &.active{
        justify-content: space-between;
      }
      .title-box{
        font: {
          size: 16px;
        }
        color: #333333;
      }
      .num-box{
        display: flex;
        justify-content: space-between;
        color: #787878;
        .allNum{
          font-size: 13px;
        }
        .price{
          font-size: 13px;
          .priceNum{
            color: #ff7200;
            font-size: 15px;
            font-weight: 500;
          }
        }
      }
      .position-box{
         margin-bottom: 7px;
        .position-img{
          width: 8px;
        }
        span{
          font-size: 12px;
          color: #787878;
        }
      }
      .speciality-box{
        display: flex;
        span{
          padding: 0 5px;
          font-size: 12px;
          border-radius: 3px;
          margin-right: 5px;
          &.pink{
            background-color: #ffedf3;
            color: #d27b96;
          }
          &.green{
            background-color: #edfbee;
            color: #5ec86f;
          }
          &.blue{
            background-color: #ecf5ff;
            color: #6aa9d4;
          }
          &:last-child{
            margin-right: 0;
          }
        }
      }
    }
  }
}
</style>



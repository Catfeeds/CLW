<template>
  <div>
    <div class="data-list-item" v-for="(item, index) in dataList" :key="'history' + index">
      <a :href="type?'/buildings/'+item.id:'/office_building_houses/'+item.id" target="_blank">
        <div class="r-panel-img">
          <img :src="item.img + cropStyle">
        </div>
        <div class="r-panel-txt">
          <div class="p1">{{item.name}}</div>
          <div class="p2">{{item.rent}}</div>
          <div class="p3">可租面积: {{item.acreage}}</div>
          <div class="p3">{{item.address}}</div>
        </div>
      </a>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    list: { 
      type: Array,
      default: []
    },
    type: {
      type: Boolean,
      default: true
    }
  },
  data() {
    return {
      cropStyle: process.env.config.cropStylist.newApp_list
    }
  },
  computed: {
    dataList() {
      return this.list
    }
  }
}
</script>
<style lang="scss">
  .data-list-item{
    padding: 16px;
    border-bottom: 1px #ebeaea solid;
    display: block;
    overflow: hidden;
    &:hover{
      background-color: #f5f5f5;
    }
    &::after{
      content: "\0020";
      display: block;
      clear: both;
      height: 0;
      visibility: hidden;
    }
    .r-panel-img{
      font-size: 0;
      overflow: hidden;
      float: left;
      width: 104px;
      height: 78px;
      img{
        width: 100%;
      }
    }
    .r-panel-txt {
      float: left;
      padding-left: 10px;
      width: 129px;
      color: #333;
      div{
        font-size: 12px;
        padding: 0;
        margin: 0;
      }
      .p1{
        font-size: 14px;
        line-height: 22px;
        height: 22px;
        width: 136px;
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      .p2{
        line-height: 16px;
        padding-bottom: 6px;
        color: #007bff;
      }
      .p3{
        line-height: 16px;
        color: #999999;
      }
      .p4{
        float: left;
        padding-left: 10px;
        width: 136px;
        font-size: 12px;
        color: #999999;
      }
    }
  }
</style>

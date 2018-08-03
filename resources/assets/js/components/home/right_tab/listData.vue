<template>
  <div>
    <div class="data-list-item" v-for="(item, index) in list" :key="'history' + index">
      <a href="javascript:void(0);" target="_blank">
        <div class="r-panel-img">
          <img src="//fang-oss.haozu.com/cms/index/2017/04/05/6Ain7JjiSG.jpg@208w_156h_90q_1c_1e_1l|watermark=1&amp;object=aGFvenUucG5n&amp;t=90&amp;p=9&amp;x=10&amp;y=10">
        </div>
        <div class="r-panel-txt">
          <p class="p1">汉街万达尊</p>
          <p class="p2">3.3元/m²⋅月</p>
          <p class="p3">可租面积：111-317m²</p>
          <p class="p3">武昌&nbsp;-&nbsp;中北路</p>
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
      type: Number,
      default: 1
    }
  },
  created() {
    console.log('这是', this.type)
  }
}
</script>
<style lang="scss">
  .data-list-item{
    padding: 10px;
    border-bottom: 1px #ebeaea solid;
    display: block;
    overflow: hidden;
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
    }
    .r-panel-txt {
      float: left;
      padding-left: 10px;
      width: 136px;
      font-size: 12px;
      color: #333;
      p{
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
        color: #9496ad;
      }
      .p4{
        float: left;
        padding-left: 10px;
        width: 136px;
        font-size: 12px;
        color: #333;
      }
    }
  }
</style>

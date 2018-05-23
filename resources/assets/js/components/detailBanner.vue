<template>
  <swiper :options='options'>
      <swiper-slide v-for="(item,index) in list" :key="'banner'+index" style="position: relative;">
        <a href="#"><img :src="(item.url + cropStyle)" /></a>
        <div style="width:60px;height:26px;background:rgba(2,2,2,0.6);padding-left:10px;border-radius:20px;position:absolute;right:15px;bottom:40px;">
        <img :src="srcImg" style="width:12px;"/><span style="margin-left:5px;color:white;font-size: 14px;">{{index+1}}/{{list.length}}</span>
        </div>
      </swiper-slide>
    </swiper>
</template>
<script>
import { swiper, swiperSlide } from 'vue-awesome-swiper'
export default {
  props: ['list'],
  components: {
    swiper,
    swiperSlide
  },
  data() {
    return {
      cropStyle: process.env.config.cropStylist.newApp_detail,
      srcImg: '/we_img/none.png',
      options: {
        autoplay : 3000,
        autoplayDisableOnInteraction: false
      }
    }
  }
}
</script>


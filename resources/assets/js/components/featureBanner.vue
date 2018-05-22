<template>
  <swiper :options='options'>
    <swiper-slide v-for="(item,index) in list" :key="'feature'+index" style="position: relative;">
      <img :src="item.pic">
      <h5>{{item.name}}</h5>
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
      options: {
        slidesPerView : 4,
        slidesPerGroup : 4
      }
    }
  }
}
</script>

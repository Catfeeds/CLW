<template>
  <swiper :options='options'>
      <swiper-slide v-for="(item,index) in list" :key="'banner'+index" style="position: relative;">
        <a href="#"><img :src="addShearStr(item.url)" /></a>
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
    let cropStyle = process.env.config.cropStylist.newApp_detail
    if (true) { // TODO 判断依据
      cropStyle = process.env.config.cropStylist.newApp_detail_nologo
    }
    return {
      cropStyle: cropStyle,
      srcImg: '/we_img/none.png',
      options: {
        autoplay : 3000,
        autoplayDisableOnInteraction: false
      }
    }
  },
  methods: {
    /**
     * 添加自定义七牛样式的方法
     */
    addShearStr(url) {
      const tempArr = url.split('-')
      const inSelfUrlArr = window.location.href.split('/')
      console.log(inSelfUrlArr)
      if (tempArr[tempArr.length - 1] === 'test') { // 判断后端是否添加旋正样式 有则替换为自定义样式
        if (inSelfUrlArr.indexOf('buildings') !== -1) { // 判断当前是否为楼盘详情页面
          tempArr[tempArr.length - 1] = 'newApp_detail_nologo'
        } else {
          tempArr[tempArr.length - 1] = 'newApp_detail'
        }
      } else { // 添加自定义样式
        if (inSelfUrlArr.indexOf('buildings') !== -1) {
          tempArr[tempArr.length] = 'newApp_detail_nologo'
        } else {
          tempArr[tempArr.length] = 'newApp_detail'
        }
      }
      return tempArr.join('-')
    }
  }
}
</script>


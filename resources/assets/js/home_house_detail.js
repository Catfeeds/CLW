require('./home_common')
import { collect, cancelCollet } from './home_api'
import './components/home/login' // 登录组件
import './components/home/right_tab' // 侧边栏组件
const Swiper = require('swiper')
var detailMap = require('./components/detailMap.vue')
var findHouse = require('./components/findHouse.vue')
var Data = $('#props').data('data')
var rightTop = $('.findHouse').offset().top
var secondTop = $('.facilities').offset().top
// console.log('数据', $('.js_login'))
new Vue({
  el: '.facilities',
  components: { detailMap },
  data() {
    return {
      data: Data.gps
    }
  }
})
new Vue({
  el: '.findHouse',
  components: { findHouse }
})
// 轮播图
var smallImg = new Swiper('#smallImg', {
    direction: 'horizontal',
    slidesPerView: 'auto',
    spaceBetween: 8,
    noSwiping : true,
    noSwipingClass : 'stop-swiping',
})
var bigImg = new Swiper('#bigImg', {
    direction: 'horizontal',
})
for(var j=0;j<smallImg.slides.length;j++){
  smallImg.slides[j].index = j
  smallImg.slides[j].onmouseover=function(){
    bigImg.slideTo(this.index)
  }
}
// 点击上一页和下一页
$(document).on('click', '#next .active', function() {
  smallImg.slideNext()
  if(smallImg.isEnd) {
    $('#next').children('.active').removeClass('active').addClass('js_swiper').siblings().removeClass('js_swiper')
    $('#prev').children('.js_swiper').removeClass('js_swiper').addClass('active').siblings().addClass('js_swiper')
  }
})
$(document).on('click', '#prev .active', function() {
  smallImg.slidePrev()
  if(smallImg.isBeginning) {
    $('#prev').children('.active').removeClass('active').addClass('js_swiper').siblings().removeClass('js_swiper')
    $('#next').children('.js_swiper').removeClass('js_swiper').addClass('active').siblings().addClass('js_swiper')
  }
})

// 企业服务
var service = new Swiper('#service', {
  // direction: 'horizontal',
  slidesPerView: 7,
  slidesPerGroup: 7,
})
$('#serverPrev').on('click', function() {
  service.slidePrev()
})
$('#serverNext').on('click', function() {
  service.slideNext()
})

// 点击查看地图
$('.js_map').on('click', function() {
  $('html,body').animate({scrollTop: $('.facilitiesMap').offset().top - 60 + 'px'},500)
})

// 页面滚动
// $(window).scroll(function(){
//   var scrollTop = $(window).scrollTop()
//   if(((scrollTop + 60) >= rightTop) && ((scrollTop + 595) < secondTop)) {
//     $('.findHouse').addClass('location')
//     $('.findHouse').css('margin-top', '20px')
//   } else if((scrollTop <= rightTop) || ((scrollTop + 595) >= secondTop)) {
//     if((scrollTop + 595) >= secondTop) {
//       $('.findHouse').css('margin-top', secondTop-rightTop-518)
//       $('.findHouse').removeClass('location')
//     } else {
//       $('.findHouse').removeClass('location')
//     }
//   }
// })

// 点击收藏
$('.pircePic').on('click', function() {
  var obj = $(this).find('div')
  if(obj.hasClass('.active')) {
    obj.css('background', 'url(/home_img/house_detail_collect_before.png)')
    obj.removeClass('.active')
    cancelCollet(Data.id).then(res => {
      $('.collectTitle').css('color', '#666')
    })
  } else {
    obj.css('background', 'url(/home_img/house_detail_collect_after.png)')
    obj.addClass('.active')
    collect({ house_id: Data.id }).then(res => {
      $('.collectTitle').css('color', '#007bff')
    })
  }
})


require('./home_common')
const Swiper = require('swiper')
var detailMap = require('./components/detailMap.vue')
var findHouse = require('./components/findHouse.vue')
var Data = $('#props').data('data')
var rightTop = $('.findHouse').offset().top
var secondTop = $('.facilities').offset().top
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

// 点击查看地图
$('.js_map').on('click', function() {
  $('html,body').animate({scrollTop: $('.facilitiesMap').offset().top - 60 + 'px'},500)
})

// 点击委托找房
$('.order').on('click', function(){
  var val = $('#entrust').val()
  console.log('this is a test', val)
})

// 点击上一页和下一页
$('#prev').on('click', function() {
  smallImg.slidePrev()
})
$('#next').on('click', function() {
  smallImg.slideNext()
})

// 页面滚动
$(window).scroll(function(){
  var scrollTop = $(window).scrollTop()
  if(((scrollTop + 60) >= rightTop) && ((scrollTop + 420) < secondTop)) {
    $('.findHouse').addClass('location')
    $('.findHouse').css('margin-top', '20px')
  } else if((scrollTop <= rightTop) || ((scrollTop + 420) >= secondTop)) {
    if((scrollTop + 420) >= secondTop) {
      $('.findHouse').css('margin-top', secondTop-rightTop-335)
      $('.findHouse').removeClass('location')
    } else {
      $('.findHouse').removeClass('location')
    }
  }
})

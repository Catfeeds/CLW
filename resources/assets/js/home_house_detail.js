require('./home_common')
const Swiper = require('swiper')
var detailMap = require('./components/detailMap.vue')

new Vue({
  el: '.facilities',
  components: { detailMap },
  data() {
    return {
      data: [114.438748, 30.510597]
    }
  }
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

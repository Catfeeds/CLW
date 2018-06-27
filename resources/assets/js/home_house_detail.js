require('./home_common');
const Swiper = require('swiper');
var betterList = require('./components/betterList.vue');
new Vue({
  el: '#enjoy',
  components: {betterList}
})
// 轮播图
var smallImg = new Swiper('#smallImg', {
    direction: 'vertical',
    slidesPerView: 4,
    spaceBetween: 10,
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

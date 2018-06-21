require('./home_common');
const Swiper = require('swiper');
var betterList = require('./components/betterList.vue');
new Vue({
  el: '#third',
  components: {betterList}
})
// 轮播
var banner = new Swiper('#banner', {
  direction: 'horizontal',
  pagination: '.swiper-pagination',
  paginationClickable: true,
  paginationBulletRender: function(banner, index, className){
    return '<span class="'+ className +'"><img src="/we_img/banner'+ (index+1)+ '.jpg"></span>'
  },
})
// 点击导航
$('.filter div').on('click', function(){
  $(this).addClass('filterActive')
  $(this).siblings().removeClass('filterActive')
  var val = $(this).html()
  console.log('整体导航', val)
})
// 出租房源面积筛选
$('#rentAcreage span').on('click', function(){
  var acreage = $(this).html()
  console.log('面积筛选', acreage)
})
// 价格筛选
$('#price span').on('click', function(){
  var price = $(this).html()
  console.log(price)
})
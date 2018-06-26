require('./home_common');
const Swiper = require('swiper');
var betterList = require('./components/betterList.vue');
import LookForHouse from './components/mapLookForHouse'
new Vue({
  el: '.map',
  components: {LookForHouse}
})
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
  if(val == '出租房源') {
    document.getElementById('rent').scrollIntoView(true)
  } else if(val == '楼盘信息') {
    document.getElementById('buildInfor').scrollIntoView(true)
  } else if(val == '市场行情') {
    document.getElementById('quotation').scrollIntoView(true)
  } else if(val == '周边配套') {
    document.getElementById('second').scrollIntoView(true)
  } else if(val == '猜你喜欢') {
    document.getElementById('third').scrollIntoView(true)
  }
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

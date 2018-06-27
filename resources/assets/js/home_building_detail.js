require('./home_common');
const Swiper = require('swiper');
var betterList = require('./components/betterList.vue');
new Vue({
    el: '#third',
    components: {betterList}
  })
var banner = new Swiper('#banner', {
  direction: 'horizontal',
  pagination: '.swiper-pagination',
  paginationClickable: true,
  paginationBulletRender: function(banner, index, className){
    return '<span class="'+ className +'"><img src="/we_img/banner'+ (index+1)+ '.jpg"></span>'
  },
})
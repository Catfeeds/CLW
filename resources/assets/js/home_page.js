require('./home_common');
const Swiper = require('swiper')


var banner = new Swiper('.swiper-container',{
  pagination:'.swiper-pagination',
  paginationClickable:true,
  autoplay:2000,
  loop:true,
  paginationBulletRender:function(swiper,index,className){
    return "<span class='"+ className + "'>"+ "<div class='title1'>美百年</div><div class='title2'>武汉越秀财富中心</div>" +"</span>"
  },

})
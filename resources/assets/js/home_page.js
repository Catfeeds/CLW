require('./home_common');
const Swiper = require('swiper')
var mySwiper = new Swiper('.swiper-container',{
  pagination:{
    el:".swiper-pagination",
    bulletClass : "my-pagination"
  },
  aotoplay:true,
  loop:true
})
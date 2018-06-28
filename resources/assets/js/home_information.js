require('./home_common');
const Swiper = require('swiper');

var mySwiper1 = new Swiper('.swiper-container',{
    pagination : '.swiper-pagination',
    effect : 'fade',
    width: 770,
    onTransitionEnd:function (swiper) {
        console.log(swiper.activeIndex);
        mySwiper2.slideTo(swiper.activeIndex);
    }
})
var mySwiper2 = new Swiper('.swiper-container1',{
    effect : 'fade',
    fade: {
        crossFade: true,
    }
})

require('./home_common');
import './components/home/login'
const Swiper = require('swiper');

var mySwiper2 = new Swiper('.swiper-container1',{
    effect : 'fade',
    fade: {
        crossFade: true,
    }
})
var mySwiper1 = new Swiper('.swiper-container',{
    pagination : '.swiper-pagination',
    effect : 'fade',
    width: 770,
    autoplay : 5000,//可选选项，自动滑动
    autoplayDisableOnInteraction : false,
    onTransitionEnd:function (swiper) {
        console.log(swiper.activeIndex);
        mySwiper2.slideTo(swiper.activeIndex);
    }
})

$(".list-body-content").each(function(){
    var words = $(this).text().trim().length;
    if(words > 90){
        $(this).text($(this).text().trim().slice(0,90)+"......");
    }
})
require('./home_common');
const Swiper = require('swiper');
var mySwiper = new Swiper('.swiper-container', {
  autoplay: 3000
})
$(document).on('scroll', function(e) {
  if (e.target === document) {
    if($(document).scrollTop() >= $('.js_headerHeight')[0].offsetHeight) {
      if (!$('.js_navChange').hasClass('active')) {
        $('.js_navChange').addClass('active')
      }
    } else {
      if ($('.js_navChange').hasClass('active')) {
        $('.js_navChange').removeClass('active')
      }
    }
  }
})
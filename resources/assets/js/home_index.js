require('./home_common');
import './components/home/login' // 登录组件
import './components/home/right_tab' // 侧边栏组件
import { init } from './components/home/input_search' // 搜索组件
const Swiper = require('swiper');
new Swiper('.swiper-container', {
  autoplay: 3000
})
$(document).on('scroll', function(e) {
  if (e.target === document) {
    if($(document).scrollTop() >= $('.js_navChange')[0].offsetHeight) {
      if (!$('.js_navChange').hasClass('transition')) {
        $('.js_navChange').addClass('transition')
      }
    } else {
      if ($('.js_navChange').hasClass('transition')) {
        $('.js_navChange').removeClass('transition')
      }
    }
    if($(document).scrollTop() >= $('.js_headerHeight')[0].offsetHeight) {
      // 导航样式切换为白色
      if (!$('.js_navChange').hasClass('active')) {
        $('.js_navChange').addClass('active')
      }
      // 显示右侧工具栏
      if (!$('.js_rightTab').hasClass('active')) {
        $('.js_rightTab').addClass('active')
      }
    } else {
       // 导航样式切换为透明
      if ($('.js_navChange').hasClass('active')) {
        $('.js_navChange').removeClass('active')
      }
      // 隐藏右侧工具栏
      if ($('.js_rightTab').hasClass('active')) {
        $('.js_rightTab').removeClass('active')
      }
    }
  }
})
init('#searchInput')

window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
Vue.component('detail-banner', require('./components/detailBanner.vue'));
new Vue({
  el: '#vueContent',
  data: {
    imgList: []
  }
});
// 显示或者隐藏栋座信息
$('.top').click(function(){
    $('#collapse').toggleClass("mui-active")     
})
// 显示或者隐藏预约弹框
$('#order').click(function(){
    $('#popover').toggleClass('mui-popover')
})
// 关闭预约弹框
$('.closes').click(() => {
    $('#popover').addClass('mui-popover')
})
// 点击提交
$('#upload').click(() => {
    var name = $('#names').val()
    var tel = $('#tel').val()
    if (!name || name.trim() == '') {
        alert('请输入称谓')
    } else if (!tel || tel.trim() == '') {
        alert('请输入电话')
    } else {
        console.log('ceshi')
    }
})
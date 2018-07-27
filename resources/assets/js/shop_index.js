require('./home_common');
// require('./shop_header');
var index = 0 // 电梯导航下标
var f1Top = $('.louti1').offset().top-100
var f2Top = $('.louti2').offset().top-100
var f3Top = $('.louti3').offset().top-100
var f4Top = $('.louti4').offset().top-100
var f5Top = $('.louti5').offset().top-100
var f6Top = $('.louti6').offset().top-100
var f7Top = $('.louti7').offset().top-100
var off = true
console.log(f2Top, f3Top, f4Top, f5Top, f6Top, f7Top)
$(window).scroll(function() {
  var scrollTop = $(window).scrollTop()
  if(off) {
    if(scrollTop >= 600) {
      $('.elevator').show()
    } else {
      $('.elevator').hide()
    }
    $('.louti').each(function(i){
      //获取当前下标
      var index = $(this).index();
      var height = $(this).offset().top+500;//获取上偏移值
      console.log('haizaiceshi', height)
      if(height > scrollTop){//优先原则
        console.log('ssssss', index)
          $('.louti').eq(index).addClass('active').siblings().removeClass('active');
          return false;//跳出遍历
      };
    })
  }
})
$('.elevator>.elevator_list>.louti').on('click', function() {
  off = false
  $(this).addClass('active').siblings().removeClass('active')
  index = $(this).index() + 1
  console.log(index)
  //通过拼接字符串获取元素，再取得相对于文档的高度
  var top = $(".louti" + index).offset().top;
  //scrollTop滚动到对应高度
  $("body,html").animate({ scrollTop: top-30 }, 500, function() { off = true });
  console.log('adsafsdf', top)
})
// 页面滚动监听到达几楼
// function detection() {
//   var scrollTop = $(document).scrollTop()
//   console.log('vvvvvv', scrollTop)
//   if(scrollTop >= f7Top) {
//     console.log(11111)
//     $('.louti').eq(6).addClass('active').siblings().removeClass('active')
//   } else if(scrollTop >= f6Top) {
//     console.log(22222)
//     $('.louti').eq(5).addClass('active').siblings().removeClass('active')
//   } else if(scrollTop >= f5Top) {
//     console.log(33333)
//     $('.louti').eq(4).addClass('active').siblings().removeClass('active')
//   } else if(scrollTop >= f4Top) {
//     console.log(44444)
//     $('.louti').eq(3).addClass('active').siblings().removeClass('active')
//   } else if(scrollTop >= f3Top) {
//     console.log(555555)
//     $('.louti').eq(2).addClass('active').siblings().removeClass('active')
//   } else if(scrollTop >= f2Top) {
//     console.log(66666)
//     $('.louti').eq(1).addClass('active').siblings().removeClass('active')
//   } else if(scrollTop >= f1Top) {
//     console.log(77777)
//     $('.louti').eq(0).addClass('active').siblings().removeClass('active')
//   }
// }
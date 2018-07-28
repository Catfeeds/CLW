require('./home_common');
require('./shop_header');
var index = 0 // 电梯导航下标
var off = true // 避免点击与滚动事件重合
var isClick = true // 避免点击后动画还未完成就进行下一个点击事件
  $('.elevator>.elevator_list>.louti').on('click', function() {
    if(isClick) {
    off = false
    isClick = false
    $(this).addClass('active').siblings().removeClass('active')
    index = $(this).index() + 1
    //通过拼接字符串获取元素，再取得相对于文档的高度
    var top = $(".louti" + index).offset().top;
    //scrollTop滚动到对应高度
    $("body,html").animate({ scrollTop: top-30 }, 500, function() { 
      off = true
      isClick = true  
    })
  }
  })

$(window).scroll(function() {
  var scrollTop = $(document).scrollTop()
  if(off) {
    if(scrollTop >= 500) {
      $('.elevator').show()
    } else {
      $('.elevator').hide()
    }
    for (var i=1; i <= $('.louti').length; i++) {
      if(($('.louti' + i).offset().top-scrollTop - 200) < ($('.louti' + i).height()/2)) {
        $('.louti').eq(i-1).addClass('active').siblings().removeClass('active')
      }
    }
  }
})

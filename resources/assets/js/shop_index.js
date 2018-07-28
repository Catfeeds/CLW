require('./shop_common');
require('./shop_header');
var index = 0 // 电梯导航下标
var off = true // 避免点击与滚动事件重合
var isClick = true // 避免点击后动画还未完成就进行下一个点击事件
$('.elevator>.elevator_list>.louti').on('click', function() {
  // 上一个动画完成之后才能进行下一个点击事件
  if(isClick) {
    off = false
    isClick = false
    index = $(this).index() + 1 // 获取当前的下边
    $(this).addClass('active').siblings().removeClass('active')
    if(index == 1) {
      $(this).css('background', '#6ca7ed').siblings().css('background', '#f4f4f4')
    } else if(index == 2) {
      $(this).css('background', '#ff8a6a').siblings().css('background', '#f4f4f4')
    } else if(index == 3) {
      $(this).css('background', '#ffac62').siblings().css('background', '#f4f4f4')
    } else if(index == 4) {
      $(this).css('background', '#7881fe').siblings().css('background', '#f4f4f4')
    } else if(index == 5) {
      $(this).css('background', '#5ac36d').siblings().css('background', '#f4f4f4')
    } else if(index == 6) {
      $(this).css('background', '#e690fc').siblings().css('background', '#f4f4f4')
    } else if(index == 7) {
      $(this).css('background', '#71ca82').siblings().css('background', '#f4f4f4')
    }
    //通过拼接字符串获取元素，再取得相对于文档的高度
    var top = $(".louti" + index).offset().top;
    //scrollTop滚动到对应高度
    $("body,html").animate({ scrollTop: top-30 }, 500, function() { 
      off = true
      isClick = true  
    })
  }
})
// 页面滚动事件
$(window).scroll(function() {
  var scrollTop = $(document).scrollTop() // 获取页面滚动距离
  if(off) { // 点击事件完成之后再进行滚动监听
    if(scrollTop >= 550) { // 滚动距离大于500时候滚动条显示
      $('.elevator').show()
    } else {
      $('.elevator').hide() 
    }
    for (var i=1; i <= $('.louti').length; i++) {
      // 如果元素到浏览器顶部的距离减去页面滚动的距离小于元素本身高度的一半时导航栏亮灯
      if(($('.louti' + i).offset().top-scrollTop - 150) < ($('.louti' + i).height()/2)) {
        var val = $('.louti').eq(i-1).html() // 到达楼层的innerHtml
        var dom = $('.louti').eq(i-1)
        dom.addClass('active').siblings().removeClass('active')
        if(val == '工商财税') {
          dom.css('background', '#6ca7ed').siblings().css('background', '#f4f4f4') 
        } else if(val == '办公设备') { 
          dom.css('background', '#ff8a6a').siblings().css('background', '#f4f4f4')
        } else if(val == '入驻服务') {
          dom.css('background', '#ffac62').siblings().css('background', '#f4f4f4')
        } else if(val == '办公家具') {
          dom.css('background', '#7881fe').siblings().css('background', '#f4f4f4')
        } else if(val == '装修服务') {
          dom.css('background', '#5ac36d').siblings().css('background', '#f4f4f4')
        } else if(val == '热销机型') {
          dom.css('background', '#e690fc').siblings().css('background', '#f4f4f4')
        } else if(val == '热销绿植') {
          dom.css('background', '#71ca82').siblings().css('background', '#f4f4f4')
        }
      }
    }
  }
})

// 点击回到顶部
$('.js_backTop').on('click', function() {
  $("body,html").animate({scrollTop: 0}, 500)
})

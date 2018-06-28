require('./we_common')
function is_weixin() {
  var ua = navigator.userAgent.toLowerCase();
  if (ua.match(/MicroMessenger/i) == "micromessenger") {
      return true;
  } else {
      return false;
  }
}

var winHeight = typeof window.innerHeight !== 'undefined' ? window.innerHeight : document.documentElement.clientHeight;
$("#weixinTip").css({
  "height":winHeight
});
// 下载按钮监听事件
$('a.js_down-btn').on('click',function () {
  if(is_weixin()){
      $("#weixinTip").show();
      return false;
  }
})
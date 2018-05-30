window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
// 登陆者客户端判断
window.whatBrowser = function() {
  var ua = navigator.userAgent.toLowerCase();
  var isWeixin = ua.indexOf('micromessenger') != -1;
  if (isWeixin) {
      return '微信端';
  }else{
      return '移动web端';
  }
}
// 发送客服电话点击统计
window.auditToServer = function(string) {
  var str = whatBrowser() + string
  $.ajax({
    url: '/consult_tels',
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      page_source: str
    },
    success: function(data) {
      console.log('记录成功')
    },
    error: function(err) {
      console.warn('记录失败')
    }
  })
}
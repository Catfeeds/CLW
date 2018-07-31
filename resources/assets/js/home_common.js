/**
 * Created by zxz1992 on 2018/6/5.
 */
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');

window.sourcePage = function(name) { 
  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)","i"); 
  var r = window.location.search.substr(1).match(reg); 
  if (r!=null) {
    const int = parseInt(r[2])
    switch (int) {
      case 1:
        return '首页顶部banner'
      case 2:
        return '首页侧边栏'
      case 3:
        return '首页下部banner'
      case 4:
        return '楼盘列表页侧边栏'
      case 5:
        return '楼盘详情页侧边栏'
      case 6:
        return '房源详情页侧边栏'
      default: 
        return null
    }
  }
}
  
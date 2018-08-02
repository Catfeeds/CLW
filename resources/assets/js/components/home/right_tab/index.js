import { Popover, Tooltip } from 'element-ui';
import Cookies from 'js-cookie'
import historyBox from './historyBox'
const _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?a8bb44e51deceeae65bac46930eab06e";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();
const ElPopover = Popover
const ElTooltip = Tooltip
if ($('meta[name="storeId"]').length !== 0) { // 判断当前是否为详情页面
  var dataStr = Cookies.get($('meta[name="storeId"]').data('type')), // 取出当前页面所对应的cookie存储值
  dataArr = [], // 初始化临时变量
  newItem = $('meta[name="storeId"]').attr('content'), // 取出当前页面的id
  inTenYear = new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 365 * 10) // 设置十年的cookie有效期
  if (dataStr) { // 如果cookie存在
    dataArr = dataStr.split(",") // 将字符串转数组存入临时数组
    if (dataArr.indexOf(newItem) === -1) { // 判断当前为新浏览记录
      dataArr.push(newItem) // 压入临时数组
      dataStr = dataArr.join(',') // 临时数组转字符串
      Cookies.set($('meta[name="storeId"]').data('type'), dataStr, { // 重新新存入
        expires: inTenYear
      })
    }
  } else {
    Cookies.set($('meta[name="storeId"]').data('type'), newItem, { // 直接存入
      expires: inTenYear
    })
  }
}
new Vue({
  el: '#rightTab',
  components: { ElPopover, ElTooltip, historyBox },
  mounted:function() {
    document.getElementById('popoper').style = ''
  }
})
$(document).on('click', '.js_bankTop', function() {
  $('html, body').animate({scrollTop:0}, 'slow');
})
$(document).on('click', '.js_clickCustomerService', function() {
  $('#nb_icon_wrap').trigger('click')
})
$(document).on('click', '.js_clickShowHistory', function() {
  $('.js_rightTab').addClass('click-history-active')
})
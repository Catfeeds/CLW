import { Popover, Tooltip } from 'element-ui';
const _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?a8bb44e51deceeae65bac46930eab06e";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();
const ElPopover = Popover
const ElTooltip = Tooltip
new Vue({
  el: '#rightTab',
  components: { ElPopover, ElTooltip },
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
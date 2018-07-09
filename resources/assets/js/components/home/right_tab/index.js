import { Popover, Tooltip } from 'element-ui';
const ElPopover = Popover
const ElTooltip = Tooltip
new Vue({
  el: '#rightTab',
  components: { ElPopover, ElTooltip },
  mounted:function() {
    document.getElementById('popoper').style = ''
  }
})
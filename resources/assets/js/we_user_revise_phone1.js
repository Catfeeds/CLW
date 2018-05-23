window.$ = window.jQuery = require('jquery');
// 跳转至下一步
$(document).on('touchend || tap', '.loginOut', function(){
    window.location.href = '/reset_tel_view'
})
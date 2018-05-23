window.$ = window.jQuery = require('jquery');
// 跳转至修改密码页面
$(document).on('touchend || tap', '#revisePwd', function(){
    window.location.href = '/revise_password'
})
// 跳转至修改手机页面
$(document).on('touchend || tap', '#reviseTel', function(){
    window.location.href = '/revise_phone1'
})
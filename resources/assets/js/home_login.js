require('./home_common')
require('jquery-validation')



$(function(){
  $().ready(function(){
    $("#login_form").validate({
      rules: {
        username: {required: true,minlength: 5},
        password: {required: true,minlength: 8}
      },
      message: {
        username: {required:"用户名不能为空", minlength: "请输入正确的用户名"},
        password: "请输入正确的密码"
      },
    })
  });
  
})

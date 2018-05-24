window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
$(document).on('touchend || tap','.loginBtn button',(e)=> {
  var tel = $('#tel').val(),
    password = $('#password').val();
  // 判断数据是否存在
  if (!tel || tel.trim() === '') {
    Toast({
        message: '请输入手机号码',
        position: 'top',
        duration: 2000
    })
  } else if (!password || password.trim() === '') {
    Toast({
        message: '请输入密码',
        position: 'top',
        duration: 2000
    })
  } else if (password.length < 6 || password.length > 18) {
    Toast({
        message: '密码长度必须在6-18位之间',
        position: 'top',
        duration: 2000
    })
  } else {
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/logins",
          type: 'post',
          data:{
              tel: tel,
              password: password
          },
          success: function(data){
              if(data.status) {
                Toast({
                    message: data.message,
                    position: 'top',
                    duration: 2000
                })
                  window.location.href = '/user'
              }
          },
          error: function (data) {
            Toast({
                message: data.responseJSON.message,
                position: 'top',
                duration: 2000
            })
          }
      });
  }
});
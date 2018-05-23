window.$ = window.jQuery = require('jquery');
$(document).on('touchend || tap','.loginBtn button',(e)=> {
  var tel = $('#tel').val(),
    password = $('#password').val();
  // 隐藏键盘
  $('#tel').blur();
  $('#password')[0].blur();
  // 判断数据是否存在
  if (!tel || tel.trim() === '') {
    alert('请输入手机号码');
  } else if (!password || password.trim() === '') {
    alert('请输入密码');
  } else if (password.length < 6) {
    alert('密码最小长度为6')
  } else if (password.length > 18) {
    alert('密码最大长度为18')
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
              alert(data.message)
              if(data.success) {
                  window.location.href = '/user'
              }
          },
          error: function (data) {
              alert(data.responseJSON.message);
          }
      });
  }
});
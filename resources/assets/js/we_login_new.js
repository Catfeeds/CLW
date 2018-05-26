window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
$(document).on('click','.loginBtn button',(e)=> {
  var tel = $('#tel').val(),
    password = $('#password').val();
  // 判断数据是否存在
  if (!tel || tel.trim() === '') {
    Toast({
        message: '请输入手机号码',
        position: 'center',
        duration: 2000
    })
  } else if (!password || password.trim() === '') {
    Toast({
        message: '请输入密码',
        position: 'center',
        duration: 2000
    })
  } else if (password.length < 6 || password.length > 18) {
    Toast({
        message: '密码长度必须在6-18位之间',
        position: 'center',
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
              if(data.success) {
                var toast = Toast({
                    message: data.message,
                    position: 'center',
                    duration: 5000
                })
                setTimeout(() => {
                    toast.close()
                    window.location.href = '/user'
                },1000)
              }
          },
          error: function (res) {
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            })
          }
      });
  }
});
//处理安卓兼容性问题
var height = window.innerHeight; //获取当前浏览器窗口高度
console.log(height)
$(window).resize(function(){
    if (window.innerHeight < height) {
        $('#agree').removeClass('agree') //也可以在scss文件中写个类名
        $('#agree').addClass('active')
    } else {
        $('#agree').removeClass('active')
        $('#agree').addClass('agree')
    }
})
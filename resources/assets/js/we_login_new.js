/**
 * Created by zxz1992 on 2018/5/22.
 */
import ajax from './request'
import { setCookie } from './auth'
var request = ajax();
window.$ = window.jQuery = require('jquery');
$('.loginBtn').on('click','button',(e)=> {
  var tel = $('#tel')[0].value,
    password = $('#password')[0].value;
  // 隐藏键盘
  $('#tel')[0].blur();
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
    request({
      url: 'logins',
      method: 'post',
      data: {
        tel,
        password
      }
    }).then(res => {
      if(res.data.status){
        alert('登录成功')
        document.cookie = "access_token="+res.data.token+";path=/"
        // setCookie("access_token", res.data.token)
      }
    })
  }
});
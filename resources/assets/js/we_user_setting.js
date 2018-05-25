window.$ = window.jQuery = require('jquery');
import { Toast } from 'mint-ui'
import 'mint-ui/lib/style.css'
// 获取电话号码并处理
var tel = $('#tel').html()
console.log('ceshi', tel)
var newTel = tel.slice(0,3) + '****' + tel.slice(7)
$('#tel').html(newTel)
// 跳转至修改密码页面
$(document).on('touchend || tap', '#revisePwd', function(){
    window.location.href = '/revise_password'
})
// 跳转至修改手机页面
$(document).on('touchend || tap', '#reviseTel', function(){
    window.location.href = '/old_tel_validate_view'
})
// 退出登录
$(document).on('touchend || tap', '.loginOut', function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/logout",
        type: 'get',
        success: function(data){
            var toast = Toast({
                message: data.message,
                position: 'center',
                duration: 5000
            })
            setTimeout(() => {
                toast.close()
                window.location.href = '/user'
            },2000)
        },
        error: function (res) {
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            })
        }
    });
})
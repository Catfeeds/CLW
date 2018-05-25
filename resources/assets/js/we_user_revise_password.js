window.$ = window.jQuery = require('jquery')
import { Toast } from 'mint-ui'
import 'mint-ui/lib/style.css'
$(document).on('touchend || tap', '.loginOut', function(){
    var old_pwd = $('#oldPwd').val()
    var new_pwd = $('#newPwd').val()
    var confirmPwd = $('#confirmPwd').val()
    if(!old_pwd || old_pwd.trim() == ''){
        Toast({
            message: '请输入旧密码',
            position: 'center',
            duration: 2000
        })
    } else if(!new_pwd || new_pwd.trim() == ''){
        Toast({
            message: '请输入新密码',
            position: 'center',
            duration: 2000
        })
    } else if(!confirmPwd || confirmPwd.trim() == ''){
        Toast({
            message: '确认密码不能为空',
            position: 'center',
            duration: 2000
        })
    } else if(old_pwd.length < 6 || old_pwd.length > 18){
        Toast({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        })
    } else if(new_pwd.length < 6 || new_pwd.length > 18){
        Toast({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        })
    } else if(new_pwd !== confirmPwd){
        Toast({
            message: '确认密码与新密码必须一致',
            position: 'center',
            duration: 2000
        })
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/reset_pwd",
            type: 'post',
            data:{
                old_pwd: old_pwd,
                new_pwd: new_pwd
            },
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
            error: function (data) {
                Toast({
                    message: data.responseJSON.message,
                    position: 'center',
                    duration: 5000
                })
            }
        });
    }
})
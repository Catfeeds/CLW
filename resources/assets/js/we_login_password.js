window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms'),
    password = $('#password'),
    getSmsType = true;

$(document).on('click', '#getSms', (e) => {
    if (!tel.val() || tel.val().trim() === '') {
        Toast({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        })
        return false
    }
    if(!getSmsType) {
        return false
    } else {
        getSmsType = false
    }
    var pathStr = tel.val() + '/' + 'retrieve_password';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/sms/captcha/' + pathStr,
        type: 'get',
        success: function (res) {
            if (res.success) {
                getSms.html(120 + 's');
                var time = setInterval(function () {
                    getSms.html((parseInt(getSms.html()) - 1) + 's');
                    if (!parseInt(getSms.html())) {
                        getSmsType = true;
                        getSms.html('获取验证码');
                        window.clearInterval(time);
                    }
                }, 1000);
                Toast({
                    message: '短信发送成功',
                    position: 'center',
                    duration: 2000
                })
            }
        },
        error: function (res) {
            getSmsType = true;
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            })
        }
    });
});
$(document).on('click','.loginBtn button',(e)=> {
    var tel_num = tel.val(), smsCode_num = smsCode.val(), password_num = password.val();

    if (!tel_num || tel_num.trim() === '') {
        Toast({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        })
        return false
    }
    if (!smsCode_num || smsCode_num.trim() === '') {
        Toast({
            message: '请输入验证码',
            position: 'center',
            duration: 2000
        })
        return false
    }
    if (!password_num || password_num.trim() === '') {
        Toast({
            message: '请输入密码',
            position: 'center',
            duration: 2000
        })
        return false
    }
    if (password_num.length < 6 || password_num.length > 18) {
        Toast({
            message: '密码长度必须在6-18位之间',
            position: 'center',
            duration: 2000
        })
        return false
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/retrieve_pwd",
        type: 'post',
        data:{
            tel: tel_num,
            smsCode: smsCode_num,
            password: password_num
        },
        success: function(data){
            if (data.success) {
                var toast = Toast({
                    message: data.message,
                    position: 'center',
                    duration: 2000
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
});
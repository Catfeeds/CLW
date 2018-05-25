window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
var tel = $('#tel'),smsCode = $('#sms'),getSms = $('#getSms');
$(document).on('touchend || tap','.loginBtn button',(e)=> {
    var tel_num = tel.val(), smsCode_num= smsCode.val();

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
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/quick_login",
        type: 'post',
        data:{
            tel: tel_num,
            smsCode: smsCode_num
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

$(document).on('touchend || tap', '#getSms', (e) => {
    var tel_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
        Toast({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        })
        return false
    }
    var pathStr = tel_num + '/' + 'login';
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
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            })
        }
    });
});

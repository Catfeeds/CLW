window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
// 获取电话号码并处理
var tel = $('.tel').html()
var newTel = tel.slice(0,3) + '****' + tel.slice(7)
$('.tel').html(newTel)
// 获取验证码
$(document).on('touchend || tap', '#getSms', function(){
    var pathStr = tel +'/reset_tel';
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
                    position: 'top',
                    duration: 2000
                })
            }
        },
        error: function (res) {
            Toast({
                message: responseJSON.message,
                position: 'top',
                duration: 2000
            })
        }
    });
})
// 跳转至下一步
$(document).on('touchend || tap', '.loginOut', function(){
    var smsCode = $('#setSms').val()
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/old_tel_validate",
        type: 'post',
        data:{
            tel: tel,
            smsCode: smsCode
        },
        success: function(data){
            var toast = Toast({
                message: data.message,
                position: 'top',
                duration: 5000
            })
            setTimeout(() => {
                toast.close()
                window.location.href = '/reset_tel_view'
            },2000)
        },
        error: function (data) {
            Toast({
                message: data.responseJSON.message,
                position: 'top',
                duration: 5000
            })
        }
    });
})
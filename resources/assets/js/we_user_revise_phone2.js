require('./we_common')
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
var getSmsType = true;
// 获取验证码
$(document).on('click', '#getSms', function(){
    if(!getSmsType) {
        return false
    } else {
        getSmsType = false
    }
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
})
// 修改电话号码
$(document).on('click', '.loginOut button', function(){
    var tel = $('#tel').val()
    var smsCode = $('#sms').val()
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/reset_tel",
        type: 'post',
        data:{
            tel: tel,
            smsCode: smsCode
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
            },1000)
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
require('./we_common')
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
var tel = $('#tel'),
    smsCode = $('#sms'),
    getSms = $('#getSms'),
    getSmsType = true;
$(document).on('click','.loginBtn button',(e)=> {
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

$(document).on('click', '#getSms', (e) => {
    console.log('censhiceshi ')
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
    if(!getSmsType) {
        return false
    } else {
        getSmsType = false
    }
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
            getSmsType = true
            Toast({
                message: res.responseJSON.message,
                position: 'center',
                duration: 2000
            })
        }
    });
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
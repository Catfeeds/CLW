window.$ = window.jQuery = require('jquery');
var tel = $('#tel'),smsCode = $('#sms'),getSms = $('#getSms'), password = $('#password');

$(document).on('touchend || tap', '#getSms', (e) => {
    if (!tel.val() || tel.val().trim() === '') {
        alert('请输入手机号码');
        return false
    }
    var pathStr = tel.val() + '/' + 'register';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/sms/captcha/' + pathStr,
        type: 'get',
        success: function (res) {
            if (res.data) {
                getSms.html(120 + 's');
                var time = setInterval(function () {
                    getSms.html((parseInt(getSms.html()) - 1) + 's');
                    if (!parseInt(getSms.html())) {
                        getSms.html('获取验证码');
                        window.clearInterval(time);
                    }
                }, 1000);
                alert('短信发送成功');
            }
        },
        error: function (res) {
            alert(responseJSON.message);
        }
    });
});

$(document).on('touchend || tap','.loginBtn button',(e)=> {
    var tel_num = tel.val(), smsCode_num = smsCode.val(), password_num = password.val();

    if (!tel_num || tel_num.trim() === '') {
        alert('请输入手机号码');
        return false
    }
    if (!smsCode_num || smsCode_num.trim() === '') {
        alert('请输入验证码');
        return false
    }
    if (!password_num || password_num.trim() === '') {
        TopTips({
            message: '请输入密码',
            duration: 3000
        })
        return false
    }
    if (password_num.length < 6) {
        TopTips({
            message: '密码最小长度为6',
            duration: 3000
        })
        return false
    }
    if (password_num.length > 18) {
        TopTips({
            message: '密码最大长度为18',
            duration: 3000
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
            alert(data.message);
            if (data.success) {
                window.location.href = '/user'
            }
        },
        error: function (data) {
            alert(data.responseJSON.message);
        }
    });
});
/**
 * Created by zxz1992 on 2018/5/22.
 */
window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
var tel = $('#tel'), sms = $('#sms'), password = $('#password'), time = $('#time'), getSms = $('#getSms');

$(document).on('touchend || tap', '#submit', (e) => {
    var tel_num = tel.val(), sms_num = tel.val(), password_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
        Toast({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        })
        return false
    }
    if (!sms_num || sms_num.trim() === '') {
        Toast({
            message: '请输入短信验证码',
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
    var data = {tel: tel_num, smsCode: sms_num, password: password_num};
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'registers',
        type: 'post',
        success: function (res) {
            if (res.status) {
                Toast({
                    message: '登录成功',
                    position: 'center',
                    duration: 2000
                })
                window.location.href = '/user'
            } else {
                Toast({
                    message: res.data.message,
                    position: 'center',
                    duration: 2000
                })
            }
        },
        error: function (res) {
            Toast({
                message: responseJSON.message,
                position: 'center',
                duration: 2000
            })
        }
    });
});
$(document).on('touchend || tap', '#getSms', (e) => {
    if (!tel.val() || tel.val().trim() === '') {
        Toast({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        })
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
                message: responseJSON.message,
                position: 'center',
                duration: 2000
            })
        }
    });
});

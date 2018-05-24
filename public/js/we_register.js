webpackJsonp([11],{

/***/ 103:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(104);


/***/ }),

/***/ 104:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/22.
 */
window.$ = window.jQuery = __webpack_require__(0);
var tel = $('#tel'),
    sms = $('#sms'),
    password = $('#password'),
    time = $('#time'),
    getSms = $('#getSms');

$(document).on('touchend || tap', '#submit', function (e) {
    var tel_num = tel.val(),
        sms_num = tel.val(),
        password_num = tel.val();
    if (!tel_num || tel_num.trim() === '') {
        alert('请输入手机号码');
        return false;
    }
    if (!sms_num || sms_num.trim() === '') {
        alert('请输入短信验证码');
        return false;
    }
    if (!password_num || password_num.trim() === '') {
        alert('请输入密码');
        return false;
    }
    if (password_num.length < 6) {
        alert('密码最小长度为6');
        return false;
    }
    if (password_num.length > 18) {
        alert('密码最大长度为18');
        return false;
    }
    var data = { tel: tel_num, smsCode: sms_num, password: password_num };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'registers',
        type: 'post',
        success: function success(res) {
            if (res.status) {
                alert('登录成功');
            } else {
                alert(res.data.message);
            }
        },
        error: function error(res) {
            alert(responseJSON.message);
        }
    });
    request({
        url: 'registers',
        type: 'post',
        data: data
    }).then(function (res) {
        if (res.status) {
            alert('登录成功');
        } else {
            alert('res.data.message');
        }
    });
});
$(document).on('touchend || tap', '#getSms', function (e) {
    if (!tel.val() || tel.val().trim() === '') {
        alert('请输入手机号码');
        return false;
    }
    var pathStr = tel.val() + '/' + 'register';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/sms/captcha/' + pathStr,
        type: 'get',
        success: function success(res) {
            if (res.success) {
                getSms.html(120 + 's');
                var time = setInterval(function () {
                    getSms.html(parseInt(getSms.html()) - 1 + 's');
                    if (!parseInt(getSms.html())) {
                        getSms.html('获取验证码');
                        window.clearInterval(time);
                    }
                }, 1000);
                alert('短信发送成功');
            }
        },
        error: function error(res) {
            alert(responseJSON.message);
        }
    });
});

/***/ })

},[103]);
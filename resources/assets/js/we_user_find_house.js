window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
// 提交
$(document).on('click', '.loginOut button', function(){
    var appellation = $('#appellation').val()
    var tel = $('#tel').val()
    var demand = $('#requirement').val()
    if(!appellation || appellation.trim() == ''){
        Toast({
            message: '请输入称谓',
            position: 'center',
            duration: 2000
        })
    } else if(!tel || tel.trim() == ''){
        Toast({
            message: '请输入手机号码',
            position: 'center',
            duration: 2000
        })
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/bespeaks",
            type: 'post',
            data:{
                tel: tel,
                appellation: appellation,
                demand: demand,
                page_source: '微信个人中心页'
            },
            success: function(data){
                var toast = Toast({
                    message: '信息提交成功，楚楼网30分钟内联系您',
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
    }    
})
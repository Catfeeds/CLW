window.$ = window.jQuery = require('jquery');
import 'mint-ui/lib/style.css'
import { Toast } from 'mint-ui';
// 提交
$(document).on('touchend || tap', '.loginOut', function(){
    var appellation = $('#appellation').val()
    var tel = $('#tel').val()
    var demand = $('#requirement').val()
    if(!appellation || appellation.trim() == ''){
        alert('请输入称谓')
    } else if(!tel || tel.trim() == ''){
        alert('请输入手机号码')
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
                demand: demand
            },
            success: function(data){
                var toast = Toast({
                    message: data.message,
                    position: 'top',
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
                    position: 'bottom',
                    duration: 5000
                })
            }
        });
    }    
})
window.$ = window.jQuery = require('jquery');
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
                alert(data.message)
                window.location.href = '/user'
            },
            error: function (data) {
                alert(data.responseJSON.message);
            }
        });
    }    
})
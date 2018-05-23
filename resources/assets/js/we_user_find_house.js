window.$ = window.jQuery = require('jquery');
// 提交
$(document).on('touchend || tap', '.loginOut', function(){
    var appellation = $('#appellation').val()
    var tel = $('#tel').val()
    if(!appellation || appellation.trim() == ''){
        alert('请输入称谓')
    } else if(!tel || tel.trim() == ''){
        alert('请输入手机号码')
    } else {
        console.log('who are you')
    }    
})
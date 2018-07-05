require('./home_common');
require('jquery-validation');
const url = process.env.homeHostUrl
console.log('url', url)
var type = $("#commentForm").validate({
    rules: {
        tel: {
            required: true,
            maxlength: 16
        },
        appellation: {
            required: true,
            maxlength: 32
        }
    },
    messages: {
        tel: {
            required: "请输入电话",
            minlength: "电话长度格式错误"
        },
        appellation: {
            required: "请输入联系人",
            maxlength: "联系人最长不能超过32"
        }
    },
    submitHandler: function(form) {
       $.ajax({
           type: 'post',
           url: url+'/bespeaks',
           data: $('#commentForm').serialize(),
           success: function (data) {
               alert(data.message)
           },
           error: function (data) {
               alert(data.responseJSON.message)
               console.log('erro', data)
           }
       })
    }
})

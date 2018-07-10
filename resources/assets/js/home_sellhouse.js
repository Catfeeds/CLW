require('./home_common');
import './components/home/login'
require('jquery-validation');
import { factorFindHouse } from './home_api'
import { Message } from 'element-ui';
const url = process.env.homeHostUrl
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
        console.log(form)
        var data = new FormData(form)
        factorFindHouse(data).then(res => {
            if (res.success) {
                Message({
                    message: '委托成功，楚楼网10分钟内联系您',
                    type: 'success'
                })
                form.reset()
            }
        })
    }
})

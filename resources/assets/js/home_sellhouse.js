require('./home_common');
import './components/home/login'
require('jquery-validation');
import { factorFindHouse } from './home_api'
import { Message } from 'element-ui';
import 'bootstrap-sass/assets/javascripts/bootstrap/tooltip.js' // 引入bootstrap提示工具对应js文件
import 'bootstrap-sass/assets/javascripts/bootstrap/popover.js' // 引入bootstrap弹出框对应js文件
const url = process.env.homeHostUrl
$('.submit').on('click', function() {
})
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
            maxlength: "电话长度格式错误"
        },
        appellation: {
            required: "请输入联系人",
            maxlength: "联系人最长不能超过32"
        }
    },
    showErrors: function(errorMap, errorList) { // 获取到总共有多少个未通过验证的元素
      var appellation = $("input[name='appellation']").val() // 获取联系人
      var tel = $("input[name='tel']").val() // 获取电话
      if(errorMap.appellation == '请输入联系人' && errorMap.tel == '请输入电话') {
        $(".js_appellation").popover('show')
        $(".js_tel").popover('show')
        $(".appellation_length").popover('hide')
        $(".tel_length").popover('hide')
      } else if(errorMap.appellation == '请输入联系人') {
        $(".js_appellation").popover('show')
        $(".appellation_length").popover('hide')
        if(tel == '') {
          $(".js_tel").popover('show')
        } else {
          $(".js_tel").popover('hide')
        }
      } else if(errorMap.tel == '请输入电话') {
        $(".js_tel").popover('show')
        $(".tel_length").popover('hide')
        if(appellation == '') {
          $(".js_appellation").popover('show')
        } else {
          $(".js_appellation").popover('hide') 
        } 
      } else if(errorMap.appellation == '联系人最长不能超过32') {
        $(".appellation_length").popover('show')
      } else if(errorMap.tel == '电话长度格式错误') {
        $(".tel_length").popover('show')
      } else {
        if(appellation !== '' && tel == '') {
          $(".js_appellation").popover('hide')
          $(".js_tel").popover('show')
        } else if(appellation == '' && tel !== ''){
          $(".js_appellation").popover('show')
          $(".js_tel").popover('hide')
        } else {
          $(".js_appellation").popover('hide')
          $(".js_tel").popover('hide')
        }
      }
    },
    submitHandler: function(form) {
        console.log(form)
        var data = new FormData(form)
        data.append('source_page', sourcePage('sourcePage') + '-委托找房')
        data.append('demand', 2)
        data.append('source', 6)
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

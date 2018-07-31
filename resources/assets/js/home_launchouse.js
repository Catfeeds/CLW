require('./home_common');
import './components/home/login'
import Vue from 'vue';
require('jquery-validation');
import { launchHouse } from './home_api'
import { Message } from 'element-ui';
import 'bootstrap-sass/assets/javascripts/bootstrap/tooltip.js' // 引入bootstrap提示工具对应js文件
import 'bootstrap-sass/assets/javascripts/bootstrap/popover.js' // 引入bootstrap弹出框对应js文件
const blockData = JSON.parse($('#blockData').val())
$('#blockData')[0].remove()
const arae = new Vue({
    el: '#areaVue',
    data:{
        blockOption: blockData,
        area_id: null,
        area_name: null,
        block_id: null
    },
    watch: {
        area_id: function(val) {
            this.block_id = null
            this.area_name = $('#area_id' + val).html()
        }
    }
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
            minlength: "电话长度格式错误"
        },
        appellation: {
            required: "请输入联系人",
            maxlength: "联系人最长不能超过32"
        }
    },
    showErrors: function(errorMap, errorList) {
        var appellation = $("input[name='appellation']").val()
        var tel = $("input[name='tel']").val()
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
        var data = new FormData(form)
        data.append('source_page', sourcePage('sourcePage') + '-投放房源')
        data.append('demand', 1)
        data.append('source', 6)
        launchHouse(data).then(res => {
            if (res.success) {
                Message({
                    message: '投放成功，楚楼网10分钟内联系您',
                    type: 'success'
                })
                form.reset()
            }
        })
    }
})

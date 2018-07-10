require('./home_common');
import './components/home/login'
import Vue from 'vue';
require('jquery-validation');
import { launchHouse } from './home_api'
import { Message } from 'element-ui';
const url = process.env.homeHostUrl
const blockData = JSON.parse($('#blockData').val())
$('#blockData')[0].remove()
const arae = new Vue({
    el: '#areaVue',
    data:{
        blockOption: blockData,
        area_id: null,
        area_name: null
    },
    watch: {
        area_id: function(val) {
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
    submitHandler: function(form) {
        var data = new FormData(form)
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

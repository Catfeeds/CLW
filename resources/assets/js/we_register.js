/**
 * Created by zxz1992 on 2018/5/22.
 */
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
import ajax from './we_request'
var request = ajax();
var app = new Vue({
  el: '#app',
  data: {
    tel: null,
    sms: null,
    password: null,
    time: 0
  },
  watch: {
    time: function(val) {
      if (val > 0) {
        var self = this
        setTimeout(function() {
          self.time = val - 1
        }, 1000)
      } else {
        this.time = 0
      }
    }
  },
  methods: {
    getSms: function () {
      if (!this.tel || this.tel.trim() === '') {
        alert('请输入手机号码');
        return false
      }
      var pathStr = this.tel + '/' + 'register';
      request({
        url: 'sms/captcha/' + pathStr,
        method: 'get'
      }).then(res => {
        if (res.data) {
          this.time = 120;
          alert('短信发送成功')
        }
      })
    },
    submit: function() {
      if (!this.tel || this.tel.trim() === '') {
        alert('请输入手机号码');
        return false
      }
      if (!this.sms || this.sms.trim() === '') {
        alert('请输入短信验证码')
        return false
      }
      if (!this.password || this.password.trim() === '') {
        alert('请输入密码');
        return false
      }
      if (this.password.length < 6) {
        alert('密码最小长度为6');
        return false
      }
      if (this.password.length > 18) {
        alert('密码最大长度为18');
        return false
      }
      var data = {tel: this.tel, smsCode: this.sms, password: this.password}
      request({
        url: 'registers',
        method: 'post',
        data
      }).then(res => {
        if (res.data.status) {
          alert('登录成功');

        } else {
          alert('res.data.message');
        }
      })
    }
  }

});
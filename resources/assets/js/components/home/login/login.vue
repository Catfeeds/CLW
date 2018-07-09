<template>
  <el-dialog
  :visible.sync="dialogVisible" width="420px" class="login-box">
  <!--账号密码登录 -->
  <div v-if="active === 1">
    <div class="title">手机快捷登录</div>
    <div class="small-title">登录享受更多楚楼网服务</div>
    <form>
      <div class="input-box">
        <input type="text" v-model="tel" placeholder="请输入手机号" @blur="validateTel()">
      </div>
      <div class="input-box">
        <input type="text" v-model="code" placeholder="4位短信验证码" @blur="validateCode()">
        <div class="sms-btn-box">
          <button v-if="secondNum<=0" type="button" @click="getCode">获取验证码</button>
          <button type="button" v-else>{{secondNum}}s后重新发送</button>
        </div>
      </div>
    </form>
    <div style="position:relative">
      <div style="position:absolute">
        <span v-if='!isTel' style="color:red;">·请输入11位手机号</span>
        <span v-if='!isCode' style="color:red;">·请输入4位短信验证码</span>
      </div>
    </div>
    <el-checkbox style="margin-top:25px;" v-model="checked">7天内免登录</el-checkbox>
    <div class="btn-box">
      <el-button type="primary" @click="login">登录</el-button>
    </div>
    <!-- <div class="route-box">
      <a style='float:left' href='javascript:;'>手机快捷登录</a>
      <a style='float:right' href='javascript:;'>忘记密码</a>
      <div class='clearfloat'></div>
    </div> -->
  </div>
  </el-dialog>
</template>
<script>
import { Dialog, Checkbox, Button, Message } from 'element-ui';
import { getLoginCode, login } from '../../../home_api'
const ElDialog = Dialog
const ElCheckbox = Checkbox
const ElButton = Button
export default {
  components: { ElDialog, ElCheckbox, ElButton },
  data() {
    return {
      active: 1,
      secondNum: 0,
      isTel: true, // 手机号验证状态 true: 通过 false: 不通过
      isCode: true, // 验证码状态 true: 通过 false: 不通过
      checked: true,
      dialogVisible: false,
      tel: null, // 手机号
      code: null // 短信验证码
    }
  },
  watch: {
    tel(val) {
      if (!this.isTel) {
        this.validateTel()
      }
    },
    code(val) {
      if (!this.isCode) {
        this.validateCode()
      }
    },
    secondNum(val) {
      if (val > 0) {
        setTimeout(() => {
          this.secondNum = val -1
        }, 1000)
      }
    }
  },
  methods: {
    // 登录框显示
    show() {
      this.dialogVisible = true
    },
    // 手机验证
    validateTel() {
      const Repx = /^1\d{10}$/
      if(Repx.test(this.tel)) {
        this.isTel = true
        return true
      } else {
        this.isTel = false
        return false
      }
    },
    // 验证码验证
    validateCode() {
      const Repx = /^\d{4}$/
      if(Repx.test(this.code)) {
        this.isCode = true
        return true
      } else {
        this.isCode = false
        return false
      }
    },
    // 获取验证码
    getCode() {
      if (this.validateTel()) {
        this.secondNum = 60
        getLoginCode(this.tel).then(res => {
          Message({
            message: '短信已发送请耐心等候',
            type: 'success'
          })
        }).catch(() => {
          Message({
            message: '短信发送失败',
            type: 'warning'
          })
          this.secondNum = 0
        })
      }
    },
    // 登录
    login() {
      if (this.validateTel() && this.validateCode()) {
        login({ tel: this.tel, smsCode: this.code }).then(res => {
          if (res) {
            Message({
              message: '登陆成功！即将刷新页面',
              type: 'success'
            })
            setTimeout(() => {
              window.location.reload()
            }, 1500)
          }
        })
      }
    }
  }
}
</script>
<style lang="scss">
body.el-popup-parent--hidden{
  padding-right: 15px !important;
}
.login-box{
 .el-dialog{
   margin-top: 26vh !important;
 }
  .el-dialog__body{
    padding-top: 0px;
    padding: {
      left: 30px;
      right: 30px;
      bottom: 40px;
    }
    .title{
      font-family: SourceHanSansCN-Bold;
      font-size: 22px;
      font-weight: normal;
      font-stretch: normal;
      letter-spacing: 0px;
      color: #333333;
    }
    .small-title{
      margin-top: 12px;
      font-family: SourceHanSansCN-Regular;
      font-size: 14px;
      font-weight: normal;
      font-stretch: normal;
      letter-spacing: 0px;
      color: #999999;
    }
    form{
      display: block;
      margin-top: 35px;
      width: 360px;
      .input-box{
        position: relative;
        z-index: 1;
        border: solid 1px #dddddd;
        height: 48px;
        width: 358px;
        overflow: hidden;
        &.error{
          border-color: #ff0000;
          z-index: 6;
        }
        &:nth-child(2){
          top: -1px;
        }
        input{
          border: none;
          width: 100%;
          height: 100%;
          padding-left: 11px;
          position: absolute;
        }
        .sms-btn-box{
          width: 110px;
          top:0;
          bottom: 0;
          padding-top: 10px;
          z-index: 3;
          position: absolute;
          right: 0;
          background-color: #ffffff;
          text-align: center;
          button{
            width: 100%;
            padding: 5px 0;
            border: {
              right: none;
              top: none;
              bottom: none;
              left: 1px solid #dddddd !important;
            }
          }
        }
      }
    }
    .el-checkbox__input.is-checked + .el-checkbox__label{
      color: #333333;
    }
    .btn-box{
      margin-top: 25px;
      width: 300px;
      text-align: center;
      *{
        color: #ffffff;
      }
      button{
        width: 360px;
        background-color: #007bff;
      }
    }
    .route-box{
      margin-top: 20px;
      a{
        color: #007bff;
      }
    }
  }
}
</style>

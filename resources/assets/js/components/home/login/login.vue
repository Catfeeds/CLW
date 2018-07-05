<template>
  <el-dialog
  :visible.sync="dialogVisible" width="420px" class="login-box">
  <!--账号密码登录 -->
  <div v-if="active === 1">
    <div class="title">手机快捷登录</div>
    <div class="small-title">登录享受更多楚楼网服务</div>
    <form>
      <div class="input-box">
        <input type="text" placeholder="请输入手机号">
      </div>
      <div class="input-box">
        <input type="password" placeholder="6位短信验证码">
        <div class="sms-btn-box">
          <button type="button">获取验证码</button>
        </div>
      </div>
    </form>
    <el-checkbox style="margin-top:25px;" v-model="checked">7天内免登录</el-checkbox>
    <div class="btn-box">
      <el-button type="primary">登录</el-button>
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
import { Dialog, Checkbox, Button } from 'element-ui';
const ElDialog = Dialog
const ElCheckbox = Checkbox
const ElButton = Button
export default {
  components: { ElDialog, ElCheckbox, ElButton },
  data() {
    return {
      active: 1,
      checked: true,
      dialogVisible: false
    }
  },
  methods: {
    show() {
      this.dialogVisible = true
    }
  }
}
</script>
<style lang="scss">
.login-box{
  .el-dialog__body{
    padding-top: 0px;
    padding: {
      left: 30px;
      right: 30px;
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

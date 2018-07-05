<template>
  <el-dialog
  :visible.sync="dialogVisible"
  width="380px" class="login-box">
    <div class="title">账号密码登录</div>
    <div class="small-title">登录享受更多楚楼网服务</div>
    <el-form>
      
    </el-form>
  </el-dialog>
</template>
<script>
import { Dialog, Form, FormItem } from 'element-ui';
const ElDialog = Dialog
const ElForm = Form
const ElFormItem = FormItem
export default {
  components: { ElDialog, ElForm, ElFormItem },
  data() {
    return {
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
  }
}
</style>

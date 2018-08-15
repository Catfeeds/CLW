<template>
  <div class="wrap">
    <div class="appoint">
      <div class="title">免费预约</div>
      <input type="text" placeholder="请输入手机号" v-model="tel"/>
      <button @click="getVal">立即预约</button>
    </div>
    <div class="tel">
      <div class="icon_tel">
        <img src="/shop_img/tel_icon.png" alt="">
      </div>
      <div class="tel_num">4000-580-888</div>
    </div>
  </div>
</template>

<script>
import { Input, Button } from 'element-ui'
export default {
  components: {
    ElInput: Input,
    ElButton: Button
  },
  data() {
    return {
      tel: ''
    }
  },
  methods: {
    getVal() {
      var phone = /^\d{11}$/
      if(phone.test(this.tel)){
        alert('正确')
        this.tel = ''
      } else {
        alert('错误')
        this.tel = ''
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  .wrap {
    width: 130px;
    .appoint {
      box-sizing: border-box;
      width: 100%;
      height: 150px;
      background-color: #61aeff;
      padding: 20px 15px 23px;
      margin-bottom: 1px;
      .error {
        margin-top: 12px;
        color: #fe7a85;
        display: flex;
        justify-content: flex-start;
        img{
          margin-right: 5px;
        }
      }
      .title {
        color:#fff;
        font-size: 16px;
        font-weight: 300;
        margin-bottom: 20px;
        text-align: center;
      }
      input,button {
        height: 30px;
        width: 100px;
        outline: none;
        border: none;
        box-sizing: border-box;
      }
      input {
        padding-left: 10px;
        margin-bottom: 10px;
        font-size: 12px;
        &::placeholder {
          color:#999;
          font-size: 12px;
        }
      }
      button {
        background-color: #ff9000;
        color:#fff;
        text-align: center;
        cursor: pointer;
      }
    }
    .tel {
      box-sizing: border-box;
      background-color: #61aeff;
      width: 100%;
      height: 90px;
      box-sizing: border-box;
      padding-top: 16px;
      .icon_tel {
        text-align: center;
        margin-bottom: 15px;
      }
      .tel_num {
        font-size: 14px;
        color:#fff;
        text-align: center;
      }
    }
  }
</style>

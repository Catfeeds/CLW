<template>
<div>
    <div class="rent_house" v-if="showAfter">
        <div class="title">
            <div>免费委托找房</div>
            <div>一键委托,一分钟回复</div>
        </div>
        <div class="phone">
            <div class="phoneBox">
                <input v-model="value" type="text" placeholder="请输入手机号">
                <div class="phoneTitle" v-if="isShow"><img src="/home_img/alert.svg"> {{title}}</div>
                <span></span>
            </div>
            <div class="button" @click="getVal"><a href="javascript:void(0);">立即委托</a></div>
        </div>
        <div class="rent_describe">已经有<span>15141</span>位客户委托找房</div>
    </div>
    <div class="renSuccess" v-if="showBefore">
      <div>立即预约</div>
      <div class="renSuccess_tel">预约手机号：{{value}}</div>
      <div class="rent_success">
        <div><img src="/home_img/find_house_success.png"></div>
        <div class="sucessTitle">预约成功</div>
        <div class="contact">客服即将在10分钟内与您联系</div>
      </div>
      <div class="rentBorder"></div>
    </div>
    <div class="freeConsult">
      <div class="freePic"><img src="/home_img/fond_house_tel.png">免费电话预约</div>
      <div class="freeNum">
        <div class="freeTel">4000-580-888</div>
        <div class="freeTime">(早8：00 - 晚8：00)</div>
      </div>
      <div class="border"></div>
    </div>
  </div>
</template>
<script>
import { findHouse } from '../home_api'
import { MessageBox } from 'element-ui'
export default {
  data() {
    return {
      value: '',
      showAfter: true,
      showBefore: false,
      isShow: false,
      title: '手机号不能为空'
    }
  },
  methods: {
    getVal() {
      var tel = /^\d{11}$/
      if(tel.test(this.value)) {
        if(this.value) {
          this.isShow = false
          findHouse({ tel: this.value }).then(res => {
            this.showAfter = false
            this.showBefore = true
          })
        } else {
          this.isShow = true
        }
      } else {
        this.title = '手机号码格式不正确'
        this.isShow = true
      }
    }
  }
}
</script>

<style lang="scss">
    .rent_house {
        width: 240px;
        height: 335px;
        background:url(/home_img/rent_background.jpg) no-repeat center;
        .title {
            padding-top:36px; 
            padding-bottom: 39px;
            div {
              text-align: center;
              color:#fff;
              text-shadow: 0 4px 1px rgba(53,53,53,0.78);
              font-size: 14px;
            }
            div:first-child {
              font-size: 28px;
              font-weight: 600;
              margin-bottom: 15px;
            }
        }
        .phone{
            width: 100%;
            text-align: center;
            position: relative;
            .phoneBox{
              height: 65px;
              input{
                width: 212px;
                height: 40px;
                background-color: #ffffff;
                border-radius: 20px;
                border: solid 1px #e2e3e4;
                padding-left: 33px;
                margin-bottom: 5px;
                box-sizing: border-box;
              }
              input::placeholder{
                font-size: 14px;
              }
             .phoneTitle{
                color: #fe7a85;
                padding-bottom: 8px;
                text-align: left;
                font-size: 12px;
                margin-left: 20px;
                img{
                    vertical-align: middle;
                    width: 12px;
                }
              }
              span {
                display: block;
                background: url(/home_img/phone.png) no-repeat;
                width: 9px;
                height: 16px;
                position: absolute;
                left: 33px;
                top: 12px;
              }
            }
            .button {
              margin: 0 auto;
              width: 214px;
              height: 41px;
              background-image: linear-gradient(-90deg,#2a59db 0%,#5c85f6 100%),linear-gradient(#fff200,#fff200);
              border-radius: 20px;
              line-height: 41px;
              margin-bottom: 51px;
              box-shadow: 0px 7px 6px 0px rgba(53, 53, 53, 0.19);
              a{
                font-size: 18px;
                color:#fff;
              }
            }
        }
        .rent_describe{
            font-family: NotoSansHans-Light;
            color:#fff;
            font-size: 14px;
            text-align: center;
            span{
              color:#f6e71e;
            }
        }
    }
    .renSuccess{
      padding: 28px;
      width: 240px;
      height: 279px;
      box-sizing: border-box;
      background: #fff;
      .renSuccess_tel{
        color: #999;
        margin-top: 7px;
      }
      .rent_success{
        text-align: center;
        margin-top: 36px;
        .sucessTitle{
          margin-top: 19px;
          font-size: 18px;
        }
        .contact{
          font-size: 12px;
          color: #999;
          margin-top: 7px;
        }
      }
      .rentBorder{
        border-top: 1px solid #eeeded;
        margin-top: 22px;
      }
    }
    .freeConsult{
      margin-top: 16px;
      width: 200px;
      height: 100px;
      background: #fff;
      padding: 30px 20px 37px 20px;
      .freePic{
        font-size: 16px;
        margin-bottom: 8px;
        img{
          vertical-align: middle;
          margin-right: 6px;
        }
      }
      .freeNum{
        padding-left: 25px;
        .freeTel{
          font-family: Georgia;
          font-size: 23px;
          color: #007bff;
          margin-bottom: 8px;
        }
        .freeTime{
          font-size: 12px;
          color: #999;
        }
      }
      .border{
        width: 202px;
        height: 1px;
        background: #eeeded;
        margin-top: 22px;
      }
    }
</style>


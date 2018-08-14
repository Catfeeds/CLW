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
                <div class="phoneTitle" v-if="isShow"><img src="/home_img/alert.svg"><div>{{title}}</div></div>
                <span></span>
            </div>
            <div class="button" @click="getVal"><a href="javascript:void(0);">立即委托</a></div>
        </div>
        <div class="rent_describe">已经有 <span>{{num}}</span> 位客户委托找房</div>
    </div>
    <div class="renSuccess"  v-if="showBefore">
      <div>立即预约</div>
      <div class="renSuccess_tel">预约手机号：{{value}}</div>
      <div class="telBorder"></div>
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
        <div class="freeTime">(早9：00 - 晚10：00)</div>
      </div>
      <div class="border"></div>
      <div class="mapFindHouse">
        <img src="/home_img/mapFindHouse.jpg">
        <a href="/map_find_house"><div class="mapButton">试试地图找房</div></a>
      </div>
    </div>
  </div>
</template>
<script>
import { findHouse } from '../home_api'
import { MessageBox } from 'element-ui'
import Cookies from 'js-cookie'
export default {
  props: {
    sourcePage: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      value: '',
      showAfter: true,
      showBefore: false,
      isShow: false,
      title: '手机号不能为空',
      num: 15141,
      time: 1532314604416
    }
  },
  created() {
    this.getNum()
  },
  methods: {
    getVal() {
      var tel = /^\d{11}$/
      if(tel.test(this.value)) {
        if(this.value) {
          this.isShow = false
          let sourcePage = null
          if (this.sourcePage) {
            sourcePage = this.sourcePage + '广告栏-委托找房'
          }
          findHouse({ tel: this.value, page_source: sourcePage, source: 6, demand: 2 }).then(res => {
            this.showAfter = false
            this.showBefore = true
            Cookies.set('name', this.value)
          })
        } else {
          this.isShow = true
        }
      } else {
        this.title = '手机号码格式不正确'
        this.isShow = true
      }
    },
    getNum() {
      var name = Cookies.get('name')
      var newDate = new Date().getTime()
      var date = parseInt((parseInt(newDate) - parseInt(this.time))/1000/60/60)
      var newNum = 0
      if(name) {
        newNum += 1
        this.showAfter = false
        this.showBefore = true
        this.value = Cookies.get('name')
      }
      if(date >= 1) {
        newNum = newNum + date
      }
      this.num += newNum
      return this.num
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
                margin-bottom: 6px;
                box-sizing: border-box;
              }
              input::placeholder{
                font-size: 14px;
              }
             .phoneTitle{
                text-align: left;
                margin-left: 32px;
                display: flex;
                justify-content: flex-start;
                div{
                  color: #fe7a85;
                  font-size: 12px;
                  margin-left: 3px;
                }
                img{
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
              &:hover{
                cursor: pointer;
                box-shadow: 0px 15px 12px 0px rgba(53, 53, 53, 0.19);
              }
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
      height: 335px;
      box-sizing: border-box;
      background: #fff;
      .renSuccess_tel{
        color: #999;
        margin-top: 7px;
      }
      .telBorder{
        border-top: 1px solid #eeeded;
        margin-top: 20px;
      }
      .rent_success{
        text-align: center;
        margin-top: 42px;
        .sucessTitle{
          margin-top: 20px;
          font-size: 18px;
        }
        .contact{
          font-size: 12px;
          color: #999;
          margin-top: 10px;
        }
      }
      .rentBorder{
        border-top: 1px solid #eeeded;
        margin-top: 45px;
      }
    }
    .freeConsult{
      margin-top: 16px;
      width: 240px;
      height: 320px;
      background: #fff;
      padding: 24px 20px 37px 20px;
      box-sizing: border-box;
      .freePic{
        font-size: 16px;
        margin-bottom: 8px;
        color: #666;
        img{
          vertical-align: middle;
          margin-right: 6px;
        }
      }
      .freeNum{
        padding-left: 20px;
        .freeTel{
          // font-family: Georgia;
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
        margin-bottom: 18px;
      }
      .mapFindHouse{
        img{
          margin-bottom: 16px;
        }
        .mapButton{
          border: 1px solid #007bff;
          width: 140px;
          height: 34px;
          line-height: 34px;
          text-align: center;
          margin: 0 auto;
          border-radius: 17px;
          color: #007bff;
          cursor: pointer;
          z-index: 3;
          overflow: hidden;
          position: relative;
          &::after{
            background-color: #007bff;
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 0;
            z-index: -1;
            transition: all .5s ease;
          }
          &:hover{
            color: #fff;
            &::after{
              width: 100%;
            }
          }
        }
      }
    }
</style>


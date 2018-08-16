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
import sweetalert from 'sweetalert2'
import { Message } from 'element-ui';

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
        var title = document.querySelector('.current_title').innerHTML
        var telVal =  this.tel
        var tel = /^\d{11}$/
        if(tel.test(telVal)) {
            var data={}
            data.tel = telVal
            data.source = 6
            data.demand = 3
            data.page_source = '商城-' + title
            $.ajax({
                url: '/entrust_throw_ins',
                type: 'POST',
                data: data,
                success: function(res) {
                    if(res.success) {
                        sweetalert({
                            title: '预约成功，楚楼网10分钟内联系您',
                            type: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        })
                        this.tel = ''
                    } else {
                        Message({
                            message: res.message,
                            type: 'warning'
                        })
                    }
                    $('.error').hide()
                    $('.consult input').val('')
                },
                error: function(res) {
                    Message({
                        message: res.responseJSON.message,
                        type: 'warning'
                    })
                }
            })
        } else {
            Message({
                message: '手机号码格式错误',
                type: 'warning'
            })
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

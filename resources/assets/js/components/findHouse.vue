<template>
    <div class="rent_house">
        <div class="title">
            <div>免费委托找房</div>
            <div>一键委托,一分钟回复</div>
        </div>
        <div class="phone">
            <input type="text" placeholder="请输入手机号">
            <span></span>
            <div><a href="javascript:void(0);">立即委托</a></div>
        </div>
        <div class="rent_describe">已经有<span>15141</span>位客户委托找房</div>
    </div>
</template>
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
            input{
              width: 212px;
              height: 40px;
              background-color: #ffffff;
              border-radius: 20px;
              border: solid 1px #e2e3e4;
              padding-left: 33px;
              margin-bottom: 23px;
              box-sizing: border-box;
            }
            input::placeholder{
              font-size: 14px;
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
            div {
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
</style>


<template>
        <div class="list">
            <div class="detail">
                <div><img src="/we_img/house_detail_banner01.jpg" alt=""></div>
                <div class="buildDetail">
                    <!-- 楼盘名称 -->
                    <div class="building">
                        <div class="name">光谷新世界</div>
                        <div><span>55-90</span>元/m²月</div>
                    </div>
                    <!-- 楼盘详情 -->
                    <div class="introduce">光谷位于洪山、江夏区境内，地段好、高等院校林立，科研机构众多，被国务院确立为大众创...</div>
                    <!-- 地址 -->
                    <div class="location"><img src="/we_img/house_detail_address.png" alt=""> 江夏区-东湖高新区</div>
                    <!-- 优势 -->
                    <div class="landmark">
                        <div>可注册</div>
                        <div>地铁10分钟</div>
                        <div>地标建筑</div>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
export default {
}
</script>
<style lang="scss">
  
    .list{
      padding: 20px 15px;
      display: flex;
      justify-content: flex-start;
      .detail{
        background: #fff;
        width: 31%;
        img{
          width: 100%;
          height: 210px;
        }
        .buildDetail{
          padding: 20px;
          height: 120px;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          .building{
            display: flex;
            justify-content: space-between;
            .name{
              font-size: 20px;
              font-weight: 700;
            }
            span{
              font-size: 20px;
              color: #03a2f9;
            }
          }
          .introduce{
            font-size: 14px;
          }
          .location{
            img{
              width: 12px;
              height: 17px;
              vertical-align: middle;
            }
          }
          .landmark{
            display: flex;
            justify-content: flex-start;
            div{
              padding: 2px 5px;
              background: #facee2;
              margin-right: 5px;
              border-radius: 3px;
            }
          }
        }
        &:not(:first-child){
            margin-left: 25px;
        }
      }
    }
</style>

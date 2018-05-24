<template>
  <div>
      <ul class="mui-table-view">
          <li class="mui-table-view-cell mui-row" @click="jumpTo(item.id)" v-for="(item, key) in list" :key="'houses'+key">
              <img class="mui-col-xs-3" :src="item.indoor_img_cn + cropStyle">
              <div class="list mui-col-xs-7">
                  <div class="title">{{item.title}}</div>
                  <div class="areage">{{item.constru_acreage_cn}}</div>
                  <div class="price mui-row">
                      <div class="mui-col-xs-3">{{item.unit_price_cn}}</div>
                      <div class="totalPrice mui-col-xs-7">{{item.total_price}}<span v-if="(item.total_price !== '')">元/月</span></div>
                  </div>
                  <div class="mui-row better">
                      <div class="mui-col-3" v-if="(item.house_feature[0] !== '')"><span>{{item.house_feature[0]}}</span></div>
                      <div class="mui-col-3" v-if="(item.house_feature[1] !== '')"><span>{{item.house_feature[1]}}</span></div>
                      <div class="mui-col-3" v-if="(item.house_feature[2] !== '')"><span>{{item.house_feature[2]}}</span></div>

                  </div>
              </div>
              <div class="decoration"><img :src="goodImg"></div>
          </li>
      </ul>
  </div>
</template>
<script>
export default {
    props:{
        goodImg: { // 定位图标
            type: String,
            default: ''
        },
        list: {
            type: Array,
            default: []
        }
    },
    data() {

        return {
            cropStyle: process.env.config.cropStylist.newApp_list
        }
    },
    methods: {
        jumpTo(key) {
            window.location.href = '/house/' + key
        }
    }
}
</script>
<style lang="scss">
    ul{
        border-top:0;
        &.mui-table-view:before{ height:0}
        &.mui-table-view:after{background-color: #f4f4f4;}
        >li.mui-table-view-cell{
            &:after{
                background-color: #f4f4f4;
                left:0;
            }
            .decoration img{
            position: absolute;
            right: 15px;
            top: 0;
            width: 39px;
            height: 25px;
            }
            padding:20px 5px 10px 10px;
            .house_title {
                width:88%;
                overflow: hidden;
                text-overflow:ellipsis;
                white-space: nowrap;
                color:#333333;
            }
            .borders{
                >div{
                    >span{
                    color:rgb(0,126,255);
                    border:0.5px solid rgb(0,126,255);
                    border-radius:1px;
                    font-size:11px;
                    text-align: center;
                    float:left;
                    margin-right:5px;
                    line-height: 100%;
                    padding:1px;
                    }
                }
            }
        }
    }

</style>


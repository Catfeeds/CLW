<template>
  <div>
      <ul class="mui-table-view self-style">
          <li class="mui-table-view-cell mui-row self-style" @touchend="jumpTo(item.id)" v-for="(item, key) in list" :key="'houses'+key">
              <img class="mui-col-xs-3" :src="item.indoor_img_cn + cropStyle">
              <div class="list mui-col-xs-7">
                  <div class="title">{{item.title}}</div>
                  <div class="areage">{{item.constru_acreage_cn}}</div>
                  <div class="price mui-row">
                      <div class="mui-col-xs-6">{{item.unit_price_cn}}</div>
                      <div class="totalPrice mui-col-xs-6">{{item.total_price}}<span v-if="(item.total_price !== '')">元/月</span></div>
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
            window.location.href = '/houses/' + key
        }
    }
}
</script>
<style lang="scss">
    ul{
        border-top:0;
        &.mui-table-view.self-style:before{ height:0}
        &.mui-table-view.self-style:after{background-color: #f4f4f4;}
        >li.mui-table-view-cell.self-style{
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
    .mui-content{
        border-top: 0.5px solid #f4f4f4;
        ul.self-style{
            &::before{
                height: 0;
            }
            &::after{
                height: 0;
            }
            margin-top: 0 !important;
            li{
                &::after{
                    height: 0;
                }
                padding: 16px 15px 17px 15px;
                border-bottom: 0.5px solid #f4f4f4;
                display: flex;
                justify-content: flex-start;
                img{
                    width: 120px;
                    height: 90px;
                    margin-right: 15px;
                }
                .list{
                    .title{
                        width: 90%;
                        font-size: 14px;
                        color: #333;
                        overflow: hidden;
                        text-overflow:ellipsis;
                        white-space: nowrap;
                    }
                    .areage{
                        font-size: 15px;
                        color: #444;
                        span{
                            font-size: 16px;
                        }
                    }
                    .price{
                        font-size: 13px;
                        color: #999;
                        .totalPrice{
                            font-size: 14px;
                            color: #666;
                            display: flex;
                            justify-content: flex-end;
                            span{
                                font-size: 15px;
                                color: #ff7200;
                            }
                        }
                    }
                    .better{
                        div{
                            color: #007eff;
                            font-size: 11px;
                            border: 1px solid #007eff;
                            border-radius: 3px;
                            padding: 0 3px;
                            margin-right: 5px;
                        }
                    }
                }
                .decoration{
                    position: absolute;
                    top: 0;
                    right: 0;
                    img{
                        width: 34px;
                        height: 20px;
                    }
                }
            }
        }
    }
</style>


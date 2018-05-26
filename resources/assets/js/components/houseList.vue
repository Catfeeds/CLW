<template>
  <div>
      <ul class="mui-table-view self-style">
          <li class="mui-table-view-cell mui-row self-style" v-for="(item, key) in list" :key="'houses'+key">
              <a :href="'/houses/' + item.id">
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
                  <div class="decoration"><img v-if="item.label_cn" :src="goodImg"></div>
              </a>
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
    }
}
</script>
<style lang="scss">
    body{
        line-height: normal !important;
    }
    .mui-content{
        ul.self-style{
            border-top: 1px solid #f4f4f4;
            &::before{
                height: 0;
            }
            &::after{
                height: 0;
            }
            margin-top: 0 !important;
            li{
                >a{
                    margin: -17px -15px;
                    display: flex;
                    flex: 1;
                }
                &::after{
                    height: 0;
                }
                padding: 16px 15px 17px 15px;
                border-bottom: 0.5px solid #f4f4f4;
                display: flex;
                justify-content: flex-start;
                img{
                    width: 130px;
                    height: 100px;
                    margin-right: 15px;
                    border-radius: 2px;
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
                        padding-top: 5px;
                        font-size: 15px;
                        color: #444;
                        font-weight: 700;
                        span{
                            font-size: 16px;
                        }
                    }
                    .price{
                        padding-top: 5px;
                        font-size: 13px;
                        color: #999;
                        .totalPrice{
                            font-size: 14px;
                            color: #ff7200;
                            display: flex;
                            justify-content: flex-end;
                            span{
                                font-size: 15px;
                                color: #666;
                            }
                        }
                    }
                    .better{
                        padding-top: 5px;
                        div{
                            font-size: 0;
                            color: #007eff;
                            font-size: 11px;
                            border: 0.5px solid #007eff;
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


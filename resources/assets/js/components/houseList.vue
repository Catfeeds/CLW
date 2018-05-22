<template>
  <div>
      <ul class="mui-table-view">		    
            <li class="mui-table-view-cell mui-media" @tap="jumpTo(item)" v-for="(item, key) in list" :key="'houses'+key">
                <div class="mui-row">
                    <div style="padding-bottom:10px;padding-left:5px;">
                        <div style="margin-right:15px;float:left;">
                            <img :src="item.indoor_img_cn + cropStyle" style="width:120px;height:90px;border:1px solid rgba(0,0,0,0);border-radius:3px;"/>
                        </div>
                        <div style="float:left;width:60%;">
                            <div style="margin-bottom:5px;">
                                <h4 class="house_title" style="font-weight:500;font-size:14px;height:15px;color:rgb(51,51,51)">{{item.title}}</h4>
                            </div>
                            <div style="margin-bottom:5px;">
                                <h4 class='mui-ellipsis' style="font-weight:500;font-size:16px;color:rgb(68,68,68)">{{item.constru_acreage_cn}}</h4>
                            </div>
                            <div style="margin-bottom:5px;width:100%;" class="mui-row mui-ellipsis">
                                <div class="mui-col-xs-7" style="font-weight:400;height:15px;font-size:13px;color:#999999">
                                    {{item.unit_price_cn}}
                                </div>
                                <div class="mui-col-xs-5" style="float:right;text-align:right;font-size:15px;height:20px;">
                                    <span id="oranges" style="color:#FF7200;">{{item.total_price}}</span><span v-if="(item.total_price !== '')" style="color:#999999">元/月</span>
                                </div>
                            </div>
                            <div class="mui-row mui-ellipsis borders">
                                <div v-if="(item.house_feature[0] !== '')"><span>{{item.house_feature[0]}}</span></div>
                                <div v-if="(item.house_feature[1] !== '')"><span>{{item.house_feature[1]}}</span></div>
                                <div v-if="(item.house_feature[2] !== '')"><span>{{item.house_feature[2]}}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="decoration"><img :src="goodImg"></div>
                </div>
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
            console.log('倒计时')
            setTimeout(function () {
                webview_house.show("slide-in-right", 300);
            }, 150);
            var selfWebView = plus.webview.currentWebview() // 当前页面
            if (selfWebView.id === 'house_detail.html') {
                mui.fire(selfWebView, 'loadData', {item: key})
            } else {
                var webview_house = plus.webview.getWebviewById('house_detail.html')
                mui.fire(webview_house, 'loadData', {item: key})
            }
            
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


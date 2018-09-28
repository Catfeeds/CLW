<template>
  <div class="VueSelectBox" @click.stop>
    <div class="select-title-box">
      <div :class="{active:(selectShow === 1 || !(oblong.block_guid === 'all' && oblong.area_guid === 'all'))}" @click='selectShow = selectShow === 1?0:1'>
        <span>区域</span>
      </div>
      <div :class="{active:(selectShow === 2|| oblong.acreage !== null)}" @click='selectShow = selectShow === 2?0:2'>
        <span>面积</span>
      </div>
      <div 
      :class="{active:(selectShow === 3 || oblong.total_price !== null || oblong.unit_price !== null)}" 
      @click='selectShow = selectShow === 3?0:3'>
        <span>价格</span>
      </div>
      <div 
      :class="{active:(selectShow === 4 || oblong.renovation !== 'all' || oblong.features !== 'all')}" 
      @click='selectShow = selectShow === 4?0:4'>
        <span>更多</span>
      </div>
    </div>
    <div v-show='selectShow>0' class="selctList-box" @click="selectShow = 0">
      <div v-if='false' class="areaTypeSwitch">
        <div class="areaTypeSwitch-box">
          <div :class="{active: areaActive === 0}" @click='areaActive = 0'>商圈</div>
          <div :class="{active: areaActive === 1}" @click='areaActive = 1'>地铁</div>
        </div>
      </div>
      <div class="selectContent" @click.stop>
        <!-- 区域及地铁筛选 -->
        <swiper :options="areaSwiperOption" ref="areaSwiper" v-show="selectShow === 1">
          <swiper-slide>
            <div class="swiper-item swiper-margin">
              <div class="block-index">
                <div class="block-index-item" 
                @click='areaOptionActive = index' 
                :class="{active: areaOptionActive === index }" 
                v-for="(item, index) in areaOption" :key="'area'+index">
                  {{item.name}}
                </div>
              </div>
              <div class="block-content">
                <!-- 商圈筛选swiper -->
                <swiper :options="blockSwiperOption" ref="blockSwiper" style="height:100%;">
                  <swiper-slide v-for="(items, indexs) in areaOption" class="swiper-no-swiping" :key="'block'+indexs">
                    <!--<div class="block-list-box" @scroll.stop='blockScroll($event, indexs)'>-->
                    <div class="block-list-box">
                      <div class="temp-style">
                        <div class="block-item"
                             :class="{active: (oblong.block_guid === item.block_guid&&oblong.area_guid === items.area_guid) }"
                             v-for="(item, index) in items.block_list"
                             :key="'blocks'+index"
                             @click='oblong.block_guid = item.block_guid, oblong.area_guid = items.area_guid;flushData()'>
                          <span>{{item.name === ''?'全'+items.name:item.name}}</span>
                          <!--<span>{{item.building_count}}</span>-->
                        </div>
                      </div>
                    </div>
                  </swiper-slide>
                </swiper>
              </div>
            </div>
          </swiper-slide>
          <!-- 地铁筛选 -->
          <swiper-slide v-if="false">
            <div class="swiper-item swiper-margin">
              地铁
            </div>
          </swiper-slide>
        </swiper>
        <!-- 面积 -->
        <div v-show="selectShow === 2" class="unit_list">
          <div class="unit_item" :class="{active: arrEqual(oblong.acreage, null)}" @click='oblong.acreage = null'>不限</div>
          <div class="unit_item" :class="{active: arrEqual(oblong.acreage, [0, 100])}" @click='oblong.acreage = [0, 100]'>0-100㎡</div>
          <div class="unit_item" :class="{active: arrEqual(oblong.acreage, [100, 300])}" @click='oblong.acreage = [100, 300]'>100-300㎡</div>
          <div class="unit_item" :class="{active: arrEqual(oblong.acreage, [300, 500])}" @click='oblong.acreage = [300, 500]'>300-500㎡</div>
          <div class="unit_item" :class="{active: arrEqual(oblong.acreage, [500, 1000])}" @click='oblong.acreage = [500, 1000]'>500-1000㎡</div>
          <div class="unit_item" :class="{active: arrEqual(oblong.acreage, [1000, 99999])}" @click='oblong.acreage = [1000, 99999]'>1000㎡以上</div>
        </div>
        <!-- 价格 -->
        <div v-show="selectShow === 3" class="swiper-item swiper-margin">
          <div class="block-index">
            <div class="block-index-item" 
            @click='priceOptionActive = priceIndex' 
            :class="{active: priceIndex === priceOptionActive}" 
            v-for="(priceItem, priceIndex) in priceOption" 
            :key="'price'+priceIndex">
              {{priceItem.name}}
            </div>
          </div>
          <div class="block-content">
            <!-- 价格筛选swiper -->
            <swiper :options="priceSwiperOption" ref="priceSwiper" style="height:100%;">
              <swiper-slide v-for="(items, indexs) in priceOption" :key="'s'+indexs">
                <div class="block-list-box" >
                  <div class="block-item" 
                  :class="{active: arrEqual(oblong[priceIndexArr[priceOptionActive]], item)}" 
                  v-for="(item, index) in items.list" 
                  :key="'prices'+index" 
                  @click='priceTap(item)'>
                    <span>{{priceShow(item, items)}}</span>
                  </div>
                </div>
              </swiper-slide>
            </swiper>
          </div>
        </div>
        <!-- 更多 -->
        <div v-show="selectShow === 4" class="swiper-item swiper-margin">
          <div class="block-index">
            <div class="block-index-item" @click='moreOptionActive = 0' :class="{active: 0 === moreOptionActive}">
              装修
            </div>
            <div class="block-index-item" @click='moreOptionActive = 1' :class="{active: 1 === moreOptionActive}">
              决策偏好
            </div>
          </div>
          <div class="block-content">
            <!-- 更多筛选swiper -->
            <swiper :options="mroeSwiperOption" ref="moreSwiper" style="height:100%;">
              <swiper-slide v-for="(moreItems, moreIndexs) in moreOption" :key="'mroe'+moreIndexs">
                <div class="block-list-box">
                  <div class="block-item" 
                  :class="{active: oblong[moreIndexArr[moreOptionActive]] === moreItem.id}"  
                  v-for="(moreItem, moreIndex) in moreItems" 
                  :key="'mroes'+moreIndex"
                  @click='oblong[moreIndexArr[moreOptionActive]] = moreItem.id'>
                    <span>{{moreItem.name}}</span>
                  </div>
                </div>
              </swiper-slide>
            </swiper>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { swiper, swiperSlide } from 'vue-awesome-swiper'
import axios from 'axios'
import ajax from '../we_request'
const  request = ajax();
export default {
  components: {
    swiper,
    swiperSlide
  },
  data() {
    var req = JSON.parse($('#request').val());
    if (typeof req.features === 'object') {
      req.features = req.features[0]
    }
    return {
      isShow: false, // 遮罩层的显示
      status: true, // 是否允许通知父级刷新页面 true: 是 false: 否
      selectShow: 0, // 显示筛选大块 1. 区域 2. 面积 3. 价格 4. 更多 默认：0
      areaActive: 0, // 区域类型显示 0. 商圈 1. 地铁
      areaOptionActive: 0, // 激活的区域索引
      priceOptionActive: 0, // 激活的价格索引 0.总价 1.单价
      moreOptionActive:0, // 激活的更多索引 0.装修 1.决策偏好
      priceIndexArr:['total_price', 'unit_price'],
      moreIndexArr:['renovation', 'features'],
      areaOption: [], // 区域选项
      oblong: {
        area_guid: undefined === req.area_guid?'all':req.area_guid,
        block_guid: undefined === req.block_guid?'all':req.block_guid,
        acreage: undefined === req.acreage?null:req.acreage, // 面积
        total_price: undefined === req.total_price?null:req.total_price, // 面积, // 总价
        unit_price: undefined === req.unit_price?null:req.unit_price, // 面积, // 单价
        renovation: undefined === req.renovation?'all':req.renovation, // 装修
        features: undefined === req.features?'all':req.features // 决策偏好
      },
      priceOption: [
        {
          name: '按总价',
          unit: '万元/月',
          list: [
            null,
            [0, 5000],
            [5000, 15000],
            [15000, 30000],
            [30000, 50000],
            [50000, 100000],
            [100000, 99999999]
          ]
        },
        {
          name: '按单价',
          unit: '元/㎡·月',
          list: [
            null,
            [0, 40],
            [40, 60],
            [60, 80],
            [80, 120],
            [120, 140],
            [140, 9999]
          ]
        }
      ], // 价格选项
      moreOption: [], //更多选项
      areaSwiperOption: {
        direction: 'horizontal',
        onSlideChangeEnd: swiper => {  
          this.areaActive = swiper.realIndex
        }
      },
      blockSwiperOption: {
        direction: 'vertical',
        onSlideChangeEnd: swiper => {  
          this.areaOptionActive = swiper.realIndex 

        }  
      },
      priceSwiperOption: {
        direction: 'vertical',
        onSlideChangeEnd: swiper => {  
          this.priceOptionActive = swiper.realIndex 
        }  
      },
      mroeSwiperOption: {
        direction: 'vertical',
        onSlideChangeEnd: swiper => {  
          this.moreOptionActive = swiper.realIndex 
        }  
      }
    }
  },
  computed: {  
    areaSwiper() {  // 商圈地铁筛选切换swiper
      return this.$refs.areaSwiper.swiper
    },
    blockSwiper() { // 区域商圈筛选切换swiper
      return this.$refs.blockSwiper.swiper
    },
    priceSwiper() { // 价格筛选切换swiper
      return this.$refs.priceSwiper.swiper
    },
    moreSwiper() { // 更多筛选切换swiper
      return this.$refs.moreSwiper.swiper
    }
  },
  watch: {
    // 监听区域类型切换
    areaActive: function(val) {
      this.areaSwiper.slideTo(val, 450, false)
    },
    // 区域选项切换事件
    areaOptionActive: function(val) {
      this.blockSwiper.slideTo(val, 450, false)
    },
    // 价格选项切换事件
    priceOptionActive: function(val) {
      this.priceSwiper.slideTo(val, 450, false)
    },
    // 更多选项切换事件
    moreOptionActive: function(val) {
      this.moreSwiper.slideTo(val, 450, false)
    },
    'oblong.block_guid': function() {
      this.flushData()
    },
    'oblong.acreage': function() {
      this.flushData()
    },
    'oblong.total_price': function() {
      this.flushData()
    },
    'oblong.unit_price': function() {
      this.flushData()
    },
    'oblong.renovation': function() {
      this.flushData()
    },
    'oblong.features': function() {
      this.flushData()
    }
  },
  methods: {
    // 区域滚动条滚动时间
    blockScroll: function(el, index) {
      const dom = el.target
      if (dom.scrollTop+dom.clientHeight > dom.scrollHeight+30 && this.areaOptionActive < this.areaOption.length) {
        this.areaOptionActive = index+1
      }else if(dom.scrollTop < -30 && this.areaOptionActive > 0){
        this.areaOptionActive = index-1
      }
    },
    // 价格显示逻辑
    priceShow: function(price, index) {
      if (price === null) {
        return '不限'
      } else {
        if (index.unit === '万元/月') {
          if (index.list[index.list.length-1] === price) {
            return (price[0]/10000) + index.unit + '以上'
          }
          return (price[0]/10000) + '-' + (price[1]/10000) + index.unit
        } else {
          if (index.list[index.list.length-1] === price) {
            return price[0] + index.unit +'以上'
          }
          return price[0] + '-'+ price[1] + index.unit
        }
      }
    },
    // 数组相等判断
    arrEqual: function(arr1, arr2) {
      if (arr1 === arr2) {
        return true
      }
      if (arr1 === null) {
        return false
      }
      if (arr2 === null) {
        return false
      }
      if (arr1[0] === arr2[0] && arr1[1] === arr2[1]) {
        return true
      }
      return false
    },
    // 价格点击时间
    priceTap: function(data) {
      // 如果是总价
      if (this.priceOptionActive === 0) {
        this.oblong.total_price = data // 总价
        this.oblong.unit_price = null // 单价
      } else {
        this.oblong.total_price = null // 总价
        this.oblong.unit_price = data // 单价
      }
    },
    // 更新选择项
    flushData: function() {
      this.selectShow = 0 // 隐藏选择框
      if (this.status) { // 刷新页面
        this.$nextTick(function() {
          this.$emit('flush-data', this.oblong)
        })
      }
    },
    // 初始化组件
    init: function() {
      this.status = false // 禁止请求
      this.$nextTick(function() {
        this.selectShow = 0 // 显示筛选大块 1. 区域 2. 面积 3. 价格 4. 更多 默认：0
        this.areaActive = 0 // 区域类型显示 0. 商圈 1. 地铁
        this.areaOptionActive = 0 // 激活的区域索引
        this.priceOptionActive = 0 // 激活的价格索引 0.总价 1.单价
        this.moreOptionActive = 0 // 激活的更多索引 0.装修 1.决策偏好
        this.oblong.area_guid = 'all'
        this.oblong.block_guid = 'all'
        this.oblong.acreage = null // 面积
        this.oblong.total_price = null // 总价
        this.oblong.unit_price = null // 单价
        this.oblong.renovation = 'all' // 装修
        this.oblong.features = 'all' // 决策偏好
      })
      this.status = true
      this.flushData()
    },
    // 区域样式更改方法
    searchArea: function(area_guid, block_guid) {
      for (var num in this.areaOption) {
          if (this.areaOption[num].area_guid === area_guid) {
            this.areaOptionActive = parseInt(num)
          }
      }
      if (this.oblong.block_guid === block_guid) {
        this.oblong.area_guid = area_guid
      }
    },
    getFindHouse: function () {
      return request ({
        url: '/block_condition',
        method: 'get'
      })
    },
    getOtherCondition: function () {
      return request ({
        url: '/other_condition',
        method: 'get'
      })
    }
  },
  created() {
    var self = this;
    document.addEventListener('tap', function() {
      self.selectShow = 0
    });
    // 请求区域筛选数据
    axios.all([self.getFindHouse(), self.getOtherCondition()]).then(res => {
      self.areaOption = res[0].data; // 区域信息
      self.moreOption = res[1].data; // 更多信息
      var req = JSON.parse($('#request').val());
      for (var num in self.areaOption) {
        if (this.areaOption[num].area_guid === parseInt(req.area_guid)) {
          this.areaOptionActive = parseInt(num)
        }
      }
      if (this.oblong.block_guid === req.block_guid) {
        this.oblong.area_guid = undefined === req.area_guid?'all':req.area_guid
      }
    })
  }
}
</script>
<style lang='scss' scoped>
.VueSelectBox{
  height: 100%;
  position: relative;
  // 搜索主题区域
  .select-title-box{
    display: flex;
    height: 100%;
    >div{
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      &:last-child{
        span{
          border-right: none;
        }
      }
      span{
        color: #333333;
        display: block;
        width: 100%;
        text-align: center;
        border-right: 1px solid rgb(244, 244, 244);
        font: {
          size: 14px;
        }
      }
      &.active{
        span{
          color: #007eff;
        }
      }
    }
  }
  .selctList-box{
    border-top: 1px solid rgb(244, 244, 244);
    background: rgba(0,0,0,0.4);
    position: absolute;
    width: 100%;
    top: 100%;
    height: 1000px;
    div{
      background: #fff;
    }
    // 区域类型筛选
    .areaTypeSwitch{
      border-bottom: 1px solid rgb(244, 244, 244);
      padding: {
        top: 10px;
        bottom: 10px;
      }
      .areaTypeSwitch-box{
        width: 50%;
        margin: 0 auto;
        display: flex;
        border-radius: 2px;
        overflow: hidden;
        >div{
          flex: 1;
          height: 35px;
          background-color: #f4f4f4;
          color: #666666;
          display: flex;
          justify-content: center;
          align-items: center;
          &.active{
            background-color: #007bff;
            color: #ffffff;
          }
        }
      }
    }
    .selectContent{
      // 区域 更多样式
      .swiper-item{
        height: 400px;
        display: flex;
        .block-index{
          width: 37.33%;
          background-color: #f4f4f4;
          height: 100%;
          overflow-y: scroll;
          &::-webkit-scrollbar {
            display: none;
          }
          .block-index-item{
            height: 50px;
            display: flex;
            align-items: center;
            color: #333333;
            padding-left: 25px;
            font-size: 14px;
            &.active{
              background: #ffffff;
              color: #007eff;
            }
          }
        }
        .block-content{
          flex: 1;
          height: 100%;
          .block-list-box{
            height: 100%;
            overflow-y: scroll;
            .temp-style{
              min-height: 401px;
            }
            .block-item{
              height: 50px;
              display: flex;
              align-items: center;
              justify-content: space-between;
              font-size: 14px;
              padding: {
                left: 15px;
                right: 15px;
              }
              &.active{
                color: #007eff;
              }
            }
          }
        }
      }

      .unit_list{
        max-height: 400px;
        .unit_item{
          border-bottom: 1px solid rgb(244, 244, 244);
          height: 50px;
          display: flex;
          align-items: center;
          padding-left: 20px;
          font-size: 14px;
          &:last-child{
            border-bottom: none;
          }
          &.active{
            color: #007eff;
          }
        }
      }
    }
  }
}
</style>


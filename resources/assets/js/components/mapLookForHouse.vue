<template>
  <baidu-map ref="map" class="map" 
  center="武汉"
  :ak='ak' 
  :zoom="zoom"
  scroll-wheel-zoom
  @zoomend='zoomend'
  @click="getPoint"
  @ready="ready"
  >
   
    <div v-if='!subwayKeyword'>
      <self-overlay v-show='zoom<14' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in areaList" :key="'areaBox'+ index">
      <div class="areaStyle" @mouseover='areaActive = item.name' @mouseleave='areaActive = ""'>
        <span>{{item.name}}</span>
        <span>{{(item.price/10000).toFixed(1)}}万元/㎡</span>
        <span>{{item.tao}}套</span>
      </div>
    </self-overlay>
    <self-overlay v-show='zoom>=14' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in blockList" :key="'blockBox'+ index">
      <div class="areaStyle" @mouseover='blockActive = item.baidu_coord' @mouseleave='blockActive = ""'>
        <span>{{item.name}}</span>
        <span>{{(item.price/10000).toFixed(1)}}万元/㎡</span>
        <span>{{item.tao}}套</span>
      </div>
    </self-overlay>
    <bm-polygon v-if="blockActive !== ''" :path="polygonPath" stroke-color="red" :stroke-opacity="0.5" :stroke-weight="2" />
    <bm-boundary
      v-if='areaActive !== ""'
      :name="areaActive" 
      :massClear='boundaryStyle.massClear' 
      :strokeWeight="boundaryStyle.strokeWeight" 
      :strokeColor="boundaryStyle.strokeColor">
      </bm-boundary>
    </div>
      <bm-bus v-if='subwayKeyword' ref='bus' @buslinehtmlset='buslinehtml' @getbuslistcomplete='getbuslist' :autoViewport="true" :panel='false' selectFirstResult></bm-bus>
      <bm-control style="width:100px; height:200px">
        <el-select v-model="subwayKeyword" clearable placeholder="请选择">
          <el-option
            v-for="(item, index) in subwayOptions"
            :key="'subwayOption'+index"
            :label="item"
            :value="item">
          </el-option>
        </el-select>                                  
      </bm-control>
      <bm-local-search
      :page-capacity="100" :auto-viewport="true" style="display:none" :nearby="point" :keyword="keyword" @searchcomplete="result" :select-first-result="true"></bm-local-search>
      <bm-circle :center="point.center" :location="location" :radius="point.radius" :stroke-weight="1" :stroke-opacity="0.1" fill-color="blue" :fill-opacity="0.4"></bm-circle>
      <el-tabs type="border-card" @tab-click="handleClick" class="screen">
          <el-tab-pane label="交通">
            <el-tabs @tab-click="chioce" v-model="activeName">
              <el-tab-pane label="地铁" name="first">
                <div class="screenList">
                  <div v-for="(item, index) in list" :key='index' class="screenDetail">
                    <div>
                      <div>{{item.title}}</div>
                      <div>{{item.address}}</div>
                    </div>
                    <div>{{getDistance(item.point)}}km</div>
                  </div>
                </div>
              </el-tab-pane>
              <el-tab-pane label="公交" name="second">
                <div class="screenList">
                  <div v-for="(item, index) in list" :key='index' class="screenDetail">
                    <div>
                      <div>{{item.title}}</div>
                      <div>{{item.address}}</div>
                    </div>
                    <div>{{getDistance(item.point)}}km</div>
                  </div>
                </div>
              </el-tab-pane>
            </el-tabs>
          </el-tab-pane>
          <el-tab-pane label="餐饮">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div>
                  <div>{{item.title}}</div>
                  <div>{{item.address}}</div>
                </div>
                <div>{{getDistance(item.point)}}km</div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="娱乐">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div>
                  <div>{{item.title}}</div>
                  <div>{{item.address}}</div>
                </div>
                <div>{{getDistance(item.point)}}km</div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="银行">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div>
                  <div>{{item.title}}</div>
                  <div>{{item.address}}</div>
                </div>
                <div>{{getDistance(item.point)}}km</div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="酒店">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div>
                  <div>{{item.title}}</div>
                  <div>{{item.address}}</div>
                </div>
                <div>{{getDistance(item.point)}}km</div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="周边楼盘">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div>
                  <div>{{item.title}}</div>
                  <div>{{item.address}}</div>
                </div>
                <div>{{getDistance(item.point)}}km</div>
              </div>
            </div>
          </el-tab-pane>
      </el-tabs>
  </baidu-map>
</template>
<script>
import { BaiduMap, BmView, BmBoundary, BmMarker, BmPolygon, BmBus, BmControl, BmLocalSearch, BmCircle } from 'vue-baidu-map'
import { Select, Option, Tabs, TabPane } from 'element-ui';
var ElSelect = Select, ElOption = Option, ElTabs = Tabs, ElTabPane = TabPane
import selfOverlay from './map/selfOverlay'
import { getAreaList, getBlock } from '../home_api'
export default {
  components: {
    BaiduMap,
    BmView,
    BmBoundary,
    BmMarker,
    selfOverlay,
    BmPolygon,
    BmBus,
    BmControl,
    ElSelect,
    ElOption,
    ElTabs,
    ElTabPane,
    BmLocalSearch,
    BmCircle
  },
  data() { 
    return {
      activeName: 'first', // 默认地铁
      location: '武汉', // 检索区域
      point: {
        center: {
          lng: 114.279103,
          lat: 30.590757
        }, 
        radius: 1000
      }, // 检索中心点
      keyword: '地铁', // 检索词
      blockList: [],
      subwayKeyword: null,
      subwayOptions: [
        '1号线',
        '2号线',
        '3号线',
        '4号线',
        '6号线',
        '8号线',
        '阳逻线'
      ],
      blockActive: '',
      center: { // 当前地图中心点
        lng: 114.419095,
        lat: 30.561904
      },
      areaActive: '',
      zoom: 11, // 地图缩放级别
      ak1: 'lLmcMmNWaaDudSm49M7UHkgDQExxx6A0',
      ak: process.env.baiduAK, // 百度密钥
      boundaryStyle: {
        strokeColor: 'red', // 区域折线
        strokeWeight: 2, // 折线宽度
        massClear: false // 是否清楚区域上的覆盖物
      },
      areaList: [],
      list: [], // 周边详情
      BMap: ''
    }
  },
  watch: {
    zoom: function(val) {
      if (val>14) {
        this.areaActive = ''
      } else {
        this.blockActive = ''
      }
    },
    subwayKeyword: function(val) {
      if (val) {
        this.$nextTick(function() {
          if (this.$refs.bus) {
            this.$refs.bus.search(val)
          } else {
            setTimeout(function() {
              this.$refs.bus.search(val)
            }, 50)
          }
        })
      }
    }
  },
  computed: {
    polygonPath: function() {
      const copeData = this.blockActive.split(";")
      const coord = []
      for (var numb in copeData) {
        coord.push({lng: null, lat: null})
        var temp = copeData[numb].split(",")
        coord[numb].lng = parseFloat(temp[0])
        coord[numb].lat = parseFloat(temp[1])
      }
      console.log(coord)
      return coord
    }
  },
  methods: {
    ready(val) {
      this.BMap = val.BMap
      console.log('11111', this.BMap)
    },
    // 检索完成后的回调函数
    result(val) {
      var result = val.Br
      console.log('ssssss', val)
      var arr = [] 
      if(result) {
        for(var p of result) {
          arr.push({title: p.title, address: p.address, point: p.point})
        }
      }
      this.list = arr
      // console.log('bbbbbb', this.list)
    },
    // 选择交通详情
    chioce(tab, event) {
      this.keyword = tab.label
    },
    // 选择周边环境
    handleClick(tab, event) {
      if(tab.label == '交通'){
        this.keyword = '地铁'
      } else {
        this.keyword = tab.label
        this.activeName = 'first'
      }
    },
    getPoint(e) {
      this.point.center.lng = e.point.lng
      this.point.center.lat = e.point.lat
      // console.log('ssss', this.point)
    },
    zoomend: function(e) {
      const {lng, lat} = e.target.getCenter()
      this.center.lng = lng
      this.center.lat = lat
      this.zoom = e.target.getZoom()
    },
    getbuslist(el) {
      if (el.getBusListItem(0)) {
        this.$refs.bus.originInstance.getBusLine(el.getBusListItem(0))
      }
    },
    buslinehtml(el) {
      this.$nextTick(function() {
        setTimeout(function(){
          document.querySelectorAll('path[fill-rule="evenodd"]')[0].attributes.stroke.nodeValue='#ff0000'
        }, 50)
      })
    },
    getDistance(itemPoint) {
     var pointA = new this.BMap.Point(parseFloat(this.point.center.lng), parseFloat(this.point.center.lat))
     var pointB = new this.BMap.Point(parseFloat(itemPoint.lng), parseFloat(itemPoint.lat)) // 店铺的经纬度
     var map = new this.BMap.Map
     var distance = (map.getDistance(pointA, pointB)/1000).toFixed(2) // 保留小数点后两位
     return distance
   }
  },
  created() {
    getAreaList().then(res => {
      this.areaList = res.data
    })
    getBlock().then(res => {
      this.blockList = res.data
    })
  }
}
</script>

<style lang="scss">
.map{
  position: relative;
  display: flex;
  flex:1;
  flex-direction: column;
  .bmView{
    width: 100%;
    flex: 1;
  }
  .areaStyle{
    width: 120px;
    height: 120px;
    border-radius: 60px;
    background: #1e99e0ab;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    &:hover{
      background: #1e99e0;
    }
  }
  .screen{
    position: absolute;
    top: 40px;
    right: 30px;
    width: 350px;
    height: 400px;
    .screenList{
      width: 320px;
      height: 270px;
      overflow: auto;
      .screenDetail{
        display: flex;
        justify-content: space-between;
      }
    }
    .screenList1{
      width: 320px;
      height: 325px;
      overflow: auto;
    }
  }
}
</style>



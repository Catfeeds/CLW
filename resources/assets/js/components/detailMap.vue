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
      <bm-view class="map"></bm-view>
      <bm-local-search
      :page-capacity="100" :auto-viewport="true" style="display:none" 
      :nearby="point" :keyword="keyword" @searchcomplete="result"  :panel="true"></bm-local-search>
      <bm-circle :center="point.center" :location="location" :radius="point.radius" :stroke-weight="1" :stroke-opacity="0.1" fill-color="blue" :fill-opacity="0.4"></bm-circle>
      <bm-marker :position="this.point.center" :dragging="true" animation="BMAP_ANIMATION_BOUNCE"></bm-marker>
      <el-tabs type="border-card" @tab-click="handleClick" class="screen">
          <el-tab-pane label="交通">
            <el-tabs @tab-click="chioce" v-model="activeName">
              <el-tab-pane label="公交" name="first">
                <div class="screenList">
                  <div v-for="(item, index) in list" :key='index' class="screenDetail">
                    <div class="screenDist">
                      <div class="screenBox">
                        <div class="screenTitle">{{item.title}}</div>
                        <div class="distance"><img src="/home_img/map.png">距离{{item.distance}}m</div>
                      </div>
                      <div class="screenAddress">{{item.address}}</div>
                    </div>
                  </div>
                </div>
              </el-tab-pane>
              <el-tab-pane label="地铁" name="second">
                <div class="screenList">
                  <div v-for="(item, index) in list" :key='index' class="screenDetail">
                    <div class="screenDist">
                      <div class="screenBox">
                        <div class="screenTitle">{{item.title}}</div>
                        <div class="distance"><img src="/home_img/map.png">距离{{item.distance}}m</div>
                      </div>
                      <div class="screenAddress">{{item.address}}</div>
                    </div>
                  </div>
                </div>
              </el-tab-pane>
            </el-tabs>
          </el-tab-pane>
          <el-tab-pane label="餐饮">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div class="screenDist">
                  <div class="screenBox">
                    <div class="screenTitle">{{item.title}}</div>
                    <div class="distance"><img src="/home_img/map.png">距离{{item.distance}}m</div>
                  </div>
                  <div class="screenAddress">{{item.address}}</div>
                </div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="娱乐">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div class="screenDist">
                  <div class="screenBox">
                    <div class="screenTitle">{{item.title}}</div>
                    <div class="distance"><img src="/home_img/map.png">距离{{item.distance}}m</div>
                  </div>
                  <div class="screenAddress">{{item.address}}</div>
                </div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="银行">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div class="screenDist">
                  <div class="screenBox">
                    <div class="screenTitle">{{item.title}}</div>
                    <div class="distance"><img src="/home_img/map.png">距离{{item.distance}}m</div>
                  </div>
                  <div class="screenAddress">{{item.address}}</div>
                </div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="酒店">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div class="screenDist">
                  <div class="screenBox">
                    <div class="screenTitle">{{item.title}}</div>
                    <div class="distance"><img src="/home_img/map.png">距离{{item.distance}}m</div>
                  </div>
                  <div class="screenAddress">{{item.address}}</div>
                </div>
              </div>
            </div>
          </el-tab-pane>
          <el-tab-pane label="周边楼盘">
            <div class="screenList1">
              <div v-for="(item, index) in list" :key='index' class="screenDetail">
                <div class="screenDist">
                  <div class="screenBox">
                    <div class="screenTitle">{{item.title}}</div>
                    <div class="distance"><img src="/home_img/map.png">距离{{item.distance}}m</div>
                  </div>
                  <div class="screenAddress">{{item.address}}</div>
                </div>
              </div>
            </div>
          </el-tab-pane>
      </el-tabs>
  </baidu-map>
</template>
<script>
import { BaiduMap, BmLocalSearch, BmCircle, BmMarker,BmView } from 'vue-baidu-map'
import { Tabs, TabPane } from 'element-ui';
var ElTabs = Tabs, ElTabPane = TabPane
export default {
  props:['coordinate'],
  components: {
    BaiduMap,
    ElTabs,
    ElTabPane,
    BmLocalSearch,
    BmCircle,
    BmMarker,
    BmView
  },
  data() {
    return {
      activeName: 'first', // 默认地铁
      location: '武汉', // 检索区域
      point: {
        center: {
          lng: this.coordinate[0],
          lat: this.coordinate[1]
        },
        radius: 4000
      }, // 检索中心点
      keyword: '公交', // 检索词
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
  created() {
    console.log('aaaaa', this.coordinate)
  },
  methods: {
    ready(val) {
      this.BMap = val.BMap
    },
    // 检索完成后的回调函数
    result(val) {
      console.log('asfdsfg', val)
      var result = val.Br
      var arr = []
      if(result) {
        for(var p of result) {
          arr.push({title: p.title, address: p.address, point: p.point})
        }
      }
      for(var i=0; i<arr.length; i++) {
        var distance = this.getDistance(arr[i].point)
        arr[i].distance = distance
      }
      for(var j=0; j<arr.length; j++) {
        for(var k=0; k<arr.length-1; k++) {
          if(parseInt(arr[j].distance) < parseInt(arr[k].distance)) {
            var data = arr[j]
            arr[j] = arr[k]
            arr[k] = data
          }
        }
      }
      this.list = arr
    },
    // 选择交通详情
    chioce(tab, event) {
      this.keyword = tab.label
    },
    // 选择周边环境
    handleClick(tab, event) {
      if(tab.label == '交通'){
        this.keyword = '公交'
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
     var distance = parseInt(map.getDistance(pointA, pointB)) // 保留小数点后两位
     return distance
   }
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
        .screenDist{
          margin-bottom: 15px;
          .screenBox{
            display: flex;
            justify-content: space-between;
            .screenTitle{
              font-size: 14px;
              margin-bottom: 5px;
              color: #333;
            }
            .distance{
              font-size: 14px;
              img{
                vertical-align: middle;
                margin-right: 5px;
              }
            }
          }
          .screenAddress{
            color: #999;
            width: 280px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 12px;
          }
        }
      }
    }
    .screenList1{
      width: 320px;
      height: 325px;
      overflow: auto;
      .screenDist{
          margin-bottom: 15px;
          .screenBox{
            display: flex;
            justify-content: space-between;
            .screenTitle{
              font-size: 14px;
              margin-bottom: 5px;
              color: #333;
            }
            .distance{
              font-size: 14px;
              img{
                vertical-align: middle;
                margin-right: 5px;
              }
            }
          }
          .screenAddress{
            color: #999;
            width: 280px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 12px;
          }
        }
    }
  }
}
</style>

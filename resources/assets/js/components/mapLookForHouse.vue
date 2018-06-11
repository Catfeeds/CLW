<template>
  <baidu-map class="map" 
  center="武汉"
  :ak='ak' 
  :zoom="zoom"
  scroll-wheel-zoom
  @zoomend='zoomend'
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
      <bm-control>
        <el-select v-model="subwayKeyword" clearable placeholder="请选择">
          <el-option
            v-for="(item, index) in subwayOptions"
            :key="'subwayOption'+index"
            :label="item"
            :value="item">
          </el-option>
        </el-select>                                  
      </bm-control>
  </baidu-map>
</template>

<script>
import { BaiduMap, BmView, BmBoundary, BmMarker, BmPolygon, BmBus, BmControl } from 'vue-baidu-map'
import { Select, Option } from 'element-ui';
var ElSelect = Select, ElOption = Option
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
    ElOption
  },
  data() {
    return {
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
      ak: process.env.baiduAK, // 百度密钥
      boundaryStyle: {
        strokeColor: 'red', // 区域折线
        strokeWeight: 2, // 折线宽度
        massClear: false // 是否清楚区域上的覆盖物
      },
      areaList: []
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
}
</style>



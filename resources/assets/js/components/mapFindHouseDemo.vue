<template>
    <baidu-map ref="map" class="map"
               :center="location"
               :ak='ak'
               :zoom="zoom"
               scroll-wheel-zoom
               @zoomend='zoomend'
               @ready="ready"
    >

        <div v-if='!subwayKeyword'>
            <!--区域浮动圆-->
            <self-overlay v-show='zoom<13' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in areaList"
                          :key="'areaBox'+ index">
                <div class="regionStyle" @click="seeRegionDetail(item)" @mouseover='areaActive = item.name'
                     @mouseleave='areaActive = ""'>
                    <span>{{item.name}}</span>
                    <span>{{(item.price / 10000).toFixed(1)}}万元/㎡</span>
                    <span>{{item.tao}}套</span>
                </div>
            </self-overlay>
            <!--商圈浮动矩形-->
            <self-overlay v-show='zoom<14&&zoom>=13' :position="{lng: item.x, lat: item.y}"
                          v-for="(item, index) in blockList"
                          :key="'blockBox'+ index">
                <div class="areaStyle" @click="seeAreaDetail(item)" @mouseover='blockActive = item.baidu_coord'
                     @mouseleave='blockActive = ""'>
                    <span>{{item.name}}</span>
                    <!--<span>{{(item.price / 10000).toFixed(1)}}万元/㎡</span>-->
                    <span>{{item.tao}}套</span>
                </div>
            </self-overlay>
            <!--楼盘浮动矩形-->
            <self-overlay v-show='zoom>=14' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in buildList"
                          :key="'blockBox'+ index">
                <div class="areaStyle" @click="seeBuildDetail(item)" @mouseover='blockActive = item.baidu_coord'
                     @mouseleave='blockActive = ""'>
                    <span>{{item.title}}</span>
                    <!--<span>{{(item.price / 10000).toFixed(1)}}万元/㎡</span>-->
                    <!--<span>{{item.tao}}套</span>-->
                </div>
            </self-overlay>

            <!--商圈区块-->
            <bm-polygon v-if="blockActive !== ''" :path="polygonPath" stroke-color="red" :stroke-opacity="0.5"
                        :stroke-weight="2"></bm-polygon>
            <bm-boundary
                    v-if='areaActive !== ""'
                    :name="areaActive"
                    :massClear='boundaryStyle.massClear'
                    :strokeWeight="boundaryStyle.strokeWeight"
                    :strokeColor="boundaryStyle.strokeColor">
            </bm-boundary>
        </div>
        <!--地铁线-->
        <!--地铁线浮动矩形-->
        <site-cover v-if='subwayKeyword' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in siteList"
                    :key="'blockBox'+ index">
            <div class="areaStyle" @click="seeBuildDetail(item)" @mouseover='blockActive = item.baidu_coord'
                 @mouseleave='blockActive = ""'>
                <span>{{item.name}}</span>
                <span>{{item.num}}个</span>
                <div class="triangle"></div>
            </div>
        </site-cover>
        <bm-view class="map">
        </bm-view>
        <bm-bus v-if='subwayKeyword' ref='bus' @buslinehtmlset='buslinehtml' @getbuslistcomplete='getbuslist'
                :autoViewport="true" :panel='false' selectFirstResult></bm-bus>
        <!--&lt;!&ndash;左上角请选择&ndash;&gt;-->
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
        <div class="screen">
            <el-input placeholder="请输入内容" class="input-with-select">
                <el-button slot="append" icon="el-icon-search"></el-button>
            </el-input>
            <el-row style="padding: 5px 0px">
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-select size="mini" filterable placeholder="区域">
                            <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-select size="mini" filterable placeholder="类型">
                            <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-select size="mini" filterable placeholder="价格">
                            <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-select size="mini" filterable placeholder="地铁">
                            <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                </el-col>
            </el-row>
            <el-row style="padding: 5px 0px">
                <el-col :span="15">
                   <img src="" />
                    武汉 为您找到15个楼盘
                </el-col>
                <el-col :span="9">
                    <div class="grid-content bg-purple">
                        <el-select size="mini" filterable placeholder="价格排序">
                            <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                </el-col>
            </el-row>
            <el-row style="padding: 5px 0px" v-for="(item, index) in buildList" :key="'leftList'+ index">
                <el-col :span="8">
                    <img style="width: 130px;height: 130px" src="http://img6n.soufunimg.com/viewimage/house/2017_03/20/M00/0F/B0/wKgEUVjPYmSIEEFVAALX2QxAkpQAAYhCQNWRJEAAtfx041/232x162.jpg">
                </el-col>
                <el-col :span="15">
                    <div>博悦府</div>
                    <div><span>1900</span><span>元/㎡·月</span></div>
                    <div>地址: [江汉] - [其他] | 淮海路与云霞路交汇处向</div>
                    <div>地铁：距离3号线武汉商务区站约491米 </div>
                    <div>面积：面积： 57 - 700m²  </div>
                </el-col>
            </el-row>
        </div>
    </baidu-map>
</template>
<script>
    import {
        BaiduMap,
        BmView,
        BmBoundary,
        BmMarker,
        BmPolygon,
        BmBus,
        BmControl,
        BmLocalSearch,
        BmCircle
    } from 'vue-baidu-map'
    import {Select, Option, Tabs, TabPane, Form, FormItem, Input, Button, Main, Row, Col, Cascader} from 'element-ui';
    var ElSelect = Select,
        ElOption = Option,
        ElTabs = Tabs,
        ElTabPane = TabPane,
        ElForm = Form,
        ElFormItem = FormItem,
        ElButton = Button,
        ElRow = Row,
        ElCol = Col,
        ElMain = Main,
        ElCascader = Cascader,
        ElInput = Input
    import selfOverlay from './map/selfOverlay'
    import siteCover from './map/siteCover'
    import {getAreaList, getBlock, getBuildList, getSiteList} from '../home_api'
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
            BmCircle,
            siteCover,
            ElFormItem,
            ElInput,
            ElButton,
            ElRow,
            ElCol,
            ElMain,
            ElCascader,
            ElForm
        },
        data() {
            return {
                options: [{
                    value: '选项1',
                    label: '黄金糕'
                }, {
                    value: '选项2',
                    label: '双皮奶'
                }, {
                    value: '选项3',
                    label: '蚵仔煎'
                }, {
                    value: '选项4',
                    label: '龙须面'
                }, {
                    value: '选项5',
                    label: '北京烤鸭'
                }],
                activeName: 'first', // 默认地铁
                location: '武汉', // 检索区域
                centerLocaion: '武汉',
                locationType: false,
                point: {
                    center: {
                        lng: 114.279103,
                        lat: 30.590757
                    },
                    radius: 1000
                }, // 检索中心点
                keyword: '地铁', // 检索词
                siteList: [{
                    name: "汉口北",
                    num: 0,
                    x: "114.33608245849610000000",
                    y: "30.71769714355468800000",
                    station: "1"
                }, {
                    name: "滠口新城",
                    num: 0,
                    x: "114.34879302978516000000",
                    y: "30.69034767150879000000",
                    station: "1"
                }, {
                    name: "滕子岗站",
                    num: "3",
                    x: "114.34787750244140000000",
                    y: "30.68033409118652300000",
                    station: "1"
                }], // 站点列表
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
                buildList: [], // 楼盘浮动
                list: [], // 周边详情
                BMap: ''
            }
        },
        watch: {
            zoom: function (val) {
                console.log('zoom', val);
                if (val > 13) {
                    this.areaActive = ''
                } else {
                    this.blockActive = ''
                    this.location = '武汉'
                }
                console.log('location', this.location);

            },
            subwayKeyword: function (val) {
                if (val) {
                    this.$nextTick(function () {
                        if (this.$refs.bus) {
                            this.$refs.bus.search(val)
                        } else {
                            setTimeout(function () {
                                this.$refs.bus.search(val)
                            }, 50)
                        }
                    })
                }
            }
        },
        computed: {
            polygonPath: function () {
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
            // 点击区域详情
            seeRegionDetail(data) {
                this.zoom = 13
                this.centerLocaion = {lng: data.x, lat: data.y}
                this.locationType = true
                console.log('data', data)
            },
            // 点击商圈详情
            seeAreaDetail(data) {
                getBuildList().then(res => {
                    if (res.success) {
                        this.buildList = res.data
                        console.log('res', res);
                        console.log('this.buildList', this.buildList);
                        this.zoom = 14
//                        this.location = {lng: data.x, lat: data.y}
                    }
                })
            },
            seeBuildDetail(data) {

            },
            ready(val) {
                this.BMap = val.BMap
                console.log('11111', this.BMap)
            },
            // 检索完成后的回调函数
            result(val) {
                var result = val.Br
                console.log('ssssss', val)
                var arr = []
                if (result) {
                    for (var p of result) {
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
                if (tab.label == '交通') {
                    this.keyword = '地铁'
                } else {
                    this.keyword = tab.label
                    this.activeName = 'first'
                }
            },
            getPoint(e) {
//                this.point.center.lng = e.point.lng
//                this.point.center.lat = e.point.lat
                // console.log('ssss', this.point)
            },
            zoomend: function (e) {
                const {lng, lat} = e.target.getCenter()
                this.center.lng = lng
                this.center.lat = lat
                this.zoom = e.target.getZoom()
                if (this.locationType) {
                    this.location = this.centerLocaion
                    this.locationType = false
                }
            },
            // 地铁线
            getbuslist(el) {
                console.log('el', el)
                if (el.getBusListItem(0)) {
                    this.$refs.bus.originInstance.getBusLine(el.getBusListItem(0))
                }
            },
            // 地铁线
            buslinehtml(el) {
                this.$nextTick(function () {
                    setTimeout(function () {
                        document.querySelectorAll('path[fill-rule="evenodd"]')[0].attributes.stroke.nodeValue = '#ff0000'
                    }, 50)
                })
            }
//            getDistance(itemPoint) {
//                var pointA = new this.BMap.Point(parseFloat(this.point.center.lng), parseFloat(this.point.center.lat))
//                var pointB = new this.BMap.Point(parseFloat(itemPoint.lng), parseFloat(itemPoint.lat)) // 店铺的经纬度
//                var map = new this.BMap.Map
//                var distance = (map.getDistance(pointA, pointB) / 1000).toFixed(2) // 保留小数点后两位
//                return distance
//            }
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
    .map {
        position: relative;
        display: flex;
        flex: 1;
        flex-direction: column;
        .bmView {
            width: 100%;
            flex: 1;
        }
        .regionStyle {
            width: 120px;
            height: 120px;
            border-radius: 60px;
            background: #1e99e0ab;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            &:hover {
                background: #1e99e0;
            }
        }
        .areaStyle {
            width: 120px;
            height: 30px;
            font-size: 14px;
            background: #1e99e0ab;
            color: #ffffff;
            text-align: center;
            line-height: 30px;
            &:hover {
                background: #1e99e0;
                border-color: #1e99e0 transparent transparent transparent;
            }
            .triangle {
                position: absolute; //设置小三角绝对定位
                width: 0px;
                height: 0px;
                font-size: 0;
                line-height: 0;
                overflow: hidden;
                border-width: 7px;
                border-style: dashed dashed dashed dashed;
                border-color: #1e99e0ab transparent transparent transparent;
                top: 30px; //33px：父元素#container的内边距20px + #chat宽度的一半20px - 自身元素#triangle的边宽7px =33px
                left: 50px; //70px:  #chat的宽度50px + 父元素#container的内边距20px =70px
            }
        }
        .screen {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 400px;
            height: 98vh;
            background: #fff;
            overflow:scroll;
            .screenList {
                width: 320px;
                height: 270px;
                overflow: auto;
                .screenDetail {
                    display: flex;
                    justify-content: space-between;
                }
            }
            .screenList1 {
                width: 320px;
                height: 325px;
                overflow: auto;
            }
        }
    }
</style>



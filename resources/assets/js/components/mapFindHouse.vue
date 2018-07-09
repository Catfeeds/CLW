<template>
    <baidu-map ref="map" class="map"
               :center="location"
               :ak='ak'
               :zoom="zoom"
               :min-zoom="12"
               scroll-wheel-zoom
               @zoomend='zoomend'
               @dragging='dragging'
               @dragend='dragend'
    >
        <div v-if='!subwayKeyword'>
            <!--中心点测试-->
            <self-overlay :position="zhongxin">
                <div style="font-size: 50px">⊙</div>
            </self-overlay>

            <!--区域数据 浮动圆-->
            <self-overlay v-show='zoom<13' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in regionList"
                          :key="'areaBox'+ index">
                <div class="regionStyle" @click="seeRegionDetail(item)" @mouseover='Active = item.name'
                     @mouseleave='Active = ""'>
                    <span>{{item.name}}</span>
                    <span>{{item.building_num}}个楼盘</span>
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
                    <span>{{item.building_num}}个楼盘</span>
                </div>
            </self-overlay>
            <!--楼盘浮动矩形-->
            <site-cover v-show='zoom>=14' :position="{lng: parseFloat(item.x), lat: parseFloat(item.y)}"
                        v-for="(item, index) in buildList"
                        :key="'buildBox'+ index">
                <div class="areaStyle" @click="seeBuildDetail(item)">
                    <div class="triangle"></div>
                    <!--<div class="detail">-->
                    <!--<div>-->
                    <!--<img src="" width="200px; height:200px">-->
                    <!--<span>76.2元/㎡·月</span>-->
                    <!--</div>-->
                    <!--<div>{{item.title}}</div>-->
                    <!--<div>面积: 57-700㎡</div>-->
                    <!--</div>-->
                    <span>{{item.name}}</span>
                </div>
            </site-cover>
            <!--商圈区块-->
            <bm-polygon v-if="blockActive !== ''" :path="polygonPath" stroke-color="red" :stroke-opacity="0.5"
                        :stroke-weight="2"></bm-polygon>
            <!--&lt;!&ndash;区域区块&ndash;&gt;-->
            <bm-boundary
                    v-if='Active !== ""'
                    :name="Active"
                    :massClear='boundaryStyle.massClear'
                    :strokeWeight="boundaryStyle.strokeWeight"
                    :strokeColor="boundaryStyle.strokeColor">
            </bm-boundary>
        </div>
        <!--线路-->
        <bm-bus v-if='subwayKeyword' ref='bus' @buslinehtmlset='buslinehtml' @getbuslistcomplete='getbuslist' @getbuslinecomplete='getbuslinecomplete'
                :autoViewport="true" :panel='false' selectFirstResult></bm-bus>
        <!--地铁线浮动矩形-->
        <site-cover v-if='subwayKeyword' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in siteList"
                    :key="'subway'+ index">
            <div class="areaStyle" @click="seeMtro(item)" @mouseover='blockActive = item.baidu_coord'
                 @mouseleave='blockActive = ""'>
                <span>{{item.name}}</span>
                <span>{{item.num}}个</span>
                <div class="triangle"></div>
            </div>
        </site-cover>
        <!--左侧列表-->
        <div class="screen">
            <el-input v-model="condition.content" placeholder="请输入内容" class="input-with-select">
                <el-button slot="append" icon="el-icon-search"></el-button>
            </el-input>
            <el-row style="padding: 5px 0px">
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-cascader size="mini" filterable
                                     placeholder="区域"
                                     :options="regionArray"
                                     v-model="condition.region"
                                     @change="regionChange">
                        </el-cascader>
                    </div>
                </el-col>
                <!--<el-col :span="6">-->
                    <!--<div class="grid-content bg-purple">-->
                        <!--<el-select v-model="condition.acreage" size="mini" filterable placeholder="面积">-->
                            <!--<el-option-->
                                    <!--v-for="item in subwayOptions"-->
                                    <!--:key="item.label"-->
                                    <!--:label="item.label"-->
                                    <!--:value="item.label">-->
                            <!--</el-option>-->
                        <!--</el-select>-->
                    <!--</div>-->
                <!--</el-col>-->
                <!--<el-col :span="6">-->
                    <!--<div class="grid-content bg-purple">-->
                        <!--<el-select v-model="condition.price" size="mini" filterable placeholder="价格">-->
                            <!--<el-option-->
                                    <!--v-for="item in subwayOptions"-->
                                    <!--:key="item.label"-->
                                    <!--:label="item.label"-->
                                    <!--:value="item.label">-->
                            <!--</el-option>-->
                        <!--</el-select>-->
                    <!--</div>-->
                <!--</el-col>-->
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-select v-model="condition.metro" size="mini" filterable placeholder="地铁">
                            <el-option
                                    v-for="item in subwayOptions"
                                    :key="item.label"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                </el-col>
            </el-row>
            <el-row style="padding: 5px 0px">
                <el-col :span="15">
                    <img src=""/>
                    武汉 为您找到{{buildListNum}}个楼盘
                </el-col>
                <el-col :span="9">
                    <!--<div class="grid-content bg-purple">-->
                    <!--<el-select size="mini" filterable placeholder="价格排序">-->
                    <!--<el-option-->
                    <!--v-for="item in subwayOptions"-->
                    <!--:key="item.value"-->
                    <!--:label="item.label"-->
                    <!--:value="item.value">-->
                    <!--</el-option>-->
                    <!--</el-select>-->
                    <!--</div>-->
                </el-col>
            </el-row>
            <el-row style="padding: 5px 0px" v-for="(item, index) in buildList" :key="'leftList'+ index">
                <el-col :span="8">
                    <img style="width: 130px;height: 130px"
                         src="http://img6n.soufunimg.com/viewimage/house/2017_03/20/M00/0F/B0/wKgEUVjPYmSIEEFVAALX2QxAkpQAAYhCQNWRJEAAtfx041/232x162.jpg">
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
        BmPolygon,
        BmBoundary, // 区块
        BmBus
    } from 'vue-baidu-map'
    import selfOverlay from './map/selfOverlay' // 悬浮窗容器
    import siteCover from './map/siteCover.vue' // 地铁悬浮窗容器
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
    import {getRegionList, getBlock, getBuildList, getSiteList, getCoreBuildList, buildingsSelect} from '../home_api'
    export default
    {
        components: {
            BaiduMap,
            BmBus,
            BmPolygon,
            BmBoundary,
            selfOverlay,
            siteCover,
            ElSelect,
            ElOption,
            ElTabs,
            ElTabPane,
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
                ak: process.env.baiduAK, // 百度密钥
                location: '武汉', // 检索区域
                zhongxin: {lng: 114.312161, lat: 30.598964},
                zoom: 12, // 地图缩放级别
                keyword: '地铁', // 检索词
                regionList: [], // 区域数据
                blockList: [], // 商圈列数据
                buildList: [], // 楼盘数据
                buildListNum: 0, // 楼盘数据
                centerLocaion: '武汉', // 临时存放中心点
                locationType: false, // zommed 结束后标识
                Active: '',// 鼠标经过颜色变深标识
                subwayKeyword: null,
                blockActive: '', // 是否显示区块
                boundaryStyle: { // 区块线设置
                    strokeColor: 'red', // 区域折线
                    strokeWeight: 2, // 折线宽度
                    massClear: false // 是否清楚区域上的覆盖物
                },
                regionArray: [],// 区域数据
                condition: {
                    content: '', // 搜索内容
                    region: [], // 区域
                    acreage: '', // 面积
                    price: '', // 价格
                    metro: '' // 地铁
                }, // 条件
                options: [{
                    label: '1号线',
                    value: 1
                }],
                subwayOptions: [{
                    label: '1号线',
                    value: '1号线'
                },
                    {
                        label: '2号线',
                        value: '2号线'
                    },
                    {
                        label: '3号线',
                        value: '3号线'
                    },
                    {
                        label: '4号线',
                        value: '4号线'
                    },
                    {
                        label: '6号线',
                        value: '6号线'
                    },
                    {
                        label: '8号线',
                        value: '8号线'
                    },
                    {
                        label: '阳逻线',
                        value: '阳逻线'
                    }
                ],
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
            }
        },
        computed: {
            // 区块计算
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
        created() {
            // 获取区域下拉数据
            buildingsSelect().then(res => {
                console.log('获取区域下拉数据', res)
            })
            // 获取区域 数据
            getRegionList().then(res => {
                if (res.success) {
                    this.regionList = res.data
                }
            })
            // 获取商圈数据
            getBlock().then(res => {
                this.blockList = res.data
            })
        },
        watch: {
            'condition.metro': function (val) {
                this.subwayKeyword = this.condition.metro
                if (this.condition.metro === '') this.subwayKeyword = false;
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
            },
            zoom: function (val) {
                if (val >= 14) {
                    const data = {
                        '_token': document.getElementsByName('csrf-token')[0].content,
                        gps: [
                            {
                                x: this.zhongxin.lng,
                                y: this.zhongxin.lat
                            }
                        ],
                        distance: 5
                    }
                    // 请求楼盘数据
                    this.getBuild(data)
                }

            }
        },
        methods: {
            dragging (e) {
                this.zhongxin = e.target.getCenter()

            },
            dragend (val) {
                if (this.zoom >= 14) {
                    const data = {
                        '_token': document.getElementsByName('csrf-token')[0].content,
                        gps: [
                        {
                            x: this.zhongxin.lng,
                            y: this.zhongxin.lat,
                        }
                    ],
                        distance: 5
                    }
                    // 请求楼盘数据
                    this.getBuild(data)
                }
            },
            ready(val) {
                this.BMap = val.BMap
            },
            zoomend: function (e) {
                this.zoom = e.target.getZoom()
                this.zhongxin = e.target.getCenter()
                console.log('this.zoom', this.zoom)
                // 修改中心点 点击后操作
                if (this.locationType) {
                    this.location = this.centerLocaion
                    this.locationType = false
                }
            },
            // 查看区域详情 -> 商圈列表
            seeRegionDetail(data){
                this.zoom = 13
                this.centerLocaion = {lng: data.x, lat: data.y}
                this.locationType = true
            },
            // 点击商圈详情
            seeAreaDetail(data) {
                const ResultData = {
                    '_token': document.getElementsByName('csrf-token')[0].content,
                    gps: [
                        {
                            x: data.x,
                            y: data.y,
                        }
                    ],
                    distance: 5
                }
                // 请求楼盘数据
                getCoreBuildList(ResultData).then(res => {
                    if (res.success) {
                        this.zoom = 14
                        this.buildList = res.data
                        this.centerLocaion = {lng: data.x, lat: data.y}
                        this.locationType = true
                        this.buildListNum = res.data.length
                    }
                })
            },
            seeMtro(data){

            },
            getbuslinecomplete(el) {
              console.log('el111', el.DB)
            },
            // 地铁线
            getbuslist(el) {
                console.log('el.getBusListItem(0)')
                if (el.getBusListItem(0)) {
                    this.$refs.bus.originInstance.getBusLine(el.getBusListItem(0))
                }
            },
            // 地铁线
            buslinehtml(el) {
                this.$nextTick(function () {
                    console.log('el', el)
                    console.log('el', el[0])
                    setTimeout(function () {
                        document.querySelectorAll('path[fill-rule="evenodd"]')[0].attributes.stroke.nodeValue = '#ff0000'
                    }, 50)
                })
            },
            // 根据条件获取数据
            getBuild(data) {
                getCoreBuildList(data).then(res => {
                    if (res.success) {
                        console.log('res.data.length', res.data.length)
                        this.buildList = res.data
                        this.buildListNum = res.data.length
                        console.log('res.data', res.data)
                        console.log('res.data.length', res.data.length)
                    }
                })
            },
            // 区域三级下拉获取值时改变
            regionChange(data){
                console.log('data', data)
            }
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
            position: relative;
            width: 120px;
            height: 30px;
            font-size: 14px;
            background: #1e99e0ab;
            color: #ffffff;
            text-align: center;
            line-height: 30px;
            .detail {
                position: relative;
                color: #000000;
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
        .areaStyle:hover {
            background: #1e99e0;
            border-color: #1e99e0 transparent transparent transparent;
            .detail {
                display: block;
            }
        }
        .screen {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 400px;
            height: 98vh;
            background: #fff;
            overflow: scroll;
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
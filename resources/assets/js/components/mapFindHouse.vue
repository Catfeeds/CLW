<template>
    <baidu-map ref="map" class="map"
               :center="center"
               :ak='ak'
               :zoom="zoom"
               :min-zoom="12"
               :map-click="false"
               scroll-wheel-zoom
               @zoomend='zoomend'
               @dragging='dragging'
               @dragend='dragend'
    >
        <bm-scale anchor="BMAP_ANCHOR_BOTTOM_RIGHT"></bm-scale>
        <div v-if='!subwayKeyword'>
            <!--中心点测试-->
            <self-overlay :position="zhongxin">
                 <!--<div style="font-size: 50px">⊙</div>-->
            </self-overlay>
            <!--zoom 比例尺说明 5公里: 12 、2公里：13、  1公里：14、 500米：15、 200米 16、 100米 17-->
            <!--zoom 比例尺说明 5公里显示区域（12）  1公里显示商圈（14）    200米显示楼盘（16）   显示地铁1两公里（14） -->
            <!--区域数据 浮动圆-->
            <self-overlay v-show='zoom<=13' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in regionList"
                          :key="'areaBox'+ index">
                <div class="regionStyle" :id="getId(1,item.id)" @click="seeRegionDetail(item)" @mouseover='Active = item.name'
                     @mouseleave='Active = ""'>
                    <span style="color:#fff;">{{item.name}}</span>
                    <span style="color:#fff;">{{item.building_num}}个楼盘</span>
                </div>
            </self-overlay>
            <!--商圈浮动矩形-->
            <self-overlay v-show='zoom<=15&&zoom>13' :position="{lng: item.x, lat: item.y}"
                          v-for="(item, index) in blockList"
                          :key="'blockBox'+ index">
                <div class="areaStyle" :id="getId(2,item.id)" @click="seeAreaDetail(item)" @mouseover='blockActive = item.baidu_coord'
                     @mouseleave='blockActive = ""'>
                    <span style="color:#fff;">{{item.name}}</span>
                    <!--<span>{{(item.price / 10000).toFixed(1)}}万元/㎡</span>-->
                    <span style="color:#fff;">{{(item.building_num==null||item.building_num==='')?0:item.building_num}}个楼盘</span>
                </div>
            </self-overlay>
            <!--商圈区块-->
            <bm-polygon v-if="blockActive !== '' && zoom<=15&&zoom>13" :path="polygonPath" stroke-color="red" :stroke-opacity="0.5"
                        :stroke-weight="2"></bm-polygon>
            <!--&lt;!&ndash;区域区块&ndash;&gt;-->
            <bm-boundary
                    v-if='Active !== "" && zoom<14'
                    :name="Active"
                    :massClear='boundaryStyle.massClear'
                    :strokeWeight="boundaryStyle.strokeWeight"
                    :strokeColor="boundaryStyle.strokeColor">
            </bm-boundary>
        </div>
        <!--楼盘浮动矩形-->
        <site-cover v-show='zoom>15' :position="{lng: parseFloat(item.x), lat: parseFloat(item.y)}"
                    v-for="(item, index) in buildList"
                    :key="'buildBox'+ index">
            <div class="areaStyle" @click="seeBuildDetail(item)">
                <div class="triangle"></div>
                <span style="color:#fff;">{{item.name}}</span>
                <div class="detail">
                    <div>
                        <img src="http://img6n.soufunimg.com/viewimage/house/2017_03/20/M00/0F/B0/wKgEUVjPYmSIEEFVAALX2QxAkpQAAYhCQNWRJEAAtfx041/232x162.jpg" width="200px; height:200px">
                        <span>76.2元/㎡·月</span>
                    </div>
                    <div>{{item.title}}</div>
                    <div>面积: 57-700㎡</div>
                </div>
            </div>
        </site-cover>
        <!--线路-->
        <bm-bus v-if='subwayKeyword' ref='bus' @buslinehtmlset='buslinehtml' @getbuslistcomplete='getbuslist'
                @getbuslinecomplete='getbuslinecomplete'
                :autoViewport="true" :panel='false' selectFirstResult></bm-bus>
        <!--地铁线浮动矩形-->
        <site-cover v-if='subwayKeyword' :position="{lng: item.x, lat: item.y}" v-for="(item, index) in siteList"
                    :key="'subway'+ index">
            <div class="areaStyle" @click="seeMtro(item)" @mouseover='blockActive = item.baidu_coord'
                 @mouseleave='blockActive = ""'>
                <span style="color:#fff;">{{item.name}}</span>
                <span v-if="zoom<15" style="color:#fff;">{{item.num}}个</span>
                <div class="triangle"></div>
            </div>
        </site-cover>
        <!--左侧列表-->
        <div :class="{ screen: true, active: conditionType}">
            <div>
                <el-input v-model="keyword" placeholder="请输入内容" class="input-with-select">
                <el-button @click="findKeyword" slot="append" icon="el-icon-search"></el-button>
            </el-input>
                <el-row style="padding: 10px 10px" :gutter="10">
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-cascader size="mini" filterable
                                     placeholder="区域"
                                     :change-on-select="true"
                                     :options="regionArray"
                                     :show-all-levels="false"
                                     :clearable="true"
                                     v-model="regionTemp"
                                     @change="regionChange">
                        </el-cascader>
                    </div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-select v-model="condition.acreage" :clearable="true" size="mini" filterable
                                   placeholder="面积">
                            <el-option
                                    v-for="item in acreageArray"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-cascader size="mini" filterable
                                     placeholder="价格"
                                     expand-trigger="hover"
                                     :options="priceArray"
                                     :clearable="true"
                                     :show-all-levels="false"
                                     v-model="priceTemp"
                                     @change="priceChange">
                        </el-cascader>
                    </div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">
                        <el-select v-model="condition.metro" size="mini" :clearable="true" filterable placeholder="地铁">
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
                <el-row style="padding: 10px 0px; margin-left:30px;">
                <el-col :span="15">
                    <img src=""/>
                    <span>武汉</span> 为您找到 <span style="color:#007bff">{{buildListNum}}</span> 个楼盘
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
            </div>
            <div class="list" @scroll="listScroll">
                <el-row v-for="(item, index) in buildList" :key="'leftList'+ index" :gutter="20" class="mapList">
                    <div @click="seeBuildDetail(item)" class="mapBox">
                        <el-col :span="8" style="padding:0;margin-left: 40px;">
                            <img style="width: 140px;height: 140px"
                                :src="item.img_cn+'?imageMogr2/thumbnail/!140x140r/gravity/Center/crop/140x140/blur/1x0/quality/75|imageslim'">
                        </el-col>
                        <el-col :span="13" class="mapDetail" style="padding: 5px 0;">
                            <div class="mapTitle">{{item.name}}</div>
                            <div class="mapPrice"><span>{{item.avg_price}}</span><span>元/㎡·月</span></div>
                            <div class="mapAddress" >地址: [{{item.address_cn}}] {{item.address}}</div>
                            <div class="mapArea">面积：{{item.acreage_cn}}  </div>
                        </el-col>
                    </div>
                </el-row>
                <div v-if="panelLoading" style="height:90px;background:#dddddd;" v-loading="panelLoading" element-loading-text="加载中"></div>
            </div>
        </div>
        <div class="arrow" v-bind:style="{ left: width }" @click="widthUp()">
            <span v-if="width==='480px'" style="left:-5px">《 </span>
            <span v-else style="left: 5px"> 》</span>
        </div>
    </baidu-map>
</template>
<script>
    import {
        BaiduMap,
        BmPolygon,
        BmBoundary, // 区块
        BmScale, // 比例尺
        BmBus
    } from 'vue-baidu-map'
    import selfOverlay from './map/selfOverlay' // 悬浮窗容器
    import siteCover from './map/siteCover.vue' // 地铁悬浮窗容器
    import $ from 'jquery' // 地铁悬浮窗容器
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
    import {
        getRegionList,
        getBlock,
        getBuildList,
        getSiteList,
        getCoreBuildList,
        buildingsSelect,
        getSiteBuildNum
    } from '../home_api'
    export default
    {
        components: {
            BaiduMap,
            BmBus,
            BmPolygon,
            BmBoundary,
            BmScale,
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
                conditionData: {},
                listPerPage: 10,
                width: '480px',
                conditionType: true,
                panelLoading: true,
                ak: process.env.baiduAK, // 百度密钥
                location: '武汉', // 检索区域
                zhongxin: {lng: 114.312161, lat: 30.598964},
                zoom: 12, // 地图缩放级别
                keyword: '地铁', // 检索词
                regionList: [], // 区域数据
                regionListAll: [], // 区域数据
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
                regionArray: [],// 区域下拉数据
                acreageArray: [{
                        value: '0-100',
                        label: '0-100㎡'
                    },
                    {
                        value: '100-300',
                        label: '100-300㎡'
                    },
                    {
                        value: '300-500',
                        label: '300-500㎡'
                    },
                    {
                        value: '500-1000',
                        label: '5000-1000㎡'
                    },
                    {
                        value: '1000-10000',
                        label: '1000㎡以上'
                    }],// 面积数据
                priceArray: [{
                    value: '单价',
                    label: '按单价',
                    children: [{
                        value: '',
                        label: '全部',
                    },
                        {
                            value: '0-40',
                            label: '0-40元/㎡·月',
                        },
                        {
                            value: '40-60',
                            label: '40-60元/㎡·月',
                        },
                        {
                            value: '60-80',
                            label: '60-80元/㎡·月',
                        },
                        {
                            value: '80-120',
                            label: '80-120元/㎡·月',
                        },
                        {
                            value: '120-140',
                            label: '120-140元/㎡·月',
                        },
                        {
                            value: '140-1000',
                            label: '1000元/㎡·月以上',
                        }]
                },
                    {
                        value: '总价',
                        label: '按总价',
                        children: [{
                            value: '',
                            label: '全部',
                        },
                            {
                                value: '0-5000',
                                label: '0-0.5万元/月',
                            },
                            {
                                value: '5000-15000',
                                label: '0.5-1.5万元/月',
                            },
                            {
                                value: '15000-30000',
                                label: '1.5-3万元/㎡·月',
                            },
                            {
                                value: '30000-50000',
                                label: '3-5万元/㎡·月',
                            },
                            {
                                value: '50000-100000',
                                label: '5-10万元/㎡·月',
                            },
                            {
                                value: '100000-1000000',
                                label: '10万元以上',
                            }]
                    }],
                regionTemp: [], // 区域临时保存
                priceTemp: [], // 价格临时保存
                keyword: '', // 搜索内容
                condition: {
                    area_guid: '', // 区域
                    block_guid: '', // 商圈
                    unit_price: '', // 单价
                    total_price: '', // 总价
                    acreage: '', // 面积
                    metro: null // 地铁
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
                siteList: [], // 站点列表
            }
        },
        computed: {
            center: function () {
              return this.location
            },
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
                return coord
            }
        },
        created() {
            // 获取区域下拉数据
            buildingsSelect(document.getElementsByName('safeString')[0].content).then(res => {
                this.regionArray = res.data.data
            })
            // 获取区域 数据
            getRegionList().then(res => {
                if (res.success) {
                    this.regionList = res.data
                    this.regionListAll = res.data
                }
            })
            // 获取商圈数据
            getBlock().then(res => {
                this.blockList = res.data
            })
//            const ResultData = {
//                '_token': document.getElementsByName('csrf-token')[0].content,
//                gps: [
//                    {
//                        x: this.zhongxin.lng,
//                        y: this.zhongxin.lat
//                    }
//                ],
//                distance: 100
//            }
//            this.getBuild(ResultData)
        },
        watch: {
            'condition.metro': function (val) {
                this.siteList = []
                if (!val) {
                    window.location.reload()
                } else{
                    this.subwayKeyword = val
                    this.zoom = 14
                }
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
                if (val >= 16) {
                    const data = {
                        '_token': document.getElementsByName('csrf-token')[0].content,
                        gps: [
                            {
                                x: this.zhongxin.lng,
                                y: this.zhongxin.lat
                            }
                        ],
                        distance: 2.7
                    }
                    // 请求楼盘数据
                    this.getBuild(data)
                } else if(val <= 13){
                    const data = this.condition
                    data._token = document.getElementsByName('csrf-token')[0].content
                    this.getBuild(data)
                }
            },
            condition: {
                handler: function (val, oldVal) {
                    if (val.acreage == '' && val.area_guid == '' && val.block_guid == '' && val.metro == '' && val.total_price == '' && val.unit_price == '' && this.keyword!=='') {
                        if( this.regionList.length == 0) {
                            // 获取区域 数据
                            getRegionList().then(res => {
                                if (res.success) {
                                    this.regionList = res.data
                                }
                            })
                        }
                        return
                    } else {
                        this.keyword = ''
                    }
                    const data = this.condition
                    data._token = document.getElementsByName('csrf-token')[0].content
                    if(val.acreage !== '' || (val.total_price !== '' && val.total_price !== undefined )|| val.unit_price !== '' && val.unit_price !== undefined ){
                        this.getBuild(data, true)
                    }else {
                        this.getBuild(data)
                        this.regionList = this.regionListAll
                    }
                },
                deep: true,
                immediate: true
            }
        },
        methods: {
            // 滚动加载方法
            listScroll(e) {
                if (this.buildList.length >= this.buildListNum) {
                    return false
                }
                const scrollTop = e.target.scrollTop
                const scrollHeight = e.target.scrollHeight
                const offsetHeight = e.target.offsetHeight
                const targetNum = 50
                if (scrollHeight - (offsetHeight + scrollTop) < targetNum && !this.panelLoading) {
                    this.panelLoading = true
                    const page = (this.buildList.length/this.listPerPage) + 1
                    const data = JSON.parse(JSON.stringify(this.conditionData))
                    data.page = page
                    getCoreBuildList(data).then(res => {
                        this.panelLoading = false
                        if (res.success) {
                            this.buildList = this.buildList.concat(res.data.res.data)
                        }
                    })
                }
            },
            widthUp() {
                if (this.width === '480px') {
                    this.width = '0px'
                    this.conditionType = false
                } else {
                    this.width = '480px'
                    this.conditionType = true
                }
            },
            seeBuildDetail(item){
                window.location.href='/buildings/' + item.guid
            },
            // 清空条件
            emptyCondition(){
                this.condition = {
                    area_guid: '', // 区域
                    block_guid: '', // 商圈
                    unit_price: '', // 单价
                    total_price: '', // 总价
                    acreage: '', // 面积
                    metro: null // 地铁
                }
                this.regionTemp = []
                this.priceTemp = []
            },
            dragging (e) {
                this.zhongxin = e.target.getCenter()
//                this.location = this.zhongxin
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
                        distance: 2.7
                    }
                    // 请求楼盘数据
                    this.getBuild(data)
                }
            },
            ready(val) {
                this.BMap = val.BMap
            },
            zoomend: function (e) {
                // 修改中心点 点击后操作
                if (this.locationType) {
                    this.zhongxin = this.centerLocaion
                    this.location = this.centerLocaion
                    this.locationType = false
                } else {
                    this.zhongxin = e.target.getCenter()
                }
                this.zoom = e.target.getZoom()
            },
            // 查看区域详情 -> 商圈列表
            seeRegionDetail(data){
                this.location = this.zhongxin
                this.locationType = true
                this.centerLocaion = {lng: Number(data.x), lat: Number(data.y)}
                if(this.zoom === 14) {
                    this.zhongxin = this.centerLocaion
                    this.location = this.centerLocaion
                }
                this.zoom = 14

            },
            // 点击商圈详情
            seeAreaDetail(data) {
                this.locationType = true
                this.buildList = []
                this.centerLocaion = {lng: data.x, lat: data.y}
                const datas = {
                    '_token': document.getElementsByName('csrf-token')[0].content,
                    gps: [
                        {
                            x: this.centerLocaion.lng,
                            y: this.centerLocaion.lat,
                        }
                    ],
                    distance: 5
                }
                if(this.zoom === 16) {
                    this.zhongxin = this.centerLocaion
                    this.location = this.centerLocaion
                }
                this.zoom = 16
                // 请求楼盘数据
                this.getBuild(datas)
            },
            // 地铁详情
            seeMtro(data){
                this.buildList = []
                this.locationType = true
                this.centerLocaion = {lng: data.x, lat: data.y}
                const datas = {
                    '_token': document.getElementsByName('csrf-token')[0].content,
                    gps: [
                        {
                            x: this.zhongxin.lng,
                            y: this.zhongxin.lat,
                        }
                    ],
                    distance: 2.7
                }
                // 请求楼盘数据
                this.getBuild(datas)
                if(this.zoom === 16) {
                    this.zhongxin = this.centerLocaion
                    this.location = this.centerLocaion
                }
                this.zoom = 16
            },
            // 获取站点楼盘数量
            getbuslinecomplete(el) {
                var data = []
                for (var key in el.DB) {
                    data.push({
                        name: el.DB[key].name,
                        x: el.DB[key].position.lng,
                        y: el.DB[key].position.lat,
                    })
                }
                getSiteBuildNum({gps: data, distance: 3}).then(res => {
                    if (res.success) {
                        this.siteList = res.data
                        this.$nextTick(function () {
                            this.centerLocaion = {lng: data.x, lat: data.y}
                            this.locationType = true
                            this.zoom = 13
                        })
                    }
                })
            },
            // 地铁线
            getbuslist(el) {
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
            },
            // 根据条件获取楼盘数据
            getBuild(data, type = false) {
                this.panelLoading = true
                const condition = data
                if (this.zoom >= 16) {
                    condition.type = 'all'
                }
                getCoreBuildList(condition).then(res => {
                    this.panelLoading = false
                    if (res.success) {
                        this.conditionData = data // 当前搜寻条件
                        if (res.data.res.data) {
                            this.buildList = res.data.res.data
                        } else {
                            this.buildList = res.data.res
                        }
                        
                        if (res.data.res.total) {
                            this.buildListNum = res.data.res.total
                        } else {
                            this.buildListNum = res.data.res.length
                        }
                        if (res.data.res.listPerPage) {
                            this.listPerPage = res.data.res.per_page
                        } else {
                            this.listPerPage = 10
                        }

                        if(type) {
                            this.regionList = res.data.areaLocations
                        }
                    }
                })
            },
            // 根据关键字获取楼盘数据
            findKeyword(){
                const resultData = {
                    '_token': document.getElementsByName('csrf-token')[0].content,
                    keyword: this.keyword
                }
                // 清空其他条件
                // this.emptyCondition()
                this.keyword = resultData.keyword
                getCoreBuildList(resultData).then(res => {
                    // this.conditionData = resultData
                    if (res.success) {
                        this.buildList = res.data.res.data
                        this.buildListNum = res.data.res.total
                    }
                })
            },
            // 区域三级下拉获取值时改变
            regionChange(data){
                // 只给商圈赋值
                if (data.length === 3) {
                    this.condition.area_guid = ''
                    this.condition.block_guid = data[2]
                    $('#sq'+ data[2]).trigger('click')
                } else if (data.length === 2) {
                    this.condition.area_guid = data[1]
                    $('#qy'+ data[1]).trigger('click')
                    this.condition.block_guid = ''
                } else {
                    this.center = '武汉'
                    this.zoom = 12
                    this.condition.area_guid = ''
                    this.condition.block_guid = ''
                }
            },
            // 价格下拉获取值时改变
            priceChange(data){
                if (data[0] === '单价') {
                    this.condition.total_price = ''
                    this.condition.unit_price = data[1]
                } else {
                    this.condition.unit_price = ''
                    this.condition.total_price = data[1]
                }
            },
            getId(type,id) {
                if (type ==1 ){
                    return 'qy' + id
                } else{
                    return 'sq' + id

                }
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
                z-index:99999;
                position: relative;
                background-color: #FFFFFF;
                color: #000000;
                display: none;
                bottom: 0px;
                right: 41px;
                width: 200px;
                text-align: center;
                img{
                    width: 200px;
                }
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
            top: 0px;
            left: -480px;
            width: 480px;
            height: calc(100vh - 61px);
            background: #fff;
            transition: left .5s;
            &.active{
                left: 0px;
            }
            .list{
                overflow-y: auto;
                overflow-x: hidden;
                height: calc(100vh - 185px);
            }
            .mapList{
                padding: 20px 0;
                border-bottom: 1px solid #f5f5f5;
                cursor: pointer;
                &:hover{
                    background: #f5f5f5;
                }
                .mapBox{
                    .mapDetail{
                        height: 140px;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                        .mapTitle{
                            font-size: 20px;
                            font-weight: 600;
                        }
                        .mapPrice{
                            span{
                                font-size: 16px;
                                color: #007bff;
                            }
                        }
                        .mapAddress{
                            font-size: 12px;
                            line-height: 22px;
                            color: #666;
                        }
                        .mapArea{
                            color: #666;
                            font-size: 12px;
                        }
                    }
                }
            }
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
        .arrow{
            cursor: pointer;
            background-position: left -443px;
            line-height: 72px;
            background-color:#FFFFFF;
            position: absolute;
            top: 50vh;
            width: 18px;
            height: 72px;
            span{
                font-size: 20px;
                color: #c6c6c6;
                position: absolute;
            }
        }
    }
</style>
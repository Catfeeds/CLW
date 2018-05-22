window.$ = window.jQuery = require('jquery');
var MapObj = null,// 地图对象
    MapCenter = null// 楼盘坐标对象
var Map = function () {
    if (!Vuebuilding.list.gps) {
        return false
    }
    if (!MapCenter) {
    MapCenter = new plus.maps.Point(114.30 , 30.57)
    } else {
        MapCenter.setLng(Vuebuilding.list.gps[0])// 经度
        MapCenter.setLat(Vuebuilding.list.gps[1])// 纬度
    }
    if (!MapObj) {
        MapObj = new plus.maps.Map('secondmap', {
            center: MapCenter, // 地图中心位置
            traffic: true,//显示交通信息
            zoom: 16,//缩放级别 有效范围为1-22
            zoomControls: true,//显示地图的内置缩放控件
        })
    } else {
        MapObj.setCenter(MapCenter)
        MapObj.resize()
    }
    showBuildingPosition()
}
// 显示楼盘坐标
var showBuildingPosition = function () {
    var marker = new plus.maps.Marker(MapCenter)
    MapObj.addOverlay(marker)
}
$('#secondmap').click(() => {
  console.log('55555')
})
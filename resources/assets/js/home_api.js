import request from './home_request'
import axios from 'axios'

// 获取区域地理位置信息
export function getRegionList() {
  return request({
    url: '/get_area_locations_list',
    method: 'GET'
  })
}
// 获取商圈地理位置信息
export function getBlock() {
 return request({
  url: '/get_block_locations_list',
  method: 'GET'
 })
}

// 获取区域三级下拉列表
export function buildingsSelect(params) {
    return axios({
        headers: {'safeString': params},
        url: process.env.baseHostURL + '/api/get_all_select?number=3',
        method: 'GET',
    })
}

export function getBuildList() {
    return request({
        url: '/getBuildList',
        method: 'GET'
    })
}

export function getSiteList() {
    return request({
        url: '/getSiteList',
        method: 'GET'
    })
}

// 委托找房
export function findHouse(data) {
  return request({
    url: '/entrust_throw_ins',
    method: 'POST',
    data
  })
}

// 收藏房源
export function collect(data) {
  return request({
    url: '/collections',
    method: 'POST',
    data
  })
}

// 取消收藏
export function cancelCollet(params) {
  return request({
    url: '/del/' + params,
    method: 'GET'
  })
}
// 获取登录验证码
export function getLoginCode(tel) {
  return request({
    url: '/sms/captcha/' + tel + '/login',
    method: 'GET'
  })
}
// 登录
export function login(data) {
  return request({
    url: '/logins',
    method: 'POST',
    data
  })
}
// 根据中心获取楼盘
export function getCoreBuildList(data) {
  return request({
      url: '/get_periphery_buildings',
      method: 'POST',
      params: data
  })
}

// 获取站点楼盘数量
export function getSiteBuildNum(data) {
    return request({
        url: '/get_periphery_buildings_count',
        method: 'POST',
        params: data
    })
}

// // 根据中心获取楼盘
// export function getCoreBuildLists(data) {
//     return request({
//         url: 'http://192.168.0.110/get_periphery_buildings',
//         method: 'post',
//         data: data
//     })
// }

// 委托找房表单
export function factorFindHouse(data) {
  return request({
    url: '/entrust_throw_ins',
    method: 'POST',
    data
  })
}
// 投放房源
export function launchHouse(data) {
  return request({
    url: '/entrust_throw_ins',
    method: 'POST',
    data
  })
}

// 搜索框提示信息
export function getSelectInfo(params) {
  return request({
    url: '/get_select_info',
    method: 'GET',
    params
  })
}

// 获取楼盘详情市场行情
export function getMarketPrice(params) {
  return request({
    url: '/market_price/' + params,
    method: 'GET'
  })
}

// 获取楼盘详情猜你喜欢
export function getLikeBuild(params) {
  return request({
    url: '/like_building',
    method: 'GET',
    params
  })
}

// 获取楼盘浏览记录
export function getBuildBrowse(params) {
  return request({
    url: '/property_browsing_list',
    method: 'GET',
    params
  })
}

// 获取房源浏览记录
export function getHouseBrowse(params) {
  return request({
    url: '/listing_list',
    method: 'GET',
    params
  })
}

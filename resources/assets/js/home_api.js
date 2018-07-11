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
        url: process.env.agencyHostURL + '/api/cities_areas_blocks_select',
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
    url: '/bespeaks',
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
    url: '/bespeaks',
    method: 'POST',
    data
  })
}
// 投放房源
export function launchHouse(data) {
  return request({
    url: '/throw_ins',
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
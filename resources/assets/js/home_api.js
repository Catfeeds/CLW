import request from './home_request'

export function getRegionList() {
  return request({
    url: '/getRegionList',
    method: 'GET'
  })
}

export function getBlock() {
 return request({
  url: '/detailArea',
  method: 'GET'
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
    url: 'collections',
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
export function getCoreBuildList(params) {
  return request({
      url: 'http://192.168.0.110/get_periphery_buildings',
      method: 'GET',
      params: params
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

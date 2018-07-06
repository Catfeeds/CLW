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
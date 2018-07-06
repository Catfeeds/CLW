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

import request from './home_request'

export function getRegionList() {
  return request({
    url: '/getRegionList',
    methods: 'GET'
  })
}

export function getBlock() {
 return request({
  url: '/detailArea',
  methods: 'GET'
 })
}


export function getBuildList() {
    return request({
        url: '/getBuildList',
        methods: 'GET'
    })
}

export function getSiteList() {
    return request({
        url: '/getSiteList',
        methods: 'GET'
    })
}

// 根据中心获取楼盘
export function getCoreBuildList(params) {
    return request({
        url: 'http://192.168.0.110/get_periphery_buildings',
        methods: 'GET',
        params: params
    })
}
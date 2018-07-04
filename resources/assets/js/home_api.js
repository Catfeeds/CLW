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
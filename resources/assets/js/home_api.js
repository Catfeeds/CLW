import request from './home_request'

export function getAreaList() {
  return request({
    url: '/getArea',
    methods: 'GET'
  })
}

export function getBlock() {
 return request({
  url: '/detailArea',
  methods: 'GET'
 })
}
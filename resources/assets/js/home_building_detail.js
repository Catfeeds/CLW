require('./home_common');
const Swiper = require('swiper');
var betterList = require('./components/betterList.vue');
var detailMap = require('./components/detailMap.vue')
var Data = $('#props').data('data') // 获取blade模板渲染出来的$building里的数据
var initHouseData = getVal() // 房源数据
var houseDetail = getVal()
var houseCount = parseInt($('.js_listCount span').html()) // 房源数量
var listTemplate = $('.js_listDetail .listDetail').eq(0).prop('outerHTML') // 房源列表模板
new Vue({
  el: '#second',
  components: {detailMap},
  data() {
    return {
      data: Data.gps
    }
  }
})

new Vue({
  el: '#third',
  components: {betterList}
})

// 轮播
var banner = new Swiper('#banner', {
  direction: 'horizontal', // 横向滑动
  pagination: '.swiper-pagination', // 添加分页器
  paginationClickable: true, // 分页器可点击
  paginationBulletRender: function(banner, index, className){
    return '<span class="'+ className +'"><img src="'+ Data.pic_url[index].url +'"></span>'
  }, // 自定义分页器
})

// 点击导航
$('.filter div').on('click', function(){
  $(this).addClass('filterActive')
  $(this).siblings().removeClass('filterActive')
  var val = $(this).html()
  if(val == '出租房源') {
    document.getElementById('rent').scrollIntoView(true)
  } else if(val == '楼盘信息') {
    document.getElementById('buildInfor').scrollIntoView(true)
  } else if(val == '市场行情') {
    document.getElementById('quotation').scrollIntoView(true)
  } else if(val == '周边配套') {
    document.getElementById('second').scrollIntoView(true)
  } else if(val == '猜你喜欢') {
    document.getElementById('third').scrollIntoView(true)
  }
  // console.log('整体导航', val)
})

// 出租房源面积筛选
$('#rentAcreage span').on('click', function(){
  var acreage = $(this).html()
  $(this).addClass('current')
  $(this).siblings().removeClass('current')
  selectTerm($(this))
})

// 价格筛选
$('#rentPrice span').on('click', function(){
  var price = $(this).html()
  $(this).addClass('current')
  $(this).siblings().removeClass('current')
  selectTerm($(this))
})

// 按照面积排序
$('.js_listArea').on('click', function(){
  var term = 'area'
  var sequence = true
  console.log('dom', $('.js_listArea .js_rise'))
  $('.js_rise').toggle()
  $('.js_drop').toggle()
  var html = order(houseDetail, sequence, term)
  createVal(html)
})

// 按照单价排序
$('.js_listPrice').on('click', function(){
  console.log('sssss', $('.js_listPrice'))
})
// 排序
function order(houseDetail, sequence, term) {
  for(var i = 0; i < houseDetail.length; i++) {
    for(var k = 0; k < houseDetail.length; k++) {
      var area1 = parseFloat(houseDetail[i][term])
      var area2 = parseFloat(houseDetail[k][term])
      if(area1 < area2) {
        var item = houseDetail[i]
        houseDetail[i] = houseDetail[k]
        houseDetail[k] = item
      }
    }
  }
  console.log('hhhhh', houseDetail)
  return houseDetail
}

// 通过dom节点获取blade模板渲染出的数据
function getVal() {
  // 定义空数组存放获取列表详细数据
  var data = []
  // 有多少条房源数据
  var list = $('.js_listDetail .listDetail')
  for(var i = 0; i < list.length; i++) {
    var item = {} // 定义对象存放每一个房源的数据
    item.img = list.eq(i).find('img').attr('src') // 获取图片路径
    item.area = list.eq(i).find('#listArea>span').html() // 获取面积
    item.price = list.eq(i).find('#listPrice>span').html() // 获取单价
    item.total = list.eq(i).find('#listTotal>span').html() // 获取总价
    item.feature = list.eq(i).find('#listSpecial').html() // 获取房源特色
    data.push(item)
  }
  console.log('aaaa', data)
  return data
}

// 添加数据
function createVal(data) {
  $('.js_listDetail .listDetail').remove()
  for(var p in data) {
    var list = $(listTemplate).appendTo('.js_listDetail')
    list.find('img').attr('src', data[p].img)
    list.find('#listArea>span').html(data[p].area)
    list.find('#listPrice>span').html(data[p].price)
    list.find('#listTotal>span').html(data[p].total)
    list.find('#listSpecial').html(data[p].feature)
  }
  $('.js_listCount span').html( data.length )
  houseDetail = data
}

// 筛选
function selectTerm(current) {
  var min = current.attr('data-min') || null // 获取当前点击选项的最小值
  var max = current.attr('data-max') || null // 获取当前点击选项的最大值
  var active = $('.js_active.current') // 获取当前点击元素
  // 点击除全部以外的其他筛选条件
  if(min !== null) {
    if(active.length == 1) {
      // 判断点击的选项是属于面积还是价格
      var term = current.parent().hasClass('js_rentAcreage') ? 'area' : 'price'
      var data = initHouseData
      var val = select(min, max, term, data)
      createVal(val)
    } else {
      var min1 = active.eq(0).attr('data-min') || null
      var max1 = active.eq(0).attr('data-max') || null
      var min2 = active.eq(1).attr('data-min') || null
      var max2 = active.eq(1).attr('data-max') || null
      temp1 = select(min1, max1, 'area', initHouseData)
      temp2 = select(min2, max2, 'price', temp1)
      createVal(temp2)
    }
  } else {
    // 点击全部判断是否还有其他筛选条件
    if(active.length == 0) {
      createVal(initHouseData)
    } else {
      selectTerm($('.js_active.current'))
    }
  }
}

// 根据选项进行操作初始数据
function select(min, max, term, data) {
  var item = []
  if(max) {
    for(var p in data) {
      var val = parseFloat(data[p][term])
      if(val >= min && val <= max) {
        item.push(data[p])
      }
    }
  } else {
    for(var p in data) {
      var val = parseFloat(data[p][term])
      if(val >= min) {
        item.push(data[p])
      }
    }
  }
  return item
}
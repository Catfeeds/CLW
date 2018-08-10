require('./home_common');
import './components/home/login' // 登录组件
import './components/home/right_tab' // 侧边栏组件
import { getMarketPrice, getLikeBuild } from './home_api'
const Swiper = require('swiper');
var detailMap = require('./components/detailMap.vue') // 地图组件
var findHouse = require('./components/findHouse.vue') // 委托找房组件
var Data = $('#props').data('data') // 获取blade模板渲染出来的$building里的数据
var initHouseData = getVal() // 房源数据
// console.log('初始化数据', initHouseData)
var houseDetail = getVal()
var houseCount = parseInt($('.js_listCount span').html()) // 房源数量
var listTemplate = $('.js_listDetail .listDetail').eq(0).prop('outerHTML') // 房源列表模板
var rightTop = $('.right').offset().top // 右侧边栏至顶部的距离
var secondTop = $('#second').offset().top // 周边配套至顶部的距离
console.log('sssss', Data.block_id)
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
  el: '.findHouse',
  components: { findHouse }
})

// 猜你喜欢
new Vue({
  el: '#enjoy',
  data() {
    return {
      list: []
    }
  },
  created() {
    getLikeBuild({block_id: Data.block_id, price_sort: 'asc'}).then(res => {
      this.list = res.data
    })
  },
  methods: {
    toBuilding(val) {
      window.location.href = '/buildings/'+ val
    }
  }
})

new Vue({
  el: '#quotation',
  data() {
    return {
      list: []
    }
  },
  created() {
    getMarketPrice(Data.id).then(res => {
      this.list = res.data
    }) 
  }
})

// 页面滚动事件
$(window).scroll(function(){
  var scrollTop = $(window).scrollTop() // 页面滚动距离
  if(((scrollTop + 60) >= rightTop) && ((scrollTop + 1076) < secondTop)) {
    $('.right').addClass('location')
    $('.right').css('margin-top', '0')
  } else if((scrollTop <= rightTop) || ((scrollTop + 1076) >= secondTop)) {
    if((scrollTop + 1076) >= secondTop) {
      $('.right').css('margin-top', secondTop-rightTop-1023)
      $('.right').removeClass('location')
    } else {
      $('.right').removeClass('location')
    }
  }
})
// 轮播
var banner = new Swiper('#banner', {
  simulateTouch : true, // 开启可能导致快速切换页面时跳到其它页面
  pagination: '.swiper-pagination', // 添加分页器
  paginationClickable: true,
  paginationBulletRender: function(banner, index, className){
    return '<span style="cursor:pointer" class="js_bannerChange '+ className +'"><img src="'+ Data.pc_pic_url[index].url +'"></span>'
  }
})


// 手动切换banner
// $(document).on('click', 'span.js_bannerChange', function() {
//   if (banner.animating) {
//     return
//   }
//   var index = $(this).index();
//   console.log(index)
//   banner.slideTo(index, 300, false);//切换到第一个slide，速度为1秒
// })
// 点击查看地图
$('.js_map').on('click', function() {
  $('html,body').animate({scrollTop: $('#second').offset().top - 60 + 'px'},500)
})

// 点击导航
$('.filter div').on('click', function(){
  var val = $(this).html()
  if(val == '出租房源') {
    navigation('#rent')
  } else if(val == '楼盘信息') {
    navigation('#buildInfor')
  } else if(val == '市场行情') {
    navigation('#quotation')
  } else if(val == '周边配套') {
    navigation('#second') 
  } else if(val == '猜你喜欢') {
    navigation('#enjoy')
  }
})
function navigation(obj) {
  $('html,body').animate({scrollTop: $(obj).offset().top - 60 + 'px'},500)
  // document.getElementById('second').scrollIntoView(true)
}

// 出租房源面积筛选
$('#rentAcreage span').on('click', function(){
  changePic()
  $(this).addClass('current')
  $(this).siblings().removeClass('current')
  selectTerm($(this))
})

// 价格筛选
$('#rentPrice span').on('click', function(){
  changePic()
  $(this).addClass('current')
  $(this).siblings().removeClass('current')
  selectTerm($(this))
})

// 按照面积排序
$('.js_listArea').on('click', function(){
  var term = 'area'
  var obj = '.js_listArea'
  var sequence = changeOrder(obj)
  var html = order(houseDetail, sequence, term)
  createVal(html)
})

// 按照单价排序
$('.js_listPrice').on('click', function(){
  var term = 'price'
  var obj = '.js_listPrice'
  var sequence = changeOrder(obj)
  var html = order(houseDetail, sequence, term)
  createVal(html) 
})

// 按照总价进行排序
$('.js_listTotal').on('click', function() {
  console.log('ssssss', $(this).siblings().find('.js_price_up_before'))
  var term = 'total'
  var obj = '.js_listTotal'
  var sequence = changeOrder(obj)
  var html = order(houseDetail, sequence, term)
  createVal(html)
})

// 重置排序图标
function changePic() {
  $('#buildList').find('.js_price_up_after').css('display', 'block')
  $('#buildList').find('.js_price_up_before').css('display', 'none')
  $('#buildList').find('.js_price_down_after').css('display', 'block')
  $('#buildList').find('.js_price_down_before').css('display', 'none')
}

// 排序
function order(houseDetail, sequence, term) {
  // console.log('排序', houseDetail)
  if(sequence) {
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
    // console.log('33333', houseDetail)
    return houseDetail
  } else {
    for(var i = 0; i < houseDetail.length; i++) {
      for(var k = 0; k < houseDetail.length; k++) {
        var area1 = parseFloat(houseDetail[i][term])
        var area2 = parseFloat(houseDetail[k][term])
        if(area1 > area2) {
          var item = houseDetail[i]
          houseDetail[i] = houseDetail[k]
          houseDetail[k] = item
        }
      }
    }
    // console.log('11111', houseDetail)
    return houseDetail
  }
}

// 控制图标显示与隐藏
function changeOrder(obj) {
  var sequence = true
  $(obj).siblings().find('.js_price_up_before').css('display', 'none')
  $(obj).siblings().find('.js_price_up_after').css('display', 'block')
  $(obj).siblings().find('.js_price_down_before').css('display', 'none')
  $(obj).siblings().find('.js_price_down_after').css('display', 'block')
  $(''+obj+' .js_price_up_after').toggle()
  $(''+obj+' .js_price_up_before').toggle()
  if(!$(''+obj+' .js_price_up_after').is(':hidden')) {
    $(''+obj+' .js_price_down_after').css('display', 'none')
    $(''+obj+' .js_price_down_before').css('display', 'block')
  } else {
    $(''+obj+' .js_price_down_after').css('display', 'block')
    $(''+obj+' .js_price_down_before').css('display', 'none')
  }
  sequence = $(''+obj+' .js_price_up_after').is(':hidden')
  return sequence
}

// 通过dom节点获取blade模板渲染出的数据
function getVal() {
  // 定义空数组存放获取列表详细数据
  var data = []
  // 有多少条房源数据
  var list = $('.js_listDetail .listDetail')
  // console.log('元素', list)
  for(var i = 0; i < list.length; i++) {
    var item = {} // 定义对象存放每一个房源的数据
    item.img = list.eq(i).find('img').attr('src') // 获取图片路径
    item.area = list.eq(i).find('.listNum #listArea').html() // 获取面积
    item.price = list.eq(i).find('.listNum #listPrice').html() // 获取单价
    item.total = list.eq(i).find('.listNum #listTotal').html() // 获取总价
    item.feature = list.eq(i).find('#listSpecial').html() // 获取房源特色
    item.href = list.eq(i).find('a[href]').attr('href') // 要跳转的房源详情链接
    data.push(item)
    // 最多只显示10条数据，其他的隐藏
    if(i >= 10) {
      list.eq(i).css('display', 'none')
    }
  }
  // console.log('zheshishuju', data)
  return data
}

// 添加数据
function createVal(data) {
  $('.js_listDetail .listDetail').remove()
  for(var p in data) {
    var list = $(listTemplate).appendTo('.js_listDetail')
    list.find('img').attr('src', data[p].img)
    list.find('.listNum #listArea').html(data[p].area)
    list.find('.listNum #listPrice').html(data[p].price)
    list.find('.listNum #listTotal').html(data[p].total)
    list.find('#listSpecial').html(data[p].feature)
    list.find('a[href]').attr('href', data[p].href)
    // 最多只显示10条数据，其他的隐藏
    if(p >= 10) {
      list.css('display', 'none')
    }
  }
  // console.log('wewfdsgedfg', data)
  $('.js_listCount span').html( data.length ) // 房源的总数量
  // 房源数量大于10条显示查看更多
  if(data.length > 10) {
    $('.all').css('display', 'block')
  } else {
    $('.all').css('display', 'none')
  }
  houseDetail = data
  secondTop = $('#second').offset().top // 获取周边配套至顶部的高度
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
      var temp1 = select(min1, max1, 'area', initHouseData)
      var temp2 = select(min2, max2, 'price', temp1)
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
  // console.log(min, max, term, data)
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
  // console.log('筛选', item)
  return item
}

// 查看所有数据
$('.all').on('click', function(){
  $('.js_listDetail .listDetail').css('display', 'flex')
  $('.all').css('display', 'none')
  secondTop = $('#second').offset().top
})

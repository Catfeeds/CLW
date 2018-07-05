require('./home_common');
// 根据参数拼接url地址
function createURL(url, param) {
    var link = '';
    $.each(param, function (key, item) {
        link += '&' + key + "=" + item;
    });
    var result = url + "?" + link.substr(1);
    return result;
}
// 拿到所有条件值
var data = {
    area_id: $('#search').data('area_id') ? $('#search').data('area_id') : '',
    block_id: $('#search').data('block_id') ? $('#search').data('block_id') : '',
    features: $('#search').data('features') ? $('#search').data('features') : '',
    acreage: $('#search').data('acreage') ? $('#search').data('acreage') : '',
    unit_price: $('#search').data('unit_price') ? $('#search').data('unit_price') : '',
    renovation: $('#search').data('renovation') ? $('#search').data('renovation') : '',
    price_sort: $('#search').data('price_sort') ? $('#search').data('price_sort') : '', // ASC [DESC] 价格排序
}
// 判断 是否展示 已选
var condition = false
// 如果区域为空 商圈也要变为空
if(data.area_id=='') data.block_id=''

// 检查当前已选
for(var key in data){
    if(data[key]!==''){
        var dom = '.'+key
        if($(dom).length==0) continue
        condition = true
        if($(dom).length!==1) {
            html = ''
            $(dom).each(function () {
                html += '<div class="selected js_special">'+$(this).data('content')+'<span data-dom="'+$(this).data('dom')+'" class="close js_close"> &nbsp;x</span></div>'
            })
        }else{
            html = '<div class="selected js_special">'+$(dom).data('content')+'<span data-dom="'+$(dom).data('dom')+'" class="close js_close"> &nbsp;x</span></div>'
        }

        $('.selected_box').append(html)
    }
}
// 展示 已选信息
if(condition){
    $('.js_result').show()
}
// 清空处理
$('.js_cleaning').click(function () {
    // $('.selected_box').html('')
    data = removeData()
    window.location.href = createURL('building_list', data)
})
// 监听删除 某项已选的信息
$(document).on('click', '.js_close', function () {
    // $(this).parent().remove()
    data[$(this).data('dom')] = ''
    window.location.href = createURL('building_list', data)
})
// 监听点击 条件处理
$('.js_condition').click(function () {
    var content = $(this).data('content')
    if(data[$(this).data('dom')]==content) return
    data[$(this).data('dom')] = content?content:'';
    // 如果条件切换的的 是区域 则要清空商圈
    if($(this).data('dom')=='area_id') data.block_id=''
    // console.log($(this).data('dom'), createURL('building_list', data))
    window.location.href = createURL('building_list', data)
})
// 监听 特色 点击事件
$('.js_features').click(function () {
    // 如果存在 说明该项已被点击 该取消了
    if($(this).data('type')!==undefined) {
        if(data.features.toString().length!==1){
            var dates = data.features.split('-')
            var string = ''
            for(var key in dates){
                if(dates[key]!=$(this).data('content')) {
                    string += (dates[key]+'-')
                }
            }
            data.features = string.substr(0,string.length-1)
        }else{
            data.features = ''
        }
    }else{
        // 添加
        if(data.features===''){
            data.features = $(this).data('content')
        }else{
            data.features = data.features + '-' + $(this).data('content')
        }
    }
    window.location.href = createURL('building_list', data)
})
// 搜索关键词
$('.serch_btn').click(function () {
    window.location.href = createURL('building_list', {keyword: $('.serch_inp').val()})
})

// 价格排序
$('.js_price_sort').click(function () {
    var contont = $(this).data('content')
    if(contont==''||contont=='desc') {
        data.price_sort = 'asc'
    } else {
        data.price_sort = 'desc'
    }
    window.location.href = createURL('building_list', data)
})

// 默认排序
$('.js_price_default').click(function () {
    data.price_sort = ''
    window.location.href = createURL('building_list', data)
})
function removeData() {
    return {
        area_id: '',
        block_id: '',
        features: '',
        acreage: '',
        unit_price: '',
        renovation: '',
        keyword: '',
        price_sort: ''
    }
}
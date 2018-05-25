window.$ = window.jQuery = require('jquery');
// 获取电话号码并处理
var tel = $('#tel').html()
var newTel = tel.slice(0,3) + '****' + tel.slice(7)
$('#tel').html(newTel)

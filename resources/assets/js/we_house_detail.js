window.$ = window.jQuery = require('jquery');
$('.top').click(function(){
    $('#collapse').toggleClass("mui-active")     
})
$('#order').click(function(){
    console.log(1112223333)
    $('#popover').toggleClass('mui-popover')
})
webpackJsonp([15],{95:function(t,e,n){t.exports=n(96)},96:function(t,e,n){window.$=window.jQuery=n(0),$(document).on("touchend || tap",".loginBtn button",function(t){var e=$("#tel").val(),n=$("#password").val();$("#tel").blur(),$("#password")[0].blur(),e&&""!==e.trim()?n&&""!==n.trim()?n.length<6?alert("密码最小长度为6"):n.length>18?alert("密码最大长度为18"):$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/logins",type:"post",data:{tel:e,password:n},success:function(t){t.status&&(alert(t.message),window.location.href="/user")},error:function(t){alert(t.responseJSON.message)}}):alert("请输入密码"):alert("请输入手机号码")})}},[95]);
webpackJsonp([10],{155:function(e,n,t){e.exports=t(156)},156:function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var o=t(3),s=(t.n(o),t(4)),i=t.n(s),r=t(5);t.n(r);t(2),$(document).on("click",".loginOut button",function(){var e=$("#oldPwd").val(),n=$("#newPwd").val(),t=$("#confirmPwd").val();e&&""!=e.trim()?n&&""!=n.trim()?t&&""!=t.trim()?e.length<6||e.length>18?i()({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):n.length<6||n.length>18?i()({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):n!==t?i()({message:"确认密码与新密码必须一致",position:"center",duration:2e3}):$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/reset_pwd",type:"post",data:{old_pwd:e,new_pwd:n},success:function(e){var n=i()({message:e.message,position:"center",duration:5e3});setTimeout(function(){n.close(),window.location.href="/user"},1e3)},error:function(e){i()({message:e.responseJSON.message,position:"center",duration:5e3})}}):i()({message:"确认密码不能为空",position:"center",duration:2e3}):i()({message:"请输入新密码",position:"center",duration:2e3}):i()({message:"请输入旧密码",position:"center",duration:2e3})})}},[155]);
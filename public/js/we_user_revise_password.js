webpackJsonp([11],{126:function(e,t,o){e.exports=o(127)},127:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=o(1),s=(o.n(n),o(2));o.n(s);window.$=window.jQuery=o(0),$(document).on("touchend || tap",".loginOut",function(){var e=$("#oldPwd").val(),t=$("#newPwd").val(),o=$("#confirmPwd").val();e&&""!=e.trim()?t&&""!=t.trim()?o&&""!=o.trim()?e.length<6||e.length>18?Object(n.Toast)({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):t.length<6||t.length>18?Object(n.Toast)({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}):t!==o?Object(n.Toast)({message:"确认密码与新密码必须一致",position:"center",duration:2e3}):$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/reset_pwd",type:"post",data:{old_pwd:e,new_pwd:t},success:function(e){var t=Object(n.Toast)({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},2e3)},error:function(e){Object(n.Toast)({message:e.message,position:"center",duration:5e3})}}):Object(n.Toast)({message:"确认密码不能为空",position:"center",duration:2e3}):Object(n.Toast)({message:"请输入新密码",position:"center",duration:2e3}):Object(n.Toast)({message:"请输入旧密码",position:"center",duration:2e3})})}},[126]);
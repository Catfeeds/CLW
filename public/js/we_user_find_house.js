webpackJsonp([14],{120:function(e,t,n){e.exports=n(121)},121:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=n(2),a=(n.n(o),n(1));n.n(a);window.$=window.jQuery=n(0),$(document).on("touchend || tap",".loginOut",function(){var e=$("#appellation").val(),t=$("#tel").val(),n=$("#requirement").val();e&&""!=e.trim()?t&&""!=t.trim()?$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/bespeaks",type:"post",data:{tel:t,appellation:e,demand:n},success:function(e){var t=Object(a.Toast)({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},2e3)},error:function(e){Object(a.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}}):Object(a.Toast)({message:"请输入手机号码",position:"center",duration:2e3}):Object(a.Toast)({message:"请输入称谓",position:"center",duration:2e3})})}},[120]);
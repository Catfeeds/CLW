webpackJsonp([4],{131:function(e,t,o){e.exports=o(132)},132:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=o(1),s=(o.n(n),o(2));o.n(s);window.$=window.jQuery=o(0);var c=$("#tel").html();console.log("ceshi",c);var i=c.slice(0,3)+"****"+c.slice(7);$("#tel").html(i),$(document).on("touchend || tap",".loginOut",function(){$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/logout",type:"get",success:function(e){var t=Object(n.Toast)({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},1e3)},error:function(e){Object(n.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})})}},[131]);
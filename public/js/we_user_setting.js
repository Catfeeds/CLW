webpackJsonp([6],{134:function(e,t,n){e.exports=n(135)},135:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=n(1),s=(n.n(o),n(2));n.n(s),n(0);var c=$("#tel").html(),a=c.slice(0,3)+"****"+c.slice(7);$("#tel").html(a),$(document).on("touchend || tap",".loginOut",function(){$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/logout",type:"get",success:function(e){var t=Object(o.Toast)({message:e.message,position:"center",duration:5e3});setTimeout(function(){t.close(),window.location.href="/user"},1e3)},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})})}},[134]);
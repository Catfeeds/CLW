webpackJsonp([15],{112:function(e,t,s){e.exports=s(113)},113:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=s(2),o=(s.n(n),s(1));s.n(o);window.$=window.jQuery=s(0);var r=$("#tel"),a=$("#sms"),i=$("#password"),c=($("#time"),$("#getSms"));$(document).on("touchend || tap","#submit",function(e){var t=r.val(),s=a.val(),n=i.val();if(!t||""===t.trim())return Object(o.Toast)({message:"请输入手机号码",position:"center",duration:2e3}),!1;if(!s||""===s.trim())return Object(o.Toast)({message:"请输入短信验证码",position:"center",duration:2e3}),!1;if(!n||""===n.trim())return Object(o.Toast)({message:"请输入密码",position:"center",duration:2e3}),!1;if(n.length<6||n.length>18)return Object(o.Toast)({message:"密码长度必须在6-18位之间",position:"center",duration:2e3}),!1;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"registers",type:"post",success:function(e){e.success?(Object(o.Toast)({message:"登录成功",position:"center",duration:2e3}),window.location.href="/user"):Object(o.Toast)({message:e.message,position:"center",duration:2e3})},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:2e3})}})}),$(document).on("touchend || tap","#getSms",function(e){if(!r.val()||""===r.val().trim())return Object(o.Toast)({message:"请输入手机号码",position:"center",duration:2e3}),!1;var t=r.val()+"/register";$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+t,type:"get",success:function(e){if(e.success){c.html("120s");var t=setInterval(function(){c.html(parseInt(c.html())-1+"s"),parseInt(c.html())||(c.html("获取验证码"),window.clearInterval(t))},1e3);Object(o.Toast)({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:2e3})}})})}},[112]);
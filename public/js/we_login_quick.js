webpackJsonp([18],{137:function(e,n,t){e.exports=t(138)},138:function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var s=t(3),o=(t.n(s),t(4)),r=t.n(o),a=t(5);t.n(a);t(2);var i=$("#tel"),c=$("#sms"),u=$("#getSms"),l=!0;$(document).on("click",".loginBtn button",function(e){var n=i.val(),t=c.val();return n&&""!==n.trim()?t&&""!==t.trim()?void $.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/quick_login",type:"post",data:{tel:n,smsCode:t},success:function(e){if(e.success){var n=r()({message:e.message,position:"center",duration:2e3});setTimeout(function(){n.close(),window.location.href="/user"},1e3)}},error:function(e){r()({message:e.responseJSON.message,position:"center",duration:2e3})}}):(r()({message:"请输入验证码",position:"center",duration:2e3}),!1):(r()({message:"请输入手机号码",position:"center",duration:2e3}),!1)}),$(document).on("click","#getSms",function(e){console.log("censhiceshi ");var n=i.val();if(!n||""===n.trim())return r()({message:"请输入手机号码",position:"center",duration:2e3}),!1;var t=n+"/login";if(!l)return!1;l=!1,$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/sms/captcha/"+t,type:"get",success:function(e){if(e.success){u.html("120s");var n=setInterval(function(){u.html(parseInt(u.html())-1+"s"),parseInt(u.html())||(l=!0,u.html("获取验证码"),window.clearInterval(n))},1e3);r()({message:"短信发送成功",position:"center",duration:2e3})}},error:function(e){l=!0,r()({message:e.responseJSON.message,position:"center",duration:2e3})}})});var m=window.innerHeight;console.log(m),$(window).resize(function(){window.innerHeight<m?($("#agree").removeClass("agree"),$("#agree").addClass("active")):($("#agree").removeClass("active"),$("#agree").addClass("agree"))})}},[137]);
webpackJsonp([13],{115:function(e,t,o){e.exports=o(116)},116:function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=o(12),n=o.n(a),s=o(2),i=(o.n(s),o(1));o.n(i);window.$=window.jQuery=o(0),window.Vue=o(4);var r=JSON.parse($("#pageOne").val()),l=new Vue({el:"#houseList",data:{list:[],page:2},components:{houseList:n.a}});if(1===Math.ceil(r.total/r.per_page)&&$(".more").hide(),r.data.length)for(var c in r.data)l.list.push(r.data[c].office_building_house);else console.log(2),$(".more").hide();$(document).on("touchstart",".more button",function(e){var t="/ajax_browse_records?page="+l.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:t,type:"get",success:function(e){for(var t in e.data)l.list.push(e.data[t].office_building_house);console.log(Math.ceil(e.total/e.per_page)),console.log(l.page),console.log(Math.ceil(e.total/e.per_page)===l.page),Math.ceil(e.total/e.per_page)===l.page&&$(".more").hide(),l.page=l.page+1},error:function(e){Object(i.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}),0!==l.list.length?$("#nothing").hide():0==l.list.length&&$("#nothing").show()}},[115]);
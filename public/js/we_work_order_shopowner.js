webpackJsonp([4],{135:function(e,t,n){e.exports=n(136)},136:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=n(6),o=n.n(a),s=n(1);n.n(s);o.a.component(s.Actionsheet.name,s.Actionsheet),o.a.component(s.Button.name,s.Button),o.a.component(s.Cell.name,s.Cell),o.a.component(s.Navbar.name,s.Navbar),o.a.component(s.TabItem.name,s.TabItem),o.a.component(s.Loadmore.name,s.Loadmore),o.a.use(s.InfiniteScroll);var i={staff_id:"",id:"",tel:$('meta[name="tel"]').attr("content")},c=function(e){i.staff_id=e.id,function(e){$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/api/distribution",type:"post",data:e,success:function(e){console.log(e),e.success&&(Object(s.Toast)({message:e.message,position:"center",duration:1e3}),l.unshopkowner.splice(l.index,1),u(1,this.page1,!0))},error:function(e){Object(s.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}(i)},p="http://agency_api.jacklin.club",r=!1,l=new o.a({el:"#app",data:{index:null,pulldown1:!1,pulldown2:!1,untopStatus:"",topStatus:"",page1:1,page2:1,shopkowner:[],unshopkowner:[],selected:"1",sheetVisible:!1,sheetClick:function(e){console.log("e",e)},actions:[]},methods:{sheet:function(e,t){this.index=t,i.id=e,this.sheetVisible=!this.sheetVisible},getUnList:function(){pulldown1?s.Indicator.open({text:"再无更多数据...",spinnerType:"fading-circle"}):s.Indicator.open({text:"加载中...",spinnerType:"fading-circle"}),console.log(111),this.pulldown1||u(1,this.page1)},unloadTop:function(){this.page1=1,u(1,this.page1,!0)},unhandleTopChange:function(e){this.untopStatus=e},getList:function(){pulldown2?s.Indicator.open({text:"再无更多数据...",spinnerType:"fading-circle"}):s.Indicator.open({text:"加载中...",spinnerType:"fading-circle"}),this.pulldown2||(u(2,this.page2),console.log("上拉加载更多",this.page2))},loadTop:function(){this.page2=1,u(2,this.page2,!0)},handleTopChange:function(e){this.topStatus=e}},created:function(){u(1,this.page1,!0),r=!1,u(2,this.page2,!0);var e=this;$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/api/get_staff",type:"get",data:{status:1,tel:$('meta[name="tel"]').attr("content")},success:function(t){if(t.success){var n=[];for(var a in t.data)n.push({id:t.data[a].value,name:t.data[a].label,method:c});e.actions=n}},error:function(e){Object(s.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}});function u(e,t){var n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];r||(r=!0,$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/api/shopkeeper_list",type:"get",data:{status:e,tel:$('meta[name="tel"]').attr("content"),page:t},success:function(t){t.success&&(1===e?(n?(l.pulldown1=!1,l.unshopkowner=t.data.data,setTimeout(function(){l.$refs.unloadmore.onTopLoaded()},1e3)):l.unshopkowner=l.unshopkowner.concat(t.data.data),t.data.last_page===l.page1&&(l.pulldown1=!0),l.page1++):2===e&&(n?(l.pulldown2=!1,l.shopkowner=t.data.data,setTimeout(function(){l.$refs.loadmore.onTopLoaded()},1e3)):l.shopkowner=l.shopkowner.concat(t.data.data),t.data.last_page===l.page2&&(l.pulldown2=!0),l.page2++)),r=!1,s.Indicator.close()},error:function(e){s.Indicator.close(),Object(s.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}}))}}},[135]);
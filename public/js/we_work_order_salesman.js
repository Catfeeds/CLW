webpackJsonp([5],{137:function(e,t,n){e.exports=n(138)},138:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=n(6),o=n.n(a),s=n(1);n.n(s);o.a.component(s.Actionsheet.name,s.Actionsheet),o.a.component(s.Button.name,s.Button),o.a.component(s.Cell.name,s.Cell),o.a.component(s.TabItem.name,s.TabItem),o.a.component(s.Loadmore.name,s.Loadmore),o.a.use(s.InfiniteScroll);var i={id:"",tel:$('meta[name="tel"]').attr("content")},c=!1,p="http://agency_api.jacklin.club",l=new o.a({el:"#app",data:{pulldown1:!1,pulldown2:!1,untopStatus:"",topStatus:"",page1:1,page2:1,salesman:[],unsalesman:[],selected:"1",sheetVisible:!1,sheetClick:function(e){console.log("e",e)},actions:[]},methods:{sheet:function(e,t){i.id=e,function(e,t){$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/api/determine",type:"post",data:e,success:function(e){e.success&&(Object(s.Toast)({message:e.message,position:"center",duration:1e3}),l.unsalesman.splice(t,1),u(2,1,!0))},error:function(e){Object(s.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}(i,t)},getUnList:function(){pulldown1?s.Indicator.open({text:"再无更多数据...",spinnerType:"fading-circle"}):s.Indicator.open({text:"加载中...",spinnerType:"fading-circle"}),this.pulldown1||u(1,this.page1)},unloadTop:function(){this.page1=1,u(1,this.page1,!0)},unhandleTopChange:function(e){this.topStatus=e},getList:function(){pulldown2?s.Indicator.open({text:"再无更多数据...",spinnerType:"fading-circle"}):s.Indicator.open({text:"加载中...",spinnerType:"fading-circle"}),this.pulldown2||(u(2,this.page2),console.log("上拉加载更多",this.page2))},loadTop:function(){this.page2=1,u(2,this.page2,!0)},handleTopChange:function(e){this.untopStatus=e}},created:function(){u(1,this.page1,!0),c=!1,u(2,this.page2,!0),console.log("获取已确定工单",this.page2)}});function u(e,t){var n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];c||(c=!0,$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/api/staff_list",type:"get",data:{status:e,tel:$('meta[name="tel"]').attr("content"),page:t},success:function(t){1===e?(n?(l.pulldown1=!1,l.unsalesman=t.data.data,setTimeout(function(){l.$refs.unloadmore.onTopLoaded()},1e3)):l.unsalesman=l.unsalesman.concat(t.data.data),t.data.last_page===l.page1&&(l.pulldown1=!0),l.page1++):2===e&&(n?(l.pulldown2=!1,l.salesman=t.data.data,setTimeout(function(){l.$refs.loadmore.onTopLoaded()},1e3)):l.salesman=l.salesman.concat(t.data.data),t.data.last_page===l.page2&&(l.pulldown2=!0),l.page2++),c=!1,s.Indicator.close()},error:function(e){s.Indicator.close(),Object(s.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}}))}}},[137]);
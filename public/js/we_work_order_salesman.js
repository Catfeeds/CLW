webpackJsonp([7],{148:function(e,t,a){e.exports=a(149)},149:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=a(6),s=a.n(n),o=a(0);a.n(o);s.a.component(o.Actionsheet.name,o.Actionsheet),s.a.component(o.Button.name,o.Button),s.a.component(o.Cell.name,o.Cell),s.a.component(o.TabItem.name,o.TabItem),s.a.component(o.Loadmore.name,o.Loadmore),s.a.use(o.InfiniteScroll);var i={guid:"",openid:$('meta[name="openid"]').attr("content")},c=!1,p="http://agency_api.jacklin.club/api/admin",r=new s.a({el:"#app",data:{pulldown1:!1,pulldown2:!1,untopStatus:"",topStatus:"",page1:1,page2:1,salesman:[],unsalesman:[],selected:"1",sheetVisible:!1,sheetClick:function(e){console.log("e",e)},actions:[]},methods:{sheet:function(e,t){i.guid=e,function(e,t){$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/determine",type:"post",data:e,success:function(e){e.success&&(Object(o.Toast)({message:e.message,position:"center",duration:1e3}),r.unsalesman.splice(t,1),r.loadTop(),r.pulldown2=!1)},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}(i,t)},getUnList:function(){this.pulldown1?o.Indicator.open({text:"再无更多数据...",spinnerType:"fading-circle"}):o.Indicator.open({text:"加载中...",spinnerType:"fading-circle"}),this.pulldown1||d(1,this.page1)},unloadTop:function(){this.page1=1,d(1,this.page1,!0)},unhandleTopChange:function(e){this.topStatus=e},getList:function(){this.pulldown2?o.Indicator.open({text:"再无更多数据...",spinnerType:"fading-circle"}):o.Indicator.open({text:"加载中...",spinnerType:"fading-circle"}),this.pulldown2||(d(2,this.page2),console.log("上拉加载更多",this.page2))},loadTop:function(){this.page2=1,d(2,this.page2,!0)},handleTopChange:function(e){this.untopStatus=e},addFeedback:function(e){o.MessageBox.prompt("请输入反馈信息","").then(function(t){var a=t.value;t.action;if(a){var n={guid:e,feedback:a,valid:1};$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/feedback",type:"post",data:n,success:function(e){e.success&&(Object(o.Toast)({message:e.message,position:"center",duration:1e3}),d(2,1,!0))},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}else Object(o.Toast)({message:"反馈信息不能为空",position:"center",duration:1e3})})},addIneffective:function(e){o.MessageBox.prompt("请输入无效原因","").then(function(t){var a=t.value;t.action;if(a){var n={guid:e,feedback:a,valid:2};$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/feedback",type:"post",data:n,success:function(e){e.success&&(Object(o.Toast)({message:e.message,position:"center",duration:1e3}),d(2,1,!0))},error:function(e){Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})}else Object(o.Toast)({message:"无效原因不能为空",position:"center",duration:1e3})})}},created:function(){d(1,this.page1,!0),c=!1,d(2,this.page2,!0),console.log("获取已确定工单",this.page2)}});function d(e,t){var a=arguments.length>2&&void 0!==arguments[2]&&arguments[2];c||(c=!0,$.ajax({headers:{safeString:$('meta[name="safeString"]').attr("content")},url:p+"/staff_list",type:"get",data:{status:e,openid:$('meta[name="openid"]').attr("content"),page:t},success:function(t){1===e?(a?(r.pulldown1=!1,r.unsalesman=t.data.data,setTimeout(function(){r.$refs.unloadmore.onTopLoaded()},1e3)):r.unsalesman=r.unsalesman.concat(t.data.data),t.data.last_page===r.page1&&(r.pulldown1=!0),r.page1++):2===e&&(a?(r.pulldown2=!1,r.salesman=t.data.data,setTimeout(function(){r.$refs.loadmore.onTopLoaded()},1e3)):r.salesman=r.salesman.concat(t.data.data),t.data.last_page===r.page2&&(r.pulldown2=!0),r.page2++),c=!1,o.Indicator.close()},error:function(e){o.Indicator.close(),Object(o.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}}))}}},[148]);
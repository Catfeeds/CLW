webpackJsonp([6],{101:function(e,t,n){var s=n(8)(n(102),n(103),!1,null,null,null);e.exports=s.exports},102:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=n(14);n.n(s);t.default={props:["list"],components:{swiper:s.swiper,swiperSlide:s.swiperSlide},data:function(){return{options:{slidesPerView:4,slidesPerGroup:4}}}}},103:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("swiper",{attrs:{options:e.options}},e._l(e.list,function(t,s){return n("swiper-slide",{key:"feature"+s,staticStyle:{position:"relative"}},[n("img",{attrs:{src:t.pic}}),e._v(" "),n("h5",[e._v(e._s(t.name))])])}))},staticRenderFns:[]}},88:function(e,t,n){e.exports=n(89)},89:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=n(12),r=n.n(s);n(2),Vue.component("house-detail-list",n(16)),Vue.component("detail-banner",n(17)),Vue.component("feature-banner",n(101)),Vue.use(r.a,{ak:"GNEfPXFcuuKglYSB8R45IzmhzfjKDclf"}),new Vue({el:"#Vuebuilding",data:{imgList:JSON.parse($("#imgList").val()),features:JSON.parse($("#features").val()),center:JSON.parse($("#gps").val())}})}},[88]);
webpackJsonp([4],{15:function(e,t,n){var s=n(5)(n(16),n(17),!1,null,null,null);e.exports=s.exports},16:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=n(7);n.n(s);t.default={props:["list"],components:{swiper:s.swiper,swiperSlide:s.swiperSlide},data:function(){return{options:{slidesPerView:4,slidesPerGroup:4}}}}},17:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("swiper",{attrs:{options:e.options}},e._l(e.list,function(t,s){return n("swiper-slide",{key:"feature"+s,staticStyle:{position:"relative"}},[n("img",{attrs:{src:t.pic}}),e._v(" "),n("h5",[e._v(e._s(t.name))])])}))},staticRenderFns:[]}},63:function(e,t,n){e.exports=n(64)},64:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=n(10),i=n.n(s);window.$=window.jQuery=n(0),window.Vue=n(4),Vue.component("house-detail-list",n(11)),Vue.component("detail-banner",n(13)),Vue.component("feature-banner",n(15)),Vue.use(i.a,{ak:"GNEfPXFcuuKglYSB8R45IzmhzfjKDclf"}),new Vue({el:"#Vuebuilding",data:{imgList:JSON.parse($("#imgList").val()),features:JSON.parse($("#features").val()),center:JSON.parse($("#gps").val())}})}},[63]);
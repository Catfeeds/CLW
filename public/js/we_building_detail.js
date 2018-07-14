<<<<<<< HEAD
webpackJsonp([6],{101:function(e,t,n){var s=n(8)(n(102),n(103),!1,null,null,null);e.exports=s.exports},102:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=n(14);n.n(s);t.default={props:["list"],components:{swiper:s.swiper,swiperSlide:s.swiperSlide},data:function(){return{options:{slidesPerView:4,slidesPerGroup:4}}}}},103:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("swiper",{attrs:{options:e.options}},e._l(e.list,function(t,s){return n("swiper-slide",{key:"feature"+s,staticStyle:{position:"relative"}},[n("img",{attrs:{src:t.pic}}),e._v(" "),n("h5",[e._v(e._s(t.name))])])}))},staticRenderFns:[]}},88:function(e,t,n){e.exports=n(89)},89:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=n(12),r=n.n(s);n(2),Vue.component("house-detail-list",n(16)),Vue.component("detail-banner",n(17)),Vue.component("feature-banner",n(101)),Vue.use(r.a,{ak:"GNEfPXFcuuKglYSB8R45IzmhzfjKDclf"}),new Vue({el:"#Vuebuilding",data:{imgList:JSON.parse($("#imgList").val()),features:JSON.parse($("#features").val()),center:JSON.parse($("#gps").val())}})}},[88]);
=======
webpackJsonp([3],{

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(63);


/***/ }),

/***/ 63:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__ = __webpack_require__(9);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__);
__webpack_require__(0);

Vue.component('house-detail-list', __webpack_require__(13));
Vue.component('detail-banner', __webpack_require__(14));
Vue.component('feature-banner', __webpack_require__(75));
Vue.use(__WEBPACK_IMPORTED_MODULE_0_vue_baidu_map___default.a, {
  ak: 'GNEfPXFcuuKglYSB8R45IzmhzfjKDclf'
});
new Vue({
  el: '#Vuebuilding',
  data: {
    imgList: JSON.parse($('#imgList').val()),
    features: JSON.parse($('#features').val()),
    center: JSON.parse($('#gps').val())
  }
});

/***/ }),

/***/ 75:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(4)
/* script */
var __vue_script__ = __webpack_require__(76)
/* template */
var __vue_template__ = __webpack_require__(77)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/featureBanner.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-8606c78a", Component.options)
  } else {
    hotAPI.reload("data-v-8606c78a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 76:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(11);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__);
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['list'],
  components: {
    swiper: __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__["swiper"],
    swiperSlide: __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__["swiperSlide"]
  },
  data: function data() {
    return {
      options: {
        slidesPerView: 4,
        slidesPerGroup: 4
      }
    };
  }
});

/***/ }),

/***/ 77:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "swiper",
    { attrs: { options: _vm.options } },
    _vm._l(_vm.list, function(item, index) {
      return _c(
        "swiper-slide",
        { key: "feature" + index, staticStyle: { position: "relative" } },
        [
          _c("img", { attrs: { src: item.pic } }),
          _vm._v(" "),
          _c("h5", [_vm._v(_vm._s(item.name))])
        ]
      )
    })
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-8606c78a", module.exports)
  }
}

/***/ })

},[62]);
>>>>>>> zxz

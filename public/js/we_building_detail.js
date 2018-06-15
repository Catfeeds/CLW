<<<<<<< HEAD
<<<<<<< HEAD
webpackJsonp([5],{
=======
webpackJsonp([3],{
>>>>>>> origin/cyq
=======
webpackJsonp([4],{
>>>>>>> origin/wanghao

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(62);


/***/ }),

/***/ 62:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
<<<<<<< HEAD
<<<<<<< HEAD
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__ = __webpack_require__(11);
=======
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__ = __webpack_require__(10);
>>>>>>> origin/wanghao
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__);
__webpack_require__(0);

Vue.component('house-detail-list', __webpack_require__(15));
Vue.component('detail-banner', __webpack_require__(16));
=======
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__ = __webpack_require__(8);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__);
__webpack_require__(0);

Vue.component('house-detail-list', __webpack_require__(12));
Vue.component('detail-banner', __webpack_require__(13));
>>>>>>> origin/cyq
Vue.component('feature-banner', __webpack_require__(74));
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

/***/ 74:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
<<<<<<< HEAD
<<<<<<< HEAD
var normalizeComponent = __webpack_require__(7)
=======
var normalizeComponent = __webpack_require__(4)
>>>>>>> origin/cyq
=======
var normalizeComponent = __webpack_require__(6)
>>>>>>> origin/wanghao
/* script */
var __vue_script__ = __webpack_require__(75)
/* template */
var __vue_template__ = __webpack_require__(76)
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
<<<<<<< HEAD
Component.options.__file = "resources/assets/js/components/featureBanner.vue"
=======
Component.options.__file = "resources\\assets\\js\\components\\featureBanner.vue"
>>>>>>> origin/cyq

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
<<<<<<< HEAD
    hotAPI.createRecord("data-v-8606c78a", Component.options)
  } else {
    hotAPI.reload("data-v-8606c78a", Component.options)
=======
    hotAPI.createRecord("data-v-5959920a", Component.options)
  } else {
    hotAPI.reload("data-v-5959920a", Component.options)
>>>>>>> origin/cyq
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 75:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
<<<<<<< HEAD
<<<<<<< HEAD
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(13);
=======
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(10);
>>>>>>> origin/cyq
=======
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(12);
>>>>>>> origin/wanghao
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

/***/ 76:
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
<<<<<<< HEAD
    require("vue-hot-reload-api")      .rerender("data-v-8606c78a", module.exports)
=======
    require("vue-hot-reload-api")      .rerender("data-v-5959920a", module.exports)
>>>>>>> origin/cyq
  }
}

/***/ })

},[61]);
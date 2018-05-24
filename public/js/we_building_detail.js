webpackJsonp([3],{

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(57);


/***/ }),

/***/ 57:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(2);
// Vue.component('house-detail-list', require('./components/houseDetailList.vue.vue'));
Vue.component('detail-banner', __webpack_require__(58));
Vue.component('feature-banner', __webpack_require__(62));
new Vue({
  el: '#Vuebuilding',
  data: {
    imgList: JSON.parse($('#imgList').val()),
    features: JSON.parse($('#features').val())
  }
});

/***/ }),

/***/ 58:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(6)
/* script */
var __vue_script__ = __webpack_require__(59)
/* template */
var __vue_template__ = __webpack_require__(61)
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
Component.options.__file = "resources\\assets\\js\\components\\detailBanner.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-04d53198", Component.options)
  } else {
    hotAPI.reload("data-v-04d53198", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 59:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(7);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__);
//
//
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
      cropStyle: '?imageMogr2/thumbnail/!400x300r/gravity/Center/crop/400x300/blur/1x0/quality/75|watermark/1/image/aHR0cHM6Ly9jZG4uY2h1bG91d2FuZy5jbi9sb2dvX21pbl9taW4ucG5n/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim',
      srcImg: '/we_img/none.png',
      options: {
        autoplay: 3000,
        autoplayDisableOnInteraction: false
      }
    };
  }
});

/***/ }),

/***/ 61:
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
        { key: "banner" + index, staticStyle: { position: "relative" } },
        [
          _c("a", { attrs: { href: "#" } }, [
            _c("img", { attrs: { src: item.url + _vm.cropStyle } })
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticStyle: {
                width: "60px",
                height: "26px",
                background: "rgba(2,2,2,0.6)",
                "padding-left": "10px",
                "border-radius": "20px",
                position: "absolute",
                right: "15px",
                bottom: "40px"
              }
            },
            [
              _c("img", {
                staticStyle: { width: "12px" },
                attrs: { src: _vm.srcImg }
              }),
              _c(
                "span",
                {
                  staticStyle: {
                    "margin-left": "5px",
                    color: "white",
                    "font-size": "14px"
                  }
                },
                [_vm._v(_vm._s(index + 1) + "/" + _vm._s(_vm.list.length))]
              )
            ]
          )
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
    require("vue-hot-reload-api")      .rerender("data-v-04d53198", module.exports)
  }
}

/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(6)
/* script */
var __vue_script__ = __webpack_require__(63)
/* template */
var __vue_template__ = __webpack_require__(64)
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
Component.options.__file = "resources\\assets\\js\\components\\featureBanner.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5959920a", Component.options)
  } else {
    hotAPI.reload("data-v-5959920a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 63:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(7);
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

/***/ 64:
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
    require("vue-hot-reload-api")      .rerender("data-v-5959920a", module.exports)
  }
}

/***/ })

},[56]);
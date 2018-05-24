<<<<<<< HEAD
webpackJsonp([3],{56:function(e,t,i){e.exports=i(57)},57:function(e,t,i){window.$=window.jQuery=i(0),window.Vue=i(2),Vue.component("detail-banner",i(58)),Vue.component("feature-banner",i(62)),new Vue({el:"#Vuebuilding",data:{imgList:JSON.parse($("#imgList").val()),features:JSON.parse($("#features").val())}})},58:function(e,t,i){var r=i(5)(i(59),i(61),!1,null,null,null);e.exports=r.exports},59:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=i(8);i.n(r);t.default={props:["list"],components:{swiper:r.swiper,swiperSlide:r.swiperSlide},data:function(){return{cropStyle:"?imageMogr2/thumbnail/!400x300r/gravity/Center/crop/400x300/blur/1x0/quality/75|watermark/1/image/aHR0cHM6Ly9jZG4uY2h1bG91d2FuZy5jbi9sb2dvX21pbl9taW4ucG5n/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim",srcImg:"/we_img/none.png",options:{autoplay:3e3,autoplayDisableOnInteraction:!1}}}}},61:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("swiper",{attrs:{options:e.options}},e._l(e.list,function(t,r){return i("swiper-slide",{key:"banner"+r,staticStyle:{position:"relative"}},[i("a",{attrs:{href:"#"}},[i("img",{attrs:{src:t.url+e.cropStyle}})]),e._v(" "),i("div",{staticStyle:{width:"60px",height:"26px",background:"rgba(2,2,2,0.6)","padding-left":"10px","border-radius":"20px",position:"absolute",right:"15px",bottom:"40px"}},[i("img",{staticStyle:{width:"12px"},attrs:{src:e.srcImg}}),i("span",{staticStyle:{"margin-left":"5px",color:"white","font-size":"14px"}},[e._v(e._s(r+1)+"/"+e._s(e.list.length))])])])}))},staticRenderFns:[]}},62:function(e,t,i){var r=i(5)(i(63),i(64),!1,null,null,null);e.exports=r.exports},63:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=i(8);i.n(r);t.default={props:["list"],components:{swiper:r.swiper,swiperSlide:r.swiperSlide},data:function(){return{options:{slidesPerView:4,slidesPerGroup:4}}}}},64:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("swiper",{attrs:{options:e.options}},e._l(e.list,function(t,r){return i("swiper-slide",{key:"feature"+r,staticStyle:{position:"relative"}},[i("img",{attrs:{src:t.pic}}),e._v(" "),i("h5",[e._v(e._s(t.name))])])}))},staticRenderFns:[]}}},[56]);
=======
webpackJsonp([3],{

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(62);


/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);
// Vue.component('house-detail-list', require('./components/houseDetailList.vue.vue'));
Vue.component('detail-banner', __webpack_require__(63));
Vue.component('feature-banner', __webpack_require__(67));
new Vue({
  el: '#Vuebuilding',
  data: {
    imgList: JSON.parse($('#imgList').val()),
    features: JSON.parse($('#features').val())
  }
});

/***/ }),

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(64)
/* template */
var __vue_template__ = __webpack_require__(66)
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

/***/ 64:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(9);
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

/***/ 66:
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

/***/ 67:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(68)
/* template */
var __vue_template__ = __webpack_require__(69)
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

/***/ 68:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_awesome_swiper__ = __webpack_require__(9);
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

/***/ 69:
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

},[61]);
>>>>>>> origin/cyq

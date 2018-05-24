webpackJsonp([4],{

/***/ 105:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(106);


/***/ }),

/***/ 106:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(107);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(2);

var pageOne = JSON.parse($('#pageOne').val());
var app = new Vue({
    el: '#houseList',
    data: {
        list: [],
        page: 2
    },
    components: {
        houseList: __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default.a
    }
});

for (var key in pageOne.data) {
    app.list.push(pageOne.data[key].office_building_house);
}
$(document).on('touchstart', '.more button', function (e) {
    var url = '/ajax_browse_records?page=' + app.page;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'get',
        success: function success(data) {
            for (var key in data.data) {
                app.list.push(data.data[key].office_building_house);
            }
            console.log(Math.ceil(data.total / data.per_page));
            console.log(app.page);
            console.log(Math.ceil(data.total / data.per_page) === app.page);
            if (Math.ceil(data.total / data.per_page) === app.page) {
                $('.more').hide();
            }
            app.page = app.page + 1;
        },
        error: function error(data) {
            alert(data.responseJSON.message);
        }
    });
});

/***/ }),

/***/ 107:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(108)
}
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(110)
/* template */
var __vue_template__ = __webpack_require__(111)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
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
Component.options.__file = "resources/assets/js/components/houseList.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1d726652", Component.options)
  } else {
    hotAPI.reload("data-v-1d726652", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 108:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(109);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(10)("538d831f", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1d726652\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/sass-loader/lib/loader.js!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./houseList.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1d726652\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/sass-loader/lib/loader.js!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./houseList.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 109:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "\nul {\n  border-top: 0;\n}\nul.mui-table-view:before {\n    height: 0;\n}\nul.mui-table-view:after {\n    background-color: #f4f4f4;\n}\nul > li.mui-table-view-cell {\n    padding: 20px 5px 10px 10px;\n}\nul > li.mui-table-view-cell:after {\n      background-color: #f4f4f4;\n      left: 0;\n}\nul > li.mui-table-view-cell .decoration img {\n      position: absolute;\n      right: 15px;\n      top: 0;\n      width: 39px;\n      height: 25px;\n}\nul > li.mui-table-view-cell .house_title {\n      width: 88%;\n      overflow: hidden;\n      text-overflow: ellipsis;\n      white-space: nowrap;\n      color: #333333;\n}\nul > li.mui-table-view-cell .borders > div > span {\n      color: #007eff;\n      border: 0.5px solid #007eff;\n      border-radius: 1px;\n      font-size: 11px;\n      text-align: center;\n      float: left;\n      margin-right: 5px;\n      line-height: 100%;\n      padding: 1px;\n}\n", ""]);

// exports


/***/ }),

/***/ 110:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
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
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    props: {
        goodImg: { // 定位图标
            type: String,
            default: ''
        },
        list: {
            type: Array,
            default: []
        }
    },
    data: function data() {

        return {
            cropStyle: '?imageMogr2/thumbnail/!240x180r/gravity/Center/crop/240x180/format/jpg/blur/1x0/quality/75'
        };
    },

    methods: {
        jumpTo: function jumpTo(key) {
            window.location.href = '/house/' + key;
        }
    }
});

/***/ }),

/***/ 111:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "ul",
      { staticClass: "mui-table-view" },
      _vm._l(_vm.list, function(item, key) {
        return _c(
          "li",
          {
            key: "houses" + key,
            staticClass: "mui-table-view-cell mui-row",
            on: {
              click: function($event) {
                _vm.jumpTo(item.id)
              }
            }
          },
          [
            _c("img", {
              staticClass: "mui-col-xs-3",
              attrs: { src: item.indoor_img_cn + _vm.cropStyle }
            }),
            _vm._v(" "),
            _c("div", { staticClass: "list mui-col-xs-7" }, [
              _c("div", { staticClass: "title" }, [_vm._v(_vm._s(item.title))]),
              _vm._v(" "),
              _c("div", { staticClass: "areage" }, [
                _vm._v(_vm._s(item.constru_acreage_cn))
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "price mui-row" }, [
                _c("div", { staticClass: "mui-col-xs-3" }, [
                  _vm._v(_vm._s(item.unit_price_cn))
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "totalPrice mui-col-xs-7" }, [
                  _vm._v(_vm._s(item.total_price)),
                  item.total_price !== ""
                    ? _c("span", [_vm._v("元/月")])
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "mui-row better" }, [
                item.house_feature[0] !== ""
                  ? _c("div", { staticClass: "mui-col-3" }, [
                      _c("span", [_vm._v(_vm._s(item.house_feature[0]))])
                    ])
                  : _vm._e(),
                _vm._v(" "),
                item.house_feature[1] !== ""
                  ? _c("div", { staticClass: "mui-col-3" }, [
                      _c("span", [_vm._v(_vm._s(item.house_feature[1]))])
                    ])
                  : _vm._e(),
                _vm._v(" "),
                item.house_feature[2] !== ""
                  ? _c("div", { staticClass: "mui-col-3" }, [
                      _c("span", [_vm._v(_vm._s(item.house_feature[2]))])
                    ])
                  : _vm._e()
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "decoration" }, [
              _c("img", { attrs: { src: _vm.goodImg } })
            ])
          ]
        )
      })
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1d726652", module.exports)
  }
}

/***/ })

},[105]);
<<<<<<< HEAD
webpackJsonp([4],{103:function(e,t,i){e.exports=i(104)},104:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=i(105),o=i.n(a);window.$=window.jQuery=i(0),window.Vue=i(2);var s=JSON.parse($("#pageOne").val()),l=new Vue({el:"#houseList",data:{list:[],page:2},components:{houseList:o.a}});for(var r in s.data)l.list.push(s.data[r].office_building_house);$(document).on("touchstart",".more button",function(e){var t="/ajax_browse_records?page="+l.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:t,type:"get",success:function(e){for(var t in e.data)l.list.push(e.data[t].office_building_house);console.log(Math.ceil(e.total/e.per_page)),console.log(l.page),console.log(Math.ceil(e.total/e.per_page)===l.page),Math.ceil(e.total/e.per_page)===l.page&&$(".more").hide(),l.page=l.page+1},error:function(e){alert(e.responseJSON.message)}})})},105:function(e,t,i){var a=i(5)(i(108),i(109),!1,function(e){i(106)},null,null);e.exports=a.exports},106:function(e,t,i){var a=i(107);"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);i(10)("7ecab41f",a,!0,{})},107:function(e,t,i){(e.exports=i(6)(!1)).push([e.i,"ul{border-top:0}ul.mui-table-view:before{height:0}ul.mui-table-view:after{background-color:#f4f4f4}ul>li.mui-table-view-cell{padding:20px 5px 10px 10px}ul>li.mui-table-view-cell:after{background-color:#f4f4f4;left:0}ul>li.mui-table-view-cell .decoration img{position:absolute;right:15px;top:0;width:39px;height:25px}ul>li.mui-table-view-cell .house_title{width:88%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#333}ul>li.mui-table-view-cell .borders>div>span{color:#007eff;border:.5px solid #007eff;border-radius:1px;font-size:11px;text-align:center;float:left;margin-right:5px;line-height:100%;padding:1px}",""])},108:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:{goodImg:{type:String,default:""},list:{type:Array,default:[]}},data:function(){return{cropStyle:"?imageMogr2/thumbnail/!240x180r/gravity/Center/crop/240x180/format/jpg/blur/1x0/quality/75"}},methods:{jumpTo:function(e){window.location.href="/house/"+e}}}},109:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",[i("ul",{staticClass:"mui-table-view"},e._l(e.list,function(t,a){return i("li",{key:"houses"+a,staticClass:"mui-table-view-cell mui-row",on:{click:function(i){e.jumpTo(t.id)}}},[i("img",{staticClass:"mui-col-xs-3",attrs:{src:t.indoor_img_cn+e.cropStyle}}),e._v(" "),i("div",{staticClass:"list mui-col-xs-7"},[i("div",{staticClass:"title"},[e._v(e._s(t.title))]),e._v(" "),i("div",{staticClass:"areage"},[e._v(e._s(t.constru_acreage_cn))]),e._v(" "),i("div",{staticClass:"price mui-row"},[i("div",{staticClass:"mui-col-xs-3"},[e._v(e._s(t.unit_price_cn))]),e._v(" "),i("div",{staticClass:"totalPrice mui-col-xs-7"},[e._v(e._s(t.total_price)),""!==t.total_price?i("span",[e._v("元/月")]):e._e()])]),e._v(" "),i("div",{staticClass:"mui-row better"},[""!==t.house_feature[0]?i("div",{staticClass:"mui-col-3"},[i("span",[e._v(e._s(t.house_feature[0]))])]):e._e(),e._v(" "),""!==t.house_feature[1]?i("div",{staticClass:"mui-col-3"},[i("span",[e._v(e._s(t.house_feature[1]))])]):e._e(),e._v(" "),""!==t.house_feature[2]?i("div",{staticClass:"mui-col-3"},[i("span",[e._v(e._s(t.house_feature[2]))])]):e._e()])]),e._v(" "),i("div",{staticClass:"decoration"},[i("img",{attrs:{src:e.goodImg}})])])}))])},staticRenderFns:[]}}},[103]);
=======
webpackJsonp([5],{

/***/ 110:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(111);


/***/ }),

/***/ 111:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);

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
if (Math.ceil(pageOne.total / pageOne.per_page) === 1) $('.more').hide();
if (pageOne.data.length) {
    for (var key in pageOne.data) {
        app.list.push(pageOne.data[key].office_building_house);
    }
} else {
    console.log(2);
    $('.more').hide();
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

/***/ 12:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(13)
}
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(15)
/* template */
var __vue_template__ = __webpack_require__(16)
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
Component.options.__file = "resources\\assets\\js\\components\\houseList.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4a98c797", Component.options)
  } else {
    hotAPI.reload("data-v-4a98c797", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 13:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(14);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(8)("6ab79e68", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4a98c797\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/sass-loader/lib/loader.js!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./houseList.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4a98c797\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/sass-loader/lib/loader.js!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./houseList.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 14:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "\nul {\n  border-top: 0;\n}\nul.mui-table-view:before {\n    height: 0;\n}\nul.mui-table-view:after {\n    background-color: #f4f4f4;\n}\nul > li.mui-table-view-cell {\n    padding: 20px 5px 10px 10px;\n}\nul > li.mui-table-view-cell:after {\n      background-color: #f4f4f4;\n      left: 0;\n}\nul > li.mui-table-view-cell .decoration img {\n      position: absolute;\n      right: 15px;\n      top: 0;\n      width: 39px;\n      height: 25px;\n}\nul > li.mui-table-view-cell .house_title {\n      width: 88%;\n      overflow: hidden;\n      text-overflow: ellipsis;\n      white-space: nowrap;\n      color: #333333;\n}\nul > li.mui-table-view-cell .borders > div > span {\n      color: #007eff;\n      border: 0.5px solid #007eff;\n      border-radius: 1px;\n      font-size: 11px;\n      text-align: center;\n      float: left;\n      margin-right: 5px;\n      line-height: 100%;\n      padding: 1px;\n}\n.mui-content {\n  border-top: 1px solid #f4f4f4;\n}\n.mui-content ul {\n    margin-top: 0 !important;\n}\n.mui-content ul::before {\n      height: 0;\n}\n.mui-content ul::after {\n      height: 0;\n}\n.mui-content ul li {\n      padding: 16px 15px 17px 15px;\n      border-bottom: 1px solid #f4f4f4;\n      display: -webkit-box;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: start;\n          -ms-flex-pack: start;\n              justify-content: flex-start;\n}\n.mui-content ul li::after {\n        height: 0;\n}\n.mui-content ul li img {\n        width: 120px;\n        height: 90px;\n        margin-right: 15px;\n}\n.mui-content ul li .list .title {\n        width: 90%;\n        font-size: 14px;\n        color: #333;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n}\n.mui-content ul li .list .areage {\n        font-size: 15px;\n        color: #444;\n}\n.mui-content ul li .list .areage span {\n          font-size: 16px;\n}\n.mui-content ul li .list .price {\n        font-size: 13px;\n        color: #999;\n}\n.mui-content ul li .list .price .totalPrice {\n          font-size: 14px;\n          color: #666;\n          display: -webkit-box;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: end;\n              -ms-flex-pack: end;\n                  justify-content: flex-end;\n}\n.mui-content ul li .list .price .totalPrice span {\n            font-size: 15px;\n            color: #ff7200;\n}\n.mui-content ul li .list .better div {\n        color: #007eff;\n        font-size: 11px;\n        border: 1px solid #007eff;\n        border-radius: 3px;\n        padding: 0 3px;\n        margin-right: 5px;\n}\n.mui-content ul li .decoration {\n        position: absolute;\n        top: 0;\n        right: 0;\n}\n.mui-content ul li .decoration img {\n          width: 34px;\n          height: 20px;\n}\n", ""]);

// exports


/***/ }),

/***/ 15:
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

/***/ 16:
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
                _c("div", { staticClass: "mui-col-xs-6" }, [
                  _vm._v(_vm._s(item.unit_price_cn))
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "totalPrice mui-col-xs-6" }, [
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
    require("vue-hot-reload-api")      .rerender("data-v-4a98c797", module.exports)
  }
}

/***/ })

},[110]);
>>>>>>> origin/cyq

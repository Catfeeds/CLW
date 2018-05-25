<<<<<<< HEAD
webpackJsonp([5],{10:function(t,e,i){(t.exports=i(6)(!1)).push([t.i,"ul{border-top:0}ul.mui-table-view:before{height:0}ul.mui-table-view:after{background-color:#f4f4f4}ul>li.mui-table-view-cell{padding:20px 5px 10px 10px}ul>li.mui-table-view-cell:after{background-color:#f4f4f4;left:0}ul>li.mui-table-view-cell .decoration img{position:absolute;right:15px;top:0;width:39px;height:25px}ul>li.mui-table-view-cell .house_title{width:88%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#333}ul>li.mui-table-view-cell .borders>div>span{color:#007eff;border:.5px solid #007eff;border-radius:1px;font-size:11px;text-align:center;float:left;margin-right:5px;line-height:100%;padding:1px}.mui-content{border-top:1px solid #f4f4f4}.mui-content ul{margin-top:0!important}.mui-content ul:after,.mui-content ul:before{height:0}.mui-content ul li{padding:16px 15px 17px;border-bottom:1px solid #f4f4f4;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.mui-content ul li:after{height:0}.mui-content ul li img{width:120px;height:90px;margin-right:15px}.mui-content ul li .list .title{width:90%;font-size:14px;color:#333;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.mui-content ul li .list .areage{font-size:15px;color:#444}.mui-content ul li .list .areage span{font-size:16px}.mui-content ul li .list .price{font-size:13px;color:#999}.mui-content ul li .list .price .totalPrice{font-size:14px;color:#666;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.mui-content ul li .list .price .totalPrice span{font-size:15px;color:#ff7200}.mui-content ul li .list .better div{color:#007eff;font-size:11px;border:1px solid #007eff;border-radius:3px;padding:0 3px;margin-right:5px}.mui-content ul li .decoration{position:absolute;top:0;right:0}.mui-content ul li .decoration img{width:34px;height:20px}",""])},11:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:{goodImg:{type:String,default:""},list:{type:Array,default:[]}},data:function(){return{cropStyle:"?imageMogr2/thumbnail/!240x180r/gravity/Center/crop/240x180/format/jpg/blur/1x0/quality/75"}},methods:{jumpTo:function(t){window.location.href="/houses/"+t}}}},118:function(t,e,i){t.exports=i(119)},119:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var o=i(8),l=i.n(o),a=i(2),s=(i.n(a),i(1));i.n(s);window.$=window.jQuery=i(0),window.Vue=i(5);var n=JSON.parse($("#pageOne").val()),r=new Vue({el:"#houseList",data:{list:[],page:2},components:{houseList:l.a}});if(1===Math.ceil(n.total/n.per_page)&&$(".more").hide(),n.data.length)for(var c in n.data)r.list.push(n.data[c].office_building_house);else console.log(2),$(".more").hide();$(document).on("touchstart",".more button",function(t){var e="/ajax_collections?page="+r.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:e,type:"get",success:function(t){for(var e in t.data)r.list.push(t.data[e].office_building_house);console.log(Math.ceil(t.total/t.per_page)),console.log(r.page),console.log(Math.ceil(t.total/t.per_page)===r.page),Math.ceil(t.total/t.per_page)===r.page&&$(".more").hide(),r.page=r.page+1},error:function(t){Object(s.Toast)({message:t.message,position:"center",duration:5e3})}})})},12:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("ul",{staticClass:"mui-table-view"},t._l(t.list,function(e,o){return i("li",{key:"houses"+o,staticClass:"mui-table-view-cell mui-row",on:{touchend:function(i){t.jumpTo(e.id)}}},[i("img",{staticClass:"mui-col-xs-3",attrs:{src:e.indoor_img_cn+t.cropStyle}}),t._v(" "),i("div",{staticClass:"list mui-col-xs-7"},[i("div",{staticClass:"title"},[t._v(t._s(e.title))]),t._v(" "),i("div",{staticClass:"areage"},[t._v(t._s(e.constru_acreage_cn))]),t._v(" "),i("div",{staticClass:"price mui-row"},[i("div",{staticClass:"mui-col-xs-6"},[t._v(t._s(e.unit_price_cn))]),t._v(" "),i("div",{staticClass:"totalPrice mui-col-xs-6"},[t._v(t._s(e.total_price)),""!==e.total_price?i("span",[t._v("元/月")]):t._e()])]),t._v(" "),i("div",{staticClass:"mui-row better"},[""!==e.house_feature[0]?i("div",{staticClass:"mui-col-3"},[i("span",[t._v(t._s(e.house_feature[0]))])]):t._e(),t._v(" "),""!==e.house_feature[1]?i("div",{staticClass:"mui-col-3"},[i("span",[t._v(t._s(e.house_feature[1]))])]):t._e(),t._v(" "),""!==e.house_feature[2]?i("div",{staticClass:"mui-col-3"},[i("span",[t._v(t._s(e.house_feature[2]))])]):t._e()])]),t._v(" "),i("div",{staticClass:"decoration"},[i("img",{attrs:{src:t.goodImg}})])])}))])},staticRenderFns:[]}},8:function(t,e,i){var o=i(3)(i(11),i(12),!1,function(t){i(9)},null,null);t.exports=o.exports},9:function(t,e,i){var o=i(10);"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);i(7)("61b88d7c",o,!0,{})}},[118]);
=======
webpackJsonp([5],{

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "\nul {\n  border-top: 0;\n}\nul.mui-table-view:before {\n    height: 0;\n}\nul.mui-table-view:after {\n    background-color: #f4f4f4;\n}\nul > li.mui-table-view-cell {\n    padding: 20px 5px 10px 10px;\n}\nul > li.mui-table-view-cell:after {\n      background-color: #f4f4f4;\n      left: 0;\n}\nul > li.mui-table-view-cell .decoration img {\n      position: absolute;\n      right: 15px;\n      top: 0;\n      width: 39px;\n      height: 25px;\n}\nul > li.mui-table-view-cell .house_title {\n      width: 88%;\n      overflow: hidden;\n      text-overflow: ellipsis;\n      white-space: nowrap;\n      color: #333333;\n}\nul > li.mui-table-view-cell .borders > div > span {\n      color: #007eff;\n      border: 0.5px solid #007eff;\n      border-radius: 1px;\n      font-size: 11px;\n      text-align: center;\n      float: left;\n      margin-right: 5px;\n      line-height: 100%;\n      padding: 1px;\n}\n.mui-content {\n  border-top: 1px solid #f4f4f4;\n}\n.mui-content ul {\n    margin-top: 0 !important;\n}\n.mui-content ul::before {\n      height: 0;\n}\n.mui-content ul::after {\n      height: 0;\n}\n.mui-content ul li {\n      padding: 16px 15px 17px 15px;\n      border-bottom: 1px solid #f4f4f4;\n      display: -webkit-box;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: start;\n          -ms-flex-pack: start;\n              justify-content: flex-start;\n}\n.mui-content ul li::after {\n        height: 0;\n}\n.mui-content ul li img {\n        width: 120px;\n        height: 90px;\n        margin-right: 15px;\n}\n.mui-content ul li .list .title {\n        width: 90%;\n        font-size: 14px;\n        color: #333;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n}\n.mui-content ul li .list .areage {\n        font-size: 15px;\n        color: #444;\n}\n.mui-content ul li .list .areage span {\n          font-size: 16px;\n}\n.mui-content ul li .list .price {\n        font-size: 13px;\n        color: #999;\n}\n.mui-content ul li .list .price .totalPrice {\n          font-size: 14px;\n          color: #666;\n          display: -webkit-box;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: end;\n              -ms-flex-pack: end;\n                  justify-content: flex-end;\n}\n.mui-content ul li .list .price .totalPrice span {\n            font-size: 15px;\n            color: #ff7200;\n}\n.mui-content ul li .list .better div {\n        color: #007eff;\n        font-size: 11px;\n        border: 1px solid #007eff;\n        border-radius: 3px;\n        padding: 0 3px;\n        margin-right: 5px;\n}\n.mui-content ul li .decoration {\n        position: absolute;\n        top: 0;\n        right: 0;\n}\n.mui-content ul li .decoration img {\n          width: 34px;\n          height: 20px;\n}\n", ""]);

// exports


/***/ }),

/***/ 11:
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
            window.location.href = '/houses/' + key;
        }
    }
});

/***/ }),

/***/ 12:
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
              touchend: function($event) {
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
    require("vue-hot-reload-api")      .rerender("data-v-1d726652", module.exports)
  }
}

/***/ }),

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(121);


/***/ }),

/***/ 121:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(8);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui__);
/**
 * Created by wh on 2018/5/24.
 */
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(5);



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
    var url = '/ajax_collections?page=' + app.page;
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
        error: function error(res) {
            Object(__WEBPACK_IMPORTED_MODULE_2_mint_ui__["Toast"])({
                message: res.responseJSON.message,
                position: 'center',
                duration: 5000
            });
        }
    });
});

/***/ }),

/***/ 8:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(9)
}
var normalizeComponent = __webpack_require__(3)
/* script */
var __vue_script__ = __webpack_require__(11)
/* template */
var __vue_template__ = __webpack_require__(12)
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

/***/ 9:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(10);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("538d831f", content, false, {});
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

/***/ })

},[120]);
>>>>>>> origin/wanghao

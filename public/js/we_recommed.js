webpackJsonp([14],{

/***/ 100:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(101);


/***/ }),

/***/ 101:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/23.
 */
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(2);
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', __webpack_require__(7));
var app = new Vue({
  el: '#app',
  data: {
    list: listAppData.data
  }
});

/***/ })

},[100]);
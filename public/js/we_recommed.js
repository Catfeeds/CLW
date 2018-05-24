webpackJsonp([13],{

/***/ 95:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(96);


/***/ }),

/***/ 96:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/23.
 */
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(2);
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', __webpack_require__(6));
var app = new Vue({
  el: '#app',
  data: {
    list: listAppData.data
  }
});

/***/ })

},[95]);
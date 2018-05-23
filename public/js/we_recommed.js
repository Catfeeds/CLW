webpackJsonp([5],{

/***/ 82:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(83);


/***/ }),

/***/ 83:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/23.
 */
window.$ = window.jQuery = __webpack_require__(2);
window.Vue = __webpack_require__(8);
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', __webpack_require__(32));
console.log(listAppData);
var app = new Vue({
  el: '#app',
  data: {
    list: listAppData
  }
});

/***/ })

},[82]);
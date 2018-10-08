webpackJsonp([18],{

/***/ 113:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(114);


/***/ }),

/***/ 114:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/23.
 */
__webpack_require__(1);
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', __webpack_require__(8));
var app = new Vue({
  el: '#app',
  data: {
    list: listAppData
  }
});

/***/ })

},[113]);
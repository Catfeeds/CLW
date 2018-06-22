webpackJsonp([16],{

/***/ 119:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(120);


/***/ }),

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/23.
 */
__webpack_require__(1);
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', __webpack_require__(10));
var app = new Vue({
  el: '#app',
  data: {
    list: listAppData
  }
});

/***/ })

},[119]);
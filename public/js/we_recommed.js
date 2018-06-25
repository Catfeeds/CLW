webpackJsonp([16],{

/***/ 131:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(132);


/***/ }),

/***/ 132:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/23.
 */
__webpack_require__(2);
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', __webpack_require__(10));
var app = new Vue({
  el: '#app',
  data: {
    list: listAppData
  }
});

/***/ })

},[131]);
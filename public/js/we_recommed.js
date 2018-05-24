webpackJsonp([14],{

/***/ 106:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(107);


/***/ }),

/***/ 107:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by zxz1992 on 2018/5/23.
 */
window.$ = window.jQuery = __webpack_require__(0);
window.Vue = __webpack_require__(4);
var listAppData = JSON.parse($('#listAppData').val());
Vue.component('building-list', __webpack_require__(13));
var app = new Vue({
  el: '#app',
  data: {
    list: listAppData.data
  }
});

/***/ })

<<<<<<< HEAD
},[100]);
=======
},[106]);
>>>>>>> origin/zxz

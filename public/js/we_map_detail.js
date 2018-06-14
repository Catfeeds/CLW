webpackJsonp([16],{

/***/ 115:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(116);


/***/ }),

/***/ 116:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__ = __webpack_require__(11);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_baidu_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue_baidu_map__);
__webpack_require__(0);

Vue.use(__WEBPACK_IMPORTED_MODULE_0_vue_baidu_map___default.a, {
    ak: 'GNEfPXFcuuKglYSB8R45IzmhzfjKDclf'
});
var app = new Vue({
    el: '#Vuemap',
    data: {
        center: { lng: JSON.parse($('#build_id').val())[0], lat: JSON.parse($('#build_id').val())[1] },
        keyword: '地铁',
        location: '武汉',
        nearby: {
            center: {
                lng: JSON.parse($('#build_id').val())[0],
                lat: JSON.parse($('#build_id').val())[1]
            },
            radius: 10000
        }
    }
});
$(document).on('click', '.map-btn-item', function (e) {
    $('.map-btn-item').removeClass('active');
    var That = $(e.currentTarget);
    That.addClass('active');
    app.keyword = That.data('name');
});

/***/ })

},[115]);
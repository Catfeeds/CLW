<<<<<<< HEAD
webpackJsonp([6],{10:function(e,t,i){(e.exports=i(6)(!1)).push([e.i,"ul{border-top:0}ul.mui-table-view.self-style:before{height:0}ul.mui-table-view.self-style:after{background-color:#f4f4f4}ul>li.mui-table-view-cell.self-style{padding:20px 5px 10px 10px}ul>li.mui-table-view-cell.self-style:after{background-color:#f4f4f4;left:0}ul>li.mui-table-view-cell.self-style .decoration img{position:absolute;right:15px;top:0;width:39px;height:25px}ul>li.mui-table-view-cell.self-style .house_title{width:88%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#333}ul>li.mui-table-view-cell.self-style .borders>div>span{color:#007eff;border:.5px solid #007eff;border-radius:1px;font-size:11px;text-align:center;float:left;margin-right:5px;line-height:100%;padding:1px}.mui-content{border-top:1px solid #f4f4f4}.mui-content ul.self-style{margin-top:0!important}.mui-content ul.self-style:after,.mui-content ul.self-style:before{height:0}.mui-content ul.self-style li{padding:16px 15px 17px;border-bottom:1px solid #f4f4f4;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.mui-content ul.self-style li:after{height:0}.mui-content ul.self-style li img{width:120px;height:90px;margin-right:15px}.mui-content ul.self-style li .list .title{width:90%;font-size:14px;color:#333;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.mui-content ul.self-style li .list .areage{font-size:15px;color:#444}.mui-content ul.self-style li .list .areage span{font-size:16px}.mui-content ul.self-style li .list .price{font-size:13px;color:#999}.mui-content ul.self-style li .list .price .totalPrice{font-size:14px;color:#666;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.mui-content ul.self-style li .list .price .totalPrice span{font-size:15px;color:#ff7200}.mui-content ul.self-style li .list .better div{color:#007eff;font-size:11px;border:1px solid #007eff;border-radius:3px;padding:0 3px;margin-right:5px}.mui-content ul.self-style li .decoration{position:absolute;top:0;right:0}.mui-content ul.self-style li .decoration img{width:34px;height:20px}",""])},11:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:{goodImg:{type:String,default:""},list:{type:Array,default:[]}},data:function(){return{cropStyle:"?imageMogr2/thumbnail/!240x180r/gravity/Center/crop/240x180/format/jpg/blur/1x0/quality/75"}},methods:{jumpTo:function(e){window.location.href="/houses/"+e}}}},118:function(e,t,i){e.exports=i(119)},119:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var l=i(8),s=i.n(l),o=i(2),a=(i.n(o),i(1));i.n(a);window.$=window.jQuery=i(0),window.Vue=i(5);var n=JSON.parse($("#pageOne").val()),r=new Vue({el:"#houseList",data:{list:[],page:2},components:{houseList:s.a}});if(1===Math.ceil(n.total/n.per_page)&&$(".more").hide(),n.data.length)for(var c in n.data)r.list.push(n.data[c].office_building_house);else console.log(2),$(".more").hide();$(document).on("touchstart",".more button",function(e){var t="/ajax_collections?page="+r.page;$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:t,type:"get",success:function(e){for(var t in e.data)r.list.push(e.data[t].office_building_house);console.log(Math.ceil(e.total/e.per_page)),console.log(r.page),console.log(Math.ceil(e.total/e.per_page)===r.page),Math.ceil(e.total/e.per_page)===r.page&&$(".more").hide(),r.page=r.page+1},error:function(e){Object(a.Toast)({message:e.responseJSON.message,position:"center",duration:5e3})}})})},12:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",[i("ul",{staticClass:"mui-table-view self-style"},e._l(e.list,function(t,l){return i("li",{key:"houses"+l,staticClass:"mui-table-view-cell mui-row self-style",on:{touchend:function(i){e.jumpTo(t.id)}}},[i("img",{staticClass:"mui-col-xs-3",attrs:{src:t.indoor_img_cn+e.cropStyle}}),e._v(" "),i("div",{staticClass:"list mui-col-xs-7"},[i("div",{staticClass:"title"},[e._v(e._s(t.title))]),e._v(" "),i("div",{staticClass:"areage"},[e._v(e._s(t.constru_acreage_cn))]),e._v(" "),i("div",{staticClass:"price mui-row"},[i("div",{staticClass:"mui-col-xs-6"},[e._v(e._s(t.unit_price_cn))]),e._v(" "),i("div",{staticClass:"totalPrice mui-col-xs-6"},[e._v(e._s(t.total_price)),""!==t.total_price?i("span",[e._v("元/月")]):e._e()])]),e._v(" "),i("div",{staticClass:"mui-row better"},[""!==t.house_feature[0]?i("div",{staticClass:"mui-col-3"},[i("span",[e._v(e._s(t.house_feature[0]))])]):e._e(),e._v(" "),""!==t.house_feature[1]?i("div",{staticClass:"mui-col-3"},[i("span",[e._v(e._s(t.house_feature[1]))])]):e._e(),e._v(" "),""!==t.house_feature[2]?i("div",{staticClass:"mui-col-3"},[i("span",[e._v(e._s(t.house_feature[2]))])]):e._e()])]),e._v(" "),i("div",{staticClass:"decoration"},[i("img",{attrs:{src:e.goodImg}})])])}))])},staticRenderFns:[]}},8:function(e,t,i){var l=i(3)(i(11),i(12),!1,function(e){i(9)},null,null);e.exports=l.exports},9:function(e,t,i){var l=i(10);"string"==typeof l&&(l=[[e.i,l,""]]),l.locals&&(e.exports=l.locals);i(7)("0897381c",l,!0,{})}},[118]);
=======
webpackJsonp([12],{

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(121);


/***/ }),

/***/ 121:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_houseList_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_houseList_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_mint_ui__);
/**
 * Created by wh on 2018/5/24.
 */
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

/***/ })

},[120]);
>>>>>>> origin/lkt

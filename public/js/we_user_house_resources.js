<<<<<<< HEAD
webpackJsonp([5],{149:function(t,e,n){t.exports=n(150)},150:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=n(3),a=(n.n(i),n(4)),r=n.n(a),o=n(151),s=(n.n(o),n(153)),l=n.n(s),u=n(5);n.n(u);n(2),Vue.component(l.a.name,l.a);var c="",p=new Vue({el:"#picker",data:{value:"武昌区",slots:[{values:[]}],area_id:1},methods:{onValuesChange:function(t,e){this.value=e[0],""!==c&&(this.area_id=c[e[0]])}}});$.ajax({url:"/get_area",type:"get",success:function(t){p.slots[0].values=t.res,c=t.option},error:function(t){}}),$(document).on("touchend || tap","#down",function(){$("#picker").show()}),$(document).on("touchend || tap","#cancel",function(){$("#picker").hide()}),$(document).on("touchend || tap","#confirm",function(){$("#picker").hide(),$("#title").html(p.value)}),$(document).on("click",".loginOut button",function(){console.log(p.area_id);var t=$("#appellation").val(),e=$("#tel").val(),n=$("#acreage").val(),i=$("#buildingName").val();if(t&&""!=t.trim())if(e&&""!=e.trim())if(p.area_id)if(n&&""!=n.trim())if(i&&""!=i.trim()){var a=whatBrowser();$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},url:"/throw_ins",type:"post",data:{tel:e,appellation:t,building_name:i,area_id:p.area_id,acreage:n,area_name:p.value,page_source:a+"个人中心",source:a.substring(0,a.length-1)},success:function(t){var e=r()({message:"信息提交成功，楚楼网30分钟内联系您",position:"center",duration:5e3});setTimeout(function(){e.close(),window.location.href="/user"},1e3)},error:function(t){r()({message:t.responseJSON.message,position:"center",duration:5e3})}})}else r()({message:"请输入楼盘名称",position:"center",duration:2e3});else r()({message:"请输入面积",position:"center",duration:2e3});else r()({message:"请选择区域",position:"center",duration:2e3});else r()({message:"请输入电话",position:"center",duration:2e3});else r()({message:"请输入称谓",position:"center",duration:2e3})})},151:function(t,e,n){var i=n(152);"string"==typeof i&&(i=[[t.i,i,""]]);n(1)(i,{});i.locals&&(t.exports=i.locals)},152:function(t,e,n){(t.exports=n(0)(!1)).push([t.i,'.picker{overflow:hidden}.picker-toolbar{height:40px}.picker-items{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;padding:0;text-align:right;font-size:24px;position:relative}.picker-center-highlight{box-sizing:border-box;position:absolute;left:0;width:100%;top:50%;margin-top:-18px;pointer-events:none}.picker-center-highlight:after,.picker-center-highlight:before{content:"";position:absolute;height:1px;width:100%;background-color:#eaeaea;display:block;z-index:15;-webkit-transform:scaleY(.5);transform:scaleY(.5)}.picker-center-highlight:before{left:0;top:0;bottom:auto;right:auto}.picker-center-highlight:after{left:0;bottom:0;right:auto;top:auto}.picker-slot{font-size:18px;overflow:hidden;position:relative;max-height:100%}.picker-slot.picker-slot-left{text-align:left}.picker-slot.picker-slot-center{text-align:center}.picker-slot.picker-slot-right{text-align:right}.picker-slot.picker-slot-divider{color:#000;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.picker-slot-wrapper{-webkit-transition-duration:.3s;transition-duration:.3s;-webkit-transition-timing-function:ease-out;transition-timing-function:ease-out;-webkit-backface-visibility:hidden;backface-visibility:hidden}.picker-slot-wrapper.dragging,.picker-slot-wrapper.dragging .picker-item{-webkit-transition-duration:0s;transition-duration:0s}.picker-item{height:36px;line-height:36px;padding:0 10px;white-space:nowrap;position:relative;overflow:hidden;text-overflow:ellipsis;color:#707274;left:0;top:0;width:100%;box-sizing:border-box;-webkit-transition-duration:.3s;transition-duration:.3s;-webkit-backface-visibility:hidden;backface-visibility:hidden}.picker-slot-absolute .picker-item{position:absolute}.picker-item.picker-item-far{pointer-events:none}.picker-item.picker-selected{color:#000;-webkit-transform:translateZ(0) rotateX(0);transform:translateZ(0) rotateX(0)}.picker-3d .picker-items{overflow:hidden;-webkit-perspective:700px;perspective:700px}.picker-3d .picker-item,.picker-3d .picker-slot,.picker-3d .picker-slot-wrapper{-webkit-transform-style:preserve-3d;transform-style:preserve-3d}.picker-3d .picker-slot{overflow:visible}.picker-3d .picker-item{-webkit-transform-origin:center center;transform-origin:center center;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-transition-timing-function:ease-out;transition-timing-function:ease-out}',""])},153:function(t,e,n){t.exports=function(t){var e={};function n(i){if(e[i])return e[i].exports;var a=e[i]={i:i,l:!1,exports:{}};return t[i].call(a.exports,a,a.exports,n),a.l=!0,a.exports}return n.m=t,n.c=e,n.i=function(t){return t},n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:i})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=228)}({0:function(t,e){t.exports=function(t,e,n,i,a){var r,o=t=t||{},s=typeof t.default;"object"!==s&&"function"!==s||(r=t,o=t.default);var l,u="function"==typeof o?o.options:o;if(e&&(u.render=e.render,u.staticRenderFns=e.staticRenderFns),i&&(u._scopeId=i),a?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},u._ssrRegister=l):n&&(l=n),l){var c=u.functional,p=c?u.render:u.beforeCreate;c?u.render=function(t,e){return l.call(e),p(t,e)}:u.beforeCreate=p?[].concat(p,l):[l]}return{esModule:r,exports:o,options:u}}},1:function(t,e){t.exports=n(6)},129:function(t,e){},146:function(t,e,n){var i=n(0)(n(68),n(165),function(t){n(96)},null,null);t.exports=i.exports},147:function(t,e,n){var i=n(0)(n(69),n(199),function(t){n(129)},null,null);t.exports=i.exports},165:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"picker-slot",class:t.classNames,style:t.flexStyle},[t.divider?t._e():n("div",{ref:"wrapper",staticClass:"picker-slot-wrapper",class:{dragging:t.dragging},style:{height:t.contentHeight+"px"}},t._l(t.mutatingValues,function(e){return n("div",{staticClass:"picker-item",class:{"picker-selected":e===t.currentValue},style:{height:t.itemHeight+"px",lineHeight:t.itemHeight+"px"}},[t._v("\n      "+t._s("object"==typeof e&&e[t.valueKey]?e[t.valueKey]:e)+"\n    ")])})),t._v(" "),t.divider?n("div",[t._v(t._s(t.content))]):t._e()])},staticRenderFns:[]}},199:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"picker",class:{"picker-3d":t.rotateEffect}},[t.showToolbar?n("div",{staticClass:"picker-toolbar"},[t._t("default")],2):t._e(),t._v(" "),n("div",{staticClass:"picker-items"},[t._l(t.slots,function(e){return n("picker-slot",{attrs:{valueKey:t.valueKey,values:e.values||[],"text-align":e.textAlign||"center","visible-item-count":t.visibleItemCount,"class-name":e.className,flex:e.flex,"rotate-effect":t.rotateEffect,divider:e.divider,content:e.content,itemHeight:t.itemHeight,"default-index":e.defaultIndex},model:{value:t.values[e.valueIndex],callback:function(n){var i=t.values,a=e.valueIndex;Array.isArray(i)?i.splice(a,1,n):t.values[e.valueIndex]=n},expression:"values[slot.valueIndex]"}})}),t._v(" "),n("div",{staticClass:"picker-center-highlight",style:{height:t.itemHeight+"px",marginTop:-t.itemHeight/2+"px"}})],2)])},staticRenderFns:[]}},2:function(t,e,n){"use strict";var i=n(1),a=n.n(i);n.d(e,"c",function(){return u}),e.a=function(t,e){if(!t)return;for(var n=t.className,i=(e||"").split(" "),a=0,r=i.length;a<r;a++){var o=i[a];o&&(t.classList?t.classList.add(o):c(t,o)||(n+=" "+o))}t.classList||(t.className=n)},e.b=function(t,e){if(!t||!e)return;for(var n=e.split(" "),i=" "+t.className+" ",a=0,r=n.length;a<r;a++){var s=n[a];s&&(t.classList?t.classList.remove(s):c(t,s)&&(i=i.replace(" "+s+" "," ")))}t.classList||(t.className=o(i))};var r=a.a.prototype.$isServer,o=(r||Number(document.documentMode),function(t){return(t||"").replace(/^[\s\uFEFF]+|[\s\uFEFF]+$/g,"")}),s=!r&&document.addEventListener?function(t,e,n){t&&e&&n&&t.addEventListener(e,n,!1)}:function(t,e,n){t&&e&&n&&t.attachEvent("on"+e,n)},l=!r&&document.removeEventListener?function(t,e,n){t&&e&&t.removeEventListener(e,n,!1)}:function(t,e,n){t&&e&&t.detachEvent("on"+e,n)},u=function(t,e,n){var i=function(){n&&n.apply(this,arguments),l(t,e,i)};s(t,e,i)};function c(t,e){if(!t||!e)return!1;if(-1!==e.indexOf(" "))throw new Error("className should not contain space.");return t.classList?t.classList.contains(e):(" "+t.className+" ").indexOf(" "+e+" ")>-1}},207:function(t,e){t.exports=n(52)},228:function(t,e,n){t.exports=n(36)},36:function(t,e,n){"use strict";var i=n(147),a=n.n(i);Object.defineProperty(e,"__esModule",{value:!0}),n.d(e,"default",function(){return a.a})},68:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=n(91),a=n(92),r=n(2),o=n(95),s=n(1);n.n(s).a.prototype.$isServer||n(207);var l={3:-45,5:-20,7:-15};e.default={name:"picker-slot",props:{values:{type:Array,default:function(){return[]}},value:{},visibleItemCount:{type:Number,default:5},valueKey:String,rotateEffect:{type:Boolean,default:!1},divider:{type:Boolean,default:!1},textAlign:{type:String,default:"center"},flex:{},className:{},content:{},itemHeight:{type:Number,default:36},defaultIndex:{type:Number,default:0,require:!1}},data:function(){return{currentValue:this.value,mutatingValues:this.values,dragging:!1,animationFrameId:null}},mixins:[o.a],computed:{flexStyle:function(){return{flex:this.flex,"-webkit-box-flex":this.flex,"-moz-box-flex":this.flex,"-ms-flex":this.flex}},classNames:function(){var t="picker-slot-",e=[];this.rotateEffect&&e.push(t+"absolute");var n=this.textAlign||"center";return e.push(t+n),this.divider&&e.push(t+"divider"),this.className&&e.push(this.className),e.join(" ")},contentHeight:function(){return this.itemHeight*this.visibleItemCount},valueIndex:function(){var t=this.valueKey;if(this.currentValue instanceof Object){for(var e=0,n=this.mutatingValues.length;e<n;e++)if(this.currentValue[t]===this.mutatingValues[e][t])return e;return-1}return this.mutatingValues.indexOf(this.currentValue)},dragRange:function(){var t=this.mutatingValues,e=this.visibleItemCount,n=this.itemHeight;return[-n*(t.length-Math.ceil(e/2)),n*Math.floor(e/2)]},minTranslateY:function(){return this.itemHeight*(Math.ceil(this.visibleItemCount/2)-this.mutatingValues.length)},maxTranslateY:function(){return this.itemHeight*Math.floor(this.visibleItemCount/2)}},methods:{value2Translate:function(t){var e=this.mutatingValues.indexOf(t),n=Math.floor(this.visibleItemCount/2),i=this.itemHeight;if(-1!==e)return(e-n)*-i},translate2Value:function(t){var e=this.itemHeight,n=-((t=Math.round(t/e)*e)-Math.floor(this.visibleItemCount/2)*e)/e;return this.mutatingValues[n]},updateRotate:function(t,e){var i=this;if(!this.divider){var o=this.dragRange,s=this.$refs.wrapper;e||(e=s.querySelectorAll(".picker-item")),void 0===t&&(t=a.a.getElementTranslate(s).top);var u=Math.ceil(this.visibleItemCount/2),c=l[this.visibleItemCount]||-20;[].forEach.call(e,function(e,s){var l=(s*i.itemHeight-(o[1]-t))/i.itemHeight,p=c*l;p>180&&(p=180),p<-180&&(p=-180),function(t,e){if(t){var n=a.a.transformProperty;t.style[n]=t.style[n].replace(/rotateX\(.+?deg\)/gi,"")+" rotateX("+e+"deg)"}}(e,p),Math.abs(l)>u?n.i(r.a)(e,"picker-item-far"):n.i(r.b)(e,"picker-item-far")})}},planUpdateRotate:function(){var t=this,e=this.$refs.wrapper;cancelAnimationFrame(this.animationFrameId),this.animationFrameId=requestAnimationFrame(function(){t.updateRotate()}),n.i(r.c)(e,a.a.transitionEndProperty,function(){cancelAnimationFrame(t.animationFrameId),t.animationFrameId=null})},initEvents:function(){var t,e,r,o=this,s=this.$refs.wrapper,l={};n.i(i.a)(s,{start:function(t){cancelAnimationFrame(o.animationFrameId),o.animationFrameId=null,l={range:o.dragRange,start:new Date,startLeft:t.pageX,startTop:t.pageY,startTranslateTop:a.a.getElementTranslate(s).top},r=s.querySelectorAll(".picker-item")},drag:function(n){o.dragging=!0,l.left=n.pageX,l.top=n.pageY;var i=l.top-l.startTop,u=l.startTranslateTop+i;a.a.translateElement(s,null,u),t=u-e||u,e=u,o.rotateEffect&&o.updateRotate(e,r)},end:function(e){o.dragging=!1;var n,i,r,u=a.a.getElementTranslate(s).top,c=new Date-l.start,p=Math.abs(l.startTranslateTop-u),d=o.itemHeight,f=o.visibleItemCount;p<6&&(n=o.$el.getBoundingClientRect(),(i=Math.floor((e.clientY-(n.top+(f-1)*d/2))/d)*d)>o.maxTranslateY&&(i=o.maxTranslateY),t=0,u-=i),c<300&&(r=u+7*t);var h=l.range;o.$nextTick(function(){var t;t=r?Math.round(r/d)*d:Math.round(u/d)*d,t=Math.max(Math.min(t,h[1]),h[0]),a.a.translateElement(s,null,t),o.currentValue=o.translate2Value(t),o.rotateEffect&&o.planUpdateRotate()}),l={}}})},doOnValueChange:function(){var t=this.currentValue,e=this.$refs.wrapper;a.a.translateElement(e,null,this.value2Translate(t))},doOnValuesChange:function(){var t=this,e=this.$el.querySelectorAll(".picker-item");[].forEach.call(e,function(e,n){a.a.translateElement(e,null,t.itemHeight*n)}),this.rotateEffect&&this.planUpdateRotate()}},mounted:function(){this.ready=!0,this.divider||(this.initEvents(),this.doOnValueChange()),this.rotateEffect&&this.doOnValuesChange()},watch:{values:function(t){this.mutatingValues=t},mutatingValues:function(t){var e=this;-1===this.valueIndex&&(this.currentValue=(t||[])[0]),this.rotateEffect&&this.$nextTick(function(){e.doOnValuesChange()})},currentValue:function(t){this.doOnValueChange(),this.rotateEffect&&this.planUpdateRotate(),this.$emit("input",t),this.dispatch("picker","slotValueChange",this)},defaultIndex:function(t){void 0!==this.mutatingValues[t]&&this.mutatingValues.length>=t+1&&(this.currentValue=this.mutatingValues[t])}}}},69:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"mt-picker",componentName:"picker",props:{slots:{type:Array},showToolbar:{type:Boolean,default:!1},visibleItemCount:{type:Number,default:5},valueKey:String,rotateEffect:{type:Boolean,default:!1},itemHeight:{type:Number,default:36}},created:function(){this.$on("slotValueChange",this.slotValueChange),this.slotValueChange()},methods:{slotValueChange:function(){this.$emit("change",this,this.values)},getSlot:function(t){var e,n=this.slots||[],i=0,a=this.$children.filter(function(t){return"picker-slot"===t.$options.name});return n.forEach(function(n,r){n.divider||(t===i&&(e=a[r]),i++)}),e},getSlotValue:function(t){var e=this.getSlot(t);return e?e.currentValue:null},setSlotValue:function(t,e){var n=this.getSlot(t);n&&(n.currentValue=e)},getSlotValues:function(t){var e=this.getSlot(t);return e?e.mutatingValues:null},setSlotValues:function(t,e){var n=this.getSlot(t);n&&(n.mutatingValues=e)},getValues:function(){return this.values},setValues:function(t){var e=this;if(this.slotCount!==(t=t||[]).length)throw new Error("values length is not equal slot count.");t.forEach(function(t,n){e.setSlotValue(n,t)})}},computed:{values:{get:function(){var t=[],e=0;return(this.slots||[]).forEach(function(n){n.divider||(n.valueIndex=e++,t[n.valueIndex]=(n.values||[])[n.defaultIndex||0])}),t}},slotCount:function(){var t=0;return(this.slots||[]).forEach(function(e){e.divider||t++}),t}},components:{PickerSlot:n(146)}}},91:function(t,e,n){"use strict";var i=n(1),a=!1,r=!n.n(i).a.prototype.$isServer&&"ontouchstart"in window;e.a=function(t,e){var n=function(t){e.drag&&e.drag(r?t.changedTouches[0]||t.touches[0]:t)},i=function(t){r||(document.removeEventListener("mousemove",n),document.removeEventListener("mouseup",i)),document.onselectstart=null,document.ondragstart=null,a=!1,e.end&&e.end(r?t.changedTouches[0]||t.touches[0]:t)};t.addEventListener(r?"touchstart":"mousedown",function(t){a||(document.onselectstart=function(){return!1},document.ondragstart=function(){return!1},r||(document.addEventListener("mousemove",n),document.addEventListener("mouseup",i)),a=!0,e.start&&(t.preventDefault(),e.start(r?t.changedTouches[0]||t.touches[0]:t)))}),r&&(t.addEventListener("touchmove",n),t.addEventListener("touchend",i),t.addEventListener("touchcancel",i))}},92:function(t,e,n){"use strict";var i=n(1),a={};if(!n.n(i).a.prototype.$isServer){var r,o=document.documentElement.style,s=!1;window.opera&&"[object Opera]"===Object.prototype.toString.call(opera)?r="presto":"MozAppearance"in o?r="gecko":"WebkitAppearance"in o?r="webkit":"string"==typeof navigator.cpuClass&&(r="trident");var l={trident:"-ms-",gecko:"-moz-",webkit:"-webkit-",presto:"-o-"}[r],u={trident:"ms",gecko:"Moz",webkit:"Webkit",presto:"O"}[r],c=document.createElement("div"),p=u+"Perspective",d=u+"Transform",f=l+"transform",h=u+"Transition",m=l+"transition",v=u.toLowerCase()+"TransitionEnd";void 0!==c.style[p]&&(s=!0);var g=function(t){var e={left:0,top:0};if(null===t||null===t.style)return e;var n=t.style[d],i=/translate\(\s*(-?\d+(\.?\d+?)?)px,\s*(-?\d+(\.\d+)?)px\)\s*translateZ\(0px\)/gi.exec(n);return i&&(e.left=+i[1],e.top=+i[3]),e},x=function(t){if(null!==t&&null!==t.style){var e=t.style[d];e&&(e=e.replace(/translate\(\s*(-?\d+(\.?\d+?)?)px,\s*(-?\d+(\.\d+)?)px\)\s*translateZ\(0px\)/g,""),t.style[d]=e)}};a={transformProperty:d,transformStyleName:f,transitionProperty:h,transitionStyleName:m,transitionEndProperty:v,getElementTranslate:g,translateElement:function(t,e,n){if((null!==e||null!==n)&&null!==t&&void 0!==t&&null!==t.style&&(t.style[d]||0!==e||0!==n)){if(null===e||null===n){var i=g(t);null===e&&(e=i.left),null===n&&(n=i.top)}x(t),t.style[d]+=s?" translate("+(e?e+"px":"0px")+","+(n?n+"px":"0px")+") translateZ(0px)":" translate("+(e?e+"px":"0px")+","+(n?n+"px":"0px")+")"}},cancelTranslateElement:x}}e.a=a},95:function(t,e,n){"use strict";e.a={methods:{dispatch:function(t,e,n){for(var i=this.$parent,a=i.$options.componentName;i&&(!a||a!==t);)(i=i.$parent)&&(a=i.$options.componentName);i&&i.$emit.apply(i,[e].concat(n))},broadcast:function(t,e,n){(function t(e,n,i){this.$children.forEach(function(a){a.$options.componentName===e?a.$emit.apply(a,[n].concat(i)):t.apply(a,[e,n].concat(i))})}).call(this,t,e,n)}}}},96:function(t,e){}})}},[149]);
=======
webpackJsonp([11],{

/***/ 124:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(125);


/***/ }),

/***/ 125:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_mint_ui___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_mint_ui__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_mint_ui_lib_style_css__);
__webpack_require__(0);


Vue.component(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Picker"].name, __WEBPACK_IMPORTED_MODULE_0_mint_ui__["Picker"]);
var option = '';
var app = new Vue({
    el: '#picker',
    data: {
        value: '武昌区',
        slots: [{ values: [] }],
        area_id: 1
    },
    methods: {
        onValuesChange: function onValuesChange(picker, values) {
            this.value = values[0];
            if (option !== '') {
                // console.log('aaaaaa', option[values[0]])
                this.area_id = option[values[0]];
            }
        }
    }
});
$.ajax({
    url: '/get_area',
    type: 'get',
    success: function success(res) {
        app.slots[0].values = res.res;
        option = res.option;
    },
    error: function error(res) {}
});
// 点击显示picker
$(document).on('touchend || tap', '#down', function () {
    $('#picker').show();
});
// 点击取消隐藏picker
$(document).on('touchend || tap', '#cancel', function () {
    $('#picker').hide();
});
// 点击确认
$(document).on('touchend || tap', '#confirm', function () {
    $('#picker').hide();
    $('#title').html(app.value);
});
// 确认
$(document).on('click', '.loginOut button', function () {
    console.log(app.area_id);
    var appellation = $('#appellation').val();
    var tel = $('#tel').val();
    var acreage = $('#acreage').val();
    var building_name = $('#buildingName').val();
    if (!appellation || appellation.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入称谓',
            position: 'center',
            duration: 2000
        });
    } else if (!tel || tel.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入电话',
            position: 'center',
            duration: 2000
        });
    } else if (!app.area_id) {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请选择区域',
            position: 'center',
            duration: 2000
        });
    } else if (!acreage || acreage.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入面积',
            position: 'center',
            duration: 2000
        });
    } else if (!building_name || building_name.trim() == '') {
        Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
            message: '请输入楼盘名称',
            position: 'center',
            duration: 2000
        });
    } else {
        var source = whatBrowser();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/throw_ins",
            type: 'post',
            data: {
                tel: tel,
                appellation: appellation,
                building_name: building_name,
                area_id: app.area_id,
                acreage: acreage,
                area_name: app.value,
                page_source: source + '个人中心',
                source: source.substring(0, source.length - 1)
            },
            success: function success(data) {
                var toast = Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
                    message: '信息提交成功，楚楼网30分钟内联系您',
                    position: 'center',
                    duration: 5000
                });
                setTimeout(function () {
                    toast.close();
                    window.location.href = '/user';
                }, 1000);
            },
            error: function error(res) {
                Object(__WEBPACK_IMPORTED_MODULE_0_mint_ui__["Toast"])({
                    message: res.responseJSON.message,
                    position: 'center',
                    duration: 5000
                });
            }
        });
    }
});

/***/ })

},[124]);
>>>>>>> zxz

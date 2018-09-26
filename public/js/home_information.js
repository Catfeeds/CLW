<<<<<<< HEAD
<<<<<<< HEAD
webpackJsonp([7],{0:function(e,t,a){"use strict";var o=a(14),i=a(36),r=Object.prototype.toString;function n(e){return"[object Array]"===r.call(e)}function s(e){return null!==e&&"object"==typeof e}function l(e){return"[object Function]"===r.call(e)}function d(e,t){if(null!==e&&void 0!==e)if("object"!=typeof e&&(e=[e]),n(e))for(var a=0,o=e.length;a<o;a++)t.call(null,e[a],a,e);else for(var i in e)Object.prototype.hasOwnProperty.call(e,i)&&t.call(null,e[i],i,e)}e.exports={isArray:n,isArrayBuffer:function(e){return"[object ArrayBuffer]"===r.call(e)},isBuffer:i,isFormData:function(e){return"undefined"!=typeof FormData&&e instanceof FormData},isArrayBufferView:function(e){return"undefined"!=typeof ArrayBuffer&&ArrayBuffer.isView?ArrayBuffer.isView(e):e&&e.buffer&&e.buffer instanceof ArrayBuffer},isString:function(e){return"string"==typeof e},isNumber:function(e){return"number"==typeof e},isObject:s,isUndefined:function(e){return void 0===e},isDate:function(e){return"[object Date]"===r.call(e)},isFile:function(e){return"[object File]"===r.call(e)},isBlob:function(e){return"[object Blob]"===r.call(e)},isFunction:l,isStream:function(e){return s(e)&&l(e.pipe)},isURLSearchParams:function(e){return"undefined"!=typeof URLSearchParams&&e instanceof URLSearchParams},isStandardBrowserEnv:function(){return("undefined"==typeof navigator||"ReactNative"!==navigator.product)&&"undefined"!=typeof window&&"undefined"!=typeof document},forEach:d,merge:function e(){var t={};function a(a,o){"object"==typeof t[o]&&"object"==typeof a?t[o]=e(t[o],a):t[o]=a}for(var o=0,i=arguments.length;o<i;o++)d(arguments[o],a);return t},extend:function(e,t,a){return d(t,function(t,i){e[i]=a&&"function"==typeof t?o(t,a):t}),e},trim:function(e){return e.replace(/^\s*/,"").replace(/\s*$/,"")}}},1:function(e,t){e.exports=function(e){var t=[];return t.toString=function(){return this.map(function(t){var a=function(e,t){var a=e[1]||"",o=e[3];if(!o)return a;if(t&&"function"==typeof btoa){var i=(n=o,"/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(n))))+" */"),r=o.sources.map(function(e){return"/*# sourceURL="+o.sourceRoot+e+" */"});return[a].concat(r).concat([i]).join("\n")}var n;return[a].join("\n")}(t,e);return t[2]?"@media "+t[2]+"{"+a+"}":a}).join("")},t.i=function(e,a){"string"==typeof e&&(e=[[null,e,""]]);for(var o={},i=0;i<this.length;i++){var r=this[i][0];"number"==typeof r&&(o[r]=!0)}for(i=0;i<e.length;i++){var n=e[i];"number"==typeof n[0]&&o[n[0]]||(a&&!n[2]?n[2]=a:a&&(n[2]="("+n[2]+") and ("+a+")"),t.push(n))}},t}},10:function(e,t,a){"use strict";t.__esModule=!0,t.default={methods:{dispatch:function(e,t,a){for(var o=this.$parent||this.$root,i=o.$options.componentName;o&&(!i||i!==e);)(o=o.$parent)&&(i=o.$options.componentName);o&&o.$emit.apply(o,[t].concat(a))},broadcast:function(e,t,a){(function e(t,a,o){this.$children.forEach(function(i){i.$options.componentName===t?i.$emit.apply(i,[a].concat(o)):e.apply(i,[t,a].concat([o]))})}).call(this,e,t,a)}}}},11:function(e,t,a){"use strict";t.__esModule=!0,t.PopupManager=void 0;var o=l(a(4)),i=l(a(21)),r=l(a(31)),n=l(a(24)),s=a(5);function l(e){return e&&e.__esModule?e:{default:e}}var d=1,c=void 0;t.default={props:{visible:{type:Boolean,default:!1},openDelay:{},closeDelay:{},zIndex:{},modal:{type:Boolean,default:!1},modalFade:{type:Boolean,default:!0},modalClass:{},modalAppendToBody:{type:Boolean,default:!1},lockScroll:{type:Boolean,default:!0},closeOnPressEscape:{type:Boolean,default:!1},closeOnClickModal:{type:Boolean,default:!1}},beforeMount:function(){this._popupId="popup-"+d++,r.default.register(this._popupId,this)},beforeDestroy:function(){r.default.deregister(this._popupId),r.default.closeModal(this._popupId),this.restoreBodyStyle()},data:function(){return{opened:!1,bodyPaddingRight:null,computedBodyPaddingRight:0,withoutHiddenClass:!0,rendered:!1}},watch:{visible:function(e){var t=this;if(e){if(this._opening)return;this.rendered?this.open():(this.rendered=!0,o.default.nextTick(function(){t.open()}))}else this.close()}},methods:{open:function(e){var t=this;this.rendered||(this.rendered=!0);var a=(0,i.default)({},this.$props||this,e);this._closeTimer&&(clearTimeout(this._closeTimer),this._closeTimer=null),clearTimeout(this._openTimer);var o=Number(a.openDelay);o>0?this._openTimer=setTimeout(function(){t._openTimer=null,t.doOpen(a)},o):this.doOpen(a)},doOpen:function(e){if(!this.$isServer&&(!this.willOpen||this.willOpen())&&!this.opened){this._opening=!0;var t=function e(t){return 3===t.nodeType&&e(t=t.nextElementSibling||t.nextSibling),t}(this.$el),a=e.modal,o=e.zIndex;if(o&&(r.default.zIndex=o),a&&(this._closing&&(r.default.closeModal(this._popupId),this._closing=!1),r.default.openModal(this._popupId,r.default.nextZIndex(),this.modalAppendToBody?void 0:t,e.modalClass,e.modalFade),e.lockScroll)){this.withoutHiddenClass=!(0,s.hasClass)(document.body,"el-popup-parent--hidden"),this.withoutHiddenClass&&(this.bodyPaddingRight=document.body.style.paddingRight,this.computedBodyPaddingRight=parseInt((0,s.getStyle)(document.body,"paddingRight"),10)),c=(0,n.default)();var i=document.documentElement.clientHeight<document.body.scrollHeight,l=(0,s.getStyle)(document.body,"overflowY");c>0&&(i||"scroll"===l)&&this.withoutHiddenClass&&(document.body.style.paddingRight=this.computedBodyPaddingRight+c+"px"),(0,s.addClass)(document.body,"el-popup-parent--hidden")}"static"===getComputedStyle(t).position&&(t.style.position="absolute"),t.style.zIndex=r.default.nextZIndex(),this.opened=!0,this.onOpen&&this.onOpen(),this.doAfterOpen()}},doAfterOpen:function(){this._opening=!1},close:function(){var e=this;if(!this.willClose||this.willClose()){null!==this._openTimer&&(clearTimeout(this._openTimer),this._openTimer=null),clearTimeout(this._closeTimer);var t=Number(this.closeDelay);t>0?this._closeTimer=setTimeout(function(){e._closeTimer=null,e.doClose()},t):this.doClose()}},doClose:function(){this._closing=!0,this.onClose&&this.onClose(),this.lockScroll&&setTimeout(this.restoreBodyStyle,200),this.opened=!1,this.doAfterClose()},doAfterClose:function(){r.default.closeModal(this._popupId),this._closing=!1},restoreBodyStyle:function(){this.modal&&this.withoutHiddenClass&&(document.body.style.paddingRight=this.bodyPaddingRight,(0,s.removeClass)(document.body,"el-popup-parent--hidden")),this.withoutHiddenClass=!0}}},t.PopupManager=r.default},12:function(e,t,a){"use strict";a(19),a(3);var o=a(20),i=a.n(o),r=a(13),n=a.n(r),s=n.a.create({timeout:15e3});s.interceptors.request.use(function(e){return e},function(e){console.log(e),Promise.reject(e)}),s.interceptors.response.use(function(e){if(e.data.success)return e.data;i()(e.data.message)},function(e){var t=e.response.status;switch(t){case 401:i()("登录超时,本次登录已超时，您可重新登录或点击取消留在本页面继续浏览！");break;case 403:i()("您无权限执行次操作");break;case 415:case 422:i()(e.response.data.message);break;case 404:i()("请求资源不存在或已被删除");break;case 429:i()("操作频率过高，请稍后重试");break;case 500:i()("服务器发生错误，请联系客服处理");break;default:i()("产生未知错误，错误状态码："+t)}return Promise.reject(e)});var l=s;t.m=function(){return l({url:"/get_area_locations_list",method:"GET"})},t.f=function(){return l({url:"/get_block_locations_list",method:"GET"})},t.a=function(e){return n()({headers:{safeString:e},url:"http://192.168.0.142:9999/api/cities_areas_blocks_select",method:"GET"})},t.e=function(e){return l({url:"/entrust_throw_ins",method:"POST",data:e})},t.c=function(e){return l({url:"/collections",method:"POST",data:e})},t.b=function(e){return l({url:"/del/"+e,method:"GET"})},t.k=function(e){return l({url:"/sms/captcha/"+e+"/login",method:"GET"})},t.q=function(e){return l({url:"/logins",method:"POST",data:e})},t.h=function(e){return l({url:"/get_periphery_buildings",method:"POST",params:e})},t.o=function(e){return l({url:"/get_periphery_buildings_count",method:"POST",params:e})},t.d=function(e){return l({url:"/entrust_throw_ins",method:"POST",data:e})},t.p=function(e){return l({url:"/entrust_throw_ins",method:"POST",data:e})},t.n=function(e){return l({url:"/get_select_info",method:"GET",params:e})},t.l=function(e){return l({url:"/market_price/"+e,method:"GET"})},t.j=function(e){return l({url:"/like_building",method:"GET",params:e})},t.g=function(e){return l({url:"/property_browsing_list",method:"GET",params:e})},t.i=function(e){return l({url:"/listing_list",method:"GET",params:e})}},13:function(e,t,a){e.exports=a(35)},14:function(e,t,a){"use strict";e.exports=function(e,t){return function(){for(var a=new Array(arguments.length),o=0;o<a.length;o++)a[o]=arguments[o];return e.apply(t,a)}}},15:function(e,t,a){"use strict";var o=a(0),i=a(39),r=a(41),n=a(42),s=a(43),l=a(16),d="undefined"!=typeof window&&window.btoa&&window.btoa.bind(window)||a(44);e.exports=function(e){return new Promise(function(t,c){var u=e.data,p=e.headers;o.isFormData(u)&&delete p["Content-Type"];var f=new XMLHttpRequest,m="onreadystatechange",h=!1;if("undefined"==typeof window||!window.XDomainRequest||"withCredentials"in f||s(e.url)||(f=new window.XDomainRequest,m="onload",h=!0,f.onprogress=function(){},f.ontimeout=function(){}),e.auth){var g=e.auth.username||"",b=e.auth.password||"";p.Authorization="Basic "+d(g+":"+b)}if(f.open(e.method.toUpperCase(),r(e.url,e.params,e.paramsSerializer),!0),f.timeout=e.timeout,f[m]=function(){if(f&&(4===f.readyState||h)&&(0!==f.status||f.responseURL&&0===f.responseURL.indexOf("file:"))){var a="getAllResponseHeaders"in f?n(f.getAllResponseHeaders()):null,o={data:e.responseType&&"text"!==e.responseType?f.response:f.responseText,status:1223===f.status?204:f.status,statusText:1223===f.status?"No Content":f.statusText,headers:a,config:e,request:f};i(t,c,o),f=null}},f.onerror=function(){c(l("Network Error",e,null,f)),f=null},f.ontimeout=function(){c(l("timeout of "+e.timeout+"ms exceeded",e,"ECONNABORTED",f)),f=null},o.isStandardBrowserEnv()){var v=a(45),x=(e.withCredentials||s(e.url))&&e.xsrfCookieName?v.read(e.xsrfCookieName):void 0;x&&(p[e.xsrfHeaderName]=x)}if("setRequestHeader"in f&&o.forEach(p,function(e,t){void 0===u&&"content-type"===t.toLowerCase()?delete p[t]:f.setRequestHeader(t,e)}),e.withCredentials&&(f.withCredentials=!0),e.responseType)try{f.responseType=e.responseType}catch(t){if("json"!==e.responseType)throw t}"function"==typeof e.onDownloadProgress&&f.addEventListener("progress",e.onDownloadProgress),"function"==typeof e.onUploadProgress&&f.upload&&f.upload.addEventListener("progress",e.onUploadProgress),e.cancelToken&&e.cancelToken.promise.then(function(e){f&&(f.abort(),c(e),f=null)}),void 0===u&&(u=null),f.send(u)})}},16:function(e,t,a){"use strict";var o=a(40);e.exports=function(e,t,a,i,r){var n=new Error(e);return o(n,t,a,i,r)}},17:function(e,t,a){"use strict";e.exports=function(e){return!(!e||!e.__CANCEL__)}},18:function(e,t,a){"use strict";function o(e){this.message=e}o.prototype.toString=function(){return"Cancel"+(this.message?": "+this.message:"")},o.prototype.__CANCEL__=!0,e.exports=o},19:function(e,t,a){var o=a(26);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},2:function(e,t){var a={},o=function(e){var t;return function(){return void 0===t&&(t=e.apply(this,arguments)),t}},i=o(function(){return/msie [6-9]\b/.test(self.navigator.userAgent.toLowerCase())}),r=o(function(){return document.head||document.getElementsByTagName("head")[0]}),n=null,s=0,l=[];function d(e,t){for(var o=0;o<e.length;o++){var i=e[o],r=a[i.id];if(r){r.refs++;for(var n=0;n<r.parts.length;n++)r.parts[n](i.parts[n]);for(;n<i.parts.length;n++)r.parts.push(m(i.parts[n],t))}else{var s=[];for(n=0;n<i.parts.length;n++)s.push(m(i.parts[n],t));a[i.id]={id:i.id,refs:1,parts:s}}}}function c(e){for(var t=[],a={},o=0;o<e.length;o++){var i=e[o],r=i[0],n={css:i[1],media:i[2],sourceMap:i[3]};a[r]?a[r].parts.push(n):t.push(a[r]={id:r,parts:[n]})}return t}function u(e,t){var a=r(),o=l[l.length-1];if("top"===e.insertAt)o?o.nextSibling?a.insertBefore(t,o.nextSibling):a.appendChild(t):a.insertBefore(t,a.firstChild),l.push(t);else{if("bottom"!==e.insertAt)throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");a.appendChild(t)}}function p(e){e.parentNode.removeChild(e);var t=l.indexOf(e);t>=0&&l.splice(t,1)}function f(e){var t=document.createElement("style");return t.type="text/css",u(e,t),t}function m(e,t){var a,o,i;if(t.singleton){var r=s++;a=n||(n=f(t)),o=b.bind(null,a,r,!1),i=b.bind(null,a,r,!0)}else e.sourceMap&&"function"==typeof URL&&"function"==typeof URL.createObjectURL&&"function"==typeof URL.revokeObjectURL&&"function"==typeof Blob&&"function"==typeof btoa?(a=function(e){var t=document.createElement("link");return t.rel="stylesheet",u(e,t),t}(t),o=function(e,t){var a=t.css,o=t.sourceMap;o&&(a+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(o))))+" */");var i=new Blob([a],{type:"text/css"}),r=e.href;e.href=URL.createObjectURL(i),r&&URL.revokeObjectURL(r)}.bind(null,a),i=function(){p(a),a.href&&URL.revokeObjectURL(a.href)}):(a=f(t),o=function(e,t){var a=t.css,o=t.media;o&&e.setAttribute("media",o);if(e.styleSheet)e.styleSheet.cssText=a;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(a))}}.bind(null,a),i=function(){p(a)});return o(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;o(e=t)}else i()}}e.exports=function(e,t){if("undefined"!=typeof DEBUG&&DEBUG&&"object"!=typeof document)throw new Error("The style-loader cannot be used in a non-browser environment");void 0===(t=t||{}).singleton&&(t.singleton=i()),void 0===t.insertAt&&(t.insertAt="bottom");var o=c(e);return d(o,t),function(e){for(var i=[],r=0;r<o.length;r++){var n=o[r];(s=a[n.id]).refs--,i.push(s)}e&&d(c(e),t);for(r=0;r<i.length;r++){var s;if(0===(s=i[r]).refs){for(var l=0;l<s.parts.length;l++)s.parts[l]();delete a[s.id]}}}};var h,g=(h=[],function(e,t){return h[e]=t,h.filter(Boolean).join("\n")});function b(e,t,a,o){var i=a?"":o.css;if(e.styleSheet)e.styleSheet.cssText=g(t,i);else{var r=document.createTextNode(i),n=e.childNodes;n[t]&&e.removeChild(n[t]),n.length?e.insertBefore(r,n[t]):e.appendChild(r)}}},20:function(e,t,a){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=307)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},13:function(e,t){e.exports=a(11)},20:function(e,t){e.exports=a(22)},307:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(308),r=(o=i)&&o.__esModule?o:{default:o};t.default=r.default},308:function(e,t,a){"use strict";t.__esModule=!0;var o=s(a(4)),i=s(a(309)),r=a(13),n=a(20);function s(e){return e&&e.__esModule?e:{default:e}}var l=o.default.extend(i.default),d=void 0,c=[],u=1,p=function e(t){if(!o.default.prototype.$isServer){"string"==typeof(t=t||{})&&(t={message:t});var a=t.onClose,i="message_"+u++;return t.onClose=function(){e.close(i,a)},(d=new l({data:t})).id=i,(0,n.isVNode)(d.message)&&(d.$slots.default=[d.message],d.message=null),d.vm=d.$mount(),document.body.appendChild(d.vm.$el),d.vm.visible=!0,d.dom=d.vm.$el,d.dom.style.zIndex=r.PopupManager.nextZIndex(),c.push(d),d.vm}};["success","warning","info","error"].forEach(function(e){p[e]=function(t){return"string"==typeof t&&(t={message:t}),t.type=e,p(t)}}),p.close=function(e,t){for(var a=0,o=c.length;a<o;a++)if(e===c[a].id){"function"==typeof t&&t(c[a]),c.splice(a,1);break}},p.closeAll=function(){for(var e=c.length-1;e>=0;e--)c[e].close()},t.default=p},309:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(310),i=a.n(o),r=a(311),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},310:function(e,t,a){"use strict";t.__esModule=!0;var o={success:"success",info:"info",warning:"warning",error:"error"};t.default={data:function(){return{visible:!1,message:"",duration:3e3,type:"info",iconClass:"",customClass:"",onClose:null,showClose:!1,closed:!1,timer:null,dangerouslyUseHTMLString:!1,center:!1}},computed:{typeClass:function(){return this.type&&!this.iconClass?"el-message__icon el-icon-"+o[this.type]:""}},watch:{closed:function(e){e&&(this.visible=!1,this.$el.addEventListener("transitionend",this.destroyElement))}},methods:{destroyElement:function(){this.$el.removeEventListener("transitionend",this.destroyElement),this.$destroy(!0),this.$el.parentNode.removeChild(this.$el)},close:function(){this.closed=!0,"function"==typeof this.onClose&&this.onClose(this)},clearTimer:function(){clearTimeout(this.timer)},startTimer:function(){var e=this;this.duration>0&&(this.timer=setTimeout(function(){e.closed||e.close()},this.duration))},keydown:function(e){27===e.keyCode&&(this.closed||this.close())}},mounted:function(){this.startTimer(),document.addEventListener("keydown",this.keydown)},beforeDestroy:function(){document.removeEventListener("keydown",this.keydown)}}},311:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("transition",{attrs:{name:"el-message-fade"}},[a("div",{directives:[{name:"show",rawName:"v-show",value:e.visible,expression:"visible"}],class:["el-message",e.type&&!e.iconClass?"el-message--"+e.type:"",e.center?"is-center":"",e.showClose?"is-closable":"",e.customClass],attrs:{role:"alert"},on:{mouseenter:e.clearTimer,mouseleave:e.startTimer}},[e.iconClass?a("i",{class:e.iconClass}):a("i",{class:e.typeClass}),e._t("default",[e.dangerouslyUseHTMLString?a("p",{staticClass:"el-message__content",domProps:{innerHTML:e._s(e.message)}}):a("p",{staticClass:"el-message__content"},[e._v(e._s(e.message))])]),e.showClose?a("i",{staticClass:"el-message__closeBtn el-icon-close",on:{click:e.close}}):e._e()],2)])},staticRenderFns:[]};t.a=o},4:function(e,t){e.exports=a(4)}})},21:function(e,t,a){"use strict";t.__esModule=!0,t.default=function(e){for(var t=1,a=arguments.length;t<a;t++){var o=arguments[t]||{};for(var i in o)if(o.hasOwnProperty(i)){var r=o[i];void 0!==r&&(e[i]=r)}}return e}},22:function(e,t,a){"use strict";t.__esModule=!0;var o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};t.isVNode=function(e){return null!==e&&"object"===(void 0===e?"undefined":o(e))&&(0,i.hasOwn)(e,"componentOptions")},t.getFirstComponentChild=function(e){return e&&e.filter(function(e){return e&&e.tag})[0]};var i=a(7)},23:function(e,t,a){"use strict";t.__esModule=!0,t.default={mounted:function(){},methods:{getMigratingConfig:function(){return{props:{},events:{}}}}}},24:function(e,t,a){"use strict";t.__esModule=!0,t.default=function(){if(r.default.prototype.$isServer)return 0;if(void 0!==n)return n;var e=document.createElement("div");e.className="el-scrollbar__wrap",e.style.visibility="hidden",e.style.width="100px",e.style.position="absolute",e.style.top="-9999px",document.body.appendChild(e);var t=e.offsetWidth;e.style.overflow="scroll";var a=document.createElement("div");a.style.width="100%",e.appendChild(a);var o=a.offsetWidth;return e.parentNode.removeChild(e),n=t-o};var o,i=a(4),r=(o=i)&&o.__esModule?o:{default:o};var n=void 0},25:function(e,t){e.exports=function(e,t){for(var a=[],o={},i=0;i<t.length;i++){var r=t[i],n=r[0],s={id:e+":"+i,css:r[1],media:r[2],sourceMap:r[3]};o[n]?o[n].parts.push(s):a.push(o[n]={id:n,parts:[s]})}return a}},26:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,".el-message__closeBtn:focus,.el-message__content:focus{outline-width:0}.el-message{min-width:380px;-webkit-box-sizing:border-box;box-sizing:border-box;border-radius:4px;border:1px solid #ebeef5;position:fixed;left:50%;top:20px;-webkit-transform:translateX(-50%);transform:translateX(-50%);background-color:#edf2fc;-webkit-transition:opacity .3s,-webkit-transform .4s;transition:opacity .3s,-webkit-transform .4s;transition:opacity .3s,transform .4s;transition:opacity .3s,transform .4s,-webkit-transform .4s;overflow:hidden;padding:15px 15px 15px 20px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.el-message.is-center{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.el-message.is-closable .el-message__content{padding-right:16px}.el-message p{margin:0}.el-message--info .el-message__content{color:#909399}.el-message--success{background-color:#f0f9eb;border-color:#e1f3d8}.el-message--success .el-message__content{color:#67c23a}.el-message--warning{background-color:#fdf6ec;border-color:#faecd8}.el-message--warning .el-message__content{color:#e6a23c}.el-message--error{background-color:#fef0f0;border-color:#fde2e2}.el-message--error .el-message__content{color:#f56c6c}.el-message__icon{margin-right:10px}.el-message__content{padding:0;font-size:14px;line-height:1}.el-message__closeBtn{position:absolute;top:50%;right:15px;-webkit-transform:translateY(-50%);transform:translateY(-50%);cursor:pointer;color:#c0c4cc;font-size:16px}.el-message__closeBtn:hover{color:#909399}.el-message .el-icon-success{color:#67c23a}.el-message .el-icon-error{color:#f56c6c}.el-message .el-icon-info{color:#909399}.el-message .el-icon-warning{color:#e6a23c}.el-message-fade-enter,.el-message-fade-leave-active{opacity:0;-webkit-transform:translate(-50%,-100%);transform:translate(-50%,-100%)}",""])},27:function(e,t,a){var o=a(28);(e.exports=a(1)(!1)).push([e.i,".el-fade-in-enter,.el-fade-in-leave-active,.el-fade-in-linear-enter,.el-fade-in-linear-leave,.el-fade-in-linear-leave-active,.fade-in-linear-enter,.fade-in-linear-leave,.fade-in-linear-leave-active{opacity:0}.el-fade-in-linear-enter-active,.el-fade-in-linear-leave-active,.fade-in-linear-enter-active,.fade-in-linear-leave-active{-webkit-transition:opacity .2s linear;transition:opacity .2s linear}.el-fade-in-enter-active,.el-fade-in-leave-active,.el-zoom-in-center-enter-active,.el-zoom-in-center-leave-active{-webkit-transition:all .3s cubic-bezier(.55,0,.1,1);transition:all .3s cubic-bezier(.55,0,.1,1)}.el-zoom-in-center-enter,.el-zoom-in-center-leave-active{opacity:0;-webkit-transform:scaleX(0);transform:scaleX(0)}.el-zoom-in-top-enter-active,.el-zoom-in-top-leave-active{opacity:1;-webkit-transform:scaleY(1);transform:scaleY(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:center top;transform-origin:center top}.el-zoom-in-top-enter,.el-zoom-in-top-leave-active{opacity:0;-webkit-transform:scaleY(0);transform:scaleY(0)}.el-zoom-in-bottom-enter-active,.el-zoom-in-bottom-leave-active{opacity:1;-webkit-transform:scaleY(1);transform:scaleY(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:center bottom;transform-origin:center bottom}.el-zoom-in-bottom-enter,.el-zoom-in-bottom-leave-active{opacity:0;-webkit-transform:scaleY(0);transform:scaleY(0)}.el-zoom-in-left-enter-active,.el-zoom-in-left-leave-active{opacity:1;-webkit-transform:scale(1);transform:scale(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:top left;transform-origin:top left}.el-zoom-in-left-enter,.el-zoom-in-left-leave-active{opacity:0;-webkit-transform:scale(.45);transform:scale(.45)}.collapse-transition{-webkit-transition:height .3s ease-in-out,padding-top .3s ease-in-out,padding-bottom .3s ease-in-out;transition:height .3s ease-in-out,padding-top .3s ease-in-out,padding-bottom .3s ease-in-out}.horizontal-collapse-transition{-webkit-transition:width .3s ease-in-out,padding-left .3s ease-in-out,padding-right .3s ease-in-out;transition:width .3s ease-in-out,padding-left .3s ease-in-out,padding-right .3s ease-in-out}.el-list-enter-active,.el-list-leave-active{-webkit-transition:all 1s;transition:all 1s}.el-list-enter,.el-list-leave-active{opacity:0;-webkit-transform:translateY(-30px);transform:translateY(-30px)}.el-opacity-transition{-webkit-transition:opacity .3s cubic-bezier(.55,0,.1,1);transition:opacity .3s cubic-bezier(.55,0,.1,1)}@font-face{font-family:element-icons;src:url("+o(a(29))+') format("woff"),url('+o(a(30))+') format("truetype");font-weight:400;font-style:normal}[class*=" el-icon-"],[class^=el-icon-]{font-family:element-icons!important;speak:none;font-style:normal;font-weight:400;font-variant:normal;text-transform:none;line-height:1;vertical-align:baseline;display:inline-block;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.el-icon-info:before{content:"\\E61A"}.el-icon-error:before{content:"\\E62C"}.el-icon-success:before{content:"\\E62D"}.el-icon-warning:before{content:"\\E62E"}.el-icon-question:before{content:"\\E634"}.el-icon-back:before{content:"\\E606"}.el-icon-arrow-left:before{content:"\\E600"}.el-icon-arrow-down:before{content:"\\E603"}.el-icon-arrow-right:before{content:"\\E604"}.el-icon-arrow-up:before{content:"\\E605"}.el-icon-caret-left:before{content:"\\E60A"}.el-icon-caret-bottom:before{content:"\\E60B"}.el-icon-caret-top:before{content:"\\E60C"}.el-icon-caret-right:before{content:"\\E60E"}.el-icon-d-arrow-left:before{content:"\\E610"}.el-icon-d-arrow-right:before{content:"\\E613"}.el-icon-minus:before{content:"\\E621"}.el-icon-plus:before{content:"\\E62B"}.el-icon-remove:before{content:"\\E635"}.el-icon-circle-plus:before{content:"\\E601"}.el-icon-remove-outline:before{content:"\\E63C"}.el-icon-circle-plus-outline:before{content:"\\E602"}.el-icon-close:before{content:"\\E60F"}.el-icon-check:before{content:"\\E611"}.el-icon-circle-close:before{content:"\\E607"}.el-icon-circle-check:before{content:"\\E639"}.el-icon-circle-close-outline:before{content:"\\E609"}.el-icon-circle-check-outline:before{content:"\\E63E"}.el-icon-zoom-out:before{content:"\\E645"}.el-icon-zoom-in:before{content:"\\E641"}.el-icon-d-caret:before{content:"\\E615"}.el-icon-sort:before{content:"\\E640"}.el-icon-sort-down:before{content:"\\E630"}.el-icon-sort-up:before{content:"\\E631"}.el-icon-tickets:before{content:"\\E63F"}.el-icon-document:before{content:"\\E614"}.el-icon-goods:before{content:"\\E618"}.el-icon-sold-out:before{content:"\\E63B"}.el-icon-news:before{content:"\\E625"}.el-icon-message:before{content:"\\E61B"}.el-icon-date:before{content:"\\E608"}.el-icon-printer:before{content:"\\E62F"}.el-icon-time:before{content:"\\E642"}.el-icon-bell:before{content:"\\E622"}.el-icon-mobile-phone:before{content:"\\E624"}.el-icon-service:before{content:"\\E63A"}.el-icon-view:before{content:"\\E643"}.el-icon-menu:before{content:"\\E620"}.el-icon-more:before{content:"\\E646"}.el-icon-more-outline:before{content:"\\E626"}.el-icon-star-on:before{content:"\\E637"}.el-icon-star-off:before{content:"\\E63D"}.el-icon-location:before{content:"\\E61D"}.el-icon-location-outline:before{content:"\\E61F"}.el-icon-phone:before{content:"\\E627"}.el-icon-phone-outline:before{content:"\\E628"}.el-icon-picture:before{content:"\\E629"}.el-icon-picture-outline:before{content:"\\E62A"}.el-icon-delete:before{content:"\\E612"}.el-icon-search:before{content:"\\E619"}.el-icon-edit:before{content:"\\E61C"}.el-icon-edit-outline:before{content:"\\E616"}.el-icon-rank:before{content:"\\E632"}.el-icon-refresh:before{content:"\\E633"}.el-icon-share:before{content:"\\E636"}.el-icon-setting:before{content:"\\E638"}.el-icon-upload:before{content:"\\E60D"}.el-icon-upload2:before{content:"\\E644"}.el-icon-download:before{content:"\\E617"}.el-icon-loading:before{content:"\\E61E"}.el-icon-loading{-webkit-animation:rotating 2s linear infinite;animation:rotating 2s linear infinite}.el-icon--right{margin-left:5px}.el-icon--left{margin-right:5px}@-webkit-keyframes rotating{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes rotating{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}',""])},28:function(e,t){e.exports=function(e){return"string"!=typeof e?e:(/^['"].*['"]$/.test(e)&&(e=e.slice(1,-1)),/["'() \t\n]/.test(e)?'"'+e.replace(/"/g,'\\"').replace(/\n/g,"\\n")+'"':e)}},29:function(e,t){e.exports="/fonts/vendor/element-ui/lib/theme-chalk/element-icons.woff?2fad952a20fbbcfd1bf2ebb210dccf7a"},3:function(e,t,a){var o=a(27);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},30:function(e,t){e.exports="/fonts/vendor/element-ui/lib/theme-chalk/element-icons.ttf?6f0a76321d30f3c8120915e57f7bd77e"},31:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(4),r=(o=i)&&o.__esModule?o:{default:o},n=a(5);var s=!1,l=!1,d=2e3,c=function(){if(!r.default.prototype.$isServer){var e=p.modalDom;return e?s=!0:(s=!1,e=document.createElement("div"),p.modalDom=e,e.addEventListener("touchmove",function(e){e.preventDefault(),e.stopPropagation()}),e.addEventListener("click",function(){p.doOnModalClick&&p.doOnModalClick()})),e}},u={},p={modalFade:!0,getInstance:function(e){return u[e]},register:function(e,t){e&&t&&(u[e]=t)},deregister:function(e){e&&(u[e]=null,delete u[e])},nextZIndex:function(){return p.zIndex++},modalStack:[],doOnModalClick:function(){var e=p.modalStack[p.modalStack.length-1];if(e){var t=p.getInstance(e.id);t&&t.closeOnClickModal&&t.close()}},openModal:function(e,t,a,o,i){if(!r.default.prototype.$isServer&&e&&void 0!==t){this.modalFade=i;for(var l=this.modalStack,d=0,u=l.length;d<u;d++){if(l[d].id===e)return}var p=c();if((0,n.addClass)(p,"v-modal"),this.modalFade&&!s&&(0,n.addClass)(p,"v-modal-enter"),o)o.trim().split(/\s+/).forEach(function(e){return(0,n.addClass)(p,e)});setTimeout(function(){(0,n.removeClass)(p,"v-modal-enter")},200),a&&a.parentNode&&11!==a.parentNode.nodeType?a.parentNode.appendChild(p):document.body.appendChild(p),t&&(p.style.zIndex=t),p.tabIndex=0,p.style.display="",this.modalStack.push({id:e,zIndex:t,modalClass:o})}},closeModal:function(e){var t=this.modalStack,a=c();if(t.length>0){var o=t[t.length-1];if(o.id===e){if(o.modalClass)o.modalClass.trim().split(/\s+/).forEach(function(e){return(0,n.removeClass)(a,e)});t.pop(),t.length>0&&(a.style.zIndex=t[t.length-1].zIndex)}else for(var i=t.length-1;i>=0;i--)if(t[i].id===e){t.splice(i,1);break}}0===t.length&&(this.modalFade&&(0,n.addClass)(a,"v-modal-leave"),setTimeout(function(){0===t.length&&(a.parentNode&&a.parentNode.removeChild(a),a.style.display="none",p.modalDom=void 0),(0,n.removeClass)(a,"v-modal-leave")},200))}};Object.defineProperty(p,"zIndex",{configurable:!0,get:function(){return l||(d=(r.default.prototype.$ELEMENT||{}).zIndex||d,l=!0),d},set:function(e){d=e}});r.default.prototype.$isServer||window.addEventListener("keydown",function(e){if(27===e.keyCode){var t=function(){if(!r.default.prototype.$isServer&&p.modalStack.length>0){var e=p.modalStack[p.modalStack.length-1];if(!e)return;return p.getInstance(e.id)}}();t&&t.closeOnPressEscape&&(t.handleClose?t.handleClose():t.handleAction?t.handleAction("cancel"):t.close())}}),t.default=p},310:function(e,t,a){e.exports=a(311)},311:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});a(54);a(68);var o=a(98),i=new o(".swiper-container1",{effect:"fade",fade:{crossFade:!0}});new o(".swiper-container",{pagination:".swiper-pagination",effect:"fade",width:770,autoplay:5e3,autoplayDisableOnInteraction:!1,onTransitionEnd:function(e){console.log(e.activeIndex),i.slideTo(e.activeIndex)}});$(".list-body-content").each(function(){$(this).text().trim().length>90&&$(this).text($(this).text().trim().slice(0,90)+"......")})},32:function(e,t,a){var o=a(33);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},33:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,'.el-button{display:inline-block;line-height:1;white-space:nowrap;cursor:pointer;background:#fff;border:1px solid #dcdfe6;color:#606266;-webkit-appearance:none;text-align:center;-webkit-box-sizing:border-box;box-sizing:border-box;outline:0;margin:0;-webkit-transition:.1s;transition:.1s;font-weight:500;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;padding:12px 20px;font-size:14px;border-radius:4px}.el-button+.el-button{margin-left:10px}.el-button:focus,.el-button:hover{color:#409eff;border-color:#c6e2ff;background-color:#ecf5ff}.el-button:active{color:#3a8ee6;border-color:#3a8ee6;outline:0}.el-button::-moz-focus-inner{border:0}.el-button [class*=el-icon-]+span{margin-left:5px}.el-button.is-plain:focus,.el-button.is-plain:hover{background:#fff;border-color:#409eff;color:#409eff}.el-button.is-active,.el-button.is-plain:active{color:#3a8ee6;border-color:#3a8ee6}.el-button.is-plain:active{background:#fff;outline:0}.el-button.is-disabled,.el-button.is-disabled:focus,.el-button.is-disabled:hover{color:#c0c4cc;cursor:not-allowed;background-image:none;background-color:#fff;border-color:#ebeef5}.el-button.is-disabled.el-button--text{background-color:transparent}.el-button.is-disabled.is-plain,.el-button.is-disabled.is-plain:focus,.el-button.is-disabled.is-plain:hover{background-color:#fff;border-color:#ebeef5;color:#c0c4cc}.el-button.is-loading{position:relative;pointer-events:none}.el-button.is-loading:before{pointer-events:none;content:"";position:absolute;left:-1px;top:-1px;right:-1px;bottom:-1px;border-radius:inherit;background-color:hsla(0,0%,100%,.35)}.el-button.is-round{border-radius:20px;padding:12px 23px}.el-button.is-circle{border-radius:50%;padding:12px}.el-button--primary{color:#fff;background-color:#409eff;border-color:#409eff}.el-button--primary:focus,.el-button--primary:hover{background:#66b1ff;border-color:#66b1ff;color:#fff}.el-button--primary.is-active,.el-button--primary:active{background:#3a8ee6;border-color:#3a8ee6;color:#fff}.el-button--primary:active{outline:0}.el-button--primary.is-disabled,.el-button--primary.is-disabled:active,.el-button--primary.is-disabled:focus,.el-button--primary.is-disabled:hover{color:#fff;background-color:#a0cfff;border-color:#a0cfff}.el-button--primary.is-plain{color:#409eff;background:#ecf5ff;border-color:#b3d8ff}.el-button--primary.is-plain:focus,.el-button--primary.is-plain:hover{background:#409eff;border-color:#409eff;color:#fff}.el-button--primary.is-plain:active{background:#3a8ee6;border-color:#3a8ee6;color:#fff;outline:0}.el-button--primary.is-plain.is-disabled,.el-button--primary.is-plain.is-disabled:active,.el-button--primary.is-plain.is-disabled:focus,.el-button--primary.is-plain.is-disabled:hover{color:#8cc5ff;background-color:#ecf5ff;border-color:#d9ecff}.el-button--success{color:#fff;background-color:#67c23a;border-color:#67c23a}.el-button--success:focus,.el-button--success:hover{background:#85ce61;border-color:#85ce61;color:#fff}.el-button--success.is-active,.el-button--success:active{background:#5daf34;border-color:#5daf34;color:#fff}.el-button--success:active{outline:0}.el-button--success.is-disabled,.el-button--success.is-disabled:active,.el-button--success.is-disabled:focus,.el-button--success.is-disabled:hover{color:#fff;background-color:#b3e19d;border-color:#b3e19d}.el-button--success.is-plain{color:#67c23a;background:#f0f9eb;border-color:#c2e7b0}.el-button--success.is-plain:focus,.el-button--success.is-plain:hover{background:#67c23a;border-color:#67c23a;color:#fff}.el-button--success.is-plain:active{background:#5daf34;border-color:#5daf34;color:#fff;outline:0}.el-button--success.is-plain.is-disabled,.el-button--success.is-plain.is-disabled:active,.el-button--success.is-plain.is-disabled:focus,.el-button--success.is-plain.is-disabled:hover{color:#a4da89;background-color:#f0f9eb;border-color:#e1f3d8}.el-button--warning{color:#fff;background-color:#e6a23c;border-color:#e6a23c}.el-button--warning:focus,.el-button--warning:hover{background:#ebb563;border-color:#ebb563;color:#fff}.el-button--warning.is-active,.el-button--warning:active{background:#cf9236;border-color:#cf9236;color:#fff}.el-button--warning:active{outline:0}.el-button--warning.is-disabled,.el-button--warning.is-disabled:active,.el-button--warning.is-disabled:focus,.el-button--warning.is-disabled:hover{color:#fff;background-color:#f3d19e;border-color:#f3d19e}.el-button--warning.is-plain{color:#e6a23c;background:#fdf6ec;border-color:#f5dab1}.el-button--warning.is-plain:focus,.el-button--warning.is-plain:hover{background:#e6a23c;border-color:#e6a23c;color:#fff}.el-button--warning.is-plain:active{background:#cf9236;border-color:#cf9236;color:#fff;outline:0}.el-button--warning.is-plain.is-disabled,.el-button--warning.is-plain.is-disabled:active,.el-button--warning.is-plain.is-disabled:focus,.el-button--warning.is-plain.is-disabled:hover{color:#f0c78a;background-color:#fdf6ec;border-color:#faecd8}.el-button--danger{color:#fff;background-color:#f56c6c;border-color:#f56c6c}.el-button--danger:focus,.el-button--danger:hover{background:#f78989;border-color:#f78989;color:#fff}.el-button--danger.is-active,.el-button--danger:active{background:#dd6161;border-color:#dd6161;color:#fff}.el-button--danger:active{outline:0}.el-button--danger.is-disabled,.el-button--danger.is-disabled:active,.el-button--danger.is-disabled:focus,.el-button--danger.is-disabled:hover{color:#fff;background-color:#fab6b6;border-color:#fab6b6}.el-button--danger.is-plain{color:#f56c6c;background:#fef0f0;border-color:#fbc4c4}.el-button--danger.is-plain:focus,.el-button--danger.is-plain:hover{background:#f56c6c;border-color:#f56c6c;color:#fff}.el-button--danger.is-plain:active{background:#dd6161;border-color:#dd6161;color:#fff;outline:0}.el-button--danger.is-plain.is-disabled,.el-button--danger.is-plain.is-disabled:active,.el-button--danger.is-plain.is-disabled:focus,.el-button--danger.is-plain.is-disabled:hover{color:#f9a7a7;background-color:#fef0f0;border-color:#fde2e2}.el-button--info{color:#fff;background-color:#909399;border-color:#909399}.el-button--info:focus,.el-button--info:hover{background:#a6a9ad;border-color:#a6a9ad;color:#fff}.el-button--info.is-active,.el-button--info:active{background:#82848a;border-color:#82848a;color:#fff}.el-button--info:active{outline:0}.el-button--info.is-disabled,.el-button--info.is-disabled:active,.el-button--info.is-disabled:focus,.el-button--info.is-disabled:hover{color:#fff;background-color:#c8c9cc;border-color:#c8c9cc}.el-button--info.is-plain{color:#909399;background:#f4f4f5;border-color:#d3d4d6}.el-button--info.is-plain:focus,.el-button--info.is-plain:hover{background:#909399;border-color:#909399;color:#fff}.el-button--info.is-plain:active{background:#82848a;border-color:#82848a;color:#fff;outline:0}.el-button--info.is-plain.is-disabled,.el-button--info.is-plain.is-disabled:active,.el-button--info.is-plain.is-disabled:focus,.el-button--info.is-plain.is-disabled:hover{color:#bcbec2;background-color:#f4f4f5;border-color:#e9e9eb}.el-button--text,.el-button--text.is-disabled,.el-button--text.is-disabled:focus,.el-button--text.is-disabled:hover,.el-button--text:active{border-color:transparent}.el-button--medium{padding:10px 20px;font-size:14px;border-radius:4px}.el-button--mini,.el-button--small{font-size:12px;border-radius:3px}.el-button--medium.is-round{padding:10px 20px}.el-button--medium.is-circle{padding:10px}.el-button--small,.el-button--small.is-round{padding:9px 15px}.el-button--small.is-circle{padding:9px}.el-button--mini,.el-button--mini.is-round{padding:7px 15px}.el-button--mini.is-circle{padding:7px}.el-button--text{color:#409eff;background:0 0;padding-left:0;padding-right:0}.el-button--text:focus,.el-button--text:hover{color:#66b1ff;border-color:transparent;background-color:transparent}.el-button--text:active{color:#3a8ee6;background-color:transparent}.el-button-group{display:inline-block;vertical-align:middle}.el-button-group:after,.el-button-group:before{display:table;content:""}.el-button-group:after{clear:both}.el-button-group .el-button{float:left;position:relative}.el-button-group .el-button+.el-button{margin-left:0}.el-button-group .el-button:first-child{border-top-right-radius:0;border-bottom-right-radius:0}.el-button-group .el-button:last-child{border-top-left-radius:0;border-bottom-left-radius:0}.el-button-group .el-button:first-child:last-child{border-radius:4px}.el-button-group .el-button:first-child:last-child.is-round{border-radius:20px}.el-button-group .el-button:first-child:last-child.is-circle{border-radius:50%}.el-button-group .el-button:not(:first-child):not(:last-child){border-radius:0}.el-button-group .el-button:not(:last-child){margin-right:-1px}.el-button-group .el-button.is-active,.el-button-group .el-button:active,.el-button-group .el-button:focus,.el-button-group .el-button:hover{z-index:1}.el-button-group .el-button--primary:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--primary:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--primary:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--success:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--success:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--success:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--warning:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--warning:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--warning:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--danger:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--danger:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--danger:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--info:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--info:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--info:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}',""])},34:function(e,t){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=151)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},151:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(152),r=(o=i)&&o.__esModule?o:{default:o};r.default.install=function(e){e.component(r.default.name,r.default)},t.default=r.default},152:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(153),i=a.n(o),r=a(154),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},153:function(e,t,a){"use strict";t.__esModule=!0,t.default={name:"ElButton",inject:{elForm:{default:""},elFormItem:{default:""}},props:{type:{type:String,default:"default"},size:String,icon:{type:String,default:""},nativeType:{type:String,default:"button"},loading:Boolean,disabled:Boolean,plain:Boolean,autofocus:Boolean,round:Boolean,circle:Boolean},computed:{_elFormItemSize:function(){return(this.elFormItem||{}).elFormItemSize},buttonSize:function(){return this.size||this._elFormItemSize||(this.$ELEMENT||{}).size},buttonDisabled:function(){return this.disabled||(this.elForm||{}).disabled}},methods:{handleClick:function(e){this.$emit("click",e)}}}},154:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("button",{staticClass:"el-button",class:[e.type?"el-button--"+e.type:"",e.buttonSize?"el-button--"+e.buttonSize:"",{"is-disabled":e.buttonDisabled,"is-loading":e.loading,"is-plain":e.plain,"is-round":e.round,"is-circle":e.circle}],attrs:{disabled:e.buttonDisabled||e.loading,autofocus:e.autofocus,type:e.nativeType},on:{click:e.handleClick}},[e.loading?a("i",{staticClass:"el-icon-loading"}):e._e(),e.icon&&!e.loading?a("i",{class:e.icon}):e._e(),e.$slots.default?a("span",[e._t("default")],2):e._e()])},staticRenderFns:[]};t.a=o}})},35:function(e,t,a){"use strict";var o=a(0),i=a(14),r=a(37),n=a(8);function s(e){var t=new r(e),a=i(r.prototype.request,t);return o.extend(a,r.prototype,t),o.extend(a,t),a}var l=s(n);l.Axios=r,l.create=function(e){return s(o.merge(n,e))},l.Cancel=a(18),l.CancelToken=a(51),l.isCancel=a(17),l.all=function(e){return Promise.all(e)},l.spread=a(52),e.exports=l,e.exports.default=l},36:function(e,t){function a(e){return!!e.constructor&&"function"==typeof e.constructor.isBuffer&&e.constructor.isBuffer(e)}e.exports=function(e){return null!=e&&(a(e)||function(e){return"function"==typeof e.readFloatLE&&"function"==typeof e.slice&&a(e.slice(0,0))}(e)||!!e._isBuffer)}},37:function(e,t,a){"use strict";var o=a(8),i=a(0),r=a(46),n=a(47);function s(e){this.defaults=e,this.interceptors={request:new r,response:new r}}s.prototype.request=function(e){"string"==typeof e&&(e=i.merge({url:arguments[0]},arguments[1])),(e=i.merge(o,this.defaults,{method:"get"},e)).method=e.method.toLowerCase();var t=[n,void 0],a=Promise.resolve(e);for(this.interceptors.request.forEach(function(e){t.unshift(e.fulfilled,e.rejected)}),this.interceptors.response.forEach(function(e){t.push(e.fulfilled,e.rejected)});t.length;)a=a.then(t.shift(),t.shift());return a},i.forEach(["delete","get","head","options"],function(e){s.prototype[e]=function(t,a){return this.request(i.merge(a||{},{method:e,url:t}))}}),i.forEach(["post","put","patch"],function(e){s.prototype[e]=function(t,a,o){return this.request(i.merge(o||{},{method:e,url:t,data:a}))}}),e.exports=s},38:function(e,t,a){"use strict";var o=a(0);e.exports=function(e,t){o.forEach(e,function(a,o){o!==t&&o.toUpperCase()===t.toUpperCase()&&(e[t]=a,delete e[o])})}},39:function(e,t,a){"use strict";var o=a(16);e.exports=function(e,t,a){var i=a.config.validateStatus;a.status&&i&&!i(a.status)?t(o("Request failed with status code "+a.status,a.config,null,a.request,a)):e(a)}},40:function(e,t,a){"use strict";e.exports=function(e,t,a,o,i){return e.config=t,a&&(e.code=a),e.request=o,e.response=i,e}},41:function(e,t,a){"use strict";var o=a(0);function i(e){return encodeURIComponent(e).replace(/%40/gi,"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}e.exports=function(e,t,a){if(!t)return e;var r;if(a)r=a(t);else if(o.isURLSearchParams(t))r=t.toString();else{var n=[];o.forEach(t,function(e,t){null!==e&&void 0!==e&&(o.isArray(e)&&(t+="[]"),o.isArray(e)||(e=[e]),o.forEach(e,function(e){o.isDate(e)?e=e.toISOString():o.isObject(e)&&(e=JSON.stringify(e)),n.push(i(t)+"="+i(e))}))}),r=n.join("&")}return r&&(e+=(-1===e.indexOf("?")?"?":"&")+r),e}},42:function(e,t,a){"use strict";var o=a(0),i=["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"];e.exports=function(e){var t,a,r,n={};return e?(o.forEach(e.split("\n"),function(e){if(r=e.indexOf(":"),t=o.trim(e.substr(0,r)).toLowerCase(),a=o.trim(e.substr(r+1)),t){if(n[t]&&i.indexOf(t)>=0)return;n[t]="set-cookie"===t?(n[t]?n[t]:[]).concat([a]):n[t]?n[t]+", "+a:a}}),n):n}},43:function(e,t,a){"use strict";var o=a(0);e.exports=o.isStandardBrowserEnv()?function(){var e,t=/(msie|trident)/i.test(navigator.userAgent),a=document.createElement("a");function i(e){var o=e;return t&&(a.setAttribute("href",o),o=a.href),a.setAttribute("href",o),{href:a.href,protocol:a.protocol?a.protocol.replace(/:$/,""):"",host:a.host,search:a.search?a.search.replace(/^\?/,""):"",hash:a.hash?a.hash.replace(/^#/,""):"",hostname:a.hostname,port:a.port,pathname:"/"===a.pathname.charAt(0)?a.pathname:"/"+a.pathname}}return e=i(window.location.href),function(t){var a=o.isString(t)?i(t):t;return a.protocol===e.protocol&&a.host===e.host}}():function(){return!0}},44:function(e,t,a){"use strict";var o="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";function i(){this.message="String contains an invalid character"}i.prototype=new Error,i.prototype.code=5,i.prototype.name="InvalidCharacterError",e.exports=function(e){for(var t,a,r=String(e),n="",s=0,l=o;r.charAt(0|s)||(l="=",s%1);n+=l.charAt(63&t>>8-s%1*8)){if((a=r.charCodeAt(s+=.75))>255)throw new i;t=t<<8|a}return n}},45:function(e,t,a){"use strict";var o=a(0);e.exports=o.isStandardBrowserEnv()?{write:function(e,t,a,i,r,n){var s=[];s.push(e+"="+encodeURIComponent(t)),o.isNumber(a)&&s.push("expires="+new Date(a).toGMTString()),o.isString(i)&&s.push("path="+i),o.isString(r)&&s.push("domain="+r),!0===n&&s.push("secure"),document.cookie=s.join("; ")},read:function(e){var t=document.cookie.match(new RegExp("(^|;\\s*)("+e+")=([^;]*)"));return t?decodeURIComponent(t[3]):null},remove:function(e){this.write(e,"",Date.now()-864e5)}}:{write:function(){},read:function(){return null},remove:function(){}}},46:function(e,t,a){"use strict";var o=a(0);function i(){this.handlers=[]}i.prototype.use=function(e,t){return this.handlers.push({fulfilled:e,rejected:t}),this.handlers.length-1},i.prototype.eject=function(e){this.handlers[e]&&(this.handlers[e]=null)},i.prototype.forEach=function(e){o.forEach(this.handlers,function(t){null!==t&&e(t)})},e.exports=i},47:function(e,t,a){"use strict";var o=a(0),i=a(48),r=a(17),n=a(8),s=a(49),l=a(50);function d(e){e.cancelToken&&e.cancelToken.throwIfRequested()}e.exports=function(e){return d(e),e.baseURL&&!s(e.url)&&(e.url=l(e.baseURL,e.url)),e.headers=e.headers||{},e.data=i(e.data,e.headers,e.transformRequest),e.headers=o.merge(e.headers.common||{},e.headers[e.method]||{},e.headers||{}),o.forEach(["delete","get","head","post","put","patch","common"],function(t){delete e.headers[t]}),(e.adapter||n.adapter)(e).then(function(t){return d(e),t.data=i(t.data,t.headers,e.transformResponse),t},function(t){return r(t)||(d(e),t&&t.response&&(t.response.data=i(t.response.data,t.response.headers,e.transformResponse))),Promise.reject(t)})}},48:function(e,t,a){"use strict";var o=a(0);e.exports=function(e,t,a){return o.forEach(a,function(a){e=a(e,t)}),e}},49:function(e,t,a){"use strict";e.exports=function(e){return/^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e)}},5:function(e,t,a){"use strict";t.__esModule=!0,t.getStyle=t.once=t.off=t.on=void 0;var o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};t.hasClass=m,t.addClass=function(e,t){if(!e)return;for(var a=e.className,o=(t||"").split(" "),i=0,r=o.length;i<r;i++){var n=o[i];n&&(e.classList?e.classList.add(n):m(e,n)||(a+=" "+n))}e.classList||(e.className=a)},t.removeClass=function(e,t){if(!e||!t)return;for(var a=t.split(" "),o=" "+e.className+" ",i=0,r=a.length;i<r;i++){var n=a[i];n&&(e.classList?e.classList.remove(n):m(e,n)&&(o=o.replace(" "+n+" "," ")))}e.classList||(e.className=c(o))},t.setStyle=function e(t,a,i){if(!t||!a)return;if("object"===(void 0===a?"undefined":o(a)))for(var r in a)a.hasOwnProperty(r)&&e(t,r,a[r]);else"opacity"===(a=u(a))&&d<9?t.style.filter=isNaN(i)?"":"alpha(opacity="+100*i+")":t.style[a]=i};var i,r=a(4);var n=((i=r)&&i.__esModule?i:{default:i}).default.prototype.$isServer,s=/([\:\-\_]+(.))/g,l=/^moz([A-Z])/,d=n?0:Number(document.documentMode),c=function(e){return(e||"").replace(/^[\s\uFEFF]+|[\s\uFEFF]+$/g,"")},u=function(e){return e.replace(s,function(e,t,a,o){return o?a.toUpperCase():a}).replace(l,"Moz$1")},p=t.on=!n&&document.addEventListener?function(e,t,a){e&&t&&a&&e.addEventListener(t,a,!1)}:function(e,t,a){e&&t&&a&&e.attachEvent("on"+t,a)},f=t.off=!n&&document.removeEventListener?function(e,t,a){e&&t&&e.removeEventListener(t,a,!1)}:function(e,t,a){e&&t&&e.detachEvent("on"+t,a)};t.once=function(e,t,a){p(e,t,function o(){a&&a.apply(this,arguments),f(e,t,o)})};function m(e,t){if(!e||!t)return!1;if(-1!==t.indexOf(" "))throw new Error("className should not contain space.");return e.classList?e.classList.contains(t):(" "+e.className+" ").indexOf(" "+t+" ")>-1}t.getStyle=d<9?function(e,t){if(!n){if(!e||!t)return null;"float"===(t=u(t))&&(t="styleFloat");try{switch(t){case"opacity":try{return e.filters.item("alpha").opacity/100}catch(e){return 1}default:return e.style[t]||e.currentStyle?e.currentStyle[t]:null}}catch(a){return e.style[t]}}}:function(e,t){if(!n){if(!e||!t)return null;"float"===(t=u(t))&&(t="cssFloat");try{var a=document.defaultView.getComputedStyle(e,"");return e.style[t]||a?a[t]:null}catch(a){return e.style[t]}}}},50:function(e,t,a){"use strict";e.exports=function(e,t){return t?e.replace(/\/+$/,"")+"/"+t.replace(/^\/+/,""):e}},51:function(e,t,a){"use strict";var o=a(18);function i(e){if("function"!=typeof e)throw new TypeError("executor must be a function.");var t;this.promise=new Promise(function(e){t=e});var a=this;e(function(e){a.reason||(a.reason=new o(e),t(a.reason))})}i.prototype.throwIfRequested=function(){if(this.reason)throw this.reason},i.source=function(){var e;return{token:new i(function(t){e=t}),cancel:e}},e.exports=i},52:function(e,t,a){"use strict";e.exports=function(e){return function(t){return e.apply(null,t)}}},54:function(e,t,a){"use strict";var o=a(55),i=a.n(o),r=new Vue({el:"#login",components:{login:i.a},template:'<login ref="login"/>'});$(document).on("click","a.js_login",function(){r.$refs.login.show()})},55:function(e,t,a){var o=a(9)(a(58),a(65),!1,function(e){a(56)},null,null);e.exports=o.exports},56:function(e,t,a){var o=a(57);"string"==typeof o&&(o=[[e.i,o,""]]),o.locals&&(e.exports=o.locals);a(6)("0d5daeb0",o,!0,{})},57:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,'body.el-popup-parent--hidden{padding-right:15px!important}.login-box .pointer{cursor:pointer}.login-box .el-dialog{margin-top:26vh!important}.login-box .el-dialog__body{padding:0 30px 40px}.login-box .el-dialog__body .title{font-family:SourceHanSansCN-Bold;font-size:22px;font-weight:400;font-stretch:normal;letter-spacing:0;color:#333}.login-box .el-dialog__body .small-title{margin-top:12px;font-family:SourceHanSansCN-Regular;font-size:14px;font-weight:400;font-stretch:normal;letter-spacing:0;color:#999}.login-box .el-dialog__body form{display:block;margin-top:35px;width:360px}.login-box .el-dialog__body form .input-box{position:relative;z-index:1;border:1px solid #ddd;height:48px;width:358px;overflow:hidden}.login-box .el-dialog__body form .input-box.error{margin-top:5px;border-color:red;z-index:6}.login-box .el-dialog__body form .input-box:nth-child(2){top:-1px}.login-box .el-dialog__body form .input-box input{border:none;width:100%;height:100%;padding-left:11px;position:absolute}.login-box .el-dialog__body form .input-box .sms-btn-box{width:110px;top:0;bottom:0;padding-top:10px;z-index:3;position:absolute;right:0;background-color:#fff;text-align:center}.login-box .el-dialog__body form .input-box .sms-btn-box button{width:100%;padding:5px 0;border-right:none;border-top:none;border-bottom:none;border-left:1px solid #ddd!important}.login-box .el-dialog__body .el-checkbox__input.is-checked+.el-checkbox__label{color:#333}.login-box .el-dialog__body .btn-box{margin-top:25px;width:300px;text-align:center}.login-box .el-dialog__body .btn-box *{color:#fff}.login-box .el-dialog__body .btn-box button{width:360px;background-color:#007bff;cursor:pointer;position:relative;overflow:hidden;z-index:3}.login-box .el-dialog__body .btn-box button:after{content:"";background:#2b8df7;display:block;position:absolute;height:100%;top:0;left:0;z-index:-1;width:0;-webkit-transition:all .5s ease;transition:all .5s ease}.login-box .el-dialog__body .btn-box button:hover:after{width:100%}.login-box .el-dialog__body .route-box{margin-top:20px}.login-box .el-dialog__body .route-box a{color:#007bff}',""])},58:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(19),i=(a.n(o),a(3)),r=(a.n(i),a(20)),n=a.n(r),s=a(32),l=(a.n(s),a(34)),d=a.n(l),c=a(59),u=(a.n(c),a(61)),p=a.n(u),f=a(62),m=(a.n(f),a(64)),h=a.n(m),g=a(12),b=h.a,v=p.a,x=d.a;t.default={components:{ElDialog:b,ElCheckbox:v,ElButton:x},data:function(){return{active:1,secondNum:0,isTel:!0,isCode:!0,checked:!0,dialogVisible:!1,tel:null,code:null}},watch:{tel:function(e){this.isTel||this.validateTel()},code:function(e){this.isCode||this.validateCode()},secondNum:function(e){var t=this;e>0&&setTimeout(function(){t.secondNum=e-1},1e3)}},methods:{show:function(){this.dialogVisible=!0},validateTel:function(){return/^1\d{10}$/.test(this.tel)?(this.isTel=!0,!0):(this.isTel=!1,!1)},validateCode:function(){return/^\d{4}$/.test(this.code)?(this.isCode=!0,!0):(this.isCode=!1,!1)},getCode:function(){var e=this;this.validateTel()&&(this.secondNum=60,Object(g.k)(this.tel).then(function(e){n()({message:"短信已发送请耐心等候",type:"success"})}).catch(function(){n()({message:"短信发送失败",type:"warning"}),e.secondNum=0}))},login:function(){this.isTel=!0,this.isCode=!0,this.validateTel()&&this.validateCode()&&Object(g.q)({tel:this.tel,smsCode:this.code}).then(function(e){e&&(n()({message:"登陆成功！即将刷新页面",type:"success"}),setTimeout(function(){window.location.reload()},1500))})}}}},59:function(e,t,a){var o=a(60);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},6:function(e,t,a){var o="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!o)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var i=a(25),r={},n=o&&(document.head||document.getElementsByTagName("head")[0]),s=null,l=0,d=!1,c=function(){},u=null,p="data-vue-ssr-id",f="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function m(e){for(var t=0;t<e.length;t++){var a=e[t],o=r[a.id];if(o){o.refs++;for(var i=0;i<o.parts.length;i++)o.parts[i](a.parts[i]);for(;i<a.parts.length;i++)o.parts.push(g(a.parts[i]));o.parts.length>a.parts.length&&(o.parts.length=a.parts.length)}else{var n=[];for(i=0;i<a.parts.length;i++)n.push(g(a.parts[i]));r[a.id]={id:a.id,refs:1,parts:n}}}}function h(){var e=document.createElement("style");return e.type="text/css",n.appendChild(e),e}function g(e){var t,a,o=document.querySelector("style["+p+'~="'+e.id+'"]');if(o){if(d)return c;o.parentNode.removeChild(o)}if(f){var i=l++;o=s||(s=h()),t=x.bind(null,o,i,!1),a=x.bind(null,o,i,!0)}else o=h(),t=function(e,t){var a=t.css,o=t.media,i=t.sourceMap;o&&e.setAttribute("media",o);u.ssrId&&e.setAttribute(p,t.id);i&&(a+="\n/*# sourceURL="+i.sources[0]+" */",a+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(i))))+" */");if(e.styleSheet)e.styleSheet.cssText=a;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(a))}}.bind(null,o),a=function(){o.parentNode.removeChild(o)};return t(e),function(o){if(o){if(o.css===e.css&&o.media===e.media&&o.sourceMap===e.sourceMap)return;t(e=o)}else a()}}e.exports=function(e,t,a,o){d=a,u=o||{};var n=i(e,t);return m(n),function(t){for(var a=[],o=0;o<n.length;o++){var s=n[o];(l=r[s.id]).refs--,a.push(l)}t?m(n=i(e,t)):n=[];for(o=0;o<a.length;o++){var l;if(0===(l=a[o]).refs){for(var d=0;d<l.parts.length;d++)l.parts[d]();delete r[l.id]}}}};var b,v=(b=[],function(e,t){return b[e]=t,b.filter(Boolean).join("\n")});function x(e,t,a,o){var i=a?"":o.css;if(e.styleSheet)e.styleSheet.cssText=v(t,i);else{var r=document.createTextNode(i),n=e.childNodes;n[t]&&e.removeChild(n[t]),n.length?e.insertBefore(r,n[t]):e.appendChild(r)}}},60:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,'.el-checkbox,.el-checkbox__input{display:inline-block;position:relative}.el-checkbox-button__inner,.el-checkbox__input{white-space:nowrap;vertical-align:middle;outline:0}.el-checkbox{color:#606266;font-weight:500;font-size:14px;cursor:pointer;white-space:nowrap;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.el-checkbox.is-bordered{padding:9px 20px 9px 10px;border-radius:4px;border:1px solid #dcdfe6;-webkit-box-sizing:border-box;box-sizing:border-box;line-height:normal;height:40px}.el-checkbox.is-bordered.is-checked{border-color:#409eff}.el-checkbox.is-bordered.is-disabled{border-color:#ebeef5;cursor:not-allowed}.el-checkbox.is-bordered+.el-checkbox.is-bordered{margin-left:10px}.el-checkbox.is-bordered.el-checkbox--medium{padding:7px 20px 7px 10px;border-radius:4px;height:36px}.el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__label{line-height:17px;font-size:14px}.el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__inner{height:14px;width:14px}.el-checkbox.is-bordered.el-checkbox--small{padding:5px 15px 5px 10px;border-radius:3px;height:32px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__label{line-height:15px;font-size:12px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner{height:12px;width:12px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner:after{height:6px;width:2px}.el-checkbox.is-bordered.el-checkbox--mini{padding:3px 15px 3px 10px;border-radius:3px;height:28px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__label{line-height:12px;font-size:12px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner{height:12px;width:12px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner:after{height:6px;width:2px}.el-checkbox__input{cursor:pointer;line-height:1}.el-checkbox__input.is-disabled .el-checkbox__inner{background-color:#edf2fc;border-color:#dcdfe6;cursor:not-allowed}.el-checkbox__input.is-disabled .el-checkbox__inner:after{cursor:not-allowed;border-color:#c0c4cc}.el-checkbox__input.is-disabled .el-checkbox__inner+.el-checkbox__label{cursor:not-allowed}.el-checkbox__input.is-disabled.is-checked .el-checkbox__inner{background-color:#f2f6fc;border-color:#dcdfe6}.el-checkbox__input.is-disabled.is-checked .el-checkbox__inner:after{border-color:#c0c4cc}.el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner{background-color:#f2f6fc;border-color:#dcdfe6}.el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner:before{background-color:#c0c4cc;border-color:#c0c4cc}.el-checkbox__input.is-checked .el-checkbox__inner,.el-checkbox__input.is-indeterminate .el-checkbox__inner{background-color:#409eff;border-color:#409eff}.el-checkbox__input.is-disabled+span.el-checkbox__label{color:#c0c4cc;cursor:not-allowed}.el-checkbox__input.is-checked .el-checkbox__inner:after{-webkit-transform:rotate(45deg) scaleY(1);transform:rotate(45deg) scaleY(1)}.el-checkbox__input.is-checked+.el-checkbox__label{color:#409eff}.el-checkbox__input.is-focus .el-checkbox__inner{border-color:#409eff}.el-checkbox__input.is-indeterminate .el-checkbox__inner:before{content:"";position:absolute;display:block;background-color:#fff;height:2px;-webkit-transform:scale(.5);transform:scale(.5);left:0;right:0;top:5px}.el-checkbox__input.is-indeterminate .el-checkbox__inner:after{display:none}.el-checkbox__inner{display:inline-block;position:relative;border:1px solid #dcdfe6;border-radius:2px;-webkit-box-sizing:border-box;box-sizing:border-box;width:14px;height:14px;background-color:#fff;z-index:1;-webkit-transition:border-color .25s cubic-bezier(.71,-.46,.29,1.46),background-color .25s cubic-bezier(.71,-.46,.29,1.46);transition:border-color .25s cubic-bezier(.71,-.46,.29,1.46),background-color .25s cubic-bezier(.71,-.46,.29,1.46)}.el-checkbox__inner:hover{border-color:#409eff}.el-checkbox__inner:after{-webkit-box-sizing:content-box;box-sizing:content-box;content:"";border:1px solid #fff;border-left:0;border-top:0;height:7px;left:4px;position:absolute;top:1px;-webkit-transform:rotate(45deg) scaleY(0);transform:rotate(45deg) scaleY(0);width:3px;-webkit-transition:-webkit-transform .15s ease-in .05s;transition:-webkit-transform .15s ease-in .05s;transition:transform .15s ease-in .05s;transition:transform .15s ease-in .05s,-webkit-transform .15s ease-in .05s;-webkit-transform-origin:center;transform-origin:center}.el-checkbox__original{opacity:0;outline:0;position:absolute;margin:0;width:0;height:0;z-index:-1}.el-checkbox-button,.el-checkbox-button__inner{display:inline-block;position:relative}.el-checkbox__label{display:inline-block;padding-left:10px;line-height:19px;font-size:14px}.el-checkbox+.el-checkbox{margin-left:30px}.el-checkbox-button__inner{line-height:1;font-weight:500;cursor:pointer;background:#fff;border:1px solid #dcdfe6;border-left:0;color:#606266;-webkit-appearance:none;text-align:center;-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;-webkit-transition:all .3s cubic-bezier(.645,.045,.355,1);transition:all .3s cubic-bezier(.645,.045,.355,1);-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;padding:12px 20px;font-size:14px;border-radius:0}.el-checkbox-button__inner.is-round{padding:12px 20px}.el-checkbox-button__inner:hover{color:#409eff}.el-checkbox-button__inner [class*=el-icon-]{line-height:.9}.el-checkbox-button__inner [class*=el-icon-]+span{margin-left:5px}.el-checkbox-button__original{opacity:0;outline:0;position:absolute;margin:0;z-index:-1}.el-checkbox-button.is-checked .el-checkbox-button__inner{color:#fff;background-color:#409eff;border-color:#409eff;-webkit-box-shadow:-1px 0 0 0 #8cc5ff;box-shadow:-1px 0 0 0 #8cc5ff}.el-checkbox-button.is-checked:first-child .el-checkbox-button__inner{border-left-color:#409eff}.el-checkbox-button.is-disabled .el-checkbox-button__inner{color:#c0c4cc;cursor:not-allowed;background-image:none;background-color:#fff;border-color:#ebeef5;-webkit-box-shadow:none;box-shadow:none}.el-checkbox-button.is-disabled:first-child .el-checkbox-button__inner{border-left-color:#ebeef5}.el-checkbox-button:first-child .el-checkbox-button__inner{border-left:1px solid #dcdfe6;border-radius:4px 0 0 4px;-webkit-box-shadow:none!important;box-shadow:none!important}.el-checkbox-button.is-focus .el-checkbox-button__inner{border-color:#409eff}.el-checkbox-button:last-child .el-checkbox-button__inner{border-radius:0 4px 4px 0}.el-checkbox-button--medium .el-checkbox-button__inner{padding:10px 20px;font-size:14px;border-radius:0}.el-checkbox-button--medium .el-checkbox-button__inner.is-round{padding:10px 20px}.el-checkbox-button--small .el-checkbox-button__inner{padding:9px 15px;font-size:12px;border-radius:0}.el-checkbox-button--small .el-checkbox-button__inner.is-round{padding:9px 15px}.el-checkbox-button--mini .el-checkbox-button__inner{padding:7px 15px;font-size:12px;border-radius:0}.el-checkbox-button--mini .el-checkbox-button__inner.is-round{padding:7px 15px}.el-checkbox-group{font-size:0}',""])},61:function(e,t,a){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=122)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},1:function(e,t){e.exports=a(10)},122:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(123),r=(o=i)&&o.__esModule?o:{default:o};r.default.install=function(e){e.component(r.default.name,r.default)},t.default=r.default},123:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(124),i=a.n(o),r=a(125),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},124:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(1),r=(o=i)&&o.__esModule?o:{default:o};t.default={name:"ElCheckbox",mixins:[r.default],inject:{elForm:{default:""},elFormItem:{default:""}},componentName:"ElCheckbox",data:function(){return{selfModel:!1,focus:!1,isLimitExceeded:!1}},computed:{model:{get:function(){return this.isGroup?this.store:void 0!==this.value?this.value:this.selfModel},set:function(e){this.isGroup?(this.isLimitExceeded=!1,void 0!==this._checkboxGroup.min&&e.length<this._checkboxGroup.min&&(this.isLimitExceeded=!0),void 0!==this._checkboxGroup.max&&e.length>this._checkboxGroup.max&&(this.isLimitExceeded=!0),!1===this.isLimitExceeded&&this.dispatch("ElCheckboxGroup","input",[e])):(this.$emit("input",e),this.selfModel=e)}},isChecked:function(){return"[object Boolean]"==={}.toString.call(this.model)?this.model:Array.isArray(this.model)?this.model.indexOf(this.label)>-1:null!==this.model&&void 0!==this.model?this.model===this.trueLabel:void 0},isGroup:function(){for(var e=this.$parent;e;){if("ElCheckboxGroup"===e.$options.componentName)return this._checkboxGroup=e,!0;e=e.$parent}return!1},store:function(){return this._checkboxGroup?this._checkboxGroup.value:this.value},isDisabled:function(){return this.isGroup?this._checkboxGroup.disabled||this.disabled||(this.elForm||{}).disabled:this.disabled||(this.elForm||{}).disabled},_elFormItemSize:function(){return(this.elFormItem||{}).elFormItemSize},checkboxSize:function(){var e=this.size||this._elFormItemSize||(this.$ELEMENT||{}).size;return this.isGroup&&this._checkboxGroup.checkboxGroupSize||e}},props:{value:{},label:{},indeterminate:Boolean,disabled:Boolean,checked:Boolean,name:String,trueLabel:[String,Number],falseLabel:[String,Number],id:String,controls:String,border:Boolean,size:String},methods:{addToStore:function(){Array.isArray(this.model)&&-1===this.model.indexOf(this.label)?this.model.push(this.label):this.model=this.trueLabel||!0},handleChange:function(e){var t=this;if(!this.isLimitExceeded){var a=void 0;a=e.target.checked?void 0===this.trueLabel||this.trueLabel:void 0!==this.falseLabel&&this.falseLabel,this.$emit("change",a,e),this.$nextTick(function(){t.isGroup&&t.dispatch("ElCheckboxGroup","change",[t._checkboxGroup.value])})}}},created:function(){this.checked&&this.addToStore()},mounted:function(){this.indeterminate&&this.$el.setAttribute("aria-controls",this.controls)},watch:{value:function(e){this.dispatch("ElFormItem","el.form.change",e)}}}},125:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("label",{staticClass:"el-checkbox",class:[e.border&&e.checkboxSize?"el-checkbox--"+e.checkboxSize:"",{"is-disabled":e.isDisabled},{"is-bordered":e.border},{"is-checked":e.isChecked}],attrs:{role:"checkbox","aria-checked":e.indeterminate?"mixed":e.isChecked,"aria-disabled":e.isDisabled,id:e.id}},[a("span",{staticClass:"el-checkbox__input",class:{"is-disabled":e.isDisabled,"is-checked":e.isChecked,"is-indeterminate":e.indeterminate,"is-focus":e.focus},attrs:{"aria-checked":"mixed"}},[a("span",{staticClass:"el-checkbox__inner"}),e.trueLabel||e.falseLabel?a("input",{directives:[{name:"model",rawName:"v-model",value:e.model,expression:"model"}],staticClass:"el-checkbox__original",attrs:{type:"checkbox","aria-hidden":"true",name:e.name,disabled:e.isDisabled,"true-value":e.trueLabel,"false-value":e.falseLabel},domProps:{checked:Array.isArray(e.model)?e._i(e.model,null)>-1:e._q(e.model,e.trueLabel)},on:{change:[function(t){var a=e.model,o=t.target,i=o.checked?e.trueLabel:e.falseLabel;if(Array.isArray(a)){var r=e._i(a,null);o.checked?r<0&&(e.model=a.concat([null])):r>-1&&(e.model=a.slice(0,r).concat(a.slice(r+1)))}else e.model=i},e.handleChange],focus:function(t){e.focus=!0},blur:function(t){e.focus=!1}}}):a("input",{directives:[{name:"model",rawName:"v-model",value:e.model,expression:"model"}],staticClass:"el-checkbox__original",attrs:{type:"checkbox","aria-hidden":"true",disabled:e.isDisabled,name:e.name},domProps:{value:e.label,checked:Array.isArray(e.model)?e._i(e.model,e.label)>-1:e.model},on:{change:[function(t){var a=e.model,o=t.target,i=!!o.checked;if(Array.isArray(a)){var r=e.label,n=e._i(a,r);o.checked?n<0&&(e.model=a.concat([r])):n>-1&&(e.model=a.slice(0,n).concat(a.slice(n+1)))}else e.model=i},e.handleChange],focus:function(t){e.focus=!0},blur:function(t){e.focus=!1}}})]),e.$slots.default||e.label?a("span",{staticClass:"el-checkbox__label"},[e._t("default"),e.$slots.default?e._e():[e._v(e._s(e.label))]],2):e._e()])},staticRenderFns:[]};t.a=o}})},62:function(e,t,a){var o=a(63);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},63:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,".v-modal-enter{-webkit-animation:v-modal-in .2s ease;animation:v-modal-in .2s ease}.v-modal-leave{-webkit-animation:v-modal-out .2s ease forwards;animation:v-modal-out .2s ease forwards}@-webkit-keyframes v-modal-in{0%{opacity:0}}@keyframes v-modal-in{0%{opacity:0}}@-webkit-keyframes v-modal-out{to{opacity:0}}@keyframes v-modal-out{to{opacity:0}}.v-modal{position:fixed;left:0;top:0;width:100%;height:100%;opacity:.5;background:#000}.el-popup-parent--hidden{overflow:hidden}.el-dialog{position:relative;margin:0 auto 50px;background:#fff;border-radius:2px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.3);box-shadow:0 1px 3px rgba(0,0,0,.3);-webkit-box-sizing:border-box;box-sizing:border-box;width:50%}.el-dialog.is-fullscreen{width:100%;margin-top:0;margin-bottom:0;height:100%;overflow:auto}.el-dialog__wrapper{position:fixed;top:0;right:0;bottom:0;left:0;overflow:auto;margin:0}.el-dialog__header{padding:20px 20px 10px}.el-dialog__headerbtn{position:absolute;top:20px;right:20px;padding:0;background:0 0;border:none;outline:0;cursor:pointer;font-size:16px}.el-dialog__headerbtn .el-dialog__close{color:#909399}.el-dialog__headerbtn:focus .el-dialog__close,.el-dialog__headerbtn:hover .el-dialog__close{color:#409eff}.el-dialog__title{line-height:24px;font-size:18px;color:#303133}.el-dialog__body{padding:30px 20px;color:#606266;font-size:14px}.el-dialog__footer{padding:10px 20px 20px;text-align:right;-webkit-box-sizing:border-box;box-sizing:border-box}.el-dialog--center{text-align:center}.el-dialog--center .el-dialog__body{text-align:initial;padding:25px 25px 30px}.el-dialog--center .el-dialog__footer{text-align:inherit}.dialog-fade-enter-active{-webkit-animation:dialog-fade-in .3s;animation:dialog-fade-in .3s}.dialog-fade-leave-active{-webkit-animation:dialog-fade-out .3s;animation:dialog-fade-out .3s}@-webkit-keyframes dialog-fade-in{0%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}to{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}}@keyframes dialog-fade-in{0%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}to{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}}@-webkit-keyframes dialog-fade-out{0%{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}to{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}}@keyframes dialog-fade-out{0%{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}to{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}}",""])},64:function(e,t,a){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=61)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},1:function(e,t){e.exports=a(10)},13:function(e,t){e.exports=a(11)},61:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(62),r=(o=i)&&o.__esModule?o:{default:o};r.default.install=function(e){e.component(r.default.name,r.default)},t.default=r.default},62:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(63),i=a.n(o),r=a(64),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},63:function(e,t,a){"use strict";t.__esModule=!0;var o=n(a(13)),i=n(a(8)),r=n(a(1));function n(e){return e&&e.__esModule?e:{default:e}}t.default={name:"ElDialog",mixins:[o.default,r.default,i.default],props:{title:{type:String,default:""},modal:{type:Boolean,default:!0},modalAppendToBody:{type:Boolean,default:!0},appendToBody:{type:Boolean,default:!1},lockScroll:{type:Boolean,default:!0},closeOnClickModal:{type:Boolean,default:!0},closeOnPressEscape:{type:Boolean,default:!0},showClose:{type:Boolean,default:!0},width:String,fullscreen:Boolean,customClass:{type:String,default:""},top:{type:String,default:"15vh"},beforeClose:Function,center:{type:Boolean,default:!1}},data:function(){return{closed:!1}},watch:{visible:function(e){var t=this;e?(this.closed=!1,this.$emit("open"),this.$el.addEventListener("scroll",this.updatePopper),this.$nextTick(function(){t.$refs.dialog.scrollTop=0}),this.appendToBody&&document.body.appendChild(this.$el)):(this.$el.removeEventListener("scroll",this.updatePopper),this.closed||this.$emit("close"))}},computed:{style:function(){var e={};return this.width&&(e.width=this.width),this.fullscreen||(e.marginTop=this.top),e}},methods:{getMigratingConfig:function(){return{props:{size:"size is removed."}}},handleWrapperClick:function(){this.closeOnClickModal&&this.handleClose()},handleClose:function(){"function"==typeof this.beforeClose?this.beforeClose(this.hide):this.hide()},hide:function(e){!1!==e&&(this.$emit("update:visible",!1),this.$emit("close"),this.closed=!0)},updatePopper:function(){this.broadcast("ElSelectDropdown","updatePopper"),this.broadcast("ElDropdownMenu","updatePopper")},afterLeave:function(){this.$emit("closed")}},mounted:function(){this.visible&&(this.rendered=!0,this.open(),this.appendToBody&&document.body.appendChild(this.$el))},destroyed:function(){this.appendToBody&&this.$el&&this.$el.parentNode&&this.$el.parentNode.removeChild(this.$el)}}},64:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("transition",{attrs:{name:"dialog-fade"},on:{"after-leave":e.afterLeave}},[a("div",{directives:[{name:"show",rawName:"v-show",value:e.visible,expression:"visible"}],staticClass:"el-dialog__wrapper",on:{click:function(t){if(t.target!==t.currentTarget)return null;e.handleWrapperClick(t)}}},[a("div",{ref:"dialog",staticClass:"el-dialog",class:[{"is-fullscreen":e.fullscreen,"el-dialog--center":e.center},e.customClass],style:e.style},[a("div",{staticClass:"el-dialog__header"},[e._t("title",[a("span",{staticClass:"el-dialog__title"},[e._v(e._s(e.title))])]),e.showClose?a("button",{staticClass:"el-dialog__headerbtn",attrs:{type:"button","aria-label":"Close"},on:{click:e.handleClose}},[a("i",{staticClass:"el-dialog__close el-icon el-icon-close"})]):e._e()],2),e.rendered?a("div",{staticClass:"el-dialog__body"},[e._t("default")],2):e._e(),e.$slots.footer?a("div",{staticClass:"el-dialog__footer"},[e._t("footer")],2):e._e()])])])},staticRenderFns:[]};t.a=o},8:function(e,t){e.exports=a(23)}})},65:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-dialog",{staticClass:"login-box",attrs:{visible:e.dialogVisible,width:"420px"},on:{"update:visible":function(t){e.dialogVisible=t}}},[1===e.active?a("div",[a("div",{staticClass:"title"},[e._v("手机快捷登录")]),e._v(" "),a("div",{staticClass:"small-title"},[e._v("登录享受更多楚楼网服务")]),e._v(" "),a("form",[a("div",{staticClass:"input-box"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.tel,expression:"tel"}],attrs:{type:"text",placeholder:"请输入手机号"},domProps:{value:e.tel},on:{input:function(t){t.target.composing||(e.tel=t.target.value)}}})]),e._v(" "),a("div",{staticClass:"input-box"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.code,expression:"code"}],attrs:{type:"text",placeholder:"4位短信验证码"},domProps:{value:e.code},on:{input:function(t){t.target.composing||(e.code=t.target.value)}}}),e._v(" "),a("div",{staticClass:"sms-btn-box"},[e.secondNum<=0?a("button",{staticClass:"pointer",attrs:{type:"button"},on:{click:e.getCode}},[e._v("获取验证码")]):a("button",{attrs:{type:"button"}},[e._v(e._s(e.secondNum)+"s后重新发送")])])])]),e._v(" "),a("div",{staticStyle:{position:"relative"}},[a("div",{staticStyle:{position:"absolute"}},[e.isTel?e._e():a("span",{staticStyle:{color:"red"}},[e._v("·请输入11位手机号")]),e._v(" "),e.isCode?e._e():a("span",{staticStyle:{color:"red"}},[e._v("·请输入4位短信验证码")])])]),e._v(" "),a("el-checkbox",{staticStyle:{"margin-top":"25px"},model:{value:e.checked,callback:function(t){e.checked=t},expression:"checked"}},[e._v("7天内免登录")]),e._v(" "),a("div",{staticClass:"btn-box"},[a("el-button",{attrs:{type:"primary"},on:{click:e.login}},[e._v("登录")])],1)],1):e._e()])},staticRenderFns:[]}},7:function(e,t,a){"use strict";t.__esModule=!0,t.noop=function(){},t.hasOwn=function(e,t){return o.call(e,t)},t.toObject=function(e){for(var t={},a=0;a<e.length;a++)e[a]&&i(t,e[a]);return t},t.getPropByPath=function(e,t,a){for(var o=e,i=(t=(t=t.replace(/\[(\w+)\]/g,".$1")).replace(/^\./,"")).split("."),r=0,n=i.length;r<n-1&&(o||a);++r){var s=i[r];if(!(s in o)){if(a)throw new Error("please transfer a valid prop path to form item!");break}o=o[s]}return{o:o,k:i[r],v:o?o[i[r]]:null}};var o=Object.prototype.hasOwnProperty;function i(e,t){for(var a in t)e[a]=t[a];return e}t.getValueByPath=function(e,t){for(var a=(t=t||"").split("."),o=e,i=null,r=0,n=a.length;r<n;r++){var s=a[r];if(!o)break;if(r===n-1){i=o[s];break}o=o[s]}return i};t.generateId=function(){return Math.floor(1e4*Math.random())},t.valueEquals=function(e,t){if(e===t)return!0;if(!(e instanceof Array))return!1;if(!(t instanceof Array))return!1;if(e.length!==t.length)return!1;for(var a=0;a!==e.length;++a)if(e[a]!==t[a])return!1;return!0}},8:function(e,t,a){"use strict";(function(t){var o=a(0),i=a(38),r={"Content-Type":"application/x-www-form-urlencoded"};function n(e,t){!o.isUndefined(e)&&o.isUndefined(e["Content-Type"])&&(e["Content-Type"]=t)}var s,l={adapter:("undefined"!=typeof XMLHttpRequest?s=a(15):void 0!==t&&(s=a(15)),s),transformRequest:[function(e,t){return i(t,"Content-Type"),o.isFormData(e)||o.isArrayBuffer(e)||o.isBuffer(e)||o.isStream(e)||o.isFile(e)||o.isBlob(e)?e:o.isArrayBufferView(e)?e.buffer:o.isURLSearchParams(e)?(n(t,"application/x-www-form-urlencoded;charset=utf-8"),e.toString()):o.isObject(e)?(n(t,"application/json;charset=utf-8"),JSON.stringify(e)):e}],transformResponse:[function(e){if("string"==typeof e)try{e=JSON.parse(e)}catch(e){}return e}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,validateStatus:function(e){return e>=200&&e<300}};l.headers={common:{Accept:"application/json, text/plain, */*"}},o.forEach(["delete","get","head"],function(e){l.headers[e]={}}),o.forEach(["post","put","patch"],function(e){l.headers[e]=o.merge(r)}),e.exports=l}).call(t,a(69))},9:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},98:function(e,t,a){!function(){"use strict";var e,t,a,o=function(t,a){if(!(this instanceof o))return new o(t,a);var i={direction:"horizontal",touchEventsTarget:"container",initialSlide:0,speed:300,autoplay:!1,autoplayDisableOnInteraction:!0,autoplayStopOnLast:!1,iOSEdgeSwipeDetection:!1,iOSEdgeSwipeThreshold:20,freeMode:!1,freeModeMomentum:!0,freeModeMomentumRatio:1,freeModeMomentumBounce:!0,freeModeMomentumBounceRatio:1,freeModeMomentumVelocityRatio:1,freeModeSticky:!1,freeModeMinimumVelocity:.02,autoHeight:!1,setWrapperSize:!1,virtualTranslate:!1,effect:"slide",coverflow:{rotate:50,stretch:0,depth:100,modifier:1,slideShadows:!0},flip:{slideShadows:!0,limitRotation:!0},cube:{slideShadows:!0,shadow:!0,shadowOffset:20,shadowScale:.94},fade:{crossFade:!1},parallax:!1,zoom:!1,zoomMax:3,zoomMin:1,zoomToggle:!0,scrollbar:null,scrollbarHide:!0,scrollbarDraggable:!1,scrollbarSnapOnRelease:!1,keyboardControl:!1,mousewheelControl:!1,mousewheelReleaseOnEdges:!1,mousewheelInvert:!1,mousewheelForceToAxis:!1,mousewheelSensitivity:1,mousewheelEventsTarged:"container",hashnav:!1,hashnavWatchState:!1,history:!1,replaceState:!1,breakpoints:void 0,spaceBetween:0,slidesPerView:1,slidesPerColumn:1,slidesPerColumnFill:"column",slidesPerGroup:1,centeredSlides:!1,slidesOffsetBefore:0,slidesOffsetAfter:0,roundLengths:!1,touchRatio:1,touchAngle:45,simulateTouch:!0,shortSwipes:!0,longSwipes:!0,longSwipesRatio:.5,longSwipesMs:300,followFinger:!0,onlyExternal:!1,threshold:0,touchMoveStopPropagation:!0,touchReleaseOnEdges:!1,uniqueNavElements:!0,pagination:null,paginationElement:"span",paginationClickable:!1,paginationHide:!1,paginationBulletRender:null,paginationProgressRender:null,paginationFractionRender:null,paginationCustomRender:null,paginationType:"bullets",resistance:!0,resistanceRatio:.85,nextButton:null,prevButton:null,watchSlidesProgress:!1,watchSlidesVisibility:!1,grabCursor:!1,preventClicks:!0,preventClicksPropagation:!0,slideToClickedSlide:!1,lazyLoading:!1,lazyLoadingInPrevNext:!1,lazyLoadingInPrevNextAmount:1,lazyLoadingOnTransitionStart:!1,preloadImages:!0,updateOnImagesReady:!0,loop:!1,loopAdditionalSlides:0,loopedSlides:null,control:void 0,controlInverse:!1,controlBy:"slide",normalizeSlideIndex:!0,allowSwipeToPrev:!0,allowSwipeToNext:!0,swipeHandler:null,noSwiping:!0,noSwipingClass:"swiper-no-swiping",passiveListeners:!0,containerModifierClass:"swiper-container-",slideClass:"swiper-slide",slideActiveClass:"swiper-slide-active",slideDuplicateActiveClass:"swiper-slide-duplicate-active",slideVisibleClass:"swiper-slide-visible",slideDuplicateClass:"swiper-slide-duplicate",slideNextClass:"swiper-slide-next",slideDuplicateNextClass:"swiper-slide-duplicate-next",slidePrevClass:"swiper-slide-prev",slideDuplicatePrevClass:"swiper-slide-duplicate-prev",wrapperClass:"swiper-wrapper",bulletClass:"swiper-pagination-bullet",bulletActiveClass:"swiper-pagination-bullet-active",buttonDisabledClass:"swiper-button-disabled",paginationCurrentClass:"swiper-pagination-current",paginationTotalClass:"swiper-pagination-total",paginationHiddenClass:"swiper-pagination-hidden",paginationProgressbarClass:"swiper-pagination-progressbar",paginationClickableClass:"swiper-pagination-clickable",paginationModifierClass:"swiper-pagination-",lazyLoadingClass:"swiper-lazy",lazyStatusLoadingClass:"swiper-lazy-loading",lazyStatusLoadedClass:"swiper-lazy-loaded",lazyPreloaderClass:"swiper-lazy-preloader",notificationClass:"swiper-notification",preloaderClass:"preloader",zoomContainerClass:"swiper-zoom-container",observer:!1,observeParents:!1,a11y:!1,prevSlideMessage:"Previous slide",nextSlideMessage:"Next slide",firstSlideMessage:"This is the first slide",lastSlideMessage:"This is the last slide",paginationBulletMessage:"Go to slide {{index}}",runCallbacksOnInit:!0},n=a&&a.virtualTranslate;a=a||{};var s={};for(var l in a)if("object"!=typeof a[l]||null===a[l]||(a[l].nodeType||a[l]===window||a[l]===document||void 0!==r&&a[l]instanceof r||"undefined"!=typeof jQuery&&a[l]instanceof jQuery))s[l]=a[l];else for(var d in s[l]={},a[l])s[l][d]=a[l][d];for(var c in i)if(void 0===a[c])a[c]=i[c];else if("object"==typeof a[c])for(var u in i[c])void 0===a[c][u]&&(a[c][u]=i[c][u]);var p=this;if(p.params=a,p.originalParams=s,p.classNames=[],void 0!==e&&void 0!==r&&(e=r),(void 0!==e||(e=void 0===r?window.Dom7||window.Zepto||window.jQuery:r))&&(p.$=e,p.currentBreakpoint=void 0,p.getActiveBreakpoint=function(){if(!p.params.breakpoints)return!1;var e,t=!1,a=[];for(e in p.params.breakpoints)p.params.breakpoints.hasOwnProperty(e)&&a.push(e);a.sort(function(e,t){return parseInt(e,10)>parseInt(t,10)});for(var o=0;o<a.length;o++)(e=a[o])>=window.innerWidth&&!t&&(t=e);return t||"max"},p.setBreakpoint=function(){var e=p.getActiveBreakpoint();if(e&&p.currentBreakpoint!==e){var t=e in p.params.breakpoints?p.params.breakpoints[e]:p.originalParams,a=p.params.loop&&t.slidesPerView!==p.params.slidesPerView;for(var o in t)p.params[o]=t[o];p.currentBreakpoint=e,a&&p.destroyLoop&&p.reLoop(!0)}},p.params.breakpoints&&p.setBreakpoint(),p.container=e(t),0!==p.container.length)){if(p.container.length>1){var f=[];return p.container.each(function(){f.push(new o(this,a))}),f}p.container[0].swiper=p,p.container.data("swiper",p),p.classNames.push(p.params.containerModifierClass+p.params.direction),p.params.freeMode&&p.classNames.push(p.params.containerModifierClass+"free-mode"),p.support.flexbox||(p.classNames.push(p.params.containerModifierClass+"no-flexbox"),p.params.slidesPerColumn=1),p.params.autoHeight&&p.classNames.push(p.params.containerModifierClass+"autoheight"),(p.params.parallax||p.params.watchSlidesVisibility)&&(p.params.watchSlidesProgress=!0),p.params.touchReleaseOnEdges&&(p.params.resistanceRatio=0),["cube","coverflow","flip"].indexOf(p.params.effect)>=0&&(p.support.transforms3d?(p.params.watchSlidesProgress=!0,p.classNames.push(p.params.containerModifierClass+"3d")):p.params.effect="slide"),"slide"!==p.params.effect&&p.classNames.push(p.params.containerModifierClass+p.params.effect),"cube"===p.params.effect&&(p.params.resistanceRatio=0,p.params.slidesPerView=1,p.params.slidesPerColumn=1,p.params.slidesPerGroup=1,p.params.centeredSlides=!1,p.params.spaceBetween=0,p.params.virtualTranslate=!0),"fade"!==p.params.effect&&"flip"!==p.params.effect||(p.params.slidesPerView=1,p.params.slidesPerColumn=1,p.params.slidesPerGroup=1,p.params.watchSlidesProgress=!0,p.params.spaceBetween=0,void 0===n&&(p.params.virtualTranslate=!0)),p.params.grabCursor&&p.support.touch&&(p.params.grabCursor=!1),p.wrapper=p.container.children("."+p.params.wrapperClass),p.params.pagination&&(p.paginationContainer=e(p.params.pagination),p.params.uniqueNavElements&&"string"==typeof p.params.pagination&&p.paginationContainer.length>1&&1===p.container.find(p.params.pagination).length&&(p.paginationContainer=p.container.find(p.params.pagination)),"bullets"===p.params.paginationType&&p.params.paginationClickable?p.paginationContainer.addClass(p.params.paginationModifierClass+"clickable"):p.params.paginationClickable=!1,p.paginationContainer.addClass(p.params.paginationModifierClass+p.params.paginationType)),(p.params.nextButton||p.params.prevButton)&&(p.params.nextButton&&(p.nextButton=e(p.params.nextButton),p.params.uniqueNavElements&&"string"==typeof p.params.nextButton&&p.nextButton.length>1&&1===p.container.find(p.params.nextButton).length&&(p.nextButton=p.container.find(p.params.nextButton))),p.params.prevButton&&(p.prevButton=e(p.params.prevButton),p.params.uniqueNavElements&&"string"==typeof p.params.prevButton&&p.prevButton.length>1&&1===p.container.find(p.params.prevButton).length&&(p.prevButton=p.container.find(p.params.prevButton)))),p.isHorizontal=function(){return"horizontal"===p.params.direction},p.rtl=p.isHorizontal()&&("rtl"===p.container[0].dir.toLowerCase()||"rtl"===p.container.css("direction")),p.rtl&&p.classNames.push(p.params.containerModifierClass+"rtl"),p.rtl&&(p.wrongRTL="-webkit-box"===p.wrapper.css("display")),p.params.slidesPerColumn>1&&p.classNames.push(p.params.containerModifierClass+"multirow"),p.device.android&&p.classNames.push(p.params.containerModifierClass+"android"),p.container.addClass(p.classNames.join(" ")),p.translate=0,p.progress=0,p.velocity=0,p.lockSwipeToNext=function(){p.params.allowSwipeToNext=!1,!1===p.params.allowSwipeToPrev&&p.params.grabCursor&&p.unsetGrabCursor()},p.lockSwipeToPrev=function(){p.params.allowSwipeToPrev=!1,!1===p.params.allowSwipeToNext&&p.params.grabCursor&&p.unsetGrabCursor()},p.lockSwipes=function(){p.params.allowSwipeToNext=p.params.allowSwipeToPrev=!1,p.params.grabCursor&&p.unsetGrabCursor()},p.unlockSwipeToNext=function(){p.params.allowSwipeToNext=!0,!0===p.params.allowSwipeToPrev&&p.params.grabCursor&&p.setGrabCursor()},p.unlockSwipeToPrev=function(){p.params.allowSwipeToPrev=!0,!0===p.params.allowSwipeToNext&&p.params.grabCursor&&p.setGrabCursor()},p.unlockSwipes=function(){p.params.allowSwipeToNext=p.params.allowSwipeToPrev=!0,p.params.grabCursor&&p.setGrabCursor()},p.setGrabCursor=function(e){p.container[0].style.cursor="move",p.container[0].style.cursor=e?"-webkit-grabbing":"-webkit-grab",p.container[0].style.cursor=e?"-moz-grabbin":"-moz-grab",p.container[0].style.cursor=e?"grabbing":"grab"},p.unsetGrabCursor=function(){p.container[0].style.cursor=""},p.params.grabCursor&&p.setGrabCursor(),p.imagesToLoad=[],p.imagesLoaded=0,p.loadImage=function(e,t,a,o,i,r){var n;function s(){r&&r()}e.complete&&i?s():t?((n=new window.Image).onload=s,n.onerror=s,o&&(n.sizes=o),a&&(n.srcset=a),t&&(n.src=t)):s()},p.preloadImages=function(){function e(){void 0!==p&&null!==p&&p&&(void 0!==p.imagesLoaded&&p.imagesLoaded++,p.imagesLoaded===p.imagesToLoad.length&&(p.params.updateOnImagesReady&&p.update(),p.emit("onImagesReady",p)))}p.imagesToLoad=p.container.find("img");for(var t=0;t<p.imagesToLoad.length;t++)p.loadImage(p.imagesToLoad[t],p.imagesToLoad[t].currentSrc||p.imagesToLoad[t].getAttribute("src"),p.imagesToLoad[t].srcset||p.imagesToLoad[t].getAttribute("srcset"),p.imagesToLoad[t].sizes||p.imagesToLoad[t].getAttribute("sizes"),!0,e)},p.autoplayTimeoutId=void 0,p.autoplaying=!1,p.autoplayPaused=!1,p.startAutoplay=function(){return void 0===p.autoplayTimeoutId&&(!!p.params.autoplay&&(!p.autoplaying&&(p.autoplaying=!0,p.emit("onAutoplayStart",p),void L())))},p.stopAutoplay=function(e){p.autoplayTimeoutId&&(p.autoplayTimeoutId&&clearTimeout(p.autoplayTimeoutId),p.autoplaying=!1,p.autoplayTimeoutId=void 0,p.emit("onAutoplayStop",p))},p.pauseAutoplay=function(e){p.autoplayPaused||(p.autoplayTimeoutId&&clearTimeout(p.autoplayTimeoutId),p.autoplayPaused=!0,0===e?(p.autoplayPaused=!1,L()):p.wrapper.transitionEnd(function(){p&&(p.autoplayPaused=!1,p.autoplaying?L():p.stopAutoplay())}))},p.minTranslate=function(){return-p.snapGrid[0]},p.maxTranslate=function(){return-p.snapGrid[p.snapGrid.length-1]},p.updateAutoHeight=function(){var e,t=[],a=0;if("auto"!==p.params.slidesPerView&&p.params.slidesPerView>1)for(e=0;e<Math.ceil(p.params.slidesPerView);e++){var o=p.activeIndex+e;if(o>p.slides.length)break;t.push(p.slides.eq(o)[0])}else t.push(p.slides.eq(p.activeIndex)[0]);for(e=0;e<t.length;e++)if(void 0!==t[e]){var i=t[e].offsetHeight;a=i>a?i:a}a&&p.wrapper.css("height",a+"px")},p.updateContainerSize=function(){var e,t;e=void 0!==p.params.width?p.params.width:p.container[0].clientWidth,t=void 0!==p.params.height?p.params.height:p.container[0].clientHeight,0===e&&p.isHorizontal()||0===t&&!p.isHorizontal()||(e=e-parseInt(p.container.css("padding-left"),10)-parseInt(p.container.css("padding-right"),10),t=t-parseInt(p.container.css("padding-top"),10)-parseInt(p.container.css("padding-bottom"),10),p.width=e,p.height=t,p.size=p.isHorizontal()?p.width:p.height)},p.updateSlidesSize=function(){p.slides=p.wrapper.children("."+p.params.slideClass),p.snapGrid=[],p.slidesGrid=[],p.slidesSizesGrid=[];var e,t=p.params.spaceBetween,a=-p.params.slidesOffsetBefore,o=0,i=0;if(void 0!==p.size){var r,n;"string"==typeof t&&t.indexOf("%")>=0&&(t=parseFloat(t.replace("%",""))/100*p.size),p.virtualSize=-t,p.rtl?p.slides.css({marginLeft:"",marginTop:""}):p.slides.css({marginRight:"",marginBottom:""}),p.params.slidesPerColumn>1&&(r=Math.floor(p.slides.length/p.params.slidesPerColumn)===p.slides.length/p.params.slidesPerColumn?p.slides.length:Math.ceil(p.slides.length/p.params.slidesPerColumn)*p.params.slidesPerColumn,"auto"!==p.params.slidesPerView&&"row"===p.params.slidesPerColumnFill&&(r=Math.max(r,p.params.slidesPerView*p.params.slidesPerColumn)));var s,l=p.params.slidesPerColumn,d=r/l,c=d-(p.params.slidesPerColumn*d-p.slides.length);for(e=0;e<p.slides.length;e++){n=0;var u,f,m,h=p.slides.eq(e);if(p.params.slidesPerColumn>1)"column"===p.params.slidesPerColumnFill?(m=e-(f=Math.floor(e/l))*l,(f>c||f===c&&m===l-1)&&++m>=l&&(m=0,f++),u=f+m*r/l,h.css({"-webkit-box-ordinal-group":u,"-moz-box-ordinal-group":u,"-ms-flex-order":u,"-webkit-order":u,order:u})):f=e-(m=Math.floor(e/d))*d,h.css("margin-"+(p.isHorizontal()?"top":"left"),0!==m&&p.params.spaceBetween&&p.params.spaceBetween+"px").attr("data-swiper-column",f).attr("data-swiper-row",m);"none"!==h.css("display")&&("auto"===p.params.slidesPerView?(n=p.isHorizontal()?h.outerWidth(!0):h.outerHeight(!0),p.params.roundLengths&&(n=I(n))):(n=(p.size-(p.params.slidesPerView-1)*t)/p.params.slidesPerView,p.params.roundLengths&&(n=I(n)),p.isHorizontal()?p.slides[e].style.width=n+"px":p.slides[e].style.height=n+"px"),p.slides[e].swiperSlideSize=n,p.slidesSizesGrid.push(n),p.params.centeredSlides?(a=a+n/2+o/2+t,0===o&&0!==e&&(a=a-p.size/2-t),0===e&&(a=a-p.size/2-t),Math.abs(a)<.001&&(a=0),i%p.params.slidesPerGroup==0&&p.snapGrid.push(a),p.slidesGrid.push(a)):(i%p.params.slidesPerGroup==0&&p.snapGrid.push(a),p.slidesGrid.push(a),a=a+n+t),p.virtualSize+=n+t,o=n,i++)}if(p.virtualSize=Math.max(p.virtualSize,p.size)+p.params.slidesOffsetAfter,p.rtl&&p.wrongRTL&&("slide"===p.params.effect||"coverflow"===p.params.effect)&&p.wrapper.css({width:p.virtualSize+p.params.spaceBetween+"px"}),p.support.flexbox&&!p.params.setWrapperSize||(p.isHorizontal()?p.wrapper.css({width:p.virtualSize+p.params.spaceBetween+"px"}):p.wrapper.css({height:p.virtualSize+p.params.spaceBetween+"px"})),p.params.slidesPerColumn>1&&(p.virtualSize=(n+p.params.spaceBetween)*r,p.virtualSize=Math.ceil(p.virtualSize/p.params.slidesPerColumn)-p.params.spaceBetween,p.isHorizontal()?p.wrapper.css({width:p.virtualSize+p.params.spaceBetween+"px"}):p.wrapper.css({height:p.virtualSize+p.params.spaceBetween+"px"}),p.params.centeredSlides)){for(s=[],e=0;e<p.snapGrid.length;e++)p.snapGrid[e]<p.virtualSize+p.snapGrid[0]&&s.push(p.snapGrid[e]);p.snapGrid=s}if(!p.params.centeredSlides){for(s=[],e=0;e<p.snapGrid.length;e++)p.snapGrid[e]<=p.virtualSize-p.size&&s.push(p.snapGrid[e]);p.snapGrid=s,Math.floor(p.virtualSize-p.size)-Math.floor(p.snapGrid[p.snapGrid.length-1])>1&&p.snapGrid.push(p.virtualSize-p.size)}0===p.snapGrid.length&&(p.snapGrid=[0]),0!==p.params.spaceBetween&&(p.isHorizontal()?p.rtl?p.slides.css({marginLeft:t+"px"}):p.slides.css({marginRight:t+"px"}):p.slides.css({marginBottom:t+"px"})),p.params.watchSlidesProgress&&p.updateSlidesOffset()}},p.updateSlidesOffset=function(){for(var e=0;e<p.slides.length;e++)p.slides[e].swiperSlideOffset=p.isHorizontal()?p.slides[e].offsetLeft:p.slides[e].offsetTop},p.currentSlidesPerView=function(){var e,t,a=1;if(p.params.centeredSlides){var o,i=p.slides[p.activeIndex].swiperSlideSize;for(e=p.activeIndex+1;e<p.slides.length;e++)p.slides[e]&&!o&&(a++,(i+=p.slides[e].swiperSlideSize)>p.size&&(o=!0));for(t=p.activeIndex-1;t>=0;t--)p.slides[t]&&!o&&(a++,(i+=p.slides[t].swiperSlideSize)>p.size&&(o=!0))}else for(e=p.activeIndex+1;e<p.slides.length;e++)p.slidesGrid[e]-p.slidesGrid[p.activeIndex]<p.size&&a++;return a},p.updateSlidesProgress=function(e){if(void 0===e&&(e=p.translate||0),0!==p.slides.length){void 0===p.slides[0].swiperSlideOffset&&p.updateSlidesOffset();var t=-e;p.rtl&&(t=e),p.slides.removeClass(p.params.slideVisibleClass);for(var a=0;a<p.slides.length;a++){var o=p.slides[a],i=(t+(p.params.centeredSlides?p.minTranslate():0)-o.swiperSlideOffset)/(o.swiperSlideSize+p.params.spaceBetween);if(p.params.watchSlidesVisibility){var r=-(t-o.swiperSlideOffset),n=r+p.slidesSizesGrid[a];(r>=0&&r<p.size||n>0&&n<=p.size||r<=0&&n>=p.size)&&p.slides.eq(a).addClass(p.params.slideVisibleClass)}o.progress=p.rtl?-i:i}}},p.updateProgress=function(e){void 0===e&&(e=p.translate||0);var t=p.maxTranslate()-p.minTranslate(),a=p.isBeginning,o=p.isEnd;0===t?(p.progress=0,p.isBeginning=p.isEnd=!0):(p.progress=(e-p.minTranslate())/t,p.isBeginning=p.progress<=0,p.isEnd=p.progress>=1),p.isBeginning&&!a&&p.emit("onReachBeginning",p),p.isEnd&&!o&&p.emit("onReachEnd",p),p.params.watchSlidesProgress&&p.updateSlidesProgress(e),p.emit("onProgress",p,p.progress)},p.updateActiveIndex=function(){var e,t,a,o=p.rtl?p.translate:-p.translate;for(t=0;t<p.slidesGrid.length;t++)void 0!==p.slidesGrid[t+1]?o>=p.slidesGrid[t]&&o<p.slidesGrid[t+1]-(p.slidesGrid[t+1]-p.slidesGrid[t])/2?e=t:o>=p.slidesGrid[t]&&o<p.slidesGrid[t+1]&&(e=t+1):o>=p.slidesGrid[t]&&(e=t);p.params.normalizeSlideIndex&&(e<0||void 0===e)&&(e=0),(a=Math.floor(e/p.params.slidesPerGroup))>=p.snapGrid.length&&(a=p.snapGrid.length-1),e!==p.activeIndex&&(p.snapIndex=a,p.previousIndex=p.activeIndex,p.activeIndex=e,p.updateClasses(),p.updateRealIndex())},p.updateRealIndex=function(){p.realIndex=parseInt(p.slides.eq(p.activeIndex).attr("data-swiper-slide-index")||p.activeIndex,10)},p.updateClasses=function(){p.slides.removeClass(p.params.slideActiveClass+" "+p.params.slideNextClass+" "+p.params.slidePrevClass+" "+p.params.slideDuplicateActiveClass+" "+p.params.slideDuplicateNextClass+" "+p.params.slideDuplicatePrevClass);var t=p.slides.eq(p.activeIndex);t.addClass(p.params.slideActiveClass),a.loop&&(t.hasClass(p.params.slideDuplicateClass)?p.wrapper.children("."+p.params.slideClass+":not(."+p.params.slideDuplicateClass+')[data-swiper-slide-index="'+p.realIndex+'"]').addClass(p.params.slideDuplicateActiveClass):p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+p.realIndex+'"]').addClass(p.params.slideDuplicateActiveClass));var o=t.next("."+p.params.slideClass).addClass(p.params.slideNextClass);p.params.loop&&0===o.length&&(o=p.slides.eq(0)).addClass(p.params.slideNextClass);var i=t.prev("."+p.params.slideClass).addClass(p.params.slidePrevClass);if(p.params.loop&&0===i.length&&(i=p.slides.eq(-1)).addClass(p.params.slidePrevClass),a.loop&&(o.hasClass(p.params.slideDuplicateClass)?p.wrapper.children("."+p.params.slideClass+":not(."+p.params.slideDuplicateClass+')[data-swiper-slide-index="'+o.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicateNextClass):p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+o.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicateNextClass),i.hasClass(p.params.slideDuplicateClass)?p.wrapper.children("."+p.params.slideClass+":not(."+p.params.slideDuplicateClass+')[data-swiper-slide-index="'+i.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicatePrevClass):p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+i.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicatePrevClass)),p.paginationContainer&&p.paginationContainer.length>0){var r,n=p.params.loop?Math.ceil((p.slides.length-2*p.loopedSlides)/p.params.slidesPerGroup):p.snapGrid.length;if(p.params.loop?((r=Math.ceil((p.activeIndex-p.loopedSlides)/p.params.slidesPerGroup))>p.slides.length-1-2*p.loopedSlides&&(r-=p.slides.length-2*p.loopedSlides),r>n-1&&(r-=n),r<0&&"bullets"!==p.params.paginationType&&(r=n+r)):r=void 0!==p.snapIndex?p.snapIndex:p.activeIndex||0,"bullets"===p.params.paginationType&&p.bullets&&p.bullets.length>0&&(p.bullets.removeClass(p.params.bulletActiveClass),p.paginationContainer.length>1?p.bullets.each(function(){e(this).index()===r&&e(this).addClass(p.params.bulletActiveClass)}):p.bullets.eq(r).addClass(p.params.bulletActiveClass)),"fraction"===p.params.paginationType&&(p.paginationContainer.find("."+p.params.paginationCurrentClass).text(r+1),p.paginationContainer.find("."+p.params.paginationTotalClass).text(n)),"progress"===p.params.paginationType){var s=(r+1)/n,l=s,d=1;p.isHorizontal()||(d=s,l=1),p.paginationContainer.find("."+p.params.paginationProgressbarClass).transform("translate3d(0,0,0) scaleX("+l+") scaleY("+d+")").transition(p.params.speed)}"custom"===p.params.paginationType&&p.params.paginationCustomRender&&(p.paginationContainer.html(p.params.paginationCustomRender(p,r+1,n)),p.emit("onPaginationRendered",p,p.paginationContainer[0]))}p.params.loop||(p.params.prevButton&&p.prevButton&&p.prevButton.length>0&&(p.isBeginning?(p.prevButton.addClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.disable(p.prevButton)):(p.prevButton.removeClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.enable(p.prevButton))),p.params.nextButton&&p.nextButton&&p.nextButton.length>0&&(p.isEnd?(p.nextButton.addClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.disable(p.nextButton)):(p.nextButton.removeClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.enable(p.nextButton))))},p.updatePagination=function(){if(p.params.pagination&&p.paginationContainer&&p.paginationContainer.length>0){var e="";if("bullets"===p.params.paginationType){for(var t=p.params.loop?Math.ceil((p.slides.length-2*p.loopedSlides)/p.params.slidesPerGroup):p.snapGrid.length,a=0;a<t;a++)p.params.paginationBulletRender?e+=p.params.paginationBulletRender(p,a,p.params.bulletClass):e+="<"+p.params.paginationElement+' class="'+p.params.bulletClass+'"></'+p.params.paginationElement+">";p.paginationContainer.html(e),p.bullets=p.paginationContainer.find("."+p.params.bulletClass),p.params.paginationClickable&&p.params.a11y&&p.a11y&&p.a11y.initPagination()}"fraction"===p.params.paginationType&&(e=p.params.paginationFractionRender?p.params.paginationFractionRender(p,p.params.paginationCurrentClass,p.params.paginationTotalClass):'<span class="'+p.params.paginationCurrentClass+'"></span> / <span class="'+p.params.paginationTotalClass+'"></span>',p.paginationContainer.html(e)),"progress"===p.params.paginationType&&(e=p.params.paginationProgressRender?p.params.paginationProgressRender(p,p.params.paginationProgressbarClass):'<span class="'+p.params.paginationProgressbarClass+'"></span>',p.paginationContainer.html(e)),"custom"!==p.params.paginationType&&p.emit("onPaginationRendered",p,p.paginationContainer[0])}},p.update=function(e){var t;p&&(p.updateContainerSize(),p.updateSlidesSize(),p.updateProgress(),p.updatePagination(),p.updateClasses(),p.params.scrollbar&&p.scrollbar&&p.scrollbar.set(),e?(p.controller&&p.controller.spline&&(p.controller.spline=void 0),p.params.freeMode?(a(),p.params.autoHeight&&p.updateAutoHeight()):(("auto"===p.params.slidesPerView||p.params.slidesPerView>1)&&p.isEnd&&!p.params.centeredSlides?p.slideTo(p.slides.length-1,0,!1,!0):p.slideTo(p.activeIndex,0,!1,!0))||a()):p.params.autoHeight&&p.updateAutoHeight());function a(){p.rtl,p.translate;t=Math.min(Math.max(p.translate,p.maxTranslate()),p.minTranslate()),p.setWrapperTranslate(t),p.updateActiveIndex(),p.updateClasses()}},p.onResize=function(e){p.params.onBeforeResize&&p.params.onBeforeResize(p),p.params.breakpoints&&p.setBreakpoint();var t=p.params.allowSwipeToPrev,a=p.params.allowSwipeToNext;p.params.allowSwipeToPrev=p.params.allowSwipeToNext=!0,p.updateContainerSize(),p.updateSlidesSize(),("auto"===p.params.slidesPerView||p.params.freeMode||e)&&p.updatePagination(),p.params.scrollbar&&p.scrollbar&&p.scrollbar.set(),p.controller&&p.controller.spline&&(p.controller.spline=void 0);var o=!1;if(p.params.freeMode){var i=Math.min(Math.max(p.translate,p.maxTranslate()),p.minTranslate());p.setWrapperTranslate(i),p.updateActiveIndex(),p.updateClasses(),p.params.autoHeight&&p.updateAutoHeight()}else p.updateClasses(),o=("auto"===p.params.slidesPerView||p.params.slidesPerView>1)&&p.isEnd&&!p.params.centeredSlides?p.slideTo(p.slides.length-1,0,!1,!0):p.slideTo(p.activeIndex,0,!1,!0);p.params.lazyLoading&&!o&&p.lazy&&p.lazy.load(),p.params.allowSwipeToPrev=t,p.params.allowSwipeToNext=a,p.params.onAfterResize&&p.params.onAfterResize(p)},p.touchEventsDesktop={start:"mousedown",move:"mousemove",end:"mouseup"},window.navigator.pointerEnabled?p.touchEventsDesktop={start:"pointerdown",move:"pointermove",end:"pointerup"}:window.navigator.msPointerEnabled&&(p.touchEventsDesktop={start:"MSPointerDown",move:"MSPointerMove",end:"MSPointerUp"}),p.touchEvents={start:p.support.touch||!p.params.simulateTouch?"touchstart":p.touchEventsDesktop.start,move:p.support.touch||!p.params.simulateTouch?"touchmove":p.touchEventsDesktop.move,end:p.support.touch||!p.params.simulateTouch?"touchend":p.touchEventsDesktop.end},(window.navigator.pointerEnabled||window.navigator.msPointerEnabled)&&("container"===p.params.touchEventsTarget?p.container:p.wrapper).addClass("swiper-wp8-"+p.params.direction),p.initEvents=function(e){var t=e?"off":"on",o=e?"removeEventListener":"addEventListener",i="container"===p.params.touchEventsTarget?p.container[0]:p.wrapper[0],r=p.support.touch?i:document,n=!!p.params.nested;if(p.browser.ie)i[o](p.touchEvents.start,p.onTouchStart,!1),r[o](p.touchEvents.move,p.onTouchMove,n),r[o](p.touchEvents.end,p.onTouchEnd,!1);else{if(p.support.touch){var s=!("touchstart"!==p.touchEvents.start||!p.support.passiveListener||!p.params.passiveListeners)&&{passive:!0,capture:!1};i[o](p.touchEvents.start,p.onTouchStart,s),i[o](p.touchEvents.move,p.onTouchMove,n),i[o](p.touchEvents.end,p.onTouchEnd,s)}(a.simulateTouch&&!p.device.ios&&!p.device.android||a.simulateTouch&&!p.support.touch&&p.device.ios)&&(i[o]("mousedown",p.onTouchStart,!1),document[o]("mousemove",p.onTouchMove,n),document[o]("mouseup",p.onTouchEnd,!1))}window[o]("resize",p.onResize),p.params.nextButton&&p.nextButton&&p.nextButton.length>0&&(p.nextButton[t]("click",p.onClickNext),p.params.a11y&&p.a11y&&p.nextButton[t]("keydown",p.a11y.onEnterKey)),p.params.prevButton&&p.prevButton&&p.prevButton.length>0&&(p.prevButton[t]("click",p.onClickPrev),p.params.a11y&&p.a11y&&p.prevButton[t]("keydown",p.a11y.onEnterKey)),p.params.pagination&&p.params.paginationClickable&&(p.paginationContainer[t]("click","."+p.params.bulletClass,p.onClickIndex),p.params.a11y&&p.a11y&&p.paginationContainer[t]("keydown","."+p.params.bulletClass,p.a11y.onEnterKey)),(p.params.preventClicks||p.params.preventClicksPropagation)&&i[o]("click",p.preventClicks,!0)},p.attachEvents=function(){p.initEvents()},p.detachEvents=function(){p.initEvents(!0)},p.allowClick=!0,p.preventClicks=function(e){p.allowClick||(p.params.preventClicks&&e.preventDefault(),p.params.preventClicksPropagation&&p.animating&&(e.stopPropagation(),e.stopImmediatePropagation()))},p.onClickNext=function(e){e.preventDefault(),p.isEnd&&!p.params.loop||p.slideNext()},p.onClickPrev=function(e){e.preventDefault(),p.isBeginning&&!p.params.loop||p.slidePrev()},p.onClickIndex=function(t){t.preventDefault();var a=e(this).index()*p.params.slidesPerGroup;p.params.loop&&(a+=p.loopedSlides),p.slideTo(a)},p.updateClickedSlide=function(t){var a=B(t,"."+p.params.slideClass),o=!1;if(a)for(var i=0;i<p.slides.length;i++)p.slides[i]===a&&(o=!0);if(!a||!o)return p.clickedSlide=void 0,void(p.clickedIndex=void 0);if(p.clickedSlide=a,p.clickedIndex=e(a).index(),p.params.slideToClickedSlide&&void 0!==p.clickedIndex&&p.clickedIndex!==p.activeIndex){var r,n=p.clickedIndex,s="auto"===p.params.slidesPerView?p.currentSlidesPerView():p.params.slidesPerView;if(p.params.loop){if(p.animating)return;r=parseInt(e(p.clickedSlide).attr("data-swiper-slide-index"),10),p.params.centeredSlides?n<p.loopedSlides-s/2||n>p.slides.length-p.loopedSlides+s/2?(p.fixLoop(),n=p.wrapper.children("."+p.params.slideClass+'[data-swiper-slide-index="'+r+'"]:not(.'+p.params.slideDuplicateClass+")").eq(0).index(),setTimeout(function(){p.slideTo(n)},0)):p.slideTo(n):n>p.slides.length-s?(p.fixLoop(),n=p.wrapper.children("."+p.params.slideClass+'[data-swiper-slide-index="'+r+'"]:not(.'+p.params.slideDuplicateClass+")").eq(0).index(),setTimeout(function(){p.slideTo(n)},0)):p.slideTo(n)}else p.slideTo(n)}};var m,h,g,b,v,x,w,y,C,k,S,T,_="input, select, textarea, button, video",z=Date.now(),E=[];for(var M in p.animating=!1,p.touches={startX:0,startY:0,currentX:0,currentY:0,diff:0},p.onTouchStart=function(t){if(t.originalEvent&&(t=t.originalEvent),(S="touchstart"===t.type)||!("which"in t)||3!==t.which)if(p.params.noSwiping&&B(t,"."+p.params.noSwipingClass))p.allowClick=!0;else if(!p.params.swipeHandler||B(t,p.params.swipeHandler)){var a=p.touches.currentX="touchstart"===t.type?t.targetTouches[0].pageX:t.pageX,o=p.touches.currentY="touchstart"===t.type?t.targetTouches[0].pageY:t.pageY;if(!(p.device.ios&&p.params.iOSEdgeSwipeDetection&&a<=p.params.iOSEdgeSwipeThreshold)){if(m=!0,h=!1,g=!0,v=void 0,T=void 0,p.touches.startX=a,p.touches.startY=o,b=Date.now(),p.allowClick=!0,p.updateContainerSize(),p.swipeDirection=void 0,p.params.threshold>0&&(y=!1),"touchstart"!==t.type){var i=!0;e(t.target).is(_)&&(i=!1),document.activeElement&&e(document.activeElement).is(_)&&document.activeElement.blur(),i&&t.preventDefault()}p.emit("onTouchStart",p,t)}}},p.onTouchMove=function(t){if(t.originalEvent&&(t=t.originalEvent),!S||"mousemove"!==t.type){if(t.preventedByNestedSwiper)return p.touches.startX="touchmove"===t.type?t.targetTouches[0].pageX:t.pageX,void(p.touches.startY="touchmove"===t.type?t.targetTouches[0].pageY:t.pageY);if(p.params.onlyExternal)return p.allowClick=!1,void(m&&(p.touches.startX=p.touches.currentX="touchmove"===t.type?t.targetTouches[0].pageX:t.pageX,p.touches.startY=p.touches.currentY="touchmove"===t.type?t.targetTouches[0].pageY:t.pageY,b=Date.now()));if(S&&p.params.touchReleaseOnEdges&&!p.params.loop)if(p.isHorizontal()){if(p.touches.currentX<p.touches.startX&&p.translate<=p.maxTranslate()||p.touches.currentX>p.touches.startX&&p.translate>=p.minTranslate())return}else if(p.touches.currentY<p.touches.startY&&p.translate<=p.maxTranslate()||p.touches.currentY>p.touches.startY&&p.translate>=p.minTranslate())return;if(S&&document.activeElement&&t.target===document.activeElement&&e(t.target).is(_))return h=!0,void(p.allowClick=!1);if(g&&p.emit("onTouchMove",p,t),!(t.targetTouches&&t.targetTouches.length>1)){var o;if(p.touches.currentX="touchmove"===t.type?t.targetTouches[0].pageX:t.pageX,p.touches.currentY="touchmove"===t.type?t.targetTouches[0].pageY:t.pageY,void 0===v)p.isHorizontal()&&p.touches.currentY===p.touches.startY||!p.isHorizontal()&&p.touches.currentX===p.touches.startX?v=!1:(o=180*Math.atan2(Math.abs(p.touches.currentY-p.touches.startY),Math.abs(p.touches.currentX-p.touches.startX))/Math.PI,v=p.isHorizontal()?o>p.params.touchAngle:90-o>p.params.touchAngle);if(v&&p.emit("onTouchMoveOpposite",p,t),void 0===T&&(p.touches.currentX===p.touches.startX&&p.touches.currentY===p.touches.startY||(T=!0)),m)if(v)m=!1;else if(T){p.allowClick=!1,p.emit("onSliderMove",p,t),t.preventDefault(),p.params.touchMoveStopPropagation&&!p.params.nested&&t.stopPropagation(),h||(a.loop&&p.fixLoop(),w=p.getWrapperTranslate(),p.setWrapperTransition(0),p.animating&&p.wrapper.trigger("webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd msTransitionEnd"),p.params.autoplay&&p.autoplaying&&(p.params.autoplayDisableOnInteraction?p.stopAutoplay():p.pauseAutoplay()),k=!1,!p.params.grabCursor||!0!==p.params.allowSwipeToNext&&!0!==p.params.allowSwipeToPrev||p.setGrabCursor(!0)),h=!0;var i=p.touches.diff=p.isHorizontal()?p.touches.currentX-p.touches.startX:p.touches.currentY-p.touches.startY;i*=p.params.touchRatio,p.rtl&&(i=-i),p.swipeDirection=i>0?"prev":"next",x=i+w;var r=!0;if(i>0&&x>p.minTranslate()?(r=!1,p.params.resistance&&(x=p.minTranslate()-1+Math.pow(-p.minTranslate()+w+i,p.params.resistanceRatio))):i<0&&x<p.maxTranslate()&&(r=!1,p.params.resistance&&(x=p.maxTranslate()+1-Math.pow(p.maxTranslate()-w-i,p.params.resistanceRatio))),r&&(t.preventedByNestedSwiper=!0),!p.params.allowSwipeToNext&&"next"===p.swipeDirection&&x<w&&(x=w),!p.params.allowSwipeToPrev&&"prev"===p.swipeDirection&&x>w&&(x=w),p.params.threshold>0){if(!(Math.abs(i)>p.params.threshold||y))return void(x=w);if(!y)return y=!0,p.touches.startX=p.touches.currentX,p.touches.startY=p.touches.currentY,x=w,void(p.touches.diff=p.isHorizontal()?p.touches.currentX-p.touches.startX:p.touches.currentY-p.touches.startY)}p.params.followFinger&&((p.params.freeMode||p.params.watchSlidesProgress)&&p.updateActiveIndex(),p.params.freeMode&&(0===E.length&&E.push({position:p.touches[p.isHorizontal()?"startX":"startY"],time:b}),E.push({position:p.touches[p.isHorizontal()?"currentX":"currentY"],time:(new window.Date).getTime()})),p.updateProgress(x),p.setWrapperTranslate(x))}}}},p.onTouchEnd=function(t){if(t.originalEvent&&(t=t.originalEvent),g&&p.emit("onTouchEnd",p,t),g=!1,m){p.params.grabCursor&&h&&m&&(!0===p.params.allowSwipeToNext||!0===p.params.allowSwipeToPrev)&&p.setGrabCursor(!1);var a,o=Date.now(),i=o-b;if(p.allowClick&&(p.updateClickedSlide(t),p.emit("onTap",p,t),i<300&&o-z>300&&(C&&clearTimeout(C),C=setTimeout(function(){p&&(p.params.paginationHide&&p.paginationContainer.length>0&&!e(t.target).hasClass(p.params.bulletClass)&&p.paginationContainer.toggleClass(p.params.paginationHiddenClass),p.emit("onClick",p,t))},300)),i<300&&o-z<300&&(C&&clearTimeout(C),p.emit("onDoubleTap",p,t))),z=Date.now(),setTimeout(function(){p&&(p.allowClick=!0)},0),m&&h&&p.swipeDirection&&0!==p.touches.diff&&x!==w)if(m=h=!1,a=p.params.followFinger?p.rtl?p.translate:-p.translate:-x,p.params.freeMode){if(a<-p.minTranslate())return void p.slideTo(p.activeIndex);if(a>-p.maxTranslate())return void(p.slides.length<p.snapGrid.length?p.slideTo(p.snapGrid.length-1):p.slideTo(p.slides.length-1));if(p.params.freeModeMomentum){if(E.length>1){var r=E.pop(),n=E.pop(),s=r.position-n.position,l=r.time-n.time;p.velocity=s/l,p.velocity=p.velocity/2,Math.abs(p.velocity)<p.params.freeModeMinimumVelocity&&(p.velocity=0),(l>150||(new window.Date).getTime()-r.time>300)&&(p.velocity=0)}else p.velocity=0;p.velocity=p.velocity*p.params.freeModeMomentumVelocityRatio,E.length=0;var d=1e3*p.params.freeModeMomentumRatio,c=p.velocity*d,u=p.translate+c;p.rtl&&(u=-u);var f,v=!1,y=20*Math.abs(p.velocity)*p.params.freeModeMomentumBounceRatio;if(u<p.maxTranslate())p.params.freeModeMomentumBounce?(u+p.maxTranslate()<-y&&(u=p.maxTranslate()-y),f=p.maxTranslate(),v=!0,k=!0):u=p.maxTranslate();else if(u>p.minTranslate())p.params.freeModeMomentumBounce?(u-p.minTranslate()>y&&(u=p.minTranslate()+y),f=p.minTranslate(),v=!0,k=!0):u=p.minTranslate();else if(p.params.freeModeSticky){var S,T=0;for(T=0;T<p.snapGrid.length;T+=1)if(p.snapGrid[T]>-u){S=T;break}u=Math.abs(p.snapGrid[S]-u)<Math.abs(p.snapGrid[S-1]-u)||"next"===p.swipeDirection?p.snapGrid[S]:p.snapGrid[S-1],p.rtl||(u=-u)}if(0!==p.velocity)d=p.rtl?Math.abs((-u-p.translate)/p.velocity):Math.abs((u-p.translate)/p.velocity);else if(p.params.freeModeSticky)return void p.slideReset();p.params.freeModeMomentumBounce&&v?(p.updateProgress(f),p.setWrapperTransition(d),p.setWrapperTranslate(u),p.onTransitionStart(),p.animating=!0,p.wrapper.transitionEnd(function(){p&&k&&(p.emit("onMomentumBounce",p),p.setWrapperTransition(p.params.speed),p.setWrapperTranslate(f),p.wrapper.transitionEnd(function(){p&&p.onTransitionEnd()}))})):p.velocity?(p.updateProgress(u),p.setWrapperTransition(d),p.setWrapperTranslate(u),p.onTransitionStart(),p.animating||(p.animating=!0,p.wrapper.transitionEnd(function(){p&&p.onTransitionEnd()}))):p.updateProgress(u),p.updateActiveIndex()}(!p.params.freeModeMomentum||i>=p.params.longSwipesMs)&&(p.updateProgress(),p.updateActiveIndex())}else{var _,M=0,P=p.slidesSizesGrid[0];for(_=0;_<p.slidesGrid.length;_+=p.params.slidesPerGroup)void 0!==p.slidesGrid[_+p.params.slidesPerGroup]?a>=p.slidesGrid[_]&&a<p.slidesGrid[_+p.params.slidesPerGroup]&&(M=_,P=p.slidesGrid[_+p.params.slidesPerGroup]-p.slidesGrid[_]):a>=p.slidesGrid[_]&&(M=_,P=p.slidesGrid[p.slidesGrid.length-1]-p.slidesGrid[p.slidesGrid.length-2]);var I=(a-p.slidesGrid[M])/P;if(i>p.params.longSwipesMs){if(!p.params.longSwipes)return void p.slideTo(p.activeIndex);"next"===p.swipeDirection&&(I>=p.params.longSwipesRatio?p.slideTo(M+p.params.slidesPerGroup):p.slideTo(M)),"prev"===p.swipeDirection&&(I>1-p.params.longSwipesRatio?p.slideTo(M+p.params.slidesPerGroup):p.slideTo(M))}else{if(!p.params.shortSwipes)return void p.slideTo(p.activeIndex);"next"===p.swipeDirection&&p.slideTo(M+p.params.slidesPerGroup),"prev"===p.swipeDirection&&p.slideTo(M)}}else m=h=!1}},p._slideTo=function(e,t){return p.slideTo(e,t,!0,!0)},p.slideTo=function(e,t,a,o){void 0===a&&(a=!0),void 0===e&&(e=0),e<0&&(e=0),p.snapIndex=Math.floor(e/p.params.slidesPerGroup),p.snapIndex>=p.snapGrid.length&&(p.snapIndex=p.snapGrid.length-1);var i=-p.snapGrid[p.snapIndex];if(p.params.autoplay&&p.autoplaying&&(o||!p.params.autoplayDisableOnInteraction?p.pauseAutoplay(t):p.stopAutoplay()),p.updateProgress(i),p.params.normalizeSlideIndex)for(var r=0;r<p.slidesGrid.length;r++)-Math.floor(100*i)>=Math.floor(100*p.slidesGrid[r])&&(e=r);return!(!p.params.allowSwipeToNext&&i<p.translate&&i<p.minTranslate())&&(!(!p.params.allowSwipeToPrev&&i>p.translate&&i>p.maxTranslate()&&(p.activeIndex||0)!==e)&&(void 0===t&&(t=p.params.speed),p.previousIndex=p.activeIndex||0,p.activeIndex=e,p.updateRealIndex(),p.rtl&&-i===p.translate||!p.rtl&&i===p.translate?(p.params.autoHeight&&p.updateAutoHeight(),p.updateClasses(),"slide"!==p.params.effect&&p.setWrapperTranslate(i),!1):(p.updateClasses(),p.onTransitionStart(a),0===t||p.browser.lteIE9?(p.setWrapperTranslate(i),p.setWrapperTransition(0),p.onTransitionEnd(a)):(p.setWrapperTranslate(i),p.setWrapperTransition(t),p.animating||(p.animating=!0,p.wrapper.transitionEnd(function(){p&&p.onTransitionEnd(a)}))),!0)))},p.onTransitionStart=function(e){void 0===e&&(e=!0),p.params.autoHeight&&p.updateAutoHeight(),p.lazy&&p.lazy.onTransitionStart(),e&&(p.emit("onTransitionStart",p),p.activeIndex!==p.previousIndex&&(p.emit("onSlideChangeStart",p),p.activeIndex>p.previousIndex?p.emit("onSlideNextStart",p):p.emit("onSlidePrevStart",p)))},p.onTransitionEnd=function(e){p.animating=!1,p.setWrapperTransition(0),void 0===e&&(e=!0),p.lazy&&p.lazy.onTransitionEnd(),e&&(p.emit("onTransitionEnd",p),p.activeIndex!==p.previousIndex&&(p.emit("onSlideChangeEnd",p),p.activeIndex>p.previousIndex?p.emit("onSlideNextEnd",p):p.emit("onSlidePrevEnd",p))),p.params.history&&p.history&&p.history.setHistory(p.params.history,p.activeIndex),p.params.hashnav&&p.hashnav&&p.hashnav.setHash()},p.slideNext=function(e,t,a){if(p.params.loop){if(p.animating)return!1;p.fixLoop();p.container[0].clientLeft;return p.slideTo(p.activeIndex+p.params.slidesPerGroup,t,e,a)}return p.slideTo(p.activeIndex+p.params.slidesPerGroup,t,e,a)},p._slideNext=function(e){return p.slideNext(!0,e,!0)},p.slidePrev=function(e,t,a){if(p.params.loop){if(p.animating)return!1;p.fixLoop();p.container[0].clientLeft;return p.slideTo(p.activeIndex-1,t,e,a)}return p.slideTo(p.activeIndex-1,t,e,a)},p._slidePrev=function(e){return p.slidePrev(!0,e,!0)},p.slideReset=function(e,t,a){return p.slideTo(p.activeIndex,t,e)},p.disableTouchControl=function(){return p.params.onlyExternal=!0,!0},p.enableTouchControl=function(){return p.params.onlyExternal=!1,!0},p.setWrapperTransition=function(e,t){p.wrapper.transition(e),"slide"!==p.params.effect&&p.effects[p.params.effect]&&p.effects[p.params.effect].setTransition(e),p.params.parallax&&p.parallax&&p.parallax.setTransition(e),p.params.scrollbar&&p.scrollbar&&p.scrollbar.setTransition(e),p.params.control&&p.controller&&p.controller.setTransition(e,t),p.emit("onSetTransition",p,e)},p.setWrapperTranslate=function(e,t,a){var o=0,i=0;p.isHorizontal()?o=p.rtl?-e:e:i=e,p.params.roundLengths&&(o=I(o),i=I(i)),p.params.virtualTranslate||(p.support.transforms3d?p.wrapper.transform("translate3d("+o+"px, "+i+"px, 0px)"):p.wrapper.transform("translate("+o+"px, "+i+"px)")),p.translate=p.isHorizontal()?o:i;var r=p.maxTranslate()-p.minTranslate();(0===r?0:(e-p.minTranslate())/r)!==p.progress&&p.updateProgress(e),t&&p.updateActiveIndex(),"slide"!==p.params.effect&&p.effects[p.params.effect]&&p.effects[p.params.effect].setTranslate(p.translate),p.params.parallax&&p.parallax&&p.parallax.setTranslate(p.translate),p.params.scrollbar&&p.scrollbar&&p.scrollbar.setTranslate(p.translate),p.params.control&&p.controller&&p.controller.setTranslate(p.translate,a),p.emit("onSetTranslate",p,p.translate)},p.getTranslate=function(e,t){var a,o,i,r;return void 0===t&&(t="x"),p.params.virtualTranslate?p.rtl?-p.translate:p.translate:(i=window.getComputedStyle(e,null),window.WebKitCSSMatrix?((o=i.transform||i.webkitTransform).split(",").length>6&&(o=o.split(", ").map(function(e){return e.replace(",",".")}).join(", ")),r=new window.WebKitCSSMatrix("none"===o?"":o)):a=(r=i.MozTransform||i.OTransform||i.MsTransform||i.msTransform||i.transform||i.getPropertyValue("transform").replace("translate(","matrix(1, 0, 0, 1,")).toString().split(","),"x"===t&&(o=window.WebKitCSSMatrix?r.m41:16===a.length?parseFloat(a[12]):parseFloat(a[4])),"y"===t&&(o=window.WebKitCSSMatrix?r.m42:16===a.length?parseFloat(a[13]):parseFloat(a[5])),p.rtl&&o&&(o=-o),o||0)},p.getWrapperTranslate=function(e){return void 0===e&&(e=p.isHorizontal()?"x":"y"),p.getTranslate(p.wrapper[0],e)},p.observers=[],p.initObservers=function(){if(p.params.observeParents)for(var e=p.container.parents(),t=0;t<e.length;t++)D(e[t]);D(p.container[0],{childList:!1}),D(p.wrapper[0],{attributes:!1})},p.disconnectObservers=function(){for(var e=0;e<p.observers.length;e++)p.observers[e].disconnect();p.observers=[]},p.createLoop=function(){p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass).remove();var t=p.wrapper.children("."+p.params.slideClass);"auto"!==p.params.slidesPerView||p.params.loopedSlides||(p.params.loopedSlides=t.length),p.loopedSlides=parseInt(p.params.loopedSlides||p.params.slidesPerView,10),p.loopedSlides=p.loopedSlides+p.params.loopAdditionalSlides,p.loopedSlides>t.length&&(p.loopedSlides=t.length);var a,o=[],i=[];for(t.each(function(a,r){var n=e(this);a<p.loopedSlides&&i.push(r),a<t.length&&a>=t.length-p.loopedSlides&&o.push(r),n.attr("data-swiper-slide-index",a)}),a=0;a<i.length;a++)p.wrapper.append(e(i[a].cloneNode(!0)).addClass(p.params.slideDuplicateClass));for(a=o.length-1;a>=0;a--)p.wrapper.prepend(e(o[a].cloneNode(!0)).addClass(p.params.slideDuplicateClass))},p.destroyLoop=function(){p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass).remove(),p.slides.removeAttr("data-swiper-slide-index")},p.reLoop=function(e){var t=p.activeIndex-p.loopedSlides;p.destroyLoop(),p.createLoop(),p.updateSlidesSize(),e&&p.slideTo(t+p.loopedSlides,0,!1)},p.fixLoop=function(){var e;p.activeIndex<p.loopedSlides?(e=p.slides.length-3*p.loopedSlides+p.activeIndex,e+=p.loopedSlides,p.slideTo(e,0,!1,!0)):("auto"===p.params.slidesPerView&&p.activeIndex>=2*p.loopedSlides||p.activeIndex>p.slides.length-2*p.params.slidesPerView)&&(e=-p.slides.length+p.activeIndex+p.loopedSlides,e+=p.loopedSlides,p.slideTo(e,0,!1,!0))},p.appendSlide=function(e){if(p.params.loop&&p.destroyLoop(),"object"==typeof e&&e.length)for(var t=0;t<e.length;t++)e[t]&&p.wrapper.append(e[t]);else p.wrapper.append(e);p.params.loop&&p.createLoop(),p.params.observer&&p.support.observer||p.update(!0)},p.prependSlide=function(e){p.params.loop&&p.destroyLoop();var t=p.activeIndex+1;if("object"==typeof e&&e.length){for(var a=0;a<e.length;a++)e[a]&&p.wrapper.prepend(e[a]);t=p.activeIndex+e.length}else p.wrapper.prepend(e);p.params.loop&&p.createLoop(),p.params.observer&&p.support.observer||p.update(!0),p.slideTo(t,0,!1)},p.removeSlide=function(e){p.params.loop&&(p.destroyLoop(),p.slides=p.wrapper.children("."+p.params.slideClass));var t,a=p.activeIndex;if("object"==typeof e&&e.length){for(var o=0;o<e.length;o++)t=e[o],p.slides[t]&&p.slides.eq(t).remove(),t<a&&a--;a=Math.max(a,0)}else t=e,p.slides[t]&&p.slides.eq(t).remove(),t<a&&a--,a=Math.max(a,0);p.params.loop&&p.createLoop(),p.params.observer&&p.support.observer||p.update(!0),p.params.loop?p.slideTo(a+p.loopedSlides,0,!1):p.slideTo(a,0,!1)},p.removeAllSlides=function(){for(var e=[],t=0;t<p.slides.length;t++)e.push(t);p.removeSlide(e)},p.effects={fade:{setTranslate:function(){for(var e=0;e<p.slides.length;e++){var t=p.slides.eq(e),a=-t[0].swiperSlideOffset;p.params.virtualTranslate||(a-=p.translate);var o=0;p.isHorizontal()||(o=a,a=0);var i=p.params.fade.crossFade?Math.max(1-Math.abs(t[0].progress),0):1+Math.min(Math.max(t[0].progress,-1),0);t.css({opacity:i}).transform("translate3d("+a+"px, "+o+"px, 0px)")}},setTransition:function(e){if(p.slides.transition(e),p.params.virtualTranslate&&0!==e){var t=!1;p.slides.transitionEnd(function(){if(!t&&p){t=!0,p.animating=!1;for(var e=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],a=0;a<e.length;a++)p.wrapper.trigger(e[a])}})}}},flip:{setTranslate:function(){for(var t=0;t<p.slides.length;t++){var a=p.slides.eq(t),o=a[0].progress;p.params.flip.limitRotation&&(o=Math.max(Math.min(a[0].progress,1),-1));var i=-180*o,r=0,n=-a[0].swiperSlideOffset,s=0;if(p.isHorizontal()?p.rtl&&(i=-i):(s=n,n=0,r=-i,i=0),a[0].style.zIndex=-Math.abs(Math.round(o))+p.slides.length,p.params.flip.slideShadows){var l=p.isHorizontal()?a.find(".swiper-slide-shadow-left"):a.find(".swiper-slide-shadow-top"),d=p.isHorizontal()?a.find(".swiper-slide-shadow-right"):a.find(".swiper-slide-shadow-bottom");0===l.length&&(l=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"left":"top")+'"></div>'),a.append(l)),0===d.length&&(d=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"right":"bottom")+'"></div>'),a.append(d)),l.length&&(l[0].style.opacity=Math.max(-o,0)),d.length&&(d[0].style.opacity=Math.max(o,0))}a.transform("translate3d("+n+"px, "+s+"px, 0px) rotateX("+r+"deg) rotateY("+i+"deg)")}},setTransition:function(t){if(p.slides.transition(t).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(t),p.params.virtualTranslate&&0!==t){var a=!1;p.slides.eq(p.activeIndex).transitionEnd(function(){if(!a&&p&&e(this).hasClass(p.params.slideActiveClass)){a=!0,p.animating=!1;for(var t=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],o=0;o<t.length;o++)p.wrapper.trigger(t[o])}})}}},cube:{setTranslate:function(){var t,a=0;p.params.cube.shadow&&(p.isHorizontal()?(0===(t=p.wrapper.find(".swiper-cube-shadow")).length&&(t=e('<div class="swiper-cube-shadow"></div>'),p.wrapper.append(t)),t.css({height:p.width+"px"})):0===(t=p.container.find(".swiper-cube-shadow")).length&&(t=e('<div class="swiper-cube-shadow"></div>'),p.container.append(t)));for(var o=0;o<p.slides.length;o++){var i=p.slides.eq(o),r=90*o,n=Math.floor(r/360);p.rtl&&(r=-r,n=Math.floor(-r/360));var s=Math.max(Math.min(i[0].progress,1),-1),l=0,d=0,c=0;o%4==0?(l=4*-n*p.size,c=0):(o-1)%4==0?(l=0,c=4*-n*p.size):(o-2)%4==0?(l=p.size+4*n*p.size,c=p.size):(o-3)%4==0&&(l=-p.size,c=3*p.size+4*p.size*n),p.rtl&&(l=-l),p.isHorizontal()||(d=l,l=0);var u="rotateX("+(p.isHorizontal()?0:-r)+"deg) rotateY("+(p.isHorizontal()?r:0)+"deg) translate3d("+l+"px, "+d+"px, "+c+"px)";if(s<=1&&s>-1&&(a=90*o+90*s,p.rtl&&(a=90*-o-90*s)),i.transform(u),p.params.cube.slideShadows){var f=p.isHorizontal()?i.find(".swiper-slide-shadow-left"):i.find(".swiper-slide-shadow-top"),m=p.isHorizontal()?i.find(".swiper-slide-shadow-right"):i.find(".swiper-slide-shadow-bottom");0===f.length&&(f=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"left":"top")+'"></div>'),i.append(f)),0===m.length&&(m=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"right":"bottom")+'"></div>'),i.append(m)),f.length&&(f[0].style.opacity=Math.max(-s,0)),m.length&&(m[0].style.opacity=Math.max(s,0))}}if(p.wrapper.css({"-webkit-transform-origin":"50% 50% -"+p.size/2+"px","-moz-transform-origin":"50% 50% -"+p.size/2+"px","-ms-transform-origin":"50% 50% -"+p.size/2+"px","transform-origin":"50% 50% -"+p.size/2+"px"}),p.params.cube.shadow)if(p.isHorizontal())t.transform("translate3d(0px, "+(p.width/2+p.params.cube.shadowOffset)+"px, "+-p.width/2+"px) rotateX(90deg) rotateZ(0deg) scale("+p.params.cube.shadowScale+")");else{var h=Math.abs(a)-90*Math.floor(Math.abs(a)/90),g=1.5-(Math.sin(2*h*Math.PI/360)/2+Math.cos(2*h*Math.PI/360)/2),b=p.params.cube.shadowScale,v=p.params.cube.shadowScale/g,x=p.params.cube.shadowOffset;t.transform("scale3d("+b+", 1, "+v+") translate3d(0px, "+(p.height/2+x)+"px, "+-p.height/2/v+"px) rotateX(-90deg)")}var w=p.isSafari||p.isUiWebView?-p.size/2:0;p.wrapper.transform("translate3d(0px,0,"+w+"px) rotateX("+(p.isHorizontal()?0:a)+"deg) rotateY("+(p.isHorizontal()?-a:0)+"deg)")},setTransition:function(e){p.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e),p.params.cube.shadow&&!p.isHorizontal()&&p.container.find(".swiper-cube-shadow").transition(e)}},coverflow:{setTranslate:function(){for(var t=p.translate,a=p.isHorizontal()?-t+p.width/2:-t+p.height/2,o=p.isHorizontal()?p.params.coverflow.rotate:-p.params.coverflow.rotate,i=p.params.coverflow.depth,r=0,n=p.slides.length;r<n;r++){var s=p.slides.eq(r),l=p.slidesSizesGrid[r],d=(a-s[0].swiperSlideOffset-l/2)/l*p.params.coverflow.modifier,c=p.isHorizontal()?o*d:0,u=p.isHorizontal()?0:o*d,f=-i*Math.abs(d),m=p.isHorizontal()?0:p.params.coverflow.stretch*d,h=p.isHorizontal()?p.params.coverflow.stretch*d:0;Math.abs(h)<.001&&(h=0),Math.abs(m)<.001&&(m=0),Math.abs(f)<.001&&(f=0),Math.abs(c)<.001&&(c=0),Math.abs(u)<.001&&(u=0);var g="translate3d("+h+"px,"+m+"px,"+f+"px)  rotateX("+u+"deg) rotateY("+c+"deg)";if(s.transform(g),s[0].style.zIndex=1-Math.abs(Math.round(d)),p.params.coverflow.slideShadows){var b=p.isHorizontal()?s.find(".swiper-slide-shadow-left"):s.find(".swiper-slide-shadow-top"),v=p.isHorizontal()?s.find(".swiper-slide-shadow-right"):s.find(".swiper-slide-shadow-bottom");0===b.length&&(b=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"left":"top")+'"></div>'),s.append(b)),0===v.length&&(v=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"right":"bottom")+'"></div>'),s.append(v)),b.length&&(b[0].style.opacity=d>0?d:0),v.length&&(v[0].style.opacity=-d>0?-d:0)}}p.browser.ie&&(p.wrapper[0].style.perspectiveOrigin=a+"px 50%")},setTransition:function(e){p.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e)}}},p.lazy={initialImageLoaded:!1,loadImageInSlide:function(t,a){if(void 0!==t&&(void 0===a&&(a=!0),0!==p.slides.length)){var o=p.slides.eq(t),i=o.find("."+p.params.lazyLoadingClass+":not(."+p.params.lazyStatusLoadedClass+"):not(."+p.params.lazyStatusLoadingClass+")");!o.hasClass(p.params.lazyLoadingClass)||o.hasClass(p.params.lazyStatusLoadedClass)||o.hasClass(p.params.lazyStatusLoadingClass)||(i=i.add(o[0])),0!==i.length&&i.each(function(){var t=e(this);t.addClass(p.params.lazyStatusLoadingClass);var i=t.attr("data-background"),r=t.attr("data-src"),n=t.attr("data-srcset"),s=t.attr("data-sizes");p.loadImage(t[0],r||i,n,s,!1,function(){if(void 0!==p&&null!==p&&p){if(i?(t.css("background-image",'url("'+i+'")'),t.removeAttr("data-background")):(n&&(t.attr("srcset",n),t.removeAttr("data-srcset")),s&&(t.attr("sizes",s),t.removeAttr("data-sizes")),r&&(t.attr("src",r),t.removeAttr("data-src"))),t.addClass(p.params.lazyStatusLoadedClass).removeClass(p.params.lazyStatusLoadingClass),o.find("."+p.params.lazyPreloaderClass+", ."+p.params.preloaderClass).remove(),p.params.loop&&a){var e=o.attr("data-swiper-slide-index");if(o.hasClass(p.params.slideDuplicateClass)){var l=p.wrapper.children('[data-swiper-slide-index="'+e+'"]:not(.'+p.params.slideDuplicateClass+")");p.lazy.loadImageInSlide(l.index(),!1)}else{var d=p.wrapper.children("."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+e+'"]');p.lazy.loadImageInSlide(d.index(),!1)}}p.emit("onLazyImageReady",p,o[0],t[0])}}),p.emit("onLazyImageLoad",p,o[0],t[0])})}},load:function(){var t,a=p.params.slidesPerView;if("auto"===a&&(a=0),p.lazy.initialImageLoaded||(p.lazy.initialImageLoaded=!0),p.params.watchSlidesVisibility)p.wrapper.children("."+p.params.slideVisibleClass).each(function(){p.lazy.loadImageInSlide(e(this).index())});else if(a>1)for(t=p.activeIndex;t<p.activeIndex+a;t++)p.slides[t]&&p.lazy.loadImageInSlide(t);else p.lazy.loadImageInSlide(p.activeIndex);if(p.params.lazyLoadingInPrevNext)if(a>1||p.params.lazyLoadingInPrevNextAmount&&p.params.lazyLoadingInPrevNextAmount>1){var o=p.params.lazyLoadingInPrevNextAmount,i=a,r=Math.min(p.activeIndex+i+Math.max(o,i),p.slides.length),n=Math.max(p.activeIndex-Math.max(i,o),0);for(t=p.activeIndex+a;t<r;t++)p.slides[t]&&p.lazy.loadImageInSlide(t);for(t=n;t<p.activeIndex;t++)p.slides[t]&&p.lazy.loadImageInSlide(t)}else{var s=p.wrapper.children("."+p.params.slideNextClass);s.length>0&&p.lazy.loadImageInSlide(s.index());var l=p.wrapper.children("."+p.params.slidePrevClass);l.length>0&&p.lazy.loadImageInSlide(l.index())}},onTransitionStart:function(){p.params.lazyLoading&&(p.params.lazyLoadingOnTransitionStart||!p.params.lazyLoadingOnTransitionStart&&!p.lazy.initialImageLoaded)&&p.lazy.load()},onTransitionEnd:function(){p.params.lazyLoading&&!p.params.lazyLoadingOnTransitionStart&&p.lazy.load()}},p.scrollbar={isTouched:!1,setDragPosition:function(e){var t=p.scrollbar,a=(p.isHorizontal()?"touchstart"===e.type||"touchmove"===e.type?e.targetTouches[0].pageX:e.pageX||e.clientX:"touchstart"===e.type||"touchmove"===e.type?e.targetTouches[0].pageY:e.pageY||e.clientY)-t.track.offset()[p.isHorizontal()?"left":"top"]-t.dragSize/2,o=-p.minTranslate()*t.moveDivider,i=-p.maxTranslate()*t.moveDivider;a<o?a=o:a>i&&(a=i),a=-a/t.moveDivider,p.updateProgress(a),p.setWrapperTranslate(a,!0)},dragStart:function(e){var t=p.scrollbar;t.isTouched=!0,e.preventDefault(),e.stopPropagation(),t.setDragPosition(e),clearTimeout(t.dragTimeout),t.track.transition(0),p.params.scrollbarHide&&t.track.css("opacity",1),p.wrapper.transition(100),t.drag.transition(100),p.emit("onScrollbarDragStart",p)},dragMove:function(e){var t=p.scrollbar;t.isTouched&&(e.preventDefault?e.preventDefault():e.returnValue=!1,t.setDragPosition(e),p.wrapper.transition(0),t.track.transition(0),t.drag.transition(0),p.emit("onScrollbarDragMove",p))},dragEnd:function(e){var t=p.scrollbar;t.isTouched&&(t.isTouched=!1,p.params.scrollbarHide&&(clearTimeout(t.dragTimeout),t.dragTimeout=setTimeout(function(){t.track.css("opacity",0),t.track.transition(400)},1e3)),p.emit("onScrollbarDragEnd",p),p.params.scrollbarSnapOnRelease&&p.slideReset())},draggableEvents:!1!==p.params.simulateTouch||p.support.touch?p.touchEvents:p.touchEventsDesktop,enableDraggable:function(){var t=p.scrollbar,a=p.support.touch?t.track:document;e(t.track).on(t.draggableEvents.start,t.dragStart),e(a).on(t.draggableEvents.move,t.dragMove),e(a).on(t.draggableEvents.end,t.dragEnd)},disableDraggable:function(){var t=p.scrollbar,a=p.support.touch?t.track:document;e(t.track).off(t.draggableEvents.start,t.dragStart),e(a).off(t.draggableEvents.move,t.dragMove),e(a).off(t.draggableEvents.end,t.dragEnd)},set:function(){if(p.params.scrollbar){var t=p.scrollbar;t.track=e(p.params.scrollbar),p.params.uniqueNavElements&&"string"==typeof p.params.scrollbar&&t.track.length>1&&1===p.container.find(p.params.scrollbar).length&&(t.track=p.container.find(p.params.scrollbar)),t.drag=t.track.find(".swiper-scrollbar-drag"),0===t.drag.length&&(t.drag=e('<div class="swiper-scrollbar-drag"></div>'),t.track.append(t.drag)),t.drag[0].style.width="",t.drag[0].style.height="",t.trackSize=p.isHorizontal()?t.track[0].offsetWidth:t.track[0].offsetHeight,t.divider=p.size/p.virtualSize,t.moveDivider=t.divider*(t.trackSize/p.size),t.dragSize=t.trackSize*t.divider,p.isHorizontal()?t.drag[0].style.width=t.dragSize+"px":t.drag[0].style.height=t.dragSize+"px",t.divider>=1?t.track[0].style.display="none":t.track[0].style.display="",p.params.scrollbarHide&&(t.track[0].style.opacity=0)}},setTranslate:function(){if(p.params.scrollbar){var e,t=p.scrollbar,a=(p.translate,t.dragSize);e=(t.trackSize-t.dragSize)*p.progress,p.rtl&&p.isHorizontal()?(e=-e)>0?(a=t.dragSize-e,e=0):-e+t.dragSize>t.trackSize&&(a=t.trackSize+e):e<0?(a=t.dragSize+e,e=0):e+t.dragSize>t.trackSize&&(a=t.trackSize-e),p.isHorizontal()?(p.support.transforms3d?t.drag.transform("translate3d("+e+"px, 0, 0)"):t.drag.transform("translateX("+e+"px)"),t.drag[0].style.width=a+"px"):(p.support.transforms3d?t.drag.transform("translate3d(0px, "+e+"px, 0)"):t.drag.transform("translateY("+e+"px)"),t.drag[0].style.height=a+"px"),p.params.scrollbarHide&&(clearTimeout(t.timeout),t.track[0].style.opacity=1,t.timeout=setTimeout(function(){t.track[0].style.opacity=0,t.track.transition(400)},1e3))}},setTransition:function(e){p.params.scrollbar&&p.scrollbar.drag.transition(e)}},p.controller={LinearSpline:function(e,t){var a,o,i,r,n,s=function(e,t){for(o=-1,a=e.length;a-o>1;)e[i=a+o>>1]<=t?o=i:a=i;return a};this.x=e,this.y=t,this.lastIndex=e.length-1;this.x.length;this.interpolate=function(e){return e?(n=s(this.x,e),r=n-1,(e-this.x[r])*(this.y[n]-this.y[r])/(this.x[n]-this.x[r])+this.y[r]):0}},getInterpolateFunction:function(e){p.controller.spline||(p.controller.spline=p.params.loop?new p.controller.LinearSpline(p.slidesGrid,e.slidesGrid):new p.controller.LinearSpline(p.snapGrid,e.snapGrid))},setTranslate:function(e,t){var a,i,r=p.params.control;function n(t){e=t.rtl&&"horizontal"===t.params.direction?-p.translate:p.translate,"slide"===p.params.controlBy&&(p.controller.getInterpolateFunction(t),i=-p.controller.spline.interpolate(-e)),i&&"container"!==p.params.controlBy||(a=(t.maxTranslate()-t.minTranslate())/(p.maxTranslate()-p.minTranslate()),i=(e-p.minTranslate())*a+t.minTranslate()),p.params.controlInverse&&(i=t.maxTranslate()-i),t.updateProgress(i),t.setWrapperTranslate(i,!1,p),t.updateActiveIndex()}if(Array.isArray(r))for(var s=0;s<r.length;s++)r[s]!==t&&r[s]instanceof o&&n(r[s]);else r instanceof o&&t!==r&&n(r)},setTransition:function(e,t){var a,i=p.params.control;function r(t){t.setWrapperTransition(e,p),0!==e&&(t.onTransitionStart(),t.wrapper.transitionEnd(function(){i&&(t.params.loop&&"slide"===p.params.controlBy&&t.fixLoop(),t.onTransitionEnd())}))}if(Array.isArray(i))for(a=0;a<i.length;a++)i[a]!==t&&i[a]instanceof o&&r(i[a]);else i instanceof o&&t!==i&&r(i)}},p.hashnav={onHashCange:function(e,t){var a=document.location.hash.replace("#","");a!==p.slides.eq(p.activeIndex).attr("data-hash")&&p.slideTo(p.wrapper.children("."+p.params.slideClass+'[data-hash="'+a+'"]').index())},attachEvents:function(t){var a=t?"off":"on";e(window)[a]("hashchange",p.hashnav.onHashCange)},setHash:function(){if(p.hashnav.initialized&&p.params.hashnav)if(p.params.replaceState&&window.history&&window.history.replaceState)window.history.replaceState(null,null,"#"+p.slides.eq(p.activeIndex).attr("data-hash")||"");else{var e=p.slides.eq(p.activeIndex),t=e.attr("data-hash")||e.attr("data-history");document.location.hash=t||""}},init:function(){if(p.params.hashnav&&!p.params.history){p.hashnav.initialized=!0;var e=document.location.hash.replace("#","");if(e)for(var t=0,a=p.slides.length;t<a;t++){var o=p.slides.eq(t);if((o.attr("data-hash")||o.attr("data-history"))===e&&!o.hasClass(p.params.slideDuplicateClass)){var i=o.index();p.slideTo(i,0,p.params.runCallbacksOnInit,!0)}}p.params.hashnavWatchState&&p.hashnav.attachEvents()}},destroy:function(){p.params.hashnavWatchState&&p.hashnav.attachEvents(!0)}},p.history={init:function(){if(p.params.history){if(!window.history||!window.history.pushState)return p.params.history=!1,void(p.params.hashnav=!0);p.history.initialized=!0,this.paths=this.getPathValues(),(this.paths.key||this.paths.value)&&(this.scrollToSlide(0,this.paths.value,p.params.runCallbacksOnInit),p.params.replaceState||window.addEventListener("popstate",this.setHistoryPopState))}},setHistoryPopState:function(){p.history.paths=p.history.getPathValues(),p.history.scrollToSlide(p.params.speed,p.history.paths.value,!1)},getPathValues:function(){var e=window.location.pathname.slice(1).split("/"),t=e.length;return{key:e[t-2],value:e[t-1]}},setHistory:function(e,t){if(p.history.initialized&&p.params.history){var a=p.slides.eq(t),o=this.slugify(a.attr("data-history"));window.location.pathname.includes(e)||(o=e+"/"+o),p.params.replaceState?window.history.replaceState(null,null,o):window.history.pushState(null,null,o)}},slugify:function(e){return e.toString().toLowerCase().replace(/\s+/g,"-").replace(/[^\w\-]+/g,"").replace(/\-\-+/g,"-").replace(/^-+/,"").replace(/-+$/,"")},scrollToSlide:function(e,t,a){if(t)for(var o=0,i=p.slides.length;o<i;o++){var r=p.slides.eq(o);if(this.slugify(r.attr("data-history"))===t&&!r.hasClass(p.params.slideDuplicateClass)){var n=r.index();p.slideTo(n,e,a)}}else p.slideTo(0,e,a)}},p.disableKeyboardControl=function(){p.params.keyboardControl=!1,e(document).off("keydown",O)},p.enableKeyboardControl=function(){p.params.keyboardControl=!0,e(document).on("keydown",O)},p.mousewheel={event:!1,lastScrollTime:(new window.Date).getTime()},p.params.mousewheelControl&&(p.mousewheel.event=navigator.userAgent.indexOf("firefox")>-1?"DOMMouseScroll":function(){var e="onwheel"in document;if(!e){var t=document.createElement("div");t.setAttribute("onwheel","return;"),e="function"==typeof t.onwheel}return!e&&document.implementation&&document.implementation.hasFeature&&!0!==document.implementation.hasFeature("","")&&(e=document.implementation.hasFeature("Events.wheel","3.0")),e}()?"wheel":"mousewheel"),p.disableMousewheelControl=function(){if(!p.mousewheel.event)return!1;var t=p.container;return"container"!==p.params.mousewheelEventsTarged&&(t=e(p.params.mousewheelEventsTarged)),t.off(p.mousewheel.event,N),p.params.mousewheelControl=!1,!0},p.enableMousewheelControl=function(){if(!p.mousewheel.event)return!1;var t=p.container;return"container"!==p.params.mousewheelEventsTarged&&(t=e(p.params.mousewheelEventsTarged)),t.on(p.mousewheel.event,N),p.params.mousewheelControl=!0,!0},p.parallax={setTranslate:function(){p.container.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function(){A(this,p.progress)}),p.slides.each(function(){var t=e(this);t.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function(){A(this,Math.min(Math.max(t[0].progress,-1),1))})})},setTransition:function(t){void 0===t&&(t=p.params.speed),p.container.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function(){var a=e(this),o=parseInt(a.attr("data-swiper-parallax-duration"),10)||t;0===t&&(o=0),a.transition(o)})}},p.zoom={scale:1,currentScale:1,isScaling:!1,gesture:{slide:void 0,slideWidth:void 0,slideHeight:void 0,image:void 0,imageWrap:void 0,zoomMax:p.params.zoomMax},image:{isTouched:void 0,isMoved:void 0,currentX:void 0,currentY:void 0,minX:void 0,minY:void 0,maxX:void 0,maxY:void 0,width:void 0,height:void 0,startX:void 0,startY:void 0,touchesStart:{},touchesCurrent:{}},velocity:{x:void 0,y:void 0,prevPositionX:void 0,prevPositionY:void 0,prevTime:void 0},getDistanceBetweenTouches:function(e){if(e.targetTouches.length<2)return 1;var t=e.targetTouches[0].pageX,a=e.targetTouches[0].pageY,o=e.targetTouches[1].pageX,i=e.targetTouches[1].pageY;return Math.sqrt(Math.pow(o-t,2)+Math.pow(i-a,2))},onGestureStart:function(t){var a=p.zoom;if(!p.support.gestures){if("touchstart"!==t.type||"touchstart"===t.type&&t.targetTouches.length<2)return;a.gesture.scaleStart=a.getDistanceBetweenTouches(t)}a.gesture.slide&&a.gesture.slide.length||(a.gesture.slide=e(this),0===a.gesture.slide.length&&(a.gesture.slide=p.slides.eq(p.activeIndex)),a.gesture.image=a.gesture.slide.find("img, svg, canvas"),a.gesture.imageWrap=a.gesture.image.parent("."+p.params.zoomContainerClass),a.gesture.zoomMax=a.gesture.imageWrap.attr("data-swiper-zoom")||p.params.zoomMax,0!==a.gesture.imageWrap.length)?(a.gesture.image.transition(0),a.isScaling=!0):a.gesture.image=void 0},onGestureChange:function(e){var t=p.zoom;if(!p.support.gestures){if("touchmove"!==e.type||"touchmove"===e.type&&e.targetTouches.length<2)return;t.gesture.scaleMove=t.getDistanceBetweenTouches(e)}t.gesture.image&&0!==t.gesture.image.length&&(p.support.gestures?t.scale=e.scale*t.currentScale:t.scale=t.gesture.scaleMove/t.gesture.scaleStart*t.currentScale,t.scale>t.gesture.zoomMax&&(t.scale=t.gesture.zoomMax-1+Math.pow(t.scale-t.gesture.zoomMax+1,.5)),t.scale<p.params.zoomMin&&(t.scale=p.params.zoomMin+1-Math.pow(p.params.zoomMin-t.scale+1,.5)),t.gesture.image.transform("translate3d(0,0,0) scale("+t.scale+")"))},onGestureEnd:function(e){var t=p.zoom;!p.support.gestures&&("touchend"!==e.type||"touchend"===e.type&&e.changedTouches.length<2)||t.gesture.image&&0!==t.gesture.image.length&&(t.scale=Math.max(Math.min(t.scale,t.gesture.zoomMax),p.params.zoomMin),t.gesture.image.transition(p.params.speed).transform("translate3d(0,0,0) scale("+t.scale+")"),t.currentScale=t.scale,t.isScaling=!1,1===t.scale&&(t.gesture.slide=void 0))},onTouchStart:function(e,t){var a=e.zoom;a.gesture.image&&0!==a.gesture.image.length&&(a.image.isTouched||("android"===e.device.os&&t.preventDefault(),a.image.isTouched=!0,a.image.touchesStart.x="touchstart"===t.type?t.targetTouches[0].pageX:t.pageX,a.image.touchesStart.y="touchstart"===t.type?t.targetTouches[0].pageY:t.pageY))},onTouchMove:function(e){var t=p.zoom;if(t.gesture.image&&0!==t.gesture.image.length&&(p.allowClick=!1,t.image.isTouched&&t.gesture.slide)){t.image.isMoved||(t.image.width=t.gesture.image[0].offsetWidth,t.image.height=t.gesture.image[0].offsetHeight,t.image.startX=p.getTranslate(t.gesture.imageWrap[0],"x")||0,t.image.startY=p.getTranslate(t.gesture.imageWrap[0],"y")||0,t.gesture.slideWidth=t.gesture.slide[0].offsetWidth,t.gesture.slideHeight=t.gesture.slide[0].offsetHeight,t.gesture.imageWrap.transition(0),p.rtl&&(t.image.startX=-t.image.startX),p.rtl&&(t.image.startY=-t.image.startY));var a=t.image.width*t.scale,o=t.image.height*t.scale;if(!(a<t.gesture.slideWidth&&o<t.gesture.slideHeight)){if(t.image.minX=Math.min(t.gesture.slideWidth/2-a/2,0),t.image.maxX=-t.image.minX,t.image.minY=Math.min(t.gesture.slideHeight/2-o/2,0),t.image.maxY=-t.image.minY,t.image.touchesCurrent.x="touchmove"===e.type?e.targetTouches[0].pageX:e.pageX,t.image.touchesCurrent.y="touchmove"===e.type?e.targetTouches[0].pageY:e.pageY,!t.image.isMoved&&!t.isScaling){if(p.isHorizontal()&&Math.floor(t.image.minX)===Math.floor(t.image.startX)&&t.image.touchesCurrent.x<t.image.touchesStart.x||Math.floor(t.image.maxX)===Math.floor(t.image.startX)&&t.image.touchesCurrent.x>t.image.touchesStart.x)return void(t.image.isTouched=!1);if(!p.isHorizontal()&&Math.floor(t.image.minY)===Math.floor(t.image.startY)&&t.image.touchesCurrent.y<t.image.touchesStart.y||Math.floor(t.image.maxY)===Math.floor(t.image.startY)&&t.image.touchesCurrent.y>t.image.touchesStart.y)return void(t.image.isTouched=!1)}e.preventDefault(),e.stopPropagation(),t.image.isMoved=!0,t.image.currentX=t.image.touchesCurrent.x-t.image.touchesStart.x+t.image.startX,t.image.currentY=t.image.touchesCurrent.y-t.image.touchesStart.y+t.image.startY,t.image.currentX<t.image.minX&&(t.image.currentX=t.image.minX+1-Math.pow(t.image.minX-t.image.currentX+1,.8)),t.image.currentX>t.image.maxX&&(t.image.currentX=t.image.maxX-1+Math.pow(t.image.currentX-t.image.maxX+1,.8)),t.image.currentY<t.image.minY&&(t.image.currentY=t.image.minY+1-Math.pow(t.image.minY-t.image.currentY+1,.8)),t.image.currentY>t.image.maxY&&(t.image.currentY=t.image.maxY-1+Math.pow(t.image.currentY-t.image.maxY+1,.8)),t.velocity.prevPositionX||(t.velocity.prevPositionX=t.image.touchesCurrent.x),t.velocity.prevPositionY||(t.velocity.prevPositionY=t.image.touchesCurrent.y),t.velocity.prevTime||(t.velocity.prevTime=Date.now()),t.velocity.x=(t.image.touchesCurrent.x-t.velocity.prevPositionX)/(Date.now()-t.velocity.prevTime)/2,t.velocity.y=(t.image.touchesCurrent.y-t.velocity.prevPositionY)/(Date.now()-t.velocity.prevTime)/2,Math.abs(t.image.touchesCurrent.x-t.velocity.prevPositionX)<2&&(t.velocity.x=0),Math.abs(t.image.touchesCurrent.y-t.velocity.prevPositionY)<2&&(t.velocity.y=0),t.velocity.prevPositionX=t.image.touchesCurrent.x,t.velocity.prevPositionY=t.image.touchesCurrent.y,t.velocity.prevTime=Date.now(),t.gesture.imageWrap.transform("translate3d("+t.image.currentX+"px, "+t.image.currentY+"px,0)")}}},onTouchEnd:function(e,t){var a=e.zoom;if(a.gesture.image&&0!==a.gesture.image.length){if(!a.image.isTouched||!a.image.isMoved)return a.image.isTouched=!1,void(a.image.isMoved=!1);a.image.isTouched=!1,a.image.isMoved=!1;var o=300,i=300,r=a.velocity.x*o,n=a.image.currentX+r,s=a.velocity.y*i,l=a.image.currentY+s;0!==a.velocity.x&&(o=Math.abs((n-a.image.currentX)/a.velocity.x)),0!==a.velocity.y&&(i=Math.abs((l-a.image.currentY)/a.velocity.y));var d=Math.max(o,i);a.image.currentX=n,a.image.currentY=l;var c=a.image.width*a.scale,u=a.image.height*a.scale;a.image.minX=Math.min(a.gesture.slideWidth/2-c/2,0),a.image.maxX=-a.image.minX,a.image.minY=Math.min(a.gesture.slideHeight/2-u/2,0),a.image.maxY=-a.image.minY,a.image.currentX=Math.max(Math.min(a.image.currentX,a.image.maxX),a.image.minX),a.image.currentY=Math.max(Math.min(a.image.currentY,a.image.maxY),a.image.minY),a.gesture.imageWrap.transition(d).transform("translate3d("+a.image.currentX+"px, "+a.image.currentY+"px,0)")}},onTransitionEnd:function(e){var t=e.zoom;t.gesture.slide&&e.previousIndex!==e.activeIndex&&(t.gesture.image.transform("translate3d(0,0,0) scale(1)"),t.gesture.imageWrap.transform("translate3d(0,0,0)"),t.gesture.slide=t.gesture.image=t.gesture.imageWrap=void 0,t.scale=t.currentScale=1)},toggleZoom:function(t,a){var o,i,r,n,s,l,d,c,u,p,f,m,h,g,b,v,x=t.zoom;(x.gesture.slide||(x.gesture.slide=t.clickedSlide?e(t.clickedSlide):t.slides.eq(t.activeIndex),x.gesture.image=x.gesture.slide.find("img, svg, canvas"),x.gesture.imageWrap=x.gesture.image.parent("."+t.params.zoomContainerClass)),x.gesture.image&&0!==x.gesture.image.length)&&(void 0===x.image.touchesStart.x&&a?(o="touchend"===a.type?a.changedTouches[0].pageX:a.pageX,i="touchend"===a.type?a.changedTouches[0].pageY:a.pageY):(o=x.image.touchesStart.x,i=x.image.touchesStart.y),x.scale&&1!==x.scale?(x.scale=x.currentScale=1,x.gesture.imageWrap.transition(300).transform("translate3d(0,0,0)"),x.gesture.image.transition(300).transform("translate3d(0,0,0) scale(1)"),x.gesture.slide=void 0):(x.scale=x.currentScale=x.gesture.imageWrap.attr("data-swiper-zoom")||t.params.zoomMax,a?(b=x.gesture.slide[0].offsetWidth,v=x.gesture.slide[0].offsetHeight,r=x.gesture.slide.offset().left+b/2-o,n=x.gesture.slide.offset().top+v/2-i,d=x.gesture.image[0].offsetWidth,c=x.gesture.image[0].offsetHeight,u=d*x.scale,p=c*x.scale,h=-(f=Math.min(b/2-u/2,0)),g=-(m=Math.min(v/2-p/2,0)),s=r*x.scale,l=n*x.scale,s<f&&(s=f),s>h&&(s=h),l<m&&(l=m),l>g&&(l=g)):(s=0,l=0),x.gesture.imageWrap.transition(300).transform("translate3d("+s+"px, "+l+"px,0)"),x.gesture.image.transition(300).transform("translate3d(0,0,0) scale("+x.scale+")")))},attachEvents:function(t){var a=t?"off":"on";if(p.params.zoom){p.slides;var o=!("touchstart"!==p.touchEvents.start||!p.support.passiveListener||!p.params.passiveListeners)&&{passive:!0,capture:!1};p.support.gestures?(p.slides[a]("gesturestart",p.zoom.onGestureStart,o),p.slides[a]("gesturechange",p.zoom.onGestureChange,o),p.slides[a]("gestureend",p.zoom.onGestureEnd,o)):"touchstart"===p.touchEvents.start&&(p.slides[a](p.touchEvents.start,p.zoom.onGestureStart,o),p.slides[a](p.touchEvents.move,p.zoom.onGestureChange,o),p.slides[a](p.touchEvents.end,p.zoom.onGestureEnd,o)),p[a]("touchStart",p.zoom.onTouchStart),p.slides.each(function(t,o){e(o).find("."+p.params.zoomContainerClass).length>0&&e(o)[a](p.touchEvents.move,p.zoom.onTouchMove)}),p[a]("touchEnd",p.zoom.onTouchEnd),p[a]("transitionEnd",p.zoom.onTransitionEnd),p.params.zoomToggle&&p.on("doubleTap",p.zoom.toggleZoom)}},init:function(){p.zoom.attachEvents()},destroy:function(){p.zoom.attachEvents(!0)}},p._plugins=[],p.plugins){var P=p.plugins[M](p,p.params[M]);P&&p._plugins.push(P)}return p.callPlugins=function(e){for(var t=0;t<p._plugins.length;t++)e in p._plugins[t]&&p._plugins[t][e](arguments[1],arguments[2],arguments[3],arguments[4],arguments[5])},p.emitterEventListeners={},p.emit=function(e){var t;if(p.params[e]&&p.params[e](arguments[1],arguments[2],arguments[3],arguments[4],arguments[5]),p.emitterEventListeners[e])for(t=0;t<p.emitterEventListeners[e].length;t++)p.emitterEventListeners[e][t](arguments[1],arguments[2],arguments[3],arguments[4],arguments[5]);p.callPlugins&&p.callPlugins(e,arguments[1],arguments[2],arguments[3],arguments[4],arguments[5])},p.on=function(e,t){return e=R(e),p.emitterEventListeners[e]||(p.emitterEventListeners[e]=[]),p.emitterEventListeners[e].push(t),p},p.off=function(e,t){var a;if(e=R(e),void 0===t)return p.emitterEventListeners[e]=[],p;if(p.emitterEventListeners[e]&&0!==p.emitterEventListeners[e].length){for(a=0;a<p.emitterEventListeners[e].length;a++)p.emitterEventListeners[e][a]===t&&p.emitterEventListeners[e].splice(a,1);return p}},p.once=function(e,t){e=R(e);var a=function(){t(arguments[0],arguments[1],arguments[2],arguments[3],arguments[4]),p.off(e,a)};return p.on(e,a),p},p.a11y={makeFocusable:function(e){return e.attr("tabIndex","0"),e},addRole:function(e,t){return e.attr("role",t),e},addLabel:function(e,t){return e.attr("aria-label",t),e},disable:function(e){return e.attr("aria-disabled",!0),e},enable:function(e){return e.attr("aria-disabled",!1),e},onEnterKey:function(t){13===t.keyCode&&(e(t.target).is(p.params.nextButton)?(p.onClickNext(t),p.isEnd?p.a11y.notify(p.params.lastSlideMessage):p.a11y.notify(p.params.nextSlideMessage)):e(t.target).is(p.params.prevButton)&&(p.onClickPrev(t),p.isBeginning?p.a11y.notify(p.params.firstSlideMessage):p.a11y.notify(p.params.prevSlideMessage)),e(t.target).is("."+p.params.bulletClass)&&e(t.target)[0].click())},liveRegion:e('<span class="'+p.params.notificationClass+'" aria-live="assertive" aria-atomic="true"></span>'),notify:function(e){var t=p.a11y.liveRegion;0!==t.length&&(t.html(""),t.html(e))},init:function(){p.params.nextButton&&p.nextButton&&p.nextButton.length>0&&(p.a11y.makeFocusable(p.nextButton),p.a11y.addRole(p.nextButton,"button"),p.a11y.addLabel(p.nextButton,p.params.nextSlideMessage)),p.params.prevButton&&p.prevButton&&p.prevButton.length>0&&(p.a11y.makeFocusable(p.prevButton),p.a11y.addRole(p.prevButton,"button"),p.a11y.addLabel(p.prevButton,p.params.prevSlideMessage)),e(p.container).append(p.a11y.liveRegion)},initPagination:function(){p.params.pagination&&p.params.paginationClickable&&p.bullets&&p.bullets.length&&p.bullets.each(function(){var t=e(this);p.a11y.makeFocusable(t),p.a11y.addRole(t,"button"),p.a11y.addLabel(t,p.params.paginationBulletMessage.replace(/{{index}}/,t.index()+1))})},destroy:function(){p.a11y.liveRegion&&p.a11y.liveRegion.length>0&&p.a11y.liveRegion.remove()}},p.init=function(){p.params.loop&&p.createLoop(),p.updateContainerSize(),p.updateSlidesSize(),p.updatePagination(),p.params.scrollbar&&p.scrollbar&&(p.scrollbar.set(),p.params.scrollbarDraggable&&p.scrollbar.enableDraggable()),"slide"!==p.params.effect&&p.effects[p.params.effect]&&(p.params.loop||p.updateProgress(),p.effects[p.params.effect].setTranslate()),p.params.loop?p.slideTo(p.params.initialSlide+p.loopedSlides,0,p.params.runCallbacksOnInit):(p.slideTo(p.params.initialSlide,0,p.params.runCallbacksOnInit),0===p.params.initialSlide&&(p.parallax&&p.params.parallax&&p.parallax.setTranslate(),p.lazy&&p.params.lazyLoading&&(p.lazy.load(),p.lazy.initialImageLoaded=!0))),p.attachEvents(),p.params.observer&&p.support.observer&&p.initObservers(),p.params.preloadImages&&!p.params.lazyLoading&&p.preloadImages(),p.params.zoom&&p.zoom&&p.zoom.init(),p.params.autoplay&&p.startAutoplay(),p.params.keyboardControl&&p.enableKeyboardControl&&p.enableKeyboardControl(),p.params.mousewheelControl&&p.enableMousewheelControl&&p.enableMousewheelControl(),p.params.hashnavReplaceState&&(p.params.replaceState=p.params.hashnavReplaceState),p.params.history&&p.history&&p.history.init(),p.params.hashnav&&p.hashnav&&p.hashnav.init(),p.params.a11y&&p.a11y&&p.a11y.init(),p.emit("onInit",p)},p.cleanupStyles=function(){p.container.removeClass(p.classNames.join(" ")).removeAttr("style"),p.wrapper.removeAttr("style"),p.slides&&p.slides.length&&p.slides.removeClass([p.params.slideVisibleClass,p.params.slideActiveClass,p.params.slideNextClass,p.params.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-column").removeAttr("data-swiper-row"),p.paginationContainer&&p.paginationContainer.length&&p.paginationContainer.removeClass(p.params.paginationHiddenClass),p.bullets&&p.bullets.length&&p.bullets.removeClass(p.params.bulletActiveClass),p.params.prevButton&&e(p.params.prevButton).removeClass(p.params.buttonDisabledClass),p.params.nextButton&&e(p.params.nextButton).removeClass(p.params.buttonDisabledClass),p.params.scrollbar&&p.scrollbar&&(p.scrollbar.track&&p.scrollbar.track.length&&p.scrollbar.track.removeAttr("style"),p.scrollbar.drag&&p.scrollbar.drag.length&&p.scrollbar.drag.removeAttr("style"))},p.destroy=function(e,t){p.detachEvents(),p.stopAutoplay(),p.params.scrollbar&&p.scrollbar&&p.params.scrollbarDraggable&&p.scrollbar.disableDraggable(),p.params.loop&&p.destroyLoop(),t&&p.cleanupStyles(),p.disconnectObservers(),p.params.zoom&&p.zoom&&p.zoom.destroy(),p.params.keyboardControl&&p.disableKeyboardControl&&p.disableKeyboardControl(),p.params.mousewheelControl&&p.disableMousewheelControl&&p.disableMousewheelControl(),p.params.a11y&&p.a11y&&p.a11y.destroy(),p.params.history&&!p.params.replaceState&&window.removeEventListener("popstate",p.history.setHistoryPopState),p.params.hashnav&&p.hashnav&&p.hashnav.destroy(),p.emit("onDestroy"),!1!==e&&(p=null)},p.init(),p}function I(e){return Math.floor(e)}function L(){var e=p.params.autoplay,t=p.slides.eq(p.activeIndex);t.attr("data-swiper-autoplay")&&(e=t.attr("data-swiper-autoplay")||p.params.autoplay),p.autoplayTimeoutId=setTimeout(function(){p.params.loop?(p.fixLoop(),p._slideNext(),p.emit("onAutoplay",p)):p.isEnd?a.autoplayStopOnLast?p.stopAutoplay():(p._slideTo(0),p.emit("onAutoplay",p)):(p._slideNext(),p.emit("onAutoplay",p))},e)}function B(t,a){var o=e(t.target);if(!o.is(a))if("string"==typeof a)o=o.parents(a);else if(a.nodeType){var i;return o.parents().each(function(e,t){t===a&&(i=a)}),i?a:void 0}if(0!==o.length)return o[0]}function D(e,t){t=t||{};var a=new(window.MutationObserver||window.WebkitMutationObserver)(function(e){e.forEach(function(e){p.onResize(!0),p.emit("onObserverUpdate",p,e)})});a.observe(e,{attributes:void 0===t.attributes||t.attributes,childList:void 0===t.childList||t.childList,characterData:void 0===t.characterData||t.characterData}),p.observers.push(a)}function O(e){e.originalEvent&&(e=e.originalEvent);var t=e.keyCode||e.charCode;if(!p.params.allowSwipeToNext&&(p.isHorizontal()&&39===t||!p.isHorizontal()&&40===t))return!1;if(!p.params.allowSwipeToPrev&&(p.isHorizontal()&&37===t||!p.isHorizontal()&&38===t))return!1;if(!(e.shiftKey||e.altKey||e.ctrlKey||e.metaKey||document.activeElement&&document.activeElement.nodeName&&("input"===document.activeElement.nodeName.toLowerCase()||"textarea"===document.activeElement.nodeName.toLowerCase()))){if(37===t||39===t||38===t||40===t){var a=!1;if(p.container.parents("."+p.params.slideClass).length>0&&0===p.container.parents("."+p.params.slideActiveClass).length)return;var o={left:window.pageXOffset,top:window.pageYOffset},i=window.innerWidth,r=window.innerHeight,n=p.container.offset();p.rtl&&(n.left=n.left-p.container[0].scrollLeft);for(var s=[[n.left,n.top],[n.left+p.width,n.top],[n.left,n.top+p.height],[n.left+p.width,n.top+p.height]],l=0;l<s.length;l++){var d=s[l];d[0]>=o.left&&d[0]<=o.left+i&&d[1]>=o.top&&d[1]<=o.top+r&&(a=!0)}if(!a)return}p.isHorizontal()?(37!==t&&39!==t||(e.preventDefault?e.preventDefault():e.returnValue=!1),(39===t&&!p.rtl||37===t&&p.rtl)&&p.slideNext(),(37===t&&!p.rtl||39===t&&p.rtl)&&p.slidePrev()):(38!==t&&40!==t||(e.preventDefault?e.preventDefault():e.returnValue=!1),40===t&&p.slideNext(),38===t&&p.slidePrev()),p.emit("onKeyPress",p,t)}}function N(e){e.originalEvent&&(e=e.originalEvent);var t,a,o,i,r,n=0,s=p.rtl?-1:1,l=(a=0,o=0,i=0,r=0,"detail"in(t=e)&&(o=t.detail),"wheelDelta"in t&&(o=-t.wheelDelta/120),"wheelDeltaY"in t&&(o=-t.wheelDeltaY/120),"wheelDeltaX"in t&&(a=-t.wheelDeltaX/120),"axis"in t&&t.axis===t.HORIZONTAL_AXIS&&(a=o,o=0),i=10*a,r=10*o,"deltaY"in t&&(r=t.deltaY),"deltaX"in t&&(i=t.deltaX),(i||r)&&t.deltaMode&&(1===t.deltaMode?(i*=40,r*=40):(i*=800,r*=800)),i&&!a&&(a=i<1?-1:1),r&&!o&&(o=r<1?-1:1),{spinX:a,spinY:o,pixelX:i,pixelY:r});if(p.params.mousewheelForceToAxis)if(p.isHorizontal()){if(!(Math.abs(l.pixelX)>Math.abs(l.pixelY)))return;n=l.pixelX*s}else{if(!(Math.abs(l.pixelY)>Math.abs(l.pixelX)))return;n=l.pixelY}else n=Math.abs(l.pixelX)>Math.abs(l.pixelY)?-l.pixelX*s:-l.pixelY;if(0!==n){if(p.params.mousewheelInvert&&(n=-n),p.params.freeMode){var d=p.getWrapperTranslate()+n*p.params.mousewheelSensitivity,c=p.isBeginning,u=p.isEnd;if(d>=p.minTranslate()&&(d=p.minTranslate()),d<=p.maxTranslate()&&(d=p.maxTranslate()),p.setWrapperTransition(0),p.setWrapperTranslate(d),p.updateProgress(),p.updateActiveIndex(),(!c&&p.isBeginning||!u&&p.isEnd)&&p.updateClasses(),p.params.freeModeSticky?(clearTimeout(p.mousewheel.timeout),p.mousewheel.timeout=setTimeout(function(){p.slideReset()},300)):p.params.lazyLoading&&p.lazy&&p.lazy.load(),p.emit("onScroll",p,e),p.params.autoplay&&p.params.autoplayDisableOnInteraction&&p.stopAutoplay(),0===d||d===p.maxTranslate())return}else{if((new window.Date).getTime()-p.mousewheel.lastScrollTime>60)if(n<0)if(p.isEnd&&!p.params.loop||p.animating){if(p.params.mousewheelReleaseOnEdges)return!0}else p.slideNext(),p.emit("onScroll",p,e);else if(p.isBeginning&&!p.params.loop||p.animating){if(p.params.mousewheelReleaseOnEdges)return!0}else p.slidePrev(),p.emit("onScroll",p,e);p.mousewheel.lastScrollTime=(new window.Date).getTime()}return e.preventDefault?e.preventDefault():e.returnValue=!1,!1}}function A(t,a){var o,i,r;t=e(t);var n=p.rtl?-1:1;o=t.attr("data-swiper-parallax")||"0",i=t.attr("data-swiper-parallax-x"),r=t.attr("data-swiper-parallax-y"),i||r?(i=i||"0",r=r||"0"):p.isHorizontal()?(i=o,r="0"):(r=o,i="0"),i=i.indexOf("%")>=0?parseInt(i,10)*a*n+"%":i*a*n+"px",r=r.indexOf("%")>=0?parseInt(r,10)*a+"%":r*a+"px",t.transform("translate3d("+i+", "+r+",0px)")}function R(e){return 0!==e.indexOf("on")&&(e=e[0]!==e[0].toUpperCase()?"on"+e[0].toUpperCase()+e.substring(1):"on"+e),e}};o.prototype={isSafari:(a=window.navigator.userAgent.toLowerCase(),a.indexOf("safari")>=0&&a.indexOf("chrome")<0&&a.indexOf("android")<0),isUiWebView:/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(window.navigator.userAgent),isArray:function(e){return"[object Array]"===Object.prototype.toString.apply(e)},browser:{ie:window.navigator.pointerEnabled||window.navigator.msPointerEnabled,ieTouch:window.navigator.msPointerEnabled&&window.navigator.msMaxTouchPoints>1||window.navigator.pointerEnabled&&window.navigator.maxTouchPoints>1,lteIE9:(t=document.createElement("div"),t.innerHTML="\x3c!--[if lte IE 9]><i></i><![endif]--\x3e",1===t.getElementsByTagName("i").length)},device:function(){var e=window.navigator.userAgent,t=e.match(/(Android);?[\s\/]+([\d.]+)?/),a=e.match(/(iPad).*OS\s([\d_]+)/),o=e.match(/(iPod)(.*OS\s([\d_]+))?/),i=!a&&e.match(/(iPhone\sOS|iOS)\s([\d_]+)/);return{ios:a||i||o,android:t}}(),support:{touch:window.Modernizr&&!0===Modernizr.touch||!!("ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch),transforms3d:window.Modernizr&&!0===Modernizr.csstransforms3d||function(){var e=document.createElement("div").style;return"webkitPerspective"in e||"MozPerspective"in e||"OPerspective"in e||"MsPerspective"in e||"perspective"in e}(),flexbox:function(){for(var e=document.createElement("div").style,t="alignItems webkitAlignItems webkitBoxAlign msFlexAlign mozBoxAlign webkitFlexDirection msFlexDirection mozBoxDirection mozBoxOrient webkitBoxDirection webkitBoxOrient".split(" "),a=0;a<t.length;a++)if(t[a]in e)return!0}(),observer:"MutationObserver"in window||"WebkitMutationObserver"in window,passiveListener:function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("testPassiveListener",null,t)}catch(e){}return e}(),gestures:"ongesturestart"in window},plugins:{}};for(var i,r=function(){var e=function(e){var t=0;for(t=0;t<e.length;t++)this[t]=e[t];return this.length=e.length,this},t=function(t,a){var o=[],i=0;if(t&&!a&&t instanceof e)return t;if(t)if("string"==typeof t){var r,n,s=t.trim();if(s.indexOf("<")>=0&&s.indexOf(">")>=0){var l="div";for(0===s.indexOf("<li")&&(l="ul"),0===s.indexOf("<tr")&&(l="tbody"),0!==s.indexOf("<td")&&0!==s.indexOf("<th")||(l="tr"),0===s.indexOf("<tbody")&&(l="table"),0===s.indexOf("<option")&&(l="select"),(n=document.createElement(l)).innerHTML=t,i=0;i<n.childNodes.length;i++)o.push(n.childNodes[i])}else for(r=a||"#"!==t[0]||t.match(/[ .<>:~]/)?(a||document).querySelectorAll(t):[document.getElementById(t.split("#")[1])],i=0;i<r.length;i++)r[i]&&o.push(r[i])}else if(t.nodeType||t===window||t===document)o.push(t);else if(t.length>0&&t[0].nodeType)for(i=0;i<t.length;i++)o.push(t[i]);return new e(o)};return e.prototype={addClass:function(e){if(void 0===e)return this;for(var t=e.split(" "),a=0;a<t.length;a++)for(var o=0;o<this.length;o++)this[o].classList.add(t[a]);return this},removeClass:function(e){for(var t=e.split(" "),a=0;a<t.length;a++)for(var o=0;o<this.length;o++)this[o].classList.remove(t[a]);return this},hasClass:function(e){return!!this[0]&&this[0].classList.contains(e)},toggleClass:function(e){for(var t=e.split(" "),a=0;a<t.length;a++)for(var o=0;o<this.length;o++)this[o].classList.toggle(t[a]);return this},attr:function(e,t){if(1===arguments.length&&"string"==typeof e)return this[0]?this[0].getAttribute(e):void 0;for(var a=0;a<this.length;a++)if(2===arguments.length)this[a].setAttribute(e,t);else for(var o in e)this[a][o]=e[o],this[a].setAttribute(o,e[o]);return this},removeAttr:function(e){for(var t=0;t<this.length;t++)this[t].removeAttribute(e);return this},data:function(e,t){if(void 0!==t){for(var a=0;a<this.length;a++){var o=this[a];o.dom7ElementDataStorage||(o.dom7ElementDataStorage={}),o.dom7ElementDataStorage[e]=t}return this}if(this[0]){var i=this[0].getAttribute("data-"+e);return i||(this[0].dom7ElementDataStorage&&e in this[0].dom7ElementDataStorage?this[0].dom7ElementDataStorage[e]:void 0)}},transform:function(e){for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransform=a.MsTransform=a.msTransform=a.MozTransform=a.OTransform=a.transform=e}return this},transition:function(e){"string"!=typeof e&&(e+="ms");for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransitionDuration=a.MsTransitionDuration=a.msTransitionDuration=a.MozTransitionDuration=a.OTransitionDuration=a.transitionDuration=e}return this},on:function(e,a,o,i){function r(e){var i=e.target;if(t(i).is(a))o.call(i,e);else for(var r=t(i).parents(),n=0;n<r.length;n++)t(r[n]).is(a)&&o.call(r[n],e)}var n,s,l=e.split(" ");for(n=0;n<this.length;n++)if("function"==typeof a||!1===a)for("function"==typeof a&&(o=arguments[1],i=arguments[2]||!1),s=0;s<l.length;s++)this[n].addEventListener(l[s],o,i);else for(s=0;s<l.length;s++)this[n].dom7LiveListeners||(this[n].dom7LiveListeners=[]),this[n].dom7LiveListeners.push({listener:o,liveListener:r}),this[n].addEventListener(l[s],r,i);return this},off:function(e,t,a,o){for(var i=e.split(" "),r=0;r<i.length;r++)for(var n=0;n<this.length;n++)if("function"==typeof t||!1===t)"function"==typeof t&&(a=arguments[1],o=arguments[2]||!1),this[n].removeEventListener(i[r],a,o);else if(this[n].dom7LiveListeners)for(var s=0;s<this[n].dom7LiveListeners.length;s++)this[n].dom7LiveListeners[s].listener===a&&this[n].removeEventListener(i[r],this[n].dom7LiveListeners[s].liveListener,o);return this},once:function(e,t,a,o){var i=this;"function"==typeof t&&(t=!1,a=arguments[1],o=arguments[2]),i.on(e,t,function r(n){a(n),i.off(e,t,r,o)},o)},trigger:function(e,t){for(var a=0;a<this.length;a++){var o;try{o=new window.CustomEvent(e,{detail:t,bubbles:!0,cancelable:!0})}catch(a){(o=document.createEvent("Event")).initEvent(e,!0,!0),o.detail=t}this[a].dispatchEvent(o)}return this},transitionEnd:function(e){var t,a=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],o=this;function i(r){if(r.target===this)for(e.call(this,r),t=0;t<a.length;t++)o.off(a[t],i)}if(e)for(t=0;t<a.length;t++)o.on(a[t],i);return this},width:function(){return this[0]===window?window.innerWidth:this.length>0?parseFloat(this.css("width")):null},outerWidth:function(e){return this.length>0?e?this[0].offsetWidth+parseFloat(this.css("margin-right"))+parseFloat(this.css("margin-left")):this[0].offsetWidth:null},height:function(){return this[0]===window?window.innerHeight:this.length>0?parseFloat(this.css("height")):null},outerHeight:function(e){return this.length>0?e?this[0].offsetHeight+parseFloat(this.css("margin-top"))+parseFloat(this.css("margin-bottom")):this[0].offsetHeight:null},offset:function(){if(this.length>0){var e=this[0],t=e.getBoundingClientRect(),a=document.body,o=e.clientTop||a.clientTop||0,i=e.clientLeft||a.clientLeft||0,r=window.pageYOffset||e.scrollTop,n=window.pageXOffset||e.scrollLeft;return{top:t.top+r-o,left:t.left+n-i}}return null},css:function(e,t){var a;if(1===arguments.length){if("string"!=typeof e){for(a=0;a<this.length;a++)for(var o in e)this[a].style[o]=e[o];return this}if(this[0])return window.getComputedStyle(this[0],null).getPropertyValue(e)}if(2===arguments.length&&"string"==typeof e){for(a=0;a<this.length;a++)this[a].style[e]=t;return this}return this},each:function(e){for(var t=0;t<this.length;t++)e.call(this[t],t,this[t]);return this},html:function(e){if(void 0===e)return this[0]?this[0].innerHTML:void 0;for(var t=0;t<this.length;t++)this[t].innerHTML=e;return this},text:function(e){if(void 0===e)return this[0]?this[0].textContent.trim():null;for(var t=0;t<this.length;t++)this[t].textContent=e;return this},is:function(a){if(!this[0])return!1;var o,i;if("string"==typeof a){var r=this[0];if(r===document)return a===document;if(r===window)return a===window;if(r.matches)return r.matches(a);if(r.webkitMatchesSelector)return r.webkitMatchesSelector(a);if(r.mozMatchesSelector)return r.mozMatchesSelector(a);if(r.msMatchesSelector)return r.msMatchesSelector(a);for(o=t(a),i=0;i<o.length;i++)if(o[i]===this[0])return!0;return!1}if(a===document)return this[0]===document;if(a===window)return this[0]===window;if(a.nodeType||a instanceof e){for(o=a.nodeType?[a]:a,i=0;i<o.length;i++)if(o[i]===this[0])return!0;return!1}return!1},index:function(){if(this[0]){for(var e=this[0],t=0;null!==(e=e.previousSibling);)1===e.nodeType&&t++;return t}},eq:function(t){if(void 0===t)return this;var a,o=this.length;return new e(t>o-1?[]:t<0?(a=o+t)<0?[]:[this[a]]:[this[t]])},append:function(t){var a,o;for(a=0;a<this.length;a++)if("string"==typeof t){var i=document.createElement("div");for(i.innerHTML=t;i.firstChild;)this[a].appendChild(i.firstChild)}else if(t instanceof e)for(o=0;o<t.length;o++)this[a].appendChild(t[o]);else this[a].appendChild(t);return this},prepend:function(t){var a,o;for(a=0;a<this.length;a++)if("string"==typeof t){var i=document.createElement("div");for(i.innerHTML=t,o=i.childNodes.length-1;o>=0;o--)this[a].insertBefore(i.childNodes[o],this[a].childNodes[0])}else if(t instanceof e)for(o=0;o<t.length;o++)this[a].insertBefore(t[o],this[a].childNodes[0]);else this[a].insertBefore(t,this[a].childNodes[0]);return this},insertBefore:function(e){for(var a=t(e),o=0;o<this.length;o++)if(1===a.length)a[0].parentNode.insertBefore(this[o],a[0]);else if(a.length>1)for(var i=0;i<a.length;i++)a[i].parentNode.insertBefore(this[o].cloneNode(!0),a[i])},insertAfter:function(e){for(var a=t(e),o=0;o<this.length;o++)if(1===a.length)a[0].parentNode.insertBefore(this[o],a[0].nextSibling);else if(a.length>1)for(var i=0;i<a.length;i++)a[i].parentNode.insertBefore(this[o].cloneNode(!0),a[i].nextSibling)},next:function(a){return this.length>0?a?this[0].nextElementSibling&&t(this[0].nextElementSibling).is(a)?new e([this[0].nextElementSibling]):new e([]):this[0].nextElementSibling?new e([this[0].nextElementSibling]):new e([]):new e([])},nextAll:function(a){var o=[],i=this[0];if(!i)return new e([]);for(;i.nextElementSibling;){var r=i.nextElementSibling;a?t(r).is(a)&&o.push(r):o.push(r),i=r}return new e(o)},prev:function(a){return this.length>0?a?this[0].previousElementSibling&&t(this[0].previousElementSibling).is(a)?new e([this[0].previousElementSibling]):new e([]):this[0].previousElementSibling?new e([this[0].previousElementSibling]):new e([]):new e([])},prevAll:function(a){var o=[],i=this[0];if(!i)return new e([]);for(;i.previousElementSibling;){var r=i.previousElementSibling;a?t(r).is(a)&&o.push(r):o.push(r),i=r}return new e(o)},parent:function(e){for(var a=[],o=0;o<this.length;o++)e?t(this[o].parentNode).is(e)&&a.push(this[o].parentNode):a.push(this[o].parentNode);return t(t.unique(a))},parents:function(e){for(var a=[],o=0;o<this.length;o++)for(var i=this[o].parentNode;i;)e?t(i).is(e)&&a.push(i):a.push(i),i=i.parentNode;return t(t.unique(a))},find:function(t){for(var a=[],o=0;o<this.length;o++)for(var i=this[o].querySelectorAll(t),r=0;r<i.length;r++)a.push(i[r]);return new e(a)},children:function(a){for(var o=[],i=0;i<this.length;i++)for(var r=this[i].childNodes,n=0;n<r.length;n++)a?1===r[n].nodeType&&t(r[n]).is(a)&&o.push(r[n]):1===r[n].nodeType&&o.push(r[n]);return new e(t.unique(o))},remove:function(){for(var e=0;e<this.length;e++)this[e].parentNode&&this[e].parentNode.removeChild(this[e]);return this},add:function(){var e,a;for(e=0;e<arguments.length;e++){var o=t(arguments[e]);for(a=0;a<o.length;a++)this[this.length]=o[a],this.length++}return this}},t.fn=e.prototype,t.unique=function(e){for(var t=[],a=0;a<e.length;a++)-1===t.indexOf(e[a])&&t.push(e[a]);return t},t}(),n=["jQuery","Zepto","Dom7"],s=0;s<n.length;s++)window[n[s]]&&l(window[n[s]]);function l(e){e.fn.swiper=function(t){var a;return e(this).each(function(){var e=new o(this,t);a||(a=e)}),a}}(i=void 0===r?window.Dom7||window.Zepto||window.jQuery:r)&&("transitionEnd"in i.fn||(i.fn.transitionEnd=function(e){var t,a=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],o=this;function i(r){if(r.target===this)for(e.call(this,r),t=0;t<a.length;t++)o.off(a[t],i)}if(e)for(t=0;t<a.length;t++)o.on(a[t],i);return this}),"transform"in i.fn||(i.fn.transform=function(e){for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransform=a.MsTransform=a.msTransform=a.MozTransform=a.OTransform=a.transform=e}return this}),"transition"in i.fn||(i.fn.transition=function(e){"string"!=typeof e&&(e+="ms");for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransitionDuration=a.MsTransitionDuration=a.msTransitionDuration=a.MozTransitionDuration=a.OTransitionDuration=a.transitionDuration=e}return this}),"outerWidth"in i.fn||(i.fn.outerWidth=function(e){return this.length>0?e?this[0].offsetWidth+parseFloat(this.css("margin-right"))+parseFloat(this.css("margin-left")):this[0].offsetWidth:null})),window.Swiper=o}(),e.exports=window.Swiper}},[310]);
=======
webpackJsonp([7],{0:function(e,t,a){"use strict";var o=a(14),i=a(36),r=Object.prototype.toString;function n(e){return"[object Array]"===r.call(e)}function s(e){return null!==e&&"object"==typeof e}function l(e){return"[object Function]"===r.call(e)}function d(e,t){if(null!==e&&void 0!==e)if("object"!=typeof e&&(e=[e]),n(e))for(var a=0,o=e.length;a<o;a++)t.call(null,e[a],a,e);else for(var i in e)Object.prototype.hasOwnProperty.call(e,i)&&t.call(null,e[i],i,e)}e.exports={isArray:n,isArrayBuffer:function(e){return"[object ArrayBuffer]"===r.call(e)},isBuffer:i,isFormData:function(e){return"undefined"!=typeof FormData&&e instanceof FormData},isArrayBufferView:function(e){return"undefined"!=typeof ArrayBuffer&&ArrayBuffer.isView?ArrayBuffer.isView(e):e&&e.buffer&&e.buffer instanceof ArrayBuffer},isString:function(e){return"string"==typeof e},isNumber:function(e){return"number"==typeof e},isObject:s,isUndefined:function(e){return void 0===e},isDate:function(e){return"[object Date]"===r.call(e)},isFile:function(e){return"[object File]"===r.call(e)},isBlob:function(e){return"[object Blob]"===r.call(e)},isFunction:l,isStream:function(e){return s(e)&&l(e.pipe)},isURLSearchParams:function(e){return"undefined"!=typeof URLSearchParams&&e instanceof URLSearchParams},isStandardBrowserEnv:function(){return("undefined"==typeof navigator||"ReactNative"!==navigator.product)&&"undefined"!=typeof window&&"undefined"!=typeof document},forEach:d,merge:function e(){var t={};function a(a,o){"object"==typeof t[o]&&"object"==typeof a?t[o]=e(t[o],a):t[o]=a}for(var o=0,i=arguments.length;o<i;o++)d(arguments[o],a);return t},extend:function(e,t,a){return d(t,function(t,i){e[i]=a&&"function"==typeof t?o(t,a):t}),e},trim:function(e){return e.replace(/^\s*/,"").replace(/\s*$/,"")}}},1:function(e,t){e.exports=function(e){var t=[];return t.toString=function(){return this.map(function(t){var a=function(e,t){var a=e[1]||"",o=e[3];if(!o)return a;if(t&&"function"==typeof btoa){var i=(n=o,"/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(n))))+" */"),r=o.sources.map(function(e){return"/*# sourceURL="+o.sourceRoot+e+" */"});return[a].concat(r).concat([i]).join("\n")}var n;return[a].join("\n")}(t,e);return t[2]?"@media "+t[2]+"{"+a+"}":a}).join("")},t.i=function(e,a){"string"==typeof e&&(e=[[null,e,""]]);for(var o={},i=0;i<this.length;i++){var r=this[i][0];"number"==typeof r&&(o[r]=!0)}for(i=0;i<e.length;i++){var n=e[i];"number"==typeof n[0]&&o[n[0]]||(a&&!n[2]?n[2]=a:a&&(n[2]="("+n[2]+") and ("+a+")"),t.push(n))}},t}},10:function(e,t,a){"use strict";t.__esModule=!0,t.default={methods:{dispatch:function(e,t,a){for(var o=this.$parent||this.$root,i=o.$options.componentName;o&&(!i||i!==e);)(o=o.$parent)&&(i=o.$options.componentName);o&&o.$emit.apply(o,[t].concat(a))},broadcast:function(e,t,a){(function e(t,a,o){this.$children.forEach(function(i){i.$options.componentName===t?i.$emit.apply(i,[a].concat(o)):e.apply(i,[t,a].concat([o]))})}).call(this,e,t,a)}}}},11:function(e,t,a){"use strict";t.__esModule=!0,t.PopupManager=void 0;var o=l(a(4)),i=l(a(21)),r=l(a(31)),n=l(a(24)),s=a(5);function l(e){return e&&e.__esModule?e:{default:e}}var d=1,c=void 0;t.default={props:{visible:{type:Boolean,default:!1},openDelay:{},closeDelay:{},zIndex:{},modal:{type:Boolean,default:!1},modalFade:{type:Boolean,default:!0},modalClass:{},modalAppendToBody:{type:Boolean,default:!1},lockScroll:{type:Boolean,default:!0},closeOnPressEscape:{type:Boolean,default:!1},closeOnClickModal:{type:Boolean,default:!1}},beforeMount:function(){this._popupId="popup-"+d++,r.default.register(this._popupId,this)},beforeDestroy:function(){r.default.deregister(this._popupId),r.default.closeModal(this._popupId),this.restoreBodyStyle()},data:function(){return{opened:!1,bodyPaddingRight:null,computedBodyPaddingRight:0,withoutHiddenClass:!0,rendered:!1}},watch:{visible:function(e){var t=this;if(e){if(this._opening)return;this.rendered?this.open():(this.rendered=!0,o.default.nextTick(function(){t.open()}))}else this.close()}},methods:{open:function(e){var t=this;this.rendered||(this.rendered=!0);var a=(0,i.default)({},this.$props||this,e);this._closeTimer&&(clearTimeout(this._closeTimer),this._closeTimer=null),clearTimeout(this._openTimer);var o=Number(a.openDelay);o>0?this._openTimer=setTimeout(function(){t._openTimer=null,t.doOpen(a)},o):this.doOpen(a)},doOpen:function(e){if(!this.$isServer&&(!this.willOpen||this.willOpen())&&!this.opened){this._opening=!0;var t=function e(t){return 3===t.nodeType&&e(t=t.nextElementSibling||t.nextSibling),t}(this.$el),a=e.modal,o=e.zIndex;if(o&&(r.default.zIndex=o),a&&(this._closing&&(r.default.closeModal(this._popupId),this._closing=!1),r.default.openModal(this._popupId,r.default.nextZIndex(),this.modalAppendToBody?void 0:t,e.modalClass,e.modalFade),e.lockScroll)){this.withoutHiddenClass=!(0,s.hasClass)(document.body,"el-popup-parent--hidden"),this.withoutHiddenClass&&(this.bodyPaddingRight=document.body.style.paddingRight,this.computedBodyPaddingRight=parseInt((0,s.getStyle)(document.body,"paddingRight"),10)),c=(0,n.default)();var i=document.documentElement.clientHeight<document.body.scrollHeight,l=(0,s.getStyle)(document.body,"overflowY");c>0&&(i||"scroll"===l)&&this.withoutHiddenClass&&(document.body.style.paddingRight=this.computedBodyPaddingRight+c+"px"),(0,s.addClass)(document.body,"el-popup-parent--hidden")}"static"===getComputedStyle(t).position&&(t.style.position="absolute"),t.style.zIndex=r.default.nextZIndex(),this.opened=!0,this.onOpen&&this.onOpen(),this.doAfterOpen()}},doAfterOpen:function(){this._opening=!1},close:function(){var e=this;if(!this.willClose||this.willClose()){null!==this._openTimer&&(clearTimeout(this._openTimer),this._openTimer=null),clearTimeout(this._closeTimer);var t=Number(this.closeDelay);t>0?this._closeTimer=setTimeout(function(){e._closeTimer=null,e.doClose()},t):this.doClose()}},doClose:function(){this._closing=!0,this.onClose&&this.onClose(),this.lockScroll&&setTimeout(this.restoreBodyStyle,200),this.opened=!1,this.doAfterClose()},doAfterClose:function(){r.default.closeModal(this._popupId),this._closing=!1},restoreBodyStyle:function(){this.modal&&this.withoutHiddenClass&&(document.body.style.paddingRight=this.bodyPaddingRight,(0,s.removeClass)(document.body,"el-popup-parent--hidden")),this.withoutHiddenClass=!0}}},t.PopupManager=r.default},12:function(e,t,a){"use strict";a(19),a(3);var o=a(20),i=a.n(o),r=a(13),n=a.n(r),s=n.a.create({timeout:15e3});s.interceptors.request.use(function(e){return e},function(e){console.log(e),Promise.reject(e)}),s.interceptors.response.use(function(e){if(e.data.success)return e.data;i()(e.data.message)},function(e){var t=e.response.status;switch(t){case 401:i()("登录超时,本次登录已超时，您可重新登录或点击取消留在本页面继续浏览！");break;case 403:i()("您无权限执行次操作");break;case 415:case 422:i()(e.response.data.message);break;case 404:i()("请求资源不存在或已被删除");break;case 429:i()("操作频率过高，请稍后重试");break;case 500:i()("服务器发生错误，请联系客服处理");break;default:i()("产生未知错误，错误状态码："+t)}return Promise.reject(e)});var l=s;t.m=function(){return l({url:"/get_area_locations_list",method:"GET"})},t.f=function(){return l({url:"/get_block_locations_list",method:"GET"})},t.a=function(e){return n()({headers:{safeString:e},url:"http://192.168.0.142:9999/api/cities_areas_blocks_select",method:"GET"})},t.e=function(e){return l({url:"/entrust_throw_ins",method:"POST",data:e})},t.c=function(e){return l({url:"/collections",method:"POST",data:e})},t.b=function(e){return l({url:"/del/"+e,method:"GET"})},t.k=function(e){return l({url:"/sms/captcha/"+e+"/login",method:"GET"})},t.q=function(e){return l({url:"/logins",method:"POST",data:e})},t.h=function(e){return l({url:"/get_periphery_buildings",method:"POST",params:e})},t.o=function(e){return l({url:"/get_periphery_buildings_count",method:"POST",params:e})},t.d=function(e){return l({url:"/entrust_throw_ins",method:"POST",data:e})},t.p=function(e){return l({url:"/entrust_throw_ins",method:"POST",data:e})},t.n=function(e){return l({url:"/get_select_info",method:"GET",params:e})},t.l=function(e){return l({url:"/market_price/"+e,method:"GET"})},t.j=function(e){return l({url:"/like_building",method:"GET",params:e})},t.g=function(e){return l({url:"/property_browsing_list",method:"GET",params:e})},t.i=function(e){return l({url:"/listing_list",method:"GET",params:e})}},13:function(e,t,a){e.exports=a(35)},14:function(e,t,a){"use strict";e.exports=function(e,t){return function(){for(var a=new Array(arguments.length),o=0;o<a.length;o++)a[o]=arguments[o];return e.apply(t,a)}}},15:function(e,t,a){"use strict";var o=a(0),i=a(39),r=a(41),n=a(42),s=a(43),l=a(16),d="undefined"!=typeof window&&window.btoa&&window.btoa.bind(window)||a(44);e.exports=function(e){return new Promise(function(t,c){var u=e.data,p=e.headers;o.isFormData(u)&&delete p["Content-Type"];var f=new XMLHttpRequest,m="onreadystatechange",h=!1;if("undefined"==typeof window||!window.XDomainRequest||"withCredentials"in f||s(e.url)||(f=new window.XDomainRequest,m="onload",h=!0,f.onprogress=function(){},f.ontimeout=function(){}),e.auth){var g=e.auth.username||"",b=e.auth.password||"";p.Authorization="Basic "+d(g+":"+b)}if(f.open(e.method.toUpperCase(),r(e.url,e.params,e.paramsSerializer),!0),f.timeout=e.timeout,f[m]=function(){if(f&&(4===f.readyState||h)&&(0!==f.status||f.responseURL&&0===f.responseURL.indexOf("file:"))){var a="getAllResponseHeaders"in f?n(f.getAllResponseHeaders()):null,o={data:e.responseType&&"text"!==e.responseType?f.response:f.responseText,status:1223===f.status?204:f.status,statusText:1223===f.status?"No Content":f.statusText,headers:a,config:e,request:f};i(t,c,o),f=null}},f.onerror=function(){c(l("Network Error",e,null,f)),f=null},f.ontimeout=function(){c(l("timeout of "+e.timeout+"ms exceeded",e,"ECONNABORTED",f)),f=null},o.isStandardBrowserEnv()){var v=a(45),x=(e.withCredentials||s(e.url))&&e.xsrfCookieName?v.read(e.xsrfCookieName):void 0;x&&(p[e.xsrfHeaderName]=x)}if("setRequestHeader"in f&&o.forEach(p,function(e,t){void 0===u&&"content-type"===t.toLowerCase()?delete p[t]:f.setRequestHeader(t,e)}),e.withCredentials&&(f.withCredentials=!0),e.responseType)try{f.responseType=e.responseType}catch(t){if("json"!==e.responseType)throw t}"function"==typeof e.onDownloadProgress&&f.addEventListener("progress",e.onDownloadProgress),"function"==typeof e.onUploadProgress&&f.upload&&f.upload.addEventListener("progress",e.onUploadProgress),e.cancelToken&&e.cancelToken.promise.then(function(e){f&&(f.abort(),c(e),f=null)}),void 0===u&&(u=null),f.send(u)})}},16:function(e,t,a){"use strict";var o=a(40);e.exports=function(e,t,a,i,r){var n=new Error(e);return o(n,t,a,i,r)}},17:function(e,t,a){"use strict";e.exports=function(e){return!(!e||!e.__CANCEL__)}},18:function(e,t,a){"use strict";function o(e){this.message=e}o.prototype.toString=function(){return"Cancel"+(this.message?": "+this.message:"")},o.prototype.__CANCEL__=!0,e.exports=o},19:function(e,t,a){var o=a(26);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},2:function(e,t){var a={},o=function(e){var t;return function(){return void 0===t&&(t=e.apply(this,arguments)),t}},i=o(function(){return/msie [6-9]\b/.test(self.navigator.userAgent.toLowerCase())}),r=o(function(){return document.head||document.getElementsByTagName("head")[0]}),n=null,s=0,l=[];function d(e,t){for(var o=0;o<e.length;o++){var i=e[o],r=a[i.id];if(r){r.refs++;for(var n=0;n<r.parts.length;n++)r.parts[n](i.parts[n]);for(;n<i.parts.length;n++)r.parts.push(m(i.parts[n],t))}else{var s=[];for(n=0;n<i.parts.length;n++)s.push(m(i.parts[n],t));a[i.id]={id:i.id,refs:1,parts:s}}}}function c(e){for(var t=[],a={},o=0;o<e.length;o++){var i=e[o],r=i[0],n={css:i[1],media:i[2],sourceMap:i[3]};a[r]?a[r].parts.push(n):t.push(a[r]={id:r,parts:[n]})}return t}function u(e,t){var a=r(),o=l[l.length-1];if("top"===e.insertAt)o?o.nextSibling?a.insertBefore(t,o.nextSibling):a.appendChild(t):a.insertBefore(t,a.firstChild),l.push(t);else{if("bottom"!==e.insertAt)throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");a.appendChild(t)}}function p(e){e.parentNode.removeChild(e);var t=l.indexOf(e);t>=0&&l.splice(t,1)}function f(e){var t=document.createElement("style");return t.type="text/css",u(e,t),t}function m(e,t){var a,o,i;if(t.singleton){var r=s++;a=n||(n=f(t)),o=b.bind(null,a,r,!1),i=b.bind(null,a,r,!0)}else e.sourceMap&&"function"==typeof URL&&"function"==typeof URL.createObjectURL&&"function"==typeof URL.revokeObjectURL&&"function"==typeof Blob&&"function"==typeof btoa?(a=function(e){var t=document.createElement("link");return t.rel="stylesheet",u(e,t),t}(t),o=function(e,t){var a=t.css,o=t.sourceMap;o&&(a+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(o))))+" */");var i=new Blob([a],{type:"text/css"}),r=e.href;e.href=URL.createObjectURL(i),r&&URL.revokeObjectURL(r)}.bind(null,a),i=function(){p(a),a.href&&URL.revokeObjectURL(a.href)}):(a=f(t),o=function(e,t){var a=t.css,o=t.media;o&&e.setAttribute("media",o);if(e.styleSheet)e.styleSheet.cssText=a;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(a))}}.bind(null,a),i=function(){p(a)});return o(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;o(e=t)}else i()}}e.exports=function(e,t){if("undefined"!=typeof DEBUG&&DEBUG&&"object"!=typeof document)throw new Error("The style-loader cannot be used in a non-browser environment");void 0===(t=t||{}).singleton&&(t.singleton=i()),void 0===t.insertAt&&(t.insertAt="bottom");var o=c(e);return d(o,t),function(e){for(var i=[],r=0;r<o.length;r++){var n=o[r];(s=a[n.id]).refs--,i.push(s)}e&&d(c(e),t);for(r=0;r<i.length;r++){var s;if(0===(s=i[r]).refs){for(var l=0;l<s.parts.length;l++)s.parts[l]();delete a[s.id]}}}};var h,g=(h=[],function(e,t){return h[e]=t,h.filter(Boolean).join("\n")});function b(e,t,a,o){var i=a?"":o.css;if(e.styleSheet)e.styleSheet.cssText=g(t,i);else{var r=document.createTextNode(i),n=e.childNodes;n[t]&&e.removeChild(n[t]),n.length?e.insertBefore(r,n[t]):e.appendChild(r)}}},20:function(e,t,a){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=307)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},13:function(e,t){e.exports=a(11)},20:function(e,t){e.exports=a(22)},307:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(308),r=(o=i)&&o.__esModule?o:{default:o};t.default=r.default},308:function(e,t,a){"use strict";t.__esModule=!0;var o=s(a(4)),i=s(a(309)),r=a(13),n=a(20);function s(e){return e&&e.__esModule?e:{default:e}}var l=o.default.extend(i.default),d=void 0,c=[],u=1,p=function e(t){if(!o.default.prototype.$isServer){"string"==typeof(t=t||{})&&(t={message:t});var a=t.onClose,i="message_"+u++;return t.onClose=function(){e.close(i,a)},(d=new l({data:t})).id=i,(0,n.isVNode)(d.message)&&(d.$slots.default=[d.message],d.message=null),d.vm=d.$mount(),document.body.appendChild(d.vm.$el),d.vm.visible=!0,d.dom=d.vm.$el,d.dom.style.zIndex=r.PopupManager.nextZIndex(),c.push(d),d.vm}};["success","warning","info","error"].forEach(function(e){p[e]=function(t){return"string"==typeof t&&(t={message:t}),t.type=e,p(t)}}),p.close=function(e,t){for(var a=0,o=c.length;a<o;a++)if(e===c[a].id){"function"==typeof t&&t(c[a]),c.splice(a,1);break}},p.closeAll=function(){for(var e=c.length-1;e>=0;e--)c[e].close()},t.default=p},309:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(310),i=a.n(o),r=a(311),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},310:function(e,t,a){"use strict";t.__esModule=!0;var o={success:"success",info:"info",warning:"warning",error:"error"};t.default={data:function(){return{visible:!1,message:"",duration:3e3,type:"info",iconClass:"",customClass:"",onClose:null,showClose:!1,closed:!1,timer:null,dangerouslyUseHTMLString:!1,center:!1}},computed:{typeClass:function(){return this.type&&!this.iconClass?"el-message__icon el-icon-"+o[this.type]:""}},watch:{closed:function(e){e&&(this.visible=!1,this.$el.addEventListener("transitionend",this.destroyElement))}},methods:{destroyElement:function(){this.$el.removeEventListener("transitionend",this.destroyElement),this.$destroy(!0),this.$el.parentNode.removeChild(this.$el)},close:function(){this.closed=!0,"function"==typeof this.onClose&&this.onClose(this)},clearTimer:function(){clearTimeout(this.timer)},startTimer:function(){var e=this;this.duration>0&&(this.timer=setTimeout(function(){e.closed||e.close()},this.duration))},keydown:function(e){27===e.keyCode&&(this.closed||this.close())}},mounted:function(){this.startTimer(),document.addEventListener("keydown",this.keydown)},beforeDestroy:function(){document.removeEventListener("keydown",this.keydown)}}},311:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("transition",{attrs:{name:"el-message-fade"}},[a("div",{directives:[{name:"show",rawName:"v-show",value:e.visible,expression:"visible"}],class:["el-message",e.type&&!e.iconClass?"el-message--"+e.type:"",e.center?"is-center":"",e.showClose?"is-closable":"",e.customClass],attrs:{role:"alert"},on:{mouseenter:e.clearTimer,mouseleave:e.startTimer}},[e.iconClass?a("i",{class:e.iconClass}):a("i",{class:e.typeClass}),e._t("default",[e.dangerouslyUseHTMLString?a("p",{staticClass:"el-message__content",domProps:{innerHTML:e._s(e.message)}}):a("p",{staticClass:"el-message__content"},[e._v(e._s(e.message))])]),e.showClose?a("i",{staticClass:"el-message__closeBtn el-icon-close",on:{click:e.close}}):e._e()],2)])},staticRenderFns:[]};t.a=o},4:function(e,t){e.exports=a(4)}})},21:function(e,t,a){"use strict";t.__esModule=!0,t.default=function(e){for(var t=1,a=arguments.length;t<a;t++){var o=arguments[t]||{};for(var i in o)if(o.hasOwnProperty(i)){var r=o[i];void 0!==r&&(e[i]=r)}}return e}},22:function(e,t,a){"use strict";t.__esModule=!0;var o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};t.isVNode=function(e){return null!==e&&"object"===(void 0===e?"undefined":o(e))&&(0,i.hasOwn)(e,"componentOptions")},t.getFirstComponentChild=function(e){return e&&e.filter(function(e){return e&&e.tag})[0]};var i=a(7)},23:function(e,t,a){"use strict";t.__esModule=!0,t.default={mounted:function(){},methods:{getMigratingConfig:function(){return{props:{},events:{}}}}}},24:function(e,t,a){"use strict";t.__esModule=!0,t.default=function(){if(r.default.prototype.$isServer)return 0;if(void 0!==n)return n;var e=document.createElement("div");e.className="el-scrollbar__wrap",e.style.visibility="hidden",e.style.width="100px",e.style.position="absolute",e.style.top="-9999px",document.body.appendChild(e);var t=e.offsetWidth;e.style.overflow="scroll";var a=document.createElement("div");a.style.width="100%",e.appendChild(a);var o=a.offsetWidth;return e.parentNode.removeChild(e),n=t-o};var o,i=a(4),r=(o=i)&&o.__esModule?o:{default:o};var n=void 0},25:function(e,t){e.exports=function(e,t){for(var a=[],o={},i=0;i<t.length;i++){var r=t[i],n=r[0],s={id:e+":"+i,css:r[1],media:r[2],sourceMap:r[3]};o[n]?o[n].parts.push(s):a.push(o[n]={id:n,parts:[s]})}return a}},26:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,".el-message__closeBtn:focus,.el-message__content:focus{outline-width:0}.el-message{min-width:380px;-webkit-box-sizing:border-box;box-sizing:border-box;border-radius:4px;border:1px solid #ebeef5;position:fixed;left:50%;top:20px;-webkit-transform:translateX(-50%);transform:translateX(-50%);background-color:#edf2fc;-webkit-transition:opacity .3s,-webkit-transform .4s;transition:opacity .3s,-webkit-transform .4s;transition:opacity .3s,transform .4s;transition:opacity .3s,transform .4s,-webkit-transform .4s;overflow:hidden;padding:15px 15px 15px 20px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.el-message.is-center{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.el-message.is-closable .el-message__content{padding-right:16px}.el-message p{margin:0}.el-message--info .el-message__content{color:#909399}.el-message--success{background-color:#f0f9eb;border-color:#e1f3d8}.el-message--success .el-message__content{color:#67c23a}.el-message--warning{background-color:#fdf6ec;border-color:#faecd8}.el-message--warning .el-message__content{color:#e6a23c}.el-message--error{background-color:#fef0f0;border-color:#fde2e2}.el-message--error .el-message__content{color:#f56c6c}.el-message__icon{margin-right:10px}.el-message__content{padding:0;font-size:14px;line-height:1}.el-message__closeBtn{position:absolute;top:50%;right:15px;-webkit-transform:translateY(-50%);transform:translateY(-50%);cursor:pointer;color:#c0c4cc;font-size:16px}.el-message__closeBtn:hover{color:#909399}.el-message .el-icon-success{color:#67c23a}.el-message .el-icon-error{color:#f56c6c}.el-message .el-icon-info{color:#909399}.el-message .el-icon-warning{color:#e6a23c}.el-message-fade-enter,.el-message-fade-leave-active{opacity:0;-webkit-transform:translate(-50%,-100%);transform:translate(-50%,-100%)}",""])},27:function(e,t,a){var o=a(28);(e.exports=a(1)(!1)).push([e.i,".el-fade-in-enter,.el-fade-in-leave-active,.el-fade-in-linear-enter,.el-fade-in-linear-leave,.el-fade-in-linear-leave-active,.fade-in-linear-enter,.fade-in-linear-leave,.fade-in-linear-leave-active{opacity:0}.el-fade-in-linear-enter-active,.el-fade-in-linear-leave-active,.fade-in-linear-enter-active,.fade-in-linear-leave-active{-webkit-transition:opacity .2s linear;transition:opacity .2s linear}.el-fade-in-enter-active,.el-fade-in-leave-active,.el-zoom-in-center-enter-active,.el-zoom-in-center-leave-active{-webkit-transition:all .3s cubic-bezier(.55,0,.1,1);transition:all .3s cubic-bezier(.55,0,.1,1)}.el-zoom-in-center-enter,.el-zoom-in-center-leave-active{opacity:0;-webkit-transform:scaleX(0);transform:scaleX(0)}.el-zoom-in-top-enter-active,.el-zoom-in-top-leave-active{opacity:1;-webkit-transform:scaleY(1);transform:scaleY(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:center top;transform-origin:center top}.el-zoom-in-top-enter,.el-zoom-in-top-leave-active{opacity:0;-webkit-transform:scaleY(0);transform:scaleY(0)}.el-zoom-in-bottom-enter-active,.el-zoom-in-bottom-leave-active{opacity:1;-webkit-transform:scaleY(1);transform:scaleY(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:center bottom;transform-origin:center bottom}.el-zoom-in-bottom-enter,.el-zoom-in-bottom-leave-active{opacity:0;-webkit-transform:scaleY(0);transform:scaleY(0)}.el-zoom-in-left-enter-active,.el-zoom-in-left-leave-active{opacity:1;-webkit-transform:scale(1);transform:scale(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:top left;transform-origin:top left}.el-zoom-in-left-enter,.el-zoom-in-left-leave-active{opacity:0;-webkit-transform:scale(.45);transform:scale(.45)}.collapse-transition{-webkit-transition:height .3s ease-in-out,padding-top .3s ease-in-out,padding-bottom .3s ease-in-out;transition:height .3s ease-in-out,padding-top .3s ease-in-out,padding-bottom .3s ease-in-out}.horizontal-collapse-transition{-webkit-transition:width .3s ease-in-out,padding-left .3s ease-in-out,padding-right .3s ease-in-out;transition:width .3s ease-in-out,padding-left .3s ease-in-out,padding-right .3s ease-in-out}.el-list-enter-active,.el-list-leave-active{-webkit-transition:all 1s;transition:all 1s}.el-list-enter,.el-list-leave-active{opacity:0;-webkit-transform:translateY(-30px);transform:translateY(-30px)}.el-opacity-transition{-webkit-transition:opacity .3s cubic-bezier(.55,0,.1,1);transition:opacity .3s cubic-bezier(.55,0,.1,1)}@font-face{font-family:element-icons;src:url("+o(a(29))+') format("woff"),url('+o(a(30))+') format("truetype");font-weight:400;font-style:normal}[class*=" el-icon-"],[class^=el-icon-]{font-family:element-icons!important;speak:none;font-style:normal;font-weight:400;font-variant:normal;text-transform:none;line-height:1;vertical-align:baseline;display:inline-block;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.el-icon-info:before{content:"\\E61A"}.el-icon-error:before{content:"\\E62C"}.el-icon-success:before{content:"\\E62D"}.el-icon-warning:before{content:"\\E62E"}.el-icon-question:before{content:"\\E634"}.el-icon-back:before{content:"\\E606"}.el-icon-arrow-left:before{content:"\\E600"}.el-icon-arrow-down:before{content:"\\E603"}.el-icon-arrow-right:before{content:"\\E604"}.el-icon-arrow-up:before{content:"\\E605"}.el-icon-caret-left:before{content:"\\E60A"}.el-icon-caret-bottom:before{content:"\\E60B"}.el-icon-caret-top:before{content:"\\E60C"}.el-icon-caret-right:before{content:"\\E60E"}.el-icon-d-arrow-left:before{content:"\\E610"}.el-icon-d-arrow-right:before{content:"\\E613"}.el-icon-minus:before{content:"\\E621"}.el-icon-plus:before{content:"\\E62B"}.el-icon-remove:before{content:"\\E635"}.el-icon-circle-plus:before{content:"\\E601"}.el-icon-remove-outline:before{content:"\\E63C"}.el-icon-circle-plus-outline:before{content:"\\E602"}.el-icon-close:before{content:"\\E60F"}.el-icon-check:before{content:"\\E611"}.el-icon-circle-close:before{content:"\\E607"}.el-icon-circle-check:before{content:"\\E639"}.el-icon-circle-close-outline:before{content:"\\E609"}.el-icon-circle-check-outline:before{content:"\\E63E"}.el-icon-zoom-out:before{content:"\\E645"}.el-icon-zoom-in:before{content:"\\E641"}.el-icon-d-caret:before{content:"\\E615"}.el-icon-sort:before{content:"\\E640"}.el-icon-sort-down:before{content:"\\E630"}.el-icon-sort-up:before{content:"\\E631"}.el-icon-tickets:before{content:"\\E63F"}.el-icon-document:before{content:"\\E614"}.el-icon-goods:before{content:"\\E618"}.el-icon-sold-out:before{content:"\\E63B"}.el-icon-news:before{content:"\\E625"}.el-icon-message:before{content:"\\E61B"}.el-icon-date:before{content:"\\E608"}.el-icon-printer:before{content:"\\E62F"}.el-icon-time:before{content:"\\E642"}.el-icon-bell:before{content:"\\E622"}.el-icon-mobile-phone:before{content:"\\E624"}.el-icon-service:before{content:"\\E63A"}.el-icon-view:before{content:"\\E643"}.el-icon-menu:before{content:"\\E620"}.el-icon-more:before{content:"\\E646"}.el-icon-more-outline:before{content:"\\E626"}.el-icon-star-on:before{content:"\\E637"}.el-icon-star-off:before{content:"\\E63D"}.el-icon-location:before{content:"\\E61D"}.el-icon-location-outline:before{content:"\\E61F"}.el-icon-phone:before{content:"\\E627"}.el-icon-phone-outline:before{content:"\\E628"}.el-icon-picture:before{content:"\\E629"}.el-icon-picture-outline:before{content:"\\E62A"}.el-icon-delete:before{content:"\\E612"}.el-icon-search:before{content:"\\E619"}.el-icon-edit:before{content:"\\E61C"}.el-icon-edit-outline:before{content:"\\E616"}.el-icon-rank:before{content:"\\E632"}.el-icon-refresh:before{content:"\\E633"}.el-icon-share:before{content:"\\E636"}.el-icon-setting:before{content:"\\E638"}.el-icon-upload:before{content:"\\E60D"}.el-icon-upload2:before{content:"\\E644"}.el-icon-download:before{content:"\\E617"}.el-icon-loading:before{content:"\\E61E"}.el-icon-loading{-webkit-animation:rotating 2s linear infinite;animation:rotating 2s linear infinite}.el-icon--right{margin-left:5px}.el-icon--left{margin-right:5px}@-webkit-keyframes rotating{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes rotating{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}',""])},28:function(e,t){e.exports=function(e){return"string"!=typeof e?e:(/^['"].*['"]$/.test(e)&&(e=e.slice(1,-1)),/["'() \t\n]/.test(e)?'"'+e.replace(/"/g,'\\"').replace(/\n/g,"\\n")+'"':e)}},29:function(e,t){e.exports="/fonts/vendor/element-ui/lib/theme-chalk/element-icons.woff?2fad952a20fbbcfd1bf2ebb210dccf7a"},3:function(e,t,a){var o=a(27);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},30:function(e,t){e.exports="/fonts/vendor/element-ui/lib/theme-chalk/element-icons.ttf?6f0a76321d30f3c8120915e57f7bd77e"},31:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(4),r=(o=i)&&o.__esModule?o:{default:o},n=a(5);var s=!1,l=!1,d=2e3,c=function(){if(!r.default.prototype.$isServer){var e=p.modalDom;return e?s=!0:(s=!1,e=document.createElement("div"),p.modalDom=e,e.addEventListener("touchmove",function(e){e.preventDefault(),e.stopPropagation()}),e.addEventListener("click",function(){p.doOnModalClick&&p.doOnModalClick()})),e}},u={},p={modalFade:!0,getInstance:function(e){return u[e]},register:function(e,t){e&&t&&(u[e]=t)},deregister:function(e){e&&(u[e]=null,delete u[e])},nextZIndex:function(){return p.zIndex++},modalStack:[],doOnModalClick:function(){var e=p.modalStack[p.modalStack.length-1];if(e){var t=p.getInstance(e.id);t&&t.closeOnClickModal&&t.close()}},openModal:function(e,t,a,o,i){if(!r.default.prototype.$isServer&&e&&void 0!==t){this.modalFade=i;for(var l=this.modalStack,d=0,u=l.length;d<u;d++){if(l[d].id===e)return}var p=c();if((0,n.addClass)(p,"v-modal"),this.modalFade&&!s&&(0,n.addClass)(p,"v-modal-enter"),o)o.trim().split(/\s+/).forEach(function(e){return(0,n.addClass)(p,e)});setTimeout(function(){(0,n.removeClass)(p,"v-modal-enter")},200),a&&a.parentNode&&11!==a.parentNode.nodeType?a.parentNode.appendChild(p):document.body.appendChild(p),t&&(p.style.zIndex=t),p.tabIndex=0,p.style.display="",this.modalStack.push({id:e,zIndex:t,modalClass:o})}},closeModal:function(e){var t=this.modalStack,a=c();if(t.length>0){var o=t[t.length-1];if(o.id===e){if(o.modalClass)o.modalClass.trim().split(/\s+/).forEach(function(e){return(0,n.removeClass)(a,e)});t.pop(),t.length>0&&(a.style.zIndex=t[t.length-1].zIndex)}else for(var i=t.length-1;i>=0;i--)if(t[i].id===e){t.splice(i,1);break}}0===t.length&&(this.modalFade&&(0,n.addClass)(a,"v-modal-leave"),setTimeout(function(){0===t.length&&(a.parentNode&&a.parentNode.removeChild(a),a.style.display="none",p.modalDom=void 0),(0,n.removeClass)(a,"v-modal-leave")},200))}};Object.defineProperty(p,"zIndex",{configurable:!0,get:function(){return l||(d=(r.default.prototype.$ELEMENT||{}).zIndex||d,l=!0),d},set:function(e){d=e}});r.default.prototype.$isServer||window.addEventListener("keydown",function(e){if(27===e.keyCode){var t=function(){if(!r.default.prototype.$isServer&&p.modalStack.length>0){var e=p.modalStack[p.modalStack.length-1];if(!e)return;return p.getInstance(e.id)}}();t&&t.closeOnPressEscape&&(t.handleClose?t.handleClose():t.handleAction?t.handleAction("cancel"):t.close())}}),t.default=p},310:function(e,t,a){e.exports=a(311)},311:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});a(54);a(68);var o=a(98),i=new o(".swiper-container1",{effect:"fade",fade:{crossFade:!0}});new o(".swiper-container",{pagination:".swiper-pagination",effect:"fade",width:770,autoplay:5e3,autoplayDisableOnInteraction:!1,onTransitionEnd:function(e){console.log(e.activeIndex),i.slideTo(e.activeIndex)}});$(".list-body-content").each(function(){$(this).text().trim().length>90&&$(this).text($(this).text().trim().slice(0,90)+"......")})},32:function(e,t,a){var o=a(33);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},33:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,'.el-button{display:inline-block;line-height:1;white-space:nowrap;cursor:pointer;background:#fff;border:1px solid #dcdfe6;color:#606266;-webkit-appearance:none;text-align:center;-webkit-box-sizing:border-box;box-sizing:border-box;outline:0;margin:0;-webkit-transition:.1s;transition:.1s;font-weight:500;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;padding:12px 20px;font-size:14px;border-radius:4px}.el-button+.el-button{margin-left:10px}.el-button:focus,.el-button:hover{color:#409eff;border-color:#c6e2ff;background-color:#ecf5ff}.el-button:active{color:#3a8ee6;border-color:#3a8ee6;outline:0}.el-button::-moz-focus-inner{border:0}.el-button [class*=el-icon-]+span{margin-left:5px}.el-button.is-plain:focus,.el-button.is-plain:hover{background:#fff;border-color:#409eff;color:#409eff}.el-button.is-active,.el-button.is-plain:active{color:#3a8ee6;border-color:#3a8ee6}.el-button.is-plain:active{background:#fff;outline:0}.el-button.is-disabled,.el-button.is-disabled:focus,.el-button.is-disabled:hover{color:#c0c4cc;cursor:not-allowed;background-image:none;background-color:#fff;border-color:#ebeef5}.el-button.is-disabled.el-button--text{background-color:transparent}.el-button.is-disabled.is-plain,.el-button.is-disabled.is-plain:focus,.el-button.is-disabled.is-plain:hover{background-color:#fff;border-color:#ebeef5;color:#c0c4cc}.el-button.is-loading{position:relative;pointer-events:none}.el-button.is-loading:before{pointer-events:none;content:"";position:absolute;left:-1px;top:-1px;right:-1px;bottom:-1px;border-radius:inherit;background-color:hsla(0,0%,100%,.35)}.el-button.is-round{border-radius:20px;padding:12px 23px}.el-button.is-circle{border-radius:50%;padding:12px}.el-button--primary{color:#fff;background-color:#409eff;border-color:#409eff}.el-button--primary:focus,.el-button--primary:hover{background:#66b1ff;border-color:#66b1ff;color:#fff}.el-button--primary.is-active,.el-button--primary:active{background:#3a8ee6;border-color:#3a8ee6;color:#fff}.el-button--primary:active{outline:0}.el-button--primary.is-disabled,.el-button--primary.is-disabled:active,.el-button--primary.is-disabled:focus,.el-button--primary.is-disabled:hover{color:#fff;background-color:#a0cfff;border-color:#a0cfff}.el-button--primary.is-plain{color:#409eff;background:#ecf5ff;border-color:#b3d8ff}.el-button--primary.is-plain:focus,.el-button--primary.is-plain:hover{background:#409eff;border-color:#409eff;color:#fff}.el-button--primary.is-plain:active{background:#3a8ee6;border-color:#3a8ee6;color:#fff;outline:0}.el-button--primary.is-plain.is-disabled,.el-button--primary.is-plain.is-disabled:active,.el-button--primary.is-plain.is-disabled:focus,.el-button--primary.is-plain.is-disabled:hover{color:#8cc5ff;background-color:#ecf5ff;border-color:#d9ecff}.el-button--success{color:#fff;background-color:#67c23a;border-color:#67c23a}.el-button--success:focus,.el-button--success:hover{background:#85ce61;border-color:#85ce61;color:#fff}.el-button--success.is-active,.el-button--success:active{background:#5daf34;border-color:#5daf34;color:#fff}.el-button--success:active{outline:0}.el-button--success.is-disabled,.el-button--success.is-disabled:active,.el-button--success.is-disabled:focus,.el-button--success.is-disabled:hover{color:#fff;background-color:#b3e19d;border-color:#b3e19d}.el-button--success.is-plain{color:#67c23a;background:#f0f9eb;border-color:#c2e7b0}.el-button--success.is-plain:focus,.el-button--success.is-plain:hover{background:#67c23a;border-color:#67c23a;color:#fff}.el-button--success.is-plain:active{background:#5daf34;border-color:#5daf34;color:#fff;outline:0}.el-button--success.is-plain.is-disabled,.el-button--success.is-plain.is-disabled:active,.el-button--success.is-plain.is-disabled:focus,.el-button--success.is-plain.is-disabled:hover{color:#a4da89;background-color:#f0f9eb;border-color:#e1f3d8}.el-button--warning{color:#fff;background-color:#e6a23c;border-color:#e6a23c}.el-button--warning:focus,.el-button--warning:hover{background:#ebb563;border-color:#ebb563;color:#fff}.el-button--warning.is-active,.el-button--warning:active{background:#cf9236;border-color:#cf9236;color:#fff}.el-button--warning:active{outline:0}.el-button--warning.is-disabled,.el-button--warning.is-disabled:active,.el-button--warning.is-disabled:focus,.el-button--warning.is-disabled:hover{color:#fff;background-color:#f3d19e;border-color:#f3d19e}.el-button--warning.is-plain{color:#e6a23c;background:#fdf6ec;border-color:#f5dab1}.el-button--warning.is-plain:focus,.el-button--warning.is-plain:hover{background:#e6a23c;border-color:#e6a23c;color:#fff}.el-button--warning.is-plain:active{background:#cf9236;border-color:#cf9236;color:#fff;outline:0}.el-button--warning.is-plain.is-disabled,.el-button--warning.is-plain.is-disabled:active,.el-button--warning.is-plain.is-disabled:focus,.el-button--warning.is-plain.is-disabled:hover{color:#f0c78a;background-color:#fdf6ec;border-color:#faecd8}.el-button--danger{color:#fff;background-color:#f56c6c;border-color:#f56c6c}.el-button--danger:focus,.el-button--danger:hover{background:#f78989;border-color:#f78989;color:#fff}.el-button--danger.is-active,.el-button--danger:active{background:#dd6161;border-color:#dd6161;color:#fff}.el-button--danger:active{outline:0}.el-button--danger.is-disabled,.el-button--danger.is-disabled:active,.el-button--danger.is-disabled:focus,.el-button--danger.is-disabled:hover{color:#fff;background-color:#fab6b6;border-color:#fab6b6}.el-button--danger.is-plain{color:#f56c6c;background:#fef0f0;border-color:#fbc4c4}.el-button--danger.is-plain:focus,.el-button--danger.is-plain:hover{background:#f56c6c;border-color:#f56c6c;color:#fff}.el-button--danger.is-plain:active{background:#dd6161;border-color:#dd6161;color:#fff;outline:0}.el-button--danger.is-plain.is-disabled,.el-button--danger.is-plain.is-disabled:active,.el-button--danger.is-plain.is-disabled:focus,.el-button--danger.is-plain.is-disabled:hover{color:#f9a7a7;background-color:#fef0f0;border-color:#fde2e2}.el-button--info{color:#fff;background-color:#909399;border-color:#909399}.el-button--info:focus,.el-button--info:hover{background:#a6a9ad;border-color:#a6a9ad;color:#fff}.el-button--info.is-active,.el-button--info:active{background:#82848a;border-color:#82848a;color:#fff}.el-button--info:active{outline:0}.el-button--info.is-disabled,.el-button--info.is-disabled:active,.el-button--info.is-disabled:focus,.el-button--info.is-disabled:hover{color:#fff;background-color:#c8c9cc;border-color:#c8c9cc}.el-button--info.is-plain{color:#909399;background:#f4f4f5;border-color:#d3d4d6}.el-button--info.is-plain:focus,.el-button--info.is-plain:hover{background:#909399;border-color:#909399;color:#fff}.el-button--info.is-plain:active{background:#82848a;border-color:#82848a;color:#fff;outline:0}.el-button--info.is-plain.is-disabled,.el-button--info.is-plain.is-disabled:active,.el-button--info.is-plain.is-disabled:focus,.el-button--info.is-plain.is-disabled:hover{color:#bcbec2;background-color:#f4f4f5;border-color:#e9e9eb}.el-button--text,.el-button--text.is-disabled,.el-button--text.is-disabled:focus,.el-button--text.is-disabled:hover,.el-button--text:active{border-color:transparent}.el-button--medium{padding:10px 20px;font-size:14px;border-radius:4px}.el-button--mini,.el-button--small{font-size:12px;border-radius:3px}.el-button--medium.is-round{padding:10px 20px}.el-button--medium.is-circle{padding:10px}.el-button--small,.el-button--small.is-round{padding:9px 15px}.el-button--small.is-circle{padding:9px}.el-button--mini,.el-button--mini.is-round{padding:7px 15px}.el-button--mini.is-circle{padding:7px}.el-button--text{color:#409eff;background:0 0;padding-left:0;padding-right:0}.el-button--text:focus,.el-button--text:hover{color:#66b1ff;border-color:transparent;background-color:transparent}.el-button--text:active{color:#3a8ee6;background-color:transparent}.el-button-group{display:inline-block;vertical-align:middle}.el-button-group:after,.el-button-group:before{display:table;content:""}.el-button-group:after{clear:both}.el-button-group .el-button{float:left;position:relative}.el-button-group .el-button+.el-button{margin-left:0}.el-button-group .el-button:first-child{border-top-right-radius:0;border-bottom-right-radius:0}.el-button-group .el-button:last-child{border-top-left-radius:0;border-bottom-left-radius:0}.el-button-group .el-button:first-child:last-child{border-radius:4px}.el-button-group .el-button:first-child:last-child.is-round{border-radius:20px}.el-button-group .el-button:first-child:last-child.is-circle{border-radius:50%}.el-button-group .el-button:not(:first-child):not(:last-child){border-radius:0}.el-button-group .el-button:not(:last-child){margin-right:-1px}.el-button-group .el-button.is-active,.el-button-group .el-button:active,.el-button-group .el-button:focus,.el-button-group .el-button:hover{z-index:1}.el-button-group .el-button--primary:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--primary:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--primary:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--success:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--success:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--success:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--warning:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--warning:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--warning:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--danger:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--danger:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--danger:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--info:first-child{border-right-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--info:last-child{border-left-color:hsla(0,0%,100%,.5)}.el-button-group .el-button--info:not(:first-child):not(:last-child){border-left-color:hsla(0,0%,100%,.5);border-right-color:hsla(0,0%,100%,.5)}',""])},34:function(e,t){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=151)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},151:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(152),r=(o=i)&&o.__esModule?o:{default:o};r.default.install=function(e){e.component(r.default.name,r.default)},t.default=r.default},152:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(153),i=a.n(o),r=a(154),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},153:function(e,t,a){"use strict";t.__esModule=!0,t.default={name:"ElButton",inject:{elForm:{default:""},elFormItem:{default:""}},props:{type:{type:String,default:"default"},size:String,icon:{type:String,default:""},nativeType:{type:String,default:"button"},loading:Boolean,disabled:Boolean,plain:Boolean,autofocus:Boolean,round:Boolean,circle:Boolean},computed:{_elFormItemSize:function(){return(this.elFormItem||{}).elFormItemSize},buttonSize:function(){return this.size||this._elFormItemSize||(this.$ELEMENT||{}).size},buttonDisabled:function(){return this.disabled||(this.elForm||{}).disabled}},methods:{handleClick:function(e){this.$emit("click",e)}}}},154:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("button",{staticClass:"el-button",class:[e.type?"el-button--"+e.type:"",e.buttonSize?"el-button--"+e.buttonSize:"",{"is-disabled":e.buttonDisabled,"is-loading":e.loading,"is-plain":e.plain,"is-round":e.round,"is-circle":e.circle}],attrs:{disabled:e.buttonDisabled||e.loading,autofocus:e.autofocus,type:e.nativeType},on:{click:e.handleClick}},[e.loading?a("i",{staticClass:"el-icon-loading"}):e._e(),e.icon&&!e.loading?a("i",{class:e.icon}):e._e(),e.$slots.default?a("span",[e._t("default")],2):e._e()])},staticRenderFns:[]};t.a=o}})},35:function(e,t,a){"use strict";var o=a(0),i=a(14),r=a(37),n=a(8);function s(e){var t=new r(e),a=i(r.prototype.request,t);return o.extend(a,r.prototype,t),o.extend(a,t),a}var l=s(n);l.Axios=r,l.create=function(e){return s(o.merge(n,e))},l.Cancel=a(18),l.CancelToken=a(51),l.isCancel=a(17),l.all=function(e){return Promise.all(e)},l.spread=a(52),e.exports=l,e.exports.default=l},36:function(e,t){function a(e){return!!e.constructor&&"function"==typeof e.constructor.isBuffer&&e.constructor.isBuffer(e)}e.exports=function(e){return null!=e&&(a(e)||function(e){return"function"==typeof e.readFloatLE&&"function"==typeof e.slice&&a(e.slice(0,0))}(e)||!!e._isBuffer)}},37:function(e,t,a){"use strict";var o=a(8),i=a(0),r=a(46),n=a(47);function s(e){this.defaults=e,this.interceptors={request:new r,response:new r}}s.prototype.request=function(e){"string"==typeof e&&(e=i.merge({url:arguments[0]},arguments[1])),(e=i.merge(o,this.defaults,{method:"get"},e)).method=e.method.toLowerCase();var t=[n,void 0],a=Promise.resolve(e);for(this.interceptors.request.forEach(function(e){t.unshift(e.fulfilled,e.rejected)}),this.interceptors.response.forEach(function(e){t.push(e.fulfilled,e.rejected)});t.length;)a=a.then(t.shift(),t.shift());return a},i.forEach(["delete","get","head","options"],function(e){s.prototype[e]=function(t,a){return this.request(i.merge(a||{},{method:e,url:t}))}}),i.forEach(["post","put","patch"],function(e){s.prototype[e]=function(t,a,o){return this.request(i.merge(o||{},{method:e,url:t,data:a}))}}),e.exports=s},38:function(e,t,a){"use strict";var o=a(0);e.exports=function(e,t){o.forEach(e,function(a,o){o!==t&&o.toUpperCase()===t.toUpperCase()&&(e[t]=a,delete e[o])})}},39:function(e,t,a){"use strict";var o=a(16);e.exports=function(e,t,a){var i=a.config.validateStatus;a.status&&i&&!i(a.status)?t(o("Request failed with status code "+a.status,a.config,null,a.request,a)):e(a)}},40:function(e,t,a){"use strict";e.exports=function(e,t,a,o,i){return e.config=t,a&&(e.code=a),e.request=o,e.response=i,e}},41:function(e,t,a){"use strict";var o=a(0);function i(e){return encodeURIComponent(e).replace(/%40/gi,"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}e.exports=function(e,t,a){if(!t)return e;var r;if(a)r=a(t);else if(o.isURLSearchParams(t))r=t.toString();else{var n=[];o.forEach(t,function(e,t){null!==e&&void 0!==e&&(o.isArray(e)&&(t+="[]"),o.isArray(e)||(e=[e]),o.forEach(e,function(e){o.isDate(e)?e=e.toISOString():o.isObject(e)&&(e=JSON.stringify(e)),n.push(i(t)+"="+i(e))}))}),r=n.join("&")}return r&&(e+=(-1===e.indexOf("?")?"?":"&")+r),e}},42:function(e,t,a){"use strict";var o=a(0),i=["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"];e.exports=function(e){var t,a,r,n={};return e?(o.forEach(e.split("\n"),function(e){if(r=e.indexOf(":"),t=o.trim(e.substr(0,r)).toLowerCase(),a=o.trim(e.substr(r+1)),t){if(n[t]&&i.indexOf(t)>=0)return;n[t]="set-cookie"===t?(n[t]?n[t]:[]).concat([a]):n[t]?n[t]+", "+a:a}}),n):n}},43:function(e,t,a){"use strict";var o=a(0);e.exports=o.isStandardBrowserEnv()?function(){var e,t=/(msie|trident)/i.test(navigator.userAgent),a=document.createElement("a");function i(e){var o=e;return t&&(a.setAttribute("href",o),o=a.href),a.setAttribute("href",o),{href:a.href,protocol:a.protocol?a.protocol.replace(/:$/,""):"",host:a.host,search:a.search?a.search.replace(/^\?/,""):"",hash:a.hash?a.hash.replace(/^#/,""):"",hostname:a.hostname,port:a.port,pathname:"/"===a.pathname.charAt(0)?a.pathname:"/"+a.pathname}}return e=i(window.location.href),function(t){var a=o.isString(t)?i(t):t;return a.protocol===e.protocol&&a.host===e.host}}():function(){return!0}},44:function(e,t,a){"use strict";var o="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";function i(){this.message="String contains an invalid character"}i.prototype=new Error,i.prototype.code=5,i.prototype.name="InvalidCharacterError",e.exports=function(e){for(var t,a,r=String(e),n="",s=0,l=o;r.charAt(0|s)||(l="=",s%1);n+=l.charAt(63&t>>8-s%1*8)){if((a=r.charCodeAt(s+=.75))>255)throw new i;t=t<<8|a}return n}},45:function(e,t,a){"use strict";var o=a(0);e.exports=o.isStandardBrowserEnv()?{write:function(e,t,a,i,r,n){var s=[];s.push(e+"="+encodeURIComponent(t)),o.isNumber(a)&&s.push("expires="+new Date(a).toGMTString()),o.isString(i)&&s.push("path="+i),o.isString(r)&&s.push("domain="+r),!0===n&&s.push("secure"),document.cookie=s.join("; ")},read:function(e){var t=document.cookie.match(new RegExp("(^|;\\s*)("+e+")=([^;]*)"));return t?decodeURIComponent(t[3]):null},remove:function(e){this.write(e,"",Date.now()-864e5)}}:{write:function(){},read:function(){return null},remove:function(){}}},46:function(e,t,a){"use strict";var o=a(0);function i(){this.handlers=[]}i.prototype.use=function(e,t){return this.handlers.push({fulfilled:e,rejected:t}),this.handlers.length-1},i.prototype.eject=function(e){this.handlers[e]&&(this.handlers[e]=null)},i.prototype.forEach=function(e){o.forEach(this.handlers,function(t){null!==t&&e(t)})},e.exports=i},47:function(e,t,a){"use strict";var o=a(0),i=a(48),r=a(17),n=a(8),s=a(49),l=a(50);function d(e){e.cancelToken&&e.cancelToken.throwIfRequested()}e.exports=function(e){return d(e),e.baseURL&&!s(e.url)&&(e.url=l(e.baseURL,e.url)),e.headers=e.headers||{},e.data=i(e.data,e.headers,e.transformRequest),e.headers=o.merge(e.headers.common||{},e.headers[e.method]||{},e.headers||{}),o.forEach(["delete","get","head","post","put","patch","common"],function(t){delete e.headers[t]}),(e.adapter||n.adapter)(e).then(function(t){return d(e),t.data=i(t.data,t.headers,e.transformResponse),t},function(t){return r(t)||(d(e),t&&t.response&&(t.response.data=i(t.response.data,t.response.headers,e.transformResponse))),Promise.reject(t)})}},48:function(e,t,a){"use strict";var o=a(0);e.exports=function(e,t,a){return o.forEach(a,function(a){e=a(e,t)}),e}},49:function(e,t,a){"use strict";e.exports=function(e){return/^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e)}},5:function(e,t,a){"use strict";t.__esModule=!0,t.getStyle=t.once=t.off=t.on=void 0;var o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};t.hasClass=m,t.addClass=function(e,t){if(!e)return;for(var a=e.className,o=(t||"").split(" "),i=0,r=o.length;i<r;i++){var n=o[i];n&&(e.classList?e.classList.add(n):m(e,n)||(a+=" "+n))}e.classList||(e.className=a)},t.removeClass=function(e,t){if(!e||!t)return;for(var a=t.split(" "),o=" "+e.className+" ",i=0,r=a.length;i<r;i++){var n=a[i];n&&(e.classList?e.classList.remove(n):m(e,n)&&(o=o.replace(" "+n+" "," ")))}e.classList||(e.className=c(o))},t.setStyle=function e(t,a,i){if(!t||!a)return;if("object"===(void 0===a?"undefined":o(a)))for(var r in a)a.hasOwnProperty(r)&&e(t,r,a[r]);else"opacity"===(a=u(a))&&d<9?t.style.filter=isNaN(i)?"":"alpha(opacity="+100*i+")":t.style[a]=i};var i,r=a(4);var n=((i=r)&&i.__esModule?i:{default:i}).default.prototype.$isServer,s=/([\:\-\_]+(.))/g,l=/^moz([A-Z])/,d=n?0:Number(document.documentMode),c=function(e){return(e||"").replace(/^[\s\uFEFF]+|[\s\uFEFF]+$/g,"")},u=function(e){return e.replace(s,function(e,t,a,o){return o?a.toUpperCase():a}).replace(l,"Moz$1")},p=t.on=!n&&document.addEventListener?function(e,t,a){e&&t&&a&&e.addEventListener(t,a,!1)}:function(e,t,a){e&&t&&a&&e.attachEvent("on"+t,a)},f=t.off=!n&&document.removeEventListener?function(e,t,a){e&&t&&e.removeEventListener(t,a,!1)}:function(e,t,a){e&&t&&e.detachEvent("on"+t,a)};t.once=function(e,t,a){p(e,t,function o(){a&&a.apply(this,arguments),f(e,t,o)})};function m(e,t){if(!e||!t)return!1;if(-1!==t.indexOf(" "))throw new Error("className should not contain space.");return e.classList?e.classList.contains(t):(" "+e.className+" ").indexOf(" "+t+" ")>-1}t.getStyle=d<9?function(e,t){if(!n){if(!e||!t)return null;"float"===(t=u(t))&&(t="styleFloat");try{switch(t){case"opacity":try{return e.filters.item("alpha").opacity/100}catch(e){return 1}default:return e.style[t]||e.currentStyle?e.currentStyle[t]:null}}catch(a){return e.style[t]}}}:function(e,t){if(!n){if(!e||!t)return null;"float"===(t=u(t))&&(t="cssFloat");try{var a=document.defaultView.getComputedStyle(e,"");return e.style[t]||a?a[t]:null}catch(a){return e.style[t]}}}},50:function(e,t,a){"use strict";e.exports=function(e,t){return t?e.replace(/\/+$/,"")+"/"+t.replace(/^\/+/,""):e}},51:function(e,t,a){"use strict";var o=a(18);function i(e){if("function"!=typeof e)throw new TypeError("executor must be a function.");var t;this.promise=new Promise(function(e){t=e});var a=this;e(function(e){a.reason||(a.reason=new o(e),t(a.reason))})}i.prototype.throwIfRequested=function(){if(this.reason)throw this.reason},i.source=function(){var e;return{token:new i(function(t){e=t}),cancel:e}},e.exports=i},52:function(e,t,a){"use strict";e.exports=function(e){return function(t){return e.apply(null,t)}}},54:function(e,t,a){"use strict";var o=a(55),i=a.n(o),r=new Vue({el:"#login",components:{login:i.a},template:'<login ref="login"/>'});$(document).on("click","a.js_login",function(){r.$refs.login.show()})},55:function(e,t,a){var o=a(9)(a(58),a(65),!1,function(e){a(56)},null,null);e.exports=o.exports},56:function(e,t,a){var o=a(57);"string"==typeof o&&(o=[[e.i,o,""]]),o.locals&&(e.exports=o.locals);a(6)("9b684dae",o,!0,{})},57:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,'body.el-popup-parent--hidden{padding-right:15px!important}.login-box .pointer{cursor:pointer}.login-box .el-dialog{margin-top:26vh!important}.login-box .el-dialog__body{padding:0 30px 40px}.login-box .el-dialog__body .title{font-family:SourceHanSansCN-Bold;font-size:22px;font-weight:400;font-stretch:normal;letter-spacing:0;color:#333}.login-box .el-dialog__body .small-title{margin-top:12px;font-family:SourceHanSansCN-Regular;font-size:14px;font-weight:400;font-stretch:normal;letter-spacing:0;color:#999}.login-box .el-dialog__body form{display:block;margin-top:35px;width:360px}.login-box .el-dialog__body form .input-box{position:relative;z-index:1;border:1px solid #ddd;height:48px;width:358px;overflow:hidden}.login-box .el-dialog__body form .input-box.error{margin-top:5px;border-color:red;z-index:6}.login-box .el-dialog__body form .input-box:nth-child(2){top:-1px}.login-box .el-dialog__body form .input-box input{border:none;width:100%;height:100%;padding-left:11px;position:absolute}.login-box .el-dialog__body form .input-box .sms-btn-box{width:110px;top:0;bottom:0;padding-top:10px;z-index:3;position:absolute;right:0;background-color:#fff;text-align:center}.login-box .el-dialog__body form .input-box .sms-btn-box button{width:100%;padding:5px 0;border-right:none;border-top:none;border-bottom:none;border-left:1px solid #ddd!important}.login-box .el-dialog__body .el-checkbox__input.is-checked+.el-checkbox__label{color:#333}.login-box .el-dialog__body .btn-box{margin-top:25px;width:300px;text-align:center}.login-box .el-dialog__body .btn-box *{color:#fff}.login-box .el-dialog__body .btn-box button{width:360px;background-color:#007bff;cursor:pointer;position:relative;overflow:hidden;z-index:3}.login-box .el-dialog__body .btn-box button:after{content:"";background:#2b8df7;display:block;position:absolute;height:100%;top:0;left:0;z-index:-1;width:0;-webkit-transition:all .5s ease;transition:all .5s ease}.login-box .el-dialog__body .btn-box button:hover:after{width:100%}.login-box .el-dialog__body .route-box{margin-top:20px}.login-box .el-dialog__body .route-box a{color:#007bff}',""])},58:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(19),i=(a.n(o),a(3)),r=(a.n(i),a(20)),n=a.n(r),s=a(32),l=(a.n(s),a(34)),d=a.n(l),c=a(59),u=(a.n(c),a(61)),p=a.n(u),f=a(62),m=(a.n(f),a(64)),h=a.n(m),g=a(12),b=h.a,v=p.a,x=d.a;t.default={components:{ElDialog:b,ElCheckbox:v,ElButton:x},data:function(){return{active:1,secondNum:0,isTel:!0,isCode:!0,checked:!0,dialogVisible:!1,tel:null,code:null}},watch:{tel:function(e){this.isTel||this.validateTel()},code:function(e){this.isCode||this.validateCode()},secondNum:function(e){var t=this;e>0&&setTimeout(function(){t.secondNum=e-1},1e3)}},methods:{show:function(){this.dialogVisible=!0},validateTel:function(){return/^1\d{10}$/.test(this.tel)?(this.isTel=!0,!0):(this.isTel=!1,!1)},validateCode:function(){return/^\d{4}$/.test(this.code)?(this.isCode=!0,!0):(this.isCode=!1,!1)},getCode:function(){var e=this;this.validateTel()&&(this.secondNum=60,Object(g.k)(this.tel).then(function(e){n()({message:"短信已发送请耐心等候",type:"success"})}).catch(function(){n()({message:"短信发送失败",type:"warning"}),e.secondNum=0}))},login:function(){this.isTel=!0,this.isCode=!0,this.validateTel()&&this.validateCode()&&Object(g.q)({tel:this.tel,smsCode:this.code}).then(function(e){e&&(n()({message:"登陆成功！即将刷新页面",type:"success"}),setTimeout(function(){window.location.reload()},1500))})}}}},59:function(e,t,a){var o=a(60);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},6:function(e,t,a){var o="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!o)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var i=a(25),r={},n=o&&(document.head||document.getElementsByTagName("head")[0]),s=null,l=0,d=!1,c=function(){},u=null,p="data-vue-ssr-id",f="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function m(e){for(var t=0;t<e.length;t++){var a=e[t],o=r[a.id];if(o){o.refs++;for(var i=0;i<o.parts.length;i++)o.parts[i](a.parts[i]);for(;i<a.parts.length;i++)o.parts.push(g(a.parts[i]));o.parts.length>a.parts.length&&(o.parts.length=a.parts.length)}else{var n=[];for(i=0;i<a.parts.length;i++)n.push(g(a.parts[i]));r[a.id]={id:a.id,refs:1,parts:n}}}}function h(){var e=document.createElement("style");return e.type="text/css",n.appendChild(e),e}function g(e){var t,a,o=document.querySelector("style["+p+'~="'+e.id+'"]');if(o){if(d)return c;o.parentNode.removeChild(o)}if(f){var i=l++;o=s||(s=h()),t=x.bind(null,o,i,!1),a=x.bind(null,o,i,!0)}else o=h(),t=function(e,t){var a=t.css,o=t.media,i=t.sourceMap;o&&e.setAttribute("media",o);u.ssrId&&e.setAttribute(p,t.id);i&&(a+="\n/*# sourceURL="+i.sources[0]+" */",a+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(i))))+" */");if(e.styleSheet)e.styleSheet.cssText=a;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(a))}}.bind(null,o),a=function(){o.parentNode.removeChild(o)};return t(e),function(o){if(o){if(o.css===e.css&&o.media===e.media&&o.sourceMap===e.sourceMap)return;t(e=o)}else a()}}e.exports=function(e,t,a,o){d=a,u=o||{};var n=i(e,t);return m(n),function(t){for(var a=[],o=0;o<n.length;o++){var s=n[o];(l=r[s.id]).refs--,a.push(l)}t?m(n=i(e,t)):n=[];for(o=0;o<a.length;o++){var l;if(0===(l=a[o]).refs){for(var d=0;d<l.parts.length;d++)l.parts[d]();delete r[l.id]}}}};var b,v=(b=[],function(e,t){return b[e]=t,b.filter(Boolean).join("\n")});function x(e,t,a,o){var i=a?"":o.css;if(e.styleSheet)e.styleSheet.cssText=v(t,i);else{var r=document.createTextNode(i),n=e.childNodes;n[t]&&e.removeChild(n[t]),n.length?e.insertBefore(r,n[t]):e.appendChild(r)}}},60:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,'.el-checkbox,.el-checkbox__input{display:inline-block;position:relative}.el-checkbox-button__inner,.el-checkbox__input{white-space:nowrap;vertical-align:middle;outline:0}.el-checkbox{color:#606266;font-weight:500;font-size:14px;cursor:pointer;white-space:nowrap;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.el-checkbox.is-bordered{padding:9px 20px 9px 10px;border-radius:4px;border:1px solid #dcdfe6;-webkit-box-sizing:border-box;box-sizing:border-box;line-height:normal;height:40px}.el-checkbox.is-bordered.is-checked{border-color:#409eff}.el-checkbox.is-bordered.is-disabled{border-color:#ebeef5;cursor:not-allowed}.el-checkbox.is-bordered+.el-checkbox.is-bordered{margin-left:10px}.el-checkbox.is-bordered.el-checkbox--medium{padding:7px 20px 7px 10px;border-radius:4px;height:36px}.el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__label{line-height:17px;font-size:14px}.el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__inner{height:14px;width:14px}.el-checkbox.is-bordered.el-checkbox--small{padding:5px 15px 5px 10px;border-radius:3px;height:32px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__label{line-height:15px;font-size:12px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner{height:12px;width:12px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner:after{height:6px;width:2px}.el-checkbox.is-bordered.el-checkbox--mini{padding:3px 15px 3px 10px;border-radius:3px;height:28px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__label{line-height:12px;font-size:12px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner{height:12px;width:12px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner:after{height:6px;width:2px}.el-checkbox__input{cursor:pointer;line-height:1}.el-checkbox__input.is-disabled .el-checkbox__inner{background-color:#edf2fc;border-color:#dcdfe6;cursor:not-allowed}.el-checkbox__input.is-disabled .el-checkbox__inner:after{cursor:not-allowed;border-color:#c0c4cc}.el-checkbox__input.is-disabled .el-checkbox__inner+.el-checkbox__label{cursor:not-allowed}.el-checkbox__input.is-disabled.is-checked .el-checkbox__inner{background-color:#f2f6fc;border-color:#dcdfe6}.el-checkbox__input.is-disabled.is-checked .el-checkbox__inner:after{border-color:#c0c4cc}.el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner{background-color:#f2f6fc;border-color:#dcdfe6}.el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner:before{background-color:#c0c4cc;border-color:#c0c4cc}.el-checkbox__input.is-checked .el-checkbox__inner,.el-checkbox__input.is-indeterminate .el-checkbox__inner{background-color:#409eff;border-color:#409eff}.el-checkbox__input.is-disabled+span.el-checkbox__label{color:#c0c4cc;cursor:not-allowed}.el-checkbox__input.is-checked .el-checkbox__inner:after{-webkit-transform:rotate(45deg) scaleY(1);transform:rotate(45deg) scaleY(1)}.el-checkbox__input.is-checked+.el-checkbox__label{color:#409eff}.el-checkbox__input.is-focus .el-checkbox__inner{border-color:#409eff}.el-checkbox__input.is-indeterminate .el-checkbox__inner:before{content:"";position:absolute;display:block;background-color:#fff;height:2px;-webkit-transform:scale(.5);transform:scale(.5);left:0;right:0;top:5px}.el-checkbox__input.is-indeterminate .el-checkbox__inner:after{display:none}.el-checkbox__inner{display:inline-block;position:relative;border:1px solid #dcdfe6;border-radius:2px;-webkit-box-sizing:border-box;box-sizing:border-box;width:14px;height:14px;background-color:#fff;z-index:1;-webkit-transition:border-color .25s cubic-bezier(.71,-.46,.29,1.46),background-color .25s cubic-bezier(.71,-.46,.29,1.46);transition:border-color .25s cubic-bezier(.71,-.46,.29,1.46),background-color .25s cubic-bezier(.71,-.46,.29,1.46)}.el-checkbox__inner:hover{border-color:#409eff}.el-checkbox__inner:after{-webkit-box-sizing:content-box;box-sizing:content-box;content:"";border:1px solid #fff;border-left:0;border-top:0;height:7px;left:4px;position:absolute;top:1px;-webkit-transform:rotate(45deg) scaleY(0);transform:rotate(45deg) scaleY(0);width:3px;-webkit-transition:-webkit-transform .15s ease-in .05s;transition:-webkit-transform .15s ease-in .05s;transition:transform .15s ease-in .05s;transition:transform .15s ease-in .05s,-webkit-transform .15s ease-in .05s;-webkit-transform-origin:center;transform-origin:center}.el-checkbox__original{opacity:0;outline:0;position:absolute;margin:0;width:0;height:0;z-index:-1}.el-checkbox-button,.el-checkbox-button__inner{display:inline-block;position:relative}.el-checkbox__label{display:inline-block;padding-left:10px;line-height:19px;font-size:14px}.el-checkbox+.el-checkbox{margin-left:30px}.el-checkbox-button__inner{line-height:1;font-weight:500;cursor:pointer;background:#fff;border:1px solid #dcdfe6;border-left:0;color:#606266;-webkit-appearance:none;text-align:center;-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;-webkit-transition:all .3s cubic-bezier(.645,.045,.355,1);transition:all .3s cubic-bezier(.645,.045,.355,1);-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;padding:12px 20px;font-size:14px;border-radius:0}.el-checkbox-button__inner.is-round{padding:12px 20px}.el-checkbox-button__inner:hover{color:#409eff}.el-checkbox-button__inner [class*=el-icon-]{line-height:.9}.el-checkbox-button__inner [class*=el-icon-]+span{margin-left:5px}.el-checkbox-button__original{opacity:0;outline:0;position:absolute;margin:0;z-index:-1}.el-checkbox-button.is-checked .el-checkbox-button__inner{color:#fff;background-color:#409eff;border-color:#409eff;-webkit-box-shadow:-1px 0 0 0 #8cc5ff;box-shadow:-1px 0 0 0 #8cc5ff}.el-checkbox-button.is-checked:first-child .el-checkbox-button__inner{border-left-color:#409eff}.el-checkbox-button.is-disabled .el-checkbox-button__inner{color:#c0c4cc;cursor:not-allowed;background-image:none;background-color:#fff;border-color:#ebeef5;-webkit-box-shadow:none;box-shadow:none}.el-checkbox-button.is-disabled:first-child .el-checkbox-button__inner{border-left-color:#ebeef5}.el-checkbox-button:first-child .el-checkbox-button__inner{border-left:1px solid #dcdfe6;border-radius:4px 0 0 4px;-webkit-box-shadow:none!important;box-shadow:none!important}.el-checkbox-button.is-focus .el-checkbox-button__inner{border-color:#409eff}.el-checkbox-button:last-child .el-checkbox-button__inner{border-radius:0 4px 4px 0}.el-checkbox-button--medium .el-checkbox-button__inner{padding:10px 20px;font-size:14px;border-radius:0}.el-checkbox-button--medium .el-checkbox-button__inner.is-round{padding:10px 20px}.el-checkbox-button--small .el-checkbox-button__inner{padding:9px 15px;font-size:12px;border-radius:0}.el-checkbox-button--small .el-checkbox-button__inner.is-round{padding:9px 15px}.el-checkbox-button--mini .el-checkbox-button__inner{padding:7px 15px;font-size:12px;border-radius:0}.el-checkbox-button--mini .el-checkbox-button__inner.is-round{padding:7px 15px}.el-checkbox-group{font-size:0}',""])},61:function(e,t,a){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=122)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},1:function(e,t){e.exports=a(10)},122:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(123),r=(o=i)&&o.__esModule?o:{default:o};r.default.install=function(e){e.component(r.default.name,r.default)},t.default=r.default},123:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(124),i=a.n(o),r=a(125),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},124:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(1),r=(o=i)&&o.__esModule?o:{default:o};t.default={name:"ElCheckbox",mixins:[r.default],inject:{elForm:{default:""},elFormItem:{default:""}},componentName:"ElCheckbox",data:function(){return{selfModel:!1,focus:!1,isLimitExceeded:!1}},computed:{model:{get:function(){return this.isGroup?this.store:void 0!==this.value?this.value:this.selfModel},set:function(e){this.isGroup?(this.isLimitExceeded=!1,void 0!==this._checkboxGroup.min&&e.length<this._checkboxGroup.min&&(this.isLimitExceeded=!0),void 0!==this._checkboxGroup.max&&e.length>this._checkboxGroup.max&&(this.isLimitExceeded=!0),!1===this.isLimitExceeded&&this.dispatch("ElCheckboxGroup","input",[e])):(this.$emit("input",e),this.selfModel=e)}},isChecked:function(){return"[object Boolean]"==={}.toString.call(this.model)?this.model:Array.isArray(this.model)?this.model.indexOf(this.label)>-1:null!==this.model&&void 0!==this.model?this.model===this.trueLabel:void 0},isGroup:function(){for(var e=this.$parent;e;){if("ElCheckboxGroup"===e.$options.componentName)return this._checkboxGroup=e,!0;e=e.$parent}return!1},store:function(){return this._checkboxGroup?this._checkboxGroup.value:this.value},isDisabled:function(){return this.isGroup?this._checkboxGroup.disabled||this.disabled||(this.elForm||{}).disabled:this.disabled||(this.elForm||{}).disabled},_elFormItemSize:function(){return(this.elFormItem||{}).elFormItemSize},checkboxSize:function(){var e=this.size||this._elFormItemSize||(this.$ELEMENT||{}).size;return this.isGroup&&this._checkboxGroup.checkboxGroupSize||e}},props:{value:{},label:{},indeterminate:Boolean,disabled:Boolean,checked:Boolean,name:String,trueLabel:[String,Number],falseLabel:[String,Number],id:String,controls:String,border:Boolean,size:String},methods:{addToStore:function(){Array.isArray(this.model)&&-1===this.model.indexOf(this.label)?this.model.push(this.label):this.model=this.trueLabel||!0},handleChange:function(e){var t=this;if(!this.isLimitExceeded){var a=void 0;a=e.target.checked?void 0===this.trueLabel||this.trueLabel:void 0!==this.falseLabel&&this.falseLabel,this.$emit("change",a,e),this.$nextTick(function(){t.isGroup&&t.dispatch("ElCheckboxGroup","change",[t._checkboxGroup.value])})}}},created:function(){this.checked&&this.addToStore()},mounted:function(){this.indeterminate&&this.$el.setAttribute("aria-controls",this.controls)},watch:{value:function(e){this.dispatch("ElFormItem","el.form.change",e)}}}},125:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("label",{staticClass:"el-checkbox",class:[e.border&&e.checkboxSize?"el-checkbox--"+e.checkboxSize:"",{"is-disabled":e.isDisabled},{"is-bordered":e.border},{"is-checked":e.isChecked}],attrs:{role:"checkbox","aria-checked":e.indeterminate?"mixed":e.isChecked,"aria-disabled":e.isDisabled,id:e.id}},[a("span",{staticClass:"el-checkbox__input",class:{"is-disabled":e.isDisabled,"is-checked":e.isChecked,"is-indeterminate":e.indeterminate,"is-focus":e.focus},attrs:{"aria-checked":"mixed"}},[a("span",{staticClass:"el-checkbox__inner"}),e.trueLabel||e.falseLabel?a("input",{directives:[{name:"model",rawName:"v-model",value:e.model,expression:"model"}],staticClass:"el-checkbox__original",attrs:{type:"checkbox","aria-hidden":"true",name:e.name,disabled:e.isDisabled,"true-value":e.trueLabel,"false-value":e.falseLabel},domProps:{checked:Array.isArray(e.model)?e._i(e.model,null)>-1:e._q(e.model,e.trueLabel)},on:{change:[function(t){var a=e.model,o=t.target,i=o.checked?e.trueLabel:e.falseLabel;if(Array.isArray(a)){var r=e._i(a,null);o.checked?r<0&&(e.model=a.concat([null])):r>-1&&(e.model=a.slice(0,r).concat(a.slice(r+1)))}else e.model=i},e.handleChange],focus:function(t){e.focus=!0},blur:function(t){e.focus=!1}}}):a("input",{directives:[{name:"model",rawName:"v-model",value:e.model,expression:"model"}],staticClass:"el-checkbox__original",attrs:{type:"checkbox","aria-hidden":"true",disabled:e.isDisabled,name:e.name},domProps:{value:e.label,checked:Array.isArray(e.model)?e._i(e.model,e.label)>-1:e.model},on:{change:[function(t){var a=e.model,o=t.target,i=!!o.checked;if(Array.isArray(a)){var r=e.label,n=e._i(a,r);o.checked?n<0&&(e.model=a.concat([r])):n>-1&&(e.model=a.slice(0,n).concat(a.slice(n+1)))}else e.model=i},e.handleChange],focus:function(t){e.focus=!0},blur:function(t){e.focus=!1}}})]),e.$slots.default||e.label?a("span",{staticClass:"el-checkbox__label"},[e._t("default"),e.$slots.default?e._e():[e._v(e._s(e.label))]],2):e._e()])},staticRenderFns:[]};t.a=o}})},62:function(e,t,a){var o=a(63);"string"==typeof o&&(o=[[e.i,o,""]]);a(2)(o,{});o.locals&&(e.exports=o.locals)},63:function(e,t,a){(e.exports=a(1)(!1)).push([e.i,".v-modal-enter{-webkit-animation:v-modal-in .2s ease;animation:v-modal-in .2s ease}.v-modal-leave{-webkit-animation:v-modal-out .2s ease forwards;animation:v-modal-out .2s ease forwards}@-webkit-keyframes v-modal-in{0%{opacity:0}}@keyframes v-modal-in{0%{opacity:0}}@-webkit-keyframes v-modal-out{to{opacity:0}}@keyframes v-modal-out{to{opacity:0}}.v-modal{position:fixed;left:0;top:0;width:100%;height:100%;opacity:.5;background:#000}.el-popup-parent--hidden{overflow:hidden}.el-dialog{position:relative;margin:0 auto 50px;background:#fff;border-radius:2px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.3);box-shadow:0 1px 3px rgba(0,0,0,.3);-webkit-box-sizing:border-box;box-sizing:border-box;width:50%}.el-dialog.is-fullscreen{width:100%;margin-top:0;margin-bottom:0;height:100%;overflow:auto}.el-dialog__wrapper{position:fixed;top:0;right:0;bottom:0;left:0;overflow:auto;margin:0}.el-dialog__header{padding:20px 20px 10px}.el-dialog__headerbtn{position:absolute;top:20px;right:20px;padding:0;background:0 0;border:none;outline:0;cursor:pointer;font-size:16px}.el-dialog__headerbtn .el-dialog__close{color:#909399}.el-dialog__headerbtn:focus .el-dialog__close,.el-dialog__headerbtn:hover .el-dialog__close{color:#409eff}.el-dialog__title{line-height:24px;font-size:18px;color:#303133}.el-dialog__body{padding:30px 20px;color:#606266;font-size:14px}.el-dialog__footer{padding:10px 20px 20px;text-align:right;-webkit-box-sizing:border-box;box-sizing:border-box}.el-dialog--center{text-align:center}.el-dialog--center .el-dialog__body{text-align:initial;padding:25px 25px 30px}.el-dialog--center .el-dialog__footer{text-align:inherit}.dialog-fade-enter-active{-webkit-animation:dialog-fade-in .3s;animation:dialog-fade-in .3s}.dialog-fade-leave-active{-webkit-animation:dialog-fade-out .3s;animation:dialog-fade-out .3s}@-webkit-keyframes dialog-fade-in{0%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}to{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}}@keyframes dialog-fade-in{0%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}to{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}}@-webkit-keyframes dialog-fade-out{0%{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}to{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}}@keyframes dialog-fade-out{0%{-webkit-transform:translateZ(0);transform:translateZ(0);opacity:1}to{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}}",""])},64:function(e,t,a){e.exports=function(e){var t={};function a(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,a),i.l=!0,i.exports}return a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/dist/",a(a.s=61)}({0:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},1:function(e,t){e.exports=a(10)},13:function(e,t){e.exports=a(11)},61:function(e,t,a){"use strict";t.__esModule=!0;var o,i=a(62),r=(o=i)&&o.__esModule?o:{default:o};r.default.install=function(e){e.component(r.default.name,r.default)},t.default=r.default},62:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=a(63),i=a.n(o),r=a(64),n=a(0)(i.a,r.a,!1,null,null,null);t.default=n.exports},63:function(e,t,a){"use strict";t.__esModule=!0;var o=n(a(13)),i=n(a(8)),r=n(a(1));function n(e){return e&&e.__esModule?e:{default:e}}t.default={name:"ElDialog",mixins:[o.default,r.default,i.default],props:{title:{type:String,default:""},modal:{type:Boolean,default:!0},modalAppendToBody:{type:Boolean,default:!0},appendToBody:{type:Boolean,default:!1},lockScroll:{type:Boolean,default:!0},closeOnClickModal:{type:Boolean,default:!0},closeOnPressEscape:{type:Boolean,default:!0},showClose:{type:Boolean,default:!0},width:String,fullscreen:Boolean,customClass:{type:String,default:""},top:{type:String,default:"15vh"},beforeClose:Function,center:{type:Boolean,default:!1}},data:function(){return{closed:!1}},watch:{visible:function(e){var t=this;e?(this.closed=!1,this.$emit("open"),this.$el.addEventListener("scroll",this.updatePopper),this.$nextTick(function(){t.$refs.dialog.scrollTop=0}),this.appendToBody&&document.body.appendChild(this.$el)):(this.$el.removeEventListener("scroll",this.updatePopper),this.closed||this.$emit("close"))}},computed:{style:function(){var e={};return this.width&&(e.width=this.width),this.fullscreen||(e.marginTop=this.top),e}},methods:{getMigratingConfig:function(){return{props:{size:"size is removed."}}},handleWrapperClick:function(){this.closeOnClickModal&&this.handleClose()},handleClose:function(){"function"==typeof this.beforeClose?this.beforeClose(this.hide):this.hide()},hide:function(e){!1!==e&&(this.$emit("update:visible",!1),this.$emit("close"),this.closed=!0)},updatePopper:function(){this.broadcast("ElSelectDropdown","updatePopper"),this.broadcast("ElDropdownMenu","updatePopper")},afterLeave:function(){this.$emit("closed")}},mounted:function(){this.visible&&(this.rendered=!0,this.open(),this.appendToBody&&document.body.appendChild(this.$el))},destroyed:function(){this.appendToBody&&this.$el&&this.$el.parentNode&&this.$el.parentNode.removeChild(this.$el)}}},64:function(e,t,a){"use strict";var o={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("transition",{attrs:{name:"dialog-fade"},on:{"after-leave":e.afterLeave}},[a("div",{directives:[{name:"show",rawName:"v-show",value:e.visible,expression:"visible"}],staticClass:"el-dialog__wrapper",on:{click:function(t){if(t.target!==t.currentTarget)return null;e.handleWrapperClick(t)}}},[a("div",{ref:"dialog",staticClass:"el-dialog",class:[{"is-fullscreen":e.fullscreen,"el-dialog--center":e.center},e.customClass],style:e.style},[a("div",{staticClass:"el-dialog__header"},[e._t("title",[a("span",{staticClass:"el-dialog__title"},[e._v(e._s(e.title))])]),e.showClose?a("button",{staticClass:"el-dialog__headerbtn",attrs:{type:"button","aria-label":"Close"},on:{click:e.handleClose}},[a("i",{staticClass:"el-dialog__close el-icon el-icon-close"})]):e._e()],2),e.rendered?a("div",{staticClass:"el-dialog__body"},[e._t("default")],2):e._e(),e.$slots.footer?a("div",{staticClass:"el-dialog__footer"},[e._t("footer")],2):e._e()])])])},staticRenderFns:[]};t.a=o},8:function(e,t){e.exports=a(23)}})},65:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-dialog",{staticClass:"login-box",attrs:{visible:e.dialogVisible,width:"420px"},on:{"update:visible":function(t){e.dialogVisible=t}}},[1===e.active?a("div",[a("div",{staticClass:"title"},[e._v("手机快捷登录")]),e._v(" "),a("div",{staticClass:"small-title"},[e._v("登录享受更多楚楼网服务")]),e._v(" "),a("form",[a("div",{staticClass:"input-box"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.tel,expression:"tel"}],attrs:{type:"text",placeholder:"请输入手机号"},domProps:{value:e.tel},on:{input:function(t){t.target.composing||(e.tel=t.target.value)}}})]),e._v(" "),a("div",{staticClass:"input-box"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.code,expression:"code"}],attrs:{type:"text",placeholder:"4位短信验证码"},domProps:{value:e.code},on:{input:function(t){t.target.composing||(e.code=t.target.value)}}}),e._v(" "),a("div",{staticClass:"sms-btn-box"},[e.secondNum<=0?a("button",{staticClass:"pointer",attrs:{type:"button"},on:{click:e.getCode}},[e._v("获取验证码")]):a("button",{attrs:{type:"button"}},[e._v(e._s(e.secondNum)+"s后重新发送")])])])]),e._v(" "),a("div",{staticStyle:{position:"relative"}},[a("div",{staticStyle:{position:"absolute"}},[e.isTel?e._e():a("span",{staticStyle:{color:"red"}},[e._v("·请输入11位手机号")]),e._v(" "),e.isCode?e._e():a("span",{staticStyle:{color:"red"}},[e._v("·请输入4位短信验证码")])])]),e._v(" "),a("el-checkbox",{staticStyle:{"margin-top":"25px"},model:{value:e.checked,callback:function(t){e.checked=t},expression:"checked"}},[e._v("7天内免登录")]),e._v(" "),a("div",{staticClass:"btn-box"},[a("el-button",{attrs:{type:"primary"},on:{click:e.login}},[e._v("登录")])],1)],1):e._e()])},staticRenderFns:[]}},7:function(e,t,a){"use strict";t.__esModule=!0,t.noop=function(){},t.hasOwn=function(e,t){return o.call(e,t)},t.toObject=function(e){for(var t={},a=0;a<e.length;a++)e[a]&&i(t,e[a]);return t},t.getPropByPath=function(e,t,a){for(var o=e,i=(t=(t=t.replace(/\[(\w+)\]/g,".$1")).replace(/^\./,"")).split("."),r=0,n=i.length;r<n-1&&(o||a);++r){var s=i[r];if(!(s in o)){if(a)throw new Error("please transfer a valid prop path to form item!");break}o=o[s]}return{o:o,k:i[r],v:o?o[i[r]]:null}};var o=Object.prototype.hasOwnProperty;function i(e,t){for(var a in t)e[a]=t[a];return e}t.getValueByPath=function(e,t){for(var a=(t=t||"").split("."),o=e,i=null,r=0,n=a.length;r<n;r++){var s=a[r];if(!o)break;if(r===n-1){i=o[s];break}o=o[s]}return i};t.generateId=function(){return Math.floor(1e4*Math.random())},t.valueEquals=function(e,t){if(e===t)return!0;if(!(e instanceof Array))return!1;if(!(t instanceof Array))return!1;if(e.length!==t.length)return!1;for(var a=0;a!==e.length;++a)if(e[a]!==t[a])return!1;return!0}},8:function(e,t,a){"use strict";(function(t){var o=a(0),i=a(38),r={"Content-Type":"application/x-www-form-urlencoded"};function n(e,t){!o.isUndefined(e)&&o.isUndefined(e["Content-Type"])&&(e["Content-Type"]=t)}var s,l={adapter:("undefined"!=typeof XMLHttpRequest?s=a(15):void 0!==t&&(s=a(15)),s),transformRequest:[function(e,t){return i(t,"Content-Type"),o.isFormData(e)||o.isArrayBuffer(e)||o.isBuffer(e)||o.isStream(e)||o.isFile(e)||o.isBlob(e)?e:o.isArrayBufferView(e)?e.buffer:o.isURLSearchParams(e)?(n(t,"application/x-www-form-urlencoded;charset=utf-8"),e.toString()):o.isObject(e)?(n(t,"application/json;charset=utf-8"),JSON.stringify(e)):e}],transformResponse:[function(e){if("string"==typeof e)try{e=JSON.parse(e)}catch(e){}return e}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,validateStatus:function(e){return e>=200&&e<300}};l.headers={common:{Accept:"application/json, text/plain, */*"}},o.forEach(["delete","get","head"],function(e){l.headers[e]={}}),o.forEach(["post","put","patch"],function(e){l.headers[e]=o.merge(r)}),e.exports=l}).call(t,a(69))},9:function(e,t){e.exports=function(e,t,a,o,i,r){var n,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(n=e,s=e.default);var d,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId=i),r?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=d):o&&(d=o),d){var u=c.functional,p=u?c.render:c.beforeCreate;u?(c._injectStyles=d,c.render=function(e,t){return d.call(t),p(e,t)}):c.beforeCreate=p?[].concat(p,d):[d]}return{esModule:n,exports:s,options:c}}},98:function(e,t,a){!function(){"use strict";var e,t,a,o=function(t,a){if(!(this instanceof o))return new o(t,a);var i={direction:"horizontal",touchEventsTarget:"container",initialSlide:0,speed:300,autoplay:!1,autoplayDisableOnInteraction:!0,autoplayStopOnLast:!1,iOSEdgeSwipeDetection:!1,iOSEdgeSwipeThreshold:20,freeMode:!1,freeModeMomentum:!0,freeModeMomentumRatio:1,freeModeMomentumBounce:!0,freeModeMomentumBounceRatio:1,freeModeMomentumVelocityRatio:1,freeModeSticky:!1,freeModeMinimumVelocity:.02,autoHeight:!1,setWrapperSize:!1,virtualTranslate:!1,effect:"slide",coverflow:{rotate:50,stretch:0,depth:100,modifier:1,slideShadows:!0},flip:{slideShadows:!0,limitRotation:!0},cube:{slideShadows:!0,shadow:!0,shadowOffset:20,shadowScale:.94},fade:{crossFade:!1},parallax:!1,zoom:!1,zoomMax:3,zoomMin:1,zoomToggle:!0,scrollbar:null,scrollbarHide:!0,scrollbarDraggable:!1,scrollbarSnapOnRelease:!1,keyboardControl:!1,mousewheelControl:!1,mousewheelReleaseOnEdges:!1,mousewheelInvert:!1,mousewheelForceToAxis:!1,mousewheelSensitivity:1,mousewheelEventsTarged:"container",hashnav:!1,hashnavWatchState:!1,history:!1,replaceState:!1,breakpoints:void 0,spaceBetween:0,slidesPerView:1,slidesPerColumn:1,slidesPerColumnFill:"column",slidesPerGroup:1,centeredSlides:!1,slidesOffsetBefore:0,slidesOffsetAfter:0,roundLengths:!1,touchRatio:1,touchAngle:45,simulateTouch:!0,shortSwipes:!0,longSwipes:!0,longSwipesRatio:.5,longSwipesMs:300,followFinger:!0,onlyExternal:!1,threshold:0,touchMoveStopPropagation:!0,touchReleaseOnEdges:!1,uniqueNavElements:!0,pagination:null,paginationElement:"span",paginationClickable:!1,paginationHide:!1,paginationBulletRender:null,paginationProgressRender:null,paginationFractionRender:null,paginationCustomRender:null,paginationType:"bullets",resistance:!0,resistanceRatio:.85,nextButton:null,prevButton:null,watchSlidesProgress:!1,watchSlidesVisibility:!1,grabCursor:!1,preventClicks:!0,preventClicksPropagation:!0,slideToClickedSlide:!1,lazyLoading:!1,lazyLoadingInPrevNext:!1,lazyLoadingInPrevNextAmount:1,lazyLoadingOnTransitionStart:!1,preloadImages:!0,updateOnImagesReady:!0,loop:!1,loopAdditionalSlides:0,loopedSlides:null,control:void 0,controlInverse:!1,controlBy:"slide",normalizeSlideIndex:!0,allowSwipeToPrev:!0,allowSwipeToNext:!0,swipeHandler:null,noSwiping:!0,noSwipingClass:"swiper-no-swiping",passiveListeners:!0,containerModifierClass:"swiper-container-",slideClass:"swiper-slide",slideActiveClass:"swiper-slide-active",slideDuplicateActiveClass:"swiper-slide-duplicate-active",slideVisibleClass:"swiper-slide-visible",slideDuplicateClass:"swiper-slide-duplicate",slideNextClass:"swiper-slide-next",slideDuplicateNextClass:"swiper-slide-duplicate-next",slidePrevClass:"swiper-slide-prev",slideDuplicatePrevClass:"swiper-slide-duplicate-prev",wrapperClass:"swiper-wrapper",bulletClass:"swiper-pagination-bullet",bulletActiveClass:"swiper-pagination-bullet-active",buttonDisabledClass:"swiper-button-disabled",paginationCurrentClass:"swiper-pagination-current",paginationTotalClass:"swiper-pagination-total",paginationHiddenClass:"swiper-pagination-hidden",paginationProgressbarClass:"swiper-pagination-progressbar",paginationClickableClass:"swiper-pagination-clickable",paginationModifierClass:"swiper-pagination-",lazyLoadingClass:"swiper-lazy",lazyStatusLoadingClass:"swiper-lazy-loading",lazyStatusLoadedClass:"swiper-lazy-loaded",lazyPreloaderClass:"swiper-lazy-preloader",notificationClass:"swiper-notification",preloaderClass:"preloader",zoomContainerClass:"swiper-zoom-container",observer:!1,observeParents:!1,a11y:!1,prevSlideMessage:"Previous slide",nextSlideMessage:"Next slide",firstSlideMessage:"This is the first slide",lastSlideMessage:"This is the last slide",paginationBulletMessage:"Go to slide {{index}}",runCallbacksOnInit:!0},n=a&&a.virtualTranslate;a=a||{};var s={};for(var l in a)if("object"!=typeof a[l]||null===a[l]||(a[l].nodeType||a[l]===window||a[l]===document||void 0!==r&&a[l]instanceof r||"undefined"!=typeof jQuery&&a[l]instanceof jQuery))s[l]=a[l];else for(var d in s[l]={},a[l])s[l][d]=a[l][d];for(var c in i)if(void 0===a[c])a[c]=i[c];else if("object"==typeof a[c])for(var u in i[c])void 0===a[c][u]&&(a[c][u]=i[c][u]);var p=this;if(p.params=a,p.originalParams=s,p.classNames=[],void 0!==e&&void 0!==r&&(e=r),(void 0!==e||(e=void 0===r?window.Dom7||window.Zepto||window.jQuery:r))&&(p.$=e,p.currentBreakpoint=void 0,p.getActiveBreakpoint=function(){if(!p.params.breakpoints)return!1;var e,t=!1,a=[];for(e in p.params.breakpoints)p.params.breakpoints.hasOwnProperty(e)&&a.push(e);a.sort(function(e,t){return parseInt(e,10)>parseInt(t,10)});for(var o=0;o<a.length;o++)(e=a[o])>=window.innerWidth&&!t&&(t=e);return t||"max"},p.setBreakpoint=function(){var e=p.getActiveBreakpoint();if(e&&p.currentBreakpoint!==e){var t=e in p.params.breakpoints?p.params.breakpoints[e]:p.originalParams,a=p.params.loop&&t.slidesPerView!==p.params.slidesPerView;for(var o in t)p.params[o]=t[o];p.currentBreakpoint=e,a&&p.destroyLoop&&p.reLoop(!0)}},p.params.breakpoints&&p.setBreakpoint(),p.container=e(t),0!==p.container.length)){if(p.container.length>1){var f=[];return p.container.each(function(){f.push(new o(this,a))}),f}p.container[0].swiper=p,p.container.data("swiper",p),p.classNames.push(p.params.containerModifierClass+p.params.direction),p.params.freeMode&&p.classNames.push(p.params.containerModifierClass+"free-mode"),p.support.flexbox||(p.classNames.push(p.params.containerModifierClass+"no-flexbox"),p.params.slidesPerColumn=1),p.params.autoHeight&&p.classNames.push(p.params.containerModifierClass+"autoheight"),(p.params.parallax||p.params.watchSlidesVisibility)&&(p.params.watchSlidesProgress=!0),p.params.touchReleaseOnEdges&&(p.params.resistanceRatio=0),["cube","coverflow","flip"].indexOf(p.params.effect)>=0&&(p.support.transforms3d?(p.params.watchSlidesProgress=!0,p.classNames.push(p.params.containerModifierClass+"3d")):p.params.effect="slide"),"slide"!==p.params.effect&&p.classNames.push(p.params.containerModifierClass+p.params.effect),"cube"===p.params.effect&&(p.params.resistanceRatio=0,p.params.slidesPerView=1,p.params.slidesPerColumn=1,p.params.slidesPerGroup=1,p.params.centeredSlides=!1,p.params.spaceBetween=0,p.params.virtualTranslate=!0),"fade"!==p.params.effect&&"flip"!==p.params.effect||(p.params.slidesPerView=1,p.params.slidesPerColumn=1,p.params.slidesPerGroup=1,p.params.watchSlidesProgress=!0,p.params.spaceBetween=0,void 0===n&&(p.params.virtualTranslate=!0)),p.params.grabCursor&&p.support.touch&&(p.params.grabCursor=!1),p.wrapper=p.container.children("."+p.params.wrapperClass),p.params.pagination&&(p.paginationContainer=e(p.params.pagination),p.params.uniqueNavElements&&"string"==typeof p.params.pagination&&p.paginationContainer.length>1&&1===p.container.find(p.params.pagination).length&&(p.paginationContainer=p.container.find(p.params.pagination)),"bullets"===p.params.paginationType&&p.params.paginationClickable?p.paginationContainer.addClass(p.params.paginationModifierClass+"clickable"):p.params.paginationClickable=!1,p.paginationContainer.addClass(p.params.paginationModifierClass+p.params.paginationType)),(p.params.nextButton||p.params.prevButton)&&(p.params.nextButton&&(p.nextButton=e(p.params.nextButton),p.params.uniqueNavElements&&"string"==typeof p.params.nextButton&&p.nextButton.length>1&&1===p.container.find(p.params.nextButton).length&&(p.nextButton=p.container.find(p.params.nextButton))),p.params.prevButton&&(p.prevButton=e(p.params.prevButton),p.params.uniqueNavElements&&"string"==typeof p.params.prevButton&&p.prevButton.length>1&&1===p.container.find(p.params.prevButton).length&&(p.prevButton=p.container.find(p.params.prevButton)))),p.isHorizontal=function(){return"horizontal"===p.params.direction},p.rtl=p.isHorizontal()&&("rtl"===p.container[0].dir.toLowerCase()||"rtl"===p.container.css("direction")),p.rtl&&p.classNames.push(p.params.containerModifierClass+"rtl"),p.rtl&&(p.wrongRTL="-webkit-box"===p.wrapper.css("display")),p.params.slidesPerColumn>1&&p.classNames.push(p.params.containerModifierClass+"multirow"),p.device.android&&p.classNames.push(p.params.containerModifierClass+"android"),p.container.addClass(p.classNames.join(" ")),p.translate=0,p.progress=0,p.velocity=0,p.lockSwipeToNext=function(){p.params.allowSwipeToNext=!1,!1===p.params.allowSwipeToPrev&&p.params.grabCursor&&p.unsetGrabCursor()},p.lockSwipeToPrev=function(){p.params.allowSwipeToPrev=!1,!1===p.params.allowSwipeToNext&&p.params.grabCursor&&p.unsetGrabCursor()},p.lockSwipes=function(){p.params.allowSwipeToNext=p.params.allowSwipeToPrev=!1,p.params.grabCursor&&p.unsetGrabCursor()},p.unlockSwipeToNext=function(){p.params.allowSwipeToNext=!0,!0===p.params.allowSwipeToPrev&&p.params.grabCursor&&p.setGrabCursor()},p.unlockSwipeToPrev=function(){p.params.allowSwipeToPrev=!0,!0===p.params.allowSwipeToNext&&p.params.grabCursor&&p.setGrabCursor()},p.unlockSwipes=function(){p.params.allowSwipeToNext=p.params.allowSwipeToPrev=!0,p.params.grabCursor&&p.setGrabCursor()},p.setGrabCursor=function(e){p.container[0].style.cursor="move",p.container[0].style.cursor=e?"-webkit-grabbing":"-webkit-grab",p.container[0].style.cursor=e?"-moz-grabbin":"-moz-grab",p.container[0].style.cursor=e?"grabbing":"grab"},p.unsetGrabCursor=function(){p.container[0].style.cursor=""},p.params.grabCursor&&p.setGrabCursor(),p.imagesToLoad=[],p.imagesLoaded=0,p.loadImage=function(e,t,a,o,i,r){var n;function s(){r&&r()}e.complete&&i?s():t?((n=new window.Image).onload=s,n.onerror=s,o&&(n.sizes=o),a&&(n.srcset=a),t&&(n.src=t)):s()},p.preloadImages=function(){function e(){void 0!==p&&null!==p&&p&&(void 0!==p.imagesLoaded&&p.imagesLoaded++,p.imagesLoaded===p.imagesToLoad.length&&(p.params.updateOnImagesReady&&p.update(),p.emit("onImagesReady",p)))}p.imagesToLoad=p.container.find("img");for(var t=0;t<p.imagesToLoad.length;t++)p.loadImage(p.imagesToLoad[t],p.imagesToLoad[t].currentSrc||p.imagesToLoad[t].getAttribute("src"),p.imagesToLoad[t].srcset||p.imagesToLoad[t].getAttribute("srcset"),p.imagesToLoad[t].sizes||p.imagesToLoad[t].getAttribute("sizes"),!0,e)},p.autoplayTimeoutId=void 0,p.autoplaying=!1,p.autoplayPaused=!1,p.startAutoplay=function(){return void 0===p.autoplayTimeoutId&&(!!p.params.autoplay&&(!p.autoplaying&&(p.autoplaying=!0,p.emit("onAutoplayStart",p),void L())))},p.stopAutoplay=function(e){p.autoplayTimeoutId&&(p.autoplayTimeoutId&&clearTimeout(p.autoplayTimeoutId),p.autoplaying=!1,p.autoplayTimeoutId=void 0,p.emit("onAutoplayStop",p))},p.pauseAutoplay=function(e){p.autoplayPaused||(p.autoplayTimeoutId&&clearTimeout(p.autoplayTimeoutId),p.autoplayPaused=!0,0===e?(p.autoplayPaused=!1,L()):p.wrapper.transitionEnd(function(){p&&(p.autoplayPaused=!1,p.autoplaying?L():p.stopAutoplay())}))},p.minTranslate=function(){return-p.snapGrid[0]},p.maxTranslate=function(){return-p.snapGrid[p.snapGrid.length-1]},p.updateAutoHeight=function(){var e,t=[],a=0;if("auto"!==p.params.slidesPerView&&p.params.slidesPerView>1)for(e=0;e<Math.ceil(p.params.slidesPerView);e++){var o=p.activeIndex+e;if(o>p.slides.length)break;t.push(p.slides.eq(o)[0])}else t.push(p.slides.eq(p.activeIndex)[0]);for(e=0;e<t.length;e++)if(void 0!==t[e]){var i=t[e].offsetHeight;a=i>a?i:a}a&&p.wrapper.css("height",a+"px")},p.updateContainerSize=function(){var e,t;e=void 0!==p.params.width?p.params.width:p.container[0].clientWidth,t=void 0!==p.params.height?p.params.height:p.container[0].clientHeight,0===e&&p.isHorizontal()||0===t&&!p.isHorizontal()||(e=e-parseInt(p.container.css("padding-left"),10)-parseInt(p.container.css("padding-right"),10),t=t-parseInt(p.container.css("padding-top"),10)-parseInt(p.container.css("padding-bottom"),10),p.width=e,p.height=t,p.size=p.isHorizontal()?p.width:p.height)},p.updateSlidesSize=function(){p.slides=p.wrapper.children("."+p.params.slideClass),p.snapGrid=[],p.slidesGrid=[],p.slidesSizesGrid=[];var e,t=p.params.spaceBetween,a=-p.params.slidesOffsetBefore,o=0,i=0;if(void 0!==p.size){var r,n;"string"==typeof t&&t.indexOf("%")>=0&&(t=parseFloat(t.replace("%",""))/100*p.size),p.virtualSize=-t,p.rtl?p.slides.css({marginLeft:"",marginTop:""}):p.slides.css({marginRight:"",marginBottom:""}),p.params.slidesPerColumn>1&&(r=Math.floor(p.slides.length/p.params.slidesPerColumn)===p.slides.length/p.params.slidesPerColumn?p.slides.length:Math.ceil(p.slides.length/p.params.slidesPerColumn)*p.params.slidesPerColumn,"auto"!==p.params.slidesPerView&&"row"===p.params.slidesPerColumnFill&&(r=Math.max(r,p.params.slidesPerView*p.params.slidesPerColumn)));var s,l=p.params.slidesPerColumn,d=r/l,c=d-(p.params.slidesPerColumn*d-p.slides.length);for(e=0;e<p.slides.length;e++){n=0;var u,f,m,h=p.slides.eq(e);if(p.params.slidesPerColumn>1)"column"===p.params.slidesPerColumnFill?(m=e-(f=Math.floor(e/l))*l,(f>c||f===c&&m===l-1)&&++m>=l&&(m=0,f++),u=f+m*r/l,h.css({"-webkit-box-ordinal-group":u,"-moz-box-ordinal-group":u,"-ms-flex-order":u,"-webkit-order":u,order:u})):f=e-(m=Math.floor(e/d))*d,h.css("margin-"+(p.isHorizontal()?"top":"left"),0!==m&&p.params.spaceBetween&&p.params.spaceBetween+"px").attr("data-swiper-column",f).attr("data-swiper-row",m);"none"!==h.css("display")&&("auto"===p.params.slidesPerView?(n=p.isHorizontal()?h.outerWidth(!0):h.outerHeight(!0),p.params.roundLengths&&(n=I(n))):(n=(p.size-(p.params.slidesPerView-1)*t)/p.params.slidesPerView,p.params.roundLengths&&(n=I(n)),p.isHorizontal()?p.slides[e].style.width=n+"px":p.slides[e].style.height=n+"px"),p.slides[e].swiperSlideSize=n,p.slidesSizesGrid.push(n),p.params.centeredSlides?(a=a+n/2+o/2+t,0===o&&0!==e&&(a=a-p.size/2-t),0===e&&(a=a-p.size/2-t),Math.abs(a)<.001&&(a=0),i%p.params.slidesPerGroup==0&&p.snapGrid.push(a),p.slidesGrid.push(a)):(i%p.params.slidesPerGroup==0&&p.snapGrid.push(a),p.slidesGrid.push(a),a=a+n+t),p.virtualSize+=n+t,o=n,i++)}if(p.virtualSize=Math.max(p.virtualSize,p.size)+p.params.slidesOffsetAfter,p.rtl&&p.wrongRTL&&("slide"===p.params.effect||"coverflow"===p.params.effect)&&p.wrapper.css({width:p.virtualSize+p.params.spaceBetween+"px"}),p.support.flexbox&&!p.params.setWrapperSize||(p.isHorizontal()?p.wrapper.css({width:p.virtualSize+p.params.spaceBetween+"px"}):p.wrapper.css({height:p.virtualSize+p.params.spaceBetween+"px"})),p.params.slidesPerColumn>1&&(p.virtualSize=(n+p.params.spaceBetween)*r,p.virtualSize=Math.ceil(p.virtualSize/p.params.slidesPerColumn)-p.params.spaceBetween,p.isHorizontal()?p.wrapper.css({width:p.virtualSize+p.params.spaceBetween+"px"}):p.wrapper.css({height:p.virtualSize+p.params.spaceBetween+"px"}),p.params.centeredSlides)){for(s=[],e=0;e<p.snapGrid.length;e++)p.snapGrid[e]<p.virtualSize+p.snapGrid[0]&&s.push(p.snapGrid[e]);p.snapGrid=s}if(!p.params.centeredSlides){for(s=[],e=0;e<p.snapGrid.length;e++)p.snapGrid[e]<=p.virtualSize-p.size&&s.push(p.snapGrid[e]);p.snapGrid=s,Math.floor(p.virtualSize-p.size)-Math.floor(p.snapGrid[p.snapGrid.length-1])>1&&p.snapGrid.push(p.virtualSize-p.size)}0===p.snapGrid.length&&(p.snapGrid=[0]),0!==p.params.spaceBetween&&(p.isHorizontal()?p.rtl?p.slides.css({marginLeft:t+"px"}):p.slides.css({marginRight:t+"px"}):p.slides.css({marginBottom:t+"px"})),p.params.watchSlidesProgress&&p.updateSlidesOffset()}},p.updateSlidesOffset=function(){for(var e=0;e<p.slides.length;e++)p.slides[e].swiperSlideOffset=p.isHorizontal()?p.slides[e].offsetLeft:p.slides[e].offsetTop},p.currentSlidesPerView=function(){var e,t,a=1;if(p.params.centeredSlides){var o,i=p.slides[p.activeIndex].swiperSlideSize;for(e=p.activeIndex+1;e<p.slides.length;e++)p.slides[e]&&!o&&(a++,(i+=p.slides[e].swiperSlideSize)>p.size&&(o=!0));for(t=p.activeIndex-1;t>=0;t--)p.slides[t]&&!o&&(a++,(i+=p.slides[t].swiperSlideSize)>p.size&&(o=!0))}else for(e=p.activeIndex+1;e<p.slides.length;e++)p.slidesGrid[e]-p.slidesGrid[p.activeIndex]<p.size&&a++;return a},p.updateSlidesProgress=function(e){if(void 0===e&&(e=p.translate||0),0!==p.slides.length){void 0===p.slides[0].swiperSlideOffset&&p.updateSlidesOffset();var t=-e;p.rtl&&(t=e),p.slides.removeClass(p.params.slideVisibleClass);for(var a=0;a<p.slides.length;a++){var o=p.slides[a],i=(t+(p.params.centeredSlides?p.minTranslate():0)-o.swiperSlideOffset)/(o.swiperSlideSize+p.params.spaceBetween);if(p.params.watchSlidesVisibility){var r=-(t-o.swiperSlideOffset),n=r+p.slidesSizesGrid[a];(r>=0&&r<p.size||n>0&&n<=p.size||r<=0&&n>=p.size)&&p.slides.eq(a).addClass(p.params.slideVisibleClass)}o.progress=p.rtl?-i:i}}},p.updateProgress=function(e){void 0===e&&(e=p.translate||0);var t=p.maxTranslate()-p.minTranslate(),a=p.isBeginning,o=p.isEnd;0===t?(p.progress=0,p.isBeginning=p.isEnd=!0):(p.progress=(e-p.minTranslate())/t,p.isBeginning=p.progress<=0,p.isEnd=p.progress>=1),p.isBeginning&&!a&&p.emit("onReachBeginning",p),p.isEnd&&!o&&p.emit("onReachEnd",p),p.params.watchSlidesProgress&&p.updateSlidesProgress(e),p.emit("onProgress",p,p.progress)},p.updateActiveIndex=function(){var e,t,a,o=p.rtl?p.translate:-p.translate;for(t=0;t<p.slidesGrid.length;t++)void 0!==p.slidesGrid[t+1]?o>=p.slidesGrid[t]&&o<p.slidesGrid[t+1]-(p.slidesGrid[t+1]-p.slidesGrid[t])/2?e=t:o>=p.slidesGrid[t]&&o<p.slidesGrid[t+1]&&(e=t+1):o>=p.slidesGrid[t]&&(e=t);p.params.normalizeSlideIndex&&(e<0||void 0===e)&&(e=0),(a=Math.floor(e/p.params.slidesPerGroup))>=p.snapGrid.length&&(a=p.snapGrid.length-1),e!==p.activeIndex&&(p.snapIndex=a,p.previousIndex=p.activeIndex,p.activeIndex=e,p.updateClasses(),p.updateRealIndex())},p.updateRealIndex=function(){p.realIndex=parseInt(p.slides.eq(p.activeIndex).attr("data-swiper-slide-index")||p.activeIndex,10)},p.updateClasses=function(){p.slides.removeClass(p.params.slideActiveClass+" "+p.params.slideNextClass+" "+p.params.slidePrevClass+" "+p.params.slideDuplicateActiveClass+" "+p.params.slideDuplicateNextClass+" "+p.params.slideDuplicatePrevClass);var t=p.slides.eq(p.activeIndex);t.addClass(p.params.slideActiveClass),a.loop&&(t.hasClass(p.params.slideDuplicateClass)?p.wrapper.children("."+p.params.slideClass+":not(."+p.params.slideDuplicateClass+')[data-swiper-slide-index="'+p.realIndex+'"]').addClass(p.params.slideDuplicateActiveClass):p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+p.realIndex+'"]').addClass(p.params.slideDuplicateActiveClass));var o=t.next("."+p.params.slideClass).addClass(p.params.slideNextClass);p.params.loop&&0===o.length&&(o=p.slides.eq(0)).addClass(p.params.slideNextClass);var i=t.prev("."+p.params.slideClass).addClass(p.params.slidePrevClass);if(p.params.loop&&0===i.length&&(i=p.slides.eq(-1)).addClass(p.params.slidePrevClass),a.loop&&(o.hasClass(p.params.slideDuplicateClass)?p.wrapper.children("."+p.params.slideClass+":not(."+p.params.slideDuplicateClass+')[data-swiper-slide-index="'+o.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicateNextClass):p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+o.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicateNextClass),i.hasClass(p.params.slideDuplicateClass)?p.wrapper.children("."+p.params.slideClass+":not(."+p.params.slideDuplicateClass+')[data-swiper-slide-index="'+i.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicatePrevClass):p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+i.attr("data-swiper-slide-index")+'"]').addClass(p.params.slideDuplicatePrevClass)),p.paginationContainer&&p.paginationContainer.length>0){var r,n=p.params.loop?Math.ceil((p.slides.length-2*p.loopedSlides)/p.params.slidesPerGroup):p.snapGrid.length;if(p.params.loop?((r=Math.ceil((p.activeIndex-p.loopedSlides)/p.params.slidesPerGroup))>p.slides.length-1-2*p.loopedSlides&&(r-=p.slides.length-2*p.loopedSlides),r>n-1&&(r-=n),r<0&&"bullets"!==p.params.paginationType&&(r=n+r)):r=void 0!==p.snapIndex?p.snapIndex:p.activeIndex||0,"bullets"===p.params.paginationType&&p.bullets&&p.bullets.length>0&&(p.bullets.removeClass(p.params.bulletActiveClass),p.paginationContainer.length>1?p.bullets.each(function(){e(this).index()===r&&e(this).addClass(p.params.bulletActiveClass)}):p.bullets.eq(r).addClass(p.params.bulletActiveClass)),"fraction"===p.params.paginationType&&(p.paginationContainer.find("."+p.params.paginationCurrentClass).text(r+1),p.paginationContainer.find("."+p.params.paginationTotalClass).text(n)),"progress"===p.params.paginationType){var s=(r+1)/n,l=s,d=1;p.isHorizontal()||(d=s,l=1),p.paginationContainer.find("."+p.params.paginationProgressbarClass).transform("translate3d(0,0,0) scaleX("+l+") scaleY("+d+")").transition(p.params.speed)}"custom"===p.params.paginationType&&p.params.paginationCustomRender&&(p.paginationContainer.html(p.params.paginationCustomRender(p,r+1,n)),p.emit("onPaginationRendered",p,p.paginationContainer[0]))}p.params.loop||(p.params.prevButton&&p.prevButton&&p.prevButton.length>0&&(p.isBeginning?(p.prevButton.addClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.disable(p.prevButton)):(p.prevButton.removeClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.enable(p.prevButton))),p.params.nextButton&&p.nextButton&&p.nextButton.length>0&&(p.isEnd?(p.nextButton.addClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.disable(p.nextButton)):(p.nextButton.removeClass(p.params.buttonDisabledClass),p.params.a11y&&p.a11y&&p.a11y.enable(p.nextButton))))},p.updatePagination=function(){if(p.params.pagination&&p.paginationContainer&&p.paginationContainer.length>0){var e="";if("bullets"===p.params.paginationType){for(var t=p.params.loop?Math.ceil((p.slides.length-2*p.loopedSlides)/p.params.slidesPerGroup):p.snapGrid.length,a=0;a<t;a++)p.params.paginationBulletRender?e+=p.params.paginationBulletRender(p,a,p.params.bulletClass):e+="<"+p.params.paginationElement+' class="'+p.params.bulletClass+'"></'+p.params.paginationElement+">";p.paginationContainer.html(e),p.bullets=p.paginationContainer.find("."+p.params.bulletClass),p.params.paginationClickable&&p.params.a11y&&p.a11y&&p.a11y.initPagination()}"fraction"===p.params.paginationType&&(e=p.params.paginationFractionRender?p.params.paginationFractionRender(p,p.params.paginationCurrentClass,p.params.paginationTotalClass):'<span class="'+p.params.paginationCurrentClass+'"></span> / <span class="'+p.params.paginationTotalClass+'"></span>',p.paginationContainer.html(e)),"progress"===p.params.paginationType&&(e=p.params.paginationProgressRender?p.params.paginationProgressRender(p,p.params.paginationProgressbarClass):'<span class="'+p.params.paginationProgressbarClass+'"></span>',p.paginationContainer.html(e)),"custom"!==p.params.paginationType&&p.emit("onPaginationRendered",p,p.paginationContainer[0])}},p.update=function(e){var t;p&&(p.updateContainerSize(),p.updateSlidesSize(),p.updateProgress(),p.updatePagination(),p.updateClasses(),p.params.scrollbar&&p.scrollbar&&p.scrollbar.set(),e?(p.controller&&p.controller.spline&&(p.controller.spline=void 0),p.params.freeMode?(a(),p.params.autoHeight&&p.updateAutoHeight()):(("auto"===p.params.slidesPerView||p.params.slidesPerView>1)&&p.isEnd&&!p.params.centeredSlides?p.slideTo(p.slides.length-1,0,!1,!0):p.slideTo(p.activeIndex,0,!1,!0))||a()):p.params.autoHeight&&p.updateAutoHeight());function a(){p.rtl,p.translate;t=Math.min(Math.max(p.translate,p.maxTranslate()),p.minTranslate()),p.setWrapperTranslate(t),p.updateActiveIndex(),p.updateClasses()}},p.onResize=function(e){p.params.onBeforeResize&&p.params.onBeforeResize(p),p.params.breakpoints&&p.setBreakpoint();var t=p.params.allowSwipeToPrev,a=p.params.allowSwipeToNext;p.params.allowSwipeToPrev=p.params.allowSwipeToNext=!0,p.updateContainerSize(),p.updateSlidesSize(),("auto"===p.params.slidesPerView||p.params.freeMode||e)&&p.updatePagination(),p.params.scrollbar&&p.scrollbar&&p.scrollbar.set(),p.controller&&p.controller.spline&&(p.controller.spline=void 0);var o=!1;if(p.params.freeMode){var i=Math.min(Math.max(p.translate,p.maxTranslate()),p.minTranslate());p.setWrapperTranslate(i),p.updateActiveIndex(),p.updateClasses(),p.params.autoHeight&&p.updateAutoHeight()}else p.updateClasses(),o=("auto"===p.params.slidesPerView||p.params.slidesPerView>1)&&p.isEnd&&!p.params.centeredSlides?p.slideTo(p.slides.length-1,0,!1,!0):p.slideTo(p.activeIndex,0,!1,!0);p.params.lazyLoading&&!o&&p.lazy&&p.lazy.load(),p.params.allowSwipeToPrev=t,p.params.allowSwipeToNext=a,p.params.onAfterResize&&p.params.onAfterResize(p)},p.touchEventsDesktop={start:"mousedown",move:"mousemove",end:"mouseup"},window.navigator.pointerEnabled?p.touchEventsDesktop={start:"pointerdown",move:"pointermove",end:"pointerup"}:window.navigator.msPointerEnabled&&(p.touchEventsDesktop={start:"MSPointerDown",move:"MSPointerMove",end:"MSPointerUp"}),p.touchEvents={start:p.support.touch||!p.params.simulateTouch?"touchstart":p.touchEventsDesktop.start,move:p.support.touch||!p.params.simulateTouch?"touchmove":p.touchEventsDesktop.move,end:p.support.touch||!p.params.simulateTouch?"touchend":p.touchEventsDesktop.end},(window.navigator.pointerEnabled||window.navigator.msPointerEnabled)&&("container"===p.params.touchEventsTarget?p.container:p.wrapper).addClass("swiper-wp8-"+p.params.direction),p.initEvents=function(e){var t=e?"off":"on",o=e?"removeEventListener":"addEventListener",i="container"===p.params.touchEventsTarget?p.container[0]:p.wrapper[0],r=p.support.touch?i:document,n=!!p.params.nested;if(p.browser.ie)i[o](p.touchEvents.start,p.onTouchStart,!1),r[o](p.touchEvents.move,p.onTouchMove,n),r[o](p.touchEvents.end,p.onTouchEnd,!1);else{if(p.support.touch){var s=!("touchstart"!==p.touchEvents.start||!p.support.passiveListener||!p.params.passiveListeners)&&{passive:!0,capture:!1};i[o](p.touchEvents.start,p.onTouchStart,s),i[o](p.touchEvents.move,p.onTouchMove,n),i[o](p.touchEvents.end,p.onTouchEnd,s)}(a.simulateTouch&&!p.device.ios&&!p.device.android||a.simulateTouch&&!p.support.touch&&p.device.ios)&&(i[o]("mousedown",p.onTouchStart,!1),document[o]("mousemove",p.onTouchMove,n),document[o]("mouseup",p.onTouchEnd,!1))}window[o]("resize",p.onResize),p.params.nextButton&&p.nextButton&&p.nextButton.length>0&&(p.nextButton[t]("click",p.onClickNext),p.params.a11y&&p.a11y&&p.nextButton[t]("keydown",p.a11y.onEnterKey)),p.params.prevButton&&p.prevButton&&p.prevButton.length>0&&(p.prevButton[t]("click",p.onClickPrev),p.params.a11y&&p.a11y&&p.prevButton[t]("keydown",p.a11y.onEnterKey)),p.params.pagination&&p.params.paginationClickable&&(p.paginationContainer[t]("click","."+p.params.bulletClass,p.onClickIndex),p.params.a11y&&p.a11y&&p.paginationContainer[t]("keydown","."+p.params.bulletClass,p.a11y.onEnterKey)),(p.params.preventClicks||p.params.preventClicksPropagation)&&i[o]("click",p.preventClicks,!0)},p.attachEvents=function(){p.initEvents()},p.detachEvents=function(){p.initEvents(!0)},p.allowClick=!0,p.preventClicks=function(e){p.allowClick||(p.params.preventClicks&&e.preventDefault(),p.params.preventClicksPropagation&&p.animating&&(e.stopPropagation(),e.stopImmediatePropagation()))},p.onClickNext=function(e){e.preventDefault(),p.isEnd&&!p.params.loop||p.slideNext()},p.onClickPrev=function(e){e.preventDefault(),p.isBeginning&&!p.params.loop||p.slidePrev()},p.onClickIndex=function(t){t.preventDefault();var a=e(this).index()*p.params.slidesPerGroup;p.params.loop&&(a+=p.loopedSlides),p.slideTo(a)},p.updateClickedSlide=function(t){var a=B(t,"."+p.params.slideClass),o=!1;if(a)for(var i=0;i<p.slides.length;i++)p.slides[i]===a&&(o=!0);if(!a||!o)return p.clickedSlide=void 0,void(p.clickedIndex=void 0);if(p.clickedSlide=a,p.clickedIndex=e(a).index(),p.params.slideToClickedSlide&&void 0!==p.clickedIndex&&p.clickedIndex!==p.activeIndex){var r,n=p.clickedIndex,s="auto"===p.params.slidesPerView?p.currentSlidesPerView():p.params.slidesPerView;if(p.params.loop){if(p.animating)return;r=parseInt(e(p.clickedSlide).attr("data-swiper-slide-index"),10),p.params.centeredSlides?n<p.loopedSlides-s/2||n>p.slides.length-p.loopedSlides+s/2?(p.fixLoop(),n=p.wrapper.children("."+p.params.slideClass+'[data-swiper-slide-index="'+r+'"]:not(.'+p.params.slideDuplicateClass+")").eq(0).index(),setTimeout(function(){p.slideTo(n)},0)):p.slideTo(n):n>p.slides.length-s?(p.fixLoop(),n=p.wrapper.children("."+p.params.slideClass+'[data-swiper-slide-index="'+r+'"]:not(.'+p.params.slideDuplicateClass+")").eq(0).index(),setTimeout(function(){p.slideTo(n)},0)):p.slideTo(n)}else p.slideTo(n)}};var m,h,g,b,v,x,w,y,C,k,S,T,_="input, select, textarea, button, video",z=Date.now(),E=[];for(var M in p.animating=!1,p.touches={startX:0,startY:0,currentX:0,currentY:0,diff:0},p.onTouchStart=function(t){if(t.originalEvent&&(t=t.originalEvent),(S="touchstart"===t.type)||!("which"in t)||3!==t.which)if(p.params.noSwiping&&B(t,"."+p.params.noSwipingClass))p.allowClick=!0;else if(!p.params.swipeHandler||B(t,p.params.swipeHandler)){var a=p.touches.currentX="touchstart"===t.type?t.targetTouches[0].pageX:t.pageX,o=p.touches.currentY="touchstart"===t.type?t.targetTouches[0].pageY:t.pageY;if(!(p.device.ios&&p.params.iOSEdgeSwipeDetection&&a<=p.params.iOSEdgeSwipeThreshold)){if(m=!0,h=!1,g=!0,v=void 0,T=void 0,p.touches.startX=a,p.touches.startY=o,b=Date.now(),p.allowClick=!0,p.updateContainerSize(),p.swipeDirection=void 0,p.params.threshold>0&&(y=!1),"touchstart"!==t.type){var i=!0;e(t.target).is(_)&&(i=!1),document.activeElement&&e(document.activeElement).is(_)&&document.activeElement.blur(),i&&t.preventDefault()}p.emit("onTouchStart",p,t)}}},p.onTouchMove=function(t){if(t.originalEvent&&(t=t.originalEvent),!S||"mousemove"!==t.type){if(t.preventedByNestedSwiper)return p.touches.startX="touchmove"===t.type?t.targetTouches[0].pageX:t.pageX,void(p.touches.startY="touchmove"===t.type?t.targetTouches[0].pageY:t.pageY);if(p.params.onlyExternal)return p.allowClick=!1,void(m&&(p.touches.startX=p.touches.currentX="touchmove"===t.type?t.targetTouches[0].pageX:t.pageX,p.touches.startY=p.touches.currentY="touchmove"===t.type?t.targetTouches[0].pageY:t.pageY,b=Date.now()));if(S&&p.params.touchReleaseOnEdges&&!p.params.loop)if(p.isHorizontal()){if(p.touches.currentX<p.touches.startX&&p.translate<=p.maxTranslate()||p.touches.currentX>p.touches.startX&&p.translate>=p.minTranslate())return}else if(p.touches.currentY<p.touches.startY&&p.translate<=p.maxTranslate()||p.touches.currentY>p.touches.startY&&p.translate>=p.minTranslate())return;if(S&&document.activeElement&&t.target===document.activeElement&&e(t.target).is(_))return h=!0,void(p.allowClick=!1);if(g&&p.emit("onTouchMove",p,t),!(t.targetTouches&&t.targetTouches.length>1)){var o;if(p.touches.currentX="touchmove"===t.type?t.targetTouches[0].pageX:t.pageX,p.touches.currentY="touchmove"===t.type?t.targetTouches[0].pageY:t.pageY,void 0===v)p.isHorizontal()&&p.touches.currentY===p.touches.startY||!p.isHorizontal()&&p.touches.currentX===p.touches.startX?v=!1:(o=180*Math.atan2(Math.abs(p.touches.currentY-p.touches.startY),Math.abs(p.touches.currentX-p.touches.startX))/Math.PI,v=p.isHorizontal()?o>p.params.touchAngle:90-o>p.params.touchAngle);if(v&&p.emit("onTouchMoveOpposite",p,t),void 0===T&&(p.touches.currentX===p.touches.startX&&p.touches.currentY===p.touches.startY||(T=!0)),m)if(v)m=!1;else if(T){p.allowClick=!1,p.emit("onSliderMove",p,t),t.preventDefault(),p.params.touchMoveStopPropagation&&!p.params.nested&&t.stopPropagation(),h||(a.loop&&p.fixLoop(),w=p.getWrapperTranslate(),p.setWrapperTransition(0),p.animating&&p.wrapper.trigger("webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd msTransitionEnd"),p.params.autoplay&&p.autoplaying&&(p.params.autoplayDisableOnInteraction?p.stopAutoplay():p.pauseAutoplay()),k=!1,!p.params.grabCursor||!0!==p.params.allowSwipeToNext&&!0!==p.params.allowSwipeToPrev||p.setGrabCursor(!0)),h=!0;var i=p.touches.diff=p.isHorizontal()?p.touches.currentX-p.touches.startX:p.touches.currentY-p.touches.startY;i*=p.params.touchRatio,p.rtl&&(i=-i),p.swipeDirection=i>0?"prev":"next",x=i+w;var r=!0;if(i>0&&x>p.minTranslate()?(r=!1,p.params.resistance&&(x=p.minTranslate()-1+Math.pow(-p.minTranslate()+w+i,p.params.resistanceRatio))):i<0&&x<p.maxTranslate()&&(r=!1,p.params.resistance&&(x=p.maxTranslate()+1-Math.pow(p.maxTranslate()-w-i,p.params.resistanceRatio))),r&&(t.preventedByNestedSwiper=!0),!p.params.allowSwipeToNext&&"next"===p.swipeDirection&&x<w&&(x=w),!p.params.allowSwipeToPrev&&"prev"===p.swipeDirection&&x>w&&(x=w),p.params.threshold>0){if(!(Math.abs(i)>p.params.threshold||y))return void(x=w);if(!y)return y=!0,p.touches.startX=p.touches.currentX,p.touches.startY=p.touches.currentY,x=w,void(p.touches.diff=p.isHorizontal()?p.touches.currentX-p.touches.startX:p.touches.currentY-p.touches.startY)}p.params.followFinger&&((p.params.freeMode||p.params.watchSlidesProgress)&&p.updateActiveIndex(),p.params.freeMode&&(0===E.length&&E.push({position:p.touches[p.isHorizontal()?"startX":"startY"],time:b}),E.push({position:p.touches[p.isHorizontal()?"currentX":"currentY"],time:(new window.Date).getTime()})),p.updateProgress(x),p.setWrapperTranslate(x))}}}},p.onTouchEnd=function(t){if(t.originalEvent&&(t=t.originalEvent),g&&p.emit("onTouchEnd",p,t),g=!1,m){p.params.grabCursor&&h&&m&&(!0===p.params.allowSwipeToNext||!0===p.params.allowSwipeToPrev)&&p.setGrabCursor(!1);var a,o=Date.now(),i=o-b;if(p.allowClick&&(p.updateClickedSlide(t),p.emit("onTap",p,t),i<300&&o-z>300&&(C&&clearTimeout(C),C=setTimeout(function(){p&&(p.params.paginationHide&&p.paginationContainer.length>0&&!e(t.target).hasClass(p.params.bulletClass)&&p.paginationContainer.toggleClass(p.params.paginationHiddenClass),p.emit("onClick",p,t))},300)),i<300&&o-z<300&&(C&&clearTimeout(C),p.emit("onDoubleTap",p,t))),z=Date.now(),setTimeout(function(){p&&(p.allowClick=!0)},0),m&&h&&p.swipeDirection&&0!==p.touches.diff&&x!==w)if(m=h=!1,a=p.params.followFinger?p.rtl?p.translate:-p.translate:-x,p.params.freeMode){if(a<-p.minTranslate())return void p.slideTo(p.activeIndex);if(a>-p.maxTranslate())return void(p.slides.length<p.snapGrid.length?p.slideTo(p.snapGrid.length-1):p.slideTo(p.slides.length-1));if(p.params.freeModeMomentum){if(E.length>1){var r=E.pop(),n=E.pop(),s=r.position-n.position,l=r.time-n.time;p.velocity=s/l,p.velocity=p.velocity/2,Math.abs(p.velocity)<p.params.freeModeMinimumVelocity&&(p.velocity=0),(l>150||(new window.Date).getTime()-r.time>300)&&(p.velocity=0)}else p.velocity=0;p.velocity=p.velocity*p.params.freeModeMomentumVelocityRatio,E.length=0;var d=1e3*p.params.freeModeMomentumRatio,c=p.velocity*d,u=p.translate+c;p.rtl&&(u=-u);var f,v=!1,y=20*Math.abs(p.velocity)*p.params.freeModeMomentumBounceRatio;if(u<p.maxTranslate())p.params.freeModeMomentumBounce?(u+p.maxTranslate()<-y&&(u=p.maxTranslate()-y),f=p.maxTranslate(),v=!0,k=!0):u=p.maxTranslate();else if(u>p.minTranslate())p.params.freeModeMomentumBounce?(u-p.minTranslate()>y&&(u=p.minTranslate()+y),f=p.minTranslate(),v=!0,k=!0):u=p.minTranslate();else if(p.params.freeModeSticky){var S,T=0;for(T=0;T<p.snapGrid.length;T+=1)if(p.snapGrid[T]>-u){S=T;break}u=Math.abs(p.snapGrid[S]-u)<Math.abs(p.snapGrid[S-1]-u)||"next"===p.swipeDirection?p.snapGrid[S]:p.snapGrid[S-1],p.rtl||(u=-u)}if(0!==p.velocity)d=p.rtl?Math.abs((-u-p.translate)/p.velocity):Math.abs((u-p.translate)/p.velocity);else if(p.params.freeModeSticky)return void p.slideReset();p.params.freeModeMomentumBounce&&v?(p.updateProgress(f),p.setWrapperTransition(d),p.setWrapperTranslate(u),p.onTransitionStart(),p.animating=!0,p.wrapper.transitionEnd(function(){p&&k&&(p.emit("onMomentumBounce",p),p.setWrapperTransition(p.params.speed),p.setWrapperTranslate(f),p.wrapper.transitionEnd(function(){p&&p.onTransitionEnd()}))})):p.velocity?(p.updateProgress(u),p.setWrapperTransition(d),p.setWrapperTranslate(u),p.onTransitionStart(),p.animating||(p.animating=!0,p.wrapper.transitionEnd(function(){p&&p.onTransitionEnd()}))):p.updateProgress(u),p.updateActiveIndex()}(!p.params.freeModeMomentum||i>=p.params.longSwipesMs)&&(p.updateProgress(),p.updateActiveIndex())}else{var _,M=0,P=p.slidesSizesGrid[0];for(_=0;_<p.slidesGrid.length;_+=p.params.slidesPerGroup)void 0!==p.slidesGrid[_+p.params.slidesPerGroup]?a>=p.slidesGrid[_]&&a<p.slidesGrid[_+p.params.slidesPerGroup]&&(M=_,P=p.slidesGrid[_+p.params.slidesPerGroup]-p.slidesGrid[_]):a>=p.slidesGrid[_]&&(M=_,P=p.slidesGrid[p.slidesGrid.length-1]-p.slidesGrid[p.slidesGrid.length-2]);var I=(a-p.slidesGrid[M])/P;if(i>p.params.longSwipesMs){if(!p.params.longSwipes)return void p.slideTo(p.activeIndex);"next"===p.swipeDirection&&(I>=p.params.longSwipesRatio?p.slideTo(M+p.params.slidesPerGroup):p.slideTo(M)),"prev"===p.swipeDirection&&(I>1-p.params.longSwipesRatio?p.slideTo(M+p.params.slidesPerGroup):p.slideTo(M))}else{if(!p.params.shortSwipes)return void p.slideTo(p.activeIndex);"next"===p.swipeDirection&&p.slideTo(M+p.params.slidesPerGroup),"prev"===p.swipeDirection&&p.slideTo(M)}}else m=h=!1}},p._slideTo=function(e,t){return p.slideTo(e,t,!0,!0)},p.slideTo=function(e,t,a,o){void 0===a&&(a=!0),void 0===e&&(e=0),e<0&&(e=0),p.snapIndex=Math.floor(e/p.params.slidesPerGroup),p.snapIndex>=p.snapGrid.length&&(p.snapIndex=p.snapGrid.length-1);var i=-p.snapGrid[p.snapIndex];if(p.params.autoplay&&p.autoplaying&&(o||!p.params.autoplayDisableOnInteraction?p.pauseAutoplay(t):p.stopAutoplay()),p.updateProgress(i),p.params.normalizeSlideIndex)for(var r=0;r<p.slidesGrid.length;r++)-Math.floor(100*i)>=Math.floor(100*p.slidesGrid[r])&&(e=r);return!(!p.params.allowSwipeToNext&&i<p.translate&&i<p.minTranslate())&&(!(!p.params.allowSwipeToPrev&&i>p.translate&&i>p.maxTranslate()&&(p.activeIndex||0)!==e)&&(void 0===t&&(t=p.params.speed),p.previousIndex=p.activeIndex||0,p.activeIndex=e,p.updateRealIndex(),p.rtl&&-i===p.translate||!p.rtl&&i===p.translate?(p.params.autoHeight&&p.updateAutoHeight(),p.updateClasses(),"slide"!==p.params.effect&&p.setWrapperTranslate(i),!1):(p.updateClasses(),p.onTransitionStart(a),0===t||p.browser.lteIE9?(p.setWrapperTranslate(i),p.setWrapperTransition(0),p.onTransitionEnd(a)):(p.setWrapperTranslate(i),p.setWrapperTransition(t),p.animating||(p.animating=!0,p.wrapper.transitionEnd(function(){p&&p.onTransitionEnd(a)}))),!0)))},p.onTransitionStart=function(e){void 0===e&&(e=!0),p.params.autoHeight&&p.updateAutoHeight(),p.lazy&&p.lazy.onTransitionStart(),e&&(p.emit("onTransitionStart",p),p.activeIndex!==p.previousIndex&&(p.emit("onSlideChangeStart",p),p.activeIndex>p.previousIndex?p.emit("onSlideNextStart",p):p.emit("onSlidePrevStart",p)))},p.onTransitionEnd=function(e){p.animating=!1,p.setWrapperTransition(0),void 0===e&&(e=!0),p.lazy&&p.lazy.onTransitionEnd(),e&&(p.emit("onTransitionEnd",p),p.activeIndex!==p.previousIndex&&(p.emit("onSlideChangeEnd",p),p.activeIndex>p.previousIndex?p.emit("onSlideNextEnd",p):p.emit("onSlidePrevEnd",p))),p.params.history&&p.history&&p.history.setHistory(p.params.history,p.activeIndex),p.params.hashnav&&p.hashnav&&p.hashnav.setHash()},p.slideNext=function(e,t,a){if(p.params.loop){if(p.animating)return!1;p.fixLoop();p.container[0].clientLeft;return p.slideTo(p.activeIndex+p.params.slidesPerGroup,t,e,a)}return p.slideTo(p.activeIndex+p.params.slidesPerGroup,t,e,a)},p._slideNext=function(e){return p.slideNext(!0,e,!0)},p.slidePrev=function(e,t,a){if(p.params.loop){if(p.animating)return!1;p.fixLoop();p.container[0].clientLeft;return p.slideTo(p.activeIndex-1,t,e,a)}return p.slideTo(p.activeIndex-1,t,e,a)},p._slidePrev=function(e){return p.slidePrev(!0,e,!0)},p.slideReset=function(e,t,a){return p.slideTo(p.activeIndex,t,e)},p.disableTouchControl=function(){return p.params.onlyExternal=!0,!0},p.enableTouchControl=function(){return p.params.onlyExternal=!1,!0},p.setWrapperTransition=function(e,t){p.wrapper.transition(e),"slide"!==p.params.effect&&p.effects[p.params.effect]&&p.effects[p.params.effect].setTransition(e),p.params.parallax&&p.parallax&&p.parallax.setTransition(e),p.params.scrollbar&&p.scrollbar&&p.scrollbar.setTransition(e),p.params.control&&p.controller&&p.controller.setTransition(e,t),p.emit("onSetTransition",p,e)},p.setWrapperTranslate=function(e,t,a){var o=0,i=0;p.isHorizontal()?o=p.rtl?-e:e:i=e,p.params.roundLengths&&(o=I(o),i=I(i)),p.params.virtualTranslate||(p.support.transforms3d?p.wrapper.transform("translate3d("+o+"px, "+i+"px, 0px)"):p.wrapper.transform("translate("+o+"px, "+i+"px)")),p.translate=p.isHorizontal()?o:i;var r=p.maxTranslate()-p.minTranslate();(0===r?0:(e-p.minTranslate())/r)!==p.progress&&p.updateProgress(e),t&&p.updateActiveIndex(),"slide"!==p.params.effect&&p.effects[p.params.effect]&&p.effects[p.params.effect].setTranslate(p.translate),p.params.parallax&&p.parallax&&p.parallax.setTranslate(p.translate),p.params.scrollbar&&p.scrollbar&&p.scrollbar.setTranslate(p.translate),p.params.control&&p.controller&&p.controller.setTranslate(p.translate,a),p.emit("onSetTranslate",p,p.translate)},p.getTranslate=function(e,t){var a,o,i,r;return void 0===t&&(t="x"),p.params.virtualTranslate?p.rtl?-p.translate:p.translate:(i=window.getComputedStyle(e,null),window.WebKitCSSMatrix?((o=i.transform||i.webkitTransform).split(",").length>6&&(o=o.split(", ").map(function(e){return e.replace(",",".")}).join(", ")),r=new window.WebKitCSSMatrix("none"===o?"":o)):a=(r=i.MozTransform||i.OTransform||i.MsTransform||i.msTransform||i.transform||i.getPropertyValue("transform").replace("translate(","matrix(1, 0, 0, 1,")).toString().split(","),"x"===t&&(o=window.WebKitCSSMatrix?r.m41:16===a.length?parseFloat(a[12]):parseFloat(a[4])),"y"===t&&(o=window.WebKitCSSMatrix?r.m42:16===a.length?parseFloat(a[13]):parseFloat(a[5])),p.rtl&&o&&(o=-o),o||0)},p.getWrapperTranslate=function(e){return void 0===e&&(e=p.isHorizontal()?"x":"y"),p.getTranslate(p.wrapper[0],e)},p.observers=[],p.initObservers=function(){if(p.params.observeParents)for(var e=p.container.parents(),t=0;t<e.length;t++)D(e[t]);D(p.container[0],{childList:!1}),D(p.wrapper[0],{attributes:!1})},p.disconnectObservers=function(){for(var e=0;e<p.observers.length;e++)p.observers[e].disconnect();p.observers=[]},p.createLoop=function(){p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass).remove();var t=p.wrapper.children("."+p.params.slideClass);"auto"!==p.params.slidesPerView||p.params.loopedSlides||(p.params.loopedSlides=t.length),p.loopedSlides=parseInt(p.params.loopedSlides||p.params.slidesPerView,10),p.loopedSlides=p.loopedSlides+p.params.loopAdditionalSlides,p.loopedSlides>t.length&&(p.loopedSlides=t.length);var a,o=[],i=[];for(t.each(function(a,r){var n=e(this);a<p.loopedSlides&&i.push(r),a<t.length&&a>=t.length-p.loopedSlides&&o.push(r),n.attr("data-swiper-slide-index",a)}),a=0;a<i.length;a++)p.wrapper.append(e(i[a].cloneNode(!0)).addClass(p.params.slideDuplicateClass));for(a=o.length-1;a>=0;a--)p.wrapper.prepend(e(o[a].cloneNode(!0)).addClass(p.params.slideDuplicateClass))},p.destroyLoop=function(){p.wrapper.children("."+p.params.slideClass+"."+p.params.slideDuplicateClass).remove(),p.slides.removeAttr("data-swiper-slide-index")},p.reLoop=function(e){var t=p.activeIndex-p.loopedSlides;p.destroyLoop(),p.createLoop(),p.updateSlidesSize(),e&&p.slideTo(t+p.loopedSlides,0,!1)},p.fixLoop=function(){var e;p.activeIndex<p.loopedSlides?(e=p.slides.length-3*p.loopedSlides+p.activeIndex,e+=p.loopedSlides,p.slideTo(e,0,!1,!0)):("auto"===p.params.slidesPerView&&p.activeIndex>=2*p.loopedSlides||p.activeIndex>p.slides.length-2*p.params.slidesPerView)&&(e=-p.slides.length+p.activeIndex+p.loopedSlides,e+=p.loopedSlides,p.slideTo(e,0,!1,!0))},p.appendSlide=function(e){if(p.params.loop&&p.destroyLoop(),"object"==typeof e&&e.length)for(var t=0;t<e.length;t++)e[t]&&p.wrapper.append(e[t]);else p.wrapper.append(e);p.params.loop&&p.createLoop(),p.params.observer&&p.support.observer||p.update(!0)},p.prependSlide=function(e){p.params.loop&&p.destroyLoop();var t=p.activeIndex+1;if("object"==typeof e&&e.length){for(var a=0;a<e.length;a++)e[a]&&p.wrapper.prepend(e[a]);t=p.activeIndex+e.length}else p.wrapper.prepend(e);p.params.loop&&p.createLoop(),p.params.observer&&p.support.observer||p.update(!0),p.slideTo(t,0,!1)},p.removeSlide=function(e){p.params.loop&&(p.destroyLoop(),p.slides=p.wrapper.children("."+p.params.slideClass));var t,a=p.activeIndex;if("object"==typeof e&&e.length){for(var o=0;o<e.length;o++)t=e[o],p.slides[t]&&p.slides.eq(t).remove(),t<a&&a--;a=Math.max(a,0)}else t=e,p.slides[t]&&p.slides.eq(t).remove(),t<a&&a--,a=Math.max(a,0);p.params.loop&&p.createLoop(),p.params.observer&&p.support.observer||p.update(!0),p.params.loop?p.slideTo(a+p.loopedSlides,0,!1):p.slideTo(a,0,!1)},p.removeAllSlides=function(){for(var e=[],t=0;t<p.slides.length;t++)e.push(t);p.removeSlide(e)},p.effects={fade:{setTranslate:function(){for(var e=0;e<p.slides.length;e++){var t=p.slides.eq(e),a=-t[0].swiperSlideOffset;p.params.virtualTranslate||(a-=p.translate);var o=0;p.isHorizontal()||(o=a,a=0);var i=p.params.fade.crossFade?Math.max(1-Math.abs(t[0].progress),0):1+Math.min(Math.max(t[0].progress,-1),0);t.css({opacity:i}).transform("translate3d("+a+"px, "+o+"px, 0px)")}},setTransition:function(e){if(p.slides.transition(e),p.params.virtualTranslate&&0!==e){var t=!1;p.slides.transitionEnd(function(){if(!t&&p){t=!0,p.animating=!1;for(var e=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],a=0;a<e.length;a++)p.wrapper.trigger(e[a])}})}}},flip:{setTranslate:function(){for(var t=0;t<p.slides.length;t++){var a=p.slides.eq(t),o=a[0].progress;p.params.flip.limitRotation&&(o=Math.max(Math.min(a[0].progress,1),-1));var i=-180*o,r=0,n=-a[0].swiperSlideOffset,s=0;if(p.isHorizontal()?p.rtl&&(i=-i):(s=n,n=0,r=-i,i=0),a[0].style.zIndex=-Math.abs(Math.round(o))+p.slides.length,p.params.flip.slideShadows){var l=p.isHorizontal()?a.find(".swiper-slide-shadow-left"):a.find(".swiper-slide-shadow-top"),d=p.isHorizontal()?a.find(".swiper-slide-shadow-right"):a.find(".swiper-slide-shadow-bottom");0===l.length&&(l=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"left":"top")+'"></div>'),a.append(l)),0===d.length&&(d=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"right":"bottom")+'"></div>'),a.append(d)),l.length&&(l[0].style.opacity=Math.max(-o,0)),d.length&&(d[0].style.opacity=Math.max(o,0))}a.transform("translate3d("+n+"px, "+s+"px, 0px) rotateX("+r+"deg) rotateY("+i+"deg)")}},setTransition:function(t){if(p.slides.transition(t).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(t),p.params.virtualTranslate&&0!==t){var a=!1;p.slides.eq(p.activeIndex).transitionEnd(function(){if(!a&&p&&e(this).hasClass(p.params.slideActiveClass)){a=!0,p.animating=!1;for(var t=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],o=0;o<t.length;o++)p.wrapper.trigger(t[o])}})}}},cube:{setTranslate:function(){var t,a=0;p.params.cube.shadow&&(p.isHorizontal()?(0===(t=p.wrapper.find(".swiper-cube-shadow")).length&&(t=e('<div class="swiper-cube-shadow"></div>'),p.wrapper.append(t)),t.css({height:p.width+"px"})):0===(t=p.container.find(".swiper-cube-shadow")).length&&(t=e('<div class="swiper-cube-shadow"></div>'),p.container.append(t)));for(var o=0;o<p.slides.length;o++){var i=p.slides.eq(o),r=90*o,n=Math.floor(r/360);p.rtl&&(r=-r,n=Math.floor(-r/360));var s=Math.max(Math.min(i[0].progress,1),-1),l=0,d=0,c=0;o%4==0?(l=4*-n*p.size,c=0):(o-1)%4==0?(l=0,c=4*-n*p.size):(o-2)%4==0?(l=p.size+4*n*p.size,c=p.size):(o-3)%4==0&&(l=-p.size,c=3*p.size+4*p.size*n),p.rtl&&(l=-l),p.isHorizontal()||(d=l,l=0);var u="rotateX("+(p.isHorizontal()?0:-r)+"deg) rotateY("+(p.isHorizontal()?r:0)+"deg) translate3d("+l+"px, "+d+"px, "+c+"px)";if(s<=1&&s>-1&&(a=90*o+90*s,p.rtl&&(a=90*-o-90*s)),i.transform(u),p.params.cube.slideShadows){var f=p.isHorizontal()?i.find(".swiper-slide-shadow-left"):i.find(".swiper-slide-shadow-top"),m=p.isHorizontal()?i.find(".swiper-slide-shadow-right"):i.find(".swiper-slide-shadow-bottom");0===f.length&&(f=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"left":"top")+'"></div>'),i.append(f)),0===m.length&&(m=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"right":"bottom")+'"></div>'),i.append(m)),f.length&&(f[0].style.opacity=Math.max(-s,0)),m.length&&(m[0].style.opacity=Math.max(s,0))}}if(p.wrapper.css({"-webkit-transform-origin":"50% 50% -"+p.size/2+"px","-moz-transform-origin":"50% 50% -"+p.size/2+"px","-ms-transform-origin":"50% 50% -"+p.size/2+"px","transform-origin":"50% 50% -"+p.size/2+"px"}),p.params.cube.shadow)if(p.isHorizontal())t.transform("translate3d(0px, "+(p.width/2+p.params.cube.shadowOffset)+"px, "+-p.width/2+"px) rotateX(90deg) rotateZ(0deg) scale("+p.params.cube.shadowScale+")");else{var h=Math.abs(a)-90*Math.floor(Math.abs(a)/90),g=1.5-(Math.sin(2*h*Math.PI/360)/2+Math.cos(2*h*Math.PI/360)/2),b=p.params.cube.shadowScale,v=p.params.cube.shadowScale/g,x=p.params.cube.shadowOffset;t.transform("scale3d("+b+", 1, "+v+") translate3d(0px, "+(p.height/2+x)+"px, "+-p.height/2/v+"px) rotateX(-90deg)")}var w=p.isSafari||p.isUiWebView?-p.size/2:0;p.wrapper.transform("translate3d(0px,0,"+w+"px) rotateX("+(p.isHorizontal()?0:a)+"deg) rotateY("+(p.isHorizontal()?-a:0)+"deg)")},setTransition:function(e){p.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e),p.params.cube.shadow&&!p.isHorizontal()&&p.container.find(".swiper-cube-shadow").transition(e)}},coverflow:{setTranslate:function(){for(var t=p.translate,a=p.isHorizontal()?-t+p.width/2:-t+p.height/2,o=p.isHorizontal()?p.params.coverflow.rotate:-p.params.coverflow.rotate,i=p.params.coverflow.depth,r=0,n=p.slides.length;r<n;r++){var s=p.slides.eq(r),l=p.slidesSizesGrid[r],d=(a-s[0].swiperSlideOffset-l/2)/l*p.params.coverflow.modifier,c=p.isHorizontal()?o*d:0,u=p.isHorizontal()?0:o*d,f=-i*Math.abs(d),m=p.isHorizontal()?0:p.params.coverflow.stretch*d,h=p.isHorizontal()?p.params.coverflow.stretch*d:0;Math.abs(h)<.001&&(h=0),Math.abs(m)<.001&&(m=0),Math.abs(f)<.001&&(f=0),Math.abs(c)<.001&&(c=0),Math.abs(u)<.001&&(u=0);var g="translate3d("+h+"px,"+m+"px,"+f+"px)  rotateX("+u+"deg) rotateY("+c+"deg)";if(s.transform(g),s[0].style.zIndex=1-Math.abs(Math.round(d)),p.params.coverflow.slideShadows){var b=p.isHorizontal()?s.find(".swiper-slide-shadow-left"):s.find(".swiper-slide-shadow-top"),v=p.isHorizontal()?s.find(".swiper-slide-shadow-right"):s.find(".swiper-slide-shadow-bottom");0===b.length&&(b=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"left":"top")+'"></div>'),s.append(b)),0===v.length&&(v=e('<div class="swiper-slide-shadow-'+(p.isHorizontal()?"right":"bottom")+'"></div>'),s.append(v)),b.length&&(b[0].style.opacity=d>0?d:0),v.length&&(v[0].style.opacity=-d>0?-d:0)}}p.browser.ie&&(p.wrapper[0].style.perspectiveOrigin=a+"px 50%")},setTransition:function(e){p.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e)}}},p.lazy={initialImageLoaded:!1,loadImageInSlide:function(t,a){if(void 0!==t&&(void 0===a&&(a=!0),0!==p.slides.length)){var o=p.slides.eq(t),i=o.find("."+p.params.lazyLoadingClass+":not(."+p.params.lazyStatusLoadedClass+"):not(."+p.params.lazyStatusLoadingClass+")");!o.hasClass(p.params.lazyLoadingClass)||o.hasClass(p.params.lazyStatusLoadedClass)||o.hasClass(p.params.lazyStatusLoadingClass)||(i=i.add(o[0])),0!==i.length&&i.each(function(){var t=e(this);t.addClass(p.params.lazyStatusLoadingClass);var i=t.attr("data-background"),r=t.attr("data-src"),n=t.attr("data-srcset"),s=t.attr("data-sizes");p.loadImage(t[0],r||i,n,s,!1,function(){if(void 0!==p&&null!==p&&p){if(i?(t.css("background-image",'url("'+i+'")'),t.removeAttr("data-background")):(n&&(t.attr("srcset",n),t.removeAttr("data-srcset")),s&&(t.attr("sizes",s),t.removeAttr("data-sizes")),r&&(t.attr("src",r),t.removeAttr("data-src"))),t.addClass(p.params.lazyStatusLoadedClass).removeClass(p.params.lazyStatusLoadingClass),o.find("."+p.params.lazyPreloaderClass+", ."+p.params.preloaderClass).remove(),p.params.loop&&a){var e=o.attr("data-swiper-slide-index");if(o.hasClass(p.params.slideDuplicateClass)){var l=p.wrapper.children('[data-swiper-slide-index="'+e+'"]:not(.'+p.params.slideDuplicateClass+")");p.lazy.loadImageInSlide(l.index(),!1)}else{var d=p.wrapper.children("."+p.params.slideDuplicateClass+'[data-swiper-slide-index="'+e+'"]');p.lazy.loadImageInSlide(d.index(),!1)}}p.emit("onLazyImageReady",p,o[0],t[0])}}),p.emit("onLazyImageLoad",p,o[0],t[0])})}},load:function(){var t,a=p.params.slidesPerView;if("auto"===a&&(a=0),p.lazy.initialImageLoaded||(p.lazy.initialImageLoaded=!0),p.params.watchSlidesVisibility)p.wrapper.children("."+p.params.slideVisibleClass).each(function(){p.lazy.loadImageInSlide(e(this).index())});else if(a>1)for(t=p.activeIndex;t<p.activeIndex+a;t++)p.slides[t]&&p.lazy.loadImageInSlide(t);else p.lazy.loadImageInSlide(p.activeIndex);if(p.params.lazyLoadingInPrevNext)if(a>1||p.params.lazyLoadingInPrevNextAmount&&p.params.lazyLoadingInPrevNextAmount>1){var o=p.params.lazyLoadingInPrevNextAmount,i=a,r=Math.min(p.activeIndex+i+Math.max(o,i),p.slides.length),n=Math.max(p.activeIndex-Math.max(i,o),0);for(t=p.activeIndex+a;t<r;t++)p.slides[t]&&p.lazy.loadImageInSlide(t);for(t=n;t<p.activeIndex;t++)p.slides[t]&&p.lazy.loadImageInSlide(t)}else{var s=p.wrapper.children("."+p.params.slideNextClass);s.length>0&&p.lazy.loadImageInSlide(s.index());var l=p.wrapper.children("."+p.params.slidePrevClass);l.length>0&&p.lazy.loadImageInSlide(l.index())}},onTransitionStart:function(){p.params.lazyLoading&&(p.params.lazyLoadingOnTransitionStart||!p.params.lazyLoadingOnTransitionStart&&!p.lazy.initialImageLoaded)&&p.lazy.load()},onTransitionEnd:function(){p.params.lazyLoading&&!p.params.lazyLoadingOnTransitionStart&&p.lazy.load()}},p.scrollbar={isTouched:!1,setDragPosition:function(e){var t=p.scrollbar,a=(p.isHorizontal()?"touchstart"===e.type||"touchmove"===e.type?e.targetTouches[0].pageX:e.pageX||e.clientX:"touchstart"===e.type||"touchmove"===e.type?e.targetTouches[0].pageY:e.pageY||e.clientY)-t.track.offset()[p.isHorizontal()?"left":"top"]-t.dragSize/2,o=-p.minTranslate()*t.moveDivider,i=-p.maxTranslate()*t.moveDivider;a<o?a=o:a>i&&(a=i),a=-a/t.moveDivider,p.updateProgress(a),p.setWrapperTranslate(a,!0)},dragStart:function(e){var t=p.scrollbar;t.isTouched=!0,e.preventDefault(),e.stopPropagation(),t.setDragPosition(e),clearTimeout(t.dragTimeout),t.track.transition(0),p.params.scrollbarHide&&t.track.css("opacity",1),p.wrapper.transition(100),t.drag.transition(100),p.emit("onScrollbarDragStart",p)},dragMove:function(e){var t=p.scrollbar;t.isTouched&&(e.preventDefault?e.preventDefault():e.returnValue=!1,t.setDragPosition(e),p.wrapper.transition(0),t.track.transition(0),t.drag.transition(0),p.emit("onScrollbarDragMove",p))},dragEnd:function(e){var t=p.scrollbar;t.isTouched&&(t.isTouched=!1,p.params.scrollbarHide&&(clearTimeout(t.dragTimeout),t.dragTimeout=setTimeout(function(){t.track.css("opacity",0),t.track.transition(400)},1e3)),p.emit("onScrollbarDragEnd",p),p.params.scrollbarSnapOnRelease&&p.slideReset())},draggableEvents:!1!==p.params.simulateTouch||p.support.touch?p.touchEvents:p.touchEventsDesktop,enableDraggable:function(){var t=p.scrollbar,a=p.support.touch?t.track:document;e(t.track).on(t.draggableEvents.start,t.dragStart),e(a).on(t.draggableEvents.move,t.dragMove),e(a).on(t.draggableEvents.end,t.dragEnd)},disableDraggable:function(){var t=p.scrollbar,a=p.support.touch?t.track:document;e(t.track).off(t.draggableEvents.start,t.dragStart),e(a).off(t.draggableEvents.move,t.dragMove),e(a).off(t.draggableEvents.end,t.dragEnd)},set:function(){if(p.params.scrollbar){var t=p.scrollbar;t.track=e(p.params.scrollbar),p.params.uniqueNavElements&&"string"==typeof p.params.scrollbar&&t.track.length>1&&1===p.container.find(p.params.scrollbar).length&&(t.track=p.container.find(p.params.scrollbar)),t.drag=t.track.find(".swiper-scrollbar-drag"),0===t.drag.length&&(t.drag=e('<div class="swiper-scrollbar-drag"></div>'),t.track.append(t.drag)),t.drag[0].style.width="",t.drag[0].style.height="",t.trackSize=p.isHorizontal()?t.track[0].offsetWidth:t.track[0].offsetHeight,t.divider=p.size/p.virtualSize,t.moveDivider=t.divider*(t.trackSize/p.size),t.dragSize=t.trackSize*t.divider,p.isHorizontal()?t.drag[0].style.width=t.dragSize+"px":t.drag[0].style.height=t.dragSize+"px",t.divider>=1?t.track[0].style.display="none":t.track[0].style.display="",p.params.scrollbarHide&&(t.track[0].style.opacity=0)}},setTranslate:function(){if(p.params.scrollbar){var e,t=p.scrollbar,a=(p.translate,t.dragSize);e=(t.trackSize-t.dragSize)*p.progress,p.rtl&&p.isHorizontal()?(e=-e)>0?(a=t.dragSize-e,e=0):-e+t.dragSize>t.trackSize&&(a=t.trackSize+e):e<0?(a=t.dragSize+e,e=0):e+t.dragSize>t.trackSize&&(a=t.trackSize-e),p.isHorizontal()?(p.support.transforms3d?t.drag.transform("translate3d("+e+"px, 0, 0)"):t.drag.transform("translateX("+e+"px)"),t.drag[0].style.width=a+"px"):(p.support.transforms3d?t.drag.transform("translate3d(0px, "+e+"px, 0)"):t.drag.transform("translateY("+e+"px)"),t.drag[0].style.height=a+"px"),p.params.scrollbarHide&&(clearTimeout(t.timeout),t.track[0].style.opacity=1,t.timeout=setTimeout(function(){t.track[0].style.opacity=0,t.track.transition(400)},1e3))}},setTransition:function(e){p.params.scrollbar&&p.scrollbar.drag.transition(e)}},p.controller={LinearSpline:function(e,t){var a,o,i,r,n,s=function(e,t){for(o=-1,a=e.length;a-o>1;)e[i=a+o>>1]<=t?o=i:a=i;return a};this.x=e,this.y=t,this.lastIndex=e.length-1;this.x.length;this.interpolate=function(e){return e?(n=s(this.x,e),r=n-1,(e-this.x[r])*(this.y[n]-this.y[r])/(this.x[n]-this.x[r])+this.y[r]):0}},getInterpolateFunction:function(e){p.controller.spline||(p.controller.spline=p.params.loop?new p.controller.LinearSpline(p.slidesGrid,e.slidesGrid):new p.controller.LinearSpline(p.snapGrid,e.snapGrid))},setTranslate:function(e,t){var a,i,r=p.params.control;function n(t){e=t.rtl&&"horizontal"===t.params.direction?-p.translate:p.translate,"slide"===p.params.controlBy&&(p.controller.getInterpolateFunction(t),i=-p.controller.spline.interpolate(-e)),i&&"container"!==p.params.controlBy||(a=(t.maxTranslate()-t.minTranslate())/(p.maxTranslate()-p.minTranslate()),i=(e-p.minTranslate())*a+t.minTranslate()),p.params.controlInverse&&(i=t.maxTranslate()-i),t.updateProgress(i),t.setWrapperTranslate(i,!1,p),t.updateActiveIndex()}if(Array.isArray(r))for(var s=0;s<r.length;s++)r[s]!==t&&r[s]instanceof o&&n(r[s]);else r instanceof o&&t!==r&&n(r)},setTransition:function(e,t){var a,i=p.params.control;function r(t){t.setWrapperTransition(e,p),0!==e&&(t.onTransitionStart(),t.wrapper.transitionEnd(function(){i&&(t.params.loop&&"slide"===p.params.controlBy&&t.fixLoop(),t.onTransitionEnd())}))}if(Array.isArray(i))for(a=0;a<i.length;a++)i[a]!==t&&i[a]instanceof o&&r(i[a]);else i instanceof o&&t!==i&&r(i)}},p.hashnav={onHashCange:function(e,t){var a=document.location.hash.replace("#","");a!==p.slides.eq(p.activeIndex).attr("data-hash")&&p.slideTo(p.wrapper.children("."+p.params.slideClass+'[data-hash="'+a+'"]').index())},attachEvents:function(t){var a=t?"off":"on";e(window)[a]("hashchange",p.hashnav.onHashCange)},setHash:function(){if(p.hashnav.initialized&&p.params.hashnav)if(p.params.replaceState&&window.history&&window.history.replaceState)window.history.replaceState(null,null,"#"+p.slides.eq(p.activeIndex).attr("data-hash")||"");else{var e=p.slides.eq(p.activeIndex),t=e.attr("data-hash")||e.attr("data-history");document.location.hash=t||""}},init:function(){if(p.params.hashnav&&!p.params.history){p.hashnav.initialized=!0;var e=document.location.hash.replace("#","");if(e)for(var t=0,a=p.slides.length;t<a;t++){var o=p.slides.eq(t);if((o.attr("data-hash")||o.attr("data-history"))===e&&!o.hasClass(p.params.slideDuplicateClass)){var i=o.index();p.slideTo(i,0,p.params.runCallbacksOnInit,!0)}}p.params.hashnavWatchState&&p.hashnav.attachEvents()}},destroy:function(){p.params.hashnavWatchState&&p.hashnav.attachEvents(!0)}},p.history={init:function(){if(p.params.history){if(!window.history||!window.history.pushState)return p.params.history=!1,void(p.params.hashnav=!0);p.history.initialized=!0,this.paths=this.getPathValues(),(this.paths.key||this.paths.value)&&(this.scrollToSlide(0,this.paths.value,p.params.runCallbacksOnInit),p.params.replaceState||window.addEventListener("popstate",this.setHistoryPopState))}},setHistoryPopState:function(){p.history.paths=p.history.getPathValues(),p.history.scrollToSlide(p.params.speed,p.history.paths.value,!1)},getPathValues:function(){var e=window.location.pathname.slice(1).split("/"),t=e.length;return{key:e[t-2],value:e[t-1]}},setHistory:function(e,t){if(p.history.initialized&&p.params.history){var a=p.slides.eq(t),o=this.slugify(a.attr("data-history"));window.location.pathname.includes(e)||(o=e+"/"+o),p.params.replaceState?window.history.replaceState(null,null,o):window.history.pushState(null,null,o)}},slugify:function(e){return e.toString().toLowerCase().replace(/\s+/g,"-").replace(/[^\w\-]+/g,"").replace(/\-\-+/g,"-").replace(/^-+/,"").replace(/-+$/,"")},scrollToSlide:function(e,t,a){if(t)for(var o=0,i=p.slides.length;o<i;o++){var r=p.slides.eq(o);if(this.slugify(r.attr("data-history"))===t&&!r.hasClass(p.params.slideDuplicateClass)){var n=r.index();p.slideTo(n,e,a)}}else p.slideTo(0,e,a)}},p.disableKeyboardControl=function(){p.params.keyboardControl=!1,e(document).off("keydown",O)},p.enableKeyboardControl=function(){p.params.keyboardControl=!0,e(document).on("keydown",O)},p.mousewheel={event:!1,lastScrollTime:(new window.Date).getTime()},p.params.mousewheelControl&&(p.mousewheel.event=navigator.userAgent.indexOf("firefox")>-1?"DOMMouseScroll":function(){var e="onwheel"in document;if(!e){var t=document.createElement("div");t.setAttribute("onwheel","return;"),e="function"==typeof t.onwheel}return!e&&document.implementation&&document.implementation.hasFeature&&!0!==document.implementation.hasFeature("","")&&(e=document.implementation.hasFeature("Events.wheel","3.0")),e}()?"wheel":"mousewheel"),p.disableMousewheelControl=function(){if(!p.mousewheel.event)return!1;var t=p.container;return"container"!==p.params.mousewheelEventsTarged&&(t=e(p.params.mousewheelEventsTarged)),t.off(p.mousewheel.event,N),p.params.mousewheelControl=!1,!0},p.enableMousewheelControl=function(){if(!p.mousewheel.event)return!1;var t=p.container;return"container"!==p.params.mousewheelEventsTarged&&(t=e(p.params.mousewheelEventsTarged)),t.on(p.mousewheel.event,N),p.params.mousewheelControl=!0,!0},p.parallax={setTranslate:function(){p.container.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function(){A(this,p.progress)}),p.slides.each(function(){var t=e(this);t.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function(){A(this,Math.min(Math.max(t[0].progress,-1),1))})})},setTransition:function(t){void 0===t&&(t=p.params.speed),p.container.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function(){var a=e(this),o=parseInt(a.attr("data-swiper-parallax-duration"),10)||t;0===t&&(o=0),a.transition(o)})}},p.zoom={scale:1,currentScale:1,isScaling:!1,gesture:{slide:void 0,slideWidth:void 0,slideHeight:void 0,image:void 0,imageWrap:void 0,zoomMax:p.params.zoomMax},image:{isTouched:void 0,isMoved:void 0,currentX:void 0,currentY:void 0,minX:void 0,minY:void 0,maxX:void 0,maxY:void 0,width:void 0,height:void 0,startX:void 0,startY:void 0,touchesStart:{},touchesCurrent:{}},velocity:{x:void 0,y:void 0,prevPositionX:void 0,prevPositionY:void 0,prevTime:void 0},getDistanceBetweenTouches:function(e){if(e.targetTouches.length<2)return 1;var t=e.targetTouches[0].pageX,a=e.targetTouches[0].pageY,o=e.targetTouches[1].pageX,i=e.targetTouches[1].pageY;return Math.sqrt(Math.pow(o-t,2)+Math.pow(i-a,2))},onGestureStart:function(t){var a=p.zoom;if(!p.support.gestures){if("touchstart"!==t.type||"touchstart"===t.type&&t.targetTouches.length<2)return;a.gesture.scaleStart=a.getDistanceBetweenTouches(t)}a.gesture.slide&&a.gesture.slide.length||(a.gesture.slide=e(this),0===a.gesture.slide.length&&(a.gesture.slide=p.slides.eq(p.activeIndex)),a.gesture.image=a.gesture.slide.find("img, svg, canvas"),a.gesture.imageWrap=a.gesture.image.parent("."+p.params.zoomContainerClass),a.gesture.zoomMax=a.gesture.imageWrap.attr("data-swiper-zoom")||p.params.zoomMax,0!==a.gesture.imageWrap.length)?(a.gesture.image.transition(0),a.isScaling=!0):a.gesture.image=void 0},onGestureChange:function(e){var t=p.zoom;if(!p.support.gestures){if("touchmove"!==e.type||"touchmove"===e.type&&e.targetTouches.length<2)return;t.gesture.scaleMove=t.getDistanceBetweenTouches(e)}t.gesture.image&&0!==t.gesture.image.length&&(p.support.gestures?t.scale=e.scale*t.currentScale:t.scale=t.gesture.scaleMove/t.gesture.scaleStart*t.currentScale,t.scale>t.gesture.zoomMax&&(t.scale=t.gesture.zoomMax-1+Math.pow(t.scale-t.gesture.zoomMax+1,.5)),t.scale<p.params.zoomMin&&(t.scale=p.params.zoomMin+1-Math.pow(p.params.zoomMin-t.scale+1,.5)),t.gesture.image.transform("translate3d(0,0,0) scale("+t.scale+")"))},onGestureEnd:function(e){var t=p.zoom;!p.support.gestures&&("touchend"!==e.type||"touchend"===e.type&&e.changedTouches.length<2)||t.gesture.image&&0!==t.gesture.image.length&&(t.scale=Math.max(Math.min(t.scale,t.gesture.zoomMax),p.params.zoomMin),t.gesture.image.transition(p.params.speed).transform("translate3d(0,0,0) scale("+t.scale+")"),t.currentScale=t.scale,t.isScaling=!1,1===t.scale&&(t.gesture.slide=void 0))},onTouchStart:function(e,t){var a=e.zoom;a.gesture.image&&0!==a.gesture.image.length&&(a.image.isTouched||("android"===e.device.os&&t.preventDefault(),a.image.isTouched=!0,a.image.touchesStart.x="touchstart"===t.type?t.targetTouches[0].pageX:t.pageX,a.image.touchesStart.y="touchstart"===t.type?t.targetTouches[0].pageY:t.pageY))},onTouchMove:function(e){var t=p.zoom;if(t.gesture.image&&0!==t.gesture.image.length&&(p.allowClick=!1,t.image.isTouched&&t.gesture.slide)){t.image.isMoved||(t.image.width=t.gesture.image[0].offsetWidth,t.image.height=t.gesture.image[0].offsetHeight,t.image.startX=p.getTranslate(t.gesture.imageWrap[0],"x")||0,t.image.startY=p.getTranslate(t.gesture.imageWrap[0],"y")||0,t.gesture.slideWidth=t.gesture.slide[0].offsetWidth,t.gesture.slideHeight=t.gesture.slide[0].offsetHeight,t.gesture.imageWrap.transition(0),p.rtl&&(t.image.startX=-t.image.startX),p.rtl&&(t.image.startY=-t.image.startY));var a=t.image.width*t.scale,o=t.image.height*t.scale;if(!(a<t.gesture.slideWidth&&o<t.gesture.slideHeight)){if(t.image.minX=Math.min(t.gesture.slideWidth/2-a/2,0),t.image.maxX=-t.image.minX,t.image.minY=Math.min(t.gesture.slideHeight/2-o/2,0),t.image.maxY=-t.image.minY,t.image.touchesCurrent.x="touchmove"===e.type?e.targetTouches[0].pageX:e.pageX,t.image.touchesCurrent.y="touchmove"===e.type?e.targetTouches[0].pageY:e.pageY,!t.image.isMoved&&!t.isScaling){if(p.isHorizontal()&&Math.floor(t.image.minX)===Math.floor(t.image.startX)&&t.image.touchesCurrent.x<t.image.touchesStart.x||Math.floor(t.image.maxX)===Math.floor(t.image.startX)&&t.image.touchesCurrent.x>t.image.touchesStart.x)return void(t.image.isTouched=!1);if(!p.isHorizontal()&&Math.floor(t.image.minY)===Math.floor(t.image.startY)&&t.image.touchesCurrent.y<t.image.touchesStart.y||Math.floor(t.image.maxY)===Math.floor(t.image.startY)&&t.image.touchesCurrent.y>t.image.touchesStart.y)return void(t.image.isTouched=!1)}e.preventDefault(),e.stopPropagation(),t.image.isMoved=!0,t.image.currentX=t.image.touchesCurrent.x-t.image.touchesStart.x+t.image.startX,t.image.currentY=t.image.touchesCurrent.y-t.image.touchesStart.y+t.image.startY,t.image.currentX<t.image.minX&&(t.image.currentX=t.image.minX+1-Math.pow(t.image.minX-t.image.currentX+1,.8)),t.image.currentX>t.image.maxX&&(t.image.currentX=t.image.maxX-1+Math.pow(t.image.currentX-t.image.maxX+1,.8)),t.image.currentY<t.image.minY&&(t.image.currentY=t.image.minY+1-Math.pow(t.image.minY-t.image.currentY+1,.8)),t.image.currentY>t.image.maxY&&(t.image.currentY=t.image.maxY-1+Math.pow(t.image.currentY-t.image.maxY+1,.8)),t.velocity.prevPositionX||(t.velocity.prevPositionX=t.image.touchesCurrent.x),t.velocity.prevPositionY||(t.velocity.prevPositionY=t.image.touchesCurrent.y),t.velocity.prevTime||(t.velocity.prevTime=Date.now()),t.velocity.x=(t.image.touchesCurrent.x-t.velocity.prevPositionX)/(Date.now()-t.velocity.prevTime)/2,t.velocity.y=(t.image.touchesCurrent.y-t.velocity.prevPositionY)/(Date.now()-t.velocity.prevTime)/2,Math.abs(t.image.touchesCurrent.x-t.velocity.prevPositionX)<2&&(t.velocity.x=0),Math.abs(t.image.touchesCurrent.y-t.velocity.prevPositionY)<2&&(t.velocity.y=0),t.velocity.prevPositionX=t.image.touchesCurrent.x,t.velocity.prevPositionY=t.image.touchesCurrent.y,t.velocity.prevTime=Date.now(),t.gesture.imageWrap.transform("translate3d("+t.image.currentX+"px, "+t.image.currentY+"px,0)")}}},onTouchEnd:function(e,t){var a=e.zoom;if(a.gesture.image&&0!==a.gesture.image.length){if(!a.image.isTouched||!a.image.isMoved)return a.image.isTouched=!1,void(a.image.isMoved=!1);a.image.isTouched=!1,a.image.isMoved=!1;var o=300,i=300,r=a.velocity.x*o,n=a.image.currentX+r,s=a.velocity.y*i,l=a.image.currentY+s;0!==a.velocity.x&&(o=Math.abs((n-a.image.currentX)/a.velocity.x)),0!==a.velocity.y&&(i=Math.abs((l-a.image.currentY)/a.velocity.y));var d=Math.max(o,i);a.image.currentX=n,a.image.currentY=l;var c=a.image.width*a.scale,u=a.image.height*a.scale;a.image.minX=Math.min(a.gesture.slideWidth/2-c/2,0),a.image.maxX=-a.image.minX,a.image.minY=Math.min(a.gesture.slideHeight/2-u/2,0),a.image.maxY=-a.image.minY,a.image.currentX=Math.max(Math.min(a.image.currentX,a.image.maxX),a.image.minX),a.image.currentY=Math.max(Math.min(a.image.currentY,a.image.maxY),a.image.minY),a.gesture.imageWrap.transition(d).transform("translate3d("+a.image.currentX+"px, "+a.image.currentY+"px,0)")}},onTransitionEnd:function(e){var t=e.zoom;t.gesture.slide&&e.previousIndex!==e.activeIndex&&(t.gesture.image.transform("translate3d(0,0,0) scale(1)"),t.gesture.imageWrap.transform("translate3d(0,0,0)"),t.gesture.slide=t.gesture.image=t.gesture.imageWrap=void 0,t.scale=t.currentScale=1)},toggleZoom:function(t,a){var o,i,r,n,s,l,d,c,u,p,f,m,h,g,b,v,x=t.zoom;(x.gesture.slide||(x.gesture.slide=t.clickedSlide?e(t.clickedSlide):t.slides.eq(t.activeIndex),x.gesture.image=x.gesture.slide.find("img, svg, canvas"),x.gesture.imageWrap=x.gesture.image.parent("."+t.params.zoomContainerClass)),x.gesture.image&&0!==x.gesture.image.length)&&(void 0===x.image.touchesStart.x&&a?(o="touchend"===a.type?a.changedTouches[0].pageX:a.pageX,i="touchend"===a.type?a.changedTouches[0].pageY:a.pageY):(o=x.image.touchesStart.x,i=x.image.touchesStart.y),x.scale&&1!==x.scale?(x.scale=x.currentScale=1,x.gesture.imageWrap.transition(300).transform("translate3d(0,0,0)"),x.gesture.image.transition(300).transform("translate3d(0,0,0) scale(1)"),x.gesture.slide=void 0):(x.scale=x.currentScale=x.gesture.imageWrap.attr("data-swiper-zoom")||t.params.zoomMax,a?(b=x.gesture.slide[0].offsetWidth,v=x.gesture.slide[0].offsetHeight,r=x.gesture.slide.offset().left+b/2-o,n=x.gesture.slide.offset().top+v/2-i,d=x.gesture.image[0].offsetWidth,c=x.gesture.image[0].offsetHeight,u=d*x.scale,p=c*x.scale,h=-(f=Math.min(b/2-u/2,0)),g=-(m=Math.min(v/2-p/2,0)),s=r*x.scale,l=n*x.scale,s<f&&(s=f),s>h&&(s=h),l<m&&(l=m),l>g&&(l=g)):(s=0,l=0),x.gesture.imageWrap.transition(300).transform("translate3d("+s+"px, "+l+"px,0)"),x.gesture.image.transition(300).transform("translate3d(0,0,0) scale("+x.scale+")")))},attachEvents:function(t){var a=t?"off":"on";if(p.params.zoom){p.slides;var o=!("touchstart"!==p.touchEvents.start||!p.support.passiveListener||!p.params.passiveListeners)&&{passive:!0,capture:!1};p.support.gestures?(p.slides[a]("gesturestart",p.zoom.onGestureStart,o),p.slides[a]("gesturechange",p.zoom.onGestureChange,o),p.slides[a]("gestureend",p.zoom.onGestureEnd,o)):"touchstart"===p.touchEvents.start&&(p.slides[a](p.touchEvents.start,p.zoom.onGestureStart,o),p.slides[a](p.touchEvents.move,p.zoom.onGestureChange,o),p.slides[a](p.touchEvents.end,p.zoom.onGestureEnd,o)),p[a]("touchStart",p.zoom.onTouchStart),p.slides.each(function(t,o){e(o).find("."+p.params.zoomContainerClass).length>0&&e(o)[a](p.touchEvents.move,p.zoom.onTouchMove)}),p[a]("touchEnd",p.zoom.onTouchEnd),p[a]("transitionEnd",p.zoom.onTransitionEnd),p.params.zoomToggle&&p.on("doubleTap",p.zoom.toggleZoom)}},init:function(){p.zoom.attachEvents()},destroy:function(){p.zoom.attachEvents(!0)}},p._plugins=[],p.plugins){var P=p.plugins[M](p,p.params[M]);P&&p._plugins.push(P)}return p.callPlugins=function(e){for(var t=0;t<p._plugins.length;t++)e in p._plugins[t]&&p._plugins[t][e](arguments[1],arguments[2],arguments[3],arguments[4],arguments[5])},p.emitterEventListeners={},p.emit=function(e){var t;if(p.params[e]&&p.params[e](arguments[1],arguments[2],arguments[3],arguments[4],arguments[5]),p.emitterEventListeners[e])for(t=0;t<p.emitterEventListeners[e].length;t++)p.emitterEventListeners[e][t](arguments[1],arguments[2],arguments[3],arguments[4],arguments[5]);p.callPlugins&&p.callPlugins(e,arguments[1],arguments[2],arguments[3],arguments[4],arguments[5])},p.on=function(e,t){return e=R(e),p.emitterEventListeners[e]||(p.emitterEventListeners[e]=[]),p.emitterEventListeners[e].push(t),p},p.off=function(e,t){var a;if(e=R(e),void 0===t)return p.emitterEventListeners[e]=[],p;if(p.emitterEventListeners[e]&&0!==p.emitterEventListeners[e].length){for(a=0;a<p.emitterEventListeners[e].length;a++)p.emitterEventListeners[e][a]===t&&p.emitterEventListeners[e].splice(a,1);return p}},p.once=function(e,t){e=R(e);var a=function(){t(arguments[0],arguments[1],arguments[2],arguments[3],arguments[4]),p.off(e,a)};return p.on(e,a),p},p.a11y={makeFocusable:function(e){return e.attr("tabIndex","0"),e},addRole:function(e,t){return e.attr("role",t),e},addLabel:function(e,t){return e.attr("aria-label",t),e},disable:function(e){return e.attr("aria-disabled",!0),e},enable:function(e){return e.attr("aria-disabled",!1),e},onEnterKey:function(t){13===t.keyCode&&(e(t.target).is(p.params.nextButton)?(p.onClickNext(t),p.isEnd?p.a11y.notify(p.params.lastSlideMessage):p.a11y.notify(p.params.nextSlideMessage)):e(t.target).is(p.params.prevButton)&&(p.onClickPrev(t),p.isBeginning?p.a11y.notify(p.params.firstSlideMessage):p.a11y.notify(p.params.prevSlideMessage)),e(t.target).is("."+p.params.bulletClass)&&e(t.target)[0].click())},liveRegion:e('<span class="'+p.params.notificationClass+'" aria-live="assertive" aria-atomic="true"></span>'),notify:function(e){var t=p.a11y.liveRegion;0!==t.length&&(t.html(""),t.html(e))},init:function(){p.params.nextButton&&p.nextButton&&p.nextButton.length>0&&(p.a11y.makeFocusable(p.nextButton),p.a11y.addRole(p.nextButton,"button"),p.a11y.addLabel(p.nextButton,p.params.nextSlideMessage)),p.params.prevButton&&p.prevButton&&p.prevButton.length>0&&(p.a11y.makeFocusable(p.prevButton),p.a11y.addRole(p.prevButton,"button"),p.a11y.addLabel(p.prevButton,p.params.prevSlideMessage)),e(p.container).append(p.a11y.liveRegion)},initPagination:function(){p.params.pagination&&p.params.paginationClickable&&p.bullets&&p.bullets.length&&p.bullets.each(function(){var t=e(this);p.a11y.makeFocusable(t),p.a11y.addRole(t,"button"),p.a11y.addLabel(t,p.params.paginationBulletMessage.replace(/{{index}}/,t.index()+1))})},destroy:function(){p.a11y.liveRegion&&p.a11y.liveRegion.length>0&&p.a11y.liveRegion.remove()}},p.init=function(){p.params.loop&&p.createLoop(),p.updateContainerSize(),p.updateSlidesSize(),p.updatePagination(),p.params.scrollbar&&p.scrollbar&&(p.scrollbar.set(),p.params.scrollbarDraggable&&p.scrollbar.enableDraggable()),"slide"!==p.params.effect&&p.effects[p.params.effect]&&(p.params.loop||p.updateProgress(),p.effects[p.params.effect].setTranslate()),p.params.loop?p.slideTo(p.params.initialSlide+p.loopedSlides,0,p.params.runCallbacksOnInit):(p.slideTo(p.params.initialSlide,0,p.params.runCallbacksOnInit),0===p.params.initialSlide&&(p.parallax&&p.params.parallax&&p.parallax.setTranslate(),p.lazy&&p.params.lazyLoading&&(p.lazy.load(),p.lazy.initialImageLoaded=!0))),p.attachEvents(),p.params.observer&&p.support.observer&&p.initObservers(),p.params.preloadImages&&!p.params.lazyLoading&&p.preloadImages(),p.params.zoom&&p.zoom&&p.zoom.init(),p.params.autoplay&&p.startAutoplay(),p.params.keyboardControl&&p.enableKeyboardControl&&p.enableKeyboardControl(),p.params.mousewheelControl&&p.enableMousewheelControl&&p.enableMousewheelControl(),p.params.hashnavReplaceState&&(p.params.replaceState=p.params.hashnavReplaceState),p.params.history&&p.history&&p.history.init(),p.params.hashnav&&p.hashnav&&p.hashnav.init(),p.params.a11y&&p.a11y&&p.a11y.init(),p.emit("onInit",p)},p.cleanupStyles=function(){p.container.removeClass(p.classNames.join(" ")).removeAttr("style"),p.wrapper.removeAttr("style"),p.slides&&p.slides.length&&p.slides.removeClass([p.params.slideVisibleClass,p.params.slideActiveClass,p.params.slideNextClass,p.params.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-column").removeAttr("data-swiper-row"),p.paginationContainer&&p.paginationContainer.length&&p.paginationContainer.removeClass(p.params.paginationHiddenClass),p.bullets&&p.bullets.length&&p.bullets.removeClass(p.params.bulletActiveClass),p.params.prevButton&&e(p.params.prevButton).removeClass(p.params.buttonDisabledClass),p.params.nextButton&&e(p.params.nextButton).removeClass(p.params.buttonDisabledClass),p.params.scrollbar&&p.scrollbar&&(p.scrollbar.track&&p.scrollbar.track.length&&p.scrollbar.track.removeAttr("style"),p.scrollbar.drag&&p.scrollbar.drag.length&&p.scrollbar.drag.removeAttr("style"))},p.destroy=function(e,t){p.detachEvents(),p.stopAutoplay(),p.params.scrollbar&&p.scrollbar&&p.params.scrollbarDraggable&&p.scrollbar.disableDraggable(),p.params.loop&&p.destroyLoop(),t&&p.cleanupStyles(),p.disconnectObservers(),p.params.zoom&&p.zoom&&p.zoom.destroy(),p.params.keyboardControl&&p.disableKeyboardControl&&p.disableKeyboardControl(),p.params.mousewheelControl&&p.disableMousewheelControl&&p.disableMousewheelControl(),p.params.a11y&&p.a11y&&p.a11y.destroy(),p.params.history&&!p.params.replaceState&&window.removeEventListener("popstate",p.history.setHistoryPopState),p.params.hashnav&&p.hashnav&&p.hashnav.destroy(),p.emit("onDestroy"),!1!==e&&(p=null)},p.init(),p}function I(e){return Math.floor(e)}function L(){var e=p.params.autoplay,t=p.slides.eq(p.activeIndex);t.attr("data-swiper-autoplay")&&(e=t.attr("data-swiper-autoplay")||p.params.autoplay),p.autoplayTimeoutId=setTimeout(function(){p.params.loop?(p.fixLoop(),p._slideNext(),p.emit("onAutoplay",p)):p.isEnd?a.autoplayStopOnLast?p.stopAutoplay():(p._slideTo(0),p.emit("onAutoplay",p)):(p._slideNext(),p.emit("onAutoplay",p))},e)}function B(t,a){var o=e(t.target);if(!o.is(a))if("string"==typeof a)o=o.parents(a);else if(a.nodeType){var i;return o.parents().each(function(e,t){t===a&&(i=a)}),i?a:void 0}if(0!==o.length)return o[0]}function D(e,t){t=t||{};var a=new(window.MutationObserver||window.WebkitMutationObserver)(function(e){e.forEach(function(e){p.onResize(!0),p.emit("onObserverUpdate",p,e)})});a.observe(e,{attributes:void 0===t.attributes||t.attributes,childList:void 0===t.childList||t.childList,characterData:void 0===t.characterData||t.characterData}),p.observers.push(a)}function O(e){e.originalEvent&&(e=e.originalEvent);var t=e.keyCode||e.charCode;if(!p.params.allowSwipeToNext&&(p.isHorizontal()&&39===t||!p.isHorizontal()&&40===t))return!1;if(!p.params.allowSwipeToPrev&&(p.isHorizontal()&&37===t||!p.isHorizontal()&&38===t))return!1;if(!(e.shiftKey||e.altKey||e.ctrlKey||e.metaKey||document.activeElement&&document.activeElement.nodeName&&("input"===document.activeElement.nodeName.toLowerCase()||"textarea"===document.activeElement.nodeName.toLowerCase()))){if(37===t||39===t||38===t||40===t){var a=!1;if(p.container.parents("."+p.params.slideClass).length>0&&0===p.container.parents("."+p.params.slideActiveClass).length)return;var o={left:window.pageXOffset,top:window.pageYOffset},i=window.innerWidth,r=window.innerHeight,n=p.container.offset();p.rtl&&(n.left=n.left-p.container[0].scrollLeft);for(var s=[[n.left,n.top],[n.left+p.width,n.top],[n.left,n.top+p.height],[n.left+p.width,n.top+p.height]],l=0;l<s.length;l++){var d=s[l];d[0]>=o.left&&d[0]<=o.left+i&&d[1]>=o.top&&d[1]<=o.top+r&&(a=!0)}if(!a)return}p.isHorizontal()?(37!==t&&39!==t||(e.preventDefault?e.preventDefault():e.returnValue=!1),(39===t&&!p.rtl||37===t&&p.rtl)&&p.slideNext(),(37===t&&!p.rtl||39===t&&p.rtl)&&p.slidePrev()):(38!==t&&40!==t||(e.preventDefault?e.preventDefault():e.returnValue=!1),40===t&&p.slideNext(),38===t&&p.slidePrev()),p.emit("onKeyPress",p,t)}}function N(e){e.originalEvent&&(e=e.originalEvent);var t,a,o,i,r,n=0,s=p.rtl?-1:1,l=(a=0,o=0,i=0,r=0,"detail"in(t=e)&&(o=t.detail),"wheelDelta"in t&&(o=-t.wheelDelta/120),"wheelDeltaY"in t&&(o=-t.wheelDeltaY/120),"wheelDeltaX"in t&&(a=-t.wheelDeltaX/120),"axis"in t&&t.axis===t.HORIZONTAL_AXIS&&(a=o,o=0),i=10*a,r=10*o,"deltaY"in t&&(r=t.deltaY),"deltaX"in t&&(i=t.deltaX),(i||r)&&t.deltaMode&&(1===t.deltaMode?(i*=40,r*=40):(i*=800,r*=800)),i&&!a&&(a=i<1?-1:1),r&&!o&&(o=r<1?-1:1),{spinX:a,spinY:o,pixelX:i,pixelY:r});if(p.params.mousewheelForceToAxis)if(p.isHorizontal()){if(!(Math.abs(l.pixelX)>Math.abs(l.pixelY)))return;n=l.pixelX*s}else{if(!(Math.abs(l.pixelY)>Math.abs(l.pixelX)))return;n=l.pixelY}else n=Math.abs(l.pixelX)>Math.abs(l.pixelY)?-l.pixelX*s:-l.pixelY;if(0!==n){if(p.params.mousewheelInvert&&(n=-n),p.params.freeMode){var d=p.getWrapperTranslate()+n*p.params.mousewheelSensitivity,c=p.isBeginning,u=p.isEnd;if(d>=p.minTranslate()&&(d=p.minTranslate()),d<=p.maxTranslate()&&(d=p.maxTranslate()),p.setWrapperTransition(0),p.setWrapperTranslate(d),p.updateProgress(),p.updateActiveIndex(),(!c&&p.isBeginning||!u&&p.isEnd)&&p.updateClasses(),p.params.freeModeSticky?(clearTimeout(p.mousewheel.timeout),p.mousewheel.timeout=setTimeout(function(){p.slideReset()},300)):p.params.lazyLoading&&p.lazy&&p.lazy.load(),p.emit("onScroll",p,e),p.params.autoplay&&p.params.autoplayDisableOnInteraction&&p.stopAutoplay(),0===d||d===p.maxTranslate())return}else{if((new window.Date).getTime()-p.mousewheel.lastScrollTime>60)if(n<0)if(p.isEnd&&!p.params.loop||p.animating){if(p.params.mousewheelReleaseOnEdges)return!0}else p.slideNext(),p.emit("onScroll",p,e);else if(p.isBeginning&&!p.params.loop||p.animating){if(p.params.mousewheelReleaseOnEdges)return!0}else p.slidePrev(),p.emit("onScroll",p,e);p.mousewheel.lastScrollTime=(new window.Date).getTime()}return e.preventDefault?e.preventDefault():e.returnValue=!1,!1}}function A(t,a){var o,i,r;t=e(t);var n=p.rtl?-1:1;o=t.attr("data-swiper-parallax")||"0",i=t.attr("data-swiper-parallax-x"),r=t.attr("data-swiper-parallax-y"),i||r?(i=i||"0",r=r||"0"):p.isHorizontal()?(i=o,r="0"):(r=o,i="0"),i=i.indexOf("%")>=0?parseInt(i,10)*a*n+"%":i*a*n+"px",r=r.indexOf("%")>=0?parseInt(r,10)*a+"%":r*a+"px",t.transform("translate3d("+i+", "+r+",0px)")}function R(e){return 0!==e.indexOf("on")&&(e=e[0]!==e[0].toUpperCase()?"on"+e[0].toUpperCase()+e.substring(1):"on"+e),e}};o.prototype={isSafari:(a=window.navigator.userAgent.toLowerCase(),a.indexOf("safari")>=0&&a.indexOf("chrome")<0&&a.indexOf("android")<0),isUiWebView:/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(window.navigator.userAgent),isArray:function(e){return"[object Array]"===Object.prototype.toString.apply(e)},browser:{ie:window.navigator.pointerEnabled||window.navigator.msPointerEnabled,ieTouch:window.navigator.msPointerEnabled&&window.navigator.msMaxTouchPoints>1||window.navigator.pointerEnabled&&window.navigator.maxTouchPoints>1,lteIE9:(t=document.createElement("div"),t.innerHTML="\x3c!--[if lte IE 9]><i></i><![endif]--\x3e",1===t.getElementsByTagName("i").length)},device:function(){var e=window.navigator.userAgent,t=e.match(/(Android);?[\s\/]+([\d.]+)?/),a=e.match(/(iPad).*OS\s([\d_]+)/),o=e.match(/(iPod)(.*OS\s([\d_]+))?/),i=!a&&e.match(/(iPhone\sOS|iOS)\s([\d_]+)/);return{ios:a||i||o,android:t}}(),support:{touch:window.Modernizr&&!0===Modernizr.touch||!!("ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch),transforms3d:window.Modernizr&&!0===Modernizr.csstransforms3d||function(){var e=document.createElement("div").style;return"webkitPerspective"in e||"MozPerspective"in e||"OPerspective"in e||"MsPerspective"in e||"perspective"in e}(),flexbox:function(){for(var e=document.createElement("div").style,t="alignItems webkitAlignItems webkitBoxAlign msFlexAlign mozBoxAlign webkitFlexDirection msFlexDirection mozBoxDirection mozBoxOrient webkitBoxDirection webkitBoxOrient".split(" "),a=0;a<t.length;a++)if(t[a]in e)return!0}(),observer:"MutationObserver"in window||"WebkitMutationObserver"in window,passiveListener:function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("testPassiveListener",null,t)}catch(e){}return e}(),gestures:"ongesturestart"in window},plugins:{}};for(var i,r=function(){var e=function(e){var t=0;for(t=0;t<e.length;t++)this[t]=e[t];return this.length=e.length,this},t=function(t,a){var o=[],i=0;if(t&&!a&&t instanceof e)return t;if(t)if("string"==typeof t){var r,n,s=t.trim();if(s.indexOf("<")>=0&&s.indexOf(">")>=0){var l="div";for(0===s.indexOf("<li")&&(l="ul"),0===s.indexOf("<tr")&&(l="tbody"),0!==s.indexOf("<td")&&0!==s.indexOf("<th")||(l="tr"),0===s.indexOf("<tbody")&&(l="table"),0===s.indexOf("<option")&&(l="select"),(n=document.createElement(l)).innerHTML=t,i=0;i<n.childNodes.length;i++)o.push(n.childNodes[i])}else for(r=a||"#"!==t[0]||t.match(/[ .<>:~]/)?(a||document).querySelectorAll(t):[document.getElementById(t.split("#")[1])],i=0;i<r.length;i++)r[i]&&o.push(r[i])}else if(t.nodeType||t===window||t===document)o.push(t);else if(t.length>0&&t[0].nodeType)for(i=0;i<t.length;i++)o.push(t[i]);return new e(o)};return e.prototype={addClass:function(e){if(void 0===e)return this;for(var t=e.split(" "),a=0;a<t.length;a++)for(var o=0;o<this.length;o++)this[o].classList.add(t[a]);return this},removeClass:function(e){for(var t=e.split(" "),a=0;a<t.length;a++)for(var o=0;o<this.length;o++)this[o].classList.remove(t[a]);return this},hasClass:function(e){return!!this[0]&&this[0].classList.contains(e)},toggleClass:function(e){for(var t=e.split(" "),a=0;a<t.length;a++)for(var o=0;o<this.length;o++)this[o].classList.toggle(t[a]);return this},attr:function(e,t){if(1===arguments.length&&"string"==typeof e)return this[0]?this[0].getAttribute(e):void 0;for(var a=0;a<this.length;a++)if(2===arguments.length)this[a].setAttribute(e,t);else for(var o in e)this[a][o]=e[o],this[a].setAttribute(o,e[o]);return this},removeAttr:function(e){for(var t=0;t<this.length;t++)this[t].removeAttribute(e);return this},data:function(e,t){if(void 0!==t){for(var a=0;a<this.length;a++){var o=this[a];o.dom7ElementDataStorage||(o.dom7ElementDataStorage={}),o.dom7ElementDataStorage[e]=t}return this}if(this[0]){var i=this[0].getAttribute("data-"+e);return i||(this[0].dom7ElementDataStorage&&e in this[0].dom7ElementDataStorage?this[0].dom7ElementDataStorage[e]:void 0)}},transform:function(e){for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransform=a.MsTransform=a.msTransform=a.MozTransform=a.OTransform=a.transform=e}return this},transition:function(e){"string"!=typeof e&&(e+="ms");for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransitionDuration=a.MsTransitionDuration=a.msTransitionDuration=a.MozTransitionDuration=a.OTransitionDuration=a.transitionDuration=e}return this},on:function(e,a,o,i){function r(e){var i=e.target;if(t(i).is(a))o.call(i,e);else for(var r=t(i).parents(),n=0;n<r.length;n++)t(r[n]).is(a)&&o.call(r[n],e)}var n,s,l=e.split(" ");for(n=0;n<this.length;n++)if("function"==typeof a||!1===a)for("function"==typeof a&&(o=arguments[1],i=arguments[2]||!1),s=0;s<l.length;s++)this[n].addEventListener(l[s],o,i);else for(s=0;s<l.length;s++)this[n].dom7LiveListeners||(this[n].dom7LiveListeners=[]),this[n].dom7LiveListeners.push({listener:o,liveListener:r}),this[n].addEventListener(l[s],r,i);return this},off:function(e,t,a,o){for(var i=e.split(" "),r=0;r<i.length;r++)for(var n=0;n<this.length;n++)if("function"==typeof t||!1===t)"function"==typeof t&&(a=arguments[1],o=arguments[2]||!1),this[n].removeEventListener(i[r],a,o);else if(this[n].dom7LiveListeners)for(var s=0;s<this[n].dom7LiveListeners.length;s++)this[n].dom7LiveListeners[s].listener===a&&this[n].removeEventListener(i[r],this[n].dom7LiveListeners[s].liveListener,o);return this},once:function(e,t,a,o){var i=this;"function"==typeof t&&(t=!1,a=arguments[1],o=arguments[2]),i.on(e,t,function r(n){a(n),i.off(e,t,r,o)},o)},trigger:function(e,t){for(var a=0;a<this.length;a++){var o;try{o=new window.CustomEvent(e,{detail:t,bubbles:!0,cancelable:!0})}catch(a){(o=document.createEvent("Event")).initEvent(e,!0,!0),o.detail=t}this[a].dispatchEvent(o)}return this},transitionEnd:function(e){var t,a=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],o=this;function i(r){if(r.target===this)for(e.call(this,r),t=0;t<a.length;t++)o.off(a[t],i)}if(e)for(t=0;t<a.length;t++)o.on(a[t],i);return this},width:function(){return this[0]===window?window.innerWidth:this.length>0?parseFloat(this.css("width")):null},outerWidth:function(e){return this.length>0?e?this[0].offsetWidth+parseFloat(this.css("margin-right"))+parseFloat(this.css("margin-left")):this[0].offsetWidth:null},height:function(){return this[0]===window?window.innerHeight:this.length>0?parseFloat(this.css("height")):null},outerHeight:function(e){return this.length>0?e?this[0].offsetHeight+parseFloat(this.css("margin-top"))+parseFloat(this.css("margin-bottom")):this[0].offsetHeight:null},offset:function(){if(this.length>0){var e=this[0],t=e.getBoundingClientRect(),a=document.body,o=e.clientTop||a.clientTop||0,i=e.clientLeft||a.clientLeft||0,r=window.pageYOffset||e.scrollTop,n=window.pageXOffset||e.scrollLeft;return{top:t.top+r-o,left:t.left+n-i}}return null},css:function(e,t){var a;if(1===arguments.length){if("string"!=typeof e){for(a=0;a<this.length;a++)for(var o in e)this[a].style[o]=e[o];return this}if(this[0])return window.getComputedStyle(this[0],null).getPropertyValue(e)}if(2===arguments.length&&"string"==typeof e){for(a=0;a<this.length;a++)this[a].style[e]=t;return this}return this},each:function(e){for(var t=0;t<this.length;t++)e.call(this[t],t,this[t]);return this},html:function(e){if(void 0===e)return this[0]?this[0].innerHTML:void 0;for(var t=0;t<this.length;t++)this[t].innerHTML=e;return this},text:function(e){if(void 0===e)return this[0]?this[0].textContent.trim():null;for(var t=0;t<this.length;t++)this[t].textContent=e;return this},is:function(a){if(!this[0])return!1;var o,i;if("string"==typeof a){var r=this[0];if(r===document)return a===document;if(r===window)return a===window;if(r.matches)return r.matches(a);if(r.webkitMatchesSelector)return r.webkitMatchesSelector(a);if(r.mozMatchesSelector)return r.mozMatchesSelector(a);if(r.msMatchesSelector)return r.msMatchesSelector(a);for(o=t(a),i=0;i<o.length;i++)if(o[i]===this[0])return!0;return!1}if(a===document)return this[0]===document;if(a===window)return this[0]===window;if(a.nodeType||a instanceof e){for(o=a.nodeType?[a]:a,i=0;i<o.length;i++)if(o[i]===this[0])return!0;return!1}return!1},index:function(){if(this[0]){for(var e=this[0],t=0;null!==(e=e.previousSibling);)1===e.nodeType&&t++;return t}},eq:function(t){if(void 0===t)return this;var a,o=this.length;return new e(t>o-1?[]:t<0?(a=o+t)<0?[]:[this[a]]:[this[t]])},append:function(t){var a,o;for(a=0;a<this.length;a++)if("string"==typeof t){var i=document.createElement("div");for(i.innerHTML=t;i.firstChild;)this[a].appendChild(i.firstChild)}else if(t instanceof e)for(o=0;o<t.length;o++)this[a].appendChild(t[o]);else this[a].appendChild(t);return this},prepend:function(t){var a,o;for(a=0;a<this.length;a++)if("string"==typeof t){var i=document.createElement("div");for(i.innerHTML=t,o=i.childNodes.length-1;o>=0;o--)this[a].insertBefore(i.childNodes[o],this[a].childNodes[0])}else if(t instanceof e)for(o=0;o<t.length;o++)this[a].insertBefore(t[o],this[a].childNodes[0]);else this[a].insertBefore(t,this[a].childNodes[0]);return this},insertBefore:function(e){for(var a=t(e),o=0;o<this.length;o++)if(1===a.length)a[0].parentNode.insertBefore(this[o],a[0]);else if(a.length>1)for(var i=0;i<a.length;i++)a[i].parentNode.insertBefore(this[o].cloneNode(!0),a[i])},insertAfter:function(e){for(var a=t(e),o=0;o<this.length;o++)if(1===a.length)a[0].parentNode.insertBefore(this[o],a[0].nextSibling);else if(a.length>1)for(var i=0;i<a.length;i++)a[i].parentNode.insertBefore(this[o].cloneNode(!0),a[i].nextSibling)},next:function(a){return this.length>0?a?this[0].nextElementSibling&&t(this[0].nextElementSibling).is(a)?new e([this[0].nextElementSibling]):new e([]):this[0].nextElementSibling?new e([this[0].nextElementSibling]):new e([]):new e([])},nextAll:function(a){var o=[],i=this[0];if(!i)return new e([]);for(;i.nextElementSibling;){var r=i.nextElementSibling;a?t(r).is(a)&&o.push(r):o.push(r),i=r}return new e(o)},prev:function(a){return this.length>0?a?this[0].previousElementSibling&&t(this[0].previousElementSibling).is(a)?new e([this[0].previousElementSibling]):new e([]):this[0].previousElementSibling?new e([this[0].previousElementSibling]):new e([]):new e([])},prevAll:function(a){var o=[],i=this[0];if(!i)return new e([]);for(;i.previousElementSibling;){var r=i.previousElementSibling;a?t(r).is(a)&&o.push(r):o.push(r),i=r}return new e(o)},parent:function(e){for(var a=[],o=0;o<this.length;o++)e?t(this[o].parentNode).is(e)&&a.push(this[o].parentNode):a.push(this[o].parentNode);return t(t.unique(a))},parents:function(e){for(var a=[],o=0;o<this.length;o++)for(var i=this[o].parentNode;i;)e?t(i).is(e)&&a.push(i):a.push(i),i=i.parentNode;return t(t.unique(a))},find:function(t){for(var a=[],o=0;o<this.length;o++)for(var i=this[o].querySelectorAll(t),r=0;r<i.length;r++)a.push(i[r]);return new e(a)},children:function(a){for(var o=[],i=0;i<this.length;i++)for(var r=this[i].childNodes,n=0;n<r.length;n++)a?1===r[n].nodeType&&t(r[n]).is(a)&&o.push(r[n]):1===r[n].nodeType&&o.push(r[n]);return new e(t.unique(o))},remove:function(){for(var e=0;e<this.length;e++)this[e].parentNode&&this[e].parentNode.removeChild(this[e]);return this},add:function(){var e,a;for(e=0;e<arguments.length;e++){var o=t(arguments[e]);for(a=0;a<o.length;a++)this[this.length]=o[a],this.length++}return this}},t.fn=e.prototype,t.unique=function(e){for(var t=[],a=0;a<e.length;a++)-1===t.indexOf(e[a])&&t.push(e[a]);return t},t}(),n=["jQuery","Zepto","Dom7"],s=0;s<n.length;s++)window[n[s]]&&l(window[n[s]]);function l(e){e.fn.swiper=function(t){var a;return e(this).each(function(){var e=new o(this,t);a||(a=e)}),a}}(i=void 0===r?window.Dom7||window.Zepto||window.jQuery:r)&&("transitionEnd"in i.fn||(i.fn.transitionEnd=function(e){var t,a=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"],o=this;function i(r){if(r.target===this)for(e.call(this,r),t=0;t<a.length;t++)o.off(a[t],i)}if(e)for(t=0;t<a.length;t++)o.on(a[t],i);return this}),"transform"in i.fn||(i.fn.transform=function(e){for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransform=a.MsTransform=a.msTransform=a.MozTransform=a.OTransform=a.transform=e}return this}),"transition"in i.fn||(i.fn.transition=function(e){"string"!=typeof e&&(e+="ms");for(var t=0;t<this.length;t++){var a=this[t].style;a.webkitTransitionDuration=a.MsTransitionDuration=a.msTransitionDuration=a.MozTransitionDuration=a.OTransitionDuration=a.transitionDuration=e}return this}),"outerWidth"in i.fn||(i.fn.outerWidth=function(e){return this.length>0?e?this[0].offsetWidth+parseFloat(this.css("margin-right"))+parseFloat(this.css("margin-left")):this[0].offsetWidth:null})),window.Swiper=o}(),e.exports=window.Swiper}},[310]);
>>>>>>> origin/master
=======
webpackJsonp([7],{

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var bind = __webpack_require__(14);
var isBuffer = __webpack_require__(38);

/*global toString:true*/

// utils is a library of generic helper functions non-specific to axios

var toString = Object.prototype.toString;

/**
 * Determine if a value is an Array
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Array, otherwise false
 */
function isArray(val) {
  return toString.call(val) === '[object Array]';
}

/**
 * Determine if a value is an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an ArrayBuffer, otherwise false
 */
function isArrayBuffer(val) {
  return toString.call(val) === '[object ArrayBuffer]';
}

/**
 * Determine if a value is a FormData
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an FormData, otherwise false
 */
function isFormData(val) {
  return (typeof FormData !== 'undefined') && (val instanceof FormData);
}

/**
 * Determine if a value is a view on an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a view on an ArrayBuffer, otherwise false
 */
function isArrayBufferView(val) {
  var result;
  if ((typeof ArrayBuffer !== 'undefined') && (ArrayBuffer.isView)) {
    result = ArrayBuffer.isView(val);
  } else {
    result = (val) && (val.buffer) && (val.buffer instanceof ArrayBuffer);
  }
  return result;
}

/**
 * Determine if a value is a String
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a String, otherwise false
 */
function isString(val) {
  return typeof val === 'string';
}

/**
 * Determine if a value is a Number
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Number, otherwise false
 */
function isNumber(val) {
  return typeof val === 'number';
}

/**
 * Determine if a value is undefined
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if the value is undefined, otherwise false
 */
function isUndefined(val) {
  return typeof val === 'undefined';
}

/**
 * Determine if a value is an Object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Object, otherwise false
 */
function isObject(val) {
  return val !== null && typeof val === 'object';
}

/**
 * Determine if a value is a Date
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Date, otherwise false
 */
function isDate(val) {
  return toString.call(val) === '[object Date]';
}

/**
 * Determine if a value is a File
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a File, otherwise false
 */
function isFile(val) {
  return toString.call(val) === '[object File]';
}

/**
 * Determine if a value is a Blob
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Blob, otherwise false
 */
function isBlob(val) {
  return toString.call(val) === '[object Blob]';
}

/**
 * Determine if a value is a Function
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Function, otherwise false
 */
function isFunction(val) {
  return toString.call(val) === '[object Function]';
}

/**
 * Determine if a value is a Stream
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Stream, otherwise false
 */
function isStream(val) {
  return isObject(val) && isFunction(val.pipe);
}

/**
 * Determine if a value is a URLSearchParams object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a URLSearchParams object, otherwise false
 */
function isURLSearchParams(val) {
  return typeof URLSearchParams !== 'undefined' && val instanceof URLSearchParams;
}

/**
 * Trim excess whitespace off the beginning and end of a string
 *
 * @param {String} str The String to trim
 * @returns {String} The String freed of excess whitespace
 */
function trim(str) {
  return str.replace(/^\s*/, '').replace(/\s*$/, '');
}

/**
 * Determine if we're running in a standard browser environment
 *
 * This allows axios to run in a web worker, and react-native.
 * Both environments support XMLHttpRequest, but not fully standard globals.
 *
 * web workers:
 *  typeof window -> undefined
 *  typeof document -> undefined
 *
 * react-native:
 *  navigator.product -> 'ReactNative'
 */
function isStandardBrowserEnv() {
  if (typeof navigator !== 'undefined' && navigator.product === 'ReactNative') {
    return false;
  }
  return (
    typeof window !== 'undefined' &&
    typeof document !== 'undefined'
  );
}

/**
 * Iterate over an Array or an Object invoking a function for each item.
 *
 * If `obj` is an Array callback will be called passing
 * the value, index, and complete array for each item.
 *
 * If 'obj' is an Object callback will be called passing
 * the value, key, and complete object for each property.
 *
 * @param {Object|Array} obj The object to iterate
 * @param {Function} fn The callback to invoke for each item
 */
function forEach(obj, fn) {
  // Don't bother if no value provided
  if (obj === null || typeof obj === 'undefined') {
    return;
  }

  // Force an array if not already something iterable
  if (typeof obj !== 'object') {
    /*eslint no-param-reassign:0*/
    obj = [obj];
  }

  if (isArray(obj)) {
    // Iterate over array values
    for (var i = 0, l = obj.length; i < l; i++) {
      fn.call(null, obj[i], i, obj);
    }
  } else {
    // Iterate over object keys
    for (var key in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, key)) {
        fn.call(null, obj[key], key, obj);
      }
    }
  }
}

/**
 * Accepts varargs expecting each argument to be an object, then
 * immutably merges the properties of each object and returns result.
 *
 * When multiple objects contain the same key the later object in
 * the arguments list will take precedence.
 *
 * Example:
 *
 * ```js
 * var result = merge({foo: 123}, {foo: 456});
 * console.log(result.foo); // outputs 456
 * ```
 *
 * @param {Object} obj1 Object to merge
 * @returns {Object} Result of all merge properties
 */
function merge(/* obj1, obj2, obj3, ... */) {
  var result = {};
  function assignValue(val, key) {
    if (typeof result[key] === 'object' && typeof val === 'object') {
      result[key] = merge(result[key], val);
    } else {
      result[key] = val;
    }
  }

  for (var i = 0, l = arguments.length; i < l; i++) {
    forEach(arguments[i], assignValue);
  }
  return result;
}

/**
 * Extends object a by mutably adding to it the properties of object b.
 *
 * @param {Object} a The object to be extended
 * @param {Object} b The object to copy properties from
 * @param {Object} thisArg The object to bind function to
 * @return {Object} The resulting value of object a
 */
function extend(a, b, thisArg) {
  forEach(b, function assignValue(val, key) {
    if (thisArg && typeof val === 'function') {
      a[key] = bind(val, thisArg);
    } else {
      a[key] = val;
    }
  });
  return a;
}

module.exports = {
  isArray: isArray,
  isArrayBuffer: isArrayBuffer,
  isBuffer: isBuffer,
  isFormData: isFormData,
  isArrayBufferView: isArrayBufferView,
  isString: isString,
  isNumber: isNumber,
  isObject: isObject,
  isUndefined: isUndefined,
  isDate: isDate,
  isFile: isFile,
  isBlob: isBlob,
  isFunction: isFunction,
  isStream: isStream,
  isURLSearchParams: isURLSearchParams,
  isStandardBrowserEnv: isStandardBrowserEnv,
  forEach: forEach,
  merge: merge,
  extend: extend,
  trim: trim
};


/***/ }),

/***/ 1:
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;
function _broadcast(componentName, eventName, params) {
  this.$children.forEach(function (child) {
    var name = child.$options.componentName;

    if (name === componentName) {
      child.$emit.apply(child, [eventName].concat(params));
    } else {
      _broadcast.apply(child, [componentName, eventName].concat([params]));
    }
  });
}
exports.default = {
  methods: {
    dispatch: function dispatch(componentName, eventName, params) {
      var parent = this.$parent || this.$root;
      var name = parent.$options.componentName;

      while (parent && (!name || name !== componentName)) {
        parent = parent.$parent;

        if (parent) {
          name = parent.$options.componentName;
        }
      }
      if (parent) {
        parent.$emit.apply(parent, [eventName].concat(params));
      }
    },
    broadcast: function broadcast(componentName, eventName, params) {
      _broadcast.call(this, componentName, eventName, params);
    }
  }
};

/***/ }),

/***/ 101:
/***/ (function(module, exports, __webpack_require__) {

/**
 * Swiper 3.4.2
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 * 
 * http://www.idangero.us/swiper/
 * 
 * Copyright 2017, Vladimir Kharlampidi
 * The iDangero.us
 * http://www.idangero.us/
 * 
 * Licensed under MIT
 * 
 * Released on: March 10, 2017
 */
(function () {
    'use strict';
    var $;

    /*===========================
    Swiper
    ===========================*/
    var Swiper = function (container, params) {
        if (!(this instanceof Swiper)) return new Swiper(container, params);
    

        var defaults = {
            direction: 'horizontal',
            touchEventsTarget: 'container',
            initialSlide: 0,
            speed: 300,
            // autoplay
            autoplay: false,
            autoplayDisableOnInteraction: true,
            autoplayStopOnLast: false,
            // To support iOS's swipe-to-go-back gesture (when being used in-app, with UIWebView).
            iOSEdgeSwipeDetection: false,
            iOSEdgeSwipeThreshold: 20,
            // Free mode
            freeMode: false,
            freeModeMomentum: true,
            freeModeMomentumRatio: 1,
            freeModeMomentumBounce: true,
            freeModeMomentumBounceRatio: 1,
            freeModeMomentumVelocityRatio: 1,
            freeModeSticky: false,
            freeModeMinimumVelocity: 0.02,
            // Autoheight
            autoHeight: false,
            // Set wrapper width
            setWrapperSize: false,
            // Virtual Translate
            virtualTranslate: false,
            // Effects
            effect: 'slide', // 'slide' or 'fade' or 'cube' or 'coverflow' or 'flip'
            coverflow: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows : true
            },
            flip: {
                slideShadows : true,
                limitRotation: true
            },
            cube: {
                slideShadows: true,
                shadow: true,
                shadowOffset: 20,
                shadowScale: 0.94
            },
            fade: {
                crossFade: false
            },
            // Parallax
            parallax: false,
            // Zoom
            zoom: false,
            zoomMax: 3,
            zoomMin: 1,
            zoomToggle: true,
            // Scrollbar
            scrollbar: null,
            scrollbarHide: true,
            scrollbarDraggable: false,
            scrollbarSnapOnRelease: false,
            // Keyboard Mousewheel
            keyboardControl: false,
            mousewheelControl: false,
            mousewheelReleaseOnEdges: false,
            mousewheelInvert: false,
            mousewheelForceToAxis: false,
            mousewheelSensitivity: 1,
            mousewheelEventsTarged: 'container',
            // Hash Navigation
            hashnav: false,
            hashnavWatchState: false,
            // History
            history: false,
            // Commong Nav State
            replaceState: false,
            // Breakpoints
            breakpoints: undefined,
            // Slides grid
            spaceBetween: 0,
            slidesPerView: 1,
            slidesPerColumn: 1,
            slidesPerColumnFill: 'column',
            slidesPerGroup: 1,
            centeredSlides: false,
            slidesOffsetBefore: 0, // in px
            slidesOffsetAfter: 0, // in px
            // Round length
            roundLengths: false,
            // Touches
            touchRatio: 1,
            touchAngle: 45,
            simulateTouch: true,
            shortSwipes: true,
            longSwipes: true,
            longSwipesRatio: 0.5,
            longSwipesMs: 300,
            followFinger: true,
            onlyExternal: false,
            threshold: 0,
            touchMoveStopPropagation: true,
            touchReleaseOnEdges: false,
            // Unique Navigation Elements
            uniqueNavElements: true,
            // Pagination
            pagination: null,
            paginationElement: 'span',
            paginationClickable: false,
            paginationHide: false,
            paginationBulletRender: null,
            paginationProgressRender: null,
            paginationFractionRender: null,
            paginationCustomRender: null,
            paginationType: 'bullets', // 'bullets' or 'progress' or 'fraction' or 'custom'
            // Resistance
            resistance: true,
            resistanceRatio: 0.85,
            // Next/prev buttons
            nextButton: null,
            prevButton: null,
            // Progress
            watchSlidesProgress: false,
            watchSlidesVisibility: false,
            // Cursor
            grabCursor: false,
            // Clicks
            preventClicks: true,
            preventClicksPropagation: true,
            slideToClickedSlide: false,
            // Lazy Loading
            lazyLoading: false,
            lazyLoadingInPrevNext: false,
            lazyLoadingInPrevNextAmount: 1,
            lazyLoadingOnTransitionStart: false,
            // Images
            preloadImages: true,
            updateOnImagesReady: true,
            // loop
            loop: false,
            loopAdditionalSlides: 0,
            loopedSlides: null,
            // Control
            control: undefined,
            controlInverse: false,
            controlBy: 'slide', //or 'container'
            normalizeSlideIndex: true,
            // Swiping/no swiping
            allowSwipeToPrev: true,
            allowSwipeToNext: true,
            swipeHandler: null, //'.swipe-handler',
            noSwiping: true,
            noSwipingClass: 'swiper-no-swiping',
            // Passive Listeners
            passiveListeners: true,
            // NS
            containerModifierClass: 'swiper-container-', // NEW
            slideClass: 'swiper-slide',
            slideActiveClass: 'swiper-slide-active',
            slideDuplicateActiveClass: 'swiper-slide-duplicate-active',
            slideVisibleClass: 'swiper-slide-visible',
            slideDuplicateClass: 'swiper-slide-duplicate',
            slideNextClass: 'swiper-slide-next',
            slideDuplicateNextClass: 'swiper-slide-duplicate-next',
            slidePrevClass: 'swiper-slide-prev',
            slideDuplicatePrevClass: 'swiper-slide-duplicate-prev',
            wrapperClass: 'swiper-wrapper',
            bulletClass: 'swiper-pagination-bullet',
            bulletActiveClass: 'swiper-pagination-bullet-active',
            buttonDisabledClass: 'swiper-button-disabled',
            paginationCurrentClass: 'swiper-pagination-current',
            paginationTotalClass: 'swiper-pagination-total',
            paginationHiddenClass: 'swiper-pagination-hidden',
            paginationProgressbarClass: 'swiper-pagination-progressbar',
            paginationClickableClass: 'swiper-pagination-clickable', // NEW
            paginationModifierClass: 'swiper-pagination-', // NEW
            lazyLoadingClass: 'swiper-lazy',
            lazyStatusLoadingClass: 'swiper-lazy-loading',
            lazyStatusLoadedClass: 'swiper-lazy-loaded',
            lazyPreloaderClass: 'swiper-lazy-preloader',
            notificationClass: 'swiper-notification',
            preloaderClass: 'preloader',
            zoomContainerClass: 'swiper-zoom-container',
        
            // Observer
            observer: false,
            observeParents: false,
            // Accessibility
            a11y: false,
            prevSlideMessage: 'Previous slide',
            nextSlideMessage: 'Next slide',
            firstSlideMessage: 'This is the first slide',
            lastSlideMessage: 'This is the last slide',
            paginationBulletMessage: 'Go to slide {{index}}',
            // Callbacks
            runCallbacksOnInit: true
            /*
            Callbacks:
            onInit: function (swiper)
            onDestroy: function (swiper)
            onBeforeResize: function (swiper)
            onAfterResize: function (swiper)
            onClick: function (swiper, e)
            onTap: function (swiper, e)
            onDoubleTap: function (swiper, e)
            onSliderMove: function (swiper, e)
            onSlideChangeStart: function (swiper)
            onSlideChangeEnd: function (swiper)
            onTransitionStart: function (swiper)
            onTransitionEnd: function (swiper)
            onImagesReady: function (swiper)
            onProgress: function (swiper, progress)
            onTouchStart: function (swiper, e)
            onTouchMove: function (swiper, e)
            onTouchMoveOpposite: function (swiper, e)
            onTouchEnd: function (swiper, e)
            onReachBeginning: function (swiper)
            onReachEnd: function (swiper)
            onSetTransition: function (swiper, duration)
            onSetTranslate: function (swiper, translate)
            onAutoplayStart: function (swiper)
            onAutoplayStop: function (swiper),
            onLazyImageLoad: function (swiper, slide, image)
            onLazyImageReady: function (swiper, slide, image)
            onKeyPress: function (swiper, keyCode)
            */
        
        };
        var initialVirtualTranslate = params && params.virtualTranslate;
        
        params = params || {};
        var originalParams = {};
        for (var param in params) {
            if (typeof params[param] === 'object' && params[param] !== null && !(params[param].nodeType || params[param] === window || params[param] === document || (typeof Dom7 !== 'undefined' && params[param] instanceof Dom7) || (typeof jQuery !== 'undefined' && params[param] instanceof jQuery))) {
                originalParams[param] = {};
                for (var deepParam in params[param]) {
                    originalParams[param][deepParam] = params[param][deepParam];
                }
            }
            else {
                originalParams[param] = params[param];
            }
        }
        for (var def in defaults) {
            if (typeof params[def] === 'undefined') {
                params[def] = defaults[def];
            }
            else if (typeof params[def] === 'object') {
                for (var deepDef in defaults[def]) {
                    if (typeof params[def][deepDef] === 'undefined') {
                        params[def][deepDef] = defaults[def][deepDef];
                    }
                }
            }
        }
        
        // Swiper
        var s = this;
        
        // Params
        s.params = params;
        s.originalParams = originalParams;
        
        // Classname
        s.classNames = [];
        /*=========================
          Dom Library and plugins
          ===========================*/
        if (typeof $ !== 'undefined' && typeof Dom7 !== 'undefined'){
            $ = Dom7;
        }
        if (typeof $ === 'undefined') {
            if (typeof Dom7 === 'undefined') {
                $ = window.Dom7 || window.Zepto || window.jQuery;
            }
            else {
                $ = Dom7;
            }
            if (!$) return;
        }
        // Export it to Swiper instance
        s.$ = $;
        
        /*=========================
          Breakpoints
          ===========================*/
        s.currentBreakpoint = undefined;
        s.getActiveBreakpoint = function () {
            //Get breakpoint for window width
            if (!s.params.breakpoints) return false;
            var breakpoint = false;
            var points = [], point;
            for ( point in s.params.breakpoints ) {
                if (s.params.breakpoints.hasOwnProperty(point)) {
                    points.push(point);
                }
            }
            points.sort(function (a, b) {
                return parseInt(a, 10) > parseInt(b, 10);
            });
            for (var i = 0; i < points.length; i++) {
                point = points[i];
                if (point >= window.innerWidth && !breakpoint) {
                    breakpoint = point;
                }
            }
            return breakpoint || 'max';
        };
        s.setBreakpoint = function () {
            //Set breakpoint for window width and update parameters
            var breakpoint = s.getActiveBreakpoint();
            if (breakpoint && s.currentBreakpoint !== breakpoint) {
                var breakPointsParams = breakpoint in s.params.breakpoints ? s.params.breakpoints[breakpoint] : s.originalParams;
                var needsReLoop = s.params.loop && (breakPointsParams.slidesPerView !== s.params.slidesPerView);
                for ( var param in breakPointsParams ) {
                    s.params[param] = breakPointsParams[param];
                }
                s.currentBreakpoint = breakpoint;
                if(needsReLoop && s.destroyLoop) {
                    s.reLoop(true);
                }
            }
        };
        // Set breakpoint on load
        if (s.params.breakpoints) {
            s.setBreakpoint();
        }
        
        /*=========================
          Preparation - Define Container, Wrapper and Pagination
          ===========================*/
        s.container = $(container);
        if (s.container.length === 0) return;
        if (s.container.length > 1) {
            var swipers = [];
            s.container.each(function () {
                var container = this;
                swipers.push(new Swiper(this, params));
            });
            return swipers;
        }
        
        // Save instance in container HTML Element and in data
        s.container[0].swiper = s;
        s.container.data('swiper', s);
        
        s.classNames.push(s.params.containerModifierClass + s.params.direction);
        
        if (s.params.freeMode) {
            s.classNames.push(s.params.containerModifierClass + 'free-mode');
        }
        if (!s.support.flexbox) {
            s.classNames.push(s.params.containerModifierClass + 'no-flexbox');
            s.params.slidesPerColumn = 1;
        }
        if (s.params.autoHeight) {
            s.classNames.push(s.params.containerModifierClass + 'autoheight');
        }
        // Enable slides progress when required
        if (s.params.parallax || s.params.watchSlidesVisibility) {
            s.params.watchSlidesProgress = true;
        }
        // Max resistance when touchReleaseOnEdges
        if (s.params.touchReleaseOnEdges) {
            s.params.resistanceRatio = 0;
        }
        // Coverflow / 3D
        if (['cube', 'coverflow', 'flip'].indexOf(s.params.effect) >= 0) {
            if (s.support.transforms3d) {
                s.params.watchSlidesProgress = true;
                s.classNames.push(s.params.containerModifierClass + '3d');
            }
            else {
                s.params.effect = 'slide';
            }
        }
        if (s.params.effect !== 'slide') {
            s.classNames.push(s.params.containerModifierClass + s.params.effect);
        }
        if (s.params.effect === 'cube') {
            s.params.resistanceRatio = 0;
            s.params.slidesPerView = 1;
            s.params.slidesPerColumn = 1;
            s.params.slidesPerGroup = 1;
            s.params.centeredSlides = false;
            s.params.spaceBetween = 0;
            s.params.virtualTranslate = true;
        }
        if (s.params.effect === 'fade' || s.params.effect === 'flip') {
            s.params.slidesPerView = 1;
            s.params.slidesPerColumn = 1;
            s.params.slidesPerGroup = 1;
            s.params.watchSlidesProgress = true;
            s.params.spaceBetween = 0;
            if (typeof initialVirtualTranslate === 'undefined') {
                s.params.virtualTranslate = true;
            }
        }
        
        // Grab Cursor
        if (s.params.grabCursor && s.support.touch) {
            s.params.grabCursor = false;
        }
        
        // Wrapper
        s.wrapper = s.container.children('.' + s.params.wrapperClass);
        
        // Pagination
        if (s.params.pagination) {
            s.paginationContainer = $(s.params.pagination);
            if (s.params.uniqueNavElements && typeof s.params.pagination === 'string' && s.paginationContainer.length > 1 && s.container.find(s.params.pagination).length === 1) {
                s.paginationContainer = s.container.find(s.params.pagination);
            }
        
            if (s.params.paginationType === 'bullets' && s.params.paginationClickable) {
                s.paginationContainer.addClass(s.params.paginationModifierClass + 'clickable');
            }
            else {
                s.params.paginationClickable = false;
            }
            s.paginationContainer.addClass(s.params.paginationModifierClass + s.params.paginationType);
        }
        // Next/Prev Buttons
        if (s.params.nextButton || s.params.prevButton) {
            if (s.params.nextButton) {
                s.nextButton = $(s.params.nextButton);
                if (s.params.uniqueNavElements && typeof s.params.nextButton === 'string' && s.nextButton.length > 1 && s.container.find(s.params.nextButton).length === 1) {
                    s.nextButton = s.container.find(s.params.nextButton);
                }
            }
            if (s.params.prevButton) {
                s.prevButton = $(s.params.prevButton);
                if (s.params.uniqueNavElements && typeof s.params.prevButton === 'string' && s.prevButton.length > 1 && s.container.find(s.params.prevButton).length === 1) {
                    s.prevButton = s.container.find(s.params.prevButton);
                }
            }
        }
        
        // Is Horizontal
        s.isHorizontal = function () {
            return s.params.direction === 'horizontal';
        };
        // s.isH = isH;
        
        // RTL
        s.rtl = s.isHorizontal() && (s.container[0].dir.toLowerCase() === 'rtl' || s.container.css('direction') === 'rtl');
        if (s.rtl) {
            s.classNames.push(s.params.containerModifierClass + 'rtl');
        }
        
        // Wrong RTL support
        if (s.rtl) {
            s.wrongRTL = s.wrapper.css('display') === '-webkit-box';
        }
        
        // Columns
        if (s.params.slidesPerColumn > 1) {
            s.classNames.push(s.params.containerModifierClass + 'multirow');
        }
        
        // Check for Android
        if (s.device.android) {
            s.classNames.push(s.params.containerModifierClass + 'android');
        }
        
        // Add classes
        s.container.addClass(s.classNames.join(' '));
        
        // Translate
        s.translate = 0;
        
        // Progress
        s.progress = 0;
        
        // Velocity
        s.velocity = 0;
        
        /*=========================
          Locks, unlocks
          ===========================*/
        s.lockSwipeToNext = function () {
            s.params.allowSwipeToNext = false;
            if (s.params.allowSwipeToPrev === false && s.params.grabCursor) {
                s.unsetGrabCursor();
            }
        };
        s.lockSwipeToPrev = function () {
            s.params.allowSwipeToPrev = false;
            if (s.params.allowSwipeToNext === false && s.params.grabCursor) {
                s.unsetGrabCursor();
            }
        };
        s.lockSwipes = function () {
            s.params.allowSwipeToNext = s.params.allowSwipeToPrev = false;
            if (s.params.grabCursor) s.unsetGrabCursor();
        };
        s.unlockSwipeToNext = function () {
            s.params.allowSwipeToNext = true;
            if (s.params.allowSwipeToPrev === true && s.params.grabCursor) {
                s.setGrabCursor();
            }
        };
        s.unlockSwipeToPrev = function () {
            s.params.allowSwipeToPrev = true;
            if (s.params.allowSwipeToNext === true && s.params.grabCursor) {
                s.setGrabCursor();
            }
        };
        s.unlockSwipes = function () {
            s.params.allowSwipeToNext = s.params.allowSwipeToPrev = true;
            if (s.params.grabCursor) s.setGrabCursor();
        };
        
        /*=========================
          Round helper
          ===========================*/
        function round(a) {
            return Math.floor(a);
        }
        /*=========================
          Set grab cursor
          ===========================*/
        s.setGrabCursor = function(moving) {
            s.container[0].style.cursor = 'move';
            s.container[0].style.cursor = moving ? '-webkit-grabbing' : '-webkit-grab';
            s.container[0].style.cursor = moving ? '-moz-grabbin' : '-moz-grab';
            s.container[0].style.cursor = moving ? 'grabbing': 'grab';
        };
        s.unsetGrabCursor = function () {
            s.container[0].style.cursor = '';
        };
        if (s.params.grabCursor) {
            s.setGrabCursor();
        }
        /*=========================
          Update on Images Ready
          ===========================*/
        s.imagesToLoad = [];
        s.imagesLoaded = 0;
        
        s.loadImage = function (imgElement, src, srcset, sizes, checkForComplete, callback) {
            var image;
            function onReady () {
                if (callback) callback();
            }
            if (!imgElement.complete || !checkForComplete) {
                if (src) {
                    image = new window.Image();
                    image.onload = onReady;
                    image.onerror = onReady;
                    if (sizes) {
                        image.sizes = sizes;
                    }
                    if (srcset) {
                        image.srcset = srcset;
                    }
                    if (src) {
                        image.src = src;
                    }
                } else {
                    onReady();
                }
        
            } else {//image already loaded...
                onReady();
            }
        };
        s.preloadImages = function () {
            s.imagesToLoad = s.container.find('img');
            function _onReady() {
                if (typeof s === 'undefined' || s === null || !s) return;
                if (s.imagesLoaded !== undefined) s.imagesLoaded++;
                if (s.imagesLoaded === s.imagesToLoad.length) {
                    if (s.params.updateOnImagesReady) s.update();
                    s.emit('onImagesReady', s);
                }
            }
            for (var i = 0; i < s.imagesToLoad.length; i++) {
                s.loadImage(s.imagesToLoad[i], (s.imagesToLoad[i].currentSrc || s.imagesToLoad[i].getAttribute('src')), (s.imagesToLoad[i].srcset || s.imagesToLoad[i].getAttribute('srcset')), s.imagesToLoad[i].sizes || s.imagesToLoad[i].getAttribute('sizes'), true, _onReady);
            }
        };
        
        /*=========================
          Autoplay
          ===========================*/
        s.autoplayTimeoutId = undefined;
        s.autoplaying = false;
        s.autoplayPaused = false;
        function autoplay() {
            var autoplayDelay = s.params.autoplay;
            var activeSlide = s.slides.eq(s.activeIndex);
            if (activeSlide.attr('data-swiper-autoplay')) {
                autoplayDelay = activeSlide.attr('data-swiper-autoplay') || s.params.autoplay;
            }
            s.autoplayTimeoutId = setTimeout(function () {
                if (s.params.loop) {
                    s.fixLoop();
                    s._slideNext();
                    s.emit('onAutoplay', s);
                }
                else {
                    if (!s.isEnd) {
                        s._slideNext();
                        s.emit('onAutoplay', s);
                    }
                    else {
                        if (!params.autoplayStopOnLast) {
                            s._slideTo(0);
                            s.emit('onAutoplay', s);
                        }
                        else {
                            s.stopAutoplay();
                        }
                    }
                }
            }, autoplayDelay);
        }
        s.startAutoplay = function () {
            if (typeof s.autoplayTimeoutId !== 'undefined') return false;
            if (!s.params.autoplay) return false;
            if (s.autoplaying) return false;
            s.autoplaying = true;
            s.emit('onAutoplayStart', s);
            autoplay();
        };
        s.stopAutoplay = function (internal) {
            if (!s.autoplayTimeoutId) return;
            if (s.autoplayTimeoutId) clearTimeout(s.autoplayTimeoutId);
            s.autoplaying = false;
            s.autoplayTimeoutId = undefined;
            s.emit('onAutoplayStop', s);
        };
        s.pauseAutoplay = function (speed) {
            if (s.autoplayPaused) return;
            if (s.autoplayTimeoutId) clearTimeout(s.autoplayTimeoutId);
            s.autoplayPaused = true;
            if (speed === 0) {
                s.autoplayPaused = false;
                autoplay();
            }
            else {
                s.wrapper.transitionEnd(function () {
                    if (!s) return;
                    s.autoplayPaused = false;
                    if (!s.autoplaying) {
                        s.stopAutoplay();
                    }
                    else {
                        autoplay();
                    }
                });
            }
        };
        /*=========================
          Min/Max Translate
          ===========================*/
        s.minTranslate = function () {
            return (-s.snapGrid[0]);
        };
        s.maxTranslate = function () {
            return (-s.snapGrid[s.snapGrid.length - 1]);
        };
        /*=========================
          Slider/slides sizes
          ===========================*/
        s.updateAutoHeight = function () {
            var activeSlides = [];
            var newHeight = 0;
            var i;
        
            // Find slides currently in view
            if(s.params.slidesPerView !== 'auto' && s.params.slidesPerView > 1) {
                for (i = 0; i < Math.ceil(s.params.slidesPerView); i++) {
                    var index = s.activeIndex + i;
                    if(index > s.slides.length) break;
                    activeSlides.push(s.slides.eq(index)[0]);
                }
            } else {
                activeSlides.push(s.slides.eq(s.activeIndex)[0]);
            }
        
            // Find new height from heighest slide in view
            for (i = 0; i < activeSlides.length; i++) {
                if (typeof activeSlides[i] !== 'undefined') {
                    var height = activeSlides[i].offsetHeight;
                    newHeight = height > newHeight ? height : newHeight;
                }
            }
        
            // Update Height
            if (newHeight) s.wrapper.css('height', newHeight + 'px');
        };
        s.updateContainerSize = function () {
            var width, height;
            if (typeof s.params.width !== 'undefined') {
                width = s.params.width;
            }
            else {
                width = s.container[0].clientWidth;
            }
            if (typeof s.params.height !== 'undefined') {
                height = s.params.height;
            }
            else {
                height = s.container[0].clientHeight;
            }
            if (width === 0 && s.isHorizontal() || height === 0 && !s.isHorizontal()) {
                return;
            }
        
            //Subtract paddings
            width = width - parseInt(s.container.css('padding-left'), 10) - parseInt(s.container.css('padding-right'), 10);
            height = height - parseInt(s.container.css('padding-top'), 10) - parseInt(s.container.css('padding-bottom'), 10);
        
            // Store values
            s.width = width;
            s.height = height;
            s.size = s.isHorizontal() ? s.width : s.height;
        };
        
        s.updateSlidesSize = function () {
            s.slides = s.wrapper.children('.' + s.params.slideClass);
            s.snapGrid = [];
            s.slidesGrid = [];
            s.slidesSizesGrid = [];
        
            var spaceBetween = s.params.spaceBetween,
                slidePosition = -s.params.slidesOffsetBefore,
                i,
                prevSlideSize = 0,
                index = 0;
            if (typeof s.size === 'undefined') return;
            if (typeof spaceBetween === 'string' && spaceBetween.indexOf('%') >= 0) {
                spaceBetween = parseFloat(spaceBetween.replace('%', '')) / 100 * s.size;
            }
        
            s.virtualSize = -spaceBetween;
            // reset margins
            if (s.rtl) s.slides.css({marginLeft: '', marginTop: ''});
            else s.slides.css({marginRight: '', marginBottom: ''});
        
            var slidesNumberEvenToRows;
            if (s.params.slidesPerColumn > 1) {
                if (Math.floor(s.slides.length / s.params.slidesPerColumn) === s.slides.length / s.params.slidesPerColumn) {
                    slidesNumberEvenToRows = s.slides.length;
                }
                else {
                    slidesNumberEvenToRows = Math.ceil(s.slides.length / s.params.slidesPerColumn) * s.params.slidesPerColumn;
                }
                if (s.params.slidesPerView !== 'auto' && s.params.slidesPerColumnFill === 'row') {
                    slidesNumberEvenToRows = Math.max(slidesNumberEvenToRows, s.params.slidesPerView * s.params.slidesPerColumn);
                }
            }
        
            // Calc slides
            var slideSize;
            var slidesPerColumn = s.params.slidesPerColumn;
            var slidesPerRow = slidesNumberEvenToRows / slidesPerColumn;
            var numFullColumns = slidesPerRow - (s.params.slidesPerColumn * slidesPerRow - s.slides.length);
            for (i = 0; i < s.slides.length; i++) {
                slideSize = 0;
                var slide = s.slides.eq(i);
                if (s.params.slidesPerColumn > 1) {
                    // Set slides order
                    var newSlideOrderIndex;
                    var column, row;
                    if (s.params.slidesPerColumnFill === 'column') {
                        column = Math.floor(i / slidesPerColumn);
                        row = i - column * slidesPerColumn;
                        if (column > numFullColumns || (column === numFullColumns && row === slidesPerColumn-1)) {
                            if (++row >= slidesPerColumn) {
                                row = 0;
                                column++;
                            }
                        }
                        newSlideOrderIndex = column + row * slidesNumberEvenToRows / slidesPerColumn;
                        slide
                            .css({
                                '-webkit-box-ordinal-group': newSlideOrderIndex,
                                '-moz-box-ordinal-group': newSlideOrderIndex,
                                '-ms-flex-order': newSlideOrderIndex,
                                '-webkit-order': newSlideOrderIndex,
                                'order': newSlideOrderIndex
                            });
                    }
                    else {
                        row = Math.floor(i / slidesPerRow);
                        column = i - row * slidesPerRow;
                    }
                    slide
                        .css(
                            'margin-' + (s.isHorizontal() ? 'top' : 'left'),
                            (row !== 0 && s.params.spaceBetween) && (s.params.spaceBetween + 'px')
                        )
                        .attr('data-swiper-column', column)
                        .attr('data-swiper-row', row);
        
                }
                if (slide.css('display') === 'none') continue;
                if (s.params.slidesPerView === 'auto') {
                    slideSize = s.isHorizontal() ? slide.outerWidth(true) : slide.outerHeight(true);
                    if (s.params.roundLengths) slideSize = round(slideSize);
                }
                else {
                    slideSize = (s.size - (s.params.slidesPerView - 1) * spaceBetween) / s.params.slidesPerView;
                    if (s.params.roundLengths) slideSize = round(slideSize);
        
                    if (s.isHorizontal()) {
                        s.slides[i].style.width = slideSize + 'px';
                    }
                    else {
                        s.slides[i].style.height = slideSize + 'px';
                    }
                }
                s.slides[i].swiperSlideSize = slideSize;
                s.slidesSizesGrid.push(slideSize);
        
        
                if (s.params.centeredSlides) {
                    slidePosition = slidePosition + slideSize / 2 + prevSlideSize / 2 + spaceBetween;
                    if(prevSlideSize === 0 && i !== 0) slidePosition = slidePosition - s.size / 2 - spaceBetween;
                    if (i === 0) slidePosition = slidePosition - s.size / 2 - spaceBetween;
                    if (Math.abs(slidePosition) < 1 / 1000) slidePosition = 0;
                    if ((index) % s.params.slidesPerGroup === 0) s.snapGrid.push(slidePosition);
                    s.slidesGrid.push(slidePosition);
                }
                else {
                    if ((index) % s.params.slidesPerGroup === 0) s.snapGrid.push(slidePosition);
                    s.slidesGrid.push(slidePosition);
                    slidePosition = slidePosition + slideSize + spaceBetween;
                }
        
                s.virtualSize += slideSize + spaceBetween;
        
                prevSlideSize = slideSize;
        
                index ++;
            }
            s.virtualSize = Math.max(s.virtualSize, s.size) + s.params.slidesOffsetAfter;
            var newSlidesGrid;
        
            if (
                s.rtl && s.wrongRTL && (s.params.effect === 'slide' || s.params.effect === 'coverflow')) {
                s.wrapper.css({width: s.virtualSize + s.params.spaceBetween + 'px'});
            }
            if (!s.support.flexbox || s.params.setWrapperSize) {
                if (s.isHorizontal()) s.wrapper.css({width: s.virtualSize + s.params.spaceBetween + 'px'});
                else s.wrapper.css({height: s.virtualSize + s.params.spaceBetween + 'px'});
            }
        
            if (s.params.slidesPerColumn > 1) {
                s.virtualSize = (slideSize + s.params.spaceBetween) * slidesNumberEvenToRows;
                s.virtualSize = Math.ceil(s.virtualSize / s.params.slidesPerColumn) - s.params.spaceBetween;
                if (s.isHorizontal()) s.wrapper.css({width: s.virtualSize + s.params.spaceBetween + 'px'});
                else s.wrapper.css({height: s.virtualSize + s.params.spaceBetween + 'px'});
                if (s.params.centeredSlides) {
                    newSlidesGrid = [];
                    for (i = 0; i < s.snapGrid.length; i++) {
                        if (s.snapGrid[i] < s.virtualSize + s.snapGrid[0]) newSlidesGrid.push(s.snapGrid[i]);
                    }
                    s.snapGrid = newSlidesGrid;
                }
            }
        
            // Remove last grid elements depending on width
            if (!s.params.centeredSlides) {
                newSlidesGrid = [];
                for (i = 0; i < s.snapGrid.length; i++) {
                    if (s.snapGrid[i] <= s.virtualSize - s.size) {
                        newSlidesGrid.push(s.snapGrid[i]);
                    }
                }
                s.snapGrid = newSlidesGrid;
                if (Math.floor(s.virtualSize - s.size) - Math.floor(s.snapGrid[s.snapGrid.length - 1]) > 1) {
                    s.snapGrid.push(s.virtualSize - s.size);
                }
            }
            if (s.snapGrid.length === 0) s.snapGrid = [0];
        
            if (s.params.spaceBetween !== 0) {
                if (s.isHorizontal()) {
                    if (s.rtl) s.slides.css({marginLeft: spaceBetween + 'px'});
                    else s.slides.css({marginRight: spaceBetween + 'px'});
                }
                else s.slides.css({marginBottom: spaceBetween + 'px'});
            }
            if (s.params.watchSlidesProgress) {
                s.updateSlidesOffset();
            }
        };
        s.updateSlidesOffset = function () {
            for (var i = 0; i < s.slides.length; i++) {
                s.slides[i].swiperSlideOffset = s.isHorizontal() ? s.slides[i].offsetLeft : s.slides[i].offsetTop;
            }
        };
        
        /*=========================
          Dynamic Slides Per View
          ===========================*/
        s.currentSlidesPerView = function () {
            var spv = 1, i, j;
            if (s.params.centeredSlides) {
                var size = s.slides[s.activeIndex].swiperSlideSize;
                var breakLoop;
                for (i = s.activeIndex + 1; i < s.slides.length; i++) {
                    if (s.slides[i] && !breakLoop) {
                        size += s.slides[i].swiperSlideSize;
                        spv ++;
                        if (size > s.size) breakLoop = true;
                    }
                }
                for (j = s.activeIndex - 1; j >= 0; j--) {
                    if (s.slides[j] && !breakLoop) {
                        size += s.slides[j].swiperSlideSize;
                        spv ++;
                        if (size > s.size) breakLoop = true;
                    }
                }
            }
            else {
                for (i = s.activeIndex + 1; i < s.slides.length; i++) {
                    if (s.slidesGrid[i] - s.slidesGrid[s.activeIndex] < s.size) {
                        spv++;
                    }
                }
            }
            return spv;
        };
        /*=========================
          Slider/slides progress
          ===========================*/
        s.updateSlidesProgress = function (translate) {
            if (typeof translate === 'undefined') {
                translate = s.translate || 0;
            }
            if (s.slides.length === 0) return;
            if (typeof s.slides[0].swiperSlideOffset === 'undefined') s.updateSlidesOffset();
        
            var offsetCenter = -translate;
            if (s.rtl) offsetCenter = translate;
        
            // Visible Slides
            s.slides.removeClass(s.params.slideVisibleClass);
            for (var i = 0; i < s.slides.length; i++) {
                var slide = s.slides[i];
                var slideProgress = (offsetCenter + (s.params.centeredSlides ? s.minTranslate() : 0) - slide.swiperSlideOffset) / (slide.swiperSlideSize + s.params.spaceBetween);
                if (s.params.watchSlidesVisibility) {
                    var slideBefore = -(offsetCenter - slide.swiperSlideOffset);
                    var slideAfter = slideBefore + s.slidesSizesGrid[i];
                    var isVisible =
                        (slideBefore >= 0 && slideBefore < s.size) ||
                        (slideAfter > 0 && slideAfter <= s.size) ||
                        (slideBefore <= 0 && slideAfter >= s.size);
                    if (isVisible) {
                        s.slides.eq(i).addClass(s.params.slideVisibleClass);
                    }
                }
                slide.progress = s.rtl ? -slideProgress : slideProgress;
            }
        };
        s.updateProgress = function (translate) {
            if (typeof translate === 'undefined') {
                translate = s.translate || 0;
            }
            var translatesDiff = s.maxTranslate() - s.minTranslate();
            var wasBeginning = s.isBeginning;
            var wasEnd = s.isEnd;
            if (translatesDiff === 0) {
                s.progress = 0;
                s.isBeginning = s.isEnd = true;
            }
            else {
                s.progress = (translate - s.minTranslate()) / (translatesDiff);
                s.isBeginning = s.progress <= 0;
                s.isEnd = s.progress >= 1;
            }
            if (s.isBeginning && !wasBeginning) s.emit('onReachBeginning', s);
            if (s.isEnd && !wasEnd) s.emit('onReachEnd', s);
        
            if (s.params.watchSlidesProgress) s.updateSlidesProgress(translate);
            s.emit('onProgress', s, s.progress);
        };
        s.updateActiveIndex = function () {
            var translate = s.rtl ? s.translate : -s.translate;
            var newActiveIndex, i, snapIndex;
            for (i = 0; i < s.slidesGrid.length; i ++) {
                if (typeof s.slidesGrid[i + 1] !== 'undefined') {
                    if (translate >= s.slidesGrid[i] && translate < s.slidesGrid[i + 1] - (s.slidesGrid[i + 1] - s.slidesGrid[i]) / 2) {
                        newActiveIndex = i;
                    }
                    else if (translate >= s.slidesGrid[i] && translate < s.slidesGrid[i + 1]) {
                        newActiveIndex = i + 1;
                    }
                }
                else {
                    if (translate >= s.slidesGrid[i]) {
                        newActiveIndex = i;
                    }
                }
            }
            // Normalize slideIndex
            if(s.params.normalizeSlideIndex){
                if (newActiveIndex < 0 || typeof newActiveIndex === 'undefined') newActiveIndex = 0;
            }
            // for (i = 0; i < s.slidesGrid.length; i++) {
                // if (- translate >= s.slidesGrid[i]) {
                    // newActiveIndex = i;
                // }
            // }
            snapIndex = Math.floor(newActiveIndex / s.params.slidesPerGroup);
            if (snapIndex >= s.snapGrid.length) snapIndex = s.snapGrid.length - 1;
        
            if (newActiveIndex === s.activeIndex) {
                return;
            }
            s.snapIndex = snapIndex;
            s.previousIndex = s.activeIndex;
            s.activeIndex = newActiveIndex;
            s.updateClasses();
            s.updateRealIndex();
        };
        s.updateRealIndex = function(){
            s.realIndex = parseInt(s.slides.eq(s.activeIndex).attr('data-swiper-slide-index') || s.activeIndex, 10);
        };
        
        /*=========================
          Classes
          ===========================*/
        s.updateClasses = function () {
            s.slides.removeClass(s.params.slideActiveClass + ' ' + s.params.slideNextClass + ' ' + s.params.slidePrevClass + ' ' + s.params.slideDuplicateActiveClass + ' ' + s.params.slideDuplicateNextClass + ' ' + s.params.slideDuplicatePrevClass);
            var activeSlide = s.slides.eq(s.activeIndex);
            // Active classes
            activeSlide.addClass(s.params.slideActiveClass);
            if (params.loop) {
                // Duplicate to all looped slides
                if (activeSlide.hasClass(s.params.slideDuplicateClass)) {
                    s.wrapper.children('.' + s.params.slideClass + ':not(.' + s.params.slideDuplicateClass + ')[data-swiper-slide-index="' + s.realIndex + '"]').addClass(s.params.slideDuplicateActiveClass);
                }
                else {
                    s.wrapper.children('.' + s.params.slideClass + '.' + s.params.slideDuplicateClass + '[data-swiper-slide-index="' + s.realIndex + '"]').addClass(s.params.slideDuplicateActiveClass);
                }
            }
            // Next Slide
            var nextSlide = activeSlide.next('.' + s.params.slideClass).addClass(s.params.slideNextClass);
            if (s.params.loop && nextSlide.length === 0) {
                nextSlide = s.slides.eq(0);
                nextSlide.addClass(s.params.slideNextClass);
            }
            // Prev Slide
            var prevSlide = activeSlide.prev('.' + s.params.slideClass).addClass(s.params.slidePrevClass);
            if (s.params.loop && prevSlide.length === 0) {
                prevSlide = s.slides.eq(-1);
                prevSlide.addClass(s.params.slidePrevClass);
            }
            if (params.loop) {
                // Duplicate to all looped slides
                if (nextSlide.hasClass(s.params.slideDuplicateClass)) {
                    s.wrapper.children('.' + s.params.slideClass + ':not(.' + s.params.slideDuplicateClass + ')[data-swiper-slide-index="' + nextSlide.attr('data-swiper-slide-index') + '"]').addClass(s.params.slideDuplicateNextClass);
                }
                else {
                    s.wrapper.children('.' + s.params.slideClass + '.' + s.params.slideDuplicateClass + '[data-swiper-slide-index="' + nextSlide.attr('data-swiper-slide-index') + '"]').addClass(s.params.slideDuplicateNextClass);
                }
                if (prevSlide.hasClass(s.params.slideDuplicateClass)) {
                    s.wrapper.children('.' + s.params.slideClass + ':not(.' + s.params.slideDuplicateClass + ')[data-swiper-slide-index="' + prevSlide.attr('data-swiper-slide-index') + '"]').addClass(s.params.slideDuplicatePrevClass);
                }
                else {
                    s.wrapper.children('.' + s.params.slideClass + '.' + s.params.slideDuplicateClass + '[data-swiper-slide-index="' + prevSlide.attr('data-swiper-slide-index') + '"]').addClass(s.params.slideDuplicatePrevClass);
                }
            }
        
            // Pagination
            if (s.paginationContainer && s.paginationContainer.length > 0) {
                // Current/Total
                var current,
                    total = s.params.loop ? Math.ceil((s.slides.length - s.loopedSlides * 2) / s.params.slidesPerGroup) : s.snapGrid.length;
                if (s.params.loop) {
                    current = Math.ceil((s.activeIndex - s.loopedSlides)/s.params.slidesPerGroup);
                    if (current > s.slides.length - 1 - s.loopedSlides * 2) {
                        current = current - (s.slides.length - s.loopedSlides * 2);
                    }
                    if (current > total - 1) current = current - total;
                    if (current < 0 && s.params.paginationType !== 'bullets') current = total + current;
                }
                else {
                    if (typeof s.snapIndex !== 'undefined') {
                        current = s.snapIndex;
                    }
                    else {
                        current = s.activeIndex || 0;
                    }
                }
                // Types
                if (s.params.paginationType === 'bullets' && s.bullets && s.bullets.length > 0) {
                    s.bullets.removeClass(s.params.bulletActiveClass);
                    if (s.paginationContainer.length > 1) {
                        s.bullets.each(function () {
                            if ($(this).index() === current) $(this).addClass(s.params.bulletActiveClass);
                        });
                    }
                    else {
                        s.bullets.eq(current).addClass(s.params.bulletActiveClass);
                    }
                }
                if (s.params.paginationType === 'fraction') {
                    s.paginationContainer.find('.' + s.params.paginationCurrentClass).text(current + 1);
                    s.paginationContainer.find('.' + s.params.paginationTotalClass).text(total);
                }
                if (s.params.paginationType === 'progress') {
                    var scale = (current + 1) / total,
                        scaleX = scale,
                        scaleY = 1;
                    if (!s.isHorizontal()) {
                        scaleY = scale;
                        scaleX = 1;
                    }
                    s.paginationContainer.find('.' + s.params.paginationProgressbarClass).transform('translate3d(0,0,0) scaleX(' + scaleX + ') scaleY(' + scaleY + ')').transition(s.params.speed);
                }
                if (s.params.paginationType === 'custom' && s.params.paginationCustomRender) {
                    s.paginationContainer.html(s.params.paginationCustomRender(s, current + 1, total));
                    s.emit('onPaginationRendered', s, s.paginationContainer[0]);
                }
            }
        
            // Next/active buttons
            if (!s.params.loop) {
                if (s.params.prevButton && s.prevButton && s.prevButton.length > 0) {
                    if (s.isBeginning) {
                        s.prevButton.addClass(s.params.buttonDisabledClass);
                        if (s.params.a11y && s.a11y) s.a11y.disable(s.prevButton);
                    }
                    else {
                        s.prevButton.removeClass(s.params.buttonDisabledClass);
                        if (s.params.a11y && s.a11y) s.a11y.enable(s.prevButton);
                    }
                }
                if (s.params.nextButton && s.nextButton && s.nextButton.length > 0) {
                    if (s.isEnd) {
                        s.nextButton.addClass(s.params.buttonDisabledClass);
                        if (s.params.a11y && s.a11y) s.a11y.disable(s.nextButton);
                    }
                    else {
                        s.nextButton.removeClass(s.params.buttonDisabledClass);
                        if (s.params.a11y && s.a11y) s.a11y.enable(s.nextButton);
                    }
                }
            }
        };
        
        /*=========================
          Pagination
          ===========================*/
        s.updatePagination = function () {
            if (!s.params.pagination) return;
            if (s.paginationContainer && s.paginationContainer.length > 0) {
                var paginationHTML = '';
                if (s.params.paginationType === 'bullets') {
                    var numberOfBullets = s.params.loop ? Math.ceil((s.slides.length - s.loopedSlides * 2) / s.params.slidesPerGroup) : s.snapGrid.length;
                    for (var i = 0; i < numberOfBullets; i++) {
                        if (s.params.paginationBulletRender) {
                            paginationHTML += s.params.paginationBulletRender(s, i, s.params.bulletClass);
                        }
                        else {
                            paginationHTML += '<' + s.params.paginationElement+' class="' + s.params.bulletClass + '"></' + s.params.paginationElement + '>';
                        }
                    }
                    s.paginationContainer.html(paginationHTML);
                    s.bullets = s.paginationContainer.find('.' + s.params.bulletClass);
                    if (s.params.paginationClickable && s.params.a11y && s.a11y) {
                        s.a11y.initPagination();
                    }
                }
                if (s.params.paginationType === 'fraction') {
                    if (s.params.paginationFractionRender) {
                        paginationHTML = s.params.paginationFractionRender(s, s.params.paginationCurrentClass, s.params.paginationTotalClass);
                    }
                    else {
                        paginationHTML =
                            '<span class="' + s.params.paginationCurrentClass + '"></span>' +
                            ' / ' +
                            '<span class="' + s.params.paginationTotalClass+'"></span>';
                    }
                    s.paginationContainer.html(paginationHTML);
                }
                if (s.params.paginationType === 'progress') {
                    if (s.params.paginationProgressRender) {
                        paginationHTML = s.params.paginationProgressRender(s, s.params.paginationProgressbarClass);
                    }
                    else {
                        paginationHTML = '<span class="' + s.params.paginationProgressbarClass + '"></span>';
                    }
                    s.paginationContainer.html(paginationHTML);
                }
                if (s.params.paginationType !== 'custom') {
                    s.emit('onPaginationRendered', s, s.paginationContainer[0]);
                }
            }
        };
        /*=========================
          Common update method
          ===========================*/
        s.update = function (updateTranslate) {
            if (!s) return;
            s.updateContainerSize();
            s.updateSlidesSize();
            s.updateProgress();
            s.updatePagination();
            s.updateClasses();
            if (s.params.scrollbar && s.scrollbar) {
                s.scrollbar.set();
            }
            var newTranslate;
            function forceSetTranslate() {
                var translate = s.rtl ? -s.translate : s.translate;
                newTranslate = Math.min(Math.max(s.translate, s.maxTranslate()), s.minTranslate());
                s.setWrapperTranslate(newTranslate);
                s.updateActiveIndex();
                s.updateClasses();
            }
            if (updateTranslate) {
                var translated;
                if (s.controller && s.controller.spline) {
                    s.controller.spline = undefined;
                }
                if (s.params.freeMode) {
                    forceSetTranslate();
                    if (s.params.autoHeight) {
                        s.updateAutoHeight();
                    }
                }
                else {
                    if ((s.params.slidesPerView === 'auto' || s.params.slidesPerView > 1) && s.isEnd && !s.params.centeredSlides) {
                        translated = s.slideTo(s.slides.length - 1, 0, false, true);
                    }
                    else {
                        translated = s.slideTo(s.activeIndex, 0, false, true);
                    }
                    if (!translated) {
                        forceSetTranslate();
                    }
                }
            }
            else if (s.params.autoHeight) {
                s.updateAutoHeight();
            }
        };
        
        /*=========================
          Resize Handler
          ===========================*/
        s.onResize = function (forceUpdatePagination) {
            if (s.params.onBeforeResize) s.params.onBeforeResize(s);
            //Breakpoints
            if (s.params.breakpoints) {
                s.setBreakpoint();
            }
        
            // Disable locks on resize
            var allowSwipeToPrev = s.params.allowSwipeToPrev;
            var allowSwipeToNext = s.params.allowSwipeToNext;
            s.params.allowSwipeToPrev = s.params.allowSwipeToNext = true;
        
            s.updateContainerSize();
            s.updateSlidesSize();
            if (s.params.slidesPerView === 'auto' || s.params.freeMode || forceUpdatePagination) s.updatePagination();
            if (s.params.scrollbar && s.scrollbar) {
                s.scrollbar.set();
            }
            if (s.controller && s.controller.spline) {
                s.controller.spline = undefined;
            }
            var slideChangedBySlideTo = false;
            if (s.params.freeMode) {
                var newTranslate = Math.min(Math.max(s.translate, s.maxTranslate()), s.minTranslate());
                s.setWrapperTranslate(newTranslate);
                s.updateActiveIndex();
                s.updateClasses();
        
                if (s.params.autoHeight) {
                    s.updateAutoHeight();
                }
            }
            else {
                s.updateClasses();
                if ((s.params.slidesPerView === 'auto' || s.params.slidesPerView > 1) && s.isEnd && !s.params.centeredSlides) {
                    slideChangedBySlideTo = s.slideTo(s.slides.length - 1, 0, false, true);
                }
                else {
                    slideChangedBySlideTo = s.slideTo(s.activeIndex, 0, false, true);
                }
            }
            if (s.params.lazyLoading && !slideChangedBySlideTo && s.lazy) {
                s.lazy.load();
            }
            // Return locks after resize
            s.params.allowSwipeToPrev = allowSwipeToPrev;
            s.params.allowSwipeToNext = allowSwipeToNext;
            if (s.params.onAfterResize) s.params.onAfterResize(s);
        };
        
        /*=========================
          Events
          ===========================*/
        
        //Define Touch Events
        s.touchEventsDesktop = {start: 'mousedown', move: 'mousemove', end: 'mouseup'};
        if (window.navigator.pointerEnabled) s.touchEventsDesktop = {start: 'pointerdown', move: 'pointermove', end: 'pointerup'};
        else if (window.navigator.msPointerEnabled) s.touchEventsDesktop = {start: 'MSPointerDown', move: 'MSPointerMove', end: 'MSPointerUp'};
        s.touchEvents = {
            start : s.support.touch || !s.params.simulateTouch  ? 'touchstart' : s.touchEventsDesktop.start,
            move : s.support.touch || !s.params.simulateTouch ? 'touchmove' : s.touchEventsDesktop.move,
            end : s.support.touch || !s.params.simulateTouch ? 'touchend' : s.touchEventsDesktop.end
        };
        
        
        // WP8 Touch Events Fix
        if (window.navigator.pointerEnabled || window.navigator.msPointerEnabled) {
            (s.params.touchEventsTarget === 'container' ? s.container : s.wrapper).addClass('swiper-wp8-' + s.params.direction);
        }
        
        // Attach/detach events
        s.initEvents = function (detach) {
            var actionDom = detach ? 'off' : 'on';
            var action = detach ? 'removeEventListener' : 'addEventListener';
            var touchEventsTarget = s.params.touchEventsTarget === 'container' ? s.container[0] : s.wrapper[0];
            var target = s.support.touch ? touchEventsTarget : document;
        
            var moveCapture = s.params.nested ? true : false;
        
            //Touch Events
            if (s.browser.ie) {
                touchEventsTarget[action](s.touchEvents.start, s.onTouchStart, false);
                target[action](s.touchEvents.move, s.onTouchMove, moveCapture);
                target[action](s.touchEvents.end, s.onTouchEnd, false);
            }
            else {
                if (s.support.touch) {
                    var passiveListener = s.touchEvents.start === 'touchstart' && s.support.passiveListener && s.params.passiveListeners ? {passive: true, capture: false} : false;
                    touchEventsTarget[action](s.touchEvents.start, s.onTouchStart, passiveListener);
                    touchEventsTarget[action](s.touchEvents.move, s.onTouchMove, moveCapture);
                    touchEventsTarget[action](s.touchEvents.end, s.onTouchEnd, passiveListener);
                }
                if ((params.simulateTouch && !s.device.ios && !s.device.android) || (params.simulateTouch && !s.support.touch && s.device.ios)) {
                    touchEventsTarget[action]('mousedown', s.onTouchStart, false);
                    document[action]('mousemove', s.onTouchMove, moveCapture);
                    document[action]('mouseup', s.onTouchEnd, false);
                }
            }
            window[action]('resize', s.onResize);
        
            // Next, Prev, Index
            if (s.params.nextButton && s.nextButton && s.nextButton.length > 0) {
                s.nextButton[actionDom]('click', s.onClickNext);
                if (s.params.a11y && s.a11y) s.nextButton[actionDom]('keydown', s.a11y.onEnterKey);
            }
            if (s.params.prevButton && s.prevButton && s.prevButton.length > 0) {
                s.prevButton[actionDom]('click', s.onClickPrev);
                if (s.params.a11y && s.a11y) s.prevButton[actionDom]('keydown', s.a11y.onEnterKey);
            }
            if (s.params.pagination && s.params.paginationClickable) {
                s.paginationContainer[actionDom]('click', '.' + s.params.bulletClass, s.onClickIndex);
                if (s.params.a11y && s.a11y) s.paginationContainer[actionDom]('keydown', '.' + s.params.bulletClass, s.a11y.onEnterKey);
            }
        
            // Prevent Links Clicks
            if (s.params.preventClicks || s.params.preventClicksPropagation) touchEventsTarget[action]('click', s.preventClicks, true);
        };
        s.attachEvents = function () {
            s.initEvents();
        };
        s.detachEvents = function () {
            s.initEvents(true);
        };
        
        /*=========================
          Handle Clicks
          ===========================*/
        // Prevent Clicks
        s.allowClick = true;
        s.preventClicks = function (e) {
            if (!s.allowClick) {
                if (s.params.preventClicks) e.preventDefault();
                if (s.params.preventClicksPropagation && s.animating) {
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                }
            }
        };
        // Clicks
        s.onClickNext = function (e) {
            e.preventDefault();
            if (s.isEnd && !s.params.loop) return;
            s.slideNext();
        };
        s.onClickPrev = function (e) {
            e.preventDefault();
            if (s.isBeginning && !s.params.loop) return;
            s.slidePrev();
        };
        s.onClickIndex = function (e) {
            e.preventDefault();
            var index = $(this).index() * s.params.slidesPerGroup;
            if (s.params.loop) index = index + s.loopedSlides;
            s.slideTo(index);
        };
        
        /*=========================
          Handle Touches
          ===========================*/
        function findElementInEvent(e, selector) {
            var el = $(e.target);
            if (!el.is(selector)) {
                if (typeof selector === 'string') {
                    el = el.parents(selector);
                }
                else if (selector.nodeType) {
                    var found;
                    el.parents().each(function (index, _el) {
                        if (_el === selector) found = selector;
                    });
                    if (!found) return undefined;
                    else return selector;
                }
            }
            if (el.length === 0) {
                return undefined;
            }
            return el[0];
        }
        s.updateClickedSlide = function (e) {
            var slide = findElementInEvent(e, '.' + s.params.slideClass);
            var slideFound = false;
            if (slide) {
                for (var i = 0; i < s.slides.length; i++) {
                    if (s.slides[i] === slide) slideFound = true;
                }
            }
        
            if (slide && slideFound) {
                s.clickedSlide = slide;
                s.clickedIndex = $(slide).index();
            }
            else {
                s.clickedSlide = undefined;
                s.clickedIndex = undefined;
                return;
            }
            if (s.params.slideToClickedSlide && s.clickedIndex !== undefined && s.clickedIndex !== s.activeIndex) {
                var slideToIndex = s.clickedIndex,
                    realIndex,
                    duplicatedSlides,
                    slidesPerView = s.params.slidesPerView === 'auto' ? s.currentSlidesPerView() : s.params.slidesPerView;
                if (s.params.loop) {
                    if (s.animating) return;
                    realIndex = parseInt($(s.clickedSlide).attr('data-swiper-slide-index'), 10);
                    if (s.params.centeredSlides) {
                        if ((slideToIndex < s.loopedSlides - slidesPerView/2) || (slideToIndex > s.slides.length - s.loopedSlides + slidesPerView/2)) {
                            s.fixLoop();
                            slideToIndex = s.wrapper.children('.' + s.params.slideClass + '[data-swiper-slide-index="' + realIndex + '"]:not(.' + s.params.slideDuplicateClass + ')').eq(0).index();
                            setTimeout(function () {
                                s.slideTo(slideToIndex);
                            }, 0);
                        }
                        else {
                            s.slideTo(slideToIndex);
                        }
                    }
                    else {
                        if (slideToIndex > s.slides.length - slidesPerView) {
                            s.fixLoop();
                            slideToIndex = s.wrapper.children('.' + s.params.slideClass + '[data-swiper-slide-index="' + realIndex + '"]:not(.' + s.params.slideDuplicateClass + ')').eq(0).index();
                            setTimeout(function () {
                                s.slideTo(slideToIndex);
                            }, 0);
                        }
                        else {
                            s.slideTo(slideToIndex);
                        }
                    }
                }
                else {
                    s.slideTo(slideToIndex);
                }
            }
        };
        
        var isTouched,
            isMoved,
            allowTouchCallbacks,
            touchStartTime,
            isScrolling,
            currentTranslate,
            startTranslate,
            allowThresholdMove,
            // Form elements to match
            formElements = 'input, select, textarea, button, video',
            // Last click time
            lastClickTime = Date.now(), clickTimeout,
            //Velocities
            velocities = [],
            allowMomentumBounce;
        
        // Animating Flag
        s.animating = false;
        
        // Touches information
        s.touches = {
            startX: 0,
            startY: 0,
            currentX: 0,
            currentY: 0,
            diff: 0
        };
        
        // Touch handlers
        var isTouchEvent, startMoving;
        s.onTouchStart = function (e) {
            if (e.originalEvent) e = e.originalEvent;
            isTouchEvent = e.type === 'touchstart';
            if (!isTouchEvent && 'which' in e && e.which === 3) return;
            if (s.params.noSwiping && findElementInEvent(e, '.' + s.params.noSwipingClass)) {
                s.allowClick = true;
                return;
            }
            if (s.params.swipeHandler) {
                if (!findElementInEvent(e, s.params.swipeHandler)) return;
            }
        
            var startX = s.touches.currentX = e.type === 'touchstart' ? e.targetTouches[0].pageX : e.pageX;
            var startY = s.touches.currentY = e.type === 'touchstart' ? e.targetTouches[0].pageY : e.pageY;
        
            // Do NOT start if iOS edge swipe is detected. Otherwise iOS app (UIWebView) cannot swipe-to-go-back anymore
            if(s.device.ios && s.params.iOSEdgeSwipeDetection && startX <= s.params.iOSEdgeSwipeThreshold) {
                return;
            }
        
            isTouched = true;
            isMoved = false;
            allowTouchCallbacks = true;
            isScrolling = undefined;
            startMoving = undefined;
            s.touches.startX = startX;
            s.touches.startY = startY;
            touchStartTime = Date.now();
            s.allowClick = true;
            s.updateContainerSize();
            s.swipeDirection = undefined;
            if (s.params.threshold > 0) allowThresholdMove = false;
            if (e.type !== 'touchstart') {
                var preventDefault = true;
                if ($(e.target).is(formElements)) preventDefault = false;
                if (document.activeElement && $(document.activeElement).is(formElements)) {
                    document.activeElement.blur();
                }
                if (preventDefault) {
                    e.preventDefault();
                }
            }
            s.emit('onTouchStart', s, e);
        };
        
        s.onTouchMove = function (e) {
            if (e.originalEvent) e = e.originalEvent;
            if (isTouchEvent && e.type === 'mousemove') return;
            if (e.preventedByNestedSwiper) {
                s.touches.startX = e.type === 'touchmove' ? e.targetTouches[0].pageX : e.pageX;
                s.touches.startY = e.type === 'touchmove' ? e.targetTouches[0].pageY : e.pageY;
                return;
            }
            if (s.params.onlyExternal) {
                // isMoved = true;
                s.allowClick = false;
                if (isTouched) {
                    s.touches.startX = s.touches.currentX = e.type === 'touchmove' ? e.targetTouches[0].pageX : e.pageX;
                    s.touches.startY = s.touches.currentY = e.type === 'touchmove' ? e.targetTouches[0].pageY : e.pageY;
                    touchStartTime = Date.now();
                }
                return;
            }
            if (isTouchEvent && s.params.touchReleaseOnEdges && !s.params.loop) {
                if (!s.isHorizontal()) {
                    // Vertical
                    if (
                        (s.touches.currentY < s.touches.startY && s.translate <= s.maxTranslate()) ||
                        (s.touches.currentY > s.touches.startY && s.translate >= s.minTranslate())
                        ) {
                        return;
                    }
                }
                else {
                    if (
                        (s.touches.currentX < s.touches.startX && s.translate <= s.maxTranslate()) ||
                        (s.touches.currentX > s.touches.startX && s.translate >= s.minTranslate())
                        ) {
                        return;
                    }
                }
            }
            if (isTouchEvent && document.activeElement) {
                if (e.target === document.activeElement && $(e.target).is(formElements)) {
                    isMoved = true;
                    s.allowClick = false;
                    return;
                }
            }
            if (allowTouchCallbacks) {
                s.emit('onTouchMove', s, e);
            }
            if (e.targetTouches && e.targetTouches.length > 1) return;
        
            s.touches.currentX = e.type === 'touchmove' ? e.targetTouches[0].pageX : e.pageX;
            s.touches.currentY = e.type === 'touchmove' ? e.targetTouches[0].pageY : e.pageY;
        
            if (typeof isScrolling === 'undefined') {
                var touchAngle;
                if (s.isHorizontal() && s.touches.currentY === s.touches.startY || !s.isHorizontal() && s.touches.currentX === s.touches.startX) {
                    isScrolling = false;
                }
                else {
                    touchAngle = Math.atan2(Math.abs(s.touches.currentY - s.touches.startY), Math.abs(s.touches.currentX - s.touches.startX)) * 180 / Math.PI;
                    isScrolling = s.isHorizontal() ? touchAngle > s.params.touchAngle : (90 - touchAngle > s.params.touchAngle);
                }
            }
            if (isScrolling) {
                s.emit('onTouchMoveOpposite', s, e);
            }
            if (typeof startMoving === 'undefined') {
                if (s.touches.currentX !== s.touches.startX || s.touches.currentY !== s.touches.startY) {
                    startMoving = true;
                }
            }
            if (!isTouched) return;
            if (isScrolling)  {
                isTouched = false;
                return;
            }
            if (!startMoving) {
                return;
            }
            s.allowClick = false;
            s.emit('onSliderMove', s, e);
            e.preventDefault();
            if (s.params.touchMoveStopPropagation && !s.params.nested) {
                e.stopPropagation();
            }
        
            if (!isMoved) {
                if (params.loop) {
                    s.fixLoop();
                }
                startTranslate = s.getWrapperTranslate();
                s.setWrapperTransition(0);
                if (s.animating) {
                    s.wrapper.trigger('webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd msTransitionEnd');
                }
                if (s.params.autoplay && s.autoplaying) {
                    if (s.params.autoplayDisableOnInteraction) {
                        s.stopAutoplay();
                    }
                    else {
                        s.pauseAutoplay();
                    }
                }
                allowMomentumBounce = false;
                //Grab Cursor
                if (s.params.grabCursor && (s.params.allowSwipeToNext === true || s.params.allowSwipeToPrev === true)) {
                    s.setGrabCursor(true);
                }
            }
            isMoved = true;
        
            var diff = s.touches.diff = s.isHorizontal() ? s.touches.currentX - s.touches.startX : s.touches.currentY - s.touches.startY;
        
            diff = diff * s.params.touchRatio;
            if (s.rtl) diff = -diff;
        
            s.swipeDirection = diff > 0 ? 'prev' : 'next';
            currentTranslate = diff + startTranslate;
        
            var disableParentSwiper = true;
            if ((diff > 0 && currentTranslate > s.minTranslate())) {
                disableParentSwiper = false;
                if (s.params.resistance) currentTranslate = s.minTranslate() - 1 + Math.pow(-s.minTranslate() + startTranslate + diff, s.params.resistanceRatio);
            }
            else if (diff < 0 && currentTranslate < s.maxTranslate()) {
                disableParentSwiper = false;
                if (s.params.resistance) currentTranslate = s.maxTranslate() + 1 - Math.pow(s.maxTranslate() - startTranslate - diff, s.params.resistanceRatio);
            }
        
            if (disableParentSwiper) {
                e.preventedByNestedSwiper = true;
            }
        
            // Directions locks
            if (!s.params.allowSwipeToNext && s.swipeDirection === 'next' && currentTranslate < startTranslate) {
                currentTranslate = startTranslate;
            }
            if (!s.params.allowSwipeToPrev && s.swipeDirection === 'prev' && currentTranslate > startTranslate) {
                currentTranslate = startTranslate;
            }
        
        
            // Threshold
            if (s.params.threshold > 0) {
                if (Math.abs(diff) > s.params.threshold || allowThresholdMove) {
                    if (!allowThresholdMove) {
                        allowThresholdMove = true;
                        s.touches.startX = s.touches.currentX;
                        s.touches.startY = s.touches.currentY;
                        currentTranslate = startTranslate;
                        s.touches.diff = s.isHorizontal() ? s.touches.currentX - s.touches.startX : s.touches.currentY - s.touches.startY;
                        return;
                    }
                }
                else {
                    currentTranslate = startTranslate;
                    return;
                }
            }
        
            if (!s.params.followFinger) return;
        
            // Update active index in free mode
            if (s.params.freeMode || s.params.watchSlidesProgress) {
                s.updateActiveIndex();
            }
            if (s.params.freeMode) {
                //Velocity
                if (velocities.length === 0) {
                    velocities.push({
                        position: s.touches[s.isHorizontal() ? 'startX' : 'startY'],
                        time: touchStartTime
                    });
                }
                velocities.push({
                    position: s.touches[s.isHorizontal() ? 'currentX' : 'currentY'],
                    time: (new window.Date()).getTime()
                });
            }
            // Update progress
            s.updateProgress(currentTranslate);
            // Update translate
            s.setWrapperTranslate(currentTranslate);
        };
        s.onTouchEnd = function (e) {
            if (e.originalEvent) e = e.originalEvent;
            if (allowTouchCallbacks) {
                s.emit('onTouchEnd', s, e);
            }
            allowTouchCallbacks = false;
            if (!isTouched) return;
            //Return Grab Cursor
            if (s.params.grabCursor && isMoved && isTouched  && (s.params.allowSwipeToNext === true || s.params.allowSwipeToPrev === true)) {
                s.setGrabCursor(false);
            }
        
            // Time diff
            var touchEndTime = Date.now();
            var timeDiff = touchEndTime - touchStartTime;
        
            // Tap, doubleTap, Click
            if (s.allowClick) {
                s.updateClickedSlide(e);
                s.emit('onTap', s, e);
                if (timeDiff < 300 && (touchEndTime - lastClickTime) > 300) {
                    if (clickTimeout) clearTimeout(clickTimeout);
                    clickTimeout = setTimeout(function () {
                        if (!s) return;
                        if (s.params.paginationHide && s.paginationContainer.length > 0 && !$(e.target).hasClass(s.params.bulletClass)) {
                            s.paginationContainer.toggleClass(s.params.paginationHiddenClass);
                        }
                        s.emit('onClick', s, e);
                    }, 300);
        
                }
                if (timeDiff < 300 && (touchEndTime - lastClickTime) < 300) {
                    if (clickTimeout) clearTimeout(clickTimeout);
                    s.emit('onDoubleTap', s, e);
                }
            }
        
            lastClickTime = Date.now();
            setTimeout(function () {
                if (s) s.allowClick = true;
            }, 0);
        
            if (!isTouched || !isMoved || !s.swipeDirection || s.touches.diff === 0 || currentTranslate === startTranslate) {
                isTouched = isMoved = false;
                return;
            }
            isTouched = isMoved = false;
        
            var currentPos;
            if (s.params.followFinger) {
                currentPos = s.rtl ? s.translate : -s.translate;
            }
            else {
                currentPos = -currentTranslate;
            }
            if (s.params.freeMode) {
                if (currentPos < -s.minTranslate()) {
                    s.slideTo(s.activeIndex);
                    return;
                }
                else if (currentPos > -s.maxTranslate()) {
                    if (s.slides.length < s.snapGrid.length) {
                        s.slideTo(s.snapGrid.length - 1);
                    }
                    else {
                        s.slideTo(s.slides.length - 1);
                    }
                    return;
                }
        
                if (s.params.freeModeMomentum) {
                    if (velocities.length > 1) {
                        var lastMoveEvent = velocities.pop(), velocityEvent = velocities.pop();
        
                        var distance = lastMoveEvent.position - velocityEvent.position;
                        var time = lastMoveEvent.time - velocityEvent.time;
                        s.velocity = distance / time;
                        s.velocity = s.velocity / 2;
                        if (Math.abs(s.velocity) < s.params.freeModeMinimumVelocity) {
                            s.velocity = 0;
                        }
                        // this implies that the user stopped moving a finger then released.
                        // There would be no events with distance zero, so the last event is stale.
                        if (time > 150 || (new window.Date().getTime() - lastMoveEvent.time) > 300) {
                            s.velocity = 0;
                        }
                    } else {
                        s.velocity = 0;
                    }
                    s.velocity = s.velocity * s.params.freeModeMomentumVelocityRatio;
        
                    velocities.length = 0;
                    var momentumDuration = 1000 * s.params.freeModeMomentumRatio;
                    var momentumDistance = s.velocity * momentumDuration;
        
                    var newPosition = s.translate + momentumDistance;
                    if (s.rtl) newPosition = - newPosition;
                    var doBounce = false;
                    var afterBouncePosition;
                    var bounceAmount = Math.abs(s.velocity) * 20 * s.params.freeModeMomentumBounceRatio;
                    if (newPosition < s.maxTranslate()) {
                        if (s.params.freeModeMomentumBounce) {
                            if (newPosition + s.maxTranslate() < -bounceAmount) {
                                newPosition = s.maxTranslate() - bounceAmount;
                            }
                            afterBouncePosition = s.maxTranslate();
                            doBounce = true;
                            allowMomentumBounce = true;
                        }
                        else {
                            newPosition = s.maxTranslate();
                        }
                    }
                    else if (newPosition > s.minTranslate()) {
                        if (s.params.freeModeMomentumBounce) {
                            if (newPosition - s.minTranslate() > bounceAmount) {
                                newPosition = s.minTranslate() + bounceAmount;
                            }
                            afterBouncePosition = s.minTranslate();
                            doBounce = true;
                            allowMomentumBounce = true;
                        }
                        else {
                            newPosition = s.minTranslate();
                        }
                    }
                    else if (s.params.freeModeSticky) {
                        var j = 0,
                            nextSlide;
                        for (j = 0; j < s.snapGrid.length; j += 1) {
                            if (s.snapGrid[j] > -newPosition) {
                                nextSlide = j;
                                break;
                            }
        
                        }
                        if (Math.abs(s.snapGrid[nextSlide] - newPosition) < Math.abs(s.snapGrid[nextSlide - 1] - newPosition) || s.swipeDirection === 'next') {
                            newPosition = s.snapGrid[nextSlide];
                        } else {
                            newPosition = s.snapGrid[nextSlide - 1];
                        }
                        if (!s.rtl) newPosition = - newPosition;
                    }
                    //Fix duration
                    if (s.velocity !== 0) {
                        if (s.rtl) {
                            momentumDuration = Math.abs((-newPosition - s.translate) / s.velocity);
                        }
                        else {
                            momentumDuration = Math.abs((newPosition - s.translate) / s.velocity);
                        }
                    }
                    else if (s.params.freeModeSticky) {
                        s.slideReset();
                        return;
                    }
        
                    if (s.params.freeModeMomentumBounce && doBounce) {
                        s.updateProgress(afterBouncePosition);
                        s.setWrapperTransition(momentumDuration);
                        s.setWrapperTranslate(newPosition);
                        s.onTransitionStart();
                        s.animating = true;
                        s.wrapper.transitionEnd(function () {
                            if (!s || !allowMomentumBounce) return;
                            s.emit('onMomentumBounce', s);
        
                            s.setWrapperTransition(s.params.speed);
                            s.setWrapperTranslate(afterBouncePosition);
                            s.wrapper.transitionEnd(function () {
                                if (!s) return;
                                s.onTransitionEnd();
                            });
                        });
                    } else if (s.velocity) {
                        s.updateProgress(newPosition);
                        s.setWrapperTransition(momentumDuration);
                        s.setWrapperTranslate(newPosition);
                        s.onTransitionStart();
                        if (!s.animating) {
                            s.animating = true;
                            s.wrapper.transitionEnd(function () {
                                if (!s) return;
                                s.onTransitionEnd();
                            });
                        }
        
                    } else {
                        s.updateProgress(newPosition);
                    }
        
                    s.updateActiveIndex();
                }
                if (!s.params.freeModeMomentum || timeDiff >= s.params.longSwipesMs) {
                    s.updateProgress();
                    s.updateActiveIndex();
                }
                return;
            }
        
            // Find current slide
            var i, stopIndex = 0, groupSize = s.slidesSizesGrid[0];
            for (i = 0; i < s.slidesGrid.length; i += s.params.slidesPerGroup) {
                if (typeof s.slidesGrid[i + s.params.slidesPerGroup] !== 'undefined') {
                    if (currentPos >= s.slidesGrid[i] && currentPos < s.slidesGrid[i + s.params.slidesPerGroup]) {
                        stopIndex = i;
                        groupSize = s.slidesGrid[i + s.params.slidesPerGroup] - s.slidesGrid[i];
                    }
                }
                else {
                    if (currentPos >= s.slidesGrid[i]) {
                        stopIndex = i;
                        groupSize = s.slidesGrid[s.slidesGrid.length - 1] - s.slidesGrid[s.slidesGrid.length - 2];
                    }
                }
            }
        
            // Find current slide size
            var ratio = (currentPos - s.slidesGrid[stopIndex]) / groupSize;
        
            if (timeDiff > s.params.longSwipesMs) {
                // Long touches
                if (!s.params.longSwipes) {
                    s.slideTo(s.activeIndex);
                    return;
                }
                if (s.swipeDirection === 'next') {
                    if (ratio >= s.params.longSwipesRatio) s.slideTo(stopIndex + s.params.slidesPerGroup);
                    else s.slideTo(stopIndex);
        
                }
                if (s.swipeDirection === 'prev') {
                    if (ratio > (1 - s.params.longSwipesRatio)) s.slideTo(stopIndex + s.params.slidesPerGroup);
                    else s.slideTo(stopIndex);
                }
            }
            else {
                // Short swipes
                if (!s.params.shortSwipes) {
                    s.slideTo(s.activeIndex);
                    return;
                }
                if (s.swipeDirection === 'next') {
                    s.slideTo(stopIndex + s.params.slidesPerGroup);
        
                }
                if (s.swipeDirection === 'prev') {
                    s.slideTo(stopIndex);
                }
            }
        };
        /*=========================
          Transitions
          ===========================*/
        s._slideTo = function (slideIndex, speed) {
            return s.slideTo(slideIndex, speed, true, true);
        };
        s.slideTo = function (slideIndex, speed, runCallbacks, internal) {
            if (typeof runCallbacks === 'undefined') runCallbacks = true;
            if (typeof slideIndex === 'undefined') slideIndex = 0;
            if (slideIndex < 0) slideIndex = 0;
            s.snapIndex = Math.floor(slideIndex / s.params.slidesPerGroup);
            if (s.snapIndex >= s.snapGrid.length) s.snapIndex = s.snapGrid.length - 1;
        
            var translate = - s.snapGrid[s.snapIndex];
            // Stop autoplay
            if (s.params.autoplay && s.autoplaying) {
                if (internal || !s.params.autoplayDisableOnInteraction) {
                    s.pauseAutoplay(speed);
                }
                else {
                    s.stopAutoplay();
                }
            }
            // Update progress
            s.updateProgress(translate);
        
            // Normalize slideIndex
            if(s.params.normalizeSlideIndex){
                for (var i = 0; i < s.slidesGrid.length; i++) {
                    if (- Math.floor(translate * 100) >= Math.floor(s.slidesGrid[i] * 100)) {
                        slideIndex = i;
                    }
                }
            }
        
            // Directions locks
            if (!s.params.allowSwipeToNext && translate < s.translate && translate < s.minTranslate()) {
                return false;
            }
            if (!s.params.allowSwipeToPrev && translate > s.translate && translate > s.maxTranslate()) {
                if ((s.activeIndex || 0) !== slideIndex ) return false;
            }
        
            // Update Index
            if (typeof speed === 'undefined') speed = s.params.speed;
            s.previousIndex = s.activeIndex || 0;
            s.activeIndex = slideIndex;
            s.updateRealIndex();
            if ((s.rtl && -translate === s.translate) || (!s.rtl && translate === s.translate)) {
                // Update Height
                if (s.params.autoHeight) {
                    s.updateAutoHeight();
                }
                s.updateClasses();
                if (s.params.effect !== 'slide') {
                    s.setWrapperTranslate(translate);
                }
                return false;
            }
            s.updateClasses();
            s.onTransitionStart(runCallbacks);
        
            if (speed === 0 || s.browser.lteIE9) {
                s.setWrapperTranslate(translate);
                s.setWrapperTransition(0);
                s.onTransitionEnd(runCallbacks);
            }
            else {
                s.setWrapperTranslate(translate);
                s.setWrapperTransition(speed);
                if (!s.animating) {
                    s.animating = true;
                    s.wrapper.transitionEnd(function () {
                        if (!s) return;
                        s.onTransitionEnd(runCallbacks);
                    });
                }
        
            }
        
            return true;
        };
        
        s.onTransitionStart = function (runCallbacks) {
            if (typeof runCallbacks === 'undefined') runCallbacks = true;
            if (s.params.autoHeight) {
                s.updateAutoHeight();
            }
            if (s.lazy) s.lazy.onTransitionStart();
            if (runCallbacks) {
                s.emit('onTransitionStart', s);
                if (s.activeIndex !== s.previousIndex) {
                    s.emit('onSlideChangeStart', s);
                    if (s.activeIndex > s.previousIndex) {
                        s.emit('onSlideNextStart', s);
                    }
                    else {
                        s.emit('onSlidePrevStart', s);
                    }
                }
        
            }
        };
        s.onTransitionEnd = function (runCallbacks) {
            s.animating = false;
            s.setWrapperTransition(0);
            if (typeof runCallbacks === 'undefined') runCallbacks = true;
            if (s.lazy) s.lazy.onTransitionEnd();
            if (runCallbacks) {
                s.emit('onTransitionEnd', s);
                if (s.activeIndex !== s.previousIndex) {
                    s.emit('onSlideChangeEnd', s);
                    if (s.activeIndex > s.previousIndex) {
                        s.emit('onSlideNextEnd', s);
                    }
                    else {
                        s.emit('onSlidePrevEnd', s);
                    }
                }
            }
            if (s.params.history && s.history) {
                s.history.setHistory(s.params.history, s.activeIndex);
            }
            if (s.params.hashnav && s.hashnav) {
                s.hashnav.setHash();
            }
        
        };
        s.slideNext = function (runCallbacks, speed, internal) {
            if (s.params.loop) {
                if (s.animating) return false;
                s.fixLoop();
                var clientLeft = s.container[0].clientLeft;
                return s.slideTo(s.activeIndex + s.params.slidesPerGroup, speed, runCallbacks, internal);
            }
            else return s.slideTo(s.activeIndex + s.params.slidesPerGroup, speed, runCallbacks, internal);
        };
        s._slideNext = function (speed) {
            return s.slideNext(true, speed, true);
        };
        s.slidePrev = function (runCallbacks, speed, internal) {
            if (s.params.loop) {
                if (s.animating) return false;
                s.fixLoop();
                var clientLeft = s.container[0].clientLeft;
                return s.slideTo(s.activeIndex - 1, speed, runCallbacks, internal);
            }
            else return s.slideTo(s.activeIndex - 1, speed, runCallbacks, internal);
        };
        s._slidePrev = function (speed) {
            return s.slidePrev(true, speed, true);
        };
        s.slideReset = function (runCallbacks, speed, internal) {
            return s.slideTo(s.activeIndex, speed, runCallbacks);
        };
        
        s.disableTouchControl = function () {
            s.params.onlyExternal = true;
            return true;
        };
        s.enableTouchControl = function () {
            s.params.onlyExternal = false;
            return true;
        };
        
        /*=========================
          Translate/transition helpers
          ===========================*/
        s.setWrapperTransition = function (duration, byController) {
            s.wrapper.transition(duration);
            if (s.params.effect !== 'slide' && s.effects[s.params.effect]) {
                s.effects[s.params.effect].setTransition(duration);
            }
            if (s.params.parallax && s.parallax) {
                s.parallax.setTransition(duration);
            }
            if (s.params.scrollbar && s.scrollbar) {
                s.scrollbar.setTransition(duration);
            }
            if (s.params.control && s.controller) {
                s.controller.setTransition(duration, byController);
            }
            s.emit('onSetTransition', s, duration);
        };
        s.setWrapperTranslate = function (translate, updateActiveIndex, byController) {
            var x = 0, y = 0, z = 0;
            if (s.isHorizontal()) {
                x = s.rtl ? -translate : translate;
            }
            else {
                y = translate;
            }
        
            if (s.params.roundLengths) {
                x = round(x);
                y = round(y);
            }
        
            if (!s.params.virtualTranslate) {
                if (s.support.transforms3d) s.wrapper.transform('translate3d(' + x + 'px, ' + y + 'px, ' + z + 'px)');
                else s.wrapper.transform('translate(' + x + 'px, ' + y + 'px)');
            }
        
            s.translate = s.isHorizontal() ? x : y;
        
            // Check if we need to update progress
            var progress;
            var translatesDiff = s.maxTranslate() - s.minTranslate();
            if (translatesDiff === 0) {
                progress = 0;
            }
            else {
                progress = (translate - s.minTranslate()) / (translatesDiff);
            }
            if (progress !== s.progress) {
                s.updateProgress(translate);
            }
        
            if (updateActiveIndex) s.updateActiveIndex();
            if (s.params.effect !== 'slide' && s.effects[s.params.effect]) {
                s.effects[s.params.effect].setTranslate(s.translate);
            }
            if (s.params.parallax && s.parallax) {
                s.parallax.setTranslate(s.translate);
            }
            if (s.params.scrollbar && s.scrollbar) {
                s.scrollbar.setTranslate(s.translate);
            }
            if (s.params.control && s.controller) {
                s.controller.setTranslate(s.translate, byController);
            }
            s.emit('onSetTranslate', s, s.translate);
        };
        
        s.getTranslate = function (el, axis) {
            var matrix, curTransform, curStyle, transformMatrix;
        
            // automatic axis detection
            if (typeof axis === 'undefined') {
                axis = 'x';
            }
        
            if (s.params.virtualTranslate) {
                return s.rtl ? -s.translate : s.translate;
            }
        
            curStyle = window.getComputedStyle(el, null);
            if (window.WebKitCSSMatrix) {
                curTransform = curStyle.transform || curStyle.webkitTransform;
                if (curTransform.split(',').length > 6) {
                    curTransform = curTransform.split(', ').map(function(a){
                        return a.replace(',','.');
                    }).join(', ');
                }
                // Some old versions of Webkit choke when 'none' is passed; pass
                // empty string instead in this case
                transformMatrix = new window.WebKitCSSMatrix(curTransform === 'none' ? '' : curTransform);
            }
            else {
                transformMatrix = curStyle.MozTransform || curStyle.OTransform || curStyle.MsTransform || curStyle.msTransform  || curStyle.transform || curStyle.getPropertyValue('transform').replace('translate(', 'matrix(1, 0, 0, 1,');
                matrix = transformMatrix.toString().split(',');
            }
        
            if (axis === 'x') {
                //Latest Chrome and webkits Fix
                if (window.WebKitCSSMatrix)
                    curTransform = transformMatrix.m41;
                //Crazy IE10 Matrix
                else if (matrix.length === 16)
                    curTransform = parseFloat(matrix[12]);
                //Normal Browsers
                else
                    curTransform = parseFloat(matrix[4]);
            }
            if (axis === 'y') {
                //Latest Chrome and webkits Fix
                if (window.WebKitCSSMatrix)
                    curTransform = transformMatrix.m42;
                //Crazy IE10 Matrix
                else if (matrix.length === 16)
                    curTransform = parseFloat(matrix[13]);
                //Normal Browsers
                else
                    curTransform = parseFloat(matrix[5]);
            }
            if (s.rtl && curTransform) curTransform = -curTransform;
            return curTransform || 0;
        };
        s.getWrapperTranslate = function (axis) {
            if (typeof axis === 'undefined') {
                axis = s.isHorizontal() ? 'x' : 'y';
            }
            return s.getTranslate(s.wrapper[0], axis);
        };
        
        /*=========================
          Observer
          ===========================*/
        s.observers = [];
        function initObserver(target, options) {
            options = options || {};
            // create an observer instance
            var ObserverFunc = window.MutationObserver || window.WebkitMutationObserver;
            var observer = new ObserverFunc(function (mutations) {
                mutations.forEach(function (mutation) {
                    s.onResize(true);
                    s.emit('onObserverUpdate', s, mutation);
                });
            });
        
            observer.observe(target, {
                attributes: typeof options.attributes === 'undefined' ? true : options.attributes,
                childList: typeof options.childList === 'undefined' ? true : options.childList,
                characterData: typeof options.characterData === 'undefined' ? true : options.characterData
            });
        
            s.observers.push(observer);
        }
        s.initObservers = function () {
            if (s.params.observeParents) {
                var containerParents = s.container.parents();
                for (var i = 0; i < containerParents.length; i++) {
                    initObserver(containerParents[i]);
                }
            }
        
            // Observe container
            initObserver(s.container[0], {childList: false});
        
            // Observe wrapper
            initObserver(s.wrapper[0], {attributes: false});
        };
        s.disconnectObservers = function () {
            for (var i = 0; i < s.observers.length; i++) {
                s.observers[i].disconnect();
            }
            s.observers = [];
        };
        /*=========================
          Loop
          ===========================*/
        // Create looped slides
        s.createLoop = function () {
            // Remove duplicated slides
            s.wrapper.children('.' + s.params.slideClass + '.' + s.params.slideDuplicateClass).remove();
        
            var slides = s.wrapper.children('.' + s.params.slideClass);
        
            if(s.params.slidesPerView === 'auto' && !s.params.loopedSlides) s.params.loopedSlides = slides.length;
        
            s.loopedSlides = parseInt(s.params.loopedSlides || s.params.slidesPerView, 10);
            s.loopedSlides = s.loopedSlides + s.params.loopAdditionalSlides;
            if (s.loopedSlides > slides.length) {
                s.loopedSlides = slides.length;
            }
        
            var prependSlides = [], appendSlides = [], i;
            slides.each(function (index, el) {
                var slide = $(this);
                if (index < s.loopedSlides) appendSlides.push(el);
                if (index < slides.length && index >= slides.length - s.loopedSlides) prependSlides.push(el);
                slide.attr('data-swiper-slide-index', index);
            });
            for (i = 0; i < appendSlides.length; i++) {
                s.wrapper.append($(appendSlides[i].cloneNode(true)).addClass(s.params.slideDuplicateClass));
            }
            for (i = prependSlides.length - 1; i >= 0; i--) {
                s.wrapper.prepend($(prependSlides[i].cloneNode(true)).addClass(s.params.slideDuplicateClass));
            }
        };
        s.destroyLoop = function () {
            s.wrapper.children('.' + s.params.slideClass + '.' + s.params.slideDuplicateClass).remove();
            s.slides.removeAttr('data-swiper-slide-index');
        };
        s.reLoop = function (updatePosition) {
            var oldIndex = s.activeIndex - s.loopedSlides;
            s.destroyLoop();
            s.createLoop();
            s.updateSlidesSize();
            if (updatePosition) {
                s.slideTo(oldIndex + s.loopedSlides, 0, false);
            }
        
        };
        s.fixLoop = function () {
            var newIndex;
            //Fix For Negative Oversliding
            if (s.activeIndex < s.loopedSlides) {
                newIndex = s.slides.length - s.loopedSlides * 3 + s.activeIndex;
                newIndex = newIndex + s.loopedSlides;
                s.slideTo(newIndex, 0, false, true);
            }
            //Fix For Positive Oversliding
            else if ((s.params.slidesPerView === 'auto' && s.activeIndex >= s.loopedSlides * 2) || (s.activeIndex > s.slides.length - s.params.slidesPerView * 2)) {
                newIndex = -s.slides.length + s.activeIndex + s.loopedSlides;
                newIndex = newIndex + s.loopedSlides;
                s.slideTo(newIndex, 0, false, true);
            }
        };
        /*=========================
          Append/Prepend/Remove Slides
          ===========================*/
        s.appendSlide = function (slides) {
            if (s.params.loop) {
                s.destroyLoop();
            }
            if (typeof slides === 'object' && slides.length) {
                for (var i = 0; i < slides.length; i++) {
                    if (slides[i]) s.wrapper.append(slides[i]);
                }
            }
            else {
                s.wrapper.append(slides);
            }
            if (s.params.loop) {
                s.createLoop();
            }
            if (!(s.params.observer && s.support.observer)) {
                s.update(true);
            }
        };
        s.prependSlide = function (slides) {
            if (s.params.loop) {
                s.destroyLoop();
            }
            var newActiveIndex = s.activeIndex + 1;
            if (typeof slides === 'object' && slides.length) {
                for (var i = 0; i < slides.length; i++) {
                    if (slides[i]) s.wrapper.prepend(slides[i]);
                }
                newActiveIndex = s.activeIndex + slides.length;
            }
            else {
                s.wrapper.prepend(slides);
            }
            if (s.params.loop) {
                s.createLoop();
            }
            if (!(s.params.observer && s.support.observer)) {
                s.update(true);
            }
            s.slideTo(newActiveIndex, 0, false);
        };
        s.removeSlide = function (slidesIndexes) {
            if (s.params.loop) {
                s.destroyLoop();
                s.slides = s.wrapper.children('.' + s.params.slideClass);
            }
            var newActiveIndex = s.activeIndex,
                indexToRemove;
            if (typeof slidesIndexes === 'object' && slidesIndexes.length) {
                for (var i = 0; i < slidesIndexes.length; i++) {
                    indexToRemove = slidesIndexes[i];
                    if (s.slides[indexToRemove]) s.slides.eq(indexToRemove).remove();
                    if (indexToRemove < newActiveIndex) newActiveIndex--;
                }
                newActiveIndex = Math.max(newActiveIndex, 0);
            }
            else {
                indexToRemove = slidesIndexes;
                if (s.slides[indexToRemove]) s.slides.eq(indexToRemove).remove();
                if (indexToRemove < newActiveIndex) newActiveIndex--;
                newActiveIndex = Math.max(newActiveIndex, 0);
            }
        
            if (s.params.loop) {
                s.createLoop();
            }
        
            if (!(s.params.observer && s.support.observer)) {
                s.update(true);
            }
            if (s.params.loop) {
                s.slideTo(newActiveIndex + s.loopedSlides, 0, false);
            }
            else {
                s.slideTo(newActiveIndex, 0, false);
            }
        
        };
        s.removeAllSlides = function () {
            var slidesIndexes = [];
            for (var i = 0; i < s.slides.length; i++) {
                slidesIndexes.push(i);
            }
            s.removeSlide(slidesIndexes);
        };
        

        /*=========================
          Effects
          ===========================*/
        s.effects = {
            fade: {
                setTranslate: function () {
                    for (var i = 0; i < s.slides.length; i++) {
                        var slide = s.slides.eq(i);
                        var offset = slide[0].swiperSlideOffset;
                        var tx = -offset;
                        if (!s.params.virtualTranslate) tx = tx - s.translate;
                        var ty = 0;
                        if (!s.isHorizontal()) {
                            ty = tx;
                            tx = 0;
                        }
                        var slideOpacity = s.params.fade.crossFade ?
                                Math.max(1 - Math.abs(slide[0].progress), 0) :
                                1 + Math.min(Math.max(slide[0].progress, -1), 0);
                        slide
                            .css({
                                opacity: slideOpacity
                            })
                            .transform('translate3d(' + tx + 'px, ' + ty + 'px, 0px)');
        
                    }
        
                },
                setTransition: function (duration) {
                    s.slides.transition(duration);
                    if (s.params.virtualTranslate && duration !== 0) {
                        var eventTriggered = false;
                        s.slides.transitionEnd(function () {
                            if (eventTriggered) return;
                            if (!s) return;
                            eventTriggered = true;
                            s.animating = false;
                            var triggerEvents = ['webkitTransitionEnd', 'transitionend', 'oTransitionEnd', 'MSTransitionEnd', 'msTransitionEnd'];
                            for (var i = 0; i < triggerEvents.length; i++) {
                                s.wrapper.trigger(triggerEvents[i]);
                            }
                        });
                    }
                }
            },
            flip: {
                setTranslate: function () {
                    for (var i = 0; i < s.slides.length; i++) {
                        var slide = s.slides.eq(i);
                        var progress = slide[0].progress;
                        if (s.params.flip.limitRotation) {
                            progress = Math.max(Math.min(slide[0].progress, 1), -1);
                        }
                        var offset = slide[0].swiperSlideOffset;
                        var rotate = -180 * progress,
                            rotateY = rotate,
                            rotateX = 0,
                            tx = -offset,
                            ty = 0;
                        if (!s.isHorizontal()) {
                            ty = tx;
                            tx = 0;
                            rotateX = -rotateY;
                            rotateY = 0;
                        }
                        else if (s.rtl) {
                            rotateY = -rotateY;
                        }
        
                        slide[0].style.zIndex = -Math.abs(Math.round(progress)) + s.slides.length;
        
                        if (s.params.flip.slideShadows) {
                            //Set shadows
                            var shadowBefore = s.isHorizontal() ? slide.find('.swiper-slide-shadow-left') : slide.find('.swiper-slide-shadow-top');
                            var shadowAfter = s.isHorizontal() ? slide.find('.swiper-slide-shadow-right') : slide.find('.swiper-slide-shadow-bottom');
                            if (shadowBefore.length === 0) {
                                shadowBefore = $('<div class="swiper-slide-shadow-' + (s.isHorizontal() ? 'left' : 'top') + '"></div>');
                                slide.append(shadowBefore);
                            }
                            if (shadowAfter.length === 0) {
                                shadowAfter = $('<div class="swiper-slide-shadow-' + (s.isHorizontal() ? 'right' : 'bottom') + '"></div>');
                                slide.append(shadowAfter);
                            }
                            if (shadowBefore.length) shadowBefore[0].style.opacity = Math.max(-progress, 0);
                            if (shadowAfter.length) shadowAfter[0].style.opacity = Math.max(progress, 0);
                        }
        
                        slide
                            .transform('translate3d(' + tx + 'px, ' + ty + 'px, 0px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg)');
                    }
                },
                setTransition: function (duration) {
                    s.slides.transition(duration).find('.swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left').transition(duration);
                    if (s.params.virtualTranslate && duration !== 0) {
                        var eventTriggered = false;
                        s.slides.eq(s.activeIndex).transitionEnd(function () {
                            if (eventTriggered) return;
                            if (!s) return;
                            if (!$(this).hasClass(s.params.slideActiveClass)) return;
                            eventTriggered = true;
                            s.animating = false;
                            var triggerEvents = ['webkitTransitionEnd', 'transitionend', 'oTransitionEnd', 'MSTransitionEnd', 'msTransitionEnd'];
                            for (var i = 0; i < triggerEvents.length; i++) {
                                s.wrapper.trigger(triggerEvents[i]);
                            }
                        });
                    }
                }
            },
            cube: {
                setTranslate: function () {
                    var wrapperRotate = 0, cubeShadow;
                    if (s.params.cube.shadow) {
                        if (s.isHorizontal()) {
                            cubeShadow = s.wrapper.find('.swiper-cube-shadow');
                            if (cubeShadow.length === 0) {
                                cubeShadow = $('<div class="swiper-cube-shadow"></div>');
                                s.wrapper.append(cubeShadow);
                            }
                            cubeShadow.css({height: s.width + 'px'});
                        }
                        else {
                            cubeShadow = s.container.find('.swiper-cube-shadow');
                            if (cubeShadow.length === 0) {
                                cubeShadow = $('<div class="swiper-cube-shadow"></div>');
                                s.container.append(cubeShadow);
                            }
                        }
                    }
                    for (var i = 0; i < s.slides.length; i++) {
                        var slide = s.slides.eq(i);
                        var slideAngle = i * 90;
                        var round = Math.floor(slideAngle / 360);
                        if (s.rtl) {
                            slideAngle = -slideAngle;
                            round = Math.floor(-slideAngle / 360);
                        }
                        var progress = Math.max(Math.min(slide[0].progress, 1), -1);
                        var tx = 0, ty = 0, tz = 0;
                        if (i % 4 === 0) {
                            tx = - round * 4 * s.size;
                            tz = 0;
                        }
                        else if ((i - 1) % 4 === 0) {
                            tx = 0;
                            tz = - round * 4 * s.size;
                        }
                        else if ((i - 2) % 4 === 0) {
                            tx = s.size + round * 4 * s.size;
                            tz = s.size;
                        }
                        else if ((i - 3) % 4 === 0) {
                            tx = - s.size;
                            tz = 3 * s.size + s.size * 4 * round;
                        }
                        if (s.rtl) {
                            tx = -tx;
                        }
        
                        if (!s.isHorizontal()) {
                            ty = tx;
                            tx = 0;
                        }
        
                        var transform = 'rotateX(' + (s.isHorizontal() ? 0 : -slideAngle) + 'deg) rotateY(' + (s.isHorizontal() ? slideAngle : 0) + 'deg) translate3d(' + tx + 'px, ' + ty + 'px, ' + tz + 'px)';
                        if (progress <= 1 && progress > -1) {
                            wrapperRotate = i * 90 + progress * 90;
                            if (s.rtl) wrapperRotate = -i * 90 - progress * 90;
                        }
                        slide.transform(transform);
                        if (s.params.cube.slideShadows) {
                            //Set shadows
                            var shadowBefore = s.isHorizontal() ? slide.find('.swiper-slide-shadow-left') : slide.find('.swiper-slide-shadow-top');
                            var shadowAfter = s.isHorizontal() ? slide.find('.swiper-slide-shadow-right') : slide.find('.swiper-slide-shadow-bottom');
                            if (shadowBefore.length === 0) {
                                shadowBefore = $('<div class="swiper-slide-shadow-' + (s.isHorizontal() ? 'left' : 'top') + '"></div>');
                                slide.append(shadowBefore);
                            }
                            if (shadowAfter.length === 0) {
                                shadowAfter = $('<div class="swiper-slide-shadow-' + (s.isHorizontal() ? 'right' : 'bottom') + '"></div>');
                                slide.append(shadowAfter);
                            }
                            if (shadowBefore.length) shadowBefore[0].style.opacity = Math.max(-progress, 0);
                            if (shadowAfter.length) shadowAfter[0].style.opacity = Math.max(progress, 0);
                        }
                    }
                    s.wrapper.css({
                        '-webkit-transform-origin': '50% 50% -' + (s.size / 2) + 'px',
                        '-moz-transform-origin': '50% 50% -' + (s.size / 2) + 'px',
                        '-ms-transform-origin': '50% 50% -' + (s.size / 2) + 'px',
                        'transform-origin': '50% 50% -' + (s.size / 2) + 'px'
                    });
        
                    if (s.params.cube.shadow) {
                        if (s.isHorizontal()) {
                            cubeShadow.transform('translate3d(0px, ' + (s.width / 2 + s.params.cube.shadowOffset) + 'px, ' + (-s.width / 2) + 'px) rotateX(90deg) rotateZ(0deg) scale(' + (s.params.cube.shadowScale) + ')');
                        }
                        else {
                            var shadowAngle = Math.abs(wrapperRotate) - Math.floor(Math.abs(wrapperRotate) / 90) * 90;
                            var multiplier = 1.5 - (Math.sin(shadowAngle * 2 * Math.PI / 360) / 2 + Math.cos(shadowAngle * 2 * Math.PI / 360) / 2);
                            var scale1 = s.params.cube.shadowScale,
                                scale2 = s.params.cube.shadowScale / multiplier,
                                offset = s.params.cube.shadowOffset;
                            cubeShadow.transform('scale3d(' + scale1 + ', 1, ' + scale2 + ') translate3d(0px, ' + (s.height / 2 + offset) + 'px, ' + (-s.height / 2 / scale2) + 'px) rotateX(-90deg)');
                        }
                    }
                    var zFactor = (s.isSafari || s.isUiWebView) ? (-s.size / 2) : 0;
                    s.wrapper.transform('translate3d(0px,0,' + zFactor + 'px) rotateX(' + (s.isHorizontal() ? 0 : wrapperRotate) + 'deg) rotateY(' + (s.isHorizontal() ? -wrapperRotate : 0) + 'deg)');
                },
                setTransition: function (duration) {
                    s.slides.transition(duration).find('.swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left').transition(duration);
                    if (s.params.cube.shadow && !s.isHorizontal()) {
                        s.container.find('.swiper-cube-shadow').transition(duration);
                    }
                }
            },
            coverflow: {
                setTranslate: function () {
                    var transform = s.translate;
                    var center = s.isHorizontal() ? -transform + s.width / 2 : -transform + s.height / 2;
                    var rotate = s.isHorizontal() ? s.params.coverflow.rotate: -s.params.coverflow.rotate;
                    var translate = s.params.coverflow.depth;
                    //Each slide offset from center
                    for (var i = 0, length = s.slides.length; i < length; i++) {
                        var slide = s.slides.eq(i);
                        var slideSize = s.slidesSizesGrid[i];
                        var slideOffset = slide[0].swiperSlideOffset;
                        var offsetMultiplier = (center - slideOffset - slideSize / 2) / slideSize * s.params.coverflow.modifier;
        
                        var rotateY = s.isHorizontal() ? rotate * offsetMultiplier : 0;
                        var rotateX = s.isHorizontal() ? 0 : rotate * offsetMultiplier;
                        // var rotateZ = 0
                        var translateZ = -translate * Math.abs(offsetMultiplier);
        
                        var translateY = s.isHorizontal() ? 0 : s.params.coverflow.stretch * (offsetMultiplier);
                        var translateX = s.isHorizontal() ? s.params.coverflow.stretch * (offsetMultiplier) : 0;
        
                        //Fix for ultra small values
                        if (Math.abs(translateX) < 0.001) translateX = 0;
                        if (Math.abs(translateY) < 0.001) translateY = 0;
                        if (Math.abs(translateZ) < 0.001) translateZ = 0;
                        if (Math.abs(rotateY) < 0.001) rotateY = 0;
                        if (Math.abs(rotateX) < 0.001) rotateX = 0;
        
                        var slideTransform = 'translate3d(' + translateX + 'px,' + translateY + 'px,' + translateZ + 'px)  rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg)';
        
                        slide.transform(slideTransform);
                        slide[0].style.zIndex = -Math.abs(Math.round(offsetMultiplier)) + 1;
                        if (s.params.coverflow.slideShadows) {
                            //Set shadows
                            var shadowBefore = s.isHorizontal() ? slide.find('.swiper-slide-shadow-left') : slide.find('.swiper-slide-shadow-top');
                            var shadowAfter = s.isHorizontal() ? slide.find('.swiper-slide-shadow-right') : slide.find('.swiper-slide-shadow-bottom');
                            if (shadowBefore.length === 0) {
                                shadowBefore = $('<div class="swiper-slide-shadow-' + (s.isHorizontal() ? 'left' : 'top') + '"></div>');
                                slide.append(shadowBefore);
                            }
                            if (shadowAfter.length === 0) {
                                shadowAfter = $('<div class="swiper-slide-shadow-' + (s.isHorizontal() ? 'right' : 'bottom') + '"></div>');
                                slide.append(shadowAfter);
                            }
                            if (shadowBefore.length) shadowBefore[0].style.opacity = offsetMultiplier > 0 ? offsetMultiplier : 0;
                            if (shadowAfter.length) shadowAfter[0].style.opacity = (-offsetMultiplier) > 0 ? -offsetMultiplier : 0;
                        }
                    }
        
                    //Set correct perspective for IE10
                    if (s.browser.ie) {
                        var ws = s.wrapper[0].style;
                        ws.perspectiveOrigin = center + 'px 50%';
                    }
                },
                setTransition: function (duration) {
                    s.slides.transition(duration).find('.swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left').transition(duration);
                }
            }
        };
        

        /*=========================
          Images Lazy Loading
          ===========================*/
        s.lazy = {
            initialImageLoaded: false,
            loadImageInSlide: function (index, loadInDuplicate) {
                if (typeof index === 'undefined') return;
                if (typeof loadInDuplicate === 'undefined') loadInDuplicate = true;
                if (s.slides.length === 0) return;
        
                var slide = s.slides.eq(index);
                var img = slide.find('.' + s.params.lazyLoadingClass + ':not(.' + s.params.lazyStatusLoadedClass + '):not(.' + s.params.lazyStatusLoadingClass + ')');
                if (slide.hasClass(s.params.lazyLoadingClass) && !slide.hasClass(s.params.lazyStatusLoadedClass) && !slide.hasClass(s.params.lazyStatusLoadingClass)) {
                    img = img.add(slide[0]);
                }
                if (img.length === 0) return;
        
                img.each(function () {
                    var _img = $(this);
                    _img.addClass(s.params.lazyStatusLoadingClass);
                    var background = _img.attr('data-background');
                    var src = _img.attr('data-src'),
                        srcset = _img.attr('data-srcset'),
                        sizes = _img.attr('data-sizes');
                    s.loadImage(_img[0], (src || background), srcset, sizes, false, function () {
                        if (typeof s === 'undefined' || s === null || !s) return;
                        if (background) {
                            _img.css('background-image', 'url("' + background + '")');
                            _img.removeAttr('data-background');
                        }
                        else {
                            if (srcset) {
                                _img.attr('srcset', srcset);
                                _img.removeAttr('data-srcset');
                            }
                            if (sizes) {
                                _img.attr('sizes', sizes);
                                _img.removeAttr('data-sizes');
                            }
                            if (src) {
                                _img.attr('src', src);
                                _img.removeAttr('data-src');
                            }
        
                        }
        
                        _img.addClass(s.params.lazyStatusLoadedClass).removeClass(s.params.lazyStatusLoadingClass);
                        slide.find('.' + s.params.lazyPreloaderClass + ', .' + s.params.preloaderClass).remove();
                        if (s.params.loop && loadInDuplicate) {
                            var slideOriginalIndex = slide.attr('data-swiper-slide-index');
                            if (slide.hasClass(s.params.slideDuplicateClass)) {
                                var originalSlide = s.wrapper.children('[data-swiper-slide-index="' + slideOriginalIndex + '"]:not(.' + s.params.slideDuplicateClass + ')');
                                s.lazy.loadImageInSlide(originalSlide.index(), false);
                            }
                            else {
                                var duplicatedSlide = s.wrapper.children('.' + s.params.slideDuplicateClass + '[data-swiper-slide-index="' + slideOriginalIndex + '"]');
                                s.lazy.loadImageInSlide(duplicatedSlide.index(), false);
                            }
                        }
                        s.emit('onLazyImageReady', s, slide[0], _img[0]);
                    });
        
                    s.emit('onLazyImageLoad', s, slide[0], _img[0]);
                });
        
            },
            load: function () {
                var i;
                var slidesPerView = s.params.slidesPerView;
                if (slidesPerView === 'auto') {
                    slidesPerView = 0;
                }
                if (!s.lazy.initialImageLoaded) s.lazy.initialImageLoaded = true;
                if (s.params.watchSlidesVisibility) {
                    s.wrapper.children('.' + s.params.slideVisibleClass).each(function () {
                        s.lazy.loadImageInSlide($(this).index());
                    });
                }
                else {
                    if (slidesPerView > 1) {
                        for (i = s.activeIndex; i < s.activeIndex + slidesPerView ; i++) {
                            if (s.slides[i]) s.lazy.loadImageInSlide(i);
                        }
                    }
                    else {
                        s.lazy.loadImageInSlide(s.activeIndex);
                    }
                }
                if (s.params.lazyLoadingInPrevNext) {
                    if (slidesPerView > 1 || (s.params.lazyLoadingInPrevNextAmount && s.params.lazyLoadingInPrevNextAmount > 1)) {
                        var amount = s.params.lazyLoadingInPrevNextAmount;
                        var spv = slidesPerView;
                        var maxIndex = Math.min(s.activeIndex + spv + Math.max(amount, spv), s.slides.length);
                        var minIndex = Math.max(s.activeIndex - Math.max(spv, amount), 0);
                        // Next Slides
                        for (i = s.activeIndex + slidesPerView; i < maxIndex; i++) {
                            if (s.slides[i]) s.lazy.loadImageInSlide(i);
                        }
                        // Prev Slides
                        for (i = minIndex; i < s.activeIndex ; i++) {
                            if (s.slides[i]) s.lazy.loadImageInSlide(i);
                        }
                    }
                    else {
                        var nextSlide = s.wrapper.children('.' + s.params.slideNextClass);
                        if (nextSlide.length > 0) s.lazy.loadImageInSlide(nextSlide.index());
        
                        var prevSlide = s.wrapper.children('.' + s.params.slidePrevClass);
                        if (prevSlide.length > 0) s.lazy.loadImageInSlide(prevSlide.index());
                    }
                }
            },
            onTransitionStart: function () {
                if (s.params.lazyLoading) {
                    if (s.params.lazyLoadingOnTransitionStart || (!s.params.lazyLoadingOnTransitionStart && !s.lazy.initialImageLoaded)) {
                        s.lazy.load();
                    }
                }
            },
            onTransitionEnd: function () {
                if (s.params.lazyLoading && !s.params.lazyLoadingOnTransitionStart) {
                    s.lazy.load();
                }
            }
        };
        

        /*=========================
          Scrollbar
          ===========================*/
        s.scrollbar = {
            isTouched: false,
            setDragPosition: function (e) {
                var sb = s.scrollbar;
                var x = 0, y = 0;
                var translate;
                var pointerPosition = s.isHorizontal() ?
                    ((e.type === 'touchstart' || e.type === 'touchmove') ? e.targetTouches[0].pageX : e.pageX || e.clientX) :
                    ((e.type === 'touchstart' || e.type === 'touchmove') ? e.targetTouches[0].pageY : e.pageY || e.clientY) ;
                var position = (pointerPosition) - sb.track.offset()[s.isHorizontal() ? 'left' : 'top'] - sb.dragSize / 2;
                var positionMin = -s.minTranslate() * sb.moveDivider;
                var positionMax = -s.maxTranslate() * sb.moveDivider;
                if (position < positionMin) {
                    position = positionMin;
                }
                else if (position > positionMax) {
                    position = positionMax;
                }
                position = -position / sb.moveDivider;
                s.updateProgress(position);
                s.setWrapperTranslate(position, true);
            },
            dragStart: function (e) {
                var sb = s.scrollbar;
                sb.isTouched = true;
                e.preventDefault();
                e.stopPropagation();
        
                sb.setDragPosition(e);
                clearTimeout(sb.dragTimeout);
        
                sb.track.transition(0);
                if (s.params.scrollbarHide) {
                    sb.track.css('opacity', 1);
                }
                s.wrapper.transition(100);
                sb.drag.transition(100);
                s.emit('onScrollbarDragStart', s);
            },
            dragMove: function (e) {
                var sb = s.scrollbar;
                if (!sb.isTouched) return;
                if (e.preventDefault) e.preventDefault();
                else e.returnValue = false;
                sb.setDragPosition(e);
                s.wrapper.transition(0);
                sb.track.transition(0);
                sb.drag.transition(0);
                s.emit('onScrollbarDragMove', s);
            },
            dragEnd: function (e) {
                var sb = s.scrollbar;
                if (!sb.isTouched) return;
                sb.isTouched = false;
                if (s.params.scrollbarHide) {
                    clearTimeout(sb.dragTimeout);
                    sb.dragTimeout = setTimeout(function () {
                        sb.track.css('opacity', 0);
                        sb.track.transition(400);
                    }, 1000);
        
                }
                s.emit('onScrollbarDragEnd', s);
                if (s.params.scrollbarSnapOnRelease) {
                    s.slideReset();
                }
            },
            draggableEvents: (function () {
                if ((s.params.simulateTouch === false && !s.support.touch)) return s.touchEventsDesktop;
                else return s.touchEvents;
            })(),
            enableDraggable: function () {
                var sb = s.scrollbar;
                var target = s.support.touch ? sb.track : document;
                $(sb.track).on(sb.draggableEvents.start, sb.dragStart);
                $(target).on(sb.draggableEvents.move, sb.dragMove);
                $(target).on(sb.draggableEvents.end, sb.dragEnd);
            },
            disableDraggable: function () {
                var sb = s.scrollbar;
                var target = s.support.touch ? sb.track : document;
                $(sb.track).off(sb.draggableEvents.start, sb.dragStart);
                $(target).off(sb.draggableEvents.move, sb.dragMove);
                $(target).off(sb.draggableEvents.end, sb.dragEnd);
            },
            set: function () {
                if (!s.params.scrollbar) return;
                var sb = s.scrollbar;
                sb.track = $(s.params.scrollbar);
                if (s.params.uniqueNavElements && typeof s.params.scrollbar === 'string' && sb.track.length > 1 && s.container.find(s.params.scrollbar).length === 1) {
                    sb.track = s.container.find(s.params.scrollbar);
                }
                sb.drag = sb.track.find('.swiper-scrollbar-drag');
                if (sb.drag.length === 0) {
                    sb.drag = $('<div class="swiper-scrollbar-drag"></div>');
                    sb.track.append(sb.drag);
                }
                sb.drag[0].style.width = '';
                sb.drag[0].style.height = '';
                sb.trackSize = s.isHorizontal() ? sb.track[0].offsetWidth : sb.track[0].offsetHeight;
        
                sb.divider = s.size / s.virtualSize;
                sb.moveDivider = sb.divider * (sb.trackSize / s.size);
                sb.dragSize = sb.trackSize * sb.divider;
        
                if (s.isHorizontal()) {
                    sb.drag[0].style.width = sb.dragSize + 'px';
                }
                else {
                    sb.drag[0].style.height = sb.dragSize + 'px';
                }
        
                if (sb.divider >= 1) {
                    sb.track[0].style.display = 'none';
                }
                else {
                    sb.track[0].style.display = '';
                }
                if (s.params.scrollbarHide) {
                    sb.track[0].style.opacity = 0;
                }
            },
            setTranslate: function () {
                if (!s.params.scrollbar) return;
                var diff;
                var sb = s.scrollbar;
                var translate = s.translate || 0;
                var newPos;
        
                var newSize = sb.dragSize;
                newPos = (sb.trackSize - sb.dragSize) * s.progress;
                if (s.rtl && s.isHorizontal()) {
                    newPos = -newPos;
                    if (newPos > 0) {
                        newSize = sb.dragSize - newPos;
                        newPos = 0;
                    }
                    else if (-newPos + sb.dragSize > sb.trackSize) {
                        newSize = sb.trackSize + newPos;
                    }
                }
                else {
                    if (newPos < 0) {
                        newSize = sb.dragSize + newPos;
                        newPos = 0;
                    }
                    else if (newPos + sb.dragSize > sb.trackSize) {
                        newSize = sb.trackSize - newPos;
                    }
                }
                if (s.isHorizontal()) {
                    if (s.support.transforms3d) {
                        sb.drag.transform('translate3d(' + (newPos) + 'px, 0, 0)');
                    }
                    else {
                        sb.drag.transform('translateX(' + (newPos) + 'px)');
                    }
                    sb.drag[0].style.width = newSize + 'px';
                }
                else {
                    if (s.support.transforms3d) {
                        sb.drag.transform('translate3d(0px, ' + (newPos) + 'px, 0)');
                    }
                    else {
                        sb.drag.transform('translateY(' + (newPos) + 'px)');
                    }
                    sb.drag[0].style.height = newSize + 'px';
                }
                if (s.params.scrollbarHide) {
                    clearTimeout(sb.timeout);
                    sb.track[0].style.opacity = 1;
                    sb.timeout = setTimeout(function () {
                        sb.track[0].style.opacity = 0;
                        sb.track.transition(400);
                    }, 1000);
                }
            },
            setTransition: function (duration) {
                if (!s.params.scrollbar) return;
                s.scrollbar.drag.transition(duration);
            }
        };
        

        /*=========================
          Controller
          ===========================*/
        s.controller = {
            LinearSpline: function (x, y) {
                var binarySearch = (function() {
                    var maxIndex, minIndex, guess;
                    return function(array, val) {
                        minIndex = -1;
                        maxIndex = array.length;
                        while (maxIndex - minIndex > 1)
                            if (array[guess = maxIndex + minIndex >> 1] <= val) {
                                minIndex = guess;
                            } else {
                                maxIndex = guess;
                            }
                        return maxIndex;
                    };
                })();
                this.x = x;
                this.y = y;
                this.lastIndex = x.length - 1;
                // Given an x value (x2), return the expected y2 value:
                // (x1,y1) is the known point before given value,
                // (x3,y3) is the known point after given value.
                var i1, i3;
                var l = this.x.length;
        
                this.interpolate = function (x2) {
                    if (!x2) return 0;
        
                    // Get the indexes of x1 and x3 (the array indexes before and after given x2):
                    i3 = binarySearch(this.x, x2);
                    i1 = i3 - 1;
        
                    // We have our indexes i1 & i3, so we can calculate already:
                    // y2 := ((x2−x1) × (y3−y1)) ÷ (x3−x1) + y1
                    return ((x2 - this.x[i1]) * (this.y[i3] - this.y[i1])) / (this.x[i3] - this.x[i1]) + this.y[i1];
                };
            },
            //xxx: for now i will just save one spline function to to
            getInterpolateFunction: function(c){
                if(!s.controller.spline) s.controller.spline = s.params.loop ?
                    new s.controller.LinearSpline(s.slidesGrid, c.slidesGrid) :
                    new s.controller.LinearSpline(s.snapGrid, c.snapGrid);
            },
            setTranslate: function (translate, byController) {
               var controlled = s.params.control;
               var multiplier, controlledTranslate;
               function setControlledTranslate(c) {
                    // this will create an Interpolate function based on the snapGrids
                    // x is the Grid of the scrolled scroller and y will be the controlled scroller
                    // it makes sense to create this only once and recall it for the interpolation
                    // the function does a lot of value caching for performance
                    translate = c.rtl && c.params.direction === 'horizontal' ? -s.translate : s.translate;
                    if (s.params.controlBy === 'slide') {
                        s.controller.getInterpolateFunction(c);
                        // i am not sure why the values have to be multiplicated this way, tried to invert the snapGrid
                        // but it did not work out
                        controlledTranslate = -s.controller.spline.interpolate(-translate);
                    }
        
                    if(!controlledTranslate || s.params.controlBy === 'container'){
                        multiplier = (c.maxTranslate() - c.minTranslate()) / (s.maxTranslate() - s.minTranslate());
                        controlledTranslate = (translate - s.minTranslate()) * multiplier + c.minTranslate();
                    }
        
                    if (s.params.controlInverse) {
                        controlledTranslate = c.maxTranslate() - controlledTranslate;
                    }
                    c.updateProgress(controlledTranslate);
                    c.setWrapperTranslate(controlledTranslate, false, s);
                    c.updateActiveIndex();
               }
               if (Array.isArray(controlled)) {
                   for (var i = 0; i < controlled.length; i++) {
                       if (controlled[i] !== byController && controlled[i] instanceof Swiper) {
                           setControlledTranslate(controlled[i]);
                       }
                   }
               }
               else if (controlled instanceof Swiper && byController !== controlled) {
        
                   setControlledTranslate(controlled);
               }
            },
            setTransition: function (duration, byController) {
                var controlled = s.params.control;
                var i;
                function setControlledTransition(c) {
                    c.setWrapperTransition(duration, s);
                    if (duration !== 0) {
                        c.onTransitionStart();
                        c.wrapper.transitionEnd(function(){
                            if (!controlled) return;
                            if (c.params.loop && s.params.controlBy === 'slide') {
                                c.fixLoop();
                            }
                            c.onTransitionEnd();
        
                        });
                    }
                }
                if (Array.isArray(controlled)) {
                    for (i = 0; i < controlled.length; i++) {
                        if (controlled[i] !== byController && controlled[i] instanceof Swiper) {
                            setControlledTransition(controlled[i]);
                        }
                    }
                }
                else if (controlled instanceof Swiper && byController !== controlled) {
                    setControlledTransition(controlled);
                }
            }
        };
        

        /*=========================
          Hash Navigation
          ===========================*/
        s.hashnav = {
            onHashCange: function (e, a) {
                var newHash = document.location.hash.replace('#', '');
                var activeSlideHash = s.slides.eq(s.activeIndex).attr('data-hash');
                if (newHash !== activeSlideHash) {
                    s.slideTo(s.wrapper.children('.' + s.params.slideClass + '[data-hash="' + (newHash) + '"]').index());
                }
            },
            attachEvents: function (detach) {
                var action = detach ? 'off' : 'on';
                $(window)[action]('hashchange', s.hashnav.onHashCange);
            },
            setHash: function () {
                if (!s.hashnav.initialized || !s.params.hashnav) return;
                if (s.params.replaceState && window.history && window.history.replaceState) {
                    window.history.replaceState(null, null, ('#' + s.slides.eq(s.activeIndex).attr('data-hash') || ''));
                } else {
                    var slide = s.slides.eq(s.activeIndex);
                    var hash = slide.attr('data-hash') || slide.attr('data-history');
                    document.location.hash = hash || '';
                }
            },
            init: function () {
                if (!s.params.hashnav || s.params.history) return;
                s.hashnav.initialized = true;
                var hash = document.location.hash.replace('#', '');
                if (hash) {
                    var speed = 0;
                    for (var i = 0, length = s.slides.length; i < length; i++) {
                        var slide = s.slides.eq(i);
                        var slideHash = slide.attr('data-hash') || slide.attr('data-history');
                        if (slideHash === hash && !slide.hasClass(s.params.slideDuplicateClass)) {
                            var index = slide.index();
                            s.slideTo(index, speed, s.params.runCallbacksOnInit, true);
                        }
                    }
                }
                if (s.params.hashnavWatchState) s.hashnav.attachEvents();
            },
            destroy: function () {
                if (s.params.hashnavWatchState) s.hashnav.attachEvents(true);
            }
        };
        

        /*=========================
          History Api with fallback to Hashnav
          ===========================*/
        s.history = {
            init: function () {
                if (!s.params.history) return;
                if (!window.history || !window.history.pushState) {
                    s.params.history = false;
                    s.params.hashnav = true;
                    return;
                }
                s.history.initialized = true;
                this.paths = this.getPathValues();
                if (!this.paths.key && !this.paths.value) return;
                this.scrollToSlide(0, this.paths.value, s.params.runCallbacksOnInit);
                if (!s.params.replaceState) {
                    window.addEventListener('popstate', this.setHistoryPopState);
                }
            },
            setHistoryPopState: function() {
                s.history.paths = s.history.getPathValues();
                s.history.scrollToSlide(s.params.speed, s.history.paths.value, false);
            },
            getPathValues: function() {
                var pathArray = window.location.pathname.slice(1).split('/');
                var total = pathArray.length;
                var key = pathArray[total - 2];
                var value = pathArray[total - 1];
                return { key: key, value: value };
            },
            setHistory: function (key, index) {
                if (!s.history.initialized || !s.params.history) return;
                var slide = s.slides.eq(index);
                var value = this.slugify(slide.attr('data-history'));
                if (!window.location.pathname.includes(key)) {
                    value = key + '/' + value;
                }
                if (s.params.replaceState) {
                    window.history.replaceState(null, null, value);
                } else {
                    window.history.pushState(null, null, value);
                }
            },
            slugify: function(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            },
            scrollToSlide: function(speed, value, runCallbacks) {
                if (value) {
                    for (var i = 0, length = s.slides.length; i < length; i++) {
                        var slide = s.slides.eq(i);
                        var slideHistory = this.slugify(slide.attr('data-history'));
                        if (slideHistory === value && !slide.hasClass(s.params.slideDuplicateClass)) {
                            var index = slide.index();
                            s.slideTo(index, speed, runCallbacks);
                        }
                    }
                } else {
                    s.slideTo(0, speed, runCallbacks);
                }
            }
        };
        

        /*=========================
          Keyboard Control
          ===========================*/
        function handleKeyboard(e) {
            if (e.originalEvent) e = e.originalEvent; //jquery fix
            var kc = e.keyCode || e.charCode;
            // Directions locks
            if (!s.params.allowSwipeToNext && (s.isHorizontal() && kc === 39 || !s.isHorizontal() && kc === 40)) {
                return false;
            }
            if (!s.params.allowSwipeToPrev && (s.isHorizontal() && kc === 37 || !s.isHorizontal() && kc === 38)) {
                return false;
            }
            if (e.shiftKey || e.altKey || e.ctrlKey || e.metaKey) {
                return;
            }
            if (document.activeElement && document.activeElement.nodeName && (document.activeElement.nodeName.toLowerCase() === 'input' || document.activeElement.nodeName.toLowerCase() === 'textarea')) {
                return;
            }
            if (kc === 37 || kc === 39 || kc === 38 || kc === 40) {
                var inView = false;
                //Check that swiper should be inside of visible area of window
                if (s.container.parents('.' + s.params.slideClass).length > 0 && s.container.parents('.' + s.params.slideActiveClass).length === 0) {
                    return;
                }
                var windowScroll = {
                    left: window.pageXOffset,
                    top: window.pageYOffset
                };
                var windowWidth = window.innerWidth;
                var windowHeight = window.innerHeight;
                var swiperOffset = s.container.offset();
                if (s.rtl) swiperOffset.left = swiperOffset.left - s.container[0].scrollLeft;
                var swiperCoord = [
                    [swiperOffset.left, swiperOffset.top],
                    [swiperOffset.left + s.width, swiperOffset.top],
                    [swiperOffset.left, swiperOffset.top + s.height],
                    [swiperOffset.left + s.width, swiperOffset.top + s.height]
                ];
                for (var i = 0; i < swiperCoord.length; i++) {
                    var point = swiperCoord[i];
                    if (
                        point[0] >= windowScroll.left && point[0] <= windowScroll.left + windowWidth &&
                        point[1] >= windowScroll.top && point[1] <= windowScroll.top + windowHeight
                    ) {
                        inView = true;
                    }
        
                }
                if (!inView) return;
            }
            if (s.isHorizontal()) {
                if (kc === 37 || kc === 39) {
                    if (e.preventDefault) e.preventDefault();
                    else e.returnValue = false;
                }
                if ((kc === 39 && !s.rtl) || (kc === 37 && s.rtl)) s.slideNext();
                if ((kc === 37 && !s.rtl) || (kc === 39 && s.rtl)) s.slidePrev();
            }
            else {
                if (kc === 38 || kc === 40) {
                    if (e.preventDefault) e.preventDefault();
                    else e.returnValue = false;
                }
                if (kc === 40) s.slideNext();
                if (kc === 38) s.slidePrev();
            }
            s.emit('onKeyPress', s, kc);
        }
        s.disableKeyboardControl = function () {
            s.params.keyboardControl = false;
            $(document).off('keydown', handleKeyboard);
        };
        s.enableKeyboardControl = function () {
            s.params.keyboardControl = true;
            $(document).on('keydown', handleKeyboard);
        };
        

        /*=========================
          Mousewheel Control
          ===========================*/
        s.mousewheel = {
            event: false,
            lastScrollTime: (new window.Date()).getTime()
        };
        function isEventSupported() {
            var eventName = 'onwheel';
            var isSupported = eventName in document;
        
            if (!isSupported) {
                var element = document.createElement('div');
                element.setAttribute(eventName, 'return;');
                isSupported = typeof element[eventName] === 'function';
            }
        
            if (!isSupported &&
                document.implementation &&
                document.implementation.hasFeature &&
                    // always returns true in newer browsers as per the standard.
                    // @see http://dom.spec.whatwg.org/#dom-domimplementation-hasfeature
                document.implementation.hasFeature('', '') !== true ) {
                // This is the only way to test support for the `wheel` event in IE9+.
                isSupported = document.implementation.hasFeature('Events.wheel', '3.0');
            }
        
            return isSupported;
        }
        /**
         * Mouse wheel (and 2-finger trackpad) support on the web sucks.  It is
         * complicated, thus this doc is long and (hopefully) detailed enough to answer
         * your questions.
         *
         * If you need to react to the mouse wheel in a predictable way, this code is
         * like your bestest friend. * hugs *
         *
         * As of today, there are 4 DOM event types you can listen to:
         *
         *   'wheel'                -- Chrome(31+), FF(17+), IE(9+)
         *   'mousewheel'           -- Chrome, IE(6+), Opera, Safari
         *   'MozMousePixelScroll'  -- FF(3.5 only!) (2010-2013) -- don't bother!
         *   'DOMMouseScroll'       -- FF(0.9.7+) since 2003
         *
         * So what to do?  The is the best:
         *
         *   normalizeWheel.getEventType();
         *
         * In your event callback, use this code to get sane interpretation of the
         * deltas.  This code will return an object with properties:
         *
         *   spinX   -- normalized spin speed (use for zoom) - x plane
         *   spinY   -- " - y plane
         *   pixelX  -- normalized distance (to pixels) - x plane
         *   pixelY  -- " - y plane
         *
         * Wheel values are provided by the browser assuming you are using the wheel to
         * scroll a web page by a number of lines or pixels (or pages).  Values can vary
         * significantly on different platforms and browsers, forgetting that you can
         * scroll at different speeds.  Some devices (like trackpads) emit more events
         * at smaller increments with fine granularity, and some emit massive jumps with
         * linear speed or acceleration.
         *
         * This code does its best to normalize the deltas for you:
         *
         *   - spin is trying to normalize how far the wheel was spun (or trackpad
         *     dragged).  This is super useful for zoom support where you want to
         *     throw away the chunky scroll steps on the PC and make those equal to
         *     the slow and smooth tiny steps on the Mac. Key data: This code tries to
         *     resolve a single slow step on a wheel to 1.
         *
         *   - pixel is normalizing the desired scroll delta in pixel units.  You'll
         *     get the crazy differences between browsers, but at least it'll be in
         *     pixels!
         *
         *   - positive value indicates scrolling DOWN/RIGHT, negative UP/LEFT.  This
         *     should translate to positive value zooming IN, negative zooming OUT.
         *     This matches the newer 'wheel' event.
         *
         * Why are there spinX, spinY (or pixels)?
         *
         *   - spinX is a 2-finger side drag on the trackpad, and a shift + wheel turn
         *     with a mouse.  It results in side-scrolling in the browser by default.
         *
         *   - spinY is what you expect -- it's the classic axis of a mouse wheel.
         *
         *   - I dropped spinZ/pixelZ.  It is supported by the DOM 3 'wheel' event and
         *     probably is by browsers in conjunction with fancy 3D controllers .. but
         *     you know.
         *
         * Implementation info:
         *
         * Examples of 'wheel' event if you scroll slowly (down) by one step with an
         * average mouse:
         *
         *   OS X + Chrome  (mouse)     -    4   pixel delta  (wheelDelta -120)
         *   OS X + Safari  (mouse)     -  N/A   pixel delta  (wheelDelta  -12)
         *   OS X + Firefox (mouse)     -    0.1 line  delta  (wheelDelta  N/A)
         *   Win8 + Chrome  (mouse)     -  100   pixel delta  (wheelDelta -120)
         *   Win8 + Firefox (mouse)     -    3   line  delta  (wheelDelta -120)
         *
         * On the trackpad:
         *
         *   OS X + Chrome  (trackpad)  -    2   pixel delta  (wheelDelta   -6)
         *   OS X + Firefox (trackpad)  -    1   pixel delta  (wheelDelta  N/A)
         *
         * On other/older browsers.. it's more complicated as there can be multiple and
         * also missing delta values.
         *
         * The 'wheel' event is more standard:
         *
         * http://www.w3.org/TR/DOM-Level-3-Events/#events-wheelevents
         *
         * The basics is that it includes a unit, deltaMode (pixels, lines, pages), and
         * deltaX, deltaY and deltaZ.  Some browsers provide other values to maintain
         * backward compatibility with older events.  Those other values help us
         * better normalize spin speed.  Example of what the browsers provide:
         *
         *                          | event.wheelDelta | event.detail
         *        ------------------+------------------+--------------
         *          Safari v5/OS X  |       -120       |       0
         *          Safari v5/Win7  |       -120       |       0
         *         Chrome v17/OS X  |       -120       |       0
         *         Chrome v17/Win7  |       -120       |       0
         *                IE9/Win7  |       -120       |   undefined
         *         Firefox v4/OS X  |     undefined    |       1
         *         Firefox v4/Win7  |     undefined    |       3
         *
         */
        function normalizeWheel( /*object*/ event ) /*object*/ {
            // Reasonable defaults
            var PIXEL_STEP = 10;
            var LINE_HEIGHT = 40;
            var PAGE_HEIGHT = 800;
        
            var sX = 0, sY = 0,       // spinX, spinY
                pX = 0, pY = 0;       // pixelX, pixelY
        
            // Legacy
            if( 'detail' in event ) {
                sY = event.detail;
            }
            if( 'wheelDelta' in event ) {
                sY = -event.wheelDelta / 120;
            }
            if( 'wheelDeltaY' in event ) {
                sY = -event.wheelDeltaY / 120;
            }
            if( 'wheelDeltaX' in event ) {
                sX = -event.wheelDeltaX / 120;
            }
        
            // side scrolling on FF with DOMMouseScroll
            if( 'axis' in event && event.axis === event.HORIZONTAL_AXIS ) {
                sX = sY;
                sY = 0;
            }
        
            pX = sX * PIXEL_STEP;
            pY = sY * PIXEL_STEP;
        
            if( 'deltaY' in event ) {
                pY = event.deltaY;
            }
            if( 'deltaX' in event ) {
                pX = event.deltaX;
            }
        
            if( (pX || pY) && event.deltaMode ) {
                if( event.deltaMode === 1 ) {          // delta in LINE units
                    pX *= LINE_HEIGHT;
                    pY *= LINE_HEIGHT;
                } else {                             // delta in PAGE units
                    pX *= PAGE_HEIGHT;
                    pY *= PAGE_HEIGHT;
                }
            }
        
            // Fall-back if spin cannot be determined
            if( pX && !sX ) {
                sX = (pX < 1) ? -1 : 1;
            }
            if( pY && !sY ) {
                sY = (pY < 1) ? -1 : 1;
            }
        
            return {
                spinX: sX,
                spinY: sY,
                pixelX: pX,
                pixelY: pY
            };
        }
        if (s.params.mousewheelControl) {
            /**
             * The best combination if you prefer spinX + spinY normalization.  It favors
             * the older DOMMouseScroll for Firefox, as FF does not include wheelDelta with
             * 'wheel' event, making spin speed determination impossible.
             */
            s.mousewheel.event = (navigator.userAgent.indexOf('firefox') > -1) ?
                'DOMMouseScroll' :
                isEventSupported() ?
                    'wheel' : 'mousewheel';
        }
        function handleMousewheel(e) {
            if (e.originalEvent) e = e.originalEvent; //jquery fix
            var delta = 0;
            var rtlFactor = s.rtl ? -1 : 1;
        
            var data = normalizeWheel( e );
        
            if (s.params.mousewheelForceToAxis) {
                if (s.isHorizontal()) {
                    if (Math.abs(data.pixelX) > Math.abs(data.pixelY)) delta = data.pixelX * rtlFactor;
                    else return;
                }
                else {
                    if (Math.abs(data.pixelY) > Math.abs(data.pixelX)) delta = data.pixelY;
                    else return;
                }
            }
            else {
                delta = Math.abs(data.pixelX) > Math.abs(data.pixelY) ? - data.pixelX * rtlFactor : - data.pixelY;
            }
        
            if (delta === 0) return;
        
            if (s.params.mousewheelInvert) delta = -delta;
        
            if (!s.params.freeMode) {
                if ((new window.Date()).getTime() - s.mousewheel.lastScrollTime > 60) {
                    if (delta < 0) {
                        if ((!s.isEnd || s.params.loop) && !s.animating) {
                            s.slideNext();
                            s.emit('onScroll', s, e);
                        }
                        else if (s.params.mousewheelReleaseOnEdges) return true;
                    }
                    else {
                        if ((!s.isBeginning || s.params.loop) && !s.animating) {
                            s.slidePrev();
                            s.emit('onScroll', s, e);
                        }
                        else if (s.params.mousewheelReleaseOnEdges) return true;
                    }
                }
                s.mousewheel.lastScrollTime = (new window.Date()).getTime();
        
            }
            else {
                //Freemode or scrollContainer:
                var position = s.getWrapperTranslate() + delta * s.params.mousewheelSensitivity;
                var wasBeginning = s.isBeginning,
                    wasEnd = s.isEnd;
        
                if (position >= s.minTranslate()) position = s.minTranslate();
                if (position <= s.maxTranslate()) position = s.maxTranslate();
        
                s.setWrapperTransition(0);
                s.setWrapperTranslate(position);
                s.updateProgress();
                s.updateActiveIndex();
        
                if (!wasBeginning && s.isBeginning || !wasEnd && s.isEnd) {
                    s.updateClasses();
                }
        
                if (s.params.freeModeSticky) {
                    clearTimeout(s.mousewheel.timeout);
                    s.mousewheel.timeout = setTimeout(function () {
                        s.slideReset();
                    }, 300);
                }
                else {
                    if (s.params.lazyLoading && s.lazy) {
                        s.lazy.load();
                    }
                }
                // Emit event
                s.emit('onScroll', s, e);
        
                // Stop autoplay
                if (s.params.autoplay && s.params.autoplayDisableOnInteraction) s.stopAutoplay();
        
                // Return page scroll on edge positions
                if (position === 0 || position === s.maxTranslate()) return;
            }
        
            if (e.preventDefault) e.preventDefault();
            else e.returnValue = false;
            return false;
        }
        s.disableMousewheelControl = function () {
            if (!s.mousewheel.event) return false;
            var target = s.container;
            if (s.params.mousewheelEventsTarged !== 'container') {
                target = $(s.params.mousewheelEventsTarged);
            }
            target.off(s.mousewheel.event, handleMousewheel);
            s.params.mousewheelControl = false;
            return true;
        };
        
        s.enableMousewheelControl = function () {
            if (!s.mousewheel.event) return false;
            var target = s.container;
            if (s.params.mousewheelEventsTarged !== 'container') {
                target = $(s.params.mousewheelEventsTarged);
            }
            target.on(s.mousewheel.event, handleMousewheel);
            s.params.mousewheelControl = true;
            return true;
        };
        

        /*=========================
          Parallax
          ===========================*/
        function setParallaxTransform(el, progress) {
            el = $(el);
            var p, pX, pY;
            var rtlFactor = s.rtl ? -1 : 1;
        
            p = el.attr('data-swiper-parallax') || '0';
            pX = el.attr('data-swiper-parallax-x');
            pY = el.attr('data-swiper-parallax-y');
            if (pX || pY) {
                pX = pX || '0';
                pY = pY || '0';
            }
            else {
                if (s.isHorizontal()) {
                    pX = p;
                    pY = '0';
                }
                else {
                    pY = p;
                    pX = '0';
                }
            }
        
            if ((pX).indexOf('%') >= 0) {
                pX = parseInt(pX, 10) * progress * rtlFactor + '%';
            }
            else {
                pX = pX * progress * rtlFactor + 'px' ;
            }
            if ((pY).indexOf('%') >= 0) {
                pY = parseInt(pY, 10) * progress + '%';
            }
            else {
                pY = pY * progress + 'px' ;
            }
        
            el.transform('translate3d(' + pX + ', ' + pY + ',0px)');
        }
        s.parallax = {
            setTranslate: function () {
                s.container.children('[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]').each(function(){
                    setParallaxTransform(this, s.progress);
        
                });
                s.slides.each(function () {
                    var slide = $(this);
                    slide.find('[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]').each(function () {
                        var progress = Math.min(Math.max(slide[0].progress, -1), 1);
                        setParallaxTransform(this, progress);
                    });
                });
            },
            setTransition: function (duration) {
                if (typeof duration === 'undefined') duration = s.params.speed;
                s.container.find('[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]').each(function(){
                    var el = $(this);
                    var parallaxDuration = parseInt(el.attr('data-swiper-parallax-duration'), 10) || duration;
                    if (duration === 0) parallaxDuration = 0;
                    el.transition(parallaxDuration);
                });
            }
        };
        

        /*=========================
          Zoom
          ===========================*/
        s.zoom = {
            // "Global" Props
            scale: 1,
            currentScale: 1,
            isScaling: false,
            gesture: {
                slide: undefined,
                slideWidth: undefined,
                slideHeight: undefined,
                image: undefined,
                imageWrap: undefined,
                zoomMax: s.params.zoomMax
            },
            image: {
                isTouched: undefined,
                isMoved: undefined,
                currentX: undefined,
                currentY: undefined,
                minX: undefined,
                minY: undefined,
                maxX: undefined,
                maxY: undefined,
                width: undefined,
                height: undefined,
                startX: undefined,
                startY: undefined,
                touchesStart: {},
                touchesCurrent: {}
            },
            velocity: {
                x: undefined,
                y: undefined,
                prevPositionX: undefined,
                prevPositionY: undefined,
                prevTime: undefined
            },
            // Calc Scale From Multi-touches
            getDistanceBetweenTouches: function (e) {
                if (e.targetTouches.length < 2) return 1;
                var x1 = e.targetTouches[0].pageX,
                    y1 = e.targetTouches[0].pageY,
                    x2 = e.targetTouches[1].pageX,
                    y2 = e.targetTouches[1].pageY;
                var distance = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
                return distance;
            },
            // Events
            onGestureStart: function (e) {
                var z = s.zoom;
                if (!s.support.gestures) {
                    if (e.type !== 'touchstart' || e.type === 'touchstart' && e.targetTouches.length < 2) {
                        return;
                    }
                    z.gesture.scaleStart = z.getDistanceBetweenTouches(e);
                }
                if (!z.gesture.slide || !z.gesture.slide.length) {
                    z.gesture.slide = $(this);
                    if (z.gesture.slide.length === 0) z.gesture.slide = s.slides.eq(s.activeIndex);
                    z.gesture.image = z.gesture.slide.find('img, svg, canvas');
                    z.gesture.imageWrap = z.gesture.image.parent('.' + s.params.zoomContainerClass);
                    z.gesture.zoomMax = z.gesture.imageWrap.attr('data-swiper-zoom') || s.params.zoomMax ;
                    if (z.gesture.imageWrap.length === 0) {
                        z.gesture.image = undefined;
                        return;
                    }
                }
                z.gesture.image.transition(0);
                z.isScaling = true;
            },
            onGestureChange: function (e) {
                var z = s.zoom;
                if (!s.support.gestures) {
                    if (e.type !== 'touchmove' || e.type === 'touchmove' && e.targetTouches.length < 2) {
                        return;
                    }
                    z.gesture.scaleMove = z.getDistanceBetweenTouches(e);
                }
                if (!z.gesture.image || z.gesture.image.length === 0) return;
                if (s.support.gestures) {
                    z.scale = e.scale * z.currentScale;
                }
                else {
                    z.scale = (z.gesture.scaleMove / z.gesture.scaleStart) * z.currentScale;
                }
                if (z.scale > z.gesture.zoomMax) {
                    z.scale = z.gesture.zoomMax - 1 + Math.pow((z.scale - z.gesture.zoomMax + 1), 0.5);
                }
                if (z.scale < s.params.zoomMin) {
                    z.scale =  s.params.zoomMin + 1 - Math.pow((s.params.zoomMin - z.scale + 1), 0.5);
                }
                z.gesture.image.transform('translate3d(0,0,0) scale(' + z.scale + ')');
            },
            onGestureEnd: function (e) {
                var z = s.zoom;
                if (!s.support.gestures) {
                    if (e.type !== 'touchend' || e.type === 'touchend' && e.changedTouches.length < 2) {
                        return;
                    }
                }
                if (!z.gesture.image || z.gesture.image.length === 0) return;
                z.scale = Math.max(Math.min(z.scale, z.gesture.zoomMax), s.params.zoomMin);
                z.gesture.image.transition(s.params.speed).transform('translate3d(0,0,0) scale(' + z.scale + ')');
                z.currentScale = z.scale;
                z.isScaling = false;
                if (z.scale === 1) z.gesture.slide = undefined;
            },
            onTouchStart: function (s, e) {
                var z = s.zoom;
                if (!z.gesture.image || z.gesture.image.length === 0) return;
                if (z.image.isTouched) return;
                if (s.device.os === 'android') e.preventDefault();
                z.image.isTouched = true;
                z.image.touchesStart.x = e.type === 'touchstart' ? e.targetTouches[0].pageX : e.pageX;
                z.image.touchesStart.y = e.type === 'touchstart' ? e.targetTouches[0].pageY : e.pageY;
            },
            onTouchMove: function (e) {
                var z = s.zoom;
                if (!z.gesture.image || z.gesture.image.length === 0) return;
                s.allowClick = false;
                if (!z.image.isTouched || !z.gesture.slide) return;
        
                if (!z.image.isMoved) {
                    z.image.width = z.gesture.image[0].offsetWidth;
                    z.image.height = z.gesture.image[0].offsetHeight;
                    z.image.startX = s.getTranslate(z.gesture.imageWrap[0], 'x') || 0;
                    z.image.startY = s.getTranslate(z.gesture.imageWrap[0], 'y') || 0;
                    z.gesture.slideWidth = z.gesture.slide[0].offsetWidth;
                    z.gesture.slideHeight = z.gesture.slide[0].offsetHeight;
                    z.gesture.imageWrap.transition(0);
                    if (s.rtl) z.image.startX = -z.image.startX;
                    if (s.rtl) z.image.startY = -z.image.startY;
                }
                // Define if we need image drag
                var scaledWidth = z.image.width * z.scale;
                var scaledHeight = z.image.height * z.scale;
        
                if (scaledWidth < z.gesture.slideWidth && scaledHeight < z.gesture.slideHeight) return;
        
                z.image.minX = Math.min((z.gesture.slideWidth / 2 - scaledWidth / 2), 0);
                z.image.maxX = -z.image.minX;
                z.image.minY = Math.min((z.gesture.slideHeight / 2 - scaledHeight / 2), 0);
                z.image.maxY = -z.image.minY;
        
                z.image.touchesCurrent.x = e.type === 'touchmove' ? e.targetTouches[0].pageX : e.pageX;
                z.image.touchesCurrent.y = e.type === 'touchmove' ? e.targetTouches[0].pageY : e.pageY;
        
                if (!z.image.isMoved && !z.isScaling) {
                    if (s.isHorizontal() &&
                        (Math.floor(z.image.minX) === Math.floor(z.image.startX) && z.image.touchesCurrent.x < z.image.touchesStart.x) ||
                        (Math.floor(z.image.maxX) === Math.floor(z.image.startX) && z.image.touchesCurrent.x > z.image.touchesStart.x)
                        ) {
                        z.image.isTouched = false;
                        return;
                    }
                    else if (!s.isHorizontal() &&
                        (Math.floor(z.image.minY) === Math.floor(z.image.startY) && z.image.touchesCurrent.y < z.image.touchesStart.y) ||
                        (Math.floor(z.image.maxY) === Math.floor(z.image.startY) && z.image.touchesCurrent.y > z.image.touchesStart.y)
                        ) {
                        z.image.isTouched = false;
                        return;
                    }
                }
                e.preventDefault();
                e.stopPropagation();
        
                z.image.isMoved = true;
                z.image.currentX = z.image.touchesCurrent.x - z.image.touchesStart.x + z.image.startX;
                z.image.currentY = z.image.touchesCurrent.y - z.image.touchesStart.y + z.image.startY;
        
                if (z.image.currentX < z.image.minX) {
                    z.image.currentX =  z.image.minX + 1 - Math.pow((z.image.minX - z.image.currentX + 1), 0.8);
                }
                if (z.image.currentX > z.image.maxX) {
                    z.image.currentX = z.image.maxX - 1 + Math.pow((z.image.currentX - z.image.maxX + 1), 0.8);
                }
        
                if (z.image.currentY < z.image.minY) {
                    z.image.currentY =  z.image.minY + 1 - Math.pow((z.image.minY - z.image.currentY + 1), 0.8);
                }
                if (z.image.currentY > z.image.maxY) {
                    z.image.currentY = z.image.maxY - 1 + Math.pow((z.image.currentY - z.image.maxY + 1), 0.8);
                }
        
                //Velocity
                if (!z.velocity.prevPositionX) z.velocity.prevPositionX = z.image.touchesCurrent.x;
                if (!z.velocity.prevPositionY) z.velocity.prevPositionY = z.image.touchesCurrent.y;
                if (!z.velocity.prevTime) z.velocity.prevTime = Date.now();
                z.velocity.x = (z.image.touchesCurrent.x - z.velocity.prevPositionX) / (Date.now() - z.velocity.prevTime) / 2;
                z.velocity.y = (z.image.touchesCurrent.y - z.velocity.prevPositionY) / (Date.now() - z.velocity.prevTime) / 2;
                if (Math.abs(z.image.touchesCurrent.x - z.velocity.prevPositionX) < 2) z.velocity.x = 0;
                if (Math.abs(z.image.touchesCurrent.y - z.velocity.prevPositionY) < 2) z.velocity.y = 0;
                z.velocity.prevPositionX = z.image.touchesCurrent.x;
                z.velocity.prevPositionY = z.image.touchesCurrent.y;
                z.velocity.prevTime = Date.now();
        
                z.gesture.imageWrap.transform('translate3d(' + z.image.currentX + 'px, ' + z.image.currentY + 'px,0)');
            },
            onTouchEnd: function (s, e) {
                var z = s.zoom;
                if (!z.gesture.image || z.gesture.image.length === 0) return;
                if (!z.image.isTouched || !z.image.isMoved) {
                    z.image.isTouched = false;
                    z.image.isMoved = false;
                    return;
                }
                z.image.isTouched = false;
                z.image.isMoved = false;
                var momentumDurationX = 300;
                var momentumDurationY = 300;
                var momentumDistanceX = z.velocity.x * momentumDurationX;
                var newPositionX = z.image.currentX + momentumDistanceX;
                var momentumDistanceY = z.velocity.y * momentumDurationY;
                var newPositionY = z.image.currentY + momentumDistanceY;
        
                //Fix duration
                if (z.velocity.x !== 0) momentumDurationX = Math.abs((newPositionX - z.image.currentX) / z.velocity.x);
                if (z.velocity.y !== 0) momentumDurationY = Math.abs((newPositionY - z.image.currentY) / z.velocity.y);
                var momentumDuration = Math.max(momentumDurationX, momentumDurationY);
        
                z.image.currentX = newPositionX;
                z.image.currentY = newPositionY;
        
                // Define if we need image drag
                var scaledWidth = z.image.width * z.scale;
                var scaledHeight = z.image.height * z.scale;
                z.image.minX = Math.min((z.gesture.slideWidth / 2 - scaledWidth / 2), 0);
                z.image.maxX = -z.image.minX;
                z.image.minY = Math.min((z.gesture.slideHeight / 2 - scaledHeight / 2), 0);
                z.image.maxY = -z.image.minY;
                z.image.currentX = Math.max(Math.min(z.image.currentX, z.image.maxX), z.image.minX);
                z.image.currentY = Math.max(Math.min(z.image.currentY, z.image.maxY), z.image.minY);
        
                z.gesture.imageWrap.transition(momentumDuration).transform('translate3d(' + z.image.currentX + 'px, ' + z.image.currentY + 'px,0)');
            },
            onTransitionEnd: function (s) {
                var z = s.zoom;
                if (z.gesture.slide && s.previousIndex !== s.activeIndex) {
                    z.gesture.image.transform('translate3d(0,0,0) scale(1)');
                    z.gesture.imageWrap.transform('translate3d(0,0,0)');
                    z.gesture.slide = z.gesture.image = z.gesture.imageWrap = undefined;
                    z.scale = z.currentScale = 1;
                }
            },
            // Toggle Zoom
            toggleZoom: function (s, e) {
                var z = s.zoom;
                if (!z.gesture.slide) {
                    z.gesture.slide = s.clickedSlide ? $(s.clickedSlide) : s.slides.eq(s.activeIndex);
                    z.gesture.image = z.gesture.slide.find('img, svg, canvas');
                    z.gesture.imageWrap = z.gesture.image.parent('.' + s.params.zoomContainerClass);
                }
                if (!z.gesture.image || z.gesture.image.length === 0) return;
        
                var touchX, touchY, offsetX, offsetY, diffX, diffY, translateX, translateY, imageWidth, imageHeight, scaledWidth, scaledHeight, translateMinX, translateMinY, translateMaxX, translateMaxY, slideWidth, slideHeight;
        
                if (typeof z.image.touchesStart.x === 'undefined' && e) {
                    touchX = e.type === 'touchend' ? e.changedTouches[0].pageX : e.pageX;
                    touchY = e.type === 'touchend' ? e.changedTouches[0].pageY : e.pageY;
                }
                else {
                    touchX = z.image.touchesStart.x;
                    touchY = z.image.touchesStart.y;
                }
        
                if (z.scale && z.scale !== 1) {
                    // Zoom Out
                    z.scale = z.currentScale = 1;
                    z.gesture.imageWrap.transition(300).transform('translate3d(0,0,0)');
                    z.gesture.image.transition(300).transform('translate3d(0,0,0) scale(1)');
                    z.gesture.slide = undefined;
                }
                else {
                    // Zoom In
                    z.scale = z.currentScale = z.gesture.imageWrap.attr('data-swiper-zoom') || s.params.zoomMax;
                    if (e) {
                        slideWidth = z.gesture.slide[0].offsetWidth;
                        slideHeight = z.gesture.slide[0].offsetHeight;
                        offsetX = z.gesture.slide.offset().left;
                        offsetY = z.gesture.slide.offset().top;
                        diffX = offsetX + slideWidth/2 - touchX;
                        diffY = offsetY + slideHeight/2 - touchY;
        
                        imageWidth = z.gesture.image[0].offsetWidth;
                        imageHeight = z.gesture.image[0].offsetHeight;
                        scaledWidth = imageWidth * z.scale;
                        scaledHeight = imageHeight * z.scale;
        
                        translateMinX = Math.min((slideWidth / 2 - scaledWidth / 2), 0);
                        translateMinY = Math.min((slideHeight / 2 - scaledHeight / 2), 0);
                        translateMaxX = -translateMinX;
                        translateMaxY = -translateMinY;
        
                        translateX = diffX * z.scale;
                        translateY = diffY * z.scale;
        
                        if (translateX < translateMinX) {
                            translateX =  translateMinX;
                        }
                        if (translateX > translateMaxX) {
                            translateX = translateMaxX;
                        }
        
                        if (translateY < translateMinY) {
                            translateY =  translateMinY;
                        }
                        if (translateY > translateMaxY) {
                            translateY = translateMaxY;
                        }
                    }
                    else {
                        translateX = 0;
                        translateY = 0;
                    }
                    z.gesture.imageWrap.transition(300).transform('translate3d(' + translateX + 'px, ' + translateY + 'px,0)');
                    z.gesture.image.transition(300).transform('translate3d(0,0,0) scale(' + z.scale + ')');
                }
            },
            // Attach/Detach Events
            attachEvents: function (detach) {
                var action = detach ? 'off' : 'on';
        
                if (s.params.zoom) {
                    var target = s.slides;
                    var passiveListener = s.touchEvents.start === 'touchstart' && s.support.passiveListener && s.params.passiveListeners ? {passive: true, capture: false} : false;
                    // Scale image
                    if (s.support.gestures) {
                        s.slides[action]('gesturestart', s.zoom.onGestureStart, passiveListener);
                        s.slides[action]('gesturechange', s.zoom.onGestureChange, passiveListener);
                        s.slides[action]('gestureend', s.zoom.onGestureEnd, passiveListener);
                    }
                    else if (s.touchEvents.start === 'touchstart') {
                        s.slides[action](s.touchEvents.start, s.zoom.onGestureStart, passiveListener);
                        s.slides[action](s.touchEvents.move, s.zoom.onGestureChange, passiveListener);
                        s.slides[action](s.touchEvents.end, s.zoom.onGestureEnd, passiveListener);
                    }
        
                    // Move image
                    s[action]('touchStart', s.zoom.onTouchStart);
                    s.slides.each(function (index, slide){
                        if ($(slide).find('.' + s.params.zoomContainerClass).length > 0) {
                            $(slide)[action](s.touchEvents.move, s.zoom.onTouchMove);
                        }
                    });
                    s[action]('touchEnd', s.zoom.onTouchEnd);
        
                    // Scale Out
                    s[action]('transitionEnd', s.zoom.onTransitionEnd);
                    if (s.params.zoomToggle) {
                        s.on('doubleTap', s.zoom.toggleZoom);
                    }
                }
            },
            init: function () {
                s.zoom.attachEvents();
            },
            destroy: function () {
                s.zoom.attachEvents(true);
            }
        };
        

        /*=========================
          Plugins API. Collect all and init all plugins
          ===========================*/
        s._plugins = [];
        for (var plugin in s.plugins) {
            var p = s.plugins[plugin](s, s.params[plugin]);
            if (p) s._plugins.push(p);
        }
        // Method to call all plugins event/method
        s.callPlugins = function (eventName) {
            for (var i = 0; i < s._plugins.length; i++) {
                if (eventName in s._plugins[i]) {
                    s._plugins[i][eventName](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                }
            }
        };
        

        /*=========================
          Events/Callbacks/Plugins Emitter
          ===========================*/
        function normalizeEventName (eventName) {
            if (eventName.indexOf('on') !== 0) {
                if (eventName[0] !== eventName[0].toUpperCase()) {
                    eventName = 'on' + eventName[0].toUpperCase() + eventName.substring(1);
                }
                else {
                    eventName = 'on' + eventName;
                }
            }
            return eventName;
        }
        s.emitterEventListeners = {
        
        };
        s.emit = function (eventName) {
            // Trigger callbacks
            if (s.params[eventName]) {
                s.params[eventName](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
            }
            var i;
            // Trigger events
            if (s.emitterEventListeners[eventName]) {
                for (i = 0; i < s.emitterEventListeners[eventName].length; i++) {
                    s.emitterEventListeners[eventName][i](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                }
            }
            // Trigger plugins
            if (s.callPlugins) s.callPlugins(eventName, arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
        };
        s.on = function (eventName, handler) {
            eventName = normalizeEventName(eventName);
            if (!s.emitterEventListeners[eventName]) s.emitterEventListeners[eventName] = [];
            s.emitterEventListeners[eventName].push(handler);
            return s;
        };
        s.off = function (eventName, handler) {
            var i;
            eventName = normalizeEventName(eventName);
            if (typeof handler === 'undefined') {
                // Remove all handlers for such event
                s.emitterEventListeners[eventName] = [];
                return s;
            }
            if (!s.emitterEventListeners[eventName] || s.emitterEventListeners[eventName].length === 0) return;
            for (i = 0; i < s.emitterEventListeners[eventName].length; i++) {
                if(s.emitterEventListeners[eventName][i] === handler) s.emitterEventListeners[eventName].splice(i, 1);
            }
            return s;
        };
        s.once = function (eventName, handler) {
            eventName = normalizeEventName(eventName);
            var _handler = function () {
                handler(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4]);
                s.off(eventName, _handler);
            };
            s.on(eventName, _handler);
            return s;
        };
        

        // Accessibility tools
        s.a11y = {
            makeFocusable: function ($el) {
                $el.attr('tabIndex', '0');
                return $el;
            },
            addRole: function ($el, role) {
                $el.attr('role', role);
                return $el;
            },
        
            addLabel: function ($el, label) {
                $el.attr('aria-label', label);
                return $el;
            },
        
            disable: function ($el) {
                $el.attr('aria-disabled', true);
                return $el;
            },
        
            enable: function ($el) {
                $el.attr('aria-disabled', false);
                return $el;
            },
        
            onEnterKey: function (event) {
                if (event.keyCode !== 13) return;
                if ($(event.target).is(s.params.nextButton)) {
                    s.onClickNext(event);
                    if (s.isEnd) {
                        s.a11y.notify(s.params.lastSlideMessage);
                    }
                    else {
                        s.a11y.notify(s.params.nextSlideMessage);
                    }
                }
                else if ($(event.target).is(s.params.prevButton)) {
                    s.onClickPrev(event);
                    if (s.isBeginning) {
                        s.a11y.notify(s.params.firstSlideMessage);
                    }
                    else {
                        s.a11y.notify(s.params.prevSlideMessage);
                    }
                }
                if ($(event.target).is('.' + s.params.bulletClass)) {
                    $(event.target)[0].click();
                }
            },
        
            liveRegion: $('<span class="' + s.params.notificationClass + '" aria-live="assertive" aria-atomic="true"></span>'),
        
            notify: function (message) {
                var notification = s.a11y.liveRegion;
                if (notification.length === 0) return;
                notification.html('');
                notification.html(message);
            },
            init: function () {
                // Setup accessibility
                if (s.params.nextButton && s.nextButton && s.nextButton.length > 0) {
                    s.a11y.makeFocusable(s.nextButton);
                    s.a11y.addRole(s.nextButton, 'button');
                    s.a11y.addLabel(s.nextButton, s.params.nextSlideMessage);
                }
                if (s.params.prevButton && s.prevButton && s.prevButton.length > 0) {
                    s.a11y.makeFocusable(s.prevButton);
                    s.a11y.addRole(s.prevButton, 'button');
                    s.a11y.addLabel(s.prevButton, s.params.prevSlideMessage);
                }
        
                $(s.container).append(s.a11y.liveRegion);
            },
            initPagination: function () {
                if (s.params.pagination && s.params.paginationClickable && s.bullets && s.bullets.length) {
                    s.bullets.each(function () {
                        var bullet = $(this);
                        s.a11y.makeFocusable(bullet);
                        s.a11y.addRole(bullet, 'button');
                        s.a11y.addLabel(bullet, s.params.paginationBulletMessage.replace(/{{index}}/, bullet.index() + 1));
                    });
                }
            },
            destroy: function () {
                if (s.a11y.liveRegion && s.a11y.liveRegion.length > 0) s.a11y.liveRegion.remove();
            }
        };
        

        /*=========================
          Init/Destroy
          ===========================*/
        s.init = function () {
            if (s.params.loop) s.createLoop();
            s.updateContainerSize();
            s.updateSlidesSize();
            s.updatePagination();
            if (s.params.scrollbar && s.scrollbar) {
                s.scrollbar.set();
                if (s.params.scrollbarDraggable) {
                    s.scrollbar.enableDraggable();
                }
            }
            if (s.params.effect !== 'slide' && s.effects[s.params.effect]) {
                if (!s.params.loop) s.updateProgress();
                s.effects[s.params.effect].setTranslate();
            }
            if (s.params.loop) {
                s.slideTo(s.params.initialSlide + s.loopedSlides, 0, s.params.runCallbacksOnInit);
            }
            else {
                s.slideTo(s.params.initialSlide, 0, s.params.runCallbacksOnInit);
                if (s.params.initialSlide === 0) {
                    if (s.parallax && s.params.parallax) s.parallax.setTranslate();
                    if (s.lazy && s.params.lazyLoading) {
                        s.lazy.load();
                        s.lazy.initialImageLoaded = true;
                    }
                }
            }
            s.attachEvents();
            if (s.params.observer && s.support.observer) {
                s.initObservers();
            }
            if (s.params.preloadImages && !s.params.lazyLoading) {
                s.preloadImages();
            }
            if (s.params.zoom && s.zoom) {
                s.zoom.init();
            }
            if (s.params.autoplay) {
                s.startAutoplay();
            }
            if (s.params.keyboardControl) {
                if (s.enableKeyboardControl) s.enableKeyboardControl();
            }
            if (s.params.mousewheelControl) {
                if (s.enableMousewheelControl) s.enableMousewheelControl();
            }
            // Deprecated hashnavReplaceState changed to replaceState for use in hashnav and history
            if (s.params.hashnavReplaceState) {
                s.params.replaceState = s.params.hashnavReplaceState;
            }
            if (s.params.history) {
                if (s.history) s.history.init();
            }
            if (s.params.hashnav) {
                if (s.hashnav) s.hashnav.init();
            }
            if (s.params.a11y && s.a11y) s.a11y.init();
            s.emit('onInit', s);
        };
        
        // Cleanup dynamic styles
        s.cleanupStyles = function () {
            // Container
            s.container.removeClass(s.classNames.join(' ')).removeAttr('style');
        
            // Wrapper
            s.wrapper.removeAttr('style');
        
            // Slides
            if (s.slides && s.slides.length) {
                s.slides
                    .removeClass([
                      s.params.slideVisibleClass,
                      s.params.slideActiveClass,
                      s.params.slideNextClass,
                      s.params.slidePrevClass
                    ].join(' '))
                    .removeAttr('style')
                    .removeAttr('data-swiper-column')
                    .removeAttr('data-swiper-row');
            }
        
            // Pagination/Bullets
            if (s.paginationContainer && s.paginationContainer.length) {
                s.paginationContainer.removeClass(s.params.paginationHiddenClass);
            }
            if (s.bullets && s.bullets.length) {
                s.bullets.removeClass(s.params.bulletActiveClass);
            }
        
            // Buttons
            if (s.params.prevButton) $(s.params.prevButton).removeClass(s.params.buttonDisabledClass);
            if (s.params.nextButton) $(s.params.nextButton).removeClass(s.params.buttonDisabledClass);
        
            // Scrollbar
            if (s.params.scrollbar && s.scrollbar) {
                if (s.scrollbar.track && s.scrollbar.track.length) s.scrollbar.track.removeAttr('style');
                if (s.scrollbar.drag && s.scrollbar.drag.length) s.scrollbar.drag.removeAttr('style');
            }
        };
        
        // Destroy
        s.destroy = function (deleteInstance, cleanupStyles) {
            // Detach evebts
            s.detachEvents();
            // Stop autoplay
            s.stopAutoplay();
            // Disable draggable
            if (s.params.scrollbar && s.scrollbar) {
                if (s.params.scrollbarDraggable) {
                    s.scrollbar.disableDraggable();
                }
            }
            // Destroy loop
            if (s.params.loop) {
                s.destroyLoop();
            }
            // Cleanup styles
            if (cleanupStyles) {
                s.cleanupStyles();
            }
            // Disconnect observer
            s.disconnectObservers();
        
            // Destroy zoom
            if (s.params.zoom && s.zoom) {
                s.zoom.destroy();
            }
            // Disable keyboard/mousewheel
            if (s.params.keyboardControl) {
                if (s.disableKeyboardControl) s.disableKeyboardControl();
            }
            if (s.params.mousewheelControl) {
                if (s.disableMousewheelControl) s.disableMousewheelControl();
            }
            // Disable a11y
            if (s.params.a11y && s.a11y) s.a11y.destroy();
            // Delete history popstate
            if (s.params.history && !s.params.replaceState) {
                window.removeEventListener('popstate', s.history.setHistoryPopState);
            }
            if (s.params.hashnav && s.hashnav)  {
                s.hashnav.destroy();
            }
            // Destroy callback
            s.emit('onDestroy');
            // Delete instance
            if (deleteInstance !== false) s = null;
        };
        
        s.init();
        

    
        // Return swiper instance
        return s;
    };
    

    /*==================================================
        Prototype
    ====================================================*/
    Swiper.prototype = {
        isSafari: (function () {
            var ua = window.navigator.userAgent.toLowerCase();
            return (ua.indexOf('safari') >= 0 && ua.indexOf('chrome') < 0 && ua.indexOf('android') < 0);
        })(),
        isUiWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(window.navigator.userAgent),
        isArray: function (arr) {
            return Object.prototype.toString.apply(arr) === '[object Array]';
        },
        /*==================================================
        Browser
        ====================================================*/
        browser: {
            ie: window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
            ieTouch: (window.navigator.msPointerEnabled && window.navigator.msMaxTouchPoints > 1) || (window.navigator.pointerEnabled && window.navigator.maxTouchPoints > 1),
            lteIE9: (function() {
                // create temporary DIV
                var div = document.createElement('div');
                // add content to tmp DIV which is wrapped into the IE HTML conditional statement
                div.innerHTML = '<!--[if lte IE 9]><i></i><![endif]-->';
                // return true / false value based on what will browser render
                return div.getElementsByTagName('i').length === 1;
            })()
        },
        /*==================================================
        Devices
        ====================================================*/
        device: (function () {
            var ua = window.navigator.userAgent;
            var android = ua.match(/(Android);?[\s\/]+([\d.]+)?/);
            var ipad = ua.match(/(iPad).*OS\s([\d_]+)/);
            var ipod = ua.match(/(iPod)(.*OS\s([\d_]+))?/);
            var iphone = !ipad && ua.match(/(iPhone\sOS|iOS)\s([\d_]+)/);
            return {
                ios: ipad || iphone || ipod,
                android: android
            };
        })(),
        /*==================================================
        Feature Detection
        ====================================================*/
        support: {
            touch : (window.Modernizr && Modernizr.touch === true) || (function () {
                return !!(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch);
            })(),
    
            transforms3d : (window.Modernizr && Modernizr.csstransforms3d === true) || (function () {
                var div = document.createElement('div').style;
                return ('webkitPerspective' in div || 'MozPerspective' in div || 'OPerspective' in div || 'MsPerspective' in div || 'perspective' in div);
            })(),
    
            flexbox: (function () {
                var div = document.createElement('div').style;
                var styles = ('alignItems webkitAlignItems webkitBoxAlign msFlexAlign mozBoxAlign webkitFlexDirection msFlexDirection mozBoxDirection mozBoxOrient webkitBoxDirection webkitBoxOrient').split(' ');
                for (var i = 0; i < styles.length; i++) {
                    if (styles[i] in div) return true;
                }
            })(),
    
            observer: (function () {
                return ('MutationObserver' in window || 'WebkitMutationObserver' in window);
            })(),
    
            passiveListener: (function () {
                var supportsPassive = false;
                try {
                    var opts = Object.defineProperty({}, 'passive', {
                        get: function() {
                            supportsPassive = true;
                        }
                    });
                    window.addEventListener('testPassiveListener', null, opts);
                } catch (e) {}
                return supportsPassive;
            })(),
    
            gestures: (function () {
                return 'ongesturestart' in window;
            })()
        },
        /*==================================================
        Plugins
        ====================================================*/
        plugins: {}
    };
    

    /*===========================
    Dom7 Library
    ===========================*/
    var Dom7 = (function () {
        var Dom7 = function (arr) {
            var _this = this, i = 0;
            // Create array-like object
            for (i = 0; i < arr.length; i++) {
                _this[i] = arr[i];
            }
            _this.length = arr.length;
            // Return collection with methods
            return this;
        };
        var $ = function (selector, context) {
            var arr = [], i = 0;
            if (selector && !context) {
                if (selector instanceof Dom7) {
                    return selector;
                }
            }
            if (selector) {
                // String
                if (typeof selector === 'string') {
                    var els, tempParent, html = selector.trim();
                    if (html.indexOf('<') >= 0 && html.indexOf('>') >= 0) {
                        var toCreate = 'div';
                        if (html.indexOf('<li') === 0) toCreate = 'ul';
                        if (html.indexOf('<tr') === 0) toCreate = 'tbody';
                        if (html.indexOf('<td') === 0 || html.indexOf('<th') === 0) toCreate = 'tr';
                        if (html.indexOf('<tbody') === 0) toCreate = 'table';
                        if (html.indexOf('<option') === 0) toCreate = 'select';
                        tempParent = document.createElement(toCreate);
                        tempParent.innerHTML = selector;
                        for (i = 0; i < tempParent.childNodes.length; i++) {
                            arr.push(tempParent.childNodes[i]);
                        }
                    }
                    else {
                        if (!context && selector[0] === '#' && !selector.match(/[ .<>:~]/)) {
                            // Pure ID selector
                            els = [document.getElementById(selector.split('#')[1])];
                        }
                        else {
                            // Other selectors
                            els = (context || document).querySelectorAll(selector);
                        }
                        for (i = 0; i < els.length; i++) {
                            if (els[i]) arr.push(els[i]);
                        }
                    }
                }
                // Node/element
                else if (selector.nodeType || selector === window || selector === document) {
                    arr.push(selector);
                }
                //Array of elements or instance of Dom
                else if (selector.length > 0 && selector[0].nodeType) {
                    for (i = 0; i < selector.length; i++) {
                        arr.push(selector[i]);
                    }
                }
            }
            return new Dom7(arr);
        };
        Dom7.prototype = {
            // Classes and attriutes
            addClass: function (className) {
                if (typeof className === 'undefined') {
                    return this;
                }
                var classes = className.split(' ');
                for (var i = 0; i < classes.length; i++) {
                    for (var j = 0; j < this.length; j++) {
                        this[j].classList.add(classes[i]);
                    }
                }
                return this;
            },
            removeClass: function (className) {
                var classes = className.split(' ');
                for (var i = 0; i < classes.length; i++) {
                    for (var j = 0; j < this.length; j++) {
                        this[j].classList.remove(classes[i]);
                    }
                }
                return this;
            },
            hasClass: function (className) {
                if (!this[0]) return false;
                else return this[0].classList.contains(className);
            },
            toggleClass: function (className) {
                var classes = className.split(' ');
                for (var i = 0; i < classes.length; i++) {
                    for (var j = 0; j < this.length; j++) {
                        this[j].classList.toggle(classes[i]);
                    }
                }
                return this;
            },
            attr: function (attrs, value) {
                if (arguments.length === 1 && typeof attrs === 'string') {
                    // Get attr
                    if (this[0]) return this[0].getAttribute(attrs);
                    else return undefined;
                }
                else {
                    // Set attrs
                    for (var i = 0; i < this.length; i++) {
                        if (arguments.length === 2) {
                            // String
                            this[i].setAttribute(attrs, value);
                        }
                        else {
                            // Object
                            for (var attrName in attrs) {
                                this[i][attrName] = attrs[attrName];
                                this[i].setAttribute(attrName, attrs[attrName]);
                            }
                        }
                    }
                    return this;
                }
            },
            removeAttr: function (attr) {
                for (var i = 0; i < this.length; i++) {
                    this[i].removeAttribute(attr);
                }
                return this;
            },
            data: function (key, value) {
                if (typeof value === 'undefined') {
                    // Get value
                    if (this[0]) {
                        var dataKey = this[0].getAttribute('data-' + key);
                        if (dataKey) return dataKey;
                        else if (this[0].dom7ElementDataStorage && (key in this[0].dom7ElementDataStorage)) return this[0].dom7ElementDataStorage[key];
                        else return undefined;
                    }
                    else return undefined;
                }
                else {
                    // Set value
                    for (var i = 0; i < this.length; i++) {
                        var el = this[i];
                        if (!el.dom7ElementDataStorage) el.dom7ElementDataStorage = {};
                        el.dom7ElementDataStorage[key] = value;
                    }
                    return this;
                }
            },
            // Transforms
            transform : function (transform) {
                for (var i = 0; i < this.length; i++) {
                    var elStyle = this[i].style;
                    elStyle.webkitTransform = elStyle.MsTransform = elStyle.msTransform = elStyle.MozTransform = elStyle.OTransform = elStyle.transform = transform;
                }
                return this;
            },
            transition: function (duration) {
                if (typeof duration !== 'string') {
                    duration = duration + 'ms';
                }
                for (var i = 0; i < this.length; i++) {
                    var elStyle = this[i].style;
                    elStyle.webkitTransitionDuration = elStyle.MsTransitionDuration = elStyle.msTransitionDuration = elStyle.MozTransitionDuration = elStyle.OTransitionDuration = elStyle.transitionDuration = duration;
                }
                return this;
            },
            //Events
            on: function (eventName, targetSelector, listener, capture) {
                function handleLiveEvent(e) {
                    var target = e.target;
                    if ($(target).is(targetSelector)) listener.call(target, e);
                    else {
                        var parents = $(target).parents();
                        for (var k = 0; k < parents.length; k++) {
                            if ($(parents[k]).is(targetSelector)) listener.call(parents[k], e);
                        }
                    }
                }
                var events = eventName.split(' ');
                var i, j;
                for (i = 0; i < this.length; i++) {
                    if (typeof targetSelector === 'function' || targetSelector === false) {
                        // Usual events
                        if (typeof targetSelector === 'function') {
                            listener = arguments[1];
                            capture = arguments[2] || false;
                        }
                        for (j = 0; j < events.length; j++) {
                            this[i].addEventListener(events[j], listener, capture);
                        }
                    }
                    else {
                        //Live events
                        for (j = 0; j < events.length; j++) {
                            if (!this[i].dom7LiveListeners) this[i].dom7LiveListeners = [];
                            this[i].dom7LiveListeners.push({listener: listener, liveListener: handleLiveEvent});
                            this[i].addEventListener(events[j], handleLiveEvent, capture);
                        }
                    }
                }
    
                return this;
            },
            off: function (eventName, targetSelector, listener, capture) {
                var events = eventName.split(' ');
                for (var i = 0; i < events.length; i++) {
                    for (var j = 0; j < this.length; j++) {
                        if (typeof targetSelector === 'function' || targetSelector === false) {
                            // Usual events
                            if (typeof targetSelector === 'function') {
                                listener = arguments[1];
                                capture = arguments[2] || false;
                            }
                            this[j].removeEventListener(events[i], listener, capture);
                        }
                        else {
                            // Live event
                            if (this[j].dom7LiveListeners) {
                                for (var k = 0; k < this[j].dom7LiveListeners.length; k++) {
                                    if (this[j].dom7LiveListeners[k].listener === listener) {
                                        this[j].removeEventListener(events[i], this[j].dom7LiveListeners[k].liveListener, capture);
                                    }
                                }
                            }
                        }
                    }
                }
                return this;
            },
            once: function (eventName, targetSelector, listener, capture) {
                var dom = this;
                if (typeof targetSelector === 'function') {
                    targetSelector = false;
                    listener = arguments[1];
                    capture = arguments[2];
                }
                function proxy(e) {
                    listener(e);
                    dom.off(eventName, targetSelector, proxy, capture);
                }
                dom.on(eventName, targetSelector, proxy, capture);
            },
            trigger: function (eventName, eventData) {
                for (var i = 0; i < this.length; i++) {
                    var evt;
                    try {
                        evt = new window.CustomEvent(eventName, {detail: eventData, bubbles: true, cancelable: true});
                    }
                    catch (e) {
                        evt = document.createEvent('Event');
                        evt.initEvent(eventName, true, true);
                        evt.detail = eventData;
                    }
                    this[i].dispatchEvent(evt);
                }
                return this;
            },
            transitionEnd: function (callback) {
                var events = ['webkitTransitionEnd', 'transitionend', 'oTransitionEnd', 'MSTransitionEnd', 'msTransitionEnd'],
                    i, j, dom = this;
                function fireCallBack(e) {
                    /*jshint validthis:true */
                    if (e.target !== this) return;
                    callback.call(this, e);
                    for (i = 0; i < events.length; i++) {
                        dom.off(events[i], fireCallBack);
                    }
                }
                if (callback) {
                    for (i = 0; i < events.length; i++) {
                        dom.on(events[i], fireCallBack);
                    }
                }
                return this;
            },
            // Sizing/Styles
            width: function () {
                if (this[0] === window) {
                    return window.innerWidth;
                }
                else {
                    if (this.length > 0) {
                        return parseFloat(this.css('width'));
                    }
                    else {
                        return null;
                    }
                }
            },
            outerWidth: function (includeMargins) {
                if (this.length > 0) {
                    if (includeMargins)
                        return this[0].offsetWidth + parseFloat(this.css('margin-right')) + parseFloat(this.css('margin-left'));
                    else
                        return this[0].offsetWidth;
                }
                else return null;
            },
            height: function () {
                if (this[0] === window) {
                    return window.innerHeight;
                }
                else {
                    if (this.length > 0) {
                        return parseFloat(this.css('height'));
                    }
                    else {
                        return null;
                    }
                }
            },
            outerHeight: function (includeMargins) {
                if (this.length > 0) {
                    if (includeMargins)
                        return this[0].offsetHeight + parseFloat(this.css('margin-top')) + parseFloat(this.css('margin-bottom'));
                    else
                        return this[0].offsetHeight;
                }
                else return null;
            },
            offset: function () {
                if (this.length > 0) {
                    var el = this[0];
                    var box = el.getBoundingClientRect();
                    var body = document.body;
                    var clientTop  = el.clientTop  || body.clientTop  || 0;
                    var clientLeft = el.clientLeft || body.clientLeft || 0;
                    var scrollTop  = window.pageYOffset || el.scrollTop;
                    var scrollLeft = window.pageXOffset || el.scrollLeft;
                    return {
                        top: box.top  + scrollTop  - clientTop,
                        left: box.left + scrollLeft - clientLeft
                    };
                }
                else {
                    return null;
                }
            },
            css: function (props, value) {
                var i;
                if (arguments.length === 1) {
                    if (typeof props === 'string') {
                        if (this[0]) return window.getComputedStyle(this[0], null).getPropertyValue(props);
                    }
                    else {
                        for (i = 0; i < this.length; i++) {
                            for (var prop in props) {
                                this[i].style[prop] = props[prop];
                            }
                        }
                        return this;
                    }
                }
                if (arguments.length === 2 && typeof props === 'string') {
                    for (i = 0; i < this.length; i++) {
                        this[i].style[props] = value;
                    }
                    return this;
                }
                return this;
            },
    
            //Dom manipulation
            each: function (callback) {
                for (var i = 0; i < this.length; i++) {
                    callback.call(this[i], i, this[i]);
                }
                return this;
            },
            html: function (html) {
                if (typeof html === 'undefined') {
                    return this[0] ? this[0].innerHTML : undefined;
                }
                else {
                    for (var i = 0; i < this.length; i++) {
                        this[i].innerHTML = html;
                    }
                    return this;
                }
            },
            text: function (text) {
                if (typeof text === 'undefined') {
                    if (this[0]) {
                        return this[0].textContent.trim();
                    }
                    else return null;
                }
                else {
                    for (var i = 0; i < this.length; i++) {
                        this[i].textContent = text;
                    }
                    return this;
                }
            },
            is: function (selector) {
                if (!this[0]) return false;
                var compareWith, i;
                if (typeof selector === 'string') {
                    var el = this[0];
                    if (el === document) return selector === document;
                    if (el === window) return selector === window;
    
                    if (el.matches) return el.matches(selector);
                    else if (el.webkitMatchesSelector) return el.webkitMatchesSelector(selector);
                    else if (el.mozMatchesSelector) return el.mozMatchesSelector(selector);
                    else if (el.msMatchesSelector) return el.msMatchesSelector(selector);
                    else {
                        compareWith = $(selector);
                        for (i = 0; i < compareWith.length; i++) {
                            if (compareWith[i] === this[0]) return true;
                        }
                        return false;
                    }
                }
                else if (selector === document) return this[0] === document;
                else if (selector === window) return this[0] === window;
                else {
                    if (selector.nodeType || selector instanceof Dom7) {
                        compareWith = selector.nodeType ? [selector] : selector;
                        for (i = 0; i < compareWith.length; i++) {
                            if (compareWith[i] === this[0]) return true;
                        }
                        return false;
                    }
                    return false;
                }
    
            },
            index: function () {
                if (this[0]) {
                    var child = this[0];
                    var i = 0;
                    while ((child = child.previousSibling) !== null) {
                        if (child.nodeType === 1) i++;
                    }
                    return i;
                }
                else return undefined;
            },
            eq: function (index) {
                if (typeof index === 'undefined') return this;
                var length = this.length;
                var returnIndex;
                if (index > length - 1) {
                    return new Dom7([]);
                }
                if (index < 0) {
                    returnIndex = length + index;
                    if (returnIndex < 0) return new Dom7([]);
                    else return new Dom7([this[returnIndex]]);
                }
                return new Dom7([this[index]]);
            },
            append: function (newChild) {
                var i, j;
                for (i = 0; i < this.length; i++) {
                    if (typeof newChild === 'string') {
                        var tempDiv = document.createElement('div');
                        tempDiv.innerHTML = newChild;
                        while (tempDiv.firstChild) {
                            this[i].appendChild(tempDiv.firstChild);
                        }
                    }
                    else if (newChild instanceof Dom7) {
                        for (j = 0; j < newChild.length; j++) {
                            this[i].appendChild(newChild[j]);
                        }
                    }
                    else {
                        this[i].appendChild(newChild);
                    }
                }
                return this;
            },
            prepend: function (newChild) {
                var i, j;
                for (i = 0; i < this.length; i++) {
                    if (typeof newChild === 'string') {
                        var tempDiv = document.createElement('div');
                        tempDiv.innerHTML = newChild;
                        for (j = tempDiv.childNodes.length - 1; j >= 0; j--) {
                            this[i].insertBefore(tempDiv.childNodes[j], this[i].childNodes[0]);
                        }
                        // this[i].insertAdjacentHTML('afterbegin', newChild);
                    }
                    else if (newChild instanceof Dom7) {
                        for (j = 0; j < newChild.length; j++) {
                            this[i].insertBefore(newChild[j], this[i].childNodes[0]);
                        }
                    }
                    else {
                        this[i].insertBefore(newChild, this[i].childNodes[0]);
                    }
                }
                return this;
            },
            insertBefore: function (selector) {
                var before = $(selector);
                for (var i = 0; i < this.length; i++) {
                    if (before.length === 1) {
                        before[0].parentNode.insertBefore(this[i], before[0]);
                    }
                    else if (before.length > 1) {
                        for (var j = 0; j < before.length; j++) {
                            before[j].parentNode.insertBefore(this[i].cloneNode(true), before[j]);
                        }
                    }
                }
            },
            insertAfter: function (selector) {
                var after = $(selector);
                for (var i = 0; i < this.length; i++) {
                    if (after.length === 1) {
                        after[0].parentNode.insertBefore(this[i], after[0].nextSibling);
                    }
                    else if (after.length > 1) {
                        for (var j = 0; j < after.length; j++) {
                            after[j].parentNode.insertBefore(this[i].cloneNode(true), after[j].nextSibling);
                        }
                    }
                }
            },
            next: function (selector) {
                if (this.length > 0) {
                    if (selector) {
                        if (this[0].nextElementSibling && $(this[0].nextElementSibling).is(selector)) return new Dom7([this[0].nextElementSibling]);
                        else return new Dom7([]);
                    }
                    else {
                        if (this[0].nextElementSibling) return new Dom7([this[0].nextElementSibling]);
                        else return new Dom7([]);
                    }
                }
                else return new Dom7([]);
            },
            nextAll: function (selector) {
                var nextEls = [];
                var el = this[0];
                if (!el) return new Dom7([]);
                while (el.nextElementSibling) {
                    var next = el.nextElementSibling;
                    if (selector) {
                        if($(next).is(selector)) nextEls.push(next);
                    }
                    else nextEls.push(next);
                    el = next;
                }
                return new Dom7(nextEls);
            },
            prev: function (selector) {
                if (this.length > 0) {
                    if (selector) {
                        if (this[0].previousElementSibling && $(this[0].previousElementSibling).is(selector)) return new Dom7([this[0].previousElementSibling]);
                        else return new Dom7([]);
                    }
                    else {
                        if (this[0].previousElementSibling) return new Dom7([this[0].previousElementSibling]);
                        else return new Dom7([]);
                    }
                }
                else return new Dom7([]);
            },
            prevAll: function (selector) {
                var prevEls = [];
                var el = this[0];
                if (!el) return new Dom7([]);
                while (el.previousElementSibling) {
                    var prev = el.previousElementSibling;
                    if (selector) {
                        if($(prev).is(selector)) prevEls.push(prev);
                    }
                    else prevEls.push(prev);
                    el = prev;
                }
                return new Dom7(prevEls);
            },
            parent: function (selector) {
                var parents = [];
                for (var i = 0; i < this.length; i++) {
                    if (selector) {
                        if ($(this[i].parentNode).is(selector)) parents.push(this[i].parentNode);
                    }
                    else {
                        parents.push(this[i].parentNode);
                    }
                }
                return $($.unique(parents));
            },
            parents: function (selector) {
                var parents = [];
                for (var i = 0; i < this.length; i++) {
                    var parent = this[i].parentNode;
                    while (parent) {
                        if (selector) {
                            if ($(parent).is(selector)) parents.push(parent);
                        }
                        else {
                            parents.push(parent);
                        }
                        parent = parent.parentNode;
                    }
                }
                return $($.unique(parents));
            },
            find : function (selector) {
                var foundElements = [];
                for (var i = 0; i < this.length; i++) {
                    var found = this[i].querySelectorAll(selector);
                    for (var j = 0; j < found.length; j++) {
                        foundElements.push(found[j]);
                    }
                }
                return new Dom7(foundElements);
            },
            children: function (selector) {
                var children = [];
                for (var i = 0; i < this.length; i++) {
                    var childNodes = this[i].childNodes;
    
                    for (var j = 0; j < childNodes.length; j++) {
                        if (!selector) {
                            if (childNodes[j].nodeType === 1) children.push(childNodes[j]);
                        }
                        else {
                            if (childNodes[j].nodeType === 1 && $(childNodes[j]).is(selector)) children.push(childNodes[j]);
                        }
                    }
                }
                return new Dom7($.unique(children));
            },
            remove: function () {
                for (var i = 0; i < this.length; i++) {
                    if (this[i].parentNode) this[i].parentNode.removeChild(this[i]);
                }
                return this;
            },
            add: function () {
                var dom = this;
                var i, j;
                for (i = 0; i < arguments.length; i++) {
                    var toAdd = $(arguments[i]);
                    for (j = 0; j < toAdd.length; j++) {
                        dom[dom.length] = toAdd[j];
                        dom.length++;
                    }
                }
                return dom;
            }
        };
        $.fn = Dom7.prototype;
        $.unique = function (arr) {
            var unique = [];
            for (var i = 0; i < arr.length; i++) {
                if (unique.indexOf(arr[i]) === -1) unique.push(arr[i]);
            }
            return unique;
        };
    
        return $;
    })();
    

    /*===========================
     Get Dom libraries
     ===========================*/
    var swiperDomPlugins = ['jQuery', 'Zepto', 'Dom7'];
    for (var i = 0; i < swiperDomPlugins.length; i++) {
    	if (window[swiperDomPlugins[i]]) {
    		addLibraryPlugin(window[swiperDomPlugins[i]]);
    	}
    }
    // Required DOM Plugins
    var domLib;
    if (typeof Dom7 === 'undefined') {
    	domLib = window.Dom7 || window.Zepto || window.jQuery;
    }
    else {
    	domLib = Dom7;
    }
    

    /*===========================
    Add .swiper plugin from Dom libraries
    ===========================*/
    function addLibraryPlugin(lib) {
        lib.fn.swiper = function (params) {
            var firstInstance;
            lib(this).each(function () {
                var s = new Swiper(this, params);
                if (!firstInstance) firstInstance = s;
            });
            return firstInstance;
        };
    }
    
    if (domLib) {
        if (!('transitionEnd' in domLib.fn)) {
            domLib.fn.transitionEnd = function (callback) {
                var events = ['webkitTransitionEnd', 'transitionend', 'oTransitionEnd', 'MSTransitionEnd', 'msTransitionEnd'],
                    i, j, dom = this;
                function fireCallBack(e) {
                    /*jshint validthis:true */
                    if (e.target !== this) return;
                    callback.call(this, e);
                    for (i = 0; i < events.length; i++) {
                        dom.off(events[i], fireCallBack);
                    }
                }
                if (callback) {
                    for (i = 0; i < events.length; i++) {
                        dom.on(events[i], fireCallBack);
                    }
                }
                return this;
            };
        }
        if (!('transform' in domLib.fn)) {
            domLib.fn.transform = function (transform) {
                for (var i = 0; i < this.length; i++) {
                    var elStyle = this[i].style;
                    elStyle.webkitTransform = elStyle.MsTransform = elStyle.msTransform = elStyle.MozTransform = elStyle.OTransform = elStyle.transform = transform;
                }
                return this;
            };
        }
        if (!('transition' in domLib.fn)) {
            domLib.fn.transition = function (duration) {
                if (typeof duration !== 'string') {
                    duration = duration + 'ms';
                }
                for (var i = 0; i < this.length; i++) {
                    var elStyle = this[i].style;
                    elStyle.webkitTransitionDuration = elStyle.MsTransitionDuration = elStyle.msTransitionDuration = elStyle.MozTransitionDuration = elStyle.OTransitionDuration = elStyle.transitionDuration = duration;
                }
                return this;
            };
        }
        if (!('outerWidth' in domLib.fn)) {
            domLib.fn.outerWidth = function (includeMargins) {
                if (this.length > 0) {
                    if (includeMargins)
                        return this[0].offsetWidth + parseFloat(this.css('margin-right')) + parseFloat(this.css('margin-left'));
                    else
                        return this[0].offsetWidth;
                }
                else return null;
            };
        }
    }
    

    window.Swiper = Swiper;
})();

/*===========================
Swiper AMD Export
===========================*/
if (true)
{
    module.exports = window.Swiper;
}
else if (typeof define === 'function' && define.amd) {
    define([], function () {
        'use strict';
        return window.Swiper;
    });
}

//# sourceMappingURL=maps/swiper.js.map


/***/ }),

/***/ 11:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;
exports.PopupManager = undefined;

var _vue = __webpack_require__(4);

var _vue2 = _interopRequireDefault(_vue);

var _merge = __webpack_require__(21);

var _merge2 = _interopRequireDefault(_merge);

var _popupManager = __webpack_require__(32);

var _popupManager2 = _interopRequireDefault(_popupManager);

var _scrollbarWidth = __webpack_require__(24);

var _scrollbarWidth2 = _interopRequireDefault(_scrollbarWidth);

var _dom = __webpack_require__(5);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var idSeed = 1;

var scrollBarWidth = void 0;

var getDOM = function getDOM(dom) {
  if (dom.nodeType === 3) {
    dom = dom.nextElementSibling || dom.nextSibling;
    getDOM(dom);
  }
  return dom;
};

exports.default = {
  props: {
    visible: {
      type: Boolean,
      default: false
    },
    openDelay: {},
    closeDelay: {},
    zIndex: {},
    modal: {
      type: Boolean,
      default: false
    },
    modalFade: {
      type: Boolean,
      default: true
    },
    modalClass: {},
    modalAppendToBody: {
      type: Boolean,
      default: false
    },
    lockScroll: {
      type: Boolean,
      default: true
    },
    closeOnPressEscape: {
      type: Boolean,
      default: false
    },
    closeOnClickModal: {
      type: Boolean,
      default: false
    }
  },

  beforeMount: function beforeMount() {
    this._popupId = 'popup-' + idSeed++;
    _popupManager2.default.register(this._popupId, this);
  },
  beforeDestroy: function beforeDestroy() {
    _popupManager2.default.deregister(this._popupId);
    _popupManager2.default.closeModal(this._popupId);

    this.restoreBodyStyle();
  },
  data: function data() {
    return {
      opened: false,
      bodyPaddingRight: null,
      computedBodyPaddingRight: 0,
      withoutHiddenClass: true,
      rendered: false
    };
  },


  watch: {
    visible: function visible(val) {
      var _this = this;

      if (val) {
        if (this._opening) return;
        if (!this.rendered) {
          this.rendered = true;
          _vue2.default.nextTick(function () {
            _this.open();
          });
        } else {
          this.open();
        }
      } else {
        this.close();
      }
    }
  },

  methods: {
    open: function open(options) {
      var _this2 = this;

      if (!this.rendered) {
        this.rendered = true;
      }

      var props = (0, _merge2.default)({}, this.$props || this, options);

      if (this._closeTimer) {
        clearTimeout(this._closeTimer);
        this._closeTimer = null;
      }
      clearTimeout(this._openTimer);

      var openDelay = Number(props.openDelay);
      if (openDelay > 0) {
        this._openTimer = setTimeout(function () {
          _this2._openTimer = null;
          _this2.doOpen(props);
        }, openDelay);
      } else {
        this.doOpen(props);
      }
    },
    doOpen: function doOpen(props) {
      if (this.$isServer) return;
      if (this.willOpen && !this.willOpen()) return;
      if (this.opened) return;

      this._opening = true;

      var dom = getDOM(this.$el);

      var modal = props.modal;

      var zIndex = props.zIndex;
      if (zIndex) {
        _popupManager2.default.zIndex = zIndex;
      }

      if (modal) {
        if (this._closing) {
          _popupManager2.default.closeModal(this._popupId);
          this._closing = false;
        }
        _popupManager2.default.openModal(this._popupId, _popupManager2.default.nextZIndex(), this.modalAppendToBody ? undefined : dom, props.modalClass, props.modalFade);
        if (props.lockScroll) {
          this.withoutHiddenClass = !(0, _dom.hasClass)(document.body, 'el-popup-parent--hidden');
          if (this.withoutHiddenClass) {
            this.bodyPaddingRight = document.body.style.paddingRight;
            this.computedBodyPaddingRight = parseInt((0, _dom.getStyle)(document.body, 'paddingRight'), 10);
          }
          scrollBarWidth = (0, _scrollbarWidth2.default)();
          var bodyHasOverflow = document.documentElement.clientHeight < document.body.scrollHeight;
          var bodyOverflowY = (0, _dom.getStyle)(document.body, 'overflowY');
          if (scrollBarWidth > 0 && (bodyHasOverflow || bodyOverflowY === 'scroll') && this.withoutHiddenClass) {
            document.body.style.paddingRight = this.computedBodyPaddingRight + scrollBarWidth + 'px';
          }
          (0, _dom.addClass)(document.body, 'el-popup-parent--hidden');
        }
      }

      if (getComputedStyle(dom).position === 'static') {
        dom.style.position = 'absolute';
      }

      dom.style.zIndex = _popupManager2.default.nextZIndex();
      this.opened = true;

      this.onOpen && this.onOpen();

      this.doAfterOpen();
    },
    doAfterOpen: function doAfterOpen() {
      this._opening = false;
    },
    close: function close() {
      var _this3 = this;

      if (this.willClose && !this.willClose()) return;

      if (this._openTimer !== null) {
        clearTimeout(this._openTimer);
        this._openTimer = null;
      }
      clearTimeout(this._closeTimer);

      var closeDelay = Number(this.closeDelay);

      if (closeDelay > 0) {
        this._closeTimer = setTimeout(function () {
          _this3._closeTimer = null;
          _this3.doClose();
        }, closeDelay);
      } else {
        this.doClose();
      }
    },
    doClose: function doClose() {
      this._closing = true;

      this.onClose && this.onClose();

      if (this.lockScroll) {
        setTimeout(this.restoreBodyStyle, 200);
      }

      this.opened = false;

      this.doAfterClose();
    },
    doAfterClose: function doAfterClose() {
      _popupManager2.default.closeModal(this._popupId);
      this._closing = false;
    },
    restoreBodyStyle: function restoreBodyStyle() {
      if (this.modal && this.withoutHiddenClass) {
        document.body.style.paddingRight = this.bodyPaddingRight;
        (0, _dom.removeClass)(document.body, 'el-popup-parent--hidden');
      }
      this.withoutHiddenClass = true;
    }
  }
};
exports.PopupManager = _popupManager2.default;

/***/ }),

/***/ 12:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (immutable) */ __webpack_exports__["m"] = getRegionList;
/* harmony export (immutable) */ __webpack_exports__["f"] = getBlock;
/* harmony export (immutable) */ __webpack_exports__["a"] = buildingsSelect;
/* unused harmony export getBuildList */
/* unused harmony export getSiteList */
/* harmony export (immutable) */ __webpack_exports__["e"] = findHouse;
/* harmony export (immutable) */ __webpack_exports__["c"] = collect;
/* harmony export (immutable) */ __webpack_exports__["b"] = cancelCollet;
/* harmony export (immutable) */ __webpack_exports__["k"] = getLoginCode;
/* harmony export (immutable) */ __webpack_exports__["q"] = login;
/* harmony export (immutable) */ __webpack_exports__["h"] = getCoreBuildList;
/* harmony export (immutable) */ __webpack_exports__["o"] = getSiteBuildNum;
/* harmony export (immutable) */ __webpack_exports__["d"] = factorFindHouse;
/* harmony export (immutable) */ __webpack_exports__["p"] = launchHouse;
/* harmony export (immutable) */ __webpack_exports__["n"] = getSelectInfo;
/* harmony export (immutable) */ __webpack_exports__["l"] = getMarketPrice;
/* harmony export (immutable) */ __webpack_exports__["j"] = getLikeBuild;
/* harmony export (immutable) */ __webpack_exports__["g"] = getBuildBrowse;
/* harmony export (immutable) */ __webpack_exports__["i"] = getHouseBrowse;
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__home_request__ = __webpack_require__(36);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_axios__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_axios__);



// 获取区域地理位置信息
function getRegionList() {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/get_area_locations_list',
    method: 'GET'
  });
}
// 获取商圈地理位置信息
function getBlock() {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/get_block_locations_list',
    method: 'GET'
  });
}

// 获取区域三级下拉列表
function buildingsSelect(params) {
  return __WEBPACK_IMPORTED_MODULE_1_axios___default()({
    headers: { 'safeString': params },
    url: 'http://192.168.0.142:9999' + '/api/cities_areas_blocks_select',
    method: 'GET'
  });
}

function getBuildList() {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/getBuildList',
    method: 'GET'
  });
}

function getSiteList() {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/getSiteList',
    method: 'GET'
  });
}

// 委托找房
function findHouse(data) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/entrust_throw_ins',
    method: 'POST',
    data: data
  });
}

// 收藏房源
function collect(data) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/collections',
    method: 'POST',
    data: data
  });
}

// 取消收藏
function cancelCollet(params) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/del/' + params,
    method: 'GET'
  });
}
// 获取登录验证码
function getLoginCode(tel) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/sms/captcha/' + tel + '/login',
    method: 'GET'
  });
}
// 登录
function login(data) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/logins',
    method: 'POST',
    data: data
  });
}
// 根据中心获取楼盘
function getCoreBuildList(data) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/get_periphery_buildings',
    method: 'POST',
    params: data
  });
}

// 获取站点楼盘数量
function getSiteBuildNum(data) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/get_periphery_buildings_count',
    method: 'POST',
    params: data
  });
}

// // 根据中心获取楼盘
// export function getCoreBuildLists(data) {
//     return request({
//         url: 'http://192.168.0.110/get_periphery_buildings',
//         method: 'post',
//         data: data
//     })
// }

// 委托找房表单
function factorFindHouse(data) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/entrust_throw_ins',
    method: 'POST',
    data: data
  });
}
// 投放房源
function launchHouse(data) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/entrust_throw_ins',
    method: 'POST',
    data: data
  });
}

// 搜索框提示信息
function getSelectInfo(params) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/get_select_info',
    method: 'GET',
    params: params
  });
}

// 获取楼盘详情市场行情
function getMarketPrice(params) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/market_price/' + params,
    method: 'GET'
  });
}

// 获取楼盘详情猜你喜欢
function getLikeBuild(params) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/like_building',
    method: 'GET',
    params: params
  });
}

// 获取楼盘浏览记录
function getBuildBrowse(params) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/property_browsing_list',
    method: 'GET',
    params: params
  });
}

// 获取房源浏览记录
function getHouseBrowse(params) {
  return Object(__WEBPACK_IMPORTED_MODULE_0__home_request__["a" /* default */])({
    url: '/listing_list',
    method: 'GET',
    params: params
  });
}

/***/ }),

/***/ 13:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(37);

/***/ }),

/***/ 14:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function bind(fn, thisArg) {
  return function wrap() {
    var args = new Array(arguments.length);
    for (var i = 0; i < args.length; i++) {
      args[i] = arguments[i];
    }
    return fn.apply(thisArg, args);
  };
};


/***/ }),

/***/ 15:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);
var settle = __webpack_require__(41);
var buildURL = __webpack_require__(43);
var parseHeaders = __webpack_require__(44);
var isURLSameOrigin = __webpack_require__(45);
var createError = __webpack_require__(16);
var btoa = (typeof window !== 'undefined' && window.btoa && window.btoa.bind(window)) || __webpack_require__(46);

module.exports = function xhrAdapter(config) {
  return new Promise(function dispatchXhrRequest(resolve, reject) {
    var requestData = config.data;
    var requestHeaders = config.headers;

    if (utils.isFormData(requestData)) {
      delete requestHeaders['Content-Type']; // Let the browser set it
    }

    var request = new XMLHttpRequest();
    var loadEvent = 'onreadystatechange';
    var xDomain = false;

    // For IE 8/9 CORS support
    // Only supports POST and GET calls and doesn't returns the response headers.
    // DON'T do this for testing b/c XMLHttpRequest is mocked, not XDomainRequest.
    if ("development" !== 'test' &&
        typeof window !== 'undefined' &&
        window.XDomainRequest && !('withCredentials' in request) &&
        !isURLSameOrigin(config.url)) {
      request = new window.XDomainRequest();
      loadEvent = 'onload';
      xDomain = true;
      request.onprogress = function handleProgress() {};
      request.ontimeout = function handleTimeout() {};
    }

    // HTTP basic authentication
    if (config.auth) {
      var username = config.auth.username || '';
      var password = config.auth.password || '';
      requestHeaders.Authorization = 'Basic ' + btoa(username + ':' + password);
    }

    request.open(config.method.toUpperCase(), buildURL(config.url, config.params, config.paramsSerializer), true);

    // Set the request timeout in MS
    request.timeout = config.timeout;

    // Listen for ready state
    request[loadEvent] = function handleLoad() {
      if (!request || (request.readyState !== 4 && !xDomain)) {
        return;
      }

      // The request errored out and we didn't get a response, this will be
      // handled by onerror instead
      // With one exception: request that using file: protocol, most browsers
      // will return status as 0 even though it's a successful request
      if (request.status === 0 && !(request.responseURL && request.responseURL.indexOf('file:') === 0)) {
        return;
      }

      // Prepare the response
      var responseHeaders = 'getAllResponseHeaders' in request ? parseHeaders(request.getAllResponseHeaders()) : null;
      var responseData = !config.responseType || config.responseType === 'text' ? request.responseText : request.response;
      var response = {
        data: responseData,
        // IE sends 1223 instead of 204 (https://github.com/axios/axios/issues/201)
        status: request.status === 1223 ? 204 : request.status,
        statusText: request.status === 1223 ? 'No Content' : request.statusText,
        headers: responseHeaders,
        config: config,
        request: request
      };

      settle(resolve, reject, response);

      // Clean up request
      request = null;
    };

    // Handle low level network errors
    request.onerror = function handleError() {
      // Real errors are hidden from us by the browser
      // onerror should only fire if it's a network error
      reject(createError('Network Error', config, null, request));

      // Clean up request
      request = null;
    };

    // Handle timeout
    request.ontimeout = function handleTimeout() {
      reject(createError('timeout of ' + config.timeout + 'ms exceeded', config, 'ECONNABORTED',
        request));

      // Clean up request
      request = null;
    };

    // Add xsrf header
    // This is only done if running in a standard browser environment.
    // Specifically not if we're in a web worker, or react-native.
    if (utils.isStandardBrowserEnv()) {
      var cookies = __webpack_require__(47);

      // Add xsrf header
      var xsrfValue = (config.withCredentials || isURLSameOrigin(config.url)) && config.xsrfCookieName ?
          cookies.read(config.xsrfCookieName) :
          undefined;

      if (xsrfValue) {
        requestHeaders[config.xsrfHeaderName] = xsrfValue;
      }
    }

    // Add headers to the request
    if ('setRequestHeader' in request) {
      utils.forEach(requestHeaders, function setRequestHeader(val, key) {
        if (typeof requestData === 'undefined' && key.toLowerCase() === 'content-type') {
          // Remove Content-Type if data is undefined
          delete requestHeaders[key];
        } else {
          // Otherwise add header to the request
          request.setRequestHeader(key, val);
        }
      });
    }

    // Add withCredentials to request if needed
    if (config.withCredentials) {
      request.withCredentials = true;
    }

    // Add responseType to request if needed
    if (config.responseType) {
      try {
        request.responseType = config.responseType;
      } catch (e) {
        // Expected DOMException thrown by browsers not compatible XMLHttpRequest Level 2.
        // But, this can be suppressed for 'json' type as it can be parsed by default 'transformResponse' function.
        if (config.responseType !== 'json') {
          throw e;
        }
      }
    }

    // Handle progress if needed
    if (typeof config.onDownloadProgress === 'function') {
      request.addEventListener('progress', config.onDownloadProgress);
    }

    // Not all browsers support upload events
    if (typeof config.onUploadProgress === 'function' && request.upload) {
      request.upload.addEventListener('progress', config.onUploadProgress);
    }

    if (config.cancelToken) {
      // Handle cancellation
      config.cancelToken.promise.then(function onCanceled(cancel) {
        if (!request) {
          return;
        }

        request.abort();
        reject(cancel);
        // Clean up request
        request = null;
      });
    }

    if (requestData === undefined) {
      requestData = null;
    }

    // Send the request
    request.send(requestData);
  });
};


/***/ }),

/***/ 16:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var enhanceError = __webpack_require__(42);

/**
 * Create an Error with the specified message, config, error code, request and response.
 *
 * @param {string} message The error message.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 * @param {Object} [request] The request.
 * @param {Object} [response] The response.
 * @returns {Error} The created error.
 */
module.exports = function createError(message, config, code, request, response) {
  var error = new Error(message);
  return enhanceError(error, config, code, request, response);
};


/***/ }),

/***/ 17:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function isCancel(value) {
  return !!(value && value.__CANCEL__);
};


/***/ }),

/***/ 18:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * A `Cancel` is an object that is thrown when an operation is canceled.
 *
 * @class
 * @param {string=} message The message.
 */
function Cancel(message) {
  this.message = message;
}

Cancel.prototype.toString = function toString() {
  return 'Cancel' + (this.message ? ': ' + this.message : '');
};

Cancel.prototype.__CANCEL__ = true;

module.exports = Cancel;


/***/ }),

/***/ 19:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(27);
if(typeof content === 'string') content = [[module.i, content, '']];
// add the styles to the DOM
var update = __webpack_require__(2)(content, {});
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../css-loader/index.js!./message.css", function() {
			var newContent = require("!!../../../css-loader/index.js!./message.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 2:
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
var stylesInDom = {},
	memoize = function(fn) {
		var memo;
		return function () {
			if (typeof memo === "undefined") memo = fn.apply(this, arguments);
			return memo;
		};
	},
	isOldIE = memoize(function() {
		return /msie [6-9]\b/.test(self.navigator.userAgent.toLowerCase());
	}),
	getHeadElement = memoize(function () {
		return document.head || document.getElementsByTagName("head")[0];
	}),
	singletonElement = null,
	singletonCounter = 0,
	styleElementsInsertedAtTop = [];

module.exports = function(list, options) {
	if(typeof DEBUG !== "undefined" && DEBUG) {
		if(typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};
	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (typeof options.singleton === "undefined") options.singleton = isOldIE();

	// By default, add <style> tags to the bottom of <head>.
	if (typeof options.insertAt === "undefined") options.insertAt = "bottom";

	var styles = listToStyles(list);
	addStylesToDom(styles, options);

	return function update(newList) {
		var mayRemove = [];
		for(var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];
			domStyle.refs--;
			mayRemove.push(domStyle);
		}
		if(newList) {
			var newStyles = listToStyles(newList);
			addStylesToDom(newStyles, options);
		}
		for(var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];
			if(domStyle.refs === 0) {
				for(var j = 0; j < domStyle.parts.length; j++)
					domStyle.parts[j]();
				delete stylesInDom[domStyle.id];
			}
		}
	};
}

function addStylesToDom(styles, options) {
	for(var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];
		if(domStyle) {
			domStyle.refs++;
			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}
			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];
			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}
			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles(list) {
	var styles = [];
	var newStyles = {};
	for(var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};
		if(!newStyles[id])
			styles.push(newStyles[id] = {id: id, parts: [part]});
		else
			newStyles[id].parts.push(part);
	}
	return styles;
}

function insertStyleElement(options, styleElement) {
	var head = getHeadElement();
	var lastStyleElementInsertedAtTop = styleElementsInsertedAtTop[styleElementsInsertedAtTop.length - 1];
	if (options.insertAt === "top") {
		if(!lastStyleElementInsertedAtTop) {
			head.insertBefore(styleElement, head.firstChild);
		} else if(lastStyleElementInsertedAtTop.nextSibling) {
			head.insertBefore(styleElement, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			head.appendChild(styleElement);
		}
		styleElementsInsertedAtTop.push(styleElement);
	} else if (options.insertAt === "bottom") {
		head.appendChild(styleElement);
	} else {
		throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");
	}
}

function removeStyleElement(styleElement) {
	styleElement.parentNode.removeChild(styleElement);
	var idx = styleElementsInsertedAtTop.indexOf(styleElement);
	if(idx >= 0) {
		styleElementsInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement(options) {
	var styleElement = document.createElement("style");
	styleElement.type = "text/css";
	insertStyleElement(options, styleElement);
	return styleElement;
}

function createLinkElement(options) {
	var linkElement = document.createElement("link");
	linkElement.rel = "stylesheet";
	insertStyleElement(options, linkElement);
	return linkElement;
}

function addStyle(obj, options) {
	var styleElement, update, remove;

	if (options.singleton) {
		var styleIndex = singletonCounter++;
		styleElement = singletonElement || (singletonElement = createStyleElement(options));
		update = applyToSingletonTag.bind(null, styleElement, styleIndex, false);
		remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true);
	} else if(obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function") {
		styleElement = createLinkElement(options);
		update = updateLink.bind(null, styleElement);
		remove = function() {
			removeStyleElement(styleElement);
			if(styleElement.href)
				URL.revokeObjectURL(styleElement.href);
		};
	} else {
		styleElement = createStyleElement(options);
		update = applyToTag.bind(null, styleElement);
		remove = function() {
			removeStyleElement(styleElement);
		};
	}

	update(obj);

	return function updateStyle(newObj) {
		if(newObj) {
			if(newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap)
				return;
			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;
		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag(styleElement, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (styleElement.styleSheet) {
		styleElement.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = styleElement.childNodes;
		if (childNodes[index]) styleElement.removeChild(childNodes[index]);
		if (childNodes.length) {
			styleElement.insertBefore(cssNode, childNodes[index]);
		} else {
			styleElement.appendChild(cssNode);
		}
	}
}

function applyToTag(styleElement, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		styleElement.setAttribute("media", media)
	}

	if(styleElement.styleSheet) {
		styleElement.styleSheet.cssText = css;
	} else {
		while(styleElement.firstChild) {
			styleElement.removeChild(styleElement.firstChild);
		}
		styleElement.appendChild(document.createTextNode(css));
	}
}

function updateLink(linkElement, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	if(sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = linkElement.href;

	linkElement.href = URL.createObjectURL(blob);

	if(oldSrc)
		URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

module.exports =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/dist/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 307);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 13:
/***/ (function(module, exports) {

module.exports = __webpack_require__(11);

/***/ }),

/***/ 20:
/***/ (function(module, exports) {

module.exports = __webpack_require__(22);

/***/ }),

/***/ 307:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _main = __webpack_require__(308);

var _main2 = _interopRequireDefault(_main);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = _main2.default;

/***/ }),

/***/ 308:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _vue = __webpack_require__(4);

var _vue2 = _interopRequireDefault(_vue);

var _main = __webpack_require__(309);

var _main2 = _interopRequireDefault(_main);

var _popup = __webpack_require__(13);

var _vdom = __webpack_require__(20);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var MessageConstructor = _vue2.default.extend(_main2.default);

var instance = void 0;
var instances = [];
var seed = 1;

var Message = function Message(options) {
  if (_vue2.default.prototype.$isServer) return;
  options = options || {};
  if (typeof options === 'string') {
    options = {
      message: options
    };
  }
  var userOnClose = options.onClose;
  var id = 'message_' + seed++;

  options.onClose = function () {
    Message.close(id, userOnClose);
  };
  instance = new MessageConstructor({
    data: options
  });
  instance.id = id;
  if ((0, _vdom.isVNode)(instance.message)) {
    instance.$slots.default = [instance.message];
    instance.message = null;
  }
  instance.vm = instance.$mount();
  document.body.appendChild(instance.vm.$el);
  instance.vm.visible = true;
  instance.dom = instance.vm.$el;
  instance.dom.style.zIndex = _popup.PopupManager.nextZIndex();
  instances.push(instance);
  return instance.vm;
};

['success', 'warning', 'info', 'error'].forEach(function (type) {
  Message[type] = function (options) {
    if (typeof options === 'string') {
      options = {
        message: options
      };
    }
    options.type = type;
    return Message(options);
  };
});

Message.close = function (id, userOnClose) {
  for (var i = 0, len = instances.length; i < len; i++) {
    if (id === instances[i].id) {
      if (typeof userOnClose === 'function') {
        userOnClose(instances[i]);
      }
      instances.splice(i, 1);
      break;
    }
  }
};

Message.closeAll = function () {
  for (var i = instances.length - 1; i >= 0; i--) {
    instances[i].close();
  }
};

exports.default = Message;

/***/ }),

/***/ 309:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_main_vue__ = __webpack_require__(310);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_main_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_main_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_4696067d_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_main_vue__ = __webpack_require__(311);
var normalizeComponent = __webpack_require__(0)
/* script */

/* template */

/* template functional */
  var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_main_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_4696067d_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_main_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 310:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

var typeMap = {
  success: 'success',
  info: 'info',
  warning: 'warning',
  error: 'error'
};

exports.default = {
  data: function data() {
    return {
      visible: false,
      message: '',
      duration: 3000,
      type: 'info',
      iconClass: '',
      customClass: '',
      onClose: null,
      showClose: false,
      closed: false,
      timer: null,
      dangerouslyUseHTMLString: false,
      center: false
    };
  },


  computed: {
    typeClass: function typeClass() {
      return this.type && !this.iconClass ? 'el-message__icon el-icon-' + typeMap[this.type] : '';
    }
  },

  watch: {
    closed: function closed(newVal) {
      if (newVal) {
        this.visible = false;
        this.$el.addEventListener('transitionend', this.destroyElement);
      }
    }
  },

  methods: {
    destroyElement: function destroyElement() {
      this.$el.removeEventListener('transitionend', this.destroyElement);
      this.$destroy(true);
      this.$el.parentNode.removeChild(this.$el);
    },
    close: function close() {
      this.closed = true;
      if (typeof this.onClose === 'function') {
        this.onClose(this);
      }
    },
    clearTimer: function clearTimer() {
      clearTimeout(this.timer);
    },
    startTimer: function startTimer() {
      var _this = this;

      if (this.duration > 0) {
        this.timer = setTimeout(function () {
          if (!_this.closed) {
            _this.close();
          }
        }, this.duration);
      }
    },
    keydown: function keydown(e) {
      if (e.keyCode === 27) {
        // esc关闭消息
        if (!this.closed) {
          this.close();
        }
      }
    }
  },
  mounted: function mounted() {
    this.startTimer();
    document.addEventListener('keydown', this.keydown);
  },
  beforeDestroy: function beforeDestroy() {
    document.removeEventListener('keydown', this.keydown);
  }
};

/***/ }),

/***/ 311:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('transition',{attrs:{"name":"el-message-fade"}},[_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.visible),expression:"visible"}],class:[
      'el-message',
      _vm.type && !_vm.iconClass ? ("el-message--" + _vm.type) : '',
      _vm.center ? 'is-center' : '',
      _vm.showClose ? 'is-closable' : '',
      _vm.customClass
    ],attrs:{"role":"alert"},on:{"mouseenter":_vm.clearTimer,"mouseleave":_vm.startTimer}},[(_vm.iconClass)?_c('i',{class:_vm.iconClass}):_c('i',{class:_vm.typeClass}),_vm._t("default",[(!_vm.dangerouslyUseHTMLString)?_c('p',{staticClass:"el-message__content"},[_vm._v(_vm._s(_vm.message))]):_c('p',{staticClass:"el-message__content",domProps:{"innerHTML":_vm._s(_vm.message)}})]),(_vm.showClose)?_c('i',{staticClass:"el-message__closeBtn el-icon-close",on:{"click":_vm.close}}):_vm._e()],2)])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);

/***/ }),

/***/ 4:
/***/ (function(module, exports) {

module.exports = __webpack_require__(4);

/***/ })

/******/ });

/***/ }),

/***/ 21:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

exports.default = function (target) {
  for (var i = 1, j = arguments.length; i < j; i++) {
    var source = arguments[i] || {};
    for (var prop in source) {
      if (source.hasOwnProperty(prop)) {
        var value = source[prop];
        if (value !== undefined) {
          target[prop] = value;
        }
      }
    }
  }

  return target;
};

;

/***/ }),

/***/ 22:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

exports.isVNode = isVNode;
exports.getFirstComponentChild = getFirstComponentChild;

var _util = __webpack_require__(7);

function isVNode(node) {
  return node !== null && (typeof node === 'undefined' ? 'undefined' : _typeof(node)) === 'object' && (0, _util.hasOwn)(node, 'componentOptions');
};

function getFirstComponentChild(children) {
  return children && children.filter(function (c) {
    return c && c.tag;
  })[0];
};

/***/ }),

/***/ 23:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;
/**
 * Show migrating guide in browser console.
 *
 * Usage:
 * import Migrating from 'element-ui/src/mixins/migrating';
 *
 * mixins: [Migrating]
 *
 * add getMigratingConfig method for your component.
 *  getMigratingConfig() {
 *    return {
 *      props: {
 *        'allow-no-selection': 'allow-no-selection is removed.',
 *        'selection-mode': 'selection-mode is removed.'
 *      },
 *      events: {
 *        selectionchange: 'selectionchange is renamed to selection-change.'
 *      }
 *    };
 *  },
 */
exports.default = {
  mounted: function mounted() {
    if (false) return;
    if (!this.$vnode) return;

    var _getMigratingConfig = this.getMigratingConfig(),
        _getMigratingConfig$p = _getMigratingConfig.props,
        props = _getMigratingConfig$p === undefined ? {} : _getMigratingConfig$p,
        _getMigratingConfig$e = _getMigratingConfig.events,
        events = _getMigratingConfig$e === undefined ? {} : _getMigratingConfig$e;

    var _$vnode = this.$vnode,
        data = _$vnode.data,
        componentOptions = _$vnode.componentOptions;

    var definedProps = data.attrs || {};
    var definedEvents = componentOptions.listeners || {};

    for (var propName in definedProps) {
      if (definedProps.hasOwnProperty(propName) && props[propName]) {
        console.warn('[Element Migrating][' + this.$options.name + '][Attribute]: ' + props[propName]);
      }
    }

    for (var eventName in definedEvents) {
      if (definedEvents.hasOwnProperty(eventName) && events[eventName]) {
        console.warn('[Element Migrating][' + this.$options.name + '][Event]: ' + events[eventName]);
      }
    }
  },

  methods: {
    getMigratingConfig: function getMigratingConfig() {
      return {
        props: {},
        events: {}
      };
    }
  }
};

/***/ }),

/***/ 24:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

exports.default = function () {
  if (_vue2.default.prototype.$isServer) return 0;
  if (scrollBarWidth !== undefined) return scrollBarWidth;

  var outer = document.createElement('div');
  outer.className = 'el-scrollbar__wrap';
  outer.style.visibility = 'hidden';
  outer.style.width = '100px';
  outer.style.position = 'absolute';
  outer.style.top = '-9999px';
  document.body.appendChild(outer);

  var widthNoScroll = outer.offsetWidth;
  outer.style.overflow = 'scroll';

  var inner = document.createElement('div');
  inner.style.width = '100%';
  outer.appendChild(inner);

  var widthWithScroll = inner.offsetWidth;
  outer.parentNode.removeChild(outer);
  scrollBarWidth = widthNoScroll - widthWithScroll;

  return scrollBarWidth;
};

var _vue = __webpack_require__(4);

var _vue2 = _interopRequireDefault(_vue);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var scrollBarWidth = void 0;

;

/***/ }),

/***/ 26:
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),

/***/ 27:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, ".el-message__closeBtn:focus,.el-message__content:focus{outline-width:0}.el-message{min-width:380px;-webkit-box-sizing:border-box;box-sizing:border-box;border-radius:4px;border-width:1px;border-style:solid;border-color:#ebeef5;position:fixed;left:50%;top:20px;-webkit-transform:translateX(-50%);transform:translateX(-50%);background-color:#edf2fc;-webkit-transition:opacity .3s,-webkit-transform .4s;transition:opacity .3s,-webkit-transform .4s;transition:opacity .3s,transform .4s;transition:opacity .3s,transform .4s,-webkit-transform .4s;overflow:hidden;padding:15px 15px 15px 20px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.el-message.is-center{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.el-message.is-closable .el-message__content{padding-right:16px}.el-message p{margin:0}.el-message--info .el-message__content{color:#909399}.el-message--success{background-color:#f0f9eb;border-color:#e1f3d8}.el-message--success .el-message__content{color:#67c23a}.el-message--warning{background-color:#fdf6ec;border-color:#faecd8}.el-message--warning .el-message__content{color:#e6a23c}.el-message--error{background-color:#fef0f0;border-color:#fde2e2}.el-message--error .el-message__content{color:#f56c6c}.el-message__icon{margin-right:10px}.el-message__content{padding:0;font-size:14px;line-height:1}.el-message__closeBtn{position:absolute;top:50%;right:15px;-webkit-transform:translateY(-50%);transform:translateY(-50%);cursor:pointer;color:#c0c4cc;font-size:16px}.el-message__closeBtn:hover{color:#909399}.el-message .el-icon-success{color:#67c23a}.el-message .el-icon-error{color:#f56c6c}.el-message .el-icon-info{color:#909399}.el-message .el-icon-warning{color:#e6a23c}.el-message-fade-enter,.el-message-fade-leave-active{opacity:0;-webkit-transform:translate(-50%,-100%);transform:translate(-50%,-100%)}", ""]);

// exports


/***/ }),

/***/ 28:
/***/ (function(module, exports, __webpack_require__) {

var escape = __webpack_require__(29);
exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, ".el-fade-in-enter,.el-fade-in-leave-active,.el-fade-in-linear-enter,.el-fade-in-linear-leave,.el-fade-in-linear-leave-active,.fade-in-linear-enter,.fade-in-linear-leave,.fade-in-linear-leave-active{opacity:0}.fade-in-linear-enter-active,.fade-in-linear-leave-active{-webkit-transition:opacity .2s linear;transition:opacity .2s linear}.el-fade-in-linear-enter-active,.el-fade-in-linear-leave-active{-webkit-transition:opacity .2s linear;transition:opacity .2s linear}.el-fade-in-enter-active,.el-fade-in-leave-active{-webkit-transition:all .3s cubic-bezier(.55,0,.1,1);transition:all .3s cubic-bezier(.55,0,.1,1)}.el-zoom-in-center-enter-active,.el-zoom-in-center-leave-active{-webkit-transition:all .3s cubic-bezier(.55,0,.1,1);transition:all .3s cubic-bezier(.55,0,.1,1)}.el-zoom-in-center-enter,.el-zoom-in-center-leave-active{opacity:0;-webkit-transform:scaleX(0);transform:scaleX(0)}.el-zoom-in-top-enter-active,.el-zoom-in-top-leave-active{opacity:1;-webkit-transform:scaleY(1);transform:scaleY(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:center top;transform-origin:center top}.el-zoom-in-top-enter,.el-zoom-in-top-leave-active{opacity:0;-webkit-transform:scaleY(0);transform:scaleY(0)}.el-zoom-in-bottom-enter-active,.el-zoom-in-bottom-leave-active{opacity:1;-webkit-transform:scaleY(1);transform:scaleY(1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:center bottom;transform-origin:center bottom}.el-zoom-in-bottom-enter,.el-zoom-in-bottom-leave-active{opacity:0;-webkit-transform:scaleY(0);transform:scaleY(0)}.el-zoom-in-left-enter-active,.el-zoom-in-left-leave-active{opacity:1;-webkit-transform:scale(1,1);transform:scale(1,1);-webkit-transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1);transition:transform .3s cubic-bezier(.23,1,.32,1),opacity .3s cubic-bezier(.23,1,.32,1),-webkit-transform .3s cubic-bezier(.23,1,.32,1);-webkit-transform-origin:top left;transform-origin:top left}.el-zoom-in-left-enter,.el-zoom-in-left-leave-active{opacity:0;-webkit-transform:scale(.45,.45);transform:scale(.45,.45)}.collapse-transition{-webkit-transition:.3s height ease-in-out,.3s padding-top ease-in-out,.3s padding-bottom ease-in-out;transition:.3s height ease-in-out,.3s padding-top ease-in-out,.3s padding-bottom ease-in-out}.horizontal-collapse-transition{-webkit-transition:.3s width ease-in-out,.3s padding-left ease-in-out,.3s padding-right ease-in-out;transition:.3s width ease-in-out,.3s padding-left ease-in-out,.3s padding-right ease-in-out}.el-list-enter-active,.el-list-leave-active{-webkit-transition:all 1s;transition:all 1s}.el-list-enter,.el-list-leave-active{opacity:0;-webkit-transform:translateY(-30px);transform:translateY(-30px)}.el-opacity-transition{-webkit-transition:opacity .3s cubic-bezier(.55,0,.1,1);transition:opacity .3s cubic-bezier(.55,0,.1,1)}@font-face{font-family:element-icons;src:url(" + escape(__webpack_require__(30)) + ") format(\"woff\"),url(" + escape(__webpack_require__(31)) + ") format(\"truetype\");font-weight:400;font-style:normal}[class*=\" el-icon-\"],[class^=el-icon-]{font-family:element-icons!important;speak:none;font-style:normal;font-weight:400;font-variant:normal;text-transform:none;line-height:1;vertical-align:baseline;display:inline-block;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.el-icon-info:before{content:\"\\E61A\"}.el-icon-error:before{content:\"\\E62C\"}.el-icon-success:before{content:\"\\E62D\"}.el-icon-warning:before{content:\"\\E62E\"}.el-icon-question:before{content:\"\\E634\"}.el-icon-back:before{content:\"\\E606\"}.el-icon-arrow-left:before{content:\"\\E600\"}.el-icon-arrow-down:before{content:\"\\E603\"}.el-icon-arrow-right:before{content:\"\\E604\"}.el-icon-arrow-up:before{content:\"\\E605\"}.el-icon-caret-left:before{content:\"\\E60A\"}.el-icon-caret-bottom:before{content:\"\\E60B\"}.el-icon-caret-top:before{content:\"\\E60C\"}.el-icon-caret-right:before{content:\"\\E60E\"}.el-icon-d-arrow-left:before{content:\"\\E610\"}.el-icon-d-arrow-right:before{content:\"\\E613\"}.el-icon-minus:before{content:\"\\E621\"}.el-icon-plus:before{content:\"\\E62B\"}.el-icon-remove:before{content:\"\\E635\"}.el-icon-circle-plus:before{content:\"\\E601\"}.el-icon-remove-outline:before{content:\"\\E63C\"}.el-icon-circle-plus-outline:before{content:\"\\E602\"}.el-icon-close:before{content:\"\\E60F\"}.el-icon-check:before{content:\"\\E611\"}.el-icon-circle-close:before{content:\"\\E607\"}.el-icon-circle-check:before{content:\"\\E639\"}.el-icon-circle-close-outline:before{content:\"\\E609\"}.el-icon-circle-check-outline:before{content:\"\\E63E\"}.el-icon-zoom-out:before{content:\"\\E645\"}.el-icon-zoom-in:before{content:\"\\E641\"}.el-icon-d-caret:before{content:\"\\E615\"}.el-icon-sort:before{content:\"\\E640\"}.el-icon-sort-down:before{content:\"\\E630\"}.el-icon-sort-up:before{content:\"\\E631\"}.el-icon-tickets:before{content:\"\\E63F\"}.el-icon-document:before{content:\"\\E614\"}.el-icon-goods:before{content:\"\\E618\"}.el-icon-sold-out:before{content:\"\\E63B\"}.el-icon-news:before{content:\"\\E625\"}.el-icon-message:before{content:\"\\E61B\"}.el-icon-date:before{content:\"\\E608\"}.el-icon-printer:before{content:\"\\E62F\"}.el-icon-time:before{content:\"\\E642\"}.el-icon-bell:before{content:\"\\E622\"}.el-icon-mobile-phone:before{content:\"\\E624\"}.el-icon-service:before{content:\"\\E63A\"}.el-icon-view:before{content:\"\\E643\"}.el-icon-menu:before{content:\"\\E620\"}.el-icon-more:before{content:\"\\E646\"}.el-icon-more-outline:before{content:\"\\E626\"}.el-icon-star-on:before{content:\"\\E637\"}.el-icon-star-off:before{content:\"\\E63D\"}.el-icon-location:before{content:\"\\E61D\"}.el-icon-location-outline:before{content:\"\\E61F\"}.el-icon-phone:before{content:\"\\E627\"}.el-icon-phone-outline:before{content:\"\\E628\"}.el-icon-picture:before{content:\"\\E629\"}.el-icon-picture-outline:before{content:\"\\E62A\"}.el-icon-delete:before{content:\"\\E612\"}.el-icon-search:before{content:\"\\E619\"}.el-icon-edit:before{content:\"\\E61C\"}.el-icon-edit-outline:before{content:\"\\E616\"}.el-icon-rank:before{content:\"\\E632\"}.el-icon-refresh:before{content:\"\\E633\"}.el-icon-share:before{content:\"\\E636\"}.el-icon-setting:before{content:\"\\E638\"}.el-icon-upload:before{content:\"\\E60D\"}.el-icon-upload2:before{content:\"\\E644\"}.el-icon-download:before{content:\"\\E617\"}.el-icon-loading:before{content:\"\\E61E\"}.el-icon-loading{-webkit-animation:rotating 2s linear infinite;animation:rotating 2s linear infinite}.el-icon--right{margin-left:5px}.el-icon--left{margin-right:5px}@-webkit-keyframes rotating{0%{-webkit-transform:rotateZ(0);transform:rotateZ(0)}100%{-webkit-transform:rotateZ(360deg);transform:rotateZ(360deg)}}@keyframes rotating{0%{-webkit-transform:rotateZ(0);transform:rotateZ(0)}100%{-webkit-transform:rotateZ(360deg);transform:rotateZ(360deg)}}", ""]);

// exports


/***/ }),

/***/ 29:
/***/ (function(module, exports) {

module.exports = function escape(url) {
    if (typeof url !== 'string') {
        return url
    }
    // If url is already wrapped in quotes, remove them
    if (/^['"].*['"]$/.test(url)) {
        url = url.slice(1, -1);
    }
    // Should url be wrapped?
    // See https://drafts.csswg.org/css-values-3/#urls
    if (/["'() \t\n]/.test(url)) {
        return '"' + url.replace(/"/g, '\\"').replace(/\n/g, '\\n') + '"'
    }

    return url
}


/***/ }),

/***/ 3:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(28);
if(typeof content === 'string') content = [[module.i, content, '']];
// add the styles to the DOM
var update = __webpack_require__(2)(content, {});
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../css-loader/index.js!./base.css", function() {
			var newContent = require("!!../../../css-loader/index.js!./base.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 30:
/***/ (function(module, exports) {

module.exports = "/fonts/vendor/element-ui/lib/theme-chalk/element-icons.woff?2fad952a20fbbcfd1bf2ebb210dccf7a";

/***/ }),

/***/ 31:
/***/ (function(module, exports) {

module.exports = "/fonts/vendor/element-ui/lib/theme-chalk/element-icons.ttf?6f0a76321d30f3c8120915e57f7bd77e";

/***/ }),

/***/ 32:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _vue = __webpack_require__(4);

var _vue2 = _interopRequireDefault(_vue);

var _dom = __webpack_require__(5);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var hasModal = false;
var hasInitZIndex = false;
var zIndex = 2000;

var getModal = function getModal() {
  if (_vue2.default.prototype.$isServer) return;
  var modalDom = PopupManager.modalDom;
  if (modalDom) {
    hasModal = true;
  } else {
    hasModal = false;
    modalDom = document.createElement('div');
    PopupManager.modalDom = modalDom;

    modalDom.addEventListener('touchmove', function (event) {
      event.preventDefault();
      event.stopPropagation();
    });

    modalDom.addEventListener('click', function () {
      PopupManager.doOnModalClick && PopupManager.doOnModalClick();
    });
  }

  return modalDom;
};

var instances = {};

var PopupManager = {
  modalFade: true,

  getInstance: function getInstance(id) {
    return instances[id];
  },

  register: function register(id, instance) {
    if (id && instance) {
      instances[id] = instance;
    }
  },

  deregister: function deregister(id) {
    if (id) {
      instances[id] = null;
      delete instances[id];
    }
  },

  nextZIndex: function nextZIndex() {
    return PopupManager.zIndex++;
  },

  modalStack: [],

  doOnModalClick: function doOnModalClick() {
    var topItem = PopupManager.modalStack[PopupManager.modalStack.length - 1];
    if (!topItem) return;

    var instance = PopupManager.getInstance(topItem.id);
    if (instance && instance.closeOnClickModal) {
      instance.close();
    }
  },

  openModal: function openModal(id, zIndex, dom, modalClass, modalFade) {
    if (_vue2.default.prototype.$isServer) return;
    if (!id || zIndex === undefined) return;
    this.modalFade = modalFade;

    var modalStack = this.modalStack;

    for (var i = 0, j = modalStack.length; i < j; i++) {
      var item = modalStack[i];
      if (item.id === id) {
        return;
      }
    }

    var modalDom = getModal();

    (0, _dom.addClass)(modalDom, 'v-modal');
    if (this.modalFade && !hasModal) {
      (0, _dom.addClass)(modalDom, 'v-modal-enter');
    }
    if (modalClass) {
      var classArr = modalClass.trim().split(/\s+/);
      classArr.forEach(function (item) {
        return (0, _dom.addClass)(modalDom, item);
      });
    }
    setTimeout(function () {
      (0, _dom.removeClass)(modalDom, 'v-modal-enter');
    }, 200);

    if (dom && dom.parentNode && dom.parentNode.nodeType !== 11) {
      dom.parentNode.appendChild(modalDom);
    } else {
      document.body.appendChild(modalDom);
    }

    if (zIndex) {
      modalDom.style.zIndex = zIndex;
    }
    modalDom.tabIndex = 0;
    modalDom.style.display = '';

    this.modalStack.push({ id: id, zIndex: zIndex, modalClass: modalClass });
  },

  closeModal: function closeModal(id) {
    var modalStack = this.modalStack;
    var modalDom = getModal();

    if (modalStack.length > 0) {
      var topItem = modalStack[modalStack.length - 1];
      if (topItem.id === id) {
        if (topItem.modalClass) {
          var classArr = topItem.modalClass.trim().split(/\s+/);
          classArr.forEach(function (item) {
            return (0, _dom.removeClass)(modalDom, item);
          });
        }

        modalStack.pop();
        if (modalStack.length > 0) {
          modalDom.style.zIndex = modalStack[modalStack.length - 1].zIndex;
        }
      } else {
        for (var i = modalStack.length - 1; i >= 0; i--) {
          if (modalStack[i].id === id) {
            modalStack.splice(i, 1);
            break;
          }
        }
      }
    }

    if (modalStack.length === 0) {
      if (this.modalFade) {
        (0, _dom.addClass)(modalDom, 'v-modal-leave');
      }
      setTimeout(function () {
        if (modalStack.length === 0) {
          if (modalDom.parentNode) modalDom.parentNode.removeChild(modalDom);
          modalDom.style.display = 'none';
          PopupManager.modalDom = undefined;
        }
        (0, _dom.removeClass)(modalDom, 'v-modal-leave');
      }, 200);
    }
  }
};

Object.defineProperty(PopupManager, 'zIndex', {
  configurable: true,
  get: function get() {
    if (!hasInitZIndex) {
      zIndex = (_vue2.default.prototype.$ELEMENT || {}).zIndex || zIndex;
      hasInitZIndex = true;
    }
    return zIndex;
  },
  set: function set(value) {
    zIndex = value;
  }
});

var getTopPopup = function getTopPopup() {
  if (_vue2.default.prototype.$isServer) return;
  if (PopupManager.modalStack.length > 0) {
    var topPopup = PopupManager.modalStack[PopupManager.modalStack.length - 1];
    if (!topPopup) return;
    var instance = PopupManager.getInstance(topPopup.id);

    return instance;
  }
};

if (!_vue2.default.prototype.$isServer) {
  // handle `esc` key when the popup is shown
  window.addEventListener('keydown', function (event) {
    if (event.keyCode === 27) {
      var topPopup = getTopPopup();

      if (topPopup && topPopup.closeOnPressEscape) {
        topPopup.handleClose ? topPopup.handleClose() : topPopup.handleAction ? topPopup.handleAction('cancel') : topPopup.close();
      }
    }
  });
}

exports.default = PopupManager;

/***/ }),

/***/ 33:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(34);
if(typeof content === 'string') content = [[module.i, content, '']];
// add the styles to the DOM
var update = __webpack_require__(2)(content, {});
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../css-loader/index.js!./button.css", function() {
			var newContent = require("!!../../../css-loader/index.js!./button.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 335:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(336);


/***/ }),

/***/ 336:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_home_login__ = __webpack_require__(56);
__webpack_require__(71);

var Swiper = __webpack_require__(101);

var mySwiper2 = new Swiper('.swiper-container1', {
    effect: 'fade',
    fade: {
        crossFade: true
    }
});
var mySwiper1 = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    effect: 'fade',
    width: 770,
    autoplay: 5000, //可选选项，自动滑动
    autoplayDisableOnInteraction: false,
    paginationClickable: true,
    onTransitionEnd: function onTransitionEnd(swiper) {
        console.log(swiper.activeIndex);
        mySwiper2.slideTo(swiper.activeIndex);
    }
});

$(".list-body-content").each(function () {
    var words = $(this).text().trim().length;
    if (words > 90) {
        $(this).text($(this).text().trim().slice(0, 90) + "......");
    }
});

/***/ }),

/***/ 34:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, ".el-button{display:inline-block;line-height:1;white-space:nowrap;cursor:pointer;background:#fff;border:1px solid #dcdfe6;color:#606266;-webkit-appearance:none;text-align:center;-webkit-box-sizing:border-box;box-sizing:border-box;outline:0;margin:0;-webkit-transition:.1s;transition:.1s;font-weight:500;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;padding:12px 20px;font-size:14px;border-radius:4px}.el-button+.el-button{margin-left:10px}.el-button:focus,.el-button:hover{color:#409EFF;border-color:#c6e2ff;background-color:#ecf5ff}.el-button:active{color:#3a8ee6;border-color:#3a8ee6;outline:0}.el-button::-moz-focus-inner{border:0}.el-button [class*=el-icon-]+span{margin-left:5px}.el-button.is-plain:focus,.el-button.is-plain:hover{background:#fff;border-color:#409EFF;color:#409EFF}.el-button.is-active,.el-button.is-plain:active{color:#3a8ee6;border-color:#3a8ee6}.el-button.is-plain:active{background:#fff;outline:0}.el-button.is-disabled,.el-button.is-disabled:focus,.el-button.is-disabled:hover{color:#c0c4cc;cursor:not-allowed;background-image:none;background-color:#fff;border-color:#ebeef5}.el-button.is-disabled.el-button--text{background-color:transparent}.el-button.is-disabled.is-plain,.el-button.is-disabled.is-plain:focus,.el-button.is-disabled.is-plain:hover{background-color:#fff;border-color:#ebeef5;color:#c0c4cc}.el-button.is-loading{position:relative;pointer-events:none}.el-button.is-loading:before{pointer-events:none;content:'';position:absolute;left:-1px;top:-1px;right:-1px;bottom:-1px;border-radius:inherit;background-color:rgba(255,255,255,.35)}.el-button.is-round{border-radius:20px;padding:12px 23px}.el-button.is-circle{border-radius:50%;padding:12px}.el-button--primary{color:#fff;background-color:#409EFF;border-color:#409EFF}.el-button--primary:focus,.el-button--primary:hover{background:#66b1ff;border-color:#66b1ff;color:#fff}.el-button--primary.is-active,.el-button--primary:active{background:#3a8ee6;border-color:#3a8ee6;color:#fff}.el-button--primary:active{outline:0}.el-button--primary.is-disabled,.el-button--primary.is-disabled:active,.el-button--primary.is-disabled:focus,.el-button--primary.is-disabled:hover{color:#fff;background-color:#a0cfff;border-color:#a0cfff}.el-button--primary.is-plain{color:#409EFF;background:#ecf5ff;border-color:#b3d8ff}.el-button--primary.is-plain:focus,.el-button--primary.is-plain:hover{background:#409EFF;border-color:#409EFF;color:#fff}.el-button--primary.is-plain:active{background:#3a8ee6;border-color:#3a8ee6;color:#fff;outline:0}.el-button--primary.is-plain.is-disabled,.el-button--primary.is-plain.is-disabled:active,.el-button--primary.is-plain.is-disabled:focus,.el-button--primary.is-plain.is-disabled:hover{color:#8cc5ff;background-color:#ecf5ff;border-color:#d9ecff}.el-button--success{color:#fff;background-color:#67c23a;border-color:#67c23a}.el-button--success:focus,.el-button--success:hover{background:#85ce61;border-color:#85ce61;color:#fff}.el-button--success.is-active,.el-button--success:active{background:#5daf34;border-color:#5daf34;color:#fff}.el-button--success:active{outline:0}.el-button--success.is-disabled,.el-button--success.is-disabled:active,.el-button--success.is-disabled:focus,.el-button--success.is-disabled:hover{color:#fff;background-color:#b3e19d;border-color:#b3e19d}.el-button--success.is-plain{color:#67c23a;background:#f0f9eb;border-color:#c2e7b0}.el-button--success.is-plain:focus,.el-button--success.is-plain:hover{background:#67c23a;border-color:#67c23a;color:#fff}.el-button--success.is-plain:active{background:#5daf34;border-color:#5daf34;color:#fff;outline:0}.el-button--success.is-plain.is-disabled,.el-button--success.is-plain.is-disabled:active,.el-button--success.is-plain.is-disabled:focus,.el-button--success.is-plain.is-disabled:hover{color:#a4da89;background-color:#f0f9eb;border-color:#e1f3d8}.el-button--warning{color:#fff;background-color:#e6a23c;border-color:#e6a23c}.el-button--warning:focus,.el-button--warning:hover{background:#ebb563;border-color:#ebb563;color:#fff}.el-button--warning.is-active,.el-button--warning:active{background:#cf9236;border-color:#cf9236;color:#fff}.el-button--warning:active{outline:0}.el-button--warning.is-disabled,.el-button--warning.is-disabled:active,.el-button--warning.is-disabled:focus,.el-button--warning.is-disabled:hover{color:#fff;background-color:#f3d19e;border-color:#f3d19e}.el-button--warning.is-plain{color:#e6a23c;background:#fdf6ec;border-color:#f5dab1}.el-button--warning.is-plain:focus,.el-button--warning.is-plain:hover{background:#e6a23c;border-color:#e6a23c;color:#fff}.el-button--warning.is-plain:active{background:#cf9236;border-color:#cf9236;color:#fff;outline:0}.el-button--warning.is-plain.is-disabled,.el-button--warning.is-plain.is-disabled:active,.el-button--warning.is-plain.is-disabled:focus,.el-button--warning.is-plain.is-disabled:hover{color:#f0c78a;background-color:#fdf6ec;border-color:#faecd8}.el-button--danger{color:#fff;background-color:#f56c6c;border-color:#f56c6c}.el-button--danger:focus,.el-button--danger:hover{background:#f78989;border-color:#f78989;color:#fff}.el-button--danger.is-active,.el-button--danger:active{background:#dd6161;border-color:#dd6161;color:#fff}.el-button--danger:active{outline:0}.el-button--danger.is-disabled,.el-button--danger.is-disabled:active,.el-button--danger.is-disabled:focus,.el-button--danger.is-disabled:hover{color:#fff;background-color:#fab6b6;border-color:#fab6b6}.el-button--danger.is-plain{color:#f56c6c;background:#fef0f0;border-color:#fbc4c4}.el-button--danger.is-plain:focus,.el-button--danger.is-plain:hover{background:#f56c6c;border-color:#f56c6c;color:#fff}.el-button--danger.is-plain:active{background:#dd6161;border-color:#dd6161;color:#fff;outline:0}.el-button--danger.is-plain.is-disabled,.el-button--danger.is-plain.is-disabled:active,.el-button--danger.is-plain.is-disabled:focus,.el-button--danger.is-plain.is-disabled:hover{color:#f9a7a7;background-color:#fef0f0;border-color:#fde2e2}.el-button--info{color:#fff;background-color:#909399;border-color:#909399}.el-button--info:focus,.el-button--info:hover{background:#a6a9ad;border-color:#a6a9ad;color:#fff}.el-button--info.is-active,.el-button--info:active{background:#82848a;border-color:#82848a;color:#fff}.el-button--info:active{outline:0}.el-button--info.is-disabled,.el-button--info.is-disabled:active,.el-button--info.is-disabled:focus,.el-button--info.is-disabled:hover{color:#fff;background-color:#c8c9cc;border-color:#c8c9cc}.el-button--info.is-plain{color:#909399;background:#f4f4f5;border-color:#d3d4d6}.el-button--info.is-plain:focus,.el-button--info.is-plain:hover{background:#909399;border-color:#909399;color:#fff}.el-button--info.is-plain:active{background:#82848a;border-color:#82848a;color:#fff;outline:0}.el-button--info.is-plain.is-disabled,.el-button--info.is-plain.is-disabled:active,.el-button--info.is-plain.is-disabled:focus,.el-button--info.is-plain.is-disabled:hover{color:#bcbec2;background-color:#f4f4f5;border-color:#e9e9eb}.el-button--text,.el-button--text.is-disabled,.el-button--text.is-disabled:focus,.el-button--text.is-disabled:hover,.el-button--text:active{border-color:transparent}.el-button--medium{padding:10px 20px;font-size:14px;border-radius:4px}.el-button--mini,.el-button--small{font-size:12px;border-radius:3px}.el-button--medium.is-round{padding:10px 20px}.el-button--medium.is-circle{padding:10px}.el-button--small,.el-button--small.is-round{padding:9px 15px}.el-button--small.is-circle{padding:9px}.el-button--mini,.el-button--mini.is-round{padding:7px 15px}.el-button--mini.is-circle{padding:7px}.el-button--text{color:#409EFF;background:0 0;padding-left:0;padding-right:0}.el-button--text:focus,.el-button--text:hover{color:#66b1ff;border-color:transparent;background-color:transparent}.el-button--text:active{color:#3a8ee6;background-color:transparent}.el-button-group{display:inline-block;vertical-align:middle}.el-button-group::after,.el-button-group::before{display:table;content:\"\"}.el-button-group::after{clear:both}.el-button-group .el-button{float:left;position:relative}.el-button-group .el-button+.el-button{margin-left:0}.el-button-group .el-button:first-child{border-top-right-radius:0;border-bottom-right-radius:0}.el-button-group .el-button:last-child{border-top-left-radius:0;border-bottom-left-radius:0}.el-button-group .el-button:first-child:last-child{border-radius:4px}.el-button-group .el-button:first-child:last-child.is-round{border-radius:20px}.el-button-group .el-button:first-child:last-child.is-circle{border-radius:50%}.el-button-group .el-button:not(:first-child):not(:last-child){border-radius:0}.el-button-group .el-button:not(:last-child){margin-right:-1px}.el-button-group .el-button.is-active,.el-button-group .el-button:active,.el-button-group .el-button:focus,.el-button-group .el-button:hover{z-index:1}.el-button-group .el-button--primary:first-child{border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--primary:last-child{border-left-color:rgba(255,255,255,.5)}.el-button-group .el-button--primary:not(:first-child):not(:last-child){border-left-color:rgba(255,255,255,.5);border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--success:first-child{border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--success:last-child{border-left-color:rgba(255,255,255,.5)}.el-button-group .el-button--success:not(:first-child):not(:last-child){border-left-color:rgba(255,255,255,.5);border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--warning:first-child{border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--warning:last-child{border-left-color:rgba(255,255,255,.5)}.el-button-group .el-button--warning:not(:first-child):not(:last-child){border-left-color:rgba(255,255,255,.5);border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--danger:first-child{border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--danger:last-child{border-left-color:rgba(255,255,255,.5)}.el-button-group .el-button--danger:not(:first-child):not(:last-child){border-left-color:rgba(255,255,255,.5);border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--info:first-child{border-right-color:rgba(255,255,255,.5)}.el-button-group .el-button--info:last-child{border-left-color:rgba(255,255,255,.5)}.el-button-group .el-button--info:not(:first-child):not(:last-child){border-left-color:rgba(255,255,255,.5);border-right-color:rgba(255,255,255,.5)}", ""]);

// exports


/***/ }),

/***/ 35:
/***/ (function(module, exports) {

module.exports =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/dist/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 151);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 151:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _button = __webpack_require__(152);

var _button2 = _interopRequireDefault(_button);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/* istanbul ignore next */
_button2.default.install = function (Vue) {
  Vue.component(_button2.default.name, _button2.default);
};

exports.default = _button2.default;

/***/ }),

/***/ 152:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_button_vue__ = __webpack_require__(153);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_button_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_button_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_59f41f99_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_button_vue__ = __webpack_require__(154);
var normalizeComponent = __webpack_require__(0)
/* script */

/* template */

/* template functional */
  var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_button_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_59f41f99_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_button_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 153:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

exports.default = {
  name: 'ElButton',

  inject: {
    elForm: {
      default: ''
    },
    elFormItem: {
      default: ''
    }
  },

  props: {
    type: {
      type: String,
      default: 'default'
    },
    size: String,
    icon: {
      type: String,
      default: ''
    },
    nativeType: {
      type: String,
      default: 'button'
    },
    loading: Boolean,
    disabled: Boolean,
    plain: Boolean,
    autofocus: Boolean,
    round: Boolean,
    circle: Boolean
  },

  computed: {
    _elFormItemSize: function _elFormItemSize() {
      return (this.elFormItem || {}).elFormItemSize;
    },
    buttonSize: function buttonSize() {
      return this.size || this._elFormItemSize || (this.$ELEMENT || {}).size;
    },
    buttonDisabled: function buttonDisabled() {
      return this.disabled || (this.elForm || {}).disabled;
    }
  },

  methods: {
    handleClick: function handleClick(evt) {
      this.$emit('click', evt);
    }
  }
};

/***/ }),

/***/ 154:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('button',{staticClass:"el-button",class:[
    _vm.type ? 'el-button--' + _vm.type : '',
    _vm.buttonSize ? 'el-button--' + _vm.buttonSize : '',
    {
      'is-disabled': _vm.buttonDisabled,
      'is-loading': _vm.loading,
      'is-plain': _vm.plain,
      'is-round': _vm.round,
      'is-circle': _vm.circle
    }
  ],attrs:{"disabled":_vm.buttonDisabled || _vm.loading,"autofocus":_vm.autofocus,"type":_vm.nativeType},on:{"click":_vm.handleClick}},[(_vm.loading)?_c('i',{staticClass:"el-icon-loading"}):_vm._e(),(_vm.icon && !_vm.loading)?_c('i',{class:_vm.icon}):_vm._e(),(_vm.$slots.default)?_c('span',[_vm._t("default")],2):_vm._e()])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);

/***/ })

/******/ });

/***/ }),

/***/ 36:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_ui_lib_theme_chalk_message_css__ = __webpack_require__(19);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_ui_lib_theme_chalk_message_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_element_ui_lib_theme_chalk_message_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_element_ui_lib_theme_chalk_base_css__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_element_ui_lib_theme_chalk_base_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_element_ui_lib_theme_chalk_base_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_axios__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_axios__);



/**
 * Created by zxz1992 on 2018/5/22.
 */


// 创建axios实例
var service = __WEBPACK_IMPORTED_MODULE_3_axios___default.a.create({
  // baseURL: 'http://192.168.0.188:8866/mock/5b19f300152f4405081fd865/map/', // api的base_url
  timeout: 15000 // 请求超时时间
});

// request拦截器
service.interceptors.request.use(function (config) {
  return config;
}, function (error) {
  // Do something with request error
  console.log(error); // for debug
  Promise.reject(error);
});

// respone拦截器
service.interceptors.response.use(function (response) {
  if (response.data.success) {
    // 请求成功
    return response.data;
  } else {
    __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()(response.data.message);
  }
}, function (error) {
  // 错误处理
  var status = error.response.status; // 错误状态码
  switch (status) {
    case 401:
      // 登录超时
      // TODO: 要不要跳转到 登录页面？？？ 以及弹窗的提示方式 样式？？
      __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()("登录超时,本次登录已超时，您可重新登录或点击取消留在本页面继续浏览！");
      break;
    case 403:
      // 无权限
      __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()("您无权限执行次操作");
      break;
    case 415:
    case 422:
      // 常规错误
      __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()(error.response.data.message);
      break;
    case 404:
      // 资源不存在
      __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()("请求资源不存在或已被删除");
      break;
    case 429:
      // 请求次数过多
      __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()("操作频率过高，请稍后重试");
      break;
    case 500:
      // 服务器崩溃
      __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()("服务器发生错误，请联系客服处理");
      break;
    default:
      // 未知错误
      __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()('产生未知错误，错误状态码：' + status);
      break;
  }
  return Promise.reject(error);
});

/* harmony default export */ __webpack_exports__["a"] = (service);

/***/ }),

/***/ 37:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);
var bind = __webpack_require__(14);
var Axios = __webpack_require__(39);
var defaults = __webpack_require__(8);

/**
 * Create an instance of Axios
 *
 * @param {Object} defaultConfig The default config for the instance
 * @return {Axios} A new instance of Axios
 */
function createInstance(defaultConfig) {
  var context = new Axios(defaultConfig);
  var instance = bind(Axios.prototype.request, context);

  // Copy axios.prototype to instance
  utils.extend(instance, Axios.prototype, context);

  // Copy context to instance
  utils.extend(instance, context);

  return instance;
}

// Create the default instance to be exported
var axios = createInstance(defaults);

// Expose Axios class to allow class inheritance
axios.Axios = Axios;

// Factory for creating new instances
axios.create = function create(instanceConfig) {
  return createInstance(utils.merge(defaults, instanceConfig));
};

// Expose Cancel & CancelToken
axios.Cancel = __webpack_require__(18);
axios.CancelToken = __webpack_require__(53);
axios.isCancel = __webpack_require__(17);

// Expose all/spread
axios.all = function all(promises) {
  return Promise.all(promises);
};
axios.spread = __webpack_require__(54);

module.exports = axios;

// Allow use of default import syntax in TypeScript
module.exports.default = axios;


/***/ }),

/***/ 38:
/***/ (function(module, exports) {

/*!
 * Determine if an object is a Buffer
 *
 * @author   Feross Aboukhadijeh <https://feross.org>
 * @license  MIT
 */

// The _isBuffer check is for Safari 5-7 support, because it's missing
// Object.prototype.constructor. Remove this eventually
module.exports = function (obj) {
  return obj != null && (isBuffer(obj) || isSlowBuffer(obj) || !!obj._isBuffer)
}

function isBuffer (obj) {
  return !!obj.constructor && typeof obj.constructor.isBuffer === 'function' && obj.constructor.isBuffer(obj)
}

// For Node v0.10 support. Remove this eventually.
function isSlowBuffer (obj) {
  return typeof obj.readFloatLE === 'function' && typeof obj.slice === 'function' && isBuffer(obj.slice(0, 0))
}


/***/ }),

/***/ 39:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var defaults = __webpack_require__(8);
var utils = __webpack_require__(0);
var InterceptorManager = __webpack_require__(48);
var dispatchRequest = __webpack_require__(49);

/**
 * Create a new instance of Axios
 *
 * @param {Object} instanceConfig The default config for the instance
 */
function Axios(instanceConfig) {
  this.defaults = instanceConfig;
  this.interceptors = {
    request: new InterceptorManager(),
    response: new InterceptorManager()
  };
}

/**
 * Dispatch a request
 *
 * @param {Object} config The config specific for this request (merged with this.defaults)
 */
Axios.prototype.request = function request(config) {
  /*eslint no-param-reassign:0*/
  // Allow for axios('example/url'[, config]) a la fetch API
  if (typeof config === 'string') {
    config = utils.merge({
      url: arguments[0]
    }, arguments[1]);
  }

  config = utils.merge(defaults, this.defaults, { method: 'get' }, config);
  config.method = config.method.toLowerCase();

  // Hook up interceptors middleware
  var chain = [dispatchRequest, undefined];
  var promise = Promise.resolve(config);

  this.interceptors.request.forEach(function unshiftRequestInterceptors(interceptor) {
    chain.unshift(interceptor.fulfilled, interceptor.rejected);
  });

  this.interceptors.response.forEach(function pushResponseInterceptors(interceptor) {
    chain.push(interceptor.fulfilled, interceptor.rejected);
  });

  while (chain.length) {
    promise = promise.then(chain.shift(), chain.shift());
  }

  return promise;
};

// Provide aliases for supported request methods
utils.forEach(['delete', 'get', 'head', 'options'], function forEachMethodNoData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url
    }));
  };
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, data, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url,
      data: data
    }));
  };
});

module.exports = Axios;


/***/ }),

/***/ 40:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

module.exports = function normalizeHeaderName(headers, normalizedName) {
  utils.forEach(headers, function processHeader(value, name) {
    if (name !== normalizedName && name.toUpperCase() === normalizedName.toUpperCase()) {
      headers[normalizedName] = value;
      delete headers[name];
    }
  });
};


/***/ }),

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var createError = __webpack_require__(16);

/**
 * Resolve or reject a Promise based on response status.
 *
 * @param {Function} resolve A function that resolves the promise.
 * @param {Function} reject A function that rejects the promise.
 * @param {object} response The response.
 */
module.exports = function settle(resolve, reject, response) {
  var validateStatus = response.config.validateStatus;
  // Note: status is not exposed by XDomainRequest
  if (!response.status || !validateStatus || validateStatus(response.status)) {
    resolve(response);
  } else {
    reject(createError(
      'Request failed with status code ' + response.status,
      response.config,
      null,
      response.request,
      response
    ));
  }
};


/***/ }),

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Update an Error with the specified config, error code, and response.
 *
 * @param {Error} error The error to update.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 * @param {Object} [request] The request.
 * @param {Object} [response] The response.
 * @returns {Error} The error.
 */
module.exports = function enhanceError(error, config, code, request, response) {
  error.config = config;
  if (code) {
    error.code = code;
  }
  error.request = request;
  error.response = response;
  return error;
};


/***/ }),

/***/ 43:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

function encode(val) {
  return encodeURIComponent(val).
    replace(/%40/gi, '@').
    replace(/%3A/gi, ':').
    replace(/%24/g, '$').
    replace(/%2C/gi, ',').
    replace(/%20/g, '+').
    replace(/%5B/gi, '[').
    replace(/%5D/gi, ']');
}

/**
 * Build a URL by appending params to the end
 *
 * @param {string} url The base of the url (e.g., http://www.google.com)
 * @param {object} [params] The params to be appended
 * @returns {string} The formatted url
 */
module.exports = function buildURL(url, params, paramsSerializer) {
  /*eslint no-param-reassign:0*/
  if (!params) {
    return url;
  }

  var serializedParams;
  if (paramsSerializer) {
    serializedParams = paramsSerializer(params);
  } else if (utils.isURLSearchParams(params)) {
    serializedParams = params.toString();
  } else {
    var parts = [];

    utils.forEach(params, function serialize(val, key) {
      if (val === null || typeof val === 'undefined') {
        return;
      }

      if (utils.isArray(val)) {
        key = key + '[]';
      }

      if (!utils.isArray(val)) {
        val = [val];
      }

      utils.forEach(val, function parseValue(v) {
        if (utils.isDate(v)) {
          v = v.toISOString();
        } else if (utils.isObject(v)) {
          v = JSON.stringify(v);
        }
        parts.push(encode(key) + '=' + encode(v));
      });
    });

    serializedParams = parts.join('&');
  }

  if (serializedParams) {
    url += (url.indexOf('?') === -1 ? '?' : '&') + serializedParams;
  }

  return url;
};


/***/ }),

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

// Headers whose duplicates are ignored by node
// c.f. https://nodejs.org/api/http.html#http_message_headers
var ignoreDuplicateOf = [
  'age', 'authorization', 'content-length', 'content-type', 'etag',
  'expires', 'from', 'host', 'if-modified-since', 'if-unmodified-since',
  'last-modified', 'location', 'max-forwards', 'proxy-authorization',
  'referer', 'retry-after', 'user-agent'
];

/**
 * Parse headers into an object
 *
 * ```
 * Date: Wed, 27 Aug 2014 08:58:49 GMT
 * Content-Type: application/json
 * Connection: keep-alive
 * Transfer-Encoding: chunked
 * ```
 *
 * @param {String} headers Headers needing to be parsed
 * @returns {Object} Headers parsed into an object
 */
module.exports = function parseHeaders(headers) {
  var parsed = {};
  var key;
  var val;
  var i;

  if (!headers) { return parsed; }

  utils.forEach(headers.split('\n'), function parser(line) {
    i = line.indexOf(':');
    key = utils.trim(line.substr(0, i)).toLowerCase();
    val = utils.trim(line.substr(i + 1));

    if (key) {
      if (parsed[key] && ignoreDuplicateOf.indexOf(key) >= 0) {
        return;
      }
      if (key === 'set-cookie') {
        parsed[key] = (parsed[key] ? parsed[key] : []).concat([val]);
      } else {
        parsed[key] = parsed[key] ? parsed[key] + ', ' + val : val;
      }
    }
  });

  return parsed;
};


/***/ }),

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs have full support of the APIs needed to test
  // whether the request URL is of the same origin as current location.
  (function standardBrowserEnv() {
    var msie = /(msie|trident)/i.test(navigator.userAgent);
    var urlParsingNode = document.createElement('a');
    var originURL;

    /**
    * Parse a URL to discover it's components
    *
    * @param {String} url The URL to be parsed
    * @returns {Object}
    */
    function resolveURL(url) {
      var href = url;

      if (msie) {
        // IE needs attribute set twice to normalize properties
        urlParsingNode.setAttribute('href', href);
        href = urlParsingNode.href;
      }

      urlParsingNode.setAttribute('href', href);

      // urlParsingNode provides the UrlUtils interface - http://url.spec.whatwg.org/#urlutils
      return {
        href: urlParsingNode.href,
        protocol: urlParsingNode.protocol ? urlParsingNode.protocol.replace(/:$/, '') : '',
        host: urlParsingNode.host,
        search: urlParsingNode.search ? urlParsingNode.search.replace(/^\?/, '') : '',
        hash: urlParsingNode.hash ? urlParsingNode.hash.replace(/^#/, '') : '',
        hostname: urlParsingNode.hostname,
        port: urlParsingNode.port,
        pathname: (urlParsingNode.pathname.charAt(0) === '/') ?
                  urlParsingNode.pathname :
                  '/' + urlParsingNode.pathname
      };
    }

    originURL = resolveURL(window.location.href);

    /**
    * Determine if a URL shares the same origin as the current location
    *
    * @param {String} requestURL The URL to test
    * @returns {boolean} True if URL shares the same origin, otherwise false
    */
    return function isURLSameOrigin(requestURL) {
      var parsed = (utils.isString(requestURL)) ? resolveURL(requestURL) : requestURL;
      return (parsed.protocol === originURL.protocol &&
            parsed.host === originURL.host);
    };
  })() :

  // Non standard browser envs (web workers, react-native) lack needed support.
  (function nonStandardBrowserEnv() {
    return function isURLSameOrigin() {
      return true;
    };
  })()
);


/***/ }),

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


// btoa polyfill for IE<10 courtesy https://github.com/davidchambers/Base64.js

var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';

function E() {
  this.message = 'String contains an invalid character';
}
E.prototype = new Error;
E.prototype.code = 5;
E.prototype.name = 'InvalidCharacterError';

function btoa(input) {
  var str = String(input);
  var output = '';
  for (
    // initialize result and counter
    var block, charCode, idx = 0, map = chars;
    // if the next str index does not exist:
    //   change the mapping table to "="
    //   check if d has no fractional digits
    str.charAt(idx | 0) || (map = '=', idx % 1);
    // "8 - idx % 1 * 8" generates the sequence 2, 4, 6, 8
    output += map.charAt(63 & block >> 8 - idx % 1 * 8)
  ) {
    charCode = str.charCodeAt(idx += 3 / 4);
    if (charCode > 0xFF) {
      throw new E();
    }
    block = block << 8 | charCode;
  }
  return output;
}

module.exports = btoa;


/***/ }),

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs support document.cookie
  (function standardBrowserEnv() {
    return {
      write: function write(name, value, expires, path, domain, secure) {
        var cookie = [];
        cookie.push(name + '=' + encodeURIComponent(value));

        if (utils.isNumber(expires)) {
          cookie.push('expires=' + new Date(expires).toGMTString());
        }

        if (utils.isString(path)) {
          cookie.push('path=' + path);
        }

        if (utils.isString(domain)) {
          cookie.push('domain=' + domain);
        }

        if (secure === true) {
          cookie.push('secure');
        }

        document.cookie = cookie.join('; ');
      },

      read: function read(name) {
        var match = document.cookie.match(new RegExp('(^|;\\s*)(' + name + ')=([^;]*)'));
        return (match ? decodeURIComponent(match[3]) : null);
      },

      remove: function remove(name) {
        this.write(name, '', Date.now() - 86400000);
      }
    };
  })() :

  // Non standard browser env (web workers, react-native) lack needed support.
  (function nonStandardBrowserEnv() {
    return {
      write: function write() {},
      read: function read() { return null; },
      remove: function remove() {}
    };
  })()
);


/***/ }),

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

function InterceptorManager() {
  this.handlers = [];
}

/**
 * Add a new interceptor to the stack
 *
 * @param {Function} fulfilled The function to handle `then` for a `Promise`
 * @param {Function} rejected The function to handle `reject` for a `Promise`
 *
 * @return {Number} An ID used to remove interceptor later
 */
InterceptorManager.prototype.use = function use(fulfilled, rejected) {
  this.handlers.push({
    fulfilled: fulfilled,
    rejected: rejected
  });
  return this.handlers.length - 1;
};

/**
 * Remove an interceptor from the stack
 *
 * @param {Number} id The ID that was returned by `use`
 */
InterceptorManager.prototype.eject = function eject(id) {
  if (this.handlers[id]) {
    this.handlers[id] = null;
  }
};

/**
 * Iterate over all the registered interceptors
 *
 * This method is particularly useful for skipping over any
 * interceptors that may have become `null` calling `eject`.
 *
 * @param {Function} fn The function to call for each interceptor
 */
InterceptorManager.prototype.forEach = function forEach(fn) {
  utils.forEach(this.handlers, function forEachHandler(h) {
    if (h !== null) {
      fn(h);
    }
  });
};

module.exports = InterceptorManager;


/***/ }),

/***/ 49:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);
var transformData = __webpack_require__(50);
var isCancel = __webpack_require__(17);
var defaults = __webpack_require__(8);
var isAbsoluteURL = __webpack_require__(51);
var combineURLs = __webpack_require__(52);

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
function throwIfCancellationRequested(config) {
  if (config.cancelToken) {
    config.cancelToken.throwIfRequested();
  }
}

/**
 * Dispatch a request to the server using the configured adapter.
 *
 * @param {object} config The config that is to be used for the request
 * @returns {Promise} The Promise to be fulfilled
 */
module.exports = function dispatchRequest(config) {
  throwIfCancellationRequested(config);

  // Support baseURL config
  if (config.baseURL && !isAbsoluteURL(config.url)) {
    config.url = combineURLs(config.baseURL, config.url);
  }

  // Ensure headers exist
  config.headers = config.headers || {};

  // Transform request data
  config.data = transformData(
    config.data,
    config.headers,
    config.transformRequest
  );

  // Flatten headers
  config.headers = utils.merge(
    config.headers.common || {},
    config.headers[config.method] || {},
    config.headers || {}
  );

  utils.forEach(
    ['delete', 'get', 'head', 'post', 'put', 'patch', 'common'],
    function cleanHeaderConfig(method) {
      delete config.headers[method];
    }
  );

  var adapter = config.adapter || defaults.adapter;

  return adapter(config).then(function onAdapterResolution(response) {
    throwIfCancellationRequested(config);

    // Transform response data
    response.data = transformData(
      response.data,
      response.headers,
      config.transformResponse
    );

    return response;
  }, function onAdapterRejection(reason) {
    if (!isCancel(reason)) {
      throwIfCancellationRequested(config);

      // Transform response data
      if (reason && reason.response) {
        reason.response.data = transformData(
          reason.response.data,
          reason.response.headers,
          config.transformResponse
        );
      }
    }

    return Promise.reject(reason);
  });
};


/***/ }),

/***/ 5:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;
exports.getStyle = exports.once = exports.off = exports.on = undefined;

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; /* istanbul ignore next */

exports.hasClass = hasClass;
exports.addClass = addClass;
exports.removeClass = removeClass;
exports.setStyle = setStyle;

var _vue = __webpack_require__(4);

var _vue2 = _interopRequireDefault(_vue);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var isServer = _vue2.default.prototype.$isServer;
var SPECIAL_CHARS_REGEXP = /([\:\-\_]+(.))/g;
var MOZ_HACK_REGEXP = /^moz([A-Z])/;
var ieVersion = isServer ? 0 : Number(document.documentMode);

/* istanbul ignore next */
var trim = function trim(string) {
  return (string || '').replace(/^[\s\uFEFF]+|[\s\uFEFF]+$/g, '');
};
/* istanbul ignore next */
var camelCase = function camelCase(name) {
  return name.replace(SPECIAL_CHARS_REGEXP, function (_, separator, letter, offset) {
    return offset ? letter.toUpperCase() : letter;
  }).replace(MOZ_HACK_REGEXP, 'Moz$1');
};

/* istanbul ignore next */
var on = exports.on = function () {
  if (!isServer && document.addEventListener) {
    return function (element, event, handler) {
      if (element && event && handler) {
        element.addEventListener(event, handler, false);
      }
    };
  } else {
    return function (element, event, handler) {
      if (element && event && handler) {
        element.attachEvent('on' + event, handler);
      }
    };
  }
}();

/* istanbul ignore next */
var off = exports.off = function () {
  if (!isServer && document.removeEventListener) {
    return function (element, event, handler) {
      if (element && event) {
        element.removeEventListener(event, handler, false);
      }
    };
  } else {
    return function (element, event, handler) {
      if (element && event) {
        element.detachEvent('on' + event, handler);
      }
    };
  }
}();

/* istanbul ignore next */
var once = exports.once = function once(el, event, fn) {
  var listener = function listener() {
    if (fn) {
      fn.apply(this, arguments);
    }
    off(el, event, listener);
  };
  on(el, event, listener);
};

/* istanbul ignore next */
function hasClass(el, cls) {
  if (!el || !cls) return false;
  if (cls.indexOf(' ') !== -1) throw new Error('className should not contain space.');
  if (el.classList) {
    return el.classList.contains(cls);
  } else {
    return (' ' + el.className + ' ').indexOf(' ' + cls + ' ') > -1;
  }
};

/* istanbul ignore next */
function addClass(el, cls) {
  if (!el) return;
  var curClass = el.className;
  var classes = (cls || '').split(' ');

  for (var i = 0, j = classes.length; i < j; i++) {
    var clsName = classes[i];
    if (!clsName) continue;

    if (el.classList) {
      el.classList.add(clsName);
    } else if (!hasClass(el, clsName)) {
      curClass += ' ' + clsName;
    }
  }
  if (!el.classList) {
    el.className = curClass;
  }
};

/* istanbul ignore next */
function removeClass(el, cls) {
  if (!el || !cls) return;
  var classes = cls.split(' ');
  var curClass = ' ' + el.className + ' ';

  for (var i = 0, j = classes.length; i < j; i++) {
    var clsName = classes[i];
    if (!clsName) continue;

    if (el.classList) {
      el.classList.remove(clsName);
    } else if (hasClass(el, clsName)) {
      curClass = curClass.replace(' ' + clsName + ' ', ' ');
    }
  }
  if (!el.classList) {
    el.className = trim(curClass);
  }
};

/* istanbul ignore next */
var getStyle = exports.getStyle = ieVersion < 9 ? function (element, styleName) {
  if (isServer) return;
  if (!element || !styleName) return null;
  styleName = camelCase(styleName);
  if (styleName === 'float') {
    styleName = 'styleFloat';
  }
  try {
    switch (styleName) {
      case 'opacity':
        try {
          return element.filters.item('alpha').opacity / 100;
        } catch (e) {
          return 1.0;
        }
      default:
        return element.style[styleName] || element.currentStyle ? element.currentStyle[styleName] : null;
    }
  } catch (e) {
    return element.style[styleName];
  }
} : function (element, styleName) {
  if (isServer) return;
  if (!element || !styleName) return null;
  styleName = camelCase(styleName);
  if (styleName === 'float') {
    styleName = 'cssFloat';
  }
  try {
    var computed = document.defaultView.getComputedStyle(element, '');
    return element.style[styleName] || computed ? computed[styleName] : null;
  } catch (e) {
    return element.style[styleName];
  }
};

/* istanbul ignore next */
function setStyle(element, styleName, value) {
  if (!element || !styleName) return;

  if ((typeof styleName === 'undefined' ? 'undefined' : _typeof(styleName)) === 'object') {
    for (var prop in styleName) {
      if (styleName.hasOwnProperty(prop)) {
        setStyle(element, prop, styleName[prop]);
      }
    }
  } else {
    styleName = camelCase(styleName);
    if (styleName === 'opacity' && ieVersion < 9) {
      element.style.filter = isNaN(value) ? '' : 'alpha(opacity=' + value * 100 + ')';
    } else {
      element.style[styleName] = value;
    }
  }
};

/***/ }),

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

/**
 * Transform the data for a request or a response
 *
 * @param {Object|String} data The data to be transformed
 * @param {Array} headers The headers for the request or response
 * @param {Array|Function} fns A single function or Array of functions
 * @returns {*} The resulting transformed data
 */
module.exports = function transformData(data, headers, fns) {
  /*eslint no-param-reassign:0*/
  utils.forEach(fns, function transform(fn) {
    data = fn(data, headers);
  });

  return data;
};


/***/ }),

/***/ 51:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Determines whether the specified URL is absolute
 *
 * @param {string} url The URL to test
 * @returns {boolean} True if the specified URL is absolute, otherwise false
 */
module.exports = function isAbsoluteURL(url) {
  // A URL is considered absolute if it begins with "<scheme>://" or "//" (protocol-relative URL).
  // RFC 3986 defines scheme name as a sequence of characters beginning with a letter and followed
  // by any combination of letters, digits, plus, period, or hyphen.
  return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(url);
};


/***/ }),

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Creates a new URL by combining the specified URLs
 *
 * @param {string} baseURL The base URL
 * @param {string} relativeURL The relative URL
 * @returns {string} The combined URL
 */
module.exports = function combineURLs(baseURL, relativeURL) {
  return relativeURL
    ? baseURL.replace(/\/+$/, '') + '/' + relativeURL.replace(/^\/+/, '')
    : baseURL;
};


/***/ }),

/***/ 53:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var Cancel = __webpack_require__(18);

/**
 * A `CancelToken` is an object that can be used to request cancellation of an operation.
 *
 * @class
 * @param {Function} executor The executor function.
 */
function CancelToken(executor) {
  if (typeof executor !== 'function') {
    throw new TypeError('executor must be a function.');
  }

  var resolvePromise;
  this.promise = new Promise(function promiseExecutor(resolve) {
    resolvePromise = resolve;
  });

  var token = this;
  executor(function cancel(message) {
    if (token.reason) {
      // Cancellation has already been requested
      return;
    }

    token.reason = new Cancel(message);
    resolvePromise(token.reason);
  });
}

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
CancelToken.prototype.throwIfRequested = function throwIfRequested() {
  if (this.reason) {
    throw this.reason;
  }
};

/**
 * Returns an object that contains a new `CancelToken` and a function that, when called,
 * cancels the `CancelToken`.
 */
CancelToken.source = function source() {
  var cancel;
  var token = new CancelToken(function executor(c) {
    cancel = c;
  });
  return {
    token: token,
    cancel: cancel
  };
};

module.exports = CancelToken;


/***/ }),

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Syntactic sugar for invoking a function and expanding an array for arguments.
 *
 * Common use case would be to use `Function.prototype.apply`.
 *
 *  ```js
 *  function f(x, y, z) {}
 *  var args = [1, 2, 3];
 *  f.apply(null, args);
 *  ```
 *
 * With `spread` this example can be re-written.
 *
 *  ```js
 *  spread(function(x, y, z) {})([1, 2, 3]);
 *  ```
 *
 * @param {Function} callback
 * @returns {Function}
 */
module.exports = function spread(callback) {
  return function wrap(arr) {
    return callback.apply(null, arr);
  };
};


/***/ }),

/***/ 56:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__login__ = __webpack_require__(57);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__login___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__login__);

var loginHtml = new Vue({
  el: '#login',
  components: { login: __WEBPACK_IMPORTED_MODULE_0__login___default.a },
  template: '<login ref="login"/>'
});
$(document).on('click', 'a.js_login', function () {
  loginHtml.$refs.login.show();
});

/***/ }),

/***/ 57:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(58)
}
var normalizeComponent = __webpack_require__(9)
/* script */
var __vue_script__ = __webpack_require__(60)
/* template */
var __vue_template__ = __webpack_require__(67)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/home/login/login.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1639a0aa", Component.options)
  } else {
    hotAPI.reload("data-v-1639a0aa", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 58:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(59);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("36072488", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1639a0aa\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1639a0aa\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, "\nbody.el-popup-parent--hidden {\n  padding-right: 15px !important;\n}\n.login-box .pointer {\n  cursor: pointer;\n}\n.login-box .el-dialog {\n  margin-top: 26vh !important;\n}\n.login-box .el-dialog__body {\n  padding-top: 0px;\n  padding-left: 30px;\n  padding-right: 30px;\n  padding-bottom: 40px;\n}\n.login-box .el-dialog__body .title {\n    font-family: SourceHanSansCN-Bold;\n    font-size: 22px;\n    font-weight: normal;\n    font-stretch: normal;\n    letter-spacing: 0px;\n    color: #333333;\n}\n.login-box .el-dialog__body .small-title {\n    margin-top: 12px;\n    font-family: SourceHanSansCN-Regular;\n    font-size: 14px;\n    font-weight: normal;\n    font-stretch: normal;\n    letter-spacing: 0px;\n    color: #999999;\n}\n.login-box .el-dialog__body form {\n    display: block;\n    margin-top: 35px;\n    width: 360px;\n}\n.login-box .el-dialog__body form .input-box {\n      position: relative;\n      z-index: 1;\n      border: solid 1px #dddddd;\n      height: 48px;\n      width: 358px;\n      overflow: hidden;\n}\n.login-box .el-dialog__body form .input-box.error {\n        margin-top: 5px;\n        border-color: #ff0000;\n        z-index: 6;\n}\n.login-box .el-dialog__body form .input-box:nth-child(2) {\n        top: -1px;\n}\n.login-box .el-dialog__body form .input-box input {\n        border: none;\n        width: 100%;\n        height: 100%;\n        padding-left: 11px;\n        position: absolute;\n}\n.login-box .el-dialog__body form .input-box .sms-btn-box {\n        width: 110px;\n        top: 0;\n        bottom: 0;\n        padding-top: 10px;\n        z-index: 3;\n        position: absolute;\n        right: 0;\n        background-color: #ffffff;\n        text-align: center;\n}\n.login-box .el-dialog__body form .input-box .sms-btn-box button {\n          width: 100%;\n          padding: 5px 0;\n          border-right: none;\n          border-top: none;\n          border-bottom: none;\n          border-left: 1px solid #dddddd !important;\n}\n.login-box .el-dialog__body .el-checkbox__input.is-checked + .el-checkbox__label {\n    color: #333333;\n}\n.login-box .el-dialog__body .btn-box {\n    margin-top: 25px;\n    width: 300px;\n    text-align: center;\n}\n.login-box .el-dialog__body .btn-box * {\n      color: #ffffff;\n}\n.login-box .el-dialog__body .btn-box button {\n      width: 360px;\n      background-color: #007bff;\n      cursor: pointer;\n      position: relative;\n      overflow: hidden;\n      z-index: 3;\n}\n.login-box .el-dialog__body .btn-box button::after {\n        content: \"\";\n        background: #2b8df7;\n        display: block;\n        position: absolute;\n        height: 100%;\n        top: 0;\n        left: 0;\n        z-index: -1;\n        width: 0;\n        -webkit-transition: all .5s ease;\n        transition: all .5s ease;\n}\n.login-box .el-dialog__body .btn-box button:hover::after {\n        width: 100%;\n}\n.login-box .el-dialog__body .route-box {\n    margin-top: 20px;\n}\n.login-box .el-dialog__body .route-box a {\n      color: #007bff;\n}\n", ""]);

// exports


/***/ }),

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(26)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}
var options = null
var ssrIdKey = 'data-vue-ssr-id'

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction, _options) {
  isProduction = _isProduction

  options = _options || {}

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[' + ssrIdKey + '~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }
  if (options.ssrId) {
    styleElement.setAttribute(ssrIdKey, obj.id)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ }),

/***/ 60:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_ui_lib_theme_chalk_message_css__ = __webpack_require__(19);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_ui_lib_theme_chalk_message_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_element_ui_lib_theme_chalk_message_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_element_ui_lib_theme_chalk_base_css__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_element_ui_lib_theme_chalk_base_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_element_ui_lib_theme_chalk_base_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_element_ui_lib_theme_chalk_button_css__ = __webpack_require__(33);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_element_ui_lib_theme_chalk_button_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_element_ui_lib_theme_chalk_button_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_element_ui_lib_button__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_element_ui_lib_button___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4_element_ui_lib_button__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_element_ui_lib_theme_chalk_checkbox_css__ = __webpack_require__(61);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_element_ui_lib_theme_chalk_checkbox_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_element_ui_lib_theme_chalk_checkbox_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_element_ui_lib_checkbox__ = __webpack_require__(63);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_element_ui_lib_checkbox___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_6_element_ui_lib_checkbox__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_element_ui_lib_theme_chalk_dialog_css__ = __webpack_require__(64);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_element_ui_lib_theme_chalk_dialog_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_7_element_ui_lib_theme_chalk_dialog_css__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_element_ui_lib_dialog__ = __webpack_require__(66);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_element_ui_lib_dialog___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_8_element_ui_lib_dialog__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__home_api__ = __webpack_require__(12);













 //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

var ElDialog = __WEBPACK_IMPORTED_MODULE_8_element_ui_lib_dialog___default.a;
var ElCheckbox = __WEBPACK_IMPORTED_MODULE_6_element_ui_lib_checkbox___default.a;
var ElButton = __WEBPACK_IMPORTED_MODULE_4_element_ui_lib_button___default.a;
/* harmony default export */ __webpack_exports__["default"] = ({
  components: { ElDialog: ElDialog, ElCheckbox: ElCheckbox, ElButton: ElButton },
  data: function data() {
    return {
      active: 1,
      secondNum: 0,
      isTel: true, // 手机号验证状态 true: 通过 false: 不通过
      isCode: true, // 验证码状态 true: 通过 false: 不通过
      checked: true,
      dialogVisible: false,
      tel: null, // 手机号
      code: null // 短信验证码
    };
  },

  watch: {
    tel: function tel(val) {
      if (!this.isTel) {
        this.validateTel();
      }
    },
    code: function code(val) {
      if (!this.isCode) {
        this.validateCode();
      }
    },
    secondNum: function secondNum(val) {
      var _this = this;

      if (val > 0) {
        setTimeout(function () {
          _this.secondNum = val - 1;
        }, 1000);
      }
    }
  },
  methods: {
    // 登录框显示
    show: function show() {
      this.dialogVisible = true;
    },

    // 手机验证
    validateTel: function validateTel() {
      var Repx = /^1\d{10}$/;
      if (Repx.test(this.tel)) {
        this.isTel = true;
        return true;
      } else {
        this.isTel = false;
        return false;
      }
    },

    // 验证码验证
    validateCode: function validateCode() {
      var Repx = /^\d{4}$/;
      if (Repx.test(this.code)) {
        this.isCode = true;
        return true;
      } else {
        this.isCode = false;
        return false;
      }
    },

    // 获取验证码
    getCode: function getCode() {
      var _this2 = this;

      if (this.validateTel()) {
        this.secondNum = 60;
        Object(__WEBPACK_IMPORTED_MODULE_9__home_api__["k" /* getLoginCode */])(this.tel).then(function (res) {
          __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()({
            message: '短信已发送请耐心等候',
            type: 'success'
          });
        }).catch(function () {
          __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()({
            message: '短信发送失败',
            type: 'warning'
          });
          _this2.secondNum = 0;
        });
      }
    },

    // 登录
    login: function login() {
      this.isTel = true; // 手机号验证状态 true: 通过 false: 不通过
      this.isCode = true; // 验证码状态 true: 通过 false: 不通过
      if (this.validateTel() && this.validateCode()) {
        Object(__WEBPACK_IMPORTED_MODULE_9__home_api__["q" /* login */])({ tel: this.tel, smsCode: this.code }).then(function (res) {
          if (res) {
            __WEBPACK_IMPORTED_MODULE_2_element_ui_lib_message___default()({
              message: '登陆成功！即将刷新页面',
              type: 'success'
            });
            setTimeout(function () {
              window.location.reload();
            }, 1500);
          }
        });
      }
    }
  }
});

/***/ }),

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(62);
if(typeof content === 'string') content = [[module.i, content, '']];
// add the styles to the DOM
var update = __webpack_require__(2)(content, {});
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../css-loader/index.js!./checkbox.css", function() {
			var newContent = require("!!../../../css-loader/index.js!./checkbox.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, "@charset \"UTF-8\";.el-checkbox,.el-checkbox__input{display:inline-block;position:relative}.el-checkbox-button__inner,.el-checkbox__input{white-space:nowrap;vertical-align:middle;outline:0}.el-checkbox{color:#606266;font-weight:500;font-size:14px;cursor:pointer;white-space:nowrap;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.el-checkbox.is-bordered{padding:9px 20px 9px 10px;border-radius:4px;border:1px solid #dcdfe6;-webkit-box-sizing:border-box;box-sizing:border-box;line-height:normal;height:40px}.el-checkbox.is-bordered.is-checked{border-color:#409EFF}.el-checkbox.is-bordered.is-disabled{border-color:#ebeef5;cursor:not-allowed}.el-checkbox.is-bordered+.el-checkbox.is-bordered{margin-left:10px}.el-checkbox.is-bordered.el-checkbox--medium{padding:7px 20px 7px 10px;border-radius:4px;height:36px}.el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__label{line-height:17px;font-size:14px}.el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__inner{height:14px;width:14px}.el-checkbox.is-bordered.el-checkbox--small{padding:5px 15px 5px 10px;border-radius:3px;height:32px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__label{line-height:15px;font-size:12px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner{height:12px;width:12px}.el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner::after{height:6px;width:2px}.el-checkbox.is-bordered.el-checkbox--mini{padding:3px 15px 3px 10px;border-radius:3px;height:28px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__label{line-height:12px;font-size:12px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner{height:12px;width:12px}.el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner::after{height:6px;width:2px}.el-checkbox__input{cursor:pointer;line-height:1}.el-checkbox__input.is-disabled .el-checkbox__inner{background-color:#edf2fc;border-color:#dcdfe6;cursor:not-allowed}.el-checkbox__input.is-disabled .el-checkbox__inner::after{cursor:not-allowed;border-color:#c0c4cc}.el-checkbox__input.is-disabled .el-checkbox__inner+.el-checkbox__label{cursor:not-allowed}.el-checkbox__input.is-disabled.is-checked .el-checkbox__inner{background-color:#f2f6fc;border-color:#dcdfe6}.el-checkbox__input.is-disabled.is-checked .el-checkbox__inner::after{border-color:#c0c4cc}.el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner{background-color:#f2f6fc;border-color:#dcdfe6}.el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner::before{background-color:#c0c4cc;border-color:#c0c4cc}.el-checkbox__input.is-checked .el-checkbox__inner,.el-checkbox__input.is-indeterminate .el-checkbox__inner{background-color:#409EFF;border-color:#409EFF}.el-checkbox__input.is-disabled+span.el-checkbox__label{color:#c0c4cc;cursor:not-allowed}.el-checkbox__input.is-checked .el-checkbox__inner::after{-webkit-transform:rotate(45deg) scaleY(1);transform:rotate(45deg) scaleY(1)}.el-checkbox__input.is-checked+.el-checkbox__label{color:#409EFF}.el-checkbox__input.is-focus .el-checkbox__inner{border-color:#409EFF}.el-checkbox__input.is-indeterminate .el-checkbox__inner::before{content:'';position:absolute;display:block;background-color:#fff;height:2px;-webkit-transform:scale(.5);transform:scale(.5);left:0;right:0;top:5px}.el-checkbox__input.is-indeterminate .el-checkbox__inner::after{display:none}.el-checkbox__inner{display:inline-block;position:relative;border:1px solid #dcdfe6;border-radius:2px;-webkit-box-sizing:border-box;box-sizing:border-box;width:14px;height:14px;background-color:#fff;z-index:1;-webkit-transition:border-color .25s cubic-bezier(.71,-.46,.29,1.46),background-color .25s cubic-bezier(.71,-.46,.29,1.46);transition:border-color .25s cubic-bezier(.71,-.46,.29,1.46),background-color .25s cubic-bezier(.71,-.46,.29,1.46)}.el-checkbox__inner:hover{border-color:#409EFF}.el-checkbox__inner::after{-webkit-box-sizing:content-box;box-sizing:content-box;content:\"\";border:1px solid #fff;border-left:0;border-top:0;height:7px;left:4px;position:absolute;top:1px;-webkit-transform:rotate(45deg) scaleY(0);transform:rotate(45deg) scaleY(0);width:3px;-webkit-transition:-webkit-transform .15s ease-in .05s;transition:-webkit-transform .15s ease-in .05s;transition:transform .15s ease-in .05s;transition:transform .15s ease-in .05s,-webkit-transform .15s ease-in .05s;-webkit-transform-origin:center;transform-origin:center}.el-checkbox__original{opacity:0;outline:0;position:absolute;margin:0;width:0;height:0;z-index:-1}.el-checkbox-button,.el-checkbox-button__inner{display:inline-block;position:relative}.el-checkbox__label{display:inline-block;padding-left:10px;line-height:19px;font-size:14px}.el-checkbox+.el-checkbox{margin-left:30px}.el-checkbox-button__inner{line-height:1;font-weight:500;cursor:pointer;background:#fff;border:1px solid #dcdfe6;border-left:0;color:#606266;-webkit-appearance:none;text-align:center;-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;-webkit-transition:all .3s cubic-bezier(.645,.045,.355,1);transition:all .3s cubic-bezier(.645,.045,.355,1);-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;padding:12px 20px;font-size:14px;border-radius:0}.el-checkbox-button__inner.is-round{padding:12px 20px}.el-checkbox-button__inner:hover{color:#409EFF}.el-checkbox-button__inner [class*=el-icon-]{line-height:.9}.el-checkbox-button__inner [class*=el-icon-]+span{margin-left:5px}.el-checkbox-button__original{opacity:0;outline:0;position:absolute;margin:0;z-index:-1}.el-checkbox-button.is-checked .el-checkbox-button__inner{color:#fff;background-color:#409EFF;border-color:#409EFF;-webkit-box-shadow:-1px 0 0 0 #8cc5ff;box-shadow:-1px 0 0 0 #8cc5ff}.el-checkbox-button.is-checked:first-child .el-checkbox-button__inner{border-left-color:#409EFF}.el-checkbox-button.is-disabled .el-checkbox-button__inner{color:#c0c4cc;cursor:not-allowed;background-image:none;background-color:#fff;border-color:#ebeef5;-webkit-box-shadow:none;box-shadow:none}.el-checkbox-button.is-disabled:first-child .el-checkbox-button__inner{border-left-color:#ebeef5}.el-checkbox-button:first-child .el-checkbox-button__inner{border-left:1px solid #dcdfe6;border-radius:4px 0 0 4px;-webkit-box-shadow:none!important;box-shadow:none!important}.el-checkbox-button.is-focus .el-checkbox-button__inner{border-color:#409EFF}.el-checkbox-button:last-child .el-checkbox-button__inner{border-radius:0 4px 4px 0}.el-checkbox-button--medium .el-checkbox-button__inner{padding:10px 20px;font-size:14px;border-radius:0}.el-checkbox-button--medium .el-checkbox-button__inner.is-round{padding:10px 20px}.el-checkbox-button--small .el-checkbox-button__inner{padding:9px 15px;font-size:12px;border-radius:0}.el-checkbox-button--small .el-checkbox-button__inner.is-round{padding:9px 15px}.el-checkbox-button--mini .el-checkbox-button__inner{padding:7px 15px;font-size:12px;border-radius:0}.el-checkbox-button--mini .el-checkbox-button__inner.is-round{padding:7px 15px}.el-checkbox-group{font-size:0}", ""]);

// exports


/***/ }),

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

module.exports =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/dist/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 122);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 1:
/***/ (function(module, exports) {

module.exports = __webpack_require__(10);

/***/ }),

/***/ 122:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _checkbox = __webpack_require__(123);

var _checkbox2 = _interopRequireDefault(_checkbox);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/* istanbul ignore next */
_checkbox2.default.install = function (Vue) {
  Vue.component(_checkbox2.default.name, _checkbox2.default);
};

exports.default = _checkbox2.default;

/***/ }),

/***/ 123:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_checkbox_vue__ = __webpack_require__(124);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_checkbox_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_checkbox_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_0b40748e_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_checkbox_vue__ = __webpack_require__(125);
var normalizeComponent = __webpack_require__(0)
/* script */

/* template */

/* template functional */
  var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_checkbox_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_0b40748e_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_checkbox_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 124:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _emitter = __webpack_require__(1);

var _emitter2 = _interopRequireDefault(_emitter);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  name: 'ElCheckbox',

  mixins: [_emitter2.default],

  inject: {
    elForm: {
      default: ''
    },
    elFormItem: {
      default: ''
    }
  },

  componentName: 'ElCheckbox',

  data: function data() {
    return {
      selfModel: false,
      focus: false,
      isLimitExceeded: false
    };
  },


  computed: {
    model: {
      get: function get() {
        return this.isGroup ? this.store : this.value !== undefined ? this.value : this.selfModel;
      },
      set: function set(val) {
        if (this.isGroup) {
          this.isLimitExceeded = false;
          this._checkboxGroup.min !== undefined && val.length < this._checkboxGroup.min && (this.isLimitExceeded = true);

          this._checkboxGroup.max !== undefined && val.length > this._checkboxGroup.max && (this.isLimitExceeded = true);

          this.isLimitExceeded === false && this.dispatch('ElCheckboxGroup', 'input', [val]);
        } else {
          this.$emit('input', val);
          this.selfModel = val;
        }
      }
    },

    isChecked: function isChecked() {
      if ({}.toString.call(this.model) === '[object Boolean]') {
        return this.model;
      } else if (Array.isArray(this.model)) {
        return this.model.indexOf(this.label) > -1;
      } else if (this.model !== null && this.model !== undefined) {
        return this.model === this.trueLabel;
      }
    },
    isGroup: function isGroup() {
      var parent = this.$parent;
      while (parent) {
        if (parent.$options.componentName !== 'ElCheckboxGroup') {
          parent = parent.$parent;
        } else {
          this._checkboxGroup = parent;
          return true;
        }
      }
      return false;
    },
    store: function store() {
      return this._checkboxGroup ? this._checkboxGroup.value : this.value;
    },
    isDisabled: function isDisabled() {
      return this.isGroup ? this._checkboxGroup.disabled || this.disabled || (this.elForm || {}).disabled : this.disabled || (this.elForm || {}).disabled;
    },
    _elFormItemSize: function _elFormItemSize() {
      return (this.elFormItem || {}).elFormItemSize;
    },
    checkboxSize: function checkboxSize() {
      var temCheckboxSize = this.size || this._elFormItemSize || (this.$ELEMENT || {}).size;
      return this.isGroup ? this._checkboxGroup.checkboxGroupSize || temCheckboxSize : temCheckboxSize;
    }
  },

  props: {
    value: {},
    label: {},
    indeterminate: Boolean,
    disabled: Boolean,
    checked: Boolean,
    name: String,
    trueLabel: [String, Number],
    falseLabel: [String, Number],
    id: String, /* 当indeterminate为真时，为controls提供相关连的checkbox的id，表明元素间的控制关系*/
    controls: String, /* 当indeterminate为真时，为controls提供相关连的checkbox的id，表明元素间的控制关系*/
    border: Boolean,
    size: String
  },

  methods: {
    addToStore: function addToStore() {
      if (Array.isArray(this.model) && this.model.indexOf(this.label) === -1) {
        this.model.push(this.label);
      } else {
        this.model = this.trueLabel || true;
      }
    },
    handleChange: function handleChange(ev) {
      var _this = this;

      if (this.isLimitExceeded) return;
      var value = void 0;
      if (ev.target.checked) {
        value = this.trueLabel === undefined ? true : this.trueLabel;
      } else {
        value = this.falseLabel === undefined ? false : this.falseLabel;
      }
      this.$emit('change', value, ev);
      this.$nextTick(function () {
        if (_this.isGroup) {
          _this.dispatch('ElCheckboxGroup', 'change', [_this._checkboxGroup.value]);
        }
      });
    }
  },

  created: function created() {
    this.checked && this.addToStore();
  },
  mounted: function mounted() {
    // 为indeterminate元素 添加aria-controls 属性
    if (this.indeterminate) {
      this.$el.setAttribute('aria-controls', this.controls);
    }
  },


  watch: {
    value: function value(_value) {
      this.dispatch('ElFormItem', 'el.form.change', _value);
    }
  }
}; //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/***/ }),

/***/ 125:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('label',{staticClass:"el-checkbox",class:[
    _vm.border && _vm.checkboxSize ? 'el-checkbox--' + _vm.checkboxSize : '',
    { 'is-disabled': _vm.isDisabled },
    { 'is-bordered': _vm.border },
    { 'is-checked': _vm.isChecked }
  ],attrs:{"role":"checkbox","aria-checked":_vm.indeterminate ? 'mixed': _vm.isChecked,"aria-disabled":_vm.isDisabled,"id":_vm.id}},[_c('span',{staticClass:"el-checkbox__input",class:{
      'is-disabled': _vm.isDisabled,
      'is-checked': _vm.isChecked,
      'is-indeterminate': _vm.indeterminate,
      'is-focus': _vm.focus
    },attrs:{"aria-checked":"mixed"}},[_c('span',{staticClass:"el-checkbox__inner"}),(_vm.trueLabel || _vm.falseLabel)?_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.model),expression:"model"}],staticClass:"el-checkbox__original",attrs:{"type":"checkbox","aria-hidden":"true","name":_vm.name,"disabled":_vm.isDisabled,"true-value":_vm.trueLabel,"false-value":_vm.falseLabel},domProps:{"checked":Array.isArray(_vm.model)?_vm._i(_vm.model,null)>-1:_vm._q(_vm.model,_vm.trueLabel)},on:{"change":[function($event){var $$a=_vm.model,$$el=$event.target,$$c=$$el.checked?(_vm.trueLabel):(_vm.falseLabel);if(Array.isArray($$a)){var $$v=null,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.model=$$a.concat([$$v]))}else{$$i>-1&&(_vm.model=$$a.slice(0,$$i).concat($$a.slice($$i+1)))}}else{_vm.model=$$c}},_vm.handleChange],"focus":function($event){_vm.focus = true},"blur":function($event){_vm.focus = false}}}):_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.model),expression:"model"}],staticClass:"el-checkbox__original",attrs:{"type":"checkbox","aria-hidden":"true","disabled":_vm.isDisabled,"name":_vm.name},domProps:{"value":_vm.label,"checked":Array.isArray(_vm.model)?_vm._i(_vm.model,_vm.label)>-1:(_vm.model)},on:{"change":[function($event){var $$a=_vm.model,$$el=$event.target,$$c=$$el.checked?(true):(false);if(Array.isArray($$a)){var $$v=_vm.label,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.model=$$a.concat([$$v]))}else{$$i>-1&&(_vm.model=$$a.slice(0,$$i).concat($$a.slice($$i+1)))}}else{_vm.model=$$c}},_vm.handleChange],"focus":function($event){_vm.focus = true},"blur":function($event){_vm.focus = false}}})]),(_vm.$slots.default || _vm.label)?_c('span',{staticClass:"el-checkbox__label"},[_vm._t("default"),(!_vm.$slots.default)?[_vm._v(_vm._s(_vm.label))]:_vm._e()],2):_vm._e()])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);

/***/ })

/******/ });

/***/ }),

/***/ 64:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(65);
if(typeof content === 'string') content = [[module.i, content, '']];
// add the styles to the DOM
var update = __webpack_require__(2)(content, {});
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../css-loader/index.js!./dialog.css", function() {
			var newContent = require("!!../../../css-loader/index.js!./dialog.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, ".v-modal-enter{-webkit-animation:v-modal-in .2s ease;animation:v-modal-in .2s ease}.v-modal-leave{-webkit-animation:v-modal-out .2s ease forwards;animation:v-modal-out .2s ease forwards}@-webkit-keyframes v-modal-in{0%{opacity:0}}@keyframes v-modal-in{0%{opacity:0}}@-webkit-keyframes v-modal-out{100%{opacity:0}}@keyframes v-modal-out{100%{opacity:0}}.v-modal{position:fixed;left:0;top:0;width:100%;height:100%;opacity:.5;background:#000}.el-popup-parent--hidden{overflow:hidden}.el-dialog{position:relative;margin:0 auto 50px;background:#fff;border-radius:2px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.3);box-shadow:0 1px 3px rgba(0,0,0,.3);-webkit-box-sizing:border-box;box-sizing:border-box;width:50%}.el-dialog.is-fullscreen{width:100%;margin-top:0;margin-bottom:0;height:100%;overflow:auto}.el-dialog__wrapper{position:fixed;top:0;right:0;bottom:0;left:0;overflow:auto;margin:0}.el-dialog__header{padding:20px 20px 10px}.el-dialog__headerbtn{position:absolute;top:20px;right:20px;padding:0;background:0 0;border:none;outline:0;cursor:pointer;font-size:16px}.el-dialog__headerbtn .el-dialog__close{color:#909399}.el-dialog__headerbtn:focus .el-dialog__close,.el-dialog__headerbtn:hover .el-dialog__close{color:#409EFF}.el-dialog__title{line-height:24px;font-size:18px;color:#303133}.el-dialog__body{padding:30px 20px;color:#606266;font-size:14px}.el-dialog__footer{padding:10px 20px 20px;text-align:right;-webkit-box-sizing:border-box;box-sizing:border-box}.el-dialog--center{text-align:center}.el-dialog--center .el-dialog__body{text-align:initial;padding:25px 25px 30px}.el-dialog--center .el-dialog__footer{text-align:inherit}.dialog-fade-enter-active{-webkit-animation:dialog-fade-in .3s;animation:dialog-fade-in .3s}.dialog-fade-leave-active{-webkit-animation:dialog-fade-out .3s;animation:dialog-fade-out .3s}@-webkit-keyframes dialog-fade-in{0%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}100%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0);opacity:1}}@keyframes dialog-fade-in{0%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}100%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0);opacity:1}}@-webkit-keyframes dialog-fade-out{0%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0);opacity:1}100%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}}@keyframes dialog-fade-out{0%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0);opacity:1}100%{-webkit-transform:translate3d(0,-20px,0);transform:translate3d(0,-20px,0);opacity:0}}", ""]);

// exports


/***/ }),

/***/ 66:
/***/ (function(module, exports, __webpack_require__) {

module.exports =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/dist/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 61);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 1:
/***/ (function(module, exports) {

module.exports = __webpack_require__(10);

/***/ }),

/***/ 13:
/***/ (function(module, exports) {

module.exports = __webpack_require__(11);

/***/ }),

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _component = __webpack_require__(62);

var _component2 = _interopRequireDefault(_component);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/* istanbul ignore next */
_component2.default.install = function (Vue) {
  Vue.component(_component2.default.name, _component2.default);
};

exports.default = _component2.default;

/***/ }),

/***/ 62:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_component_vue__ = __webpack_require__(63);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_component_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_component_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_ac4e1f08_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_component_vue__ = __webpack_require__(64);
var normalizeComponent = __webpack_require__(0)
/* script */

/* template */

/* template functional */
  var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_component_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_ac4e1f08_hasScoped_false_preserveWhitespace_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_component_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _popup = __webpack_require__(13);

var _popup2 = _interopRequireDefault(_popup);

var _migrating = __webpack_require__(8);

var _migrating2 = _interopRequireDefault(_migrating);

var _emitter = __webpack_require__(1);

var _emitter2 = _interopRequireDefault(_emitter);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  name: 'ElDialog',

  mixins: [_popup2.default, _emitter2.default, _migrating2.default],

  props: {
    title: {
      type: String,
      default: ''
    },

    modal: {
      type: Boolean,
      default: true
    },

    modalAppendToBody: {
      type: Boolean,
      default: true
    },

    appendToBody: {
      type: Boolean,
      default: false
    },

    lockScroll: {
      type: Boolean,
      default: true
    },

    closeOnClickModal: {
      type: Boolean,
      default: true
    },

    closeOnPressEscape: {
      type: Boolean,
      default: true
    },

    showClose: {
      type: Boolean,
      default: true
    },

    width: String,

    fullscreen: Boolean,

    customClass: {
      type: String,
      default: ''
    },

    top: {
      type: String,
      default: '15vh'
    },
    beforeClose: Function,
    center: {
      type: Boolean,
      default: false
    }
  },

  data: function data() {
    return {
      closed: false
    };
  },


  watch: {
    visible: function visible(val) {
      var _this = this;

      if (val) {
        this.closed = false;
        this.$emit('open');
        this.$el.addEventListener('scroll', this.updatePopper);
        this.$nextTick(function () {
          _this.$refs.dialog.scrollTop = 0;
        });
        if (this.appendToBody) {
          document.body.appendChild(this.$el);
        }
      } else {
        this.$el.removeEventListener('scroll', this.updatePopper);
        if (!this.closed) this.$emit('close');
      }
    }
  },

  computed: {
    style: function style() {
      var style = {};
      if (this.width) {
        style.width = this.width;
      }
      if (!this.fullscreen) {
        style.marginTop = this.top;
      }
      return style;
    }
  },

  methods: {
    getMigratingConfig: function getMigratingConfig() {
      return {
        props: {
          'size': 'size is removed.'
        }
      };
    },
    handleWrapperClick: function handleWrapperClick() {
      if (!this.closeOnClickModal) return;
      this.handleClose();
    },
    handleClose: function handleClose() {
      if (typeof this.beforeClose === 'function') {
        this.beforeClose(this.hide);
      } else {
        this.hide();
      }
    },
    hide: function hide(cancel) {
      if (cancel !== false) {
        this.$emit('update:visible', false);
        this.$emit('close');
        this.closed = true;
      }
    },
    updatePopper: function updatePopper() {
      this.broadcast('ElSelectDropdown', 'updatePopper');
      this.broadcast('ElDropdownMenu', 'updatePopper');
    },
    afterLeave: function afterLeave() {
      this.$emit('closed');
    }
  },

  mounted: function mounted() {
    if (this.visible) {
      this.rendered = true;
      this.open();
      if (this.appendToBody) {
        document.body.appendChild(this.$el);
      }
    }
  },
  destroyed: function destroyed() {
    // if appendToBody is true, remove DOM node after destroy
    if (this.appendToBody && this.$el && this.$el.parentNode) {
      this.$el.parentNode.removeChild(this.$el);
    }
  }
}; //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/***/ }),

/***/ 64:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('transition',{attrs:{"name":"dialog-fade"},on:{"after-leave":_vm.afterLeave}},[_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.visible),expression:"visible"}],staticClass:"el-dialog__wrapper",on:{"click":function($event){if($event.target !== $event.currentTarget){ return null; }_vm.handleWrapperClick($event)}}},[_c('div',{ref:"dialog",staticClass:"el-dialog",class:[{ 'is-fullscreen': _vm.fullscreen, 'el-dialog--center': _vm.center }, _vm.customClass],style:(_vm.style)},[_c('div',{staticClass:"el-dialog__header"},[_vm._t("title",[_c('span',{staticClass:"el-dialog__title"},[_vm._v(_vm._s(_vm.title))])]),(_vm.showClose)?_c('button',{staticClass:"el-dialog__headerbtn",attrs:{"type":"button","aria-label":"Close"},on:{"click":_vm.handleClose}},[_c('i',{staticClass:"el-dialog__close el-icon el-icon-close"})]):_vm._e()],2),(_vm.rendered)?_c('div',{staticClass:"el-dialog__body"},[_vm._t("default")],2):_vm._e(),(_vm.$slots.footer)?_c('div',{staticClass:"el-dialog__footer"},[_vm._t("footer")],2):_vm._e()])])])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);

/***/ }),

/***/ 8:
/***/ (function(module, exports) {

module.exports = __webpack_require__(23);

/***/ })

/******/ });

/***/ }),

/***/ 67:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "el-dialog",
    {
      staticClass: "login-box",
      attrs: { visible: _vm.dialogVisible, width: "420px" },
      on: {
        "update:visible": function($event) {
          _vm.dialogVisible = $event
        }
      }
    },
    [
      _vm.active === 1
        ? _c(
            "div",
            [
              _c("div", { staticClass: "title" }, [_vm._v("手机快捷登录")]),
              _vm._v(" "),
              _c("div", { staticClass: "small-title" }, [
                _vm._v("登录享受更多楚楼网服务")
              ]),
              _vm._v(" "),
              _c("form", [
                _c("div", { staticClass: "input-box" }, [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.tel,
                        expression: "tel"
                      }
                    ],
                    attrs: { type: "text", placeholder: "请输入手机号" },
                    domProps: { value: _vm.tel },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.tel = $event.target.value
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "input-box" }, [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.code,
                        expression: "code"
                      }
                    ],
                    attrs: { type: "text", placeholder: "4位短信验证码" },
                    domProps: { value: _vm.code },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.code = $event.target.value
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "sms-btn-box" }, [
                    _vm.secondNum <= 0
                      ? _c(
                          "button",
                          {
                            staticClass: "pointer",
                            attrs: { type: "button" },
                            on: { click: _vm.getCode }
                          },
                          [_vm._v("获取验证码")]
                        )
                      : _c("button", { attrs: { type: "button" } }, [
                          _vm._v(_vm._s(_vm.secondNum) + "s后重新发送")
                        ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticStyle: { position: "relative" } }, [
                _c("div", { staticStyle: { position: "absolute" } }, [
                  !_vm.isTel
                    ? _c("span", { staticStyle: { color: "red" } }, [
                        _vm._v("·请输入11位手机号")
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  !_vm.isCode
                    ? _c("span", { staticStyle: { color: "red" } }, [
                        _vm._v("·请输入4位短信验证码")
                      ])
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c(
                "el-checkbox",
                {
                  staticStyle: { "margin-top": "25px" },
                  model: {
                    value: _vm.checked,
                    callback: function($$v) {
                      _vm.checked = $$v
                    },
                    expression: "checked"
                  }
                },
                [_vm._v("7天内免登录")]
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "btn-box" },
                [
                  _c(
                    "el-button",
                    { attrs: { type: "primary" }, on: { click: _vm.login } },
                    [_vm._v("登录")]
                  )
                ],
                1
              )
            ],
            1
          )
        : _vm._e()
    ]
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1639a0aa", module.exports)
  }
}

/***/ }),

/***/ 7:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;
exports.noop = noop;
exports.hasOwn = hasOwn;
exports.toObject = toObject;
exports.getPropByPath = getPropByPath;
var hasOwnProperty = Object.prototype.hasOwnProperty;

function noop() {};

function hasOwn(obj, key) {
  return hasOwnProperty.call(obj, key);
};

function extend(to, _from) {
  for (var key in _from) {
    to[key] = _from[key];
  }
  return to;
};

function toObject(arr) {
  var res = {};
  for (var i = 0; i < arr.length; i++) {
    if (arr[i]) {
      extend(res, arr[i]);
    }
  }
  return res;
};

var getValueByPath = exports.getValueByPath = function getValueByPath(object, prop) {
  prop = prop || '';
  var paths = prop.split('.');
  var current = object;
  var result = null;
  for (var i = 0, j = paths.length; i < j; i++) {
    var path = paths[i];
    if (!current) break;

    if (i === j - 1) {
      result = current[path];
      break;
    }
    current = current[path];
  }
  return result;
};

function getPropByPath(obj, path, strict) {
  var tempObj = obj;
  path = path.replace(/\[(\w+)\]/g, '.$1');
  path = path.replace(/^\./, '');

  var keyArr = path.split('.');
  var i = 0;
  for (var len = keyArr.length; i < len - 1; ++i) {
    if (!tempObj && !strict) break;
    var key = keyArr[i];
    if (key in tempObj) {
      tempObj = tempObj[key];
    } else {
      if (strict) {
        throw new Error('please transfer a valid prop path to form item!');
      }
      break;
    }
  }
  return {
    o: tempObj,
    k: keyArr[i],
    v: tempObj ? tempObj[keyArr[i]] : null
  };
};

var generateId = exports.generateId = function generateId() {
  return Math.floor(Math.random() * 10000);
};

var valueEquals = exports.valueEquals = function valueEquals(a, b) {
  // see: https://stackoverflow.com/questions/3115982/how-to-check-if-two-arrays-are-equal-with-javascript
  if (a === b) return true;
  if (!(a instanceof Array)) return false;
  if (!(b instanceof Array)) return false;
  if (a.length !== b.length) return false;
  for (var i = 0; i !== a.length; ++i) {
    if (a[i] !== b[i]) return false;
  }
  return true;
};

/***/ }),

/***/ 8:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(process) {

var utils = __webpack_require__(0);
var normalizeHeaderName = __webpack_require__(40);

var DEFAULT_CONTENT_TYPE = {
  'Content-Type': 'application/x-www-form-urlencoded'
};

function setContentTypeIfUnset(headers, value) {
  if (!utils.isUndefined(headers) && utils.isUndefined(headers['Content-Type'])) {
    headers['Content-Type'] = value;
  }
}

function getDefaultAdapter() {
  var adapter;
  if (typeof XMLHttpRequest !== 'undefined') {
    // For browsers use XHR adapter
    adapter = __webpack_require__(15);
  } else if (typeof process !== 'undefined') {
    // For node use HTTP adapter
    adapter = __webpack_require__(15);
  }
  return adapter;
}

var defaults = {
  adapter: getDefaultAdapter(),

  transformRequest: [function transformRequest(data, headers) {
    normalizeHeaderName(headers, 'Content-Type');
    if (utils.isFormData(data) ||
      utils.isArrayBuffer(data) ||
      utils.isBuffer(data) ||
      utils.isStream(data) ||
      utils.isFile(data) ||
      utils.isBlob(data)
    ) {
      return data;
    }
    if (utils.isArrayBufferView(data)) {
      return data.buffer;
    }
    if (utils.isURLSearchParams(data)) {
      setContentTypeIfUnset(headers, 'application/x-www-form-urlencoded;charset=utf-8');
      return data.toString();
    }
    if (utils.isObject(data)) {
      setContentTypeIfUnset(headers, 'application/json;charset=utf-8');
      return JSON.stringify(data);
    }
    return data;
  }],

  transformResponse: [function transformResponse(data) {
    /*eslint no-param-reassign:0*/
    if (typeof data === 'string') {
      try {
        data = JSON.parse(data);
      } catch (e) { /* Ignore */ }
    }
    return data;
  }],

  timeout: 0,

  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',

  maxContentLength: -1,

  validateStatus: function validateStatus(status) {
    return status >= 200 && status < 300;
  }
};

defaults.headers = {
  common: {
    'Accept': 'application/json, text/plain, */*'
  }
};

utils.forEach(['delete', 'get', 'head'], function forEachMethodNoData(method) {
  defaults.headers[method] = {};
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  defaults.headers[method] = utils.merge(DEFAULT_CONTENT_TYPE);
});

module.exports = defaults;

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(72)))

/***/ }),

/***/ 9:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ })

},[335]);
>>>>>>> origin/wanghao

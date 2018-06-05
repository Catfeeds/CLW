/**
 * Created by zxz1992 on 2018/6/5.
 */
require('./home_common');
import BaiduMap from 'vue-baidu-map'
Vue.use(BaiduMap, {
  ak: process.env.baiduAK
});

new Vue({
  el: '#app'
});
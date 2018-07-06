/**
 * Created by zxz1992 on 2018/6/5.
 */
require('./home_common');
import LookForHouse from './components/mapFindHouse'
Vue.component('self-div', LookForHouse)
new Vue({
  el: '#app'
});
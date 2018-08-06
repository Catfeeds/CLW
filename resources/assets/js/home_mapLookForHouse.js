/**
 * Created by zxz1992 on 2018/6/5.
 */
require('./home_common');
import { Loading } from 'element-ui'
import LookForHouse from './components/mapFindHouse'
Vue.prototype.$loading = Loading.service
Vue.use(Loading.directive)
Vue.component('self-div', LookForHouse)
new Vue({
  el: '#app'
});
import Vue from 'vue'
import { Button, Cell, Navbar, TabItem  } from 'mint-ui'
Vue.component(Button.name, Button)
Vue.component(Cell.name, Cell)
Vue.component(Navbar.name, Navbar);
Vue.component(TabItem.name, TabItem);
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */

const app = new Vue({
    el: '#app',
    data: {
        selected: '1'
    }
})
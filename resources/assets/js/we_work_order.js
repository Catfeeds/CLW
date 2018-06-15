import Vue from 'vue'
import { Button, Cell, Navbar, TabItem, Actionsheet  } from 'mint-ui'

Vue.component(Actionsheet.name, Actionsheet);
Vue.component(Button.name, Button)
Vue.component(Cell.name, Cell)
Vue.component(Navbar.name, Navbar);
Vue.component(TabItem.name, TabItem);
/* 或写为
 * Vue.use(Button)
 * Vue.use(Cell)
 */
var sheetClick = function(e) {
    console.log('e', e)
}
const app = new Vue({
    el: '#app',
    data: {
        selected: '1',
        sheetVisible: false,
        actions: [{
            id: 1,
            name: '业务员A',
            method: sheetClick
        },
        {
            id: 2,
            name: '业务员B',
            method: sheetClick
        },
        {
            id: 3,
            name: '业务员C',
            method: sheetClick
        },
        {
            id: 4,
            name: '业务员D',
            method: sheetClick
        },
        {
            id: 5,
            name: '业务员E',
            method: sheetClick
        },
        {
            id: 6,
            name: '业务员F',
            method: sheetClick
        }]
    },
    methods: {
        sheet() {
            this.sheetVisible = !this.sheetVisible
        }
    }
})

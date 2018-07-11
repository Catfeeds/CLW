
import Vue from 'vue';
import App from './inputSearch'
export function init(selector) {
  $(selector).addClass('js_vueSearch') // 添加vue启动钩子
  var placeholder = $(selector).attr('placeholder')
  new Vue({
    el: '.js_vueSearch',
    components: { App },
    template: '<app placeholder="'+placeholder+'"></app>'
  })
}
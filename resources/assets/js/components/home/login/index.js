import login from './login'
var loginHtml = new Vue({
  el: '#login',
  components: { login },
  template: '<login ref="login"/>'
})
$(document).on('click', 'a.js_login', function() {
  loginHtml.$refs.login.show()
})
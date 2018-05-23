/**
 * Created by zxz1992 on 2018/5/22.
 */
var mix = require('laravel-mix'),
    webpack = require('webpack'),
    envCof = require('./env.js'),
    commonSCSSPath = 'resources/assets/sass/', // scss 目录
    commonOutCSSPath = 'public/css/', // css 输出目录
    commonJSPath = 'resources/assets/js/', // js 脚本源文件目录
    commonJSOutPath = 'public/js/'; // js 输出目录
var envConfig = new webpack.DefinePlugin({
  'process.env': envCof
});
mix.webpackConfig({
  plugins: [
    envConfig
  ]
});
var fileSCSSNameArr = [
  'we_home', 
  'we_building_detail', 
  'we_building_index', 
  'we_house_detail', 
  'we_login_new',
  'we_login_password',
  'we_login_quick',
  'we_map',
  'we_map_controls',
  'we_register',
  'we_serve_detail',
  'we_serve_index',
  'we_user_about_us',
  'we_user_browsing_history',
  'we_user_collect',
  'we_user_find_house',
  'we_user_house_resources',
  'we_user_index',
  'we_user_revise_password',
  'we_user_revise_phone1',
  'we_user_revise_phone2',
  'we_user_setting'
];// 要打包的 scss 文件
var fileSJSNameArr = [
  'we_home',
  'we_building_detail',
  'we_building_index',
  'we_house_detail',
  'we_recommed',
  // 'we_login_new',
  // 'we_house_detail',
  'we_login_new',
  // 'we_login_password',
  // 'we_login_quick',
  // 'we_map',
  // 'we_map_controls',
  'we_register',
  // 'we_serve_detail',
  // 'we_serve_index',
  // 'we_user_about_us',
  // 'we_user_browsing_history',
  // 'we_user_collect',
  // 'we_user_find_house',
  // 'we_user_house_resources',
  // 'we_user_index',
  // 'we_user_revise_password',
  // 'we_user_revise_phone1',
  // 'we_user_revise_phone2',
  // 'we_user_setting'
];// 要打包的 js 文件
function inOutCss(fileName) {
  mix.sass(commonSCSSPath+fileName+'.scss', commonOutCSSPath+fileName+'.css', {
    outputStyle:'compressed'
  });
}
function inOutJs(fileName, obj) {
  var app;
  if (obj === null) {
    app = mix.js(commonJSPath+fileName+'.js', commonJSOutPath+fileName+'.js', {
      outputStyle:'compressed'
    });
  } else {
    app = obj.js(commonJSPath+fileName+'.js', commonJSOutPath+fileName+'.js', {
      outputStyle:'compressed'
    });
  }
  return app
}
fileSCSSNameArr.map(function (item) {
  inOutCss(item)
});
var JSObj = null;
fileSJSNameArr.map(function (item) {
  JSObj = inOutJs(item, JSObj)
});
JSObj.extract([ // 提出全局多次引入文件
  'vue',
  'jquery',
  './resources/assets/js/components/buildingList',
  'vue-awesome-swiper',
  'mint-ui',
  'mint-ui/lib/style.css'
]);

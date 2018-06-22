/**
 * Created by zxz1992 on 2018/5/22.
 */
var mix = require('laravel-mix'),
    webpack = require('webpack'),
    envCof = require('./env.js'),
    map = require('./sourceMap'),
    CMDARR = process.env.npm_lifecycle_event.split(':'),
    isStatus = CMDARR.length === 2 && (CMDARR[0] === 'test' || CMDARR[0] === 'online')
if (isStatus) {
  envCof = deepMerge(envCof.baseConfig, envCof[CMDARR[0]].envConfig)
} else {
  envCof = envCof.baseConfig
}

var commonSCSSPath = map.commonSCSSPath, // scss 目录
    commonOutCSSPath = map.commonOutCSSPath, // css 输出目录
    commonJSPath = map.commonJSPath, // js 脚本源文件目录
    commonJSOutPath = map.commonJSOutPath; // js 输出目录
var envConfig = new webpack.DefinePlugin({
  'process.env': envCof
});
var sourceMap = 'we';
// sourceMap 赋值在package.json中
if (process.env.sourceMap !== undefined) {
  sourceMap = process.env.sourceMap
}
var commonsChunk =  new webpack.optimize.CommonsChunkPlugin({
  names: commonJSOutPath + map[sourceMap].manifestName,
  minChunks: Infinity
});
mix.webpackConfig({
  plugins: [
    envConfig,
    commonsChunk
  ]
});
var fileSCSSNameArr = map[sourceMap].scss;// 要打包的 scss 文件
var fileSJSNameArr = map[sourceMap].js;// 要打包的 js 文件
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
JSObj.setPublicPath('./');
if (map[sourceMap].extract && map[sourceMap].extract.length>0) {
  JSObj.extract(map[sourceMap].extract, commonJSOutPath+map[sourceMap].vendorName); // 提出全局多次引入文件
}
// 对象深度合并
function deepMerge(obj1, obj2) {
  var key;
  for(key in obj2) {
      // 如果target(也就是obj1[key])存在，且是对象的话再去调用deepMerge，否则就是obj1[key]里面没这个对象，需要与obj2[key]合并
      obj1[key] = obj1[key] && obj1[key].toString() === "[object Object]" ?
      deepMerge(obj1[key], obj2[key]) : obj1[key] = obj2[key];
  }
  return obj1;
}
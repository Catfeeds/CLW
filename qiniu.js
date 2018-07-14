/**
 * Created by zxz1992 on 2018/5/26.
 */
/********************************
 *                              *
 *  楚楼网前端项目组七牛云上传组件   *
 *                              *
 ********************************/
const CMDARR = process.env.npm_lifecycle_event.split(':')
if (CMDARR.length < 2) {
 return
}

const QiNiu = require("qiniu");
const Config = require('./env')[CMDARR[0]][CMDARR[1]];
const  FS = require('fs');
const  Join = require('path').join;
const colors = require( "colors"); // console颜色模块
const readline = require('readline'); // 命令行模块
colors.setTheme({
  silly: 'rainbow',
  input: 'grey',
  verbose: 'cyan',
  prompt: 'grey',
  info: 'green',
  data: 'grey',
  help: 'cyan',
  warn: 'yellow',
  debug: 'blue',
  error: 'red'
}); // console颜色主题
//七牛 Access Key 和 Secret Key
QiNiu.conf.ACCESS_KEY = Config.QiNui.ACCESS_KEY;
QiNiu.conf.SECRET_KEY = Config.QiNui.SECRET_KEY;
Bucket = Config.QiNui.Bucket;
var conf = new QiNiu.conf.Config(); // 当前七牛配置
const mac = new QiNiu.auth.digest.Mac(Config.QiNui.ACCESS_KEY, Config.QiNui.SECRET_KEY);
const bucketManager = new QiNiu.rs.BucketManager(mac, conf); // 七牛文件管理
var fileList = []
/**
 * 获取上传token
 * @param {String} bucket 上传桶名
 * @param {String} key 上传后的路径名称
 * @returns {String} 上传token
 */
function getToken(key, bucket=Bucket) {
  var options = {scope: bucket+":"+key, detectMime: 2}
  var putPolicy = new QiNiu.rs.PutPolicy(options);
  return putPolicy.uploadToken();
}
/**
 * 判断当前路径是否在忽略文件数组中
 * @param {String} path 路径
 */
function isNore(path) {
  for( var item of Config.QiNui.uploadNore) { // 遍历忽略数组
    if (path.indexOf(item) !== -1) {
      return false
    }
  }
  return true
}
/**
 * 创建上传路径与本地路由映射关系
 * @param {String} startPath 搜索路径
 * @returns {Array} 文件健值对
 */
function findSync(startPath) {
  let targetObj={};
  function finder(path) {
    let files=FS.readdirSync(path);
    files.forEach((val,index) => {
      let fPath=Join(path,val);
      let stats=FS.statSync(fPath);
      if(stats.isDirectory()) {
        finder(fPath);
      }
      if(stats.isFile() && isNore(fPath)) {
        targetObj[fPath.replace(startPath, Config.QiNui.CDNMkdir)] = fPath;
      }
    });
  }
  finder(startPath);
  return targetObj;
}
/**
 * 获取七牛云文件列表成功
 */
function getListSuccess() {
  console.log('\n')
  console.log(('七牛桶名：'+ Bucket +' 的文件列表关系构建成功,可开始部署').info);
  console.log('\n')
  if (fileList.length === 0) {
    console.log((Bucket +' 中的文件列表为空,跳过删除操作,进行部署操作').debug);
    uploadFile();
    return
  }
  var rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
    prompt: (Bucket +' 中的文件列表不为空,'+'是否删除 '+Bucket+' 中已经被部署的的文件> (Y/N)').warn
  });
  rl.prompt();
  rl.on('line', (line) => {
    switch (line.trim()) {
      case 'y':
      case 'Y':
        console.log('开始执行删除操作'.help);
        delFile(rl);
        break;
      case 'n':
      case 'N':
        console.log('您取消了删除操作'.help);
        rl.close();
        uploadFile();
        break;
      default:
        console.log(`你输入的：'${line.trim()}'为无效命令，请重新输入`.warn);
        rl.prompt();
        break;
    }
  })
}
/**
 * 分页请求当前文件列表
 * @param {String} marker 上一次列举返回的位置标记，作为本次列举的起点信息
 */
function getQiniuFileList(marker = false) {
  var bucketManagerOptions = {}
  if (marker) {
    bucketManagerOptions = {
      limit: Config.QiNui.listLimit,
      prefix: Config.QiNui.CDNMkdir,
      marker: marker
    };
  } else {
    bucketManagerOptions = {
      limit: Config.QiNui.listLimit,
      prefix: Config.QiNui.CDNMkdir
    };
  }
  bucketManager.listPrefix(Bucket, bucketManagerOptions, function(err, respBody, respInfo) {
    if (err) {
      console.log('获取七牛云文件列表失败'.error);
      console.log(err.error);
      return false
    }
    if (respInfo.statusCode === 200) {
      //如果这个nextMarker不为空，那么还有未列举完毕的文件列表，下次调用listPrefix的时候，
      //指定options里面的marker为这个值
      var nextMarker = respBody.marker;
      // console.log(nextMarker);
      var items = respBody.items;
      for(var item of items) {
        fileList.push(item.key)
      }
      if (nextMarker) {
        getQiniuFileList(nextMarker)
      } else {
        getListSuccess()
      }
    } else {
      console.log(('获取七牛云文件列表失败,错误代码:'+ respInfo.statusCode).error);
    }
  });
}
/**
 * 删除七牛中被部署的文件
 * @param {Object} rlObj 删除命令行界面
 */
function delFile(rlObj) {
  fileList.forEach((item, index) => {
    bucketManager.delete(Bucket, item, function(err, respBody, respInfo) {
      if (err) {
        console.log(('远程文件：'+item+'删除失败').error)
      } else {
        console.log(('远程文件：'+item+'已被删除！').warn)
      }
      if (index + 1 === fileList.length) {
        console.log(('远程文件删除完毕').warn)
        console.log(('加载上传模块中。。。。').warn)
        setTimeout(function(){
          uploadFile();
        }, 2000)
      }
    });
  })
  rlObj.close();
}
function uploadFile() {
  var config = new QiNiu.conf.Config();
  var formUploader = new QiNiu.form_up.FormUploader(config);
  var extra = new QiNiu.form_up.PutExtra();
  var srcObj = findSync(Config.QiNui.targetScr); // 上传文件映射关系 {远程路径: 本地路径}
  console.log(('开始执行七牛文件部署').info)
  for (var index in srcObj) {
      console.log('这是坐标', index)
    console.log(srcObj[index],'=>'.debug,index.info, '远程映射关系构建中'.info)
    formUploader.putFile(getToken(index), index, srcObj[index], extra, function(respErr, respBody, respInfo) {
      if (respErr) {
        console.log('error')
        console.log(respErr)
        console.log(respInfo)
        return
      }
      if (respInfo.statusCode === 200) {
        console.log(('远程文件：'+respBody.key+'部署成功。').info);
      } else {
          console.log('error')
          console.log(respErr)
          console.log(respInfo)
      }
    });
  }
}

const pushQiniu = function(token, index, srcIndex, extra) {
  return new Promise(function (resolve, reject) {
    formUploader.putFile(token, index, srcIndex, extra, function(respErr, respBody, respInfo) {
      if (respErr) {
        reject(respErr)
        return
      }
      if (respInfo.statusCode === 200) {
        console.log(('远程文件：'+respBody.key+'部署成功。').info);
        resolve(respBody.key);
      } else {
          console.log('error')
          return reject(respInfo)
      }
    });
  });
}
// 上传请打开他
getQiniuFileList();
/**
 * Created by zxz1992 on 2018/5/22.
 */
module.exports = {
  baseConfig: { // 开发配置
    weHostURl: "''", // 微信接口服务器地址
    agencyHostURL: "'http://192.168.0.199'", // 中介服务器接口地址
    homeHostUrl:"''",
    baiduAK: "'GNEfPXFcuuKglYSB8R45IzmhzfjKDclf'", // 百度地图key
    config: { // 打包配置
      cropStylist: { // app图片剪裁样式 命名应与七牛剪裁样式名一致
        newApp_list: "'?imageMogr2/thumbnail/!240x180r/gravity/Center/crop/240x180/format/jpg/blur/1x0/quality/75'",
        newApp_detail: "'?imageMogr2/thumbnail/!800x600r/gravity/Center/crop/800x600/blur/1x0/quality/75|watermark/1/image/aHR0cHM6Ly9jZG4uY2h1bG91d2FuZy5jb20vbG9nb19taW5pLnBuZw==/dissolve/100/gravity/NorthWest/dx/10/dy/10|imageslim'"
      }
    },
  },
  test: { // 测试服务器配置
    envConfig:{ // 测试服务器配置
      agencyHostURL: '"http://agency_api.jacklin.club"'
    },
    we: { // 微信项目上传配置
      QiNui: { // 七牛上传配置
        ACCESS_KEY: 'VtiPrFI04u-X492-TTqgYCuLfVlkRcnQArwBheI4', // 七牛accessKey
        SECRET_KEY: 'CzgcaR4sTTwPVfdyONnMRERidc3g7hwPC_NWGD5l', // 七牛secretKey
        Bucket: 'chulouwang-cdn', // 上传桶名
        targetScr: 'public/', // 本地上传目录(已执行命令的目录位置为相对路径)
        listLimit: 100, // 每次获取七牛云存储文件列表数量
        uploadNore: ['.DS_Store', 'index.php', 'home_img', 'robots.txt', 'web.config', 'mix-manifest.json', 'mix.js', '.htaccess'], // 忽略文件数组（可以为文件或文件夹）
        CDNMkdir: 'CLWTest/we/'
      }
    },
    home: { // PC站上传配置
      QiNui: { // 七牛上传配置
        ACCESS_KEY: 'VtiPrFI04u-X492-TTqgYCuLfVlkRcnQArwBheI4', // 七牛accessKey
        SECRET_KEY: 'CzgcaR4sTTwPVfdyONnMRERidc3g7hwPC_NWGD5l', // 七牛secretKey
        Bucket: 'chulouwang-cdn', // 上传桶名
        targetScr: 'public/', // 本地上传目录(已执行命令的目录位置为相对路径)
        listLimit: 100, // 每次获取七牛云存储文件列表数量
        uploadNore: ['.DS_Store', 'mui', 'we_img', 'index.php', 'robots.txt', 'web.config', 'mix-manifest.json', 'mix.js', '.htaccess'], // 忽略文件数组（可以为文件或文件夹）
        CDNMkdir: 'CLWTest/home/'
      }
    }
  },
  online: { // 正式服务器配置
    envConfig:{ // 正式服务器配置
      agencyHostURL: '"http://agency_api.chulouwang.com"'
    },
    we: { // 微信项目上传配置
      QiNui: { // 七牛上传配置
        ACCESS_KEY: 'VtiPrFI04u-X492-TTqgYCuLfVlkRcnQArwBheI4', // 七牛accessKey
        SECRET_KEY: 'CzgcaR4sTTwPVfdyONnMRERidc3g7hwPC_NWGD5l', // 七牛secretKey
        Bucket: 'chulouwang-cdn', // 上传桶名
        targetScr: 'public/', // 本地上传目录(已执行命令的目录位置为相对路径)
        listLimit: 100, // 每次获取七牛云存储文件列表数量
        uploadNore: ['.DS_Store', 'index.php', 'home_img', 'robots.txt', 'web.config', 'mix-manifest.json', 'mix.js', '.htaccess'], // 忽略文件数组（可以为文件或文件夹）
        CDNMkdir: 'CLW/we/'
      }
    },
    home: { // PC站上传配置
      QiNui: { // 七牛上传配置
        ACCESS_KEY: 'VtiPrFI04u-X492-TTqgYCuLfVlkRcnQArwBheI4', // 七牛accessKey
        SECRET_KEY: 'CzgcaR4sTTwPVfdyONnMRERidc3g7hwPC_NWGD5l', // 七牛secretKey
        Bucket: 'chulouwang-cdn', // 上传桶名
        targetScr: 'public/', // 本地上传目录(已执行命令的目录位置为相对路径)
        listLimit: 100, // 每次获取七牛云存储文件列表数量
        uploadNore: ['.DS_Store', 'mui', 'we_img', 'index.php', 'robots.txt', 'web.config', 'mix-manifest.json', 'mix.js', '.htaccess'], // 忽略文件数组（可以为文件或文件夹）
        CDNMkdir: 'CLW/home/'
      }
    }
  }
};
/**
 * Created by zxz1992 on 2018/5/22.
 */
module.exports = {
  config: {
    cropStylist: { // app图片剪裁样式 命名应与七牛剪裁样式名一致
      newApp_list: "'?imageMogr2/thumbnail/!240x180r/gravity/Center/crop/240x180/format/jpg/blur/1x0/quality/75'",
      newApp_detail: "'?imageMogr2/thumbnail/!400x300r/gravity/Center/crop/400x300/blur/1x0/quality/75|watermark/1/image/aHR0cHM6Ly9jZG4uY2h1bG91d2FuZy5jbi9sb2dvX21pbl9taW4ucG5n/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim'"
    }
  }
}
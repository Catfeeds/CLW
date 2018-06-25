/**
 * Created by zxz1992 on 2018/6/5.
 */
module.exports = {
  commonSCSSPath: 'resources/assets/sass/', // scss 目录
  commonOutCSSPath: 'public/css/', // css 输出目录
  commonJSPath: 'resources/assets/js/', // js 脚本源文件目录
  commonJSOutPath: 'public/js/', // js 输出目录
  // 微信or移动端前端项目文件
  we: {
    // scss 文件
    scss: [
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
      'we_work',
      'we_appDownload'
    ],
    // js 文件
    js: [
      'we_home',
      'we_building_detail',
      'we_building_index',
      'we_house_detail',
      'we_recommed',
      'we_login_new',
      'we_login_password',
      'we_login_quick',
      'we_register',
      'we_map_detail',
      'we_user_brows_history',
      'we_user_collect',
      'we_user_find_house',
      'we_user_house_resources',
      'we_user_index',
      'we_user_revise_password',
      'we_user_revise_phone1',
      'we_user_revise_phone2',
      'we_user_setting',
      'we_work_order_shopowner',
      'we_work_order_salesman',
      'we_appDownload'
    ],
    vendorName: 'we_vendor', // 自定义vendor文件名
    manifestName: 'we_manifest',// 自定义manifest文件名
    // 重复引用js文件
    extract: [
      './resources/assets/js/we_common',
      './resources/assets/js/components/buildingList',
      './resources/assets/js/components/houseList',
      './resources/assets/js/components/detailBanner',
      './resources/assets/js/components/houseDetailList',
      'vue-awesome-swiper',
      'mint-ui',
      'mint-ui/lib/style.css',
      'vue-baidu-map',
      'swiper'
    ]
  },
  // pc端资源
  home: {
    scss: [
      'home_mapLookForHouse',
      'home_index'
    ],
    js: [
      'home_mapLookForHouse',
      'home_index'
    ],
    vendorName: 'home_vendor',
    manifestName: 'home_manifest',
    extract: [
      './resources/assets/js/home_common'
    ]
  }
};
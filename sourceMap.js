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
      'we_user_setting',
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
      'home_index', // 首页
      'home_mapLookForHouse', // 地图找房
      'home_house_detail', // 房源详情
      'home_building_detail', // 楼盘详情
      'home_house_list', // 楼盘列表
      'home_information', // 资讯中心
      'home_sellhouse', // 委托找房
      'home_information_show', // 资讯详情
      'home_launchouse', // 投放房源
      'home_topic', // 精选专题
      'home_about_we' // 关于我们
    ],
    js: [
      'home_index',
      'home_mapLookForHouse',
      'home_footer',
      'home_house_detail',
      'home_building_detail',
      'home_house_list',
      'home_information',
      'home_sellhouse',
      'home_launchouse',
      'home_about_we' // 关于我们
    ],
    vendorName: 'home_vendor',
    manifestName: 'home_manifest',
    extract: [
      './resources/assets/js/home_common'
    ]
  },
  // 商城资源
  shop: {
    scss: [
      'shop_index',
      'shop_list'
    ],
    js: [

    ],
    vendorName: 'shop_vendor',
    manifestName: 'shop_manifest',
    extract: [

    ]
  }
};
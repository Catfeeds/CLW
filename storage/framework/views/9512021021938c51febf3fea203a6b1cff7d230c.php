<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <link rel="shortcut icon" href="<?php echo e(res('/favicon.ico')); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="stylesheet" href="<?php echo e(res('/css/mui/mui.css')); ?>">
    <title><?php $__env->startSection('title'); ?>楚楼网--找写字楼上楚楼网十分钟轻松搞定<?php echo $__env->yieldSection(); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <script>
        // 百度统计 商桥客服
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?a8bb44e51deceeae65bac46930eab06e";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script src="<?php echo e(res('/js/we_manifest.js')); ?>"></script>
    <script src="<?php echo e(res('/js/we_vendor.js')); ?>"></script>
    <?php echo $__env->yieldContent('header'); ?>
</head>
<body>
<div id="layout" style="max-width: 768px;margin: 0 auto">
    <?php echo $__env->yieldContent('body'); ?>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="stylesheet" href="/css/mui/mui.css">
    <title><?php $__env->startSection('title'); ?>楚楼网--找写字楼上楚楼网十分钟轻松搞定<?php echo $__env->yieldSection(); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <?php echo $__env->yieldContent('header'); ?>
</head>
<body>
<?php echo $__env->yieldContent('body'); ?>
</body>
</html>
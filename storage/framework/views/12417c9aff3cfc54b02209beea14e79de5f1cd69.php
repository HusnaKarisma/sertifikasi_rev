<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo e(($page_title)?CRUDBooster::getSetting('appname').': '.strip_tags($page_title):"Home"); ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="webapp for perpustakaan nasional">
  <meta name="author" content="ahmad.furqon@gmail.com">
  
  <link rel="shortcut icon" href="<?php echo e(CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png')); ?>">
  <link href="<?php echo e(asset("vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset("vendor/crudbooster/assets/adminlte/font-awesome/css")); ?>/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <link href="<?php echo e(asset("css/normalize.css")); ?>" rel="stylesheet" type="text/css" />
</head>

<body class="blog">
  <div id="mask">
    <div id="loader"></div>
  </div>
  
  <?php echo $__env->make('frontpage.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div id="main" class="pd-top">
    <?php echo $__env->make('frontpage.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>
    
  </div>

  <?php echo $__env->make('frontpage.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script src="<?php echo e(asset ('vendor/crudbooster/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset("js/plugins/bootstrap/bootstrap-select.js")); ?>"></script>
  <script src="<?php echo e(asset("js/plugins/fancybox/jquery.fancybox.pack.js")); ?>"></script>
  <script src="<?php echo e(asset("js/plugins/appear/jquery.appear.js")); ?>"></script>
  <script src="<?php echo e(asset("js/plugins/paralax/parallax.js")); ?>"></script>
  <script src="<?php echo e(asset("js/plugins/sticky/jquery.sticky.js")); ?>"></script>
  <script src="<?php echo e(asset("js/plugins/fullscreen/jquery.fullscreenslides.min.js")); ?>"></script>
  <script src="<?php echo e(asset("js/plugins/share/share-button.min.js")); ?>"></script>
  <script src="<?php echo e(asset("js/app.js")); ?>"></script>

  <script type="text/javascript">
  <?php echo $__env->yieldContent('script'); ?>
  </script>
</body>

</html>
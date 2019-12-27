<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-3">

      <!-- <?php echo $__env->make('widget.link', ['wg_link_background' => 'bg-aqua', 'wg_link_title' => 'User terdaftar', 'wg_link_value' => '3', 'wg_link_url' => '/register'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  -->
      <?php echo $__env->make('widget.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

    </div>
    <div class="col-md-9">
      <?php echo app(\Imanghafoori\Widgets\Utils\WidgetRenderer::class)->renderWidget('BlogList'); ?>
      <?php echo app(\Imanghafoori\Widgets\Utils\WidgetRenderer::class)->renderWidget('GalleryList'); ?>
    </div>

    
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.frontpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-newspaper-o"></i> Index Berita</h3>
        </div>

        <div class="box-body">
            
          <h3><?php echo e($page->title); ?></h3>
          <?php echo $page->body; ?>

        </div>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.frontpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>